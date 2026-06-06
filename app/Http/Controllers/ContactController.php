<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewMail;

class ContactController extends Controller
{
    public function submitReview(Request $request)
    {
        // 1. Validasi inputan form dari pengunjung
        $validatedData = $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'event_type'    => 'required|string|max:255',
            'review_text'   => 'required|string',
            'rating'        => 'required|integer|min:1|max:5',
        ]);

        // 2. Perintahkan sistem mengirim email KEPADA admin
        // Email penerima ini adalah tempat kamu membaca ulasan yang masuk
        Mail::to('info@balicoconutart.com')->send(new ReviewMail($validatedData));

        // 3. Kembalikan pengunjung ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Thank you! Your review has been successfully submitted.');
    }
}