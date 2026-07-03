@extends('layouts.app')

@section('title', 'Our Services - Bali Coconut Art')

@section('content')

{{-- ── CUSTOM CSS UNTUK ANIMASI SCROLL REVEAL ── --}}
<style>
    .reveal-left { opacity: 0; transform: translateX(-60px); transition: all 1s cubic-bezier(0.25, 1, 0.5, 1); }
    .reveal-right { opacity: 0; transform: translateX(60px); transition: all 1s cubic-bezier(0.25, 1, 0.5, 1); }
    .reveal-up { opacity: 0; transform: translateY(50px); transition: all 1s cubic-bezier(0.25, 1, 0.5, 1); }
    
    .reveal-left.active, .reveal-right.active, .reveal-up.active {
        opacity: 1;
        transform: translate(0, 0);
    }

    .text-soft-glow {
        text-shadow: 
            0px 2px 8px rgba(50, 60, 70, 0.4),   /* Lapis 1: Dekat & tipis untuk penegas */
            0px 8px 24px rgba(50, 60, 70, 0.3),  /* Lapis 2: Menyebar menengah */
            0px 15px 45px rgba(50, 60, 70, 0.2); /* Lapis 3: Kabut sangat luas & pudar */
    }
</style>

{{-- ── 1. FLOATING ANIMATED NAVBAR ── --}}
<div id="nav-wrapper" class="fixed top-0 inset-x-0 z-[90] flex justify-center px-4 md:px-6 pt-4 sm:pt-6 md:pt-8 transition-all duration-500 pointer-events-none">
    <nav id="main-nav" class="pointer-events-auto flex justify-between items-start md:items-start w-full max-w-full px-4 py-2 transition-all duration-[600ms] ease-[cubic-bezier(0.34,1.56,0.64,1)] rounded-full border border-transparent">
            
        <a href="{{ url('/#home') }}" id="nav-logo-link" class="flex items-center md:items-start group transition-all duration-500 w-auto md:w-[180px]">
            {{-- Ditambahkan class 'invert' agar logo menjadi putih saat di atas gambar gelap --}}
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-[70px] h-[70px] md:w-[100px] md:h-[100px] object-contain group-hover:scale-105 transition-all duration-500 brightness-0 invert">
        </a>

        <div class="flex md:hidden items-center ml-auto mt-2">
            {{-- Icon hamburger diubah menjadi putih (text-white) --}}
            <button id="mobile-menu-btn" class="text-white hover:text-[#8CC63F] transition-colors p-2 focus:outline-none">
                <i class="fas fa-bars text-2xl transition-colors duration-300"></i>
            </button>
        </div>

        <div id="nav-menu" class="hidden md:flex flex-1 justify-center items-center gap-2 lg:gap-4 text-sm md:text-base font-bold tracking-wide -mt-2 transition-all duration-500">
            {{-- Menu links diubah menjadi putih (text-white/90) --}}
            <a href="{{ url('/#home') }}" class="menu-link px-4 py-2 rounded-full text-white/90 hover:text-white hover:bg-white/20 transition-all duration-300">Home</a>
            <a href="{{ url('/about') }}" class="menu-link px-4 py-2 rounded-full text-white/90 hover:text-white hover:bg-white/20 transition-all duration-300">About</a>
            <a href="{{ route('services') }}" class="menu-link px-4 py-2 rounded-full text-white bg-white/20 transition-all duration-300">Services</a>
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
    
    {{-- Latar Belakang Blur --}}
    <div id="mobile-menu-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-md cursor-pointer transition-opacity duration-500"></div>
    
    {{-- Panel Menu --}}
    <div id="mobile-menu-panel" class="relative w-[80%] max-w-sm h-full bg-white shadow-[-20px_0_40px_rgba(0,0,0,0.15)] flex flex-col pt-10 px-8 transform translate-x-full transition-transform duration-[600ms] ease-[cubic-bezier(0.25,1,0.5,1)] rounded-l-[2rem] overflow-hidden">
        
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#D0E9A8]/40 to-transparent rounded-bl-full pointer-events-none -z-10"></div>

        {{-- Header: Logo & Close --}}
        <div class="flex items-center justify-between mb-10 relative z-10">
            <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art" class="w-20 h-20 object-contain brightness-0 -ml-2">
            <button id="mobile-menu-close" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-500 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] hover:rotate-90 transition-all duration-300 shadow-sm">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        
        {{-- Menu Links --}}
        <div class="flex flex-col gap-1 mt-4">
            <a href="{{ url('/#home') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#5B8C2A]">
                <span class="w-0 h-[2px] bg-[#8CC63F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>
                Home
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>

            <a href="{{ url('/about') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#5B8C2A]">
                <span class="w-0 h-[2px] bg-[#8CC63F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>
                About
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>

            <a href="{{ route('services') }}" class="mobile-link group relative flex items-center text-[#8CC63F] font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300">
                <span class="w-6 h-[2px] bg-[#8CC63F] transition-all duration-300 mr-3 inline-block"></span>
                Services
            </a>
            <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 to-transparent"></div>

            <a href="{{ route('gallery') }}" class="mobile-link group relative flex items-center text-gray-900 font-Inter text-l tracking-[0.15em] uppercase py-4 transition-all duration-300 hover:text-[#5B8C2A]">
                <span class="w-0 h-[2px] bg-[#8CC63F] transition-all duration-300 group-hover:w-6 mr-0 group-hover:mr-3 inline-block"></span>
                Gallery
            </a>
        </div>

        {{-- Contact Button --}}
        <a href="{{ route('contact') }}" class="mobile-link mt-10 relative overflow-hidden group flex items-center justify-center bg-gray-900 text-white px-8 py-4 rounded-full font-bold tracking-[0.2em] uppercase text-xs shadow-xl transition-all duration-300">
            <span class="absolute inset-0 bg-gradient-to-r from-[#D0E9A8] to-[#78B83A] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
            <span class="relative z-10 group-hover:text-gray-900 transition-colors duration-300">Contact Us</span>
        </a>

        {{-- Footer: Socials --}}
        <div class="mt-auto pb-10 flex flex-col items-center">
            <div class="flex gap-4 mb-5">
                <a href="https://instagram.com/balicoconutart" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] transition-all duration-300">
                    <i class="fab fa-instagram text-sm"></i>
                </a>
                <a href="https://wa.me/6282146445465" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] transition-all duration-300">
                    <i class="fab fa-whatsapp text-sm"></i>
                </a>
                <a href="https://facebook.com/balicoconutart" target="_blank" class="w-9 h-9 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#5B8C2A] hover:text-white hover:border-[#5B8C2A] transition-all duration-300">
                    <i class="fab fa-facebook-f text-sm"></i>
                </a>
            </div>
            <p class="text-[0.6rem] text-gray-400 font-medium tracking-[0.25em] uppercase">Bali Coconut Art</p>
        </div>
        
    </div>
</div>

{{-- ── WRAPPER UTAMA KONTEN ── --}}
<main class="w-full bg-white flex flex-col font-sans min-h-screen">
    
{{-- ░░ HEADER HERO BOX (Dengan Soft Glow Shadow) ░░ --}}
<section class="w-full relative pt-[160px] md:pt-[200px] pb-32 md:pb-48 px-4 md:px-6 text-center overflow-hidden">
    
    {{-- 1. BACKGROUND GAMBAR --}}
    <picture class="absolute inset-0 w-full h-full z-0">
        <source media="(max-width: 767px)" srcset="{{ asset('images/n1.webp') }}">
        <img src="{{ asset('images/ser.webp') }}" alt="Services Header Background" class="w-full h-full object-cover object-[70%_center]">
    </picture>

    {{-- OVERLAY HIJAU TUA TIPIS — bantu kontras teks & selaraskan tone dengan brand --}}
    <div class="absolute inset-0 bg-[#10240E]/25 z-10 pointer-events-none"></div>

    {{-- 2. GRADASI PUTIH SMOOTH DI BATAS BAWAH FOTO (lebih pendek) --}}
<div class="absolute inset-x-0 -bottom-2 h-40 md:h-56 bg-[linear-gradient(to_top,#ffffff_0%,#ffffff_15%,rgba(255,255,255,0.9)_35%,rgba(255,255,255,0.55)_60%,rgba(255,255,255,0.2)_82%,rgba(255,255,255,0)_100%)] z-20 pointer-events-none"></div>
         
    {{-- KONTEN TEXT --}}
    <div class="max-w-3xl mx-auto relative z-30 flex flex-col items-center">
        
        <div class="flex items-center gap-4 mb-5 text-soft-glow">
            <span class="w-8 md:w-12 h-[1px] bg-white"></span>
            <span class="text-white text-[0.65rem] sm:text-xs font-bold tracking-[0.3em] uppercase">Premium Offerings</span>
            <span class="w-8 md:w-12 h-[1px] bg-white"></span>
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-[4.5rem] text-white leading-[1.1] mb-2 md:mb-3 tracking-tight font-extrabold font-sans uppercase reveal-left text-soft-glow">
            OUR <span class="font-serif italic font-light capitalize text-gray-100 tracking-normal ml-1">Services</span>
        </h1>
        
        <p class="text-white/95 text-[0.95rem] md:text-[1.1rem] leading-[2.2] font-light max-w-2xl mx-auto px-2 reveal-right text-soft-glow">
            Discover how we can elevate your events. From personalized laser engravings to professional on-site coconut service, we provide <strong class="font-medium text-white">unforgettable tropical experiences.</strong>
        </p>

    </div>
</section>

    {{-- ░░ ZIG-ZAG SERVICES SECTION ░░ --}}
    {{-- Sisanya tetap persis sama --}}
    <section class="w-full py-16 md:py-24 px-5 md:px-12 bg-white overflow-hidden relative z-30">
        <div class="max-w-6xl mx-auto flex flex-col gap-24 md:gap-32">

            {{-- Service 1: Custom Logo --}}
            <div class="flex flex-col lg:flex-row items-center gap-10 md:gap-16">
                <div class="w-full lg:w-1/2 reveal-left">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                        <img src="{{ asset('images/custom.webp') }}" alt="Custom Coconut Logo" class="w-full h-[350px] md:h-[450px] object-cover object-top transition-transform duration-700 group-hover:scale-105">
                    </div>
                </div>
                <div class="w-full lg:w-1/2 reveal-right">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase tracking-tight mb-4 text-center lg:text-left">Custom Coconut <span class="text-[#8CC63F]">Logo</span></h2>
                    <p class="text-gray-600 leading-relaxed mb-6 font-light text-justify lg:text-left">Any great event needs a detail, guests won't forget. Our precision laser engraved adds a personalized branded touch to your fresh coconuts, whether it's your wedding monogram, business logo or custom engraved art. A tasteful edible centerpiece that embodyes natural beauty with your personal narrative; an impressive lasting impression well beyond the last sip.</p>
                    
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> High-precision laser engraving for sharp, detailed results
                        </li>
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> Safe & food-grade preparation on every coconut
                        </li>
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> On-time delivery straight to your venue
                        </li>
                    </ul>

                    <a href="https://wa.me/6282146445465" target="_blank" class="flex w-fit mx-auto lg:mx-0 items-center gap-2 bg-gray-900 text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-[#5B8C2A] hover:shadow-lg transition-all duration-300">
                        Order Now <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>

            {{-- Service 2: Staff In-Charge --}}
            <div class="flex flex-col lg:flex-row-reverse items-center gap-10 md:gap-16">
                <div class="w-full lg:w-1/2 reveal-right">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                        <img src="{{ asset('images/staff2.webp') }}" alt="Staff In-Charge" class="w-full h-[350px] md:h-[450px] object-cover object-top transition-transform duration-700 group-hover:scale-105">
                    </div>
                </div>
                <div class="w-full lg:w-1/2 reveal-left">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase tracking-tight mb-4 text-center lg:text-left">Professional <span class="text-[#8CC63F]">Staff In-Charge</span></h2>
                    <p class="text-gray-600 leading-relaxed mb-6 font-light text-justify lg:text-left">Leave the serving to us. Our friendly, professional team is there to make sure everything runs smoothly from start to finish. Whether it's opening fresh coconuts right in front of your guests or serving with a warm smile, we pay attention to every detail. More than just serving drinks, we help create a fun and memorable experience that adds a special touch to your event, allowing you to relax and enjoy the occasion with your guests.</p>
                    
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> Experienced & presentable staff in branded uniform
                        </li>
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> Live coconut opening as a wow-factor experience
                        </li>
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> Full setup & clean-up — zero hassle, start to finish
                        </li>
                    </ul>

                    <a href="https://wa.me/6282146445465" target="_blank" class="flex w-fit mx-auto lg:mx-0 items-center gap-2 bg-gray-900 text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-[#5B8C2A] hover:shadow-lg transition-all duration-300">
                        Book Our Staff <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>

            {{-- Service 3: Resort Supply --}}
            <div class="flex flex-col lg:flex-row items-center gap-10 md:gap-16">
                <div class="w-full lg:w-1/2 reveal-left">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                        <img src="{{ asset('images/g30.webp') }}" alt="Resort & Hotel Supply" class="w-full h-[350px] md:h-[450px] object-cover object-top transition-transform duration-700 group-hover:scale-105">
                    </div>
                </div>
                <div class="w-full lg:w-1/2 reveal-right">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase tracking-tight mb-4 text-center lg:text-left">Resort & Hotel <span class="text-[#8CC63F]">Supply</span></h2>
                    <p class="text-gray-600 leading-relaxed mb-6 font-light text-justify lg:text-left">A memorable guest experience begins with thoughtful details. We supply premium-quality coconuts that are carefully selected for their freshness, sweetness, and presentation. With reliable deliveries tailored to your schedule, you can serve a refreshing welcome drink that complements the standards of your property. From boutique villas to luxury resorts, we help elevate the arrival experience with a touch of authentic tropical hospitality.</p>
                    
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> Hand-selected for consistent taste & premium quality
                        </li>
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> Reliable delivery schedule tailored to your operations
                        </li>
                        <li class="flex items-center text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle text-[#8CC63F] mr-3 text-lg"></i> Flexible bulk pricing for long-term partnerships
                        </li>
                    </ul>

                    <a href="https://wa.me/6282146445465" target="_blank" class="flex w-fit mx-auto lg:mx-0 items-center gap-2 bg-gray-900 text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-[#5B8C2A] hover:shadow-lg transition-all duration-300">
                        Get a Quote <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

</main>

{{-- ░ FOOTER ░ --}}
@include('sections._footer')

{{-- ── SCRIPT GABUNGAN: NAVBAR, MOBILE MENU & SCROLL REVEAL ANIMATION ── --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    // --- 1. SCRIPT NAVBAR EFEK MELAYANG ---
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
            
            if(navMenu) navMenu.classList.remove('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.remove('-mt-2');

            // Hapus efek invert agar logo kembali ke warna aslinya saat navbar menjadi putih
            logoImg.classList.remove('w-[70px]', 'h-[70px]', 'md:w-[100px]', 'md:h-[100px]', 'invert');
            logoImg.classList.add('w-[50px]', 'h-[50px]', 'md:w-14', 'md:h-14'); 

            if(mobileBtnIcon) {
                mobileBtnIcon.classList.remove('text-white');
                mobileBtnIcon.classList.add('text-gray-900');
            }

            // Ubah teks menu link menjadi abu/hijau saat navbar putih
            navLinks.forEach(link => {
                link.classList.remove('text-white/90', 'text-white', 'hover:text-white', 'hover:bg-white/20');
                
                // Cek apakah ini link yang aktif (Services)
                if(link.getAttribute('href').includes('services')) {
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
            
            if(navMenu) navMenu.classList.add('-mt-2');
            if(navCtaWrapper) navCtaWrapper.classList.add('-mt-2');

            // Tambahkan efek invert kembali saat di atas gambar gelap
            logoImg.classList.add('w-[70px]', 'h-[70px]', 'md:w-[100px]', 'md:h-[100px]', 'invert');
            logoImg.classList.remove('w-[50px]', 'h-[50px]', 'md:w-14', 'md:h-14');

            if(mobileBtnIcon) {
                mobileBtnIcon.classList.remove('text-gray-900');
                mobileBtnIcon.classList.add('text-white');
            }

            // Kembalikan teks menu link menjadi putih transparan
            navLinks.forEach(link => {
                link.classList.remove('text-gray-800', 'hover:text-[#8CC63F]', 'hover:bg-[#D0E9A8]/20', 'text-[#8CC63F]', 'bg-[#D0E9A8]/30');
                
                // Cek apakah ini link yang aktif (Services)
                if(link.getAttribute('href').includes('services')) {
                    link.classList.add('text-white', 'bg-white/20');
                } else {
                    link.classList.add('text-white/90', 'hover:text-white', 'hover:bg-white/20');
                }
            });
        }
    });

    // --- 2. SCRIPT MENU MOBILE ---
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

    // --- 3. SCRIPT SCROLL REVEAL ANIMATION ---
    const reveals = document.querySelectorAll('.reveal-left, .reveal-right, .reveal-up');
    
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target); 
            }
        });
    }, {
        rootMargin: "0px",
        threshold: 0.15
    });

    reveals.forEach(reveal => {
        revealObserver.observe(reveal);
    });

});
</script>
@endpush

@endsection