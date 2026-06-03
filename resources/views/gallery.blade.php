@extends('layouts.app')

@section('title', 'Gallery - Bali Coconut Art')

@section('content')

{{-- ── 1. FLOATING ANIMATED NAVBAR ── --}}
<div id="nav-wrapper" class="fixed top-0 inset-x-0 z-50 flex justify-center px-4 md:px-6 pt-6 md:pt-8 transition-all duration-500 pointer-events-none">
    
    <nav id="main-nav" class="pointer-events-auto flex justify-between items-start w-full max-w-full px-4 py-2 transition-all duration-[600ms] ease-[cubic-bezier(0.34,1.56,0.64,1)] rounded-full border border-transparent">
        
        {{-- KIRI: LOGO BRAND --}}
        <a href="{{ url('/#home') }}" id="nav-logo-link" class="flex items-start group transition-all duration-500 w-[180px]">
            <img src="{{ asset('images/logo.png') }}" alt="Bali Coconut Art" class="w-[100px] h-[100px] object-contain brightness-0 group-hover:scale-105 transition-all duration-500">
        </a>

        {{-- TENGAH: MENU NAVIGASI --}}
        <div id="nav-menu" class="hidden md:flex flex-1 justify-center items-center gap-2 lg:gap-4 text-sm md:text-base font-bold tracking-wide -mt-2 transition-all duration-500">
            <a href="{{ url('/#home') }}" class="nav-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">Home</a>
            <a href="{{ url('/about') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">About</a>            
            <a href="{{ url('/#services') }}" class="nav-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">Services</a>
            <a href="{{ route('gallery') }}" class="nav-link px-4 py-2 rounded-full text-amber-700 bg-amber-700/10 transition-all duration-300">Gallery</a>
        </div>

        {{-- KANAN: TOMBOL CONTACT --}}
        <div id="nav-cta-wrapper" class="hidden md:flex justify-end items-start w-[180px] -mt-2 transition-all duration-500">
            <a href="{{ route('contact') }}" id="nav-cta-btn" 
               class="text-sm font-bold shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center justify-center"
               style="background: linear-gradient(to right, #EADCC8, #D9B78A); color: #111827; padding: 8px 28px; border-radius: 9999px;">
                Contact
            </a>
        </div>
    </nav>
</div>

{{-- ── WRAPPER UTAMA KONTEN ── --}}
<main class="w-full bg-gray-50 flex flex-col font-sans min-h-screen">
    
{{-- ░░ 2. HEADER HERO BOX (Gradient Elegan) ░░ --}}
    <section class="w-full px-6 text-center relative" style="padding-top: 130px; padding-bottom: 80px; background: linear-gradient(135deg, #FDF8F3 0%, #E5CAA4 50%, #D9B78A 100%); border-bottom: 1px solid #D4B895; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
        
        {{-- Sedikit aksen cahaya melingkar di kiri atas biar makin dramatis --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

        <div class="max-w-2xl mx-auto relative z-10">
            <h1 class="text-4xl md:text-5xl text-gray-900 font-bold mb-4 uppercase" style="letter-spacing: 1px;">
                Our Gallery
            </h1>
            <p class="text-gray-800 text-sm md:text-base leading-relaxed font-medium">
                Explore our visual collection of premium coconut art, custom engravings, and live carving sessions handled by our professional staff.
            </p>
        </div>
    </section> 

    @php
    $photos = [
        asset('images/g1.jpg'),
        asset('images/g3.jpg'),
        asset('images/g4.jpg'),
        asset('images/g5.jpg'),
        asset('images/g6.jpg'),
        asset('images/g7.jpg'),
        asset('images/g8.jpg'),
        asset('images/g9.jpg'),
        asset('images/g10.jpg'),
        asset('images/g11.jpg'),
        asset('images/g12.jpg'),
        asset('images/g13.jpg'),
        asset('images/card1.jpg'),
        asset('images/g15.jpg'),
        asset('images/g16.jpg'),
        asset('images/card2.jpg'),
        asset('images/g18.jpg'),
        asset('images/g19.jpg'),
        asset('images/card4.jpg'),
        asset('images/g14.jpg'),
        asset('images/g17.jpg'),
        asset('images/g20.jpg'),
        asset('images/g21.jpg'),
        asset('images/g22.jpg'),
        asset('images/g23.jpg'),
        asset('images/g24.jpg'),
        asset('images/g25.jpg'),
        asset('images/g26.jpg'),
        asset('images/g27.jpg'),
        asset('images/g28.jpg'),
        asset('images/g29.jpg'),
        asset('images/g30.jpg'),
        asset('images/g31.jpg'),
        asset('images/g32.jpg'),
        asset('images/bg.jpg'),
        asset('images/bg2.jpg'),
        asset('images/gallery1.jpg'),
        asset('images/gallery2.jpg'),
        asset('images/gallery3.jpg'),
        asset('images/gallery4.jpg'),
        asset('images/gallery5.jpg'),
        asset('images/benefit1.jpg'),
        ];
@endphp


    <section class="w-full max-w-[96%] 2xl:max-w-[90%] mx-auto pt-12 pb-24 columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4 md:gap-6 font-sans">
        @foreach($photos as $photo)
            <div class="relative break-inside-avoid mb-4 md:mb-6 rounded-lg bg-gray-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group cursor-pointer">
                <img 
                    alt="Bali Coconut Art"
                    data-src="{{ $photo }}"
                    class="gallery-img w-full h-auto rounded-lg object-cover opacity-0 transition-all duration-[1500ms] ease-out group-hover:scale-105"
                />
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300 z-10 rounded-lg pointer-events-none"></div>
            </div>
        @endforeach
    </section>

</main>

{{-- ░ FOOTER ░ --}}
@include('sections._footer')

@endsection

{{-- ── SCRIPT GABUNGAN: NAVBAR & LAZY LOAD GAMBAR ── --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // --- 1. Script Animasi Navbar (Sama dengan Contact) ---
    const navWrapper = document.getElementById('nav-wrapper');
    const mainNav = document.getElementById('main-nav');
    const logoImg = document.getElementById('nav-logo-link').querySelector('img');
    const navMenu = document.getElementById('nav-menu');
    const navCtaWrapper = document.getElementById('nav-cta-wrapper');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navWrapper.classList.remove('pt-6', 'md:pt-8', 'px-4', 'md:px-6');
            navWrapper.classList.add('pt-4', 'px-4', 'md:px-12');
            
            mainNav.classList.remove('max-w-full', 'border-transparent', 'items-start', 'px-4', 'py-2');
            mainNav.classList.add('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center');
            
            navMenu.classList.remove('-mt-2');
            navCtaWrapper.classList.remove('-mt-2');

            logoImg.classList.remove('w-[100px]', 'h-[100px]');
            logoImg.classList.add('w-14', 'h-14'); 
        } else {
            navWrapper.classList.add('pt-6', 'md:pt-8', 'px-4', 'md:px-6');
            navWrapper.classList.remove('pt-4', 'px-4', 'md:px-12');

            mainNav.classList.add('max-w-full', 'border-transparent', 'items-start', 'px-4', 'py-2');
            mainNav.classList.remove('max-w-5xl', 'bg-white/95', 'backdrop-blur-md', 'shadow-2xl', 'border-gray-200/50', 'px-6', 'md:px-8', 'py-1.5', 'items-center');
            
            navMenu.classList.add('-mt-2');
            navCtaWrapper.classList.add('-mt-2');

            logoImg.classList.add('w-[100px]', 'h-[100px]');
            logoImg.classList.remove('w-14', 'h-14');
        }
    });

    // --- 2. Script Intersection Observer untuk Gambar Gallery ---
    const observerOptions = {
        root: null,
        rootMargin: '50px', 
        threshold: 0.1
    };

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                const src = img.getAttribute('data-src');

                if (src) {
                    img.src = src;
                    img.onload = () => {
                        img.classList.remove('opacity-0');
                        img.classList.add('opacity-100');
                    };
                    img.removeAttribute('data-src');
                }
                observer.unobserve(img);
            }
        });
    }, observerOptions);

    const galleryImages = document.querySelectorAll('.gallery-img');
    galleryImages.forEach(img => {
        imageObserver.observe(img);
    });
});
</script>
@endpush