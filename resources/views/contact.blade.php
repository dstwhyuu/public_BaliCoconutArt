@extends('layouts.app')

@section('title', 'Contact Us - Bali Coconut Art')

@section('content')

{{-- ── CSS ANIMASI SCROLL REVEAL (Ditambahkan agar sama dengan page lain) ── --}}
<style>
    .reveal-left {
        opacity: 0;
        transform: translateX(-60px);
        transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .reveal-right {
        opacity: 0;
        transform: translateX(60px);
        transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .reveal-left.is-visible,
    .reveal-right.is-visible {
        opacity: 1;
        transform: translateX(0);
    }
</style>

{{-- ── 1. FLOATING ANIMATED NAVBAR (Responsive with Mobile Menu) ── --}}
<div id="nav-wrapper" class="fixed top-0 inset-x-0 z-[90] flex justify-center px-4 md:px-6 pt-4 sm:pt-6 md:pt-8 transition-all duration-500 pointer-events-none">

    <nav id="main-nav" class="pointer-events-auto flex justify-between items-start md:items-start w-full max-w-full px-4 py-2 transition-all duration-[600ms] ease-[cubic-bezier(0.34,1.56,0.64,1)] rounded-full border border-transparent">
            
        {{-- KIRI: LOGO BRAND --}}
        <a href="{{ url('/#home') }}" id="nav-logo-link" class="flex items-center md:items-start group transition-all duration-500 w-auto md:w-[180px]">
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-[70px] h-[70px] md:w-[100px] md:h-[100px] object-contain group-hover:scale-105 transition-all duration-500 brightness-0">
        </a>

        {{-- HAMBURGER BUTTON (MOBILE ONLY) --}}
        <div class="flex md:hidden items-center ml-auto mt-2">
            <button id="mobile-menu-btn" class="text-gray-900 hover:text-[#8CC63F] transition-colors p-2 focus:outline-none">
                <i class="fas fa-bars text-2xl transition-colors duration-300"></i>
            </button>
        </div>

        {{-- TENGAH: MENU NAVIGASI DESKTOP --}}
        <div id="nav-menu" class="hidden md:flex flex-1 justify-center items-center gap-2 lg:gap-4 text-sm md:text-base font-bold tracking-wide -mt-2 transition-all duration-500">
            <a href="{{ url('/#home') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-[#8CC63F] hover:bg-[#D0E9A8]/20 transition-all duration-300">Home</a>
            <a href="{{ url('/about') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-[#8CC63F] hover:bg-[#D0E9A8]/20 transition-all duration-300">About</a>
            <a href="{{ route('services') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-[#8CC63F] hover:bg-[#D0E9A8]/20 transition-all duration-300">Services</a>
            <a href="{{ route('gallery') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-[#8CC63F] hover:bg-[#D0E9A8]/20 transition-all duration-300">Gallery</a>
        </div>

        {{-- KANAN: TOMBOL CONTACT DESKTOP --}}
        <div id="nav-cta-wrapper" class="hidden md:flex justify-end items-start w-[180px] -mt-2 transition-all duration-500">
            <a href="{{ route('contact') }}" id="nav-cta-btn" 
            class="bg-gradient-to-r from-[#A8E05A] to-[#8CC63F] text-white px-7 py-2 rounded-full text-sm font-bold shadow-[0_0_15px_rgba(140,198,63,0.6)] hover:shadow-[0_0_25px_rgba(140,198,63,1)] hover:brightness-105 hover:scale-105 transition-all duration-300 flex items-center justify-center border border-white/20">
                Contact
            </a>
        </div>
    </nav>
</div>

{{-- ── OVERLAY MENU MOBILE ── --}}
<div id="mobile-menu-wrapper" class="fixed inset-0 z-[100] flex justify-end opacity-0 pointer-events-none transition-opacity duration-500">
    <div id="mobile-menu-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-md cursor-pointer transition-opacity duration-500"></div>
    <div id="mobile-menu-panel" class="relative w-[80%] max-w-sm h-full bg-white shadow-[-20px_0_40px_rgba(0,0,0,0.15)] flex flex-col pt-10 px-8 transform translate-x-full transition-transform duration-[600ms] ease-[cubic-bezier(0.25,1,0.5,1)] rounded-l-[2rem] overflow-hidden">
        
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#D0E9A8]/40 to-transparent rounded-bl-full pointer-events-none -z-10"></div>
        
        {{-- Header Sidebar (Logo & Close Button) --}}
        <div class="flex items-center justify-between mb-10 relative z-10">
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-20 h-20 object-contain brightness-0 -ml-2">
            <button id="mobile-menu-close" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-500 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] hover:rotate-90 transition-all duration-300 shadow-sm">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        
        {{-- Link Menu --}}
        <div class="flex flex-col gap-1 mt-4">
            <a href="{{ url('/#home') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#5B8C2A]">
                <span class="w-0 h-[2px] bg-[#8CC63F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>Home
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>
            
            <a href="{{ url('/about') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#5B8C2A]">
                <span class="w-0 h-[2px] bg-[#8CC63F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>About
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>
            
            <a href="{{ route('services') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#5B8C2A]">
                <span class="w-0 h-[2px] bg-[#8CC63F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>Services
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>
            
            <a href="{{ route('gallery') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#5B8C2A]">
                <span class="w-0 h-[2px] bg-[#8CC63F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>Gallery
            </a>
        </div>

        {{-- Tombol Contact --}}
        <a href="{{ route('contact') }}" class="mobile-link mt-10 relative overflow-hidden group flex items-center justify-center bg-gray-900 text-white px-8 py-4 rounded-full font-bold tracking-[0.2em] uppercase text-xs shadow-xl transition-all duration-300">
            <span class="absolute inset-0 bg-gradient-to-r from-[#D0E9A8] to-[#78B83A] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
            <span class="relative z-10 group-hover:text-gray-900 transition-colors duration-300">Contact Us</span>
        </a>

        {{-- ░░ SOCIAL MEDIA & BRAND BAWAH ░░ --}}
        <div class="mt-auto pb-8 pt-10 flex flex-col items-center justify-center w-full">
            <div class="flex justify-center gap-4 mb-5">
                <a href="https://instagram.com/balicoconutart" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-slate-400 hover:text-[#5B8C2A] hover:bg-white hover:shadow-md transition-all duration-300">
                    <i class="fab fa-instagram text-base"></i>
                </a>
                <a href="https://wa.me/6282146445465" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-slate-400 hover:text-[#5B8C2A] hover:bg-white hover:shadow-md transition-all duration-300">
                    <i class="fab fa-whatsapp text-base"></i>
                </a>
                <a href="https://facebook.com/balicoconutart" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-slate-400 hover:text-[#5B8C2A] hover:bg-white hover:shadow-md transition-all duration-300">
                    <i class="fab fa-facebook-f text-base"></i>
                </a>
            </div>
            <span class="text-[0.65rem] font-bold tracking-[0.25em] text-slate-400 uppercase">
                Bali Coconut Art
            </span>
        </div>

    </div>
</div>

{{-- ── WRAPPER UTAMA KONTEN ── --}}
<main class="w-full bg-gray-50 flex flex-col font-sans min-h-screen">
    
    {{-- ░░ 2. HEADER HERO BOX (Editorial Luxury Style) ░░ --}}
    <section class="w-full px-4 md:px-6 text-center relative pt-[160px] md:pt-[200px] pb-32 md:pb-40 overflow-hidden" style="background: linear-gradient(135deg, #F4FAF0 0%, #C8E6A0 40%, #8CC63F 100%); border-bottom: 1px solid rgba(140, 198, 63, 0.3);">
        
        <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-white opacity-40 rounded-full blur-[100px] pointer-events-none z-0"></div>

        <div class="max-w-3xl mx-auto relative z-10 flex flex-col items-center">
            
            <div class="flex items-center gap-4 mb-5">
                <span class="w-8 md:w-12 h-[1px] bg-[#1A120B]/30"></span>
                <span class="text-[#1A120B]/80 text-[0.65rem] sm:text-xs font-bold tracking-[0.3em] uppercase">Contact Us</span>
                <span class="w-8 md:w-12 h-[1px] bg-[#1A120B]/30"></span>
            </div>

            {{-- Menambahkan class "reveal-left" pada judul --}}
            <h1 class="text-4xl sm:text-5xl md:text-[4.5rem] text-[#1A120B] leading-[1.1] mb-6 md:mb-8 tracking-tight font-extrabold font-sans drop-shadow-sm uppercase reveal-left">
                GET IN <span class="font-serif italic font-light capitalize text-gray-800 tracking-normal ml-1">Touch</span>
            </h1>
            
            {{-- Menambahkan class "reveal-right" pada deskripsi --}}
            <p class="text-gray-800 text-[0.95rem] md:text-[1.1rem] leading-[2.2] font-light max-w-2xl mx-auto px-2 reveal-right">
                We would love to hear from you. Please reach out to us for custom orders, event partnerships, or any inquiries regarding our <strong class="font-medium text-[#1A120B]">premium services.</strong>
            </p>
        </div>
    </section>

    {{-- ░░ 3. EMPAT KOTAK MELAYANG (Full Tailwind Grid) ░░ --}}
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 max-w-[1500px] mx-auto px-4 md:px-8 lg:px-10 relative z-20 -mt-20 md:-mt-24 mb-16 md:mb-24">
        
        <div class="bg-white text-center p-6 md:p-8 rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.06)] hover:-translate-y-2 transition-transform duration-300">
            <div class="w-14 h-14 mx-auto mb-5 bg-[#8CC63F]/15 rounded-full flex items-center justify-center text-[#5B8C2A] text-xl">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <h4 class="font-bold text-gray-900 mb-3 text-base md:text-lg">Service Area</h4>
            <p class="text-gray-500 text-[0.85rem] md:text-sm leading-relaxed">
                Serving deliveries to all premium venues and resorts across Bali.
            </p>
        </div>

        <div class="bg-white text-center p-6 md:p-8 rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.06)] hover:-translate-y-2 transition-transform duration-300">
            <div class="w-14 h-14 mx-auto mb-5 bg-[#8CC63F]/15 rounded-full flex items-center justify-center text-[#5B8C2A] text-xl">
                <i class="fas fa-phone-alt"></i>
            </div>
            <h4 class="font-bold text-gray-900 mb-3 text-base md:text-lg">Phone</h4>
            <p class="text-gray-500 text-[0.85rem] md:text-sm leading-relaxed">
                0821-4644-5465
            </p>
        </div>

        <div class="bg-white text-center p-6 md:p-8 rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.06)] hover:-translate-y-2 transition-transform duration-300">
            <div class="w-14 h-14 mx-auto mb-5 bg-[#8CC63F]/15 rounded-full flex items-center justify-center text-[#5B8C2A] text-xl">
                <i class="far fa-envelope"></i>
            </div>
            <h4 class="font-bold text-gray-900 mb-3 text-base md:text-lg">Email</h4>
            <p class="text-gray-500 text-[0.85rem] md:text-sm leading-relaxed break-words">
                info@balicoconutart.com
            </p>
        </div>

        <div class="bg-white text-center p-6 md:p-8 rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.06)] hover:-translate-y-2 transition-transform duration-300">
            <div class="w-14 h-14 mx-auto mb-5 bg-[#8CC63F]/15 rounded-full flex items-center justify-center text-[#5B8C2A] text-xl">
                <i class="far fa-clock"></i>
            </div>
            <h4 class="font-bold text-gray-900 mb-3 text-base md:text-lg">Business Hours</h4>
            <p class="text-gray-500 text-[0.85rem] md:text-sm leading-relaxed">
                Open Daily
            </p>
        </div>

    </section>    

    {{-- ░░ 4. GRID BAWAH (Info & Review Form - Tailwind Flex) ░░ --}}
    <section class="flex flex-col lg:flex-row gap-6 md:gap-8 max-w-[1500px] mx-auto px-4 md:px-8 lg:px-10 pb-24 w-full">

        {{-- ── KIRI: Connect & Info ── --}}
        <div class="w-full lg:w-1/3 flex flex-col gap-6">
            
        {{-- Box 1: Follow Us --}}
        <div class="bg-[#D0E9A8] border border-[#A8E05A] rounded-2xl p-6 md:p-8 text-center shadow-sm">
            <h3 class="font-bold text-lg text-gray-900 mb-5">Follow Us</h3>
            
            <div class="flex justify-center gap-4 mb-5">
                
                {{-- Link Facebook --}}
                <a href="https://facebook.com/balicoconutart" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#5B8C2A] hover:bg-[#1A120B] hover:text-white transition-colors duration-300 shadow-sm">
                    <i class="fab fa-facebook-f text-sm"></i>
                </a>
                
                {{-- Link Instagram --}}
                <a href="https://instagram.com/balicoconutart" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#5B8C2A] hover:bg-[#1A120B] hover:text-white transition-colors duration-300 shadow-sm">
                    <i class="fab fa-instagram text-sm"></i>
                </a>
                
                {{-- Link TikTok --}}
                <a href="https://tiktok.com/@balicoconutart" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#5B8C2A] hover:bg-[#1A120B] hover:text-white transition-colors duration-300 shadow-sm">
                    <i class="fab fa-tiktok text-sm"></i>
                </a>
                
            </div>
                <p class="text-[0.8rem] text-gray-800 leading-relaxed font-medium">
                    Get the latest updates on our activities and view our premium coconut art portfolio through our social media.
                </p>
            </div>

            {{-- Box 2: Info --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <h3 class="font-bold text-base text-gray-900 mb-3 flex items-center gap-2">
                    <i class="fas fa-info-circle text-[#8CC63F]"></i> Additional Info
                </h3>
                <p class="text-[0.8rem] text-gray-600 leading-relaxed">
                    For custom logo engraving, please contact us at least <strong class="text-gray-900">7 days</strong> prior to your event date. Minimum Order Quantity (MOQ) may apply.
                </p>
            </div>

        </div>

        {{-- ── KANAN: Review Form ── --}}
        <div class="w-full lg:w-2/3 bg-white border border-gray-100 rounded-2xl p-6 md:p-10 shadow-[0_10px_30px_rgba(0,0,0,0.05)]">
            
            <div class="mb-6 md:mb-8">
                <h3 class="font-bold text-xl md:text-2xl text-gray-900 mb-1">Share Your Experience</h3>
                <p class="text-sm text-gray-500">We value your feedback. Let us know how we did!</p>
            </div>

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('review.submit') }}" method="POST" class="flex flex-col gap-5 md:gap-6">
                @csrf

                {{-- Rating Stars --}}
                <div class="flex flex-col gap-2">
                    <label class="text-[0.7rem] font-bold text-gray-700 uppercase tracking-widest">Rating</label>
                    <input type="hidden" name="rating" id="rating_value" value="0">

                    <div id="star_container" class="flex gap-1 select-none">
                        @for($i = 1; $i <= 5; $i++)
                        <button type="button" class="star p-0.5 focus:outline-none" data-value="{{ $i }}" aria-label="{{ $i }} star{{ $i > 1 ? 's' : '' }}">
                            <i class="far fa-star text-3xl text-gray-300 pointer-events-none transition-colors duration-100"></i>
                        </button>
                        @endfor
                    </div>
                </div>

                {{-- Input Nama & Tipe Event --}}
                <div class="flex flex-col sm:flex-row gap-5 md:gap-6">
                    <div class="flex-1 flex flex-col gap-2">
                        <label for="reviewer_name" class="text-[0.7rem] font-bold text-gray-700 uppercase tracking-widest">Full Name / Company</label>
                        <input type="text" id="reviewer_name" name="reviewer_name" placeholder="John Doe or EO Bali" 
                               class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:border-[#8CC63F] focus:ring-1 focus:ring-[#8CC63F] transition-all">
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <label for="event_type" class="text-[0.7rem] font-bold text-gray-700 uppercase tracking-widest">Event Type</label>
                        <input type="text" id="event_type" name="event_type" placeholder="e.g. Wedding, Corporate..." 
                               class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:border-[#8CC63F] focus:ring-1 focus:ring-[#8CC63F] transition-all">
                    </div>
                </div>

                {{-- Input Area Review --}}
                <div class="flex flex-col gap-2">
                    <label for="review_text" class="text-[0.7rem] font-bold text-gray-700 uppercase tracking-widest">Your Review</label>
                    <textarea id="review_text" name="review_text" rows="3" placeholder="Tell us about your experience..." 
                              class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:border-[#8CC63F] focus:ring-1 focus:ring-[#8CC63F] transition-all resize-none"></textarea>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="bg-gray-900 text-white font-bold text-xs uppercase tracking-widest py-4 rounded-xl hover:bg-[#5B8C2A] transition-colors duration-300 mt-2 shadow-md">
                    Submit Review
                </button>

            </form>
        </div>

    </section>

</main>

{{-- ░ FOOTER ░ --}}
@include('sections._footer')

{{-- ── SCRIPT GABUNGAN: NAVBAR MOBILE, STAR RATING, & SCROLL REVEAL ── --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. SCRIPT NAVBAR EFEK MELAYANG ---
    const navWrapper = document.getElementById('nav-wrapper');
    const mainNav = document.getElementById('main-nav');
    const logoImg = document.getElementById('nav-logo-link').querySelector('img');
    const navMenu = document.getElementById('nav-menu');
    const navCtaWrapper = document.getElementById('nav-cta-wrapper');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navWrapper.classList.remove('pt-4', 'sm:pt-6', 'md:pt-8');
            navWrapper.classList.add('pt-3', 'md:pt-4');
            
            mainNav.classList.remove('max-w-full', 'border-transparent', 'items-start', 'md:items-start');
            mainNav.classList.add('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center', 'md:items-center');
            
            navMenu.classList.remove('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.remove('-mt-2');

            logoImg.classList.remove('w-[70px]', 'h-[70px]', 'md:w-[100px]', 'md:h-[100px]');
            logoImg.classList.add('w-[50px]', 'h-[50px]', 'md:w-14', 'md:h-14'); 
        } else {
            navWrapper.classList.add('pt-4', 'sm:pt-6', 'md:pt-8');
            navWrapper.classList.remove('pt-3', 'md:pt-4');

            mainNav.classList.add('max-w-full', 'border-transparent', 'items-start', 'md:items-start');
            mainNav.classList.remove('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center', 'md:items-center');
            
            navMenu.classList.add('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.add('-mt-2');

            logoImg.classList.add('w-[70px]', 'h-[70px]', 'md:w-[100px]', 'md:h-[100px]');
            logoImg.classList.remove('w-[50px]', 'h-[50px]', 'md:w-14', 'md:h-14');
        }
    });

    // --- 2. SCRIPT MENU MOBILE (SIDE PANEL + BLUR) ---
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileWrapper = document.getElementById('mobile-menu-wrapper');
    const mobilePanel = document.getElementById('mobile-menu-panel');
    const mobileBackdrop = document.getElementById('mobile-menu-backdrop');
    const mobileClose = document.getElementById('mobile-menu-close');
    const mobileLinksOverlay = document.querySelectorAll('.mobile-link');

    function openMobileMenu() {
        mobileWrapper.classList.remove('opacity-0', 'pointer-events-none');
        setTimeout(() => mobilePanel.classList.remove('translate-x-full'), 10);
    }
    function closeMobileMenu() {
        mobilePanel.classList.add('translate-x-full');
        setTimeout(() => mobileWrapper.classList.add('opacity-0', 'pointer-events-none'), 300); 
    }

    if(mobileBtn) mobileBtn.addEventListener('click', openMobileMenu);
    if(mobileClose) mobileClose.addEventListener('click', closeMobileMenu);
    if(mobileBackdrop) mobileBackdrop.addEventListener('click', closeMobileMenu);
    mobileLinksOverlay.forEach(link => link.addEventListener('click', closeMobileMenu));

    // --- 3. SCRIPT FORM RATING BINTANG ---
    const stars = document.querySelectorAll('.star');
    const starContainer = document.getElementById('star_container');
    const ratingInput = document.getElementById('rating_value');
    let selectedRating = 0;

    function paintStars(value) {
        stars.forEach((star, i) => {
            const icon = star.querySelector('i');
            if (i < value) {
                icon.classList.remove('far', 'text-gray-300');
                icon.classList.add('fas', 'text-[#F59E0B]');
            } else {
                icon.classList.remove('fas', 'text-[#F59E0B]');
                icon.classList.add('far', 'text-gray-300');
            }
        });
    }

    stars.forEach(star => {
        const value = parseInt(star.getAttribute('data-value'));
        star.addEventListener('mouseenter', () => paintStars(value));
        star.addEventListener('click', () => {
            selectedRating = value;
            ratingInput.value = value;
        });
    });

    starContainer.addEventListener('mouseleave', () => paintStars(selectedRating));

    // --- 4. SCRIPT ANIMASI SCROLL REVEAL (Memicu animasi teks judul) ---
    const revealElements = document.querySelectorAll('.reveal-left, .reveal-right');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    revealElements.forEach(el => revealObserver.observe(el));
});
</script>
@endpush

@endsection