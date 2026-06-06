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
               hover:bg-[#C89B5F] transition-all duration-300">
    <i class="fas fa-arrow-up text-xs"></i>
</button>

<style>
    @keyframes gentle-drift {
        0% { transform: scale(1) translate(0px, 0px); }
        50% { transform: scale(1.05) translate(8px, 4px); }
        100% { transform: scale(1) translate(0px, 0px); }
    }
    .animate-gentle-drift {
        animation: gentle-drift 20s ease-in-out infinite; 
    }

    /* ── ANIMASI TEKS MUNCUL HALUS ── */
    @keyframes fade-up-smooth {
        /* Jarak awal dari bawah dijauhkan (20px) agar efek naiknya lebih terasa */
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-text-reveal {
        /* Durasi diperlambat dari 0.5s jadi 0.8s agar terasa jauh lebih 'smooth' dan mahal */
        animation: fade-up-smooth 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
    }

    /* ── KUNCI RESPONSIVE BACKGROUND ── */
    .bg-hero-1 { object-position: 65% center; }
    .bg-hero-2 { object-position: 60% center; }
    
    @media (min-width: 768px) {
        .bg-hero-1 { object-position: 15% center !important; }
        .bg-hero-2 { object-position: center !important; }
    }
</style>

{{-- ── FLOATING NAVBAR ── --}}
<div id="nav-wrapper" class="fixed top-0 inset-x-0 z-[90] flex justify-center px-4 md:px-6 pt-6 md:pt-8 transition-all duration-500 pointer-events-none">

    <nav id="main-nav" class="pointer-events-auto flex justify-between items-start md:items-start w-full max-w-full px-4 py-2 transition-all duration-[600ms] ease-[cubic-bezier(0.34,1.56,0.64,1)] rounded-full border border-transparent">
            
        {{-- KIRI: LOGO BRAND --}}
        <a href="{{ url('/#home') }}" id="nav-logo-link" class="flex items-center md:items-start group transition-all duration-500 w-auto md:w-[180px]">
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-16 h-16 md:w-[100px] md:h-[100px] object-contain group-hover:scale-105 transition-all duration-500">
        </a>

        {{-- HAMBURGER BUTTON (MOBILE ONLY) --}}
        <div class="flex md:hidden items-center ml-auto mt-2">
            <button id="mobile-menu-btn" class="text-white hover:text-[#C89B5F] transition-colors p-2 focus:outline-none">
                <i class="fas fa-bars text-2xl transition-colors duration-300"></i>
            </button>
        </div>

        {{-- TENGAH: MENU NAVIGASI DESKTOP --}}
        <div id="nav-menu" class="hidden md:flex flex-1 justify-center items-center gap-2 lg:gap-4 text-sm md:text-base font-bold tracking-wide -mt-2 transition-all duration-500">
            <a href="{{ url('/#home') }}" class="menu-link px-4 py-2 rounded-full text-white/80 hover:text-white hover:bg-white/20 transition-all duration-300">Home</a>
            <a href="{{ url('/about') }}" class="menu-link px-4 py-2 rounded-full text-white/80 hover:text-white hover:bg-white/20 transition-all duration-300">About</a>
            <a href="{{ route('services') }}" class="menu-link px-4 py-2 rounded-full text-white/80 hover:text-white hover:bg-white/20 transition-all duration-300">Services</a>            
            <a href="{{ route('gallery') }}" class="menu-link px-4 py-2 rounded-full text-white/80 hover:text-white hover:bg-white/20 transition-all duration-300">Gallery</a>
        </div>

        {{-- KANAN: TOMBOL CONTACT DESKTOP --}}
        <div id="nav-cta-wrapper" class="hidden md:flex justify-end items-start w-[180px] -mt-2 transition-all duration-500">
            <a href="{{ route('contact') }}" id="nav-cta-btn" 
               class="bg-gradient-to-r from-[#EADCC8] to-[#D9B78A] text-gray-900 px-7 py-2 rounded-full text-sm font-bold shadow-[0_0_15px_rgba(217,183,138,0.5)] hover:shadow-[0_0_20px_rgba(217,183,138,0.8)] hover:brightness-105 hover:scale-105 transition-all duration-300 flex items-center justify-center">
                Contact
            </a>
        </div>

    </nav>
</div>

{{-- ── OVERLAY MENU MOBILE (PREMIUM REDESIGN) ── --}}
<div id="mobile-menu-wrapper" class="fixed inset-0 z-[100] flex justify-end opacity-0 pointer-events-none transition-opacity duration-500">
    
    {{-- Latar Belakang Blur (Lebih Gelap & Dramatis) --}}
    <div id="mobile-menu-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-md cursor-pointer transition-opacity duration-500"></div>
    
    {{-- Panel Menu Putih (Meluncur dengan efek lengkung elegan) --}}
    <div id="mobile-menu-panel" class="relative w-[80%] max-w-sm h-full bg-white shadow-[-20px_0_40px_rgba(0,0,0,0.15)] flex flex-col pt-10 px-8 transform translate-x-full transition-transform duration-[600ms] ease-[cubic-bezier(0.25,1,0.5,1)] rounded-l-[2rem] overflow-hidden">
        
        {{-- Elemen Dekorasi Sudut Kanan Atas --}}
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#EADCC8]/40 to-transparent rounded-bl-full pointer-events-none -z-10"></div>

        {{-- Header Menu: Logo & Close Button --}}
        <div class="flex items-center justify-between mb-10 relative z-10">
            {{-- Ukuran diperbesar menjadi w-20 h-20 --}}
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-20 h-20 object-contain brightness-0 -ml-2">
            
            <button id="mobile-menu-close" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-500 hover:bg-[#C89B5F] hover:text-white hover:border-[#C89B5F] hover:rotate-90 transition-all duration-300 shadow-sm">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        
        {{-- Menu Links (Dengan efek interaktif garis emas) --}}
        <div class="flex flex-col gap-1 mt-4">
            <a href="{{ url('/#home') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#C89B5F]">
                <span class="w-0 h-[2px] bg-[#C89B5F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>
                Home
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>

            <a href="{{ url('/about') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#C89B5F]">
                <span class="w-0 h-[2px] bg-[#C89B5F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>
                About
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>

            <a href="{{ route('services') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#C89B5F]">
                <span class="w-0 h-[2px] bg-[#C89B5F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>
                Services
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>

            <a href="{{ route('gallery') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#C89B5F]">
                <span class="w-0 h-[2px] bg-[#C89B5F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>
                Gallery
            </a>
        </div>

        {{-- Luxury Contact Button --}}
        <a href="{{ route('contact') }}" class="mobile-link mt-10 relative overflow-hidden group flex items-center justify-center bg-gray-900 text-white px-8 py-4 rounded-full font-bold tracking-[0.2em] uppercase text-xs shadow-xl transition-all duration-300">
            <span class="absolute inset-0 bg-gradient-to-r from-[#EADCC8] to-[#D9B78A] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
            <span class="relative z-10 group-hover:text-gray-900 transition-colors duration-300">Contact Us</span>
        </a>

        {{-- Footer Menu (Socials & Branding) --}}
        <div class="mt-auto pb-10 flex flex-col items-center">
            <div class="flex gap-4 mb-5">
                {{-- Link Instagram --}}
                <a href="https://instagram.com/balicoconutart" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#C89B5F] hover:text-white hover:border-[#C89B5F] transition-all duration-300">
                    <i class="fab fa-instagram text-sm"></i>
                </a>
                
                {{-- Link WhatsApp --}}
                <a href="https://wa.me/6282146445465" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#C89B5F] hover:text-white hover:border-[#C89B5F] transition-all duration-300">
                    <i class="fab fa-whatsapp text-sm"></i>
                </a>

                {{-- Link Facebook --}}
                <a href="https://facebook.com/balicoconutart" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#C89B5F] hover:text-white hover:border-[#C89B5F] transition-all duration-300">
                    <i class="fab fa-facebook-f text-sm"></i>
                </a>
            </div>
            <p class="text-[0.6rem] text-gray-400 font-medium tracking-[0.25em] uppercase">Bali Coconut Art</p>
        </div>
        
    </div>
</div>
<main id="home" class="grain relative bg-white text-gray-900 overflow-hidden font-inter" style="height: calc(100vh + 85px);">
    
{{-- Background hero photos --}}
    <div id="hero-bg-container" class="absolute inset-0 w-full h-full bg-gray-900 pointer-events-none overflow-hidden z-0">
        <img src="{{ asset('images/bg.webp') }}" class="hero-bg-slide bg-hero-1 absolute inset-0 w-full h-full object-cover select-none transition-opacity duration-1000 ease-in-out opacity-100 animate-gentle-drift" alt="Background 1">
        {{-- Tambahkan bg-hero-2 di sini --}}
        <img src="{{ asset('images/bg2.webp') }}" class="hero-bg-slide bg-hero-2 absolute inset-0 w-full h-full object-cover select-none transition-opacity duration-1000 ease-in-out opacity-0" alt="Background 2">
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/50 to-transparent pointer-events-none"></div>
        <div class="absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-black/80 via-black/30 to-transparent pointer-events-none z-20"></div>

        {{-- Vertical sidebar rule (HIDDEN ON MOBILE agar logo aman) --}}
        <div class="sidebar-rule absolute left-40 top-0 h-screen z-10 pointer-events-none hidden md:block"></div>
    </div>

    {{-- DOTS SLIDER (Di tengah bawah saat Mobile, di kiri saat Desktop) --}}
    <aside class="absolute inset-x-0 bottom-32 md:inset-x-auto md:left-0 md:top-0 md:bottom-auto md:h-screen w-full md:w-40 flex flex-row md:flex-col justify-center items-center md:py-10 z-[80] pointer-events-none">
        <div class="flex flex-row md:flex-col gap-3 md:gap-4 relative z-30 pointer-events-auto items-center">
            <button data-slide="0" aria-label="Slide 1" class="hero-dot h-2 rounded-full bg-white transition-all duration-300 w-8 md:w-2 ring-0 md:ring-2 md:ring-white/50"></button>
            <button data-slide="1" aria-label="Slide 2" class="hero-dot w-2 h-2 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300"></button>
        </div>
    </aside>

    {{-- MAIN COLUMN --}}
    <div class="absolute left-0 md:left-40 right-0 top-0 h-screen z-[60] flex flex-col pointer-events-none">
        
    {{-- Hero Content --}}
        <div id="hero-text-content" class="flex-1 flex flex-col justify-center pt-24 md:pt-14 px-8 md:px-14 lg:px-20 max-w-5xl relative z-30 animate-text-reveal">
            
        {{-- ░░ HERO TITLE - LUXURY TYPOGRAPHY ░░ --}}
<h1 class="text-[2.4rem] sm:text-5xl lg:text-[4.5rem] font-extrabold text-white uppercase leading-[1.15] mb-6 drop-shadow-2xl tracking-tight">
    CUSTOM COCONUTS <br>
    
    <span class="inline-block mt-1 md:mt-2">
        <span class="font-serif italic font-light lowercase text-gray-200 text-[1.8rem] sm:text-4xl lg:text-[3.5rem] tracking-normal mr-2 sm:mr-3 align-middle">
            for
        </span>
        <span class="text-[#DEC484] align-middle">UNFORGETTABLE</span>
    </span> <br>
    
    MOMENTS
</h1>
            
            {{-- Subtitle --}}
            <p class="font-sans text-gray-200 text-[0.95rem] md:text-lg pr-4 md:pr-0 max-w-[280px] sm:max-w-md mb-8 md:mb-10 leading-relaxed font-light drop-shadow-md">
                Premium fresh coconuts with custom laser engraving for weddings, corporate events, and luxury resorts across Bali. Every sip tells your story.
            </p>
            
            {{-- CTA Buttons (Tetap dipertahankan karena sudah sempurna) --}}
            <div class="relative z-[60] pointer-events-auto flex flex-row flex-wrap gap-3 sm:gap-4 max-w-full mt-2">               
                
                {{-- Tombol Primary --}}
                <a href="#services" class="inline-flex items-center justify-center bg-white text-gray-900 rounded-full py-2.5 sm:py-3.5 px-6 sm:px-8 text-[0.75rem] md:text-base font-bold hover:bg-gray-100 hover:scale-105 transition-all duration-300 shadow-lg text-center whitespace-nowrap">
                    Our Packages
                </a>
                
                {{-- Tombol Secondary --}}
                <a href="{{ url('/#portfolio') }}" 
                   class="inline-flex items-center justify-center gap-1.5 sm:gap-2 border border-white/70 sm:border-white/40 text-white rounded-full py-2.5 sm:py-3.5 px-6 sm:px-8 text-[0.75rem] md:text-base font-bold backdrop-blur-md bg-black/10 sm:bg-white/10 hover:bg-white/20 transition-all duration-300 shadow-md text-center whitespace-nowrap"
                   style="text-shadow: 0px 2px 4px rgba(0,0,0,0.8);">
                    <span><span class="hidden sm:inline">Explore </span>Gallery</span>
                    <i class="fas fa-arrow-right text-[0.6rem] sm:text-xs"></i>
                </a>

            </div>
        </div>
        
        {{-- FLOATING IMAGE CARD (Disembunyikan di Mobile) --}}
        <div class="hidden md:block absolute bottom-6 right-6 md:bottom-12 md:right-12 z-[99] pointer-events-auto">
            <div class="w-40 h-32 sm:w-56 sm:h-44 md:w-72 md:h-56 rounded-2xl md:rounded-[2rem] overflow-hidden relative shadow-[0_0_15px_8px_rgba(255,255,255,0.4)] bg-gray-50 group">
                <img id="hero-slide-img" src="{{ asset('images/card1.webp') }}" class="w-full h-full object-cover transition-opacity duration-300 ease-in-out" alt="Fresh coconut event">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent pointer-events-none z-10"></div>
                <div class="absolute bottom-2 right-2 md:bottom-3 md:right-3 flex gap-2 z-[100] pointer-events-auto">
                    <button id="hero-prev" aria-label="Previous image" class="w-7 h-7 md:w-10 md:h-10 rounded-full flex items-center justify-center bg-gray-900 text-white hover:bg-white hover:text-gray-900 transition-all duration-200 cursor-pointer"><i class="fas fa-chevron-left text-[0.6rem] md:text-sm"></i></button>
                    <button id="hero-next" aria-label="Next image" class="w-7 h-7 md:w-10 md:h-10 rounded-full flex items-center justify-center bg-gray-900 text-white hover:bg-white hover:text-gray-900 transition-all duration-200 cursor-pointer"><i class="fas fa-chevron-right text-[0.6rem] md:text-sm"></i></button>
                </div>
            </div>
        </div>  
    </div>
</main>
    
<div class="w-full bg-white relative z-30 pt-[1px] pb-16">
    <div class="w-full flex justify-center px-4 md:px-12" style="margin-top: -90px;">
        
        {{-- KOTAK LAYANAN: Diubah menjadi Grid 2x2 di Mobile, Flex berjejer di Desktop --}}
        <div class="bg-white rounded-[2rem] shadow-[0_15px_50px_rgba(0,0,0,0.08)] max-w-6xl w-full py-8 md:py-12 px-4 md:px-8 grid grid-cols-2 gap-y-8 gap-x-2 md:flex md:flex-row md:justify-around items-start md:items-center border border-gray-50">
            
        {{-- Item 1 --}}
            <div class="group relative flex flex-col items-center text-center px-2 py-4 md:py-6 w-full md:w-1/4 cursor-pointer z-10">
                {{-- Ini dia div rahasia efek hover yang sempat hilang! --}}
                <div class="absolute inset-0 bg-gray-50 rounded-3xl scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 ease-out -z-10"></div>
                
                <div class="relative w-12 h-12 md:w-14 md:h-14 mb-4">
                    <div class="absolute inset-0 bg-[#C89B5F]/30 rounded-2xl opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rotate-6 group-hover:translate-x-0.5 group-hover:translate-y-0.5"></div>
                    <div class="absolute inset-0 bg-[#DEC484]/20 text-[#C89B5F] flex items-center justify-center text-xl md:text-2xl rounded-2xl transition-all duration-300 group-hover:bg-[#C89B5F] group-hover:text-white shadow-sm"><i class="fas fa-stamp"></i></div>
                </div>
                <h3 class="text-[1rem] md:text-2xl font-bold text-gray-900 font-oswald mb-2">Custom Logo</h3>
                <p class="text-[0.65rem] md:text-sm text-gray-500 md:text-gray-600 leading-relaxed mb-0 px-1 md:px-0">Laser-engraved company logos, initials, or custom designs.</p>
            </div>

            {{-- Divider Desktop Saja --}}
            <div class="hidden md:block w-px h-28 bg-gray-100"></div>

            {{-- Item 2 --}}
            <div class="group relative flex flex-col items-center text-center px-2 py-4 md:py-6 w-full md:w-1/4 cursor-pointer z-10">
                <div class="absolute inset-0 bg-gray-50 rounded-3xl scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 ease-out -z-10"></div>
                
                <div class="relative w-12 h-12 md:w-14 md:h-14 mb-4">
                    <div class="absolute inset-0 bg-[#C89B5F]/30 rounded-2xl opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rotate-6 group-hover:translate-x-0.5 group-hover:translate-y-0.5"></div>
                    <div class="absolute inset-0 bg-[#DEC484]/20 text-[#C89B5F] flex items-center justify-center text-xl md:text-2xl rounded-2xl transition-all duration-300 group-hover:bg-[#C89B5F] group-hover:text-white shadow-sm"><i class="fas fa-user-tie"></i></div>
                </div>
                <h3 class="text-[1rem] md:text-2xl font-bold text-gray-900 font-oswald mb-2">Staff Incharge</h3>
                <p class="text-[0.65rem] md:text-sm text-gray-500 md:text-gray-600 leading-relaxed mb-0 px-1 md:px-0">On-site professional staff to freshly open and serve coconuts.</p>
            </div>

            <div class="hidden md:block w-px h-28 bg-gray-100"></div>

            {{-- Item 3 --}}
            <div class="group relative flex flex-col items-center text-center px-2 py-4 md:py-6 w-full md:w-1/4 cursor-pointer z-10">
                <div class="absolute inset-0 bg-gray-50 rounded-3xl scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 ease-out -z-10"></div>
                
                <div class="relative w-12 h-12 md:w-14 md:h-14 mb-4">
                    <div class="absolute inset-0 bg-[#C89B5F]/30 rounded-2xl opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rotate-6 group-hover:translate-x-0.5 group-hover:translate-y-0.5"></div>
                    <div class="absolute inset-0 bg-[#DEC484]/20 text-[#C89B5F] flex items-center justify-center text-xl md:text-2xl rounded-2xl transition-all duration-300 group-hover:bg-[#C89B5F] group-hover:text-white shadow-sm"><i class="fas fa-truck"></i></div>
                </div>
                <h3 class="text-[1rem] md:text-2xl font-bold text-gray-900 font-oswald mb-2">Delivery</h3>
                <p class="text-[0.65rem] md:text-sm text-gray-500 md:text-gray-600 leading-relaxed mb-0 px-1 md:px-0">Safe and punctual delivery to any venue across Bali.</p>
            </div>

            <div class="hidden md:block w-px h-28 bg-gray-100"></div>

            {{-- Item 4 --}}
            <div class="group relative flex flex-col items-center text-center px-2 py-4 md:py-6 w-full md:w-1/4 cursor-pointer z-10">
                <div class="absolute inset-0 bg-gray-50 rounded-3xl scale-50 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500 ease-out -z-10"></div>
                
                <div class="relative w-12 h-12 md:w-14 md:h-14 mb-4">
                    <div class="absolute inset-0 bg-[#C89B5F]/30 rounded-2xl opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rotate-6 group-hover:translate-x-0.5 group-hover:translate-y-0.5"></div>
                    <div class="absolute inset-0 bg-[#DEC484]/20 text-[#C89B5F] flex items-center justify-center text-xl md:text-2xl rounded-2xl transition-all duration-300 group-hover:bg-[#C89B5F] group-hover:text-white shadow-sm"><i class="fas fa-glass-cheers"></i></div>
                </div>
                <h3 class="text-[1rem] md:text-2xl font-bold text-gray-900 font-oswald mb-2">Any Events</h3>
                <p class="text-[0.65rem] md:text-sm text-gray-500 md:text-gray-600 leading-relaxed mb-0 px-1 md:px-0">Perfect tropical beverage for weddings and corporate gatherings.</p>
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

    // 1. EFEK NAVBAR MELAYANG
    const navWrapper = document.getElementById('nav-wrapper');
    const mainNav = document.getElementById('main-nav');
    const navMenu = document.getElementById('nav-menu');
    const navLinks = document.querySelectorAll('.menu-link');    
    const navLogoLink = document.getElementById('nav-logo-link'); 
    const logoImg = navLogoLink.querySelector('img'); 
    const navCtaWrapper = document.getElementById('nav-cta-wrapper');
    const mobileBtnIcon = document.querySelector('#mobile-menu-btn i');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navWrapper.classList.remove('pt-6', 'md:pt-8', 'px-4', 'md:px-6');
            navWrapper.classList.add('pt-4', 'px-4', 'md:px-12');
            
            mainNav.classList.remove('max-w-full', 'border-transparent', 'items-start', 'md:items-start', 'px-4', 'py-2');
            mainNav.classList.add('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center', 'md:items-center');
            
            navMenu.classList.remove('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.remove('-mt-2');

            logoImg.classList.remove('w-16', 'h-16', 'md:w-[100px]', 'md:h-[100px]');
            logoImg.classList.add('w-10', 'h-10', 'md:w-14', 'md:h-14', 'brightness-0');

            if(mobileBtnIcon) {
                mobileBtnIcon.classList.remove('text-white');
                mobileBtnIcon.classList.add('text-gray-900');
            }

            navLinks.forEach(link => {
                link.classList.remove('text-white/80', 'hover:text-white', 'hover:bg-white/20');
                link.classList.add('text-gray-800', 'hover:text-[#C89B5F]', 'hover:bg-gradient-to-r', 'hover:from-[#EADCC8]/40', 'hover:to-[#D9B78A]/40');
            });
        } else {
            navWrapper.classList.add('pt-6', 'md:pt-8', 'px-4', 'md:px-6');
            navWrapper.classList.remove('pt-4', 'px-4', 'md:px-12');

            mainNav.classList.add('max-w-full', 'border-transparent', 'items-start', 'md:items-start', 'px-4', 'py-2');
            mainNav.classList.remove('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center', 'md:items-center');
            
            navMenu.classList.add('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.add('-mt-2');

            logoImg.classList.add('w-16', 'h-16', 'md:w-[100px]', 'md:h-[100px]');
            logoImg.classList.remove('w-10', 'h-10', 'md:w-14', 'md:h-14', 'brightness-0');

            if(mobileBtnIcon) {
                mobileBtnIcon.classList.remove('text-gray-900');
                mobileBtnIcon.classList.add('text-white');
            }

            navLinks.forEach(link => {
                link.classList.remove('text-gray-800', 'hover:text-[#C89B5F]', 'hover:bg-gradient-to-r', 'hover:from-[#EADCC8]/40', 'hover:to-[#D9B78A]/40');
                link.classList.add('text-white/80', 'hover:text-white', 'hover:bg-white/20');
            });
        }
    });

    // 2. SCRIPT MENU MOBILE (SIDE PANEL + BLUR)
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileWrapper = document.getElementById('mobile-menu-wrapper');
    const mobilePanel = document.getElementById('mobile-menu-panel');
    const mobileBackdrop = document.getElementById('mobile-menu-backdrop');
    const mobileClose = document.getElementById('mobile-menu-close');
    const mobileLinksOverlay = document.querySelectorAll('.mobile-link');

    function openMobileMenu() {
        mobileWrapper.classList.remove('opacity-0', 'pointer-events-none');
        // Sedikit delay agar transisi panel meluncur (slide) terlihat mulus
        setTimeout(() => {
            mobilePanel.classList.remove('translate-x-full');
        }, 10);
    }

    function closeMobileMenu() {
        mobilePanel.classList.add('translate-x-full');
        // Tunggu panel selesai meluncur keluar baru hilangkan background blurnya
        setTimeout(() => {
            mobileWrapper.classList.add('opacity-0', 'pointer-events-none');
        }, 300); 
    }

    if(mobileBtn) mobileBtn.addEventListener('click', openMobileMenu);
    if(mobileClose) mobileClose.addEventListener('click', closeMobileMenu);
    if(mobileBackdrop) mobileBackdrop.addEventListener('click', closeMobileMenu);
    
    mobileLinksOverlay.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });
    
    // 3. BACKGROUND SLIDER
    const slides = document.querySelectorAll('.hero-bg-slide');
    const dots = document.querySelectorAll('.hero-dot');
    let currentMainIndex = 0;
    let slideInterval;

    function updateMainSlide(index) {
        // Ambil elemen teks
        const heroTextContent = document.getElementById('hero-text-content');

        // Mainkan animasi teks berulang-ulang saat slide ganti
        if (heroTextContent) {
            heroTextContent.classList.remove('animate-text-reveal');
            void heroTextContent.offsetWidth; // Trik ajaib (reflow) agar animasi bisa di-restart
            heroTextContent.classList.add('animate-text-reveal');
        }

        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('opacity-0');
                slide.classList.add('opacity-100');
                slide.classList.remove('animate-gentle-drift');
                void slide.offsetWidth; 
                slide.classList.add('animate-gentle-drift');
            } else {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            }
        });

        dots.forEach((dot, i) => {
            if (i === index) {
                // Class saat aktif: Kapsul memanjang di HP (w-8, tanpa ring), Lingkaran bergaris di Desktop (md:w-2, md:ring-2)
                dot.className = 'hero-dot h-2 rounded-full bg-white transition-all duration-300 w-8 md:w-2 ring-0 md:ring-2 md:ring-white/50';
            } else {
                // Class saat tidak aktif: Titik kecil
                dot.className = 'hero-dot w-2 h-2 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300';
            }
        });
    }

    function nextMainSlide() {
        currentMainIndex = (currentMainIndex === slides.length - 1) ? 0 : currentMainIndex + 1;
        updateMainSlide(currentMainIndex);
    }

    function startAutoSlide() {
        slideInterval = setInterval(nextMainSlide, 10000); 
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

    startAutoSlide();

    // 4. CARD SLIDER
    const cardImg = document.getElementById('hero-slide-img');
    const cardPrev = document.getElementById('hero-prev');
    const cardNext = document.getElementById('hero-next');

    const cardImages = [
        "{{ asset('images/card1.webp') }}",
        "{{ asset('images/card2.webp') }}",
        "{{ asset('images/card3.webp') }}"
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
    
    // 5. ANIMASI BACK TO TOP
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