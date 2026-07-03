{{-- ═══════════════════════════════════════════════════════════════
    SECTION: FOOTER
    Theme   : Dark Coconut Shell with Pure White Text & Green Hover
═══════════════════════════════════════════════════════════════ --}}

<footer class="relative bg-gradient-to-b from-[#1A120B] to-[#0D0905] pt-16 lg:pt-24 pb-12 border-t border-[#8CC63F]/20 overflow-hidden">

    {{-- ░ Main Footer Grid ░ --}}
    <div class="max-w-[1440px] mx-auto px-6 lg:px-16 pb-12 relative z-10">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[1.1fr_2fr_1fr] gap-10 sm:gap-12 lg:gap-16">

    {{-- ── Col 1: Brand & Social ── --}}
        <div class="sm:col-span-2 lg:col-span-1">

            <a href="#home" class="inline-block mb-5 group">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.webp') }}" alt="Bali Coconut Art Logo" class="w-9 h-9 object-contain rounded-full border border-white/20 group-hover:border-[#8CC63F] transition-all duration-300">
                    <h3 class="font-sans font-bold text-base tracking-widest uppercase text-white group-hover:text-[#8CC63F] transition-colors duration-300">
                        BALI COCONUT ART
                    </h3>
                </div>
            </a>

            <p class="font-sans text-[0.8rem] text-white leading-[1.85] mb-6 max-w-[280px]">
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
                class="w-9 h-9 rounded-full border border-white/20 bg-white/5
                        flex items-center justify-center
                        text-white text-[0.75rem]
                        hover:text-white hover:bg-[#5B8C2A] hover:border-[#5B8C2A]
                        transition-all duration-300">
                    <i class="fab {{ $soc['icon'] }}"></i>
                </a>
                @endforeach
            </div>
        </div>

        {{-- ── Col 2: Product & Services ── --}}
        {{-- ── Col 2: Product & Services ── --}}
<div>
    <h4 class="font-sans font-bold text-[0.65rem] tracking-[0.2em] text-white uppercase mb-5">
        Product & Services
    </h4>
    <ul class="grid grid-cols-2 gap-x-6 gap-y-2.5">
        @foreach([
            'Fresh Young Coconuts',
            'Fresh Coconut Water',
            'Custom Branded Coconuts',
            'Custom Engraved Coconut Cups',
            'Bamboo Straws',
            'Event Planning Services',
            'Promotional Events',
            'Corporate Events',
            'Grand Opening Ceremonies',
            'Office Parties',
            'Awards Ceremonies',
            'Employee Appreciation',
            'Open Houses',
            'Staff Incharges',
            'Weddings',
            'Bachelor/Bachelorette Parties',
            'Birthdays',
            'Anniversaries',
            'Graduations',
            'Delivery Orders',
            'Baby Gender Reveal',
            'Family Reunions',
            'Retirement Parties',
            'Holiday Parties',
            'Festivals',
            'Fundraising Events',
            'Trade Shows & Exhibitions',
        ] as $prod)
        <li class="min-w-0">
            <div class="flex items-center gap-2 font-sans text-[0.78rem] text-white">
                <span class="w-2 h-px bg-white/30 shrink-0"></span>
                <span
                    class="truncate cursor-pointer"
                    onclick="this.classList.toggle('truncate')"
                    title="{{ $prod }}"
                >{{ $prod }}</span>
            </div>
        </li>
        @endforeach
    </ul>
</div>

    {{-- ── Col 3: Contact ── --}}
        <div class="mt-2 sm:mt-0">
            <h4 class="font-sans font-bold text-[0.65rem] tracking-[0.2em] text-white uppercase mb-5">
                Contact Us
            </h4>
            <ul class="space-y-4">
                <li class="flex gap-3 items-start">
                    <i class="fas fa-map-marker-alt text-white text-[0.75rem] mt-1 shrink-0 w-4 text-center"></i>
                    <span class="font-sans text-[0.8rem] text-white leading-[1.6]">
                        Serving all areas in Bali,<br>
                        Indonesia
                    </span>
                </li>
                <li class="flex gap-3 items-center group">
                    <i class="fab fa-whatsapp text-white group-hover:text-[#8CC63F] transition-colors duration-300 text-[0.75rem] shrink-0 w-4 text-center"></i>
                    <a href="https://wa.me/6282146445465"
                    target="_blank" rel="noopener noreferrer"
                    class="font-sans text-[0.8rem] text-white group-hover:text-[#8CC63F] transition-colors duration-300">
                        Chat via WhatsApp
                    </a>
                </li>
                <li class="flex gap-3 items-center group">
                    <i class="fas fa-envelope text-white group-hover:text-[#8CC63F] transition-colors duration-300 text-[0.75rem] shrink-0 w-4 text-center"></i>
                    <a href="mailto:info@balicoconutart.com"
                    class="font-sans text-[0.8rem] text-white group-hover:text-[#8CC63F] transition-colors duration-300 break-all">
                        info@balicoconutart.com
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>

    {{-- ░ Bottom Bar ░ --}}
    <div class="border-t border-white/20 relative z-10">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-16 pt-6 pb-2
                    flex flex-col sm:flex-row items-center justify-between gap-4">

            <p class="font-sans text-[0.7rem] text-white text-center sm:text-left">
                &copy; {{ date('Y') }} Bali Coconut Art. All rights reserved.
            </p>

            <div class="flex items-center gap-4 flex-wrap justify-center">
                <a href="#"
                   class="font-sans text-[0.7rem] text-white hover:text-[#8CC63F] transition-colors duration-300">
                    Privacy Policy
                </a>
            </div>

        </div>
    </div>

</footer>