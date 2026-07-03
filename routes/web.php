<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InquireController;
use Illuminate\Support\Facades\Route;


// Tampilan Halaman Utama Company Profile
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// Rute untuk memproses submit form ulasan
Route::post('/contact/review', [ContactController::class, 'submitReview'])->name('review.submit');

// Tampilan Halaman Gallery
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::post('/inquire', [InquireController::class, 'store'])->name('inquire.store');
