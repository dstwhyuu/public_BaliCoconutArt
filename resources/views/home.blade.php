@extends('layouts.app')

@section('title', 'Bali Coconut Art | Premium Fresh Customized Coconuts')

@section('content')

{{-- ░ Back-to-top button (global) ░ --}}
<button id="back-to-top"
        aria-label="Back to top"
        class="fixed bottom-8 right-8 z-50 w-11 h-11 rounded-full
               bg-gray-900 text-white shadow-lg
               flex items-center justify-center
               opacity-0 pointer-events-none
               hover:bg-leaf-600 transition-all duration-300">
    <i class="fas fa-arrow-up text-xs"></i>
</button>

<style>
    @keyframes gentle-drift {
        0% { transform: scale(1) translate(0px, 0px); }
        50% { transform: scale(1.05) translate(8px, 4px); }
        100% { transform: scale(1) translate(0px, 0px); }
    }
    .animate-gentle-drift {
        /* Durasi 20 detik bolak-balik agar pergerakannya sangat halus */
        animation: gentle-drift 20s ease-in-out infinite; 
    }
</style>

{{-- ── FLOATING NAVBAR ── --}}
    <div id="nav-wrapper" class="fixed top-0 inset-x-0 z-50 flex justify-center px-4 md:px-6 pt-6 md:pt-8 transition-all duration-500 pointer-events-none">
            
        <nav id="main-nav" class="pointer-events-auto flex justify-between items-start w-full max-w-full px-4 py-2 transition-all duration-[600ms] ease-[cubic-bezier(0.34,1.56,0.64,1)] rounded-full border border-transparent">
                
                {{-- KIRI: LOGO BRAND --}}
                <a href="#home" id="nav-logo-link" class="flex items-start group transition-all duration-500 w-[180px]">
                    <img src="{{ asset('images/logo.png') }}" alt="Bali Coconut Art" class="w-[100px] h-[100px] object-contain group-hover:scale-105 transition-all duration-500">
                </a>

                {{-- TENGAH: MENU NAVIGASI (Ditarik lebih ke atas dengan -mt-2) --}}
                <div id="nav-menu" class="hidden md:flex flex-1 justify-center items-center gap-2 lg:gap-4 text-sm md:text-base font-bold tracking-wide -mt-2 transition-all duration-500">
                    <a href="{{ url('/#home') }}" class="menu-link px-4 py-2 rounded-full text-white/80 hover:text-white hover:bg-white/20 transition-all duration-300">Home</a>
                    <a href="{{ url('/about') }}" class="menu-link px-4 py-2 rounded-full text-white/80 hover:text-white hover:bg-white/20 transition-all duration-300">About</a>
                    <a href="{{ url('/#services') }}" class="menu-link px-4 py-2 rounded-full text-white/80 hover:text-white hover:bg-white/20 transition-all duration-300">Services</a>
                    <a href="{{ route('gallery') }}" class="menu-link px-4 py-2 rounded-full text-white/80 hover:text-white hover:bg-white/20 transition-all duration-300">Gallery</a>
                
            </div>

                {{-- KANAN: TOMBOL CONTACT (Ditarik lebih ke atas dengan -mt-2) --}}
                <div id="nav-cta-wrapper" class="hidden md:flex justify-end items-start w-[180px] -mt-2 transition-all duration-500">
                    <a href="{{ route('contact') }}" id="nav-cta-btn" 
                       class="bg-gradient-to-r from-[#EADCC8] to-[#D9B78A] text-gray-900 px-7 py-2 rounded-full text-sm font-bold shadow-[0_0_15px_rgba(217,183,138,0.5)] hover:shadow-[0_0_20px_rgba(217,183,138,0.8)] hover:brightness-105 hover:scale-105 transition-all duration-300 flex items-center justify-center">
                        Contact
                </a>
            </div>

        </nav>
    </div>

<main id="home" class="grain relative bg-white text-gray-900 overflow-hidden font-inter" style="height: calc(100vh + 85px);">
    
{{-- ░░ Background hero photos (Stacking untuk True Crossfade Mulus) ░░ --}}
    <div id="hero-bg-container" class="absolute inset-0 w-full h-full bg-gray-900 pointer-events-none overflow-hidden z-0">
        {{-- Gambar 1 (Default Aktif) --}}
        <img src="{{ asset('images/bg.jpg') }}" class="hero-bg-slide absolute inset-0 w-full h-full object-cover select-none transition-opacity duration-1000 ease-in-out opacity-100 animate-gentle-drift" alt="Background 1">
        
        {{-- Gambar 2 (Tersembunyi) --}}
        <img src="{{ asset('images/bg2.jpg') }}" class="hero-bg-slide absolute inset-0 w-full h-full object-cover select-none transition-opacity duration-1000 ease-in-out opacity-0" alt="Background 2">

    {{-- Dark gradient wash over photo --}}
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/50 to-transparent pointer-events-none"></div>
    
    {{-- PELINDUNG MENU UTAMA --}}
    <div class="absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-black/80 via-black/30 to-transparent pointer-events-none z-20"></div>

    {{-- ░░ Vertical sidebar rule ░░ --}}
    <div class="sidebar-rule absolute left-24 md:left-40 top-0 h-screen z-10 pointer-events-none"></div>

    {{-- ░░ LEFT SIDEBAR ░░ --}}
    <aside class="absolute left-0 top-0 h-screen w-24 md:w-40 flex flex-col justify-center items-center py-10 z-20 pointer-events-none">
        <div class="flex flex-col gap-4 relative z-30 pointer-events-auto">
            <button data-slide="0" aria-label="Slide 1" class="hero-dot w-2 h-2 rounded-full bg-white ring-2 ring-white/50 transition-all duration-300"></button>
            <button data-slide="1" aria-label="Slide 2" class="hero-dot w-2 h-2 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300"></button>
        </div>
    </aside>

    {{-- ░░ MAIN COLUMN ░░ --}}
    <div class="absolute left-24 md:left-40 right-0 top-0 h-screen z-[60] flex flex-col">

        {{-- ── HERO CONTENT ── --}}
        <div class="flex-1 flex flex-col justify-center pt-24 md:pt-14 px-8 md:px-14 lg:px-20 max-w-5xl relative z-30">

            {{-- Main heading (2 baris) --}}
            <h1 class="font-oswald font-bold leading-tight tracking-wide text-white mb-6
                       text-3xl sm:text-4xl md:text-5xl lg:text-[3.5rem] uppercase">
                CUSTOM COCONUTS<br>
                FOR UNFORGETTABLE<br>
                MOMENTS
            </h1>

            {{-- Subtext (Lebar dibatasi menggunakan max-w-md atau max-w-[400px] agar tidak melewati tengah) --}}
            <p class="font-inter text-gray-200 text-sm md:text-base max-w-md mb-10 leading-relaxed font-light">
                Premium fresh coconuts with custom laser engraving for weddings, corporate events, and luxury resorts across Bali. Every sip tells your story.
            </p>

            {{-- CTA Buttons --}}
            <div class="relative z-[60] pointer-events-auto flex flex-wrap gap-4">               
                 {{-- Tombol Primary (Our Packages) --}}
                {{-- Icon dihapus, bentuk diubah menjadi kapsul dengan rounded-full --}}
                <a href="#services"
                   class="inline-flex items-center justify-center bg-white text-gray-900 rounded-full
                          px-8 py-3.5 text-sm md:text-base font-bold
                          hover:bg-gray-100 hover:scale-105 transition-all duration-300 shadow-lg">
                    Our Packages
                </a>

                {{-- Tombol Secondary (Explore Gallery) --}}
                <a href="#portfolio"
                class="inline-flex items-center gap-3 border border-white/40 text-white rounded-full
                        px-8 py-3.5 text-sm md:text-base font-bold backdrop-blur-md bg-white/10
                        hover:bg-white/20 transition-all duration-300 shadow-sm">
                    Explore Gallery
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
                
            </div>
        </div>{{-- /hero content --}}
        
        {{-- ── FLOATING IMAGE CARD (bottom-right) ── --}}
        <div class="absolute bottom-8 right-8 md:bottom-12 md:right-12 z-[99] pointer-events-auto">
            <div class="w-56 h-44 md:w-72 md:h-56 rounded-[2rem] overflow-hidden relative shadow-[0_0_15px_8px_rgba(255,255,255,0.4)] bg-gray-50 group">

                {{-- Slide image --}}
                <img id="hero-slide-img" src="{{ asset('images/card1.jpg') }}" class="w-full h-full object-cover transition-opacity duration-300 ease-in-out" alt="Fresh coconut event">

                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent pointer-events-none z-10"></div>

                {{-- Prev / Next arrows --}}
                <div class="absolute bottom-3 right-3 flex gap-2 z-[100] pointer-events-auto">
                    <button id="hero-prev" aria-label="Previous image" class="w-9 h-9 md:w-10 md:h-10 rounded-full flex items-center justify-center bg-gray-900 text-white hover:bg-white hover:text-gray-900 hover:shadow-md active:bg-white active:text-gray-900 active:scale-95 transition-all duration-200 cursor-pointer">
                        <i class="fas fa-chevron-left pointer-events-none"></i>
                    </button>
                    <button id="hero-next" aria-label="Next image" class="w-9 h-9 md:w-10 md:h-10 rounded-full flex items-center justify-center bg-gray-900 text-white hover:bg-white hover:text-gray-900 hover:shadow-md active:bg-white active:text-gray-900 active:scale-95 transition-all duration-200 cursor-pointer">
                        <i class="fas fa-chevron-right pointer-events-none"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</main>
    
{{-- PENAMBAL PUTIH ANTI BLACK SCREEN --}}
<div class="w-full bg-white relative z-30 pt-[1px] pb-16">
    
    {{-- KOTAK LAYANAN (Rasio persis -90px) --}}
    <div class="w-full flex justify-center px-4 md:px-12" style="margin-top: -90px;">
        
        {{-- Container Box: Padding diseimbangkan menjadi py-10 md:py-12 agar konten presisi di tengah --}}
        <div class="bg-white rounded-[2rem] shadow-[0_15px_50px_rgba(0,0,0,0.08)] max-w-6xl w-full py-10 md:py-12 px-4 md:px-8 flex flex-col md:flex-row justify-around items-center gap-8 md:gap-0 border border-gray-50">
            
            {{-- Item 1: Custom Logo --}}
            <div class="group relative flex flex-col items-center text-center px-2 py-4 w-full md:w-1/4 cursor-pointer z-10">
                <div class="absolute inset-0 bg-gray-50 rounded-3xl scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 ease-out -z-10"></div>
                
                <div class="relative w-14 h-14 mb-4">
                    <div class="absolute inset-0 bg-[#C89B5F]/30 rounded-2xl opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rotate-6 group-hover:translate-x-0.5 group-hover:translate-y-0.5"></div>
                    <div class="absolute inset-0 bg-[#DEC484]/20 text-amber-700 flex items-center justify-center text-2xl rounded-2xl transition-all duration-300 group-hover:bg-[#C89B5F] group-hover:text-white shadow-sm">
                        <i class="fas fa-stamp"></i>
                    </div>
                </div>
                
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 font-oswald mb-2">Custom Logo</h3>
                <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-0">
                    Laser-engraved company logos, initials, or custom designs.
                </p>
            </div>

            {{-- Divider di set fix height (h-28) --}}
            <div class="hidden md:block w-px h-28 bg-gray-100"></div>

            {{-- Item 2: Staff Incharge --}}
            <div class="group relative flex flex-col items-center text-center px-2 py-4 w-full md:w-1/4 cursor-pointer z-10">
                <div class="absolute inset-0 bg-gray-50 rounded-3xl scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 ease-out -z-10"></div>
                
                <div class="relative w-14 h-14 mb-4">
                    <div class="absolute inset-0 bg-[#C89B5F]/30 rounded-2xl opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rotate-6 group-hover:translate-x-0.5 group-hover:translate-y-0.5"></div>
                    <div class="absolute inset-0 bg-[#DEC484]/20 text-amber-700 flex items-center justify-center text-2xl rounded-2xl transition-all duration-300 group-hover:bg-[#C89B5F] group-hover:text-white shadow-sm">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>
                
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 font-oswald mb-2">Staff Incharge</h3>
                <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-0">
                    On-site professional staff to freshly open and serve coconuts.
                </p>
            </div>

            <div class="hidden md:block w-px h-28 bg-gray-100"></div>

            {{-- Item 3: Delivery --}}
            <div class="group relative flex flex-col items-center text-center px-2 py-4 w-full md:w-1/4 cursor-pointer z-10">
                <div class="absolute inset-0 bg-gray-50 rounded-3xl scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 ease-out -z-10"></div>
                
                <div class="relative w-14 h-14 mb-4">
                    <div class="absolute inset-0 bg-[#C89B5F]/30 rounded-2xl opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rotate-6 group-hover:translate-x-0.5 group-hover:translate-y-0.5"></div>
                    <div class="absolute inset-0 bg-[#DEC484]/20 text-amber-700 flex items-center justify-center text-2xl rounded-2xl transition-all duration-300 group-hover:bg-[#C89B5F] group-hover:text-white shadow-sm">
                        <i class="fas fa-truck"></i>
                    </div>
                </div>
                
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 font-oswald mb-2">Delivery</h3>
                <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-0">
                    Safe and punctual delivery to any venue across Bali.
                </p>
            </div>

            <div class="hidden md:block w-px h-28 bg-gray-100"></div>

            {{-- Item 4: Any Events --}}
            <div class="group relative flex flex-col items-center text-center px-2 py-4 w-full md:w-1/4 cursor-pointer z-10">
                <div class="absolute inset-0 bg-gray-50 rounded-3xl scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 ease-out -z-10"></div>
                
                <div class="relative w-14 h-14 mb-4">
                    <div class="absolute inset-0 bg-[#C89B5F]/30 rounded-2xl opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rotate-6 group-hover:translate-x-0.5 group-hover:translate-y-0.5"></div>
                    <div class="absolute inset-0 bg-[#DEC484]/20 text-amber-700 flex items-center justify-center text-2xl rounded-2xl transition-all duration-300 group-hover:bg-[#C89B5F] group-hover:text-white shadow-sm">
                        <i class="fas fa-glass-cheers"></i>
                    </div>
                </div>
                
                <h3 class="text-xl md:text-2xl font-bold text-gray-900 font-oswald mb-2">Any Events</h3>
                <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-0">
                    Perfect tropical beverage for weddings and corporate gatherings.
                </p>
            </div>

        </div>
    </div>
</div>
@include('sections._services')
@include('sections._portfolio')
@include('sections._why_us')
@include('sections._footer')

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. EFEK NAVBAR MELAYANG (FLOATING PILL & BOUNCE)
    // ==========================================
    const navWrapper = document.getElementById('nav-wrapper');
    const mainNav = document.getElementById('main-nav');
    const navMenu = document.getElementById('nav-menu');
    const navLinks = document.querySelectorAll('.menu-link');    
    const navLogoLink = document.getElementById('nav-logo-link'); 
    const logoImg = navLogoLink.querySelector('img'); 
    const navCtaWrapper = document.getElementById('nav-cta-wrapper');
    // Variabel navCtaBtn dan navCtaIcon dihapus karena warna tombol Contact sekarang konsisten

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navWrapper.classList.remove('pt-6', 'md:pt-8', 'px-4', 'md:px-6');
            navWrapper.classList.add('pt-4', 'px-4', 'md:px-12');
            
            mainNav.classList.remove('max-w-full', 'border-transparent', 'items-start', 'px-4', 'py-2');
            mainNav.classList.add('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center');
            
            // Hapus margin negatif agar semua sejajar presisi di tengah kapsul
            navMenu.classList.remove('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.remove('-mt-2');

            logoImg.classList.remove('w-[100px]', 'h-[100px]');
            logoImg.classList.add('w-14', 'h-14', 'brightness-0');

            // Set hover teks BEACH GOLD dan background kapsul BEACH GRADIENT TRANSPARAN
            navLinks.forEach(link => {
                link.classList.remove('text-white/80', 'hover:text-white', 'hover:bg-white/20');
                // Tambahkan class gradient untuk background hover
                link.classList.add('text-gray-800', 'hover:text-[#C89B5F]', 'hover:bg-gradient-to-r', 'hover:from-[#EADCC8]/40', 'hover:to-[#D9B78A]/40');
            });
        } else {
            navWrapper.classList.add('pt-6', 'md:pt-8', 'px-4', 'md:px-6');
            navWrapper.classList.remove('pt-4', 'px-4', 'md:px-12');

            mainNav.classList.add('max-w-full', 'border-transparent', 'items-start', 'px-4', 'py-2');
            mainNav.classList.remove('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center');
            
            // Kembalikan margin negatif agar tertarik ke atas
            navMenu.classList.add('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.add('-mt-2');

            logoImg.classList.add('w-[100px]', 'h-[100px]');
            logoImg.classList.remove('w-14', 'h-14', 'brightness-0');

            // Kembalikan ke hover putih polos
            navLinks.forEach(link => {
                // Hapus semua class gradient
                link.classList.remove('text-gray-800', 'hover:text-[#C89B5F]', 'hover:bg-gradient-to-r', 'hover:from-[#EADCC8]/40', 'hover:to-[#D9B78A]/40');
                link.classList.add('text-white/80', 'hover:text-white', 'hover:bg-white/20');
            });
        }
    });
    
    // ==========================================
    // 2. BACKGROUND SLIDER & EFEK ZOOM (TRUE CROSSFADE)
    // ==========================================
    const slides = document.querySelectorAll('.hero-bg-slide');
    const dots = document.querySelectorAll('.hero-dot');
    let currentMainIndex = 0;
    let slideInterval;

    function updateMainSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                // Tampilkan gambar baru (Fade In)
                slide.classList.remove('opacity-0');
                slide.classList.add('opacity-100');

                // Mainkan efek drift/guncang halus dari awal
                slide.classList.remove('animate-gentle-drift');
                void slide.offsetWidth; // Trik reflow
                slide.classList.add('animate-gentle-drift');
            } else {
                // Sembunyikan gambar lainnya (Fade Out)
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            }
        });

        dots.forEach((dot, i) => {
            if (i === index) {
                dot.className = 'hero-dot w-2 h-2 rounded-full bg-white ring-2 ring-white/50 transition-all duration-300';
            } else {
                dot.className = 'hero-dot w-2 h-2 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300';
            }
        });
    }

    function nextMainSlide() {
        currentMainIndex = (currentMainIndex === slides.length - 1) ? 0 : currentMainIndex + 1;
        updateMainSlide(currentMainIndex);
    }

    function startAutoSlide() {
        slideInterval = setInterval(nextMainSlide, 10000); // Ganti tiap 10 detik
    }

    function resetAutoSlide() {
        clearInterval(slideInterval);
        startAutoSlide();
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentMainIndex = index;
            updateMainSlide(currentMainIndex);
            resetAutoSlide();
        });
    });

    // Jalankan auto slide
    startAutoSlide();

    // ==========================================
    // 3. CARD SLIDER (MINI GALLERY) - Yang Tadi Hilang
    // ==========================================
    const cardImg = document.getElementById('hero-slide-img');
    const cardPrev = document.getElementById('hero-prev');
    const cardNext = document.getElementById('hero-next');

    // Pastikan card2.jpg dan card3.jpg ada di folder public/images
    const cardImages = [
        "{{ asset('images/card1.jpg') }}",
        "{{ asset('images/card2.jpg') }}",
        "{{ asset('images/card3.jpg') }}"
    ];
    
    let cardIndex = 0;

    function updateCardSlide(index) {
        cardImg.style.opacity = '0.3';
        setTimeout(() => {
            cardImg.src = cardImages[index];
            cardImg.style.opacity = '1';
        }, 150);
    }

    cardNext.addEventListener('click', () => {
        cardIndex = (cardIndex === cardImages.length - 1) ? 0 : cardIndex + 1;
        updateCardSlide(cardIndex);
    });

    cardPrev.addEventListener('click', () => {
        cardIndex = (cardIndex === 0) ? cardImages.length - 1 : cardIndex - 1;
        updateCardSlide(cardIndex);
    });
    
    // ==========================================
    // 4. ANIMASI BACK TO TOP
    // ==========================================
    const bttBtn = document.getElementById('back-to-top');
    if (bttBtn) {
        window.addEventListener('scroll', () => {
            bttBtn.classList.toggle('opacity-0', window.scrollY < 600);
            bttBtn.classList.toggle('pointer-events-none', window.scrollY < 600);
        });
        bttBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});
</script>
@endpush

@endsection