@extends('layouts.app')

@section('title', 'Bali Coconut Art | Premium Fresh Custom Coconuts – Bali')

@section('content')

    @include('sections.home')
    @include('sections._about')
    @include('sections._services')
    @include('sections._portfolio')
    @include('sections._cta')
    @include('sections._footer')

@endsection

@push('scripts')
<script>
/**
 * ─────────────────────────────────────────────────────────────
 *  BALI COCONUT ART — Global JS
 *  1. Intersection Observer scroll-reveal (fade-up)
 *  2. Active nav link highlight on scroll
 *  3. Smooth back-to-top
 *  4. Hero image slider (prev / next buttons)
 * ─────────────────────────────────────────────────────────────
 */
(function () {
    'use strict';

    /* ── 1. SCROLL REVEAL ── */
    const revealTargets = document.querySelectorAll(
        '#about, #portfolio, #services, #contact, ' +
        '.portfolio-item, .stats-item, .bca-reveal-target'
    );

    if ('IntersectionObserver' in window) {
        const obs = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('bca-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -50px 0px' });

        revealTargets.forEach(el => {
            el.classList.add('bca-reveal');
            obs.observe(el);
        });
    }

    /* ── 2. ACTIVE NAV LINK ── */
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('[data-nav-link]');

    if (sections.length && navLinks.length) {
        const sectionObs = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navLinks.forEach(link => {
                        link.classList.toggle(
                            'nav-active',
                            link.getAttribute('href') === '#' + entry.target.id
                        );
                    });
                }
            });
        }, { threshold: 0.35 });
        sections.forEach(s => sectionObs.observe(s));
    }

    /* ── 3. BACK TO TOP ── */
    const btt = document.getElementById('back-to-top');
    if (btt) {
        window.addEventListener('scroll', () => {
            btt.classList.toggle('opacity-0',           window.scrollY < 600);
            btt.classList.toggle('pointer-events-none', window.scrollY < 600);
        }, { passive: true });
        btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    /* ── 4. HERO SLIDER ── */
    const slides = [
        'https://images.unsplash.com/photo-1550428989-130f40fb1789?q=80&w=800',
        'https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=800',
        'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=800',
    ];
    let current = 0;
    const heroImg = document.getElementById('hero-slide-img');
    const prevBtn = document.getElementById('hero-prev');
    const nextBtn = document.getElementById('hero-next');

    function goTo(idx) {
        current = (idx + slides.length) % slides.length;
        if (heroImg) {
            heroImg.style.opacity = '0';
            heroImg.style.transform = 'scale(1.04)';
            setTimeout(() => {
                heroImg.src = slides[current];
                heroImg.style.opacity = '1';
                heroImg.style.transform = 'scale(1)';
            }, 250);
        }
    }

    if (heroImg) {
        heroImg.style.transition = 'opacity 0.4s ease, transform 0.6s ease';
        if (prevBtn) prevBtn.addEventListener('click', () => goTo(current - 1));
        if (nextBtn) nextBtn.addEventListener('click', () => goTo(current + 1));
        setInterval(() => goTo(current + 1), 5000);
    }

})();
</script>
@endpush