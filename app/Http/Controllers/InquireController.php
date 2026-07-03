<?php

namespace App\Http\Controllers;

use App\Mail\InquireSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class InquireController extends Controller
{
    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'name'           => ['required', 'string', 'max:100'],
            'email'          => ['required', 'email', 'max:150'],
            'phone'          => ['required', 'string', 'max:20'],
            'event_name'     => ['required', 'string', 'max:150'],
            'event_date'     => ['required', 'date', 'after:today'],
            'coconut_count'  => ['required', 'integer', 'min:1'],
            'location'       => ['required', 'string', 'max:150'],
            'message'        => ['nullable', 'string', 'max:1000'],
        ], [
            // Custom error messages
            'name.required'          => 'Please enter your full name.',
            'email.required'         => 'Please enter your email address.',
            'email.email'            => 'Please enter a valid email address.',
            'phone.required'         => 'Please enter your phone number.',
            'event_name.required'    => 'Please enter your event or brand name.',
            'event_date.required'    => 'Please select your event date.',
            'event_date.after'       => 'Event date must be in the future.',
            'coconut_count.required' => 'Please enter the estimated number of coconuts.',
            'coconut_count.min'      => 'Minimum order is 1 coconut.',
            'location.required'      => 'Please enter the event location.',
        ]);

        // ── Verifikasi reCAPTCHA ──
        $recaptcha = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ])->json();

        if (!($recaptcha['success'] ?? false) || ($recaptcha['score'] ?? 0) < 0.5) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['captcha' => 'Verifikasi keamanan gagal. Silakan coba lagi.']);
        }

        // Send email to admin
        Mail::to('info@balicoconutart.com')
            ->send(new InquireSubmitted($validated));

        // Redirect back with success message
        return redirect()
            ->back()
            ->with('success', "Thank you, {$validated['name']}! Your inquiry has been sent. We'll get back to you shortly.");
    }
}