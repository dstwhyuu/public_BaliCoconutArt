@extends('layouts.app')

@section('title', 'About Us - Bali Coconut Art')

@section('content')

{{-- ── 1. FLOATING ANIMATED NAVBAR (Persis Contact Page) ── --}}
<div id="nav-wrapper" class="fixed top-0 inset-x-0 z-50 flex justify-center px-4 md:px-6 pt-6 md:pt-8 transition-all duration-500 pointer-events-none">
    
    <nav id="main-nav" class="pointer-events-auto flex justify-between items-start w-full max-w-full px-4 py-2 transition-all duration-[600ms] ease-[cubic-bezier(0.34,1.56,0.64,1)] rounded-full border border-transparent">
        
        {{-- KIRI: LOGO BRAND --}}
        <a href="{{ url('/#home') }}" id="nav-logo-link" class="flex items-start group transition-all duration-500 w-[180px]">
            <img src="{{ asset('images/logo.png') }}" alt="Bali Coconut Art" class="w-[100px] h-[100px] object-contain brightness-0 group-hover:scale-105 transition-all duration-500">
        </a>

        {{-- TENGAH: MENU NAVIGASI --}}
        <div id="nav-menu" class="hidden md:flex flex-1 justify-center items-center gap-2 lg:gap-4 text-sm md:text-base font-bold tracking-wide -mt-2 transition-all duration-500">
            <a href="{{ url('/#home') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">Home</a>
            {{-- Tombol About dibikin aktif (highlight) --}}
            <a href="{{ url('/about') }}" class="menu-link px-4 py-2 rounded-full text-amber-700 bg-black/5 transition-all duration-300">About</a>
            <a href="{{ url('/#services') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">Services</a>
            <a href="{{ route('gallery') }}" class="menu-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">Gallery</a>
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
<main class="w-full bg-white flex flex-col font-sans min-h-screen">

    {{-- ░░ 2. HEADER HERO (Gradient Elegan) ░░ --}}
    <section class="w-full px-6 text-center relative" style="padding-top: 150px; padding-bottom: 80px; background: linear-gradient(135deg, #FDF8F3 0%, #E5CAA4 50%, #D9B78A 100%); border-bottom: 1px solid #D4B895; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
        
        {{-- Aksen cahaya melingkar --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

        <div class="max-w-3xl mx-auto relative z-10">
            <div class="flex items-center justify-center gap-4 mb-4">
                <span class="w-12 h-[1px] bg-gray-800"></span>
                <span class="text-gray-800 text-xs font-bold tracking-[0.2em] uppercase">Bali Coconut Art</span>
                <span class="w-12 h-[1px] bg-gray-800"></span>
            </div>
            
            <h1 class="text-4xl md:text-5xl text-gray-900 font-extrabold mb-6 uppercase tracking-tight">
                Beyond The Shell
            </h1>
            
            <p class="text-gray-800 text-sm md:text-base leading-relaxed font-medium max-w-2xl mx-auto">
                We exist for one purpose: to ensure that every coconut placed before your VIP guests is a statement of elegance. We don't just supply coconuts; we craft premium tropical experiences.
            </p>
        </div>
    </section>

    {{-- ░░ 3. THREE CORE VALUES (Minimalist Grid) ░░ --}}
    <section class="w-full py-20 px-6 bg-white font-sans">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-12">
                
            {{-- Value 1 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 mx-auto mb-6 bg-[#E5CAA4]/20 text-amber-800 rounded-full flex items-center justify-center text-2xl group-hover:bg-[#C89B5F] group-hover:text-white transition-all duration-300">
                        <i class="fas fa-hand-sparkles"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-4">Uncompromised Hygiene</h3>
                    {{-- Font dibuat font-light, ukuran presisi 0.95rem, dan jarak baris dilegakan --}}
                    <p class="text-gray-600 text-[0.95rem] leading-[1.85] font-light px-2 md:px-4">
                        Deep-cleaned and sanitised with food-grade protocols. We uphold standards appropriate for the world's most discerning hospitality environments.
                    </p>
                </div>

                {{-- Value 2 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 mx-auto mb-6 bg-[#E5CAA4]/20 text-amber-800 rounded-full flex items-center justify-center text-2xl group-hover:bg-[#C89B5F] group-hover:text-white transition-all duration-300">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-4">Precision Engraving</h3>
                    <p class="text-gray-600 text-[0.95rem] leading-[1.85] font-light px-2 md:px-4">
                        Advanced laser technology translates your logo into a permanent, tactile impression, turning a simple fruit into a luxurious branding canvas.
                    </p>
                </div>

                {{-- Value 3 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 mx-auto mb-6 bg-[#E5CAA4]/20 text-amber-800 rounded-full flex items-center justify-center text-2xl group-hover:bg-[#C89B5F] group-hover:text-white transition-all duration-300">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 uppercase tracking-widest mb-4">White-Glove Service</h3>
                    <p class="text-gray-600 text-[0.95rem] leading-[1.85] font-light px-2 md:px-4">
                        Our highly trained on-site staff seamlessly integrate with your team, ensuring every guest receives their coconut with ceremony and care.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ░░ 4. LOCAL EMPOWERMENT & EXPERIENCE (Split Section) ░░ --}}
    <section class="w-full py-16 lg:py-24 px-6 bg-gray-50 font-sans border-t border-gray-100">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            {{-- Image --}}
            <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                <img src="{{ asset('images/g26.jpg') }}" alt="Luxury Coconut Service" class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent pointer-events-none"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <p class="text-white font-bold tracking-widest uppercase text-sm mb-1">100% Sourced from</p>
                    <p class="text-white text-2xl font-serif italic">Bali's Finest Farms</p>
                </div>
            </div>

            {{-- Content --}}
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 uppercase leading-tight mb-6">
                    Rooted in Bali, <br> <span class="text-[#C89B5F]">Grown with Purpose</span>
                </h2>
                {{-- Ukuran teks dibesarkan sedikit (text-base md:text-[1.05rem]) dengan font-light --}}
                <p class="text-gray-600 text-base md:text-[1.05rem] leading-[1.9] font-light mb-6">
                    Every coconut we supply is sourced exclusively from Bali's most skilled local farmers. By choosing Bali Coconut Art, your property directly strengthens the Balinese agricultural community.
                </p>
                <p class="text-gray-600 text-base md:text-[1.05rem] leading-[1.9] font-light mb-10">
                    Whether it is a poolside service at your flagship resort or the centrepiece of a luxury beach wedding, we work closely with your F&B teams to align every presentation with your occasion's theme.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-gray-900 text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-widest hover:bg-[#C89B5F] hover:shadow-lg transition-all duration-300">
                        Consult With Us
                    </a>
                    <a href="{{ route('gallery') }}" class="inline-flex items-center gap-2 border border-gray-300 text-gray-700 px-8 py-3 rounded-full text-sm font-bold uppercase tracking-widest hover:border-gray-900 hover:text-gray-900 transition-all duration-300">
                        View Gallery
                    </a>
                </div>
            </div>

        </div>
    </section>

</main>

{{-- ░░ 5. FOOTER ░░ --}}
@include('sections._footer')

{{-- ── SCRIPT ANIMASI NAVBAR KAPSUL ── --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
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
});
</script>
@endpush

@endsection