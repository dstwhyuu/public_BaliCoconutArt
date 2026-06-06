{{-- ═══════════════════════════════════════════════════════════════
    SECTION: FOOTER
    Theme   : Dark Coconut Shell (Hitam Batok Kelapa dengan semburat cokelat pekat)
═══════════════════════════════════════════════════════════════ --}}

<footer class="relative bg-gradient-to-b from-[#1A120B] to-[#0D0905] pt-16 lg:pt-24 pb-12 border-t border-[#DEC484]/10 overflow-hidden">

{{-- ░ BACKGROUND WATERMARK: PETA BALI ░ --}}
    {{-- Ditambahkan "hidden md:block" agar hilang di Mobile dan kembali muncul di Tablet/Desktop --}}
    <div class="hidden md:block absolute bottom-0 right-[-5%] lg:right-[-2%] w-[360px] md:w-[520px] lg:w-[750px] opacity-[0.07] pointer-events-none z-0">
        <img src="{{ asset('images/bali.webp') }}" alt="Bali Map Watermark" class="w-full h-auto object-contain">
    </div>

    {{-- ░ Main Footer Grid ░ --}}
    <div class="max-w-[1440px] mx-auto px-6 lg:px-16 pb-12 relative z-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[1.8fr_1fr_1fr_1.2fr] gap-10 sm:gap-12 lg:gap-16">

            {{-- ── Col 1: Brand & Social ── --}}
            <div class="sm:col-span-2 lg:col-span-1">

                <a href="#home" class="inline-block mb-5 group">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art Logo" class="w-9 h-9 object-contain rounded-full border border-white/10 group-hover:border-[#DEC484] transition-all duration-300">
                        <h3 class="font-sans font-bold text-base tracking-widest uppercase text-white/90">
                            BALI COCONUT ART
                        </h3>
                    </div>
                </a>

                <p class="font-sans text-[0.8rem] text-white/50 leading-[1.85] mb-6 max-w-[280px]">
                    Bali's premier custom coconut supplier. Trusted by five-star luxury resorts, top-tier beach clubs, and high-profile international events to deliver unparalleled tropical elegance.
                </p>

                <div class="flex gap-2.5">
                    @foreach([
                        ['icon' => 'fa-facebook-f', 'url' => 'https://facebook.com/balicoconutart',  'label' => 'Facebook'],
                        ['icon' => 'fa-instagram',  'url' => 'https://instagram.com/balicoconutart', 'label' => 'Instagram'],
                        ['icon' => 'fa-tiktok',     'url' => 'https://tiktok.com/@balicoconutart',   'label' => 'TikTok'],
                    ] as $soc)
                    <a href="{{ $soc['url'] }}"
                       aria-label="{{ $soc['label'] }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-9 h-9 rounded-full border border-white/10 bg-white/5
                              flex items-center justify-center
                              text-white/50 text-[0.75rem]
                              hover:text-[#1A120B] hover:bg-[#DEC484] hover:border-[#DEC484]
                              transition-all duration-300">
                        <i class="fab {{ $soc['icon'] }}"></i>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- ── Col 2: Navigation ── --}}
            <div>
                <h4 class="font-sans font-bold text-[0.65rem] tracking-[0.2em] text-[#DEC484] uppercase mb-5">
                    Navigation
                </h4>
                <ul class="space-y-3">
                    @foreach([
                        ['label' => 'Home',       'href' => url('/')],
                        ['label' => 'About Us',   'href' => url('/about')],
                        ['label' => 'Services',   'href' => route('services')],
                        ['label' => 'Gallery',    'href' => route('gallery')],
                        ['label' => 'Contact',    'href' => route('contact')],
                    ] as $nav)
                    <li>
                        <a href="{{ $nav['href'] }}"
                           class="group flex items-center gap-2.5
                                  font-sans text-[0.8rem] text-white/50
                                  hover:text-[#DEC484] transition-colors duration-300">
                            <span class="w-3 h-px bg-white/10
                                         group-hover:w-5 group-hover:bg-[#DEC484]
                                         transition-all duration-300"></span>
                            {{ $nav['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- ── Col 3: Product & Services ── --}}
            <div>
                <h4 class="font-sans font-bold text-[0.65rem] tracking-[0.2em] text-[#DEC484] uppercase mb-5">
                    Product & Services
                </h4>
                <ul class="space-y-3">
                    @foreach([
                        'Custom Coconut Logo',
                        'Resort & Hotel Supply',
                        'Wedding Package',
                        'Corporate Package',
                        'Wholesale / Bulk',
                        'Bamboo Straw',
                    ] as $prod)
                    <li>
                        {{-- Tag <a> diganti <div>, semua class 'group' dan 'hover' dihapus agar menjadi teks pasif --}}
                        <div class="flex items-center gap-2.5 font-sans text-[0.8rem] text-white/50 cursor-default">
                            <span class="w-3 h-px bg-white/10"></span>
                            {{ $prod }}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- ── Col 4: Contact ── --}}
            <div class="sm:col-span-2 lg:col-span-1 mt-2 sm:mt-0">
                <h4 class="font-sans font-bold text-[0.65rem] tracking-[0.2em] text-[#DEC484] uppercase mb-5">
                    Contact Us
                </h4>
                <ul class="space-y-4">
                    <li class="flex gap-3 items-start">
                        <i class="fas fa-map-marker-alt text-[#DEC484] text-[0.75rem] mt-1 shrink-0 w-4 text-center"></i>
                        <span class="font-sans text-[0.8rem] text-white/50 leading-[1.6]">
                            Serving all areas in Bali,<br>
                            Indonesia
                        </span>
                    </li>
                    <li class="flex gap-3 items-center">
                        <i class="fab fa-whatsapp text-[#DEC484] text-[0.75rem] shrink-0 w-4 text-center"></i>
                        <a href="https://wa.me/6282146445465"
                           target="_blank" rel="noopener noreferrer"
                           class="font-sans text-[0.8rem] text-white/50 hover:text-[#DEC484] transition-colors duration-300">
                            Chat via WhatsApp
                        </a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <i class="fas fa-envelope text-[#DEC484] text-[0.75rem] shrink-0 w-4 text-center"></i>
                        <a href="mailto:info@balicoconutart.com"
                           class="font-sans text-[0.8rem] text-white/50 hover:text-[#DEC484] transition-colors duration-300 break-all">
                            info@balicoconutart.com
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    {{-- ░ Bottom Bar ░ --}}
    <div class="border-t border-white/5 relative z-10">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-16 pt-6 pb-2
                    flex flex-col sm:flex-row items-center justify-between gap-4">

            <p class="font-sans text-[0.7rem] text-white/30 text-center sm:text-left">
                &copy; {{ date('Y') }} Bali Coconut Art. All rights reserved.
            </p>

            <div class="flex items-center gap-4 flex-wrap justify-center">
                <a href="#"
                   class="font-sans text-[0.7rem] text-white/30 hover:text-[#DEC484] transition-colors duration-300">
                    Privacy Policy
                </a>
            </div>

        </div>
    </div>

</footer>