@extends('layouts.app')

@section('title', 'About Us - Bali Coconut Art')

@section('content')

{{-- ── CSS Animasi Scroll Reveal & Text Glow ── --}}
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
    .reveal-zoom {
        opacity: 0;
        transform: scale(0.85);
        transition: opacity 0.7s ease, transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .reveal-zoom.is-visible {
        opacity: 1;
        transform: scale(1);
    }

    /* ── EFEK SHADOW TEKS SUPER LEMBUT (KABUT ABU-ABU) ── */
    .text-soft-glow {
        text-shadow: 
            0px 2px 8px rgba(50, 60, 70, 0.4),   
            0px 8px 24px rgba(50, 60, 70, 0.3),  
            0px 15px 45px rgba(50, 60, 70, 0.2); 
    }
</style>

{{-- ── 1. FLOATING NAVBAR (Disamakan dengan Services: Putih di awal) ── --}}
<div id="nav-wrapper" class="fixed top-0 inset-x-0 z-[90] flex justify-center px-4 md:px-6 pt-4 sm:pt-6 md:pt-8 transition-all duration-500 pointer-events-none">

    <nav id="main-nav" class="pointer-events-auto flex justify-between items-start md:items-start w-full max-w-full px-4 py-2 transition-all duration-[600ms] ease-[cubic-bezier(0.34,1.56,0.64,1)] rounded-full border border-transparent">
            
        {{-- KIRI: LOGO BRAND --}}
        <a href="{{ url('/#home') }}" id="nav-logo-link" class="flex items-center md:items-start group transition-all duration-500 w-auto md:w-[180px]">
            {{-- Menggunakan invert agar putih di awal --}}
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-[70px] h-[70px] md:w-[100px] md:h-[100px] object-contain group-hover:scale-105 transition-all duration-500 brightness-0 invert">
        </a>

        {{-- HAMBURGER BUTTON (MOBILE ONLY) --}}
        <div class="flex md:hidden items-center ml-auto mt-2">
            <button id="mobile-menu-btn" class="text-white hover:text-[#8CC63F] transition-colors p-2 focus:outline-none">
                <i class="fas fa-bars text-2xl transition-colors duration-300"></i>
            </button>
        </div>

        {{-- TENGAH: MENU NAVIGASI DESKTOP --}}
        <div id="nav-menu" class="hidden md:flex flex-1 justify-center items-center gap-2 lg:gap-4 text-sm md:text-base font-bold tracking-wide -mt-2 transition-all duration-500">
            <a href="{{ url('/#home') }}" class="menu-link px-4 py-2 rounded-full text-white/90 hover:text-white hover:bg-white/20 transition-all duration-300">Home</a>
            <a href="{{ url('/about') }}" class="menu-link px-4 py-2 rounded-full text-white bg-white/20 transition-all duration-300">About</a>
            <a href="{{ route('services') }}" class="menu-link px-4 py-2 rounded-full text-white/90 hover:text-white hover:bg-white/20 transition-all duration-300">Services</a>
            <a href="{{ route('gallery') }}" class="menu-link px-4 py-2 rounded-full text-white/90 hover:text-white hover:bg-white/20 transition-all duration-300">Gallery</a>
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

        <div class="flex items-center justify-between mb-10 relative z-10">
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-20 h-20 object-contain brightness-0 -ml-2">
            <button id="mobile-menu-close" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-500 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] hover:rotate-90 transition-all duration-300 shadow-sm">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        
        <div class="flex flex-col gap-1 mt-4">
            <a href="{{ url('/#home') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#5B8C2A]">
                <span class="w-0 h-[2px] bg-[#8CC63F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>Home
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>

            <a href="{{ url('/about') }}" class="mobile-link group relative flex items-center text-[#8CC63F] font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300">
                <span class="w-6 h-[2px] bg-[#8CC63F] transition-all duration-300 mr-3 inline-block"></span>About
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

        <a href="{{ route('contact') }}" class="mobile-link mt-10 relative overflow-hidden group flex items-center justify-center bg-gray-900 text-white px-8 py-4 rounded-full font-bold tracking-[0.2em] uppercase text-xs shadow-xl transition-all duration-300">
            <span class="absolute inset-0 bg-gradient-to-r from-[#D0E9A8] to-[#78B83A] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
            <span class="relative z-10 group-hover:text-gray-900 transition-colors duration-300">Contact Us</span>
        </a>

        <div class="mt-auto pb-10 flex flex-col items-center">
            <div class="flex gap-4 mb-5">
                <a href="https://instagram.com/balicoconutart" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] transition-all duration-300"><i class="fab fa-instagram text-sm"></i></a>
                <a href="https://wa.me/6282146445465" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] transition-all duration-300"><i class="fab fa-whatsapp text-sm"></i></a>
                <a href="https://facebook.com/balicoconutart" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] transition-all duration-300"><i class="fab fa-facebook-f text-sm"></i></a>
            </div>
            <p class="text-[0.6rem] text-gray-400 font-medium tracking-[0.25em] uppercase">Bali Coconut Art</p>
        </div>
        
    </div>
</div>

{{-- ── WRAPPER UTAMA KONTEN ── --}}
<main class="w-full bg-white flex flex-col font-sans min-h-screen overflow-x-hidden">
    
{{-- ░░ 2. HEADER HERO BOX (Dengan Soft Glow Shadow, Persis Services) ░░ --}}
<section class="w-full relative pt-[160px] md:pt-[200px] pb-32 md:pb-48 px-4 md:px-6 text-center overflow-hidden">
    
    {{-- BACKGROUND GAMBAR --}}
    <img src="{{ asset('images/n2.webp') }}" alt="About Header Background" class="absolute inset-0 w-full h-full object-cover z-0">

    {{-- OVERLAY HIJAU TUA TIPIS — bantu kontras teks & selaraskan tone dengan brand --}}
    <div class="absolute inset-0 bg-[#10240E]/25 z-10 pointer-events-none"></div>

    {{-- 2. GRADASI PUTIH SMOOTH DI BATAS BAWAH FOTO (lebih pendek) --}}
    <div class="absolute inset-x-0 -bottom-2 h-40 md:h-56 bg-[linear-gradient(to_top,#ffffff_0%,#ffffff_15%,rgba(255,255,255,0.9)_35%,rgba(255,255,255,0.55)_60%,rgba(255,255,255,0.2)_82%,rgba(255,255,255,0)_100%)] z-20 pointer-events-none"></div>

    {{-- KONTEN TEXT (Memakai custom class text-soft-glow) --}}
    <div class="max-w-3xl mx-auto relative z-30 flex flex-col items-center">
        
        <div class="flex items-center gap-4 mb-5 text-soft-glow">
            <span class="w-8 md:w-12 h-[1px] bg-white"></span>
            <span class="text-white text-[0.65rem] sm:text-xs font-bold tracking-[0.3em] uppercase">About Us</span>
            <span class="w-8 md:w-12 h-[1px] bg-white"></span>
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-[4.5rem] text-white leading-[1.1] mb-2 md:mb-3 tracking-tight font-extrabold font-sans uppercase reveal-left text-soft-glow">
            BEYOND THE <br class="sm:hidden">
            <span class="font-serif italic font-light capitalize text-gray-100 tracking-normal ml-1">Shell</span>
        </h1>
        
        <p class="text-white/95 text-[0.95rem] md:text-[1.1rem] leading-[2.2] font-light max-w-2xl mx-auto px-2 reveal-right text-soft-glow">
            We exist for one purpose: to ensure that every coconut placed before your VIP guests is a statement of elegance. We don't just supply coconuts; <strong class="font-medium text-white">we craft premium tropical experiences.</strong>
        </p>
    </div>
</section>

    {{-- ░░ 3. THREE CORE VALUES ░░ --}}
    <section class="w-full py-16 md:py-24 px-5 md:px-6 bg-white font-sans relative z-30">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-12">
                
                <div class="text-center group reveal-zoom">
                    <div class="w-16 h-16 mx-auto mb-5 md:mb-6 bg-[#8CC63F]/20 text-[#8CC63F] rounded-full flex items-center justify-center text-2xl group-hover:bg-[#8CC63F] group-hover:text-white transition-all duration-300">
                        <i class="fas fa-hand-sparkles"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-3 md:mb-4">Uncompromised Hygiene</h3>
                    <p class="text-gray-600 text-[0.95rem] leading-[1.85] font-light md:px-4">
                        Deep-cleaned and sanitised with food-grade protocols. We uphold standards appropriate for the world's most discerning hospitality environments.
                    </p>
                </div>

                <div class="text-center group reveal-zoom" style="transition-delay: 0.15s;">
                    <div class="w-16 h-16 mx-auto mb-5 md:mb-6 bg-[#8CC63F]/20 text-[#8CC63F] rounded-full flex items-center justify-center text-2xl group-hover:bg-[#8CC63F] group-hover:text-white transition-all duration-300">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-3 md:mb-4">Precision Engraving</h3>
                    <p class="text-gray-600 text-[0.95rem] leading-[1.85] font-light md:px-4">
                        Advanced laser technology translates your logo into a permanent, tactile impression, turning a simple fruit into a luxurious branding canvas.
                    </p>
                </div>

                <div class="text-center group reveal-zoom" style="transition-delay: 0.3s;">
                    <div class="w-16 h-16 mx-auto mb-5 md:mb-6 bg-[#8CC63F]/20 text-[#8CC63F] rounded-full flex items-center justify-center text-2xl group-hover:bg-[#8CC63F] group-hover:text-white transition-all duration-300">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-3 md:mb-4">White-Glove Service</h3>
                    <p class="text-gray-600 text-[0.95rem] leading-[1.85] font-light md:px-4">
                        Our highly trained on-site staff seamlessly integrate with your team, ensuring every guest receives their coconut with ceremony and care.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ░░ 4. LOCAL EMPOWERMENT & EXPERIENCE ░░ --}}
    <section class="w-full py-16 lg:py-24 px-5 md:px-6 bg-gray-50 font-sans border-t border-gray-100">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-center">
            
            <div class="relative group overflow-hidden rounded-2xl shadow-xl reveal-left">
                <img src="{{ asset('images/g5.webp') }}" alt="Luxury Coconut Service" class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                <div class="absolute bottom-5 md:bottom-6 left-5 md:left-6 right-5 md:right-6">
                    <p class="text-white font-bold tracking-widest uppercase text-xs md:text-sm mb-1">100% Sourced from</p>
                    <p class="text-white text-xl md:text-2xl font-serif italic">Bali's Finest Farms</p>
                </div>
            </div>

            <div class="text-center lg:text-left reveal-right">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 uppercase leading-tight mb-5 md:mb-6">
                    Rooted in Bali, <br> <span class="text-[#8CC63F]">Grown with Purpose</span>
                </h2>
                <p class="text-gray-600 text-[0.95rem] md:text-[1.05rem] leading-[1.8] md:leading-[1.9] font-light mb-5 md:mb-6">
                    Every coconut we supply is sourced exclusively from Bali's most skilled local farmers. By choosing Bali Coconut Art, your property directly strengthens the Balinese agricultural community.
                </p>
                <p class="text-gray-600 text-[0.95rem] md:text-[1.05rem] leading-[1.8] md:leading-[1.9] font-light mb-8 md:mb-10">
                    Whether it is a poolside service at your flagship resort or the centrepiece of a luxury beach wedding, we work closely with your F&B teams to align every presentation with your occasion's theme.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-3 sm:gap-4">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-gray-900 text-white px-8 py-3.5 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-[#5B8C2A] hover:shadow-lg transition-all duration-300">
                        Consult With Us
                    </a>
                    <a href="{{ route('gallery') }}" class="w-full sm:w-auto inline-flex justify-center items-center gap-2 border border-gray-300 text-gray-700 px-8 py-3.5 rounded-full text-sm font-bold uppercase tracking-widest hover:border-gray-900 hover:text-gray-900 transition-all duration-300">
                        View Gallery
                    </a>
                </div>
            </div>

        </div>
    </section>

</main>

{{-- ░░ 5. FOOTER ░░ --}}
@include('sections._footer')

{{-- ── SCRIPT ANIMASI NAVBAR, MOBILE MENU & SCROLL REVEAL ── --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    // 1. EFEK NAVBAR MELAYANG (Berubah menjadi hitam di background terang saat scroll)
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
            navWrapper.classList.remove('pt-4', 'sm:pt-6', 'md:pt-8');
            navWrapper.classList.add('pt-3', 'md:pt-4');
            
            mainNav.classList.remove('max-w-full', 'border-transparent', 'items-start', 'md:items-start');
            mainNav.classList.add('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center', 'md:items-center');
            
            navMenu.classList.remove('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.remove('-mt-2');

            // Hapus efek invert agar logo kembali ke warna aslinya
            logoImg.classList.remove('w-[70px]', 'h-[70px]', 'md:w-[100px]', 'md:h-[100px]', 'invert');
            logoImg.classList.add('w-[50px]', 'h-[50px]', 'md:w-14', 'md:h-14'); 

            if(mobileBtnIcon) {
                mobileBtnIcon.classList.remove('text-white');
                mobileBtnIcon.classList.add('text-gray-900');
            }

            // Ubah teks menu link menjadi abu/hijau
            navLinks.forEach(link => {
                link.classList.remove('text-white/90', 'text-white', 'hover:text-white', 'hover:bg-white/20');
                
                if(link.getAttribute('href').includes('about')) {
                    link.classList.add('text-[#8CC63F]', 'bg-[#D0E9A8]/30');
                } else {
                    link.classList.add('text-gray-800', 'hover:text-[#8CC63F]', 'hover:bg-[#D0E9A8]/20');
                }
            });
        } else {
            navWrapper.classList.add('pt-4', 'sm:pt-6', 'md:pt-8');
            navWrapper.classList.remove('pt-3', 'md:pt-4');

            mainNav.classList.add('max-w-full', 'border-transparent', 'items-start', 'md:items-start');
            mainNav.classList.remove('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center', 'md:items-center');
            
            navMenu.classList.add('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.add('-mt-2');

            // Tambahkan invert kembali karena di atas background gambar
            logoImg.classList.add('w-[70px]', 'h-[70px]', 'md:w-[100px]', 'md:h-[100px]', 'invert');
            logoImg.classList.remove('w-[50px]', 'h-[50px]', 'md:w-14', 'md:h-14');

            if(mobileBtnIcon) {
                mobileBtnIcon.classList.remove('text-gray-900');
                mobileBtnIcon.classList.add('text-white');
            }

            // Kembalikan teks putih
            navLinks.forEach(link => {
                link.classList.remove('text-gray-800', 'hover:text-[#8CC63F]', 'hover:bg-[#D0E9A8]/20', 'text-[#8CC63F]', 'bg-[#D0E9A8]/30');
                
                if(link.getAttribute('href').includes('about')) {
                    link.classList.add('text-white', 'bg-white/20');
                } else {
                    link.classList.add('text-white/90', 'hover:text-white', 'hover:bg-white/20');
                }
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
        setTimeout(() => {
            mobilePanel.classList.remove('translate-x-full');
        }, 10);
    }

    function closeMobileMenu() {
        mobilePanel.classList.add('translate-x-full');
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

@endsection