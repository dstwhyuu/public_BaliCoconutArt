@extends('layouts.app')

@section('title', 'Contact Us - Bali Coconut Art')

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
            <a href="{{ url('/#about') }}" class="nav-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">About</a>
            <a href="{{ url('/#services') }}" class="nav-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">Services</a>
            <a href="{{ url('/#portfolio') }}" class="nav-link px-4 py-2 rounded-full text-gray-800 hover:text-amber-700 hover:bg-black/5 transition-all duration-300">Gallery</a>
        </div>

        {{-- KANAN: TOMBOL CONTACT --}}
        <div id="nav-cta-wrapper" class="hidden md:flex justify-end items-start w-[180px] -mt-2 transition-all duration-500">
            {{-- Kita paksa bentuk kapsul dan warna gradiennya pakai inline style biar kebal badai Tailwind --}}
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
    
{{-- ░░ 2. HEADER BOX (Gradient Elegan Konsisten dengan Gallery) ░░ --}}
    <section class="w-full px-6 text-center relative" style="padding-top: 130px; padding-bottom: 80px; background: linear-gradient(135deg, #FDF8F3 0%, #E5CAA4 50%, #D9B78A 100%); border-bottom: 1px solid #D4B895; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
        
        {{-- Sedikit aksen cahaya melingkar di kiri atas biar makin dramatis --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

        <div class="max-w-2xl mx-auto relative z-10">
            
            <h1 class="text-4xl md:text-5xl text-gray-900 font-bold mb-4 uppercase" style="letter-spacing: 1px;">
                Contact Us
            </h1>
            
            <p class="text-gray-800 text-sm md:text-base leading-relaxed font-medium">
                We would love to hear from you. Please reach out to us for custom orders, event partnerships, or any inquiries regarding our services.
            </p>
            
        </div>
    </section>

    {{-- ░░ 3. EMPAT KOTAK MELAYANG (Font Konsisten) ░░ --}}
    <section class="w-full relative mx-auto" style="max-width: 94%; margin-top: -20px; z-index: 20; padding-bottom: 60px; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
        
        <div style="display: flex; flex-wrap: wrap; gap: 24px; justify-content: space-between;">
            
            {{-- Card 1: Service Area --}}
            <div class="bg-white text-center hover:-translate-y-1 transition-transform duration-300" 
                 style="flex: 1 1 230px; padding: 32px 24px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
                <div style="width: 60px; height: 60px; margin: 0 auto 20px auto; background-color: #FDF8F3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B5E34;">
                    <i class="fas fa-map-marker-alt" style="font-size: 20px;"></i>
                </div>
                <h4 style="font-weight: 700; color: #111827; margin-bottom: 12px; font-size: 16px;">Service Area</h4>
                <p style="color: #6B7280; font-size: 13px; line-height: 1.6;">
                    Serving deliveries to all premium venues and resorts across Bali.
                </p>
            </div>

            {{-- Card 2: Phone / WA --}}
            <div class="bg-white text-center hover:-translate-y-1 transition-transform duration-300" 
                 style="flex: 1 1 230px; padding: 32px 24px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
                <div style="width: 60px; height: 60px; margin: 0 auto 20px auto; background-color: #FDF8F3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B5E34;">
                    <i class="fas fa-phone-alt" style="font-size: 20px;"></i>
                </div>
                <h4 style="font-weight: 700; color: #111827; margin-bottom: 12px; font-size: 16px;">Phone</h4>
                <p style="color: #6B7280; font-size: 13px; line-height: 1.6;">
                    +62 812-3456-7890
                </p>
            </div>

            {{-- Card 3: Email --}}
            <div class="bg-white text-center hover:-translate-y-1 transition-transform duration-300" 
                 style="flex: 1 1 230px; padding: 32px 24px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
                <div style="width: 60px; height: 60px; margin: 0 auto 20px auto; background-color: #FDF8F3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B5E34;">
                    <i class="far fa-envelope" style="font-size: 20px;"></i>
                </div>
                <h4 style="font-weight: 700; color: #111827; margin-bottom: 12px; font-size: 16px;">Email</h4>
                <p style="color: #6B7280; font-size: 13px; line-height: 1.6;">
                    hello@balicoconutart.com
                </p>
            </div>

            {{-- Card 4: Business Hours --}}
            <div class="bg-white text-center hover:-translate-y-1 transition-transform duration-300" 
                 style="flex: 1 1 230px; padding: 32px 24px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
                <div style="width: 60px; height: 60px; margin: 0 auto 20px auto; background-color: #FDF8F3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B5E34;">
                    <i class="far fa-clock" style="font-size: 20px;"></i>
                </div>
                <h4 style="font-weight: 700; color: #111827; margin-bottom: 12px; font-size: 16px;">Business Hours</h4>
                <p style="color: #6B7280; font-size: 13px; line-height: 1.6;">
                    Open Daily<br>
                </p>
            </div>

        </div>
    </section>    
    {{-- ░░ 4. GRID BAWAH (Info & Review Form - Background Sand) ░░ --}}
    <section class="w-full mx-auto pb-32" style="max-width: 94%; font-family: 'Inter', system-ui, -apple-system, sans-serif; display: flex; flex-wrap: wrap; gap: 24px; align-items: stretch;">

        {{-- ── KIRI: Connect & Info ── --}}
        <div style="flex: 1 1 30%; min-width: 320px; max-width: 400px; display: flex; flex-direction: column;">
            
            {{-- Box 1: Follow Us (Background disamakan dengan Header: #E5CAA4) --}}
            <div style="background-color: #E5CAA4; color: #111827; border-radius: 16px; padding: 32px 24px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.05); margin-bottom: 24px; border: 1px solid #D4B895;">
                <h3 style="font-weight: 700; font-size: 18px; margin-bottom: 16px; color: #111827;">Follow Us</h3>
                
                <div style="display: flex; justify-content: center; gap: 16px; margin-bottom: 16px;">
                    <a href="#" style="width: 36px; height: 36px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B5E34; text-decoration: none; transition: all 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" onmouseover="this.style.backgroundColor='#1A120B'; this.style.color='white';" onmouseout="this.style.backgroundColor='white'; this.style.color='#8B5E34';">
                        <i class="fab fa-facebook-f" style="font-size: 14px;"></i>
                    </a>
                    <a href="#" style="width: 36px; height: 36px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B5E34; text-decoration: none; transition: all 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" onmouseover="this.style.backgroundColor='#1A120B'; this.style.color='white';" onmouseout="this.style.backgroundColor='white'; this.style.color='#8B5E34';">
                        <i class="fab fa-instagram" style="font-size: 14px;"></i>
                    </a>
                    <a href="#" style="width: 36px; height: 36px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B5E34; text-decoration: none; transition: all 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" onmouseover="this.style.backgroundColor='#1A120B'; this.style.color='white';" onmouseout="this.style.backgroundColor='white'; this.style.color='#8B5E34';">
                        <i class="fab fa-tiktok" style="font-size: 14px;"></i>
                    </a>
                </div>

                {{-- Warna teks diubah jadi gelap agar kontras dengan background krem --}}
                <p style="font-size: 12px; color: #4B5563; line-height: 1.5; margin: 0; font-weight: 500;">
                    Get the latest updates on our activities and view our premium coconut art portfolio through our social media.
                </p>
            </div>

            <div style="background-color: white; border-radius: 16px; padding: 24px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #E5E7EB; flex-grow: 1;">
                <h3 style="font-weight: 700; font-size: 15px; color: #111827; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-info-circle" style="color: #8B5E34;"></i> Additional Info
                </h3>
                <p style="font-size: 12px; color: #6B7280; line-height: 1.6; margin: 0;">
                    For custom logo engraving, please contact us at least <strong>7 days</strong> prior to your event date. Minimum Order Quantity (MOQ) may apply.
                </p>
            </div>

        </div>

        {{-- ── KANAN: Review Form ── --}}
        <div style="flex: 1 1 60%; min-width: 320px; background-color: white; border-radius: 16px; padding: 28px 32px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #E5E7EB;">
            <div style="margin-bottom: 20px;">
                <h3 style="font-weight: 700; font-size: 20px; color: #111827; margin-bottom: 4px;">Share Your Experience</h3>
                <p style="font-size: 13px; color: #6B7280; margin: 0;">We value your feedback. Let us know how we did!</p>
            </div>

            @if($errors->any())
                <div style="background-color: #FEE2E2; color: #991B1B; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 13px; border: 1px solid #F87171;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('review.submit') }}" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
                @csrf

                {{-- Rating Stars --}}
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <label style="font-size: 11px; font-weight: 700; color: #374151; text-transform: uppercase; letter-spacing: 1px;">Rating</label>
                    
                    {{-- INI KUNCINYA: Input tersembunyi buat ngirim angka ke Laravel --}}
                    <input type="hidden" name="rating" id="rating_value" value="5">
                    
                    <div id="star_container" style="font-size: 22px; cursor: pointer; display: flex; gap: 4px; user-select: none;">
                        <span class="star" data-value="1" style="color: #F59E0B; transition: color 0.2s;">★</span>
                        <span class="star" data-value="2" style="color: #F59E0B; transition: color 0.2s;">★</span>
                        <span class="star" data-value="3" style="color: #F59E0B; transition: color 0.2s;">★</span>
                        <span class="star" data-value="4" style="color: #F59E0B; transition: color 0.2s;">★</span>
                        <span class="star" data-value="5" style="color: #F59E0B; transition: color 0.2s;">★</span>
                    </div>
                </div>

                {{-- Input Nama & Tipe Event --}}
                <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                    <div style="flex: 1 1 200px; display: flex; flex-direction: column; gap: 6px;">
                        <label for="reviewer_name" style="font-size: 11px; font-weight: 700; color: #374151; text-transform: uppercase; letter-spacing: 1px;">Full Name / Company</label>
                        <input type="text" id="reviewer_name" name="reviewer_name" placeholder="John Doe or EO Bali" style="width: 100%; background-color: #F9FAFB; border: 1px solid #E5E7EB; border-radius: 8px; padding: 10px 14px; font-size: 13px; color: #111827; outline: none;" onfocus="this.style.borderColor='#8B5E34'" onblur="this.style.borderColor='#E5E7EB'">
                    </div>
                    <div style="flex: 1 1 200px; display: flex; flex-direction: column; gap: 6px;">
                        <label for="event_type" style="font-size: 11px; font-weight: 700; color: #374151; text-transform: uppercase; letter-spacing: 1px;">Event Type</label>
                        <input type="text" id="event_type" name="event_type" placeholder="e.g. Wedding, Corporate..." style="width: 100%; background-color: #F9FAFB; border: 1px solid #E5E7EB; border-radius: 8px; padding: 10px 14px; font-size: 13px; color: #111827; outline: none;" onfocus="this.style.borderColor='#8B5E34'" onblur="this.style.borderColor='#E5E7EB'">
                    </div>
                </div>

                {{-- Input Area Review --}}
                <div style="display: flex; flex-direction: column; gap: 6px;">
                    <label for="review_text" style="font-size: 11px; font-weight: 700; color: #374151; text-transform: uppercase; letter-spacing: 1px;">Your Review</label>
                    <textarea id="review_text" name="review_text" rows="2" placeholder="Tell us about your experience..." style="width: 100%; background-color: #F9FAFB; border: 1px solid #E5E7EB; border-radius: 8px; padding: 10px 14px; font-size: 13px; color: #111827; outline: none; resize: none;" onfocus="this.style.borderColor='#8B5E34'" onblur="this.style.borderColor='#E5E7EB'"></textarea>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" style="background-color: #1A120B; color: white; font-weight: 700; font-size: 12px; text-transform: uppercase; letter-spacing: 2px; padding: 12px; border-radius: 8px; border: none; cursor: pointer; transition: background 0.3s; margin-top: 4px;" onmouseover="this.style.backgroundColor='#8B5E34'" onmouseout="this.style.backgroundColor='#1A120B'">
                    Submit Review
                </button>

            </form>
        </div>

    </section>

</main>

{{-- ░ FOOTER ░ --}}
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

<script>
document.addEventListener('DOMContentLoaded', () => {
    // --- Logika untuk Form Bintang ---
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating_value');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            // Ambil nilai dari bintang yang diklik
            const value = this.getAttribute('data-value');
            
            // Masukkan nilai ke input hidden
            ratingInput.value = value; 

            // Warnai bintang sesuai urutan
            stars.forEach(s => {
                if (s.getAttribute('data-value') <= value) {
                    s.style.color = '#F59E0B'; // Warna Emas/Kuning
                } else {
                    s.style.color = '#D1D5DB'; // Warna Abu-abu
                }
            });
        });
    });
});
</script>
@endpush

@endsection