{{-- ═══════════════════════════════════════════════════════════════
    SECTION: PORTFOLIO / GALLERY (#portfolio)
    Layout  : 3D Coverflow Carousel + Fan Out Animation
    Theme   : Dark Coconut Shell + Luxury Gold
═══════════════════════════════════════════════════════════════ --}}

@php
$items = [
    [
        'src'       => asset('images/gallery3.webp'), 
        'title'     => 'Inspiration Setup',
        'category'  => 'Event Setup',
        'tagline'   => 'Elegant Coconut Stations for Your Tropical Occasions',
    ],
    [
        'src'       => asset('images/gallery2.webp'),
        'title'     => 'Custom Bridal Toast',
        'category'  => 'Wedding',
        'tagline'   => 'Engraved Initials for an Unforgettable Day',
    ],
    [
        'src'       => asset('images/gallery1.webp'), 
        'title'     => 'Quirky Party Details',
        'category'  => 'Custom Order',
        'tagline'   => 'Fun, unique, and totally you. We engrave your wildest ideas.',
    ],
    [
        'src'       => asset('images/gallery4.webp'), 
        'title'     => 'Stylish Party Sips',
        'category'  => 'Party',
        'tagline'   => 'Minimalist Portrait Art for Your Celebration',
    ],
    [
        'src'       => asset('images/gallery5.webp'), 
        'title'     => 'Signature Aesthetics',
        'category'  => 'Lifestyle',
        'tagline'   => 'Where simplicity meets tropical luxury.',
    ],
];
@endphp

<section id="portfolio" class="relative bg-white py-10 md:py-16 overflow-hidden z-10">
    <div class="relative w-full mx-auto px-4 lg:px-0">

        {{-- Header Section --}}
        <div class="text-center mb-12">
            <div class="flex items-center justify-center gap-4 mb-3">
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
                <span class="text-[#DEC484] text-xs font-bold tracking-[0.2em] uppercase">Gallery</span>
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
            </div>
            
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0B1A28] uppercase leading-tight mb-4">
                OUR TROPICAL <br>
                <span class="text-[#DEC484]">MASTERPIECES</span>
            </h2>
            
            <p class="text-gray-500 text-sm md:text-base max-w-2xl mx-auto">
                Explore our gallery of custom engraved coconuts that have elegantly elevated various events and celebrations across Bali.
            </p>
        </div>

        {{-- ── WRAPPER 1064px ── --}}
        <div class="relative w-full max-w-[1064px] mx-auto">

            {{-- TOMBOL CTA KANAN ATAS (Desktop Only) --}}
            <div class="hidden lg:block absolute -top-8 right-0 z-30">
                <a href="{{ route('gallery') }}" class="inline-flex items-center gap-1.5 font-inter text-[0.65rem] tracking-[0.15em] uppercase font-bold text-gray-900 border border-gray-200 rounded-full px-5 py-2 hover:border-[#C89B5F] hover:bg-[#C89B5F] hover:text-white hover:shadow-md transition-all duration-300">
                    View Full Gallery <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            {{-- TOMBOL CTA CENTER (Mobile Only) --}}
            <div class="flex lg:hidden justify-center mb-8 relative z-30">
                <a href="{{ url('/gallery') }}" class="inline-flex items-center gap-1.5 font-inter text-[0.65rem] tracking-[0.15em] uppercase font-bold text-gray-900 border border-gray-200 rounded-full px-5 py-2 hover:border-[#C89B5F] hover:bg-[#C89B5F] hover:text-white hover:shadow-md transition-all duration-300">
                    View Full Gallery <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            {{-- ── 3D COVERFLOW CAROUSEL ── --}}
            <div class="relative w-full h-[400px] md:h-[550px] flex justify-center items-center perspective-1000">
                <div id="gallery-track" class="relative w-full h-full flex justify-center items-center">
                    
                    @foreach($items as $index => $item)
                    {{-- KUNCI 1: Hapus inline opacity-0 dan translate-y-16 agar gambar selalu terlihat --}}
                    {{-- Menggunakan duration-[800ms] agar pergerakan membelah ke samping terasa lebih flowy --}}
                    <div class="gallery-item absolute w-[240px] md:w-[380px] h-[320px] md:h-[480px] rounded-[2rem] overflow-hidden shadow-2xl cursor-pointer transition-all duration-[800ms] ease-[cubic-bezier(0.25,1,0.5,1)]" data-index="{{ $index }}"> 
                        
                        {{-- Gambar --}}
                        <img src="{{ $item['src'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                        
                        {{-- JS Dimming Overlay --}}
                        <div class="js-overlay absolute inset-0 bg-black/50 transition-colors duration-[800ms]"></div>

                        {{-- Gradient Bawah --}}
                        <div class="js-gradient absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 transition-opacity duration-[800ms]"></div>

                        {{-- Teks Konten --}}
                        <div class="js-content absolute inset-x-0 bottom-0 p-6 md:p-8 translate-y-6 opacity-0 transition-all duration-[800ms] ease-out flex flex-col justify-end pointer-events-none">
                            <span class="text-[#DEC484] font-inter text-[0.6rem] md:text-xs tracking-[0.2em] uppercase font-bold drop-shadow-md mb-2">{{ $item['category'] }}</span>
                            <h3 class="font-oswald font-bold text-2xl md:text-3xl text-white uppercase tracking-wide leading-tight drop-shadow-lg mb-1.5">{{ $item['title'] }}</h3>
                            <p class="text-white/80 font-inter text-[0.7rem] md:text-sm font-light tracking-wide drop-shadow-md">{{ $item['tagline'] }}</p>
                        </div>

                    </div>
                    @endforeach

                </div>
                
                {{-- Tombol Prev / Next --}}
                <button id="prevBtn" class="absolute left-0 md:left-4 top-1/2 -translate-y-1/2 z-[60] w-12 h-12 rounded-full border border-gray-200 bg-white/90 backdrop-blur-md flex items-center justify-center text-gray-600 shadow-lg hover:shadow-xl hover:border-[#C89B5F] hover:bg-[#C89B5F] hover:text-white hover:scale-110 transition-all duration-300">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button id="nextBtn" class="absolute right-0 md:right-4 top-1/2 -translate-y-1/2 z-[60] w-12 h-12 rounded-full border border-gray-200 bg-white/90 backdrop-blur-md flex items-center justify-center text-gray-600 shadow-lg hover:shadow-xl hover:border-[#C89B5F] hover:bg-[#C89B5F] hover:text-white hover:scale-110 transition-all duration-300">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ── JAVASCRIPT UNTUK EFEK FAN OUT (MENYEBAR DARI TENGAH) ── --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.gallery-item');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    let currentIndex = Math.floor(items.length / 2);
    const total = items.length;
    
    // Flag penanda kondisi "Menyebar"
    let isFannedOut = false; 

    function updateGallery() {
        const isMobile = window.innerWidth < 768;

        items.forEach((item, index) => {
            const jsOverlay = item.querySelector('.js-overlay');
            const jsGradient = item.querySelector('.js-gradient');
            const jsContent = item.querySelector('.js-content');
            
            // Reset Hover Listener
            item.onmouseenter = null;
            item.onmouseleave = null;

            let diff = (index - currentIndex) % total;
            if (diff < 0) diff += total;

            item.style.opacity = '1'; // Gambar selalu muncul penuh tanpa fade-in

            // GAMBAR POSISI TENGAH (ACTIVE)
            if (diff === 0) {
                item.style.zIndex = '50';
                item.style.transform = 'translateX(0) scale(1)';
                jsOverlay.className = 'js-overlay absolute inset-0 bg-transparent transition-colors duration-[800ms]';

                // TEKS MOBILE OTOMATIS MUNCUL
                if (isMobile) {
                    jsGradient.style.opacity = '1';
                    jsContent.style.opacity = '1';
                    jsContent.style.transform = 'translateY(0)';
                } 
                // TEKS DESKTOP BUTUH HOVER
                else {
                    jsGradient.style.opacity = '0';
                    jsContent.style.opacity = '0';
                    jsContent.style.transform = 'translateY(1.5rem)';

                    item.onmouseenter = () => {
                        jsGradient.style.opacity = '1';
                        jsContent.style.opacity = '1';
                        jsContent.style.transform = 'translateY(0)';
                    };
                    item.onmouseleave = () => {
                        jsGradient.style.opacity = '0';
                        jsContent.style.opacity = '0';
                        jsContent.style.transform = 'translateY(1.5rem)';
                    };
                }
            } 
            // GAMBAR SAMPING KANAN & KIRI
            else {
                jsGradient.style.opacity = '0';
                jsContent.style.opacity = '0';
                jsContent.style.transform = 'translateY(1.5rem)';

                // KUNCI 2: JIKA BELUM SCROLL, SEMUA GAMBAR SEMBUNYI MENUMPUK DI BELAKANG GAMBAR TENGAH
                if (!isFannedOut) {
                    item.style.zIndex = '10';
                    item.style.transform = 'translateX(0) scale(0.85)';
                    jsOverlay.className = 'js-overlay absolute inset-0 bg-black/60 transition-colors duration-[800ms]';
                } 
                // JIKA SUDAH SCROLL, ANIMASI MENYEBAR KE KANAN DAN KIRI
                else {
                    if (diff === 1) { // Kanan 1
                        item.style.zIndex = '40';
                        item.style.transform = 'translateX(55%) scale(0.85)';
                        jsOverlay.className = 'js-overlay absolute inset-0 bg-black/40 transition-colors duration-[800ms]';
                    } 
                    else if (diff === 2) { // Kanan 2
                        item.style.zIndex = '30';
                        item.style.transform = 'translateX(105%) scale(0.7)';
                        jsOverlay.className = 'js-overlay absolute inset-0 bg-black/70 transition-colors duration-[800ms]';
                    } 
                    else if (diff === total - 1) { // Kiri 1
                        item.style.zIndex = '40';
                        item.style.transform = 'translateX(-55%) scale(0.85)';
                        jsOverlay.className = 'js-overlay absolute inset-0 bg-black/40 transition-colors duration-[800ms]';
                    } 
                    else if (diff === total - 2) { // Kiri 2
                        item.style.zIndex = '30';
                        item.style.transform = 'translateX(-105%) scale(0.7)';
                        jsOverlay.className = 'js-overlay absolute inset-0 bg-black/70 transition-colors duration-[800ms]';
                    }
                }
            }
        });
    }

    // Inisialisasi awal (Semua numpuk di tengah)
    updateGallery();

    window.addEventListener('resize', updateGallery);

    prevBtn.addEventListener('click', () => {
        isFannedOut = true; // Paksa nyebar kalau diklik
        currentIndex = (currentIndex - 1 + total) % total;
        updateGallery();
    });

    nextBtn.addEventListener('click', () => {
        isFannedOut = true; // Paksa nyebar kalau diklik
        currentIndex = (currentIndex + 1) % total;
        updateGallery();
    });

    items.forEach((item, index) => {
        item.addEventListener('click', () => {
            if (currentIndex !== index) {
                isFannedOut = true;
                currentIndex = index;
                updateGallery();
            }
        });
    });

    // SENSOR SCROLL (Memicu animasi kartu menyebar dari tengah)
    const portfolioSection = document.getElementById('portfolio');
    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isFannedOut) {
                isFannedOut = true;
                // Delay sekejap agar natural
                setTimeout(() => {
                    updateGallery();
                }, 150);
                obs.unobserve(entry.target);
            }
        });
    }, { 
        threshold: 0.20 
    });

    if (portfolioSection) {
        observer.observe(portfolioSection);
    }
});
</script>
@endpush