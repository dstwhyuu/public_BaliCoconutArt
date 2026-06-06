@extends('layouts.app')

@section('title', 'Gallery - Bali Coconut Art')

@section('content')

{{-- Menyembunyikan scrollbar bawaan browser & CSS Animasi --}}
<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    .no-select { -webkit-touch-callout: none; -webkit-user-select: none; user-select: none; }

    /* ── Posisi Awal (Menghilang & Geser) ── */
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

    /* ── Posisi Akhir (Muncul Sempurna) - INI YANG TADI HILANG ── */
    .reveal-left.is-visible,
    .reveal-right.is-visible {
        opacity: 1;
        transform: translateX(0);
    }
</style>

{{-- ── 1. FLOATING ANIMATED NAVBAR (SYNCED WITH ABOUT.BLADE.PHP) ── --}}
<div id="nav-wrapper" class="fixed top-0 inset-x-0 z-[90] flex justify-center px-4 md:px-6 pt-4 sm:pt-6 md:pt-8 transition-all duration-500 pointer-events-none">
    <nav id="main-nav" class="pointer-events-auto flex justify-between items-start md:items-start w-full max-w-full px-4 py-2 transition-all duration-[600ms] ease-[cubic-bezier(0.34,1.56,0.64,1)] rounded-full border border-transparent">
            
        <a href="{{ url('/#home') }}" id="nav-logo-link" class="flex items-center md:items-start group transition-all duration-500 w-auto md:w-[180px]">
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-[70px] h-[70px] md:w-[100px] md:h-[100px] object-contain group-hover:scale-105 transition-all duration-500 brightness-0">
        </a>

        <div class="flex md:hidden items-center ml-auto mt-2">
            <button id="mobile-menu-btn" class="text-gray-900 hover:text-[#C89B5F] transition-colors p-2 focus:outline-none">
                <i class="fas fa-bars text-2xl transition-colors duration-300"></i>
            </button>
        </div>

        <div id="nav-menu" class="hidden md:flex flex-1 justify-center items-center gap-2 lg:gap-4 text-sm md:text-base font-bold tracking-wide -mt-2 transition-all duration-500">
            <a href="{{ url('/#home') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-[#C89B5F] hover:bg-[#EADCC8]/20 transition-all duration-300">Home</a>
            <a href="{{ url('/about') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-[#C89B5F] hover:bg-[#EADCC8]/20 transition-all duration-300">About</a>
            <a href="{{ route('services') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-[#C89B5F] hover:bg-[#EADCC8]/20 transition-all duration-300">Services</a>
            <a href="{{ route('gallery') }}" class="menu-link px-4 py-2 rounded-full text-[#C89B5F] bg-[#EADCC8]/30 transition-all duration-300">Gallery</a>
        </div>

        <div id="nav-cta-wrapper" class="hidden md:flex justify-end items-start w-[180px] -mt-2 transition-all duration-500">
            <a href="{{ route('contact') }}" id="nav-cta-btn" class="bg-gradient-to-r from-[#EADCC8] to-[#D9B78A] text-gray-900 px-7 py-2 rounded-full text-sm font-bold shadow-[0_0_15px_rgba(217,183,138,0.5)] hover:shadow-[0_0_20px_rgba(217,183,138,0.8)] hover:brightness-105 hover:scale-105 transition-all duration-300 flex items-center justify-center">Contact</a>
        </div>
    </nav>
</div>

{{-- ── OVERLAY MENU MOBILE ── --}}
<div id="mobile-menu-wrapper" class="fixed inset-0 z-[100] flex justify-end opacity-0 pointer-events-none transition-opacity duration-500">
    <div id="mobile-menu-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-md cursor-pointer transition-opacity duration-500"></div>
    <div id="mobile-menu-panel" class="relative w-[80%] max-w-sm h-full bg-white shadow-[-20px_0_40px_rgba(0,0,0,0.15)] flex flex-col pt-10 px-8 transform translate-x-full transition-transform duration-[600ms] ease-[cubic-bezier(0.25,1,0.5,1)] rounded-l-[2rem] overflow-hidden">
        
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#EADCC8]/40 to-transparent rounded-bl-full pointer-events-none -z-10"></div>
        
        <div class="flex items-center justify-between mb-10 relative z-10">
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-20 h-20 object-contain brightness-0 -ml-2">
            <button id="mobile-menu-close" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-500 hover:bg-[#C89B5F] hover:text-white hover:border-[#C89B5F] hover:rotate-90 transition-all duration-300 shadow-sm">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        
        <div class="flex flex-col gap-1 mt-4">
            <a href="{{ url('/#home') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#C89B5F]">
                <span class="w-0 h-[2px] bg-[#C89B5F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>Home
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>
            <a href="{{ url('/about') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#C89B5F]">
                <span class="w-0 h-[2px] bg-[#C89B5F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>About
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>
            <a href="{{ route('services') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#C89B5F]">
                <span class="w-0 h-[2px] bg-[#C89B5F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>Services
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>
            <a href="{{ route('gallery') }}" class="mobile-link group relative flex items-center text-[#C89B5F] font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300">
                <span class="w-6 h-[2px] bg-[#C89B5F] transition-all duration-300 mr-3 inline-block"></span>Gallery
            </a>
        </div>

        <a href="{{ route('contact') }}" class="mobile-link mt-10 relative overflow-hidden group flex items-center justify-center bg-gray-900 text-white px-8 py-4 rounded-full font-bold tracking-[0.2em] uppercase text-xs shadow-xl transition-all duration-300">
            <span class="absolute inset-0 bg-gradient-to-r from-[#EADCC8] to-[#D9B78A] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
            <span class="relative z-10 group-hover:text-gray-900 transition-colors duration-300">Contact Us</span>
        </a>

        <div class="mt-auto pb-8 pt-10 flex flex-col items-center justify-center w-full">
            <div class="flex justify-center gap-4 mb-5">
                <a href="https://instagram.com/balicoconutart" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-slate-400 hover:text-[#C89B5F] hover:bg-white hover:shadow-md transition-all duration-300"><i class="fab fa-instagram text-base"></i></a>
                <a href="https://wa.me/6282146445465" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-slate-400 hover:text-[#C89B5F] hover:bg-white hover:shadow-md transition-all duration-300"><i class="fab fa-whatsapp text-base"></i></a>
                <a href="https://facebook.com/balicoconutart" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-slate-400 hover:text-[#C89B5F] hover:bg-white hover:shadow-md transition-all duration-300"><i class="fab fa-facebook-f text-base"></i></a>
            </div>
            <span class="text-[0.65rem] font-bold tracking-[0.25em] text-slate-400 uppercase">Bali Coconut Art</span>
        </div>
    </div>
</div>

{{-- ── WRAPPER UTAMA KONTEN ── --}}
<main class="w-full bg-gray-50 flex flex-col font-sans min-h-screen">
    
    <section class="w-full px-4 md:px-6 text-center relative pt-[160px] md:pt-[200px] pb-20 md:pb-24 overflow-hidden" style="background: linear-gradient(135deg, #FDF8F3 0%, #E5CAA4 40%, #D9B78A 100%); border-bottom: 1px solid rgba(212, 184, 149, 0.5);">
        <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-white opacity-40 rounded-full blur-[100px] pointer-events-none z-0"></div>

        <div class="max-w-3xl mx-auto relative z-10 flex flex-col items-center">
            <div class="flex items-center gap-4 mb-5">
                <span class="w-8 md:w-12 h-[1px] bg-[#1A120B]/30"></span>
                <span class="text-[#1A120B]/80 text-[0.65rem] sm:text-xs font-bold tracking-[0.3em] uppercase">Portfolio</span>
                <span class="w-8 md:w-12 h-[1px] bg-[#1A120B]/30"></span>
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-[4.5rem] text-[#1A120B] leading-[1.1] mb-6 md:mb-8 tracking-tight font-extrabold font-sans drop-shadow-sm uppercase reveal-left">
                OUR <span class="font-serif italic font-light capitalize text-gray-800 tracking-normal ml-1">Gallery</span>
            </h1>
            
            <p class="text-gray-800 text-[0.95rem] md:text-[1.1rem] leading-[2.2] font-light max-w-2xl mx-auto px-2 reveal-right">
                Explore our visual collection of premium coconut art, custom engravings, and live carving sessions handled by our <strong class="font-medium text-[#1A120B]">professional staff.</strong>
            </p>
        </div>
    </section>

    @php
    $photos = [
        asset('images/g1.webp'), asset('images/g3.webp'), asset('images/g4.webp'),
        asset('images/g5.webp'), asset('images/g6.webp'), asset('images/g7.webp'),
        asset('images/g8.webp'), asset('images/g9.webp'), asset('images/g10.webp'),
        asset('images/g11.webp'), asset('images/g12.webp'), asset('images/g13.webp'),
        asset('images/card1.webp'), asset('images/g15.webp'), asset('images/g16.webp'),
        asset('images/card2.webp'), asset('images/g18.webp'), asset('images/g19.webp'),
        asset('images/card4.webp'), asset('images/g14.webp'), asset('images/g17.webp'),
        asset('images/g20.webp'), asset('images/g21.webp'), asset('images/g22.webp'),
        asset('images/g23.webp'), asset('images/g24.webp'), asset('images/g25.webp'),
        asset('images/g26.webp'), asset('images/g27.webp'), asset('images/g28.webp'),
        asset('images/g29.webp'), asset('images/g30.webp'), asset('images/g31.webp'),
        asset('images/g32.webp'), asset('images/g33.webp'), asset('images/benefit2.webp'),
        asset('images/bg.webp'), asset('images/bg2.webp'), asset('images/g34.webp'), asset('images/g35.webp'),
        asset('images/gallery1.webp'), asset('images/gallery2.webp'), asset('images/gallery3.webp'),
        asset('images/gallery4.webp'), asset('images/gallery5.webp'), asset('images/benefit1.webp'),
    ];
    @endphp

    <div class="relative w-full max-w-[96%] 2xl:max-w-[90%] mx-auto pb-8">
        <section class="pt-8 md:pt-12 pb-20 columns-2 sm:columns-3 lg:columns-4 gap-2 sm:gap-4 md:gap-6 font-sans">
            @foreach($photos as $photo)
                <div class="gallery-item relative break-inside-avoid mb-2 sm:mb-4 md:mb-6 rounded-lg bg-gray-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group cursor-pointer">
                    <img alt="Bali Coconut Art" data-src="{{ $photo }}" class="gallery-img w-full h-auto rounded-lg object-cover opacity-0 transition-all duration-[1500ms] ease-out group-hover:scale-105" />
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 z-10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white opacity-0 group-hover:opacity-100 text-3xl transform scale-50 group-hover:scale-100 transition-all duration-300"></i>
                    </div>
                </div>
            @endforeach
        </section>
        <div class="absolute bottom-0 left-0 w-full h-32 md:h-56 bg-gradient-to-t from-gray-50 via-gray-50/80 to-transparent pointer-events-none z-20"></div>
    </div>

</main>

{{-- ── CUSTOM POPUP LIGHTBOX ── --}}
<div id="gallery-lightbox" class="fixed inset-0 z-[120] hidden flex-col opacity-0 transition-opacity duration-300 no-select">
    
    <div id="lightbox-backdrop" class="absolute inset-0 bg-black/95 backdrop-blur-md cursor-pointer"></div>
    
    <button id="lightbox-close" class="absolute top-4 right-4 md:top-6 md:right-8 z-[130] w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/10 hover:bg-[#C89B5F] flex items-center justify-center text-white transition-all backdrop-blur-sm shadow-lg">
        <i class="fas fa-times text-xl"></i>
    </button>

    {{-- ░░ ZOOM CONTROLS ░░ --}}
    <div id="zoom-controls" class="hidden md:flex absolute top-4 right-[4rem] md:top-6 md:right-[5.5rem] items-center gap-3 z-[130] pointer-events-auto transition-all">                
        
        {{-- Tombol Plus (Kiri) --}}
        <button id="btn-zoom-in" class="w-10 h-10 md:w-11 md:h-11 rounded-full bg-[#E8E9EB] text-[#1A1A1A] hover:bg-white hover:scale-105 transition-all flex items-center justify-center shadow-md focus:outline-none cursor-pointer" title="Zoom In">
            <i class="fas fa-search-plus text-[1.1rem]"></i>
        </button>
        
        {{-- Tombol Minus (Kanan) --}}
        <button id="btn-zoom-out" class="w-10 h-10 md:w-11 md:h-11 rounded-full bg-[#E8E9EB] text-[#A0A0A0] opacity-60 cursor-not-allowed transition-all flex items-center justify-center shadow-md focus:outline-none" title="Zoom Out">
            <i class="fas fa-search-minus text-[1.1rem]"></i>
        </button>

    </div>

    <div class="relative flex-1 min-h-0 w-full flex items-center justify-center mt-16 md:mt-0 px-12 md:px-24">
        
        <button id="lightbox-prev" class="absolute left-2 md:left-8 top-1/2 -translate-y-1/2 z-[130] w-10 h-10 md:w-14 md:h-14 rounded-full bg-white/10 hover:bg-[#C89B5F] flex items-center justify-center text-white transition-all backdrop-blur-sm shadow-lg">
            <i class="fas fa-chevron-left text-lg md:text-xl"></i>
        </button>

        <div id="lightbox-img-wrapper" class="relative w-full h-full flex items-center justify-center touch-none">
            <img id="lightbox-main-img" src="" alt="Gallery Preview" 
                 class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-transform duration-300 ease-out cursor-zoom-in opacity-0 transform-gpu origin-center touch-none">
        </div>

        <button id="lightbox-next" class="absolute right-2 md:right-8 top-1/2 -translate-y-1/2 z-[130] w-10 h-10 md:w-14 md:h-14 rounded-full bg-white/10 hover:bg-[#C89B5F] flex items-center justify-center text-white transition-all backdrop-blur-sm shadow-lg">
            <i class="fas fa-chevron-right text-lg md:text-xl"></i>
        </button>
    </div>

    <div class="relative w-full h-28 md:h-36 shrink-0 flex items-center justify-center pb-4 md:pb-6 px-4 pointer-events-auto">
        <div id="lightbox-thumbnails" class="flex gap-2 md:gap-3 overflow-x-auto scrollbar-hide py-2 px-2 snap-x snap-mandatory items-center max-w-5xl w-full justify-start cursor-grab active:cursor-grabbing transform-gpu">
            {{-- Thumbnails JS --}}
        </div>
    </div>
</div>

{{-- ░ FOOTER ░ --}}
@include('sections._footer')

@endsection

{{-- ── SCRIPT GABUNGAN ── --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. SCRIPT NAVBAR EFEK MELAYANG (SYNCED DENGAN ABOUT) ---
    const navWrapper = document.getElementById('nav-wrapper');
    const mainNav = document.getElementById('main-nav');
    const navMenu = document.getElementById('nav-menu');
    const navLogoLink = document.getElementById('nav-logo-link'); 
    const logoImg = navLogoLink.querySelector('img'); 
    const navCtaWrapper = document.getElementById('nav-cta-wrapper');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navWrapper.classList.remove('pt-4', 'sm:pt-6', 'md:pt-8');
            navWrapper.classList.add('pt-3', 'md:pt-4');
            
            mainNav.classList.remove('max-w-full', 'border-transparent', 'items-start', 'md:items-start');
            mainNav.classList.add('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center', 'md:items-center');
            
            if(navMenu) navMenu.classList.remove('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.remove('-mt-2');

            logoImg.classList.remove('w-[70px]', 'h-[70px]', 'md:w-[100px]', 'md:h-[100px]');
            logoImg.classList.add('w-[50px]', 'h-[50px]', 'md:w-14', 'md:h-14'); 
        } else {
            navWrapper.classList.add('pt-4', 'sm:pt-6', 'md:pt-8');
            navWrapper.classList.remove('pt-3', 'md:pt-4');

            mainNav.classList.add('max-w-full', 'border-transparent', 'items-start', 'md:items-start');
            mainNav.classList.remove('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center', 'md:items-center');
            
            if(navMenu) navMenu.classList.add('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.add('-mt-2');

            logoImg.classList.add('w-[70px]', 'h-[70px]', 'md:w-[100px]', 'md:h-[100px]');
            logoImg.classList.remove('w-[50px]', 'h-[50px]', 'md:w-14', 'md:h-14');
        }
    });

    // --- 2. SCRIPT MENU MOBILE ---
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileWrapper = document.getElementById('mobile-menu-wrapper');
    const mobilePanel = document.getElementById('mobile-menu-panel');
    const mobileBackdrop = document.getElementById('mobile-menu-backdrop');
    const mobileClose = document.getElementById('mobile-menu-close');
    
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

    // --- 3. LAZY LOAD GAMBAR ---
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.getAttribute('data-src');
                img.onload = () => img.classList.replace('opacity-0', 'opacity-100');
                observer.unobserve(img);
            }
        });
    }, { rootMargin: '50px', threshold: 0.1 });

    document.querySelectorAll('.gallery-img').forEach(img => imageObserver.observe(img));

    // --- 4. ADVANCED ZOOM LIGHTBOX ENGINE ---
    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxMainImg = document.getElementById('lightbox-main-img');
    const imgWrapper = document.getElementById('lightbox-img-wrapper');
    const lightboxThumbContainer = document.getElementById('lightbox-thumbnails');
    const items = document.querySelectorAll('.gallery-item');
    
    let currentIndex = 0;
    const imagesSrc = [];
    
    let scale = 1;
    let panning = false;
    let pointX = 0;
    let pointY = 0;
    let startX = 0;
    let startY = 0;
    let initialPinchDistance = null;
    let initialScale = 1;
    let lastTap = 0;

    items.forEach((item, index) => {
        const src = item.querySelector('img').getAttribute('data-src') || item.querySelector('img').src;
        imagesSrc.push(src);

        const thumbBtn = document.createElement('div');
        thumbBtn.className = `shrink-0 snap-center w-14 h-10 md:w-20 md:h-14 rounded-md overflow-hidden cursor-pointer border-2 transition-all duration-300 transform-gpu bg-gray-800 ${index === 0 ? 'border-[#C89B5F] scale-110 opacity-100' : 'border-transparent opacity-40 hover:opacity-100'}`;
        
        const thumbImg = document.createElement('img');
        thumbImg.setAttribute('loading', 'lazy');
        thumbImg.src = src;
        thumbImg.className = 'w-full h-full object-cover';
        
        thumbBtn.appendChild(thumbImg);
        lightboxThumbContainer.appendChild(thumbBtn);

        item.addEventListener('click', () => openLightbox(index));
        thumbBtn.addEventListener('click', () => updateLightbox(index));
    });

    const thumbsList = Array.from(lightboxThumbContainer.children);

    function openLightbox(index) {
        lightbox.classList.remove('hidden');
        setTimeout(() => {
            lightbox.classList.remove('opacity-0');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden'; 
            updateLightbox(index);
        }, 10);
    }

    function closeLightbox() {
        lightbox.classList.add('opacity-0');
        resetZoom();
        setTimeout(() => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = ''; 
        }, 300);
    }

    function updateLightbox(index) {
        currentIndex = index;
        resetZoom(); 
        lightboxMainImg.style.opacity = '0';
        
        setTimeout(() => {
            lightboxMainImg.src = imagesSrc[currentIndex];
            lightboxMainImg.onload = () => { lightboxMainImg.style.opacity = '1'; };
        }, 150);

        thumbsList.forEach((thumb, i) => {
            if (i === currentIndex) {
                thumb.className = 'shrink-0 snap-center w-14 h-10 md:w-20 md:h-14 rounded-md overflow-hidden cursor-pointer border-2 transition-all duration-300 transform-gpu bg-gray-800 border-[#C89B5F] scale-110 opacity-100';
                thumb.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            } else {
                thumb.className = 'shrink-0 snap-center w-14 h-10 md:w-20 md:h-14 rounded-md overflow-hidden cursor-pointer border-2 transition-all duration-300 transform-gpu bg-gray-800 border-transparent opacity-40 hover:opacity-100';
            }
        });
    }

    // --- LOGIKA KLIK TOMBOL ICONS + DAN - ---
    const btnZoomIn = document.getElementById('btn-zoom-in');
    const btnZoomOut = document.getElementById('btn-zoom-out');

    if(btnZoomIn) {
        btnZoomIn.addEventListener('click', (e) => {
            if (scale >= 4) return; // Maksimal zoom
            e.stopPropagation(); 
            scale = Math.min(scale + 0.5, 4); 
            lightboxMainImg.classList.remove('transition-none');
            setTransform();
        });
    }

    if(btnZoomOut) {
        btnZoomOut.addEventListener('click', (e) => {
            if (scale <= 1) return; // Minimal zoom
            e.stopPropagation();
            scale = Math.max(scale - 0.5, 1); 
            if (scale === 1) resetZoom();
            else {
                lightboxMainImg.classList.remove('transition-none');
                setTransform();
            }
        });
    }

    // --- ENGINE LOGIKA ZOOM & DRAG ---
    function setTransform() {
        lightboxMainImg.style.transform = `translate(${pointX}px, ${pointY}px) scale(${scale})`;
        
        if(btnZoomIn && btnZoomOut) {
            // Logika Tombol Minus (Zoom Out)
            if (scale <= 1) {
                btnZoomOut.classList.add('text-[#A0A0A0]', 'opacity-60', 'cursor-not-allowed');
                btnZoomOut.classList.remove('text-[#1A1A1A]', 'hover:bg-white', 'hover:scale-105', 'cursor-pointer');
            } else {
                btnZoomOut.classList.remove('text-[#A0A0A0]', 'opacity-60', 'cursor-not-allowed');
                btnZoomOut.classList.add('text-[#1A1A1A]', 'hover:bg-white', 'hover:scale-105', 'cursor-pointer');
            }

            // Logika Tombol Plus (Zoom In)
            if (scale >= 4) {
                btnZoomIn.classList.add('text-[#A0A0A0]', 'opacity-60', 'cursor-not-allowed');
                btnZoomIn.classList.remove('text-[#1A1A1A]', 'hover:bg-white', 'hover:scale-105', 'cursor-pointer');
            } else {
                btnZoomIn.classList.remove('text-[#A0A0A0]', 'opacity-60', 'cursor-not-allowed');
                btnZoomIn.classList.add('text-[#1A1A1A]', 'hover:bg-white', 'hover:scale-105', 'cursor-pointer');
            }
        }

        if(scale > 1) {
            lightboxMainImg.classList.replace('cursor-zoom-in', 'cursor-grab');
        } else {
            lightboxMainImg.classList.replace('cursor-grab', 'cursor-zoom-in');
            lightboxMainImg.classList.remove('cursor-grabbing');
        }
    }

    function resetZoom() {
        scale = 1; pointX = 0; pointY = 0;
        lightboxMainImg.classList.remove('transition-none'); 
        setTransform();
    }

    // EVENT SCROLL ZOOM DI DESKTOP SUDAH DIHAPUS TOTAL

    lightboxMainImg.addEventListener('mousedown', (e) => {
        e.preventDefault();
        if (scale > 1) {
            panning = true;
            startX = e.clientX - pointX; startY = e.clientY - pointY;
            lightboxMainImg.classList.add('cursor-grabbing', 'transition-none'); 
        }
    });

    window.addEventListener('mousemove', (e) => {
        if (!panning) return;
        pointX = e.clientX - startX; pointY = e.clientY - startY;
        setTransform();
    });

    window.addEventListener('mouseup', () => {
        panning = false;
        lightboxMainImg.classList.remove('cursor-grabbing');
    });

    imgWrapper.addEventListener('touchstart', (e) => {
        if (e.touches.length === 2) {
            initialPinchDistance = Math.hypot(e.touches[0].pageX - e.touches[1].pageX, e.touches[0].pageY - e.touches[1].pageY);
            initialScale = scale;
            lightboxMainImg.classList.add('transition-none');
        } else if (e.touches.length === 1 && scale > 1) {
            panning = true;
            startX = e.touches[0].pageX - pointX; startY = e.touches[0].pageY - pointY;
            lightboxMainImg.classList.add('transition-none');
        }
    }, {passive: false});

    imgWrapper.addEventListener('touchmove', (e) => {
        if (e.touches.length === 2 && initialPinchDistance) {
            e.preventDefault(); 
            const currentDistance = Math.hypot(e.touches[0].pageX - e.touches[1].pageX, e.touches[0].pageY - e.touches[1].pageY);
            const pinchScale = currentDistance / initialPinchDistance;
            scale = Math.min(Math.max(1, initialScale * pinchScale), 4);
            setTransform();
        } else if (e.touches.length === 1 && panning) {
            e.preventDefault();
            pointX = e.touches[0].pageX - startX; pointY = e.touches[0].pageY - startY;
            setTransform();
        }
    }, {passive: false});

    imgWrapper.addEventListener('touchend', (e) => {
        if (e.touches.length < 2) initialPinchDistance = null;
        if (e.touches.length === 0) panning = false;
        if (scale < 1) resetZoom(); 
        lightboxMainImg.classList.remove('transition-none'); 
        
        let currentTime = new Date().getTime();
        let tapLength = currentTime - lastTap;
        if (tapLength < 300 && tapLength > 0 && e.touches.length === 0) {
            if (scale > 1) resetZoom();
            else { scale = 2.5; lightboxMainImg.classList.remove('transition-none'); setTransform(); }
            e.preventDefault();
        }
        lastTap = currentTime;
    });

    document.getElementById('lightbox-close').addEventListener('click', closeLightbox);
    document.getElementById('lightbox-backdrop').addEventListener('click', closeLightbox);
    
    document.getElementById('lightbox-prev').addEventListener('click', () => {
        let newIndex = currentIndex - 1;
        if (newIndex < 0) newIndex = imagesSrc.length - 1;
        updateLightbox(newIndex);
    });

    document.getElementById('lightbox-next').addEventListener('click', () => {
        let newIndex = currentIndex + 1;
        if (newIndex >= imagesSrc.length) newIndex = 0;
        updateLightbox(newIndex);
    });

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('hidden')) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') document.getElementById('lightbox-prev').click();
            if (e.key === 'ArrowRight') document.getElementById('lightbox-next').click();
        }
    });

    // --- 5. MOUSE DRAG UNTUK THUMBNAIL (DESKTOP) ---
    const thumbContainer = document.getElementById('lightbox-thumbnails');
    let isThumbDown = false;
    let thumbStartX;
    let thumbScrollLeft;

    thumbContainer.addEventListener('mousedown', (e) => {
        isThumbDown = true;
        thumbContainer.classList.add('cursor-grabbing');
        thumbContainer.classList.remove('snap-x', 'snap-mandatory'); 
        thumbStartX = e.pageX - thumbContainer.offsetLeft;
        thumbScrollLeft = thumbContainer.scrollLeft;
    });

    thumbContainer.addEventListener('mouseleave', () => {
        isThumbDown = false;
        thumbContainer.classList.remove('cursor-grabbing');
        thumbContainer.classList.add('snap-x', 'snap-mandatory');
    });

    thumbContainer.addEventListener('mouseup', () => {
        isThumbDown = false;
        thumbContainer.classList.remove('cursor-grabbing');
        thumbContainer.classList.add('snap-x', 'snap-mandatory');
    });

    thumbContainer.addEventListener('mousemove', (e) => {
        if (!isThumbDown) return;
        e.preventDefault(); 
        const x = e.pageX - thumbContainer.offsetLeft;
        const walk = (x - thumbStartX) * 2; 
        thumbContainer.scrollLeft = thumbScrollLeft - walk;
    });

// 3. SCROLL REVEAL ANIMATION
const revealElements = document.querySelectorAll('.reveal-left, .reveal-right, .reveal-zoom');
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