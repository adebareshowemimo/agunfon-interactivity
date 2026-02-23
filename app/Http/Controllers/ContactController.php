<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\AdminEmail;
use App\Mail\ContactConfirmation;
use App\Mail\ContactNotification;
use App\Services\RecaptchaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request, RecaptchaService $recaptcha)
    {
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string|max:5000',
            'g-recaptcha-response' => 'required',
        ]);

        // Verify reCAPTCHA Enterprise
        $recaptchaResult = $recaptcha->verify(
            $request->input('g-recaptcha-response'),
            'contact_submit'
        );

        if (!$recaptchaResult['success']) {
            return back()->withErrors(['captcha' => $recaptchaResult['error'] ?? 'Please complete the CAPTCHA verification.'])->withInput();
        }

        // Create contact record
        $contact = Contact::create([
            'name' => $validated['name'],
            'company' => $validated['company'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'],
        ]);

        // Send confirmation email to user
        try {
            Mail::to($contact->email)->send(new ContactConfirmation($contact));
        } catch (\Exception $e) {
            \Log::error('Failed to send contact confirmation email: ' . $e->getMessage());
        }

        // Send notification to admin emails
        $adminEmails = AdminEmail::getContactRecipients();
        if (!empty($adminEmails)) {
            try {
                Mail::to($adminEmails)->send(new ContactNotification($contact));
            } catch (\Exception $e) {
                \Log::error('Failed to send contact notification email: ' . $e->getMessage());
            }
        }

        return redirect()->route('contact.success');
    }

    public function success()
    {
        return view('contact-success');
    }
}
