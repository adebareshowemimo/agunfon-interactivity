<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Models\AdminEmail;
use App\Mail\NewsletterNotification;
use App\Support\SpamGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Silently drop spam (honeypot/timing) — feign success so bots don't retry.
        if (SpamGuard::isSpam($request)) {
            return $this->respond($request, true, 'Thank you for subscribing!');
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return $this->respond($request, false, 'Please enter a valid email address.');
        }

        $email = strtolower(trim($request->input('email')));

        $existing = NewsletterSubscriber::where('email', $email)->first();

        if ($existing) {
            if ($existing->status === 'unsubscribed') {
                $existing->update(['status' => 'subscribed']);
                return $this->respond($request, true, 'Welcome back! You have been re-subscribed.');
            }

            return $this->respond($request, false, 'You are already subscribed.');
        }

        $subscriber = NewsletterSubscriber::create([
            'email' => $email,
            'status' => 'subscribed',
            'ip_address' => $request->ip(),
        ]);

        // Notify admins
        $adminEmails = AdminEmail::getActiveRecipients();
        if (!empty($adminEmails)) {
            try {
                Mail::to($adminEmails)->send(new NewsletterNotification($subscriber));
            } catch (\Exception $e) {
                Log::error('Failed to send newsletter notification email: ' . $e->getMessage());
            }
        }

        return $this->respond($request, true, 'Thank you for subscribing!');
    }

    /**
     * Return a JSON response for AJAX requests, or a session redirect otherwise.
     */
    protected function respond(Request $request, bool $success, string $message)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => $success, 'message' => $message]);
        }

        return back()->with($success ? 'newsletter_success' : 'newsletter_error', $message);
    }
}
