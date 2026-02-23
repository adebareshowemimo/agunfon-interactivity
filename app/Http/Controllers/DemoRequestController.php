<?php

namespace App\Http\Controllers;

use App\Models\DemoRequest;
use App\Models\AdminEmail;
use App\Mail\DemoConfirmation;
use App\Mail\DemoNotification;
use App\Services\RecaptchaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoRequestController extends Controller
{
    public function store(Request $request, RecaptchaService $recaptcha)
    {
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'industry' => 'required|string|max:255',
            'team_size' => 'required|string|max:50',
            'summary' => 'nullable|string|max:5000',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        // Verify reCAPTCHA Enterprise
        $recaptchaResult = $recaptcha->verify(
            $request->input('g-recaptcha-response'),
            'demo_submit'
        );

        if (!$recaptchaResult['success']) {
            return back()->withErrors(['captcha' => $recaptchaResult['error'] ?? 'Please complete the CAPTCHA verification.'])->withInput();
        }

        // Create demo request record
        $demoRequest = DemoRequest::create([
            'name' => $validated['name'],
            'company' => $validated['company'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'industry' => $validated['industry'],
            'team_size' => $validated['team_size'],
            'summary' => $validated['summary'] ?? null,
            'preferred_date' => $validated['preferred_date'],
            'preferred_time' => $validated['preferred_time'],
        ]);

        // Send confirmation email to user
        try {
            Mail::to($demoRequest->email)->send(new DemoConfirmation($demoRequest));
        } catch (\Exception $e) {
            \Log::error('Failed to send demo confirmation email: ' . $e->getMessage());
        }

        // Send notification to admin emails
        $adminEmails = AdminEmail::getDemoRecipients();
        if (!empty($adminEmails)) {
            try {
                Mail::to($adminEmails)->send(new DemoNotification($demoRequest));
            } catch (\Exception $e) {
                \Log::error('Failed to send demo notification email: ' . $e->getMessage());
            }
        }

        return redirect()->route('demo.success');
    }

    public function success()
    {
        return view('demo-success');
    }
}
