{{-- ═══════════════════════════════════════════════════════════════
    SECTION: SERVICES / PRICING  (#services)
    Layout  : Modern 3-Column Grid with Image Cards
    Theme   : Pure white bg, image top, amber/gold accents
═══════════════════════════════════════════════════════════════ --}}

@php
// Masukkan nomor WA tujuan di sini (Gunakan kode negara 62 tanpa + atau 0 di depan)
$waNumber = '628123456789'; 

$services = [
    [
        'image' => 'images/custom.jpg',
        'title' => 'Custom Coconut Logo',
        'desc'  => 'Laser-engraved coconuts with custom designs for weddings or corporate branding.',
        'price' => 'Rp 25.000 / Pcs',
        'tags'  => ['Design Logo', 'Delivery Service', 'Min 30 Pcs'],
    ],
    [
        'image' => 'images/staff.jpg',
        'title' => 'Staff In-Charge',
        'desc'  => 'Professional on-site staff to freshly open and serve coconuts to your guests.',
        'price' => 'Rp 300.000',
        'tags'  => ['Open Coconut', 'Serve Guests', 'Clear Up', '4 Hours'],
    ],
    [
        'image' => 'images/event.jpg',
        'title' => 'Resort & Hotel Supply',
        'desc'  => 'Premium fresh coconuts supply for welcome drinks at your villa, hotel, or resort.',
        'price' => 'Custom Pricing',
        'tags'  => ['Routine Delivery', 'Bulk Pricing', 'Premium Quality'],
    ],
];
@endphp

{{-- Padding atas dipendekkan (pt-8) agar mepet ke kotak layanan atas --}}
<section id="services" class="relative bg-white pt-12 pb-8 px-6 lg:px-12">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-12">

    {{-- Header Section --}}
        <div class="text-center mb-12">
            {{-- Eyebrow --}}
            <div class="flex items-center justify-center gap-4 mb-3">
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
                <span class="text-[#DEC484] text-xs font-bold tracking-[0.2em] uppercase">Pricing & Services</span>
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
            </div>
            
            {{-- Main Title --}}
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0B1A28] uppercase leading-tight mb-4">
                TAILORED FOR YOUR <br>
                <span class="text-[#DEC484]">PERFECT EVENT</span>
            </h2>
            
            {{-- Subtitle --}}
            <p class="text-gray-500 text-sm md:text-base max-w-2xl mx-auto">
                Transparent pricing for premium services. From custom branding to professional on-site staff, we bring the best tropical vibes to your event.
            </p>
        </div>

        {{-- ── IMAGE CARD GRID LAYOUT ── --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @foreach($services as $svc)
            <div class="group relative bg-white rounded-[2rem] border border-gray-200 shadow-sm hover:shadow-[0_20px_50px_rgba(200,155,95,0.1)] hover:-translate-y-2 transition-all duration-500 flex flex-col h-full overflow-hidden cursor-pointer">
                
                {{-- Area Foto --}}
                <div class="relative w-full h-48 sm:h-56 overflow-hidden bg-gray-100">
                    <img src="{{ asset($svc['image']) }}" alt="{{ $svc['title'] }}" class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent pointer-events-none"></div>
                </div>

                {{-- Area Konten --}}
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="font-oswald font-bold uppercase tracking-tight leading-tight text-xl lg:text-2xl text-gray-900 mb-3 group-hover:text-[#C89B5F] transition-colors duration-300">
                        {{ $svc['title'] }}
                    </h3>
                    
                    <p class="font-inter text-[0.85rem] text-gray-500 font-light leading-relaxed mb-6 flex-1">
                        {{ $svc['desc'] }}
                    </p>

                    {{-- Tags --}}
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($svc['tags'] as $tag)
                        <span class="inline-flex items-center font-inter text-[0.6rem] tracking-[0.08em] font-semibold uppercase text-gray-600 bg-white border border-gray-200 rounded-full px-3 py-1.5 shadow-sm group-hover:border-[#DEC484]/60 group-hover:text-amber-700 transition-all duration-300">
                            <i class="fas fa-check text-[#C89B5F] mr-1.5 text-[0.65rem]"></i> {{ $tag }}
                        </span>
                        @endforeach
                    </div>

                    {{-- Footer Card (Harga & Tombol WA) --}}
                    <div class="pt-5 border-t border-gray-100 flex items-center justify-between mt-auto">
                        <div>
                            <p class="font-inter text-[0.6rem] text-gray-400 uppercase tracking-widest mb-1 font-bold">Starting from</p>
                            <p class="font-oswald font-bold text-lg text-gray-900">{{ $svc['price'] }}</p>
                        </div>
                        
                        {{-- Tombol WA Langsung Tanpa Pesan Otomatis --}}
                        <a href="https://wa.me/{{ $waNumber }}" target="_blank" rel="noopener noreferrer" class="w-11 h-11 rounded-full bg-green-50 flex items-center justify-center text-green-600 group-hover:bg-green-500 group-hover:text-white group-hover:-translate-y-1 group-hover:shadow-md group-hover:shadow-green-500/30 transition-all duration-300">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
            
        </div>
    </div>
</section>