

@php
$items = [
    [
        'src'       => asset('images/gallery3.jpg'), 
        'title'     => 'Inspiration Setup',
        'category'  => 'Event Setup',
        'tagline'   => 'Elegant Coconut Stations for Your Tropical Occasions',
    ],
    [
        'src'       => asset('images/gallery2.png'),
        'title'     => 'Custom Bridal Toast',
        'category'  => 'Wedding',
        'tagline'   => 'Engraved Initials for an Unforgettable Day',
    ],
    [
        'src'       => asset('images/gallery1.jpg'), 
        'title'     => 'Quirky Party Details',
        'category'  => 'Custom Order',
        'tagline'   => 'Fun, unique, and totally you. We engrave your wildest ideas.',
    ],
    [
        'src'       => asset('images/gallery4.jpg'), 
        'title'     => 'Stylish Party Sips',
        'category'  => 'Party',
        'tagline'   => 'Minimalist Portrait Art for Your Celebration',
    ],
    [
        'src'       => asset('images/gallery5.jpg'), 
        'title'     => 'Signature Aesthetics',
        'category'  => 'Lifestyle',
        'tagline'   => 'Where simplicity meets tropical luxury.',
    ],
];
@endphp

{{-- Ubah class pt-10 pb-10 menjadi py-8 --}}
<section id="portfolio" class="relative bg-white py-8 overflow-hidden z-10">
    <div class="relative w-full mx-auto px-4 lg:px-0">

    {{-- Header Section --}}
        <div class="text-center mb-12">
            {{-- Eyebrow --}}
            <div class="flex items-center justify-center gap-4 mb-3">
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
                <span class="text-[#DEC484] text-xs font-bold tracking-[0.2em] uppercase">Gallery</span>
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
            </div>
            
            {{-- Main Title --}}
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0B1A28] uppercase leading-tight mb-4">
                OUR TROPICAL <br>
                <span class="text-[#DEC484]">MASTERPIECES</span>
            </h2>
            
            {{-- Subtitle --}}
            <p class="text-gray-500 text-sm md:text-base max-w-2xl mx-auto">
                Explore our gallery of custom engraved coconuts that have elegantly elevated various events and celebrations across Bali.
            </p>
        </div>

        {{-- ── WRAPPER 1064px (Sesuai lebar presisi 5 foto) ── --}}
        <div class="relative w-full max-w-[1064px] mx-auto">

            {{-- TOMBOL CTA KANAN ATAS (Desktop Only - Presisi di ujung foto ke-5) --}}
            <div class="hidden lg:block absolute -top-8 right-0 z-30">
            <a href="{{ route('gallery') }}"
            class="inline-flex items-center gap-1.5 font-inter text-[0.65rem] tracking-[0.15em]
                    uppercase font-bold text-gray-900 border border-gray-200
                    rounded-full px-5 py-2 hover:border-[#C89B5F] hover:bg-[#C89B5F] hover:text-white hover:shadow-md
                    transition-all duration-300">
                View Full Gallery
                <i class="fas fa-arrow-right ml-1"></i>
            </a>
            </div>

            {{-- TOMBOL CTA CENTER (Mobile Only - Muncul di bawah teks) --}}
            <div class="flex lg:hidden justify-center mb-8 relative z-30">
                <a href="{{ url('/gallery') }}"
                   class="inline-flex items-center gap-1.5 font-inter text-[0.65rem] tracking-[0.15em]
                          uppercase font-bold text-gray-900 border border-gray-200
                          rounded-full px-5 py-2 hover:border-[#C89B5F] hover:bg-[#C89B5F] hover:text-white hover:shadow-md
                          transition-all duration-300">
                    View Full Gallery
                    <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            {{-- ── 3D COVERFLOW CAROUSEL ── --}}
            <div class="relative w-full h-[400px] md:h-[550px] flex justify-center items-center perspective-1000">
                <div id="gallery-track" class="relative w-full h-full flex justify-center items-center">
                    @foreach($items as $index => $item)
                    {{-- Tambahkan opacity-0 dan translate-y-16 di sini --}}
                    <div class="gallery-item group absolute w-[240px] md:w-[380px] h-[320px] md:h-[480px] rounded-[2rem] overflow-hidden shadow-2xl cursor-pointer transition-all duration-700 ease-in-out" data-index="{{ $index }}"> 
                    
                    {{-- Gambar --}}
                    <img src="{{ $item['src'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                    
                    {{-- JS Dimming Overlay (Agar gambar samping jadi gelap) --}}
                    <div class="js-overlay absolute inset-0 bg-black/50 transition-colors duration-700"></div>

                    {{-- Hover Reveal Gradient (Muncul saat cursor masuk) --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    {{-- Hover Text Content (Meluncur mulus dari bawah) --}}
                    <div class="absolute inset-x-0 bottom-0 p-6 md:p-8 translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out flex flex-col justify-end pointer-events-none">
                        
                        {{-- Kategori --}}
                        <span class="text-[#DEC484] font-inter text-[0.6rem] md:text-xs tracking-[0.2em] uppercase font-bold drop-shadow-md mb-2">
                            {{ $item['category'] }}
                        </span>
                        
                        {{-- Judul Acara --}}
                        <h3 class="font-oswald font-bold text-2xl md:text-3xl text-white uppercase tracking-wide leading-tight drop-shadow-lg mb-1.5">
                            {{ $item['title'] }}
                        </h3>
                        
                        {{-- Tagline / Deskripsi Menarik --}}
                        <p class="text-white/80 font-inter text-[0.7rem] md:text-sm font-light tracking-wide drop-shadow-md">
                            {{ $item['tagline'] }}
                        </p>
                    </div>
                </div>
                    @endforeach
            </div>
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

{{-- ── JAVASCRIPT UNTUK EFEK 3D COVERFLOW (5 GAMBAR) ── --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.gallery-item');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    let currentIndex = Math.floor(items.length / 2);
    const total = items.length;

    function updateGallery() {
        items.forEach((item, index) => {
            const jsOverlay = item.querySelector('.js-overlay');
            
            // Reset class dasar
            item.className = 'gallery-item group absolute w-[240px] md:w-[380px] h-[320px] md:h-[480px] rounded-[2rem] overflow-hidden shadow-2xl cursor-pointer transition-all duration-700 ease-in-out';
            
            // Hitung selisih jarak melingkar menggunakan Modulo
            // Logika ini memastikan tidak akan pernah ada slot kanan/kiri yang kosong
            let diff = (index - currentIndex) % total;
            if (diff < 0) {
                diff += total;
            }

            // diff 0 = Tengah
            // diff 1 = Kanan 1
            // diff 2 = Kanan 2
            // diff total-1 = Kiri 1
            // diff total-2 = Kiri 2

            if (diff === 0) {
                item.classList.add('z-50');
                item.style.transform = 'translateX(0) scale(1)';
                jsOverlay.className = 'js-overlay absolute inset-0 bg-transparent transition-colors duration-700';
            } 
            else if (diff === 1) {
                item.classList.add('z-40');
                item.style.transform = 'translateX(55%) scale(0.85)';
                jsOverlay.className = 'js-overlay absolute inset-0 bg-black/40 transition-colors duration-700';
            } 
            else if (diff === 2) {
                item.classList.add('z-30');
                item.style.transform = 'translateX(105%) scale(0.7)';
                jsOverlay.className = 'js-overlay absolute inset-0 bg-black/70 transition-colors duration-700';
            } 
            else if (diff === total - 1) {
                item.classList.add('z-40');
                item.style.transform = 'translateX(-55%) scale(0.85)';
                jsOverlay.className = 'js-overlay absolute inset-0 bg-black/40 transition-colors duration-700';
            } 
            else if (diff === total - 2) {
                item.classList.add('z-30');
                item.style.transform = 'translateX(-105%) scale(0.7)';
                jsOverlay.className = 'js-overlay absolute inset-0 bg-black/70 transition-colors duration-700';
            } 
            else {
                // Untuk keamanan jika nanti gambarmu lebih dari 5 (sembunyi di tengah belakang)
                item.classList.add('z-10', 'opacity-0', 'pointer-events-none');
                item.style.transform = 'translateX(0) scale(0.5)';
            }
        });
    }

    // Navigasi kiri dan kanan sekarang ikut melingkar (Infinite Loop)
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + total) % total;
        updateGallery();
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % total;
        updateGallery();
    });

    // Memastikan klik gambar samping juga melingkar dengan benar
    items.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentIndex = index;
            updateGallery();
        });
    });

    // Sensor scroll animasi (Intersection Observer) agar tetap jalan
    const portfolioSection = document.getElementById('portfolio');
    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                updateGallery();
                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    if (portfolioSection) {
        observer.observe(portfolioSection);
    }
});
</script>
@endpush