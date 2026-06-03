<section id="why-us" class="relative bg-white pt-8 pb-16 px-6 lg:px-12 overflow-visible">    
    <div class="max-w-6xl mx-auto">
        
    {{-- Header Section --}}
        <div class="text-center mb-12">
            {{-- Eyebrow --}}
            <div class="flex items-center justify-center gap-4 mb-3">
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
                <span class="text-[#DEC484] text-xs font-bold tracking-[0.2em] uppercase">Why Choose Us</span>
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
            </div>
            
            {{-- Main Title --}}
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0B1A28] uppercase leading-tight mb-4">
                WHY CUSTOM <br>
                <span class="text-[#DEC484]">COCONUTS?</span>
            </h2>
            
            {{-- Subtitle --}}
            <p class="text-gray-500 text-sm md:text-base max-w-2xl mx-auto">
                Elevate your event with a touch of tropical luxury and sustainability that your guests will never forget.
            </p>
        </div>

        {{-- Stacking Cards Container (KEMBALI KE STRUKTUR ASLIMU) --}}
        <div class="space-y-0 pb-32">
            
            {{-- KARTU 1: Jarak dari atas layar 96px (top-24) --}}
            <div class="sticky top-24 z-10 w-full bg-white rounded-[2rem] shadow-xl border border-gray-100 flex flex-col md:flex-row h-auto md:h-[480px] mb-8 transition-all duration-500 p-3 md:p-5">
                <div class="w-full md:w-1/2 h-64 md:h-full">
                    <img src="{{ asset('images/benefit1.jpg') }}" alt="Tropical Aesthetics" class="w-full h-full object-cover rounded-3xl">
                </div>
                <div class="w-full md:w-1/2 p-8 md:px-12 flex flex-col justify-center">
                    <h3 class="text-4xl md:text-5xl font-serif text-gray-900 leading-tight mb-6">
                        The Ultimate <br>
                        <span class="italic font-light text-gray-500">Tropical Aesthetics</span>
                    </h3>
                    <p class="text-gray-600 text-lg leading-relaxed font-light">
                        Turn every sip into a photo opportunity. Our custom engraved coconuts act as the perfect, highly-shareable property that instantly elevates the visual class of your event.
                    </p>
                </div>
            </div>

            {{-- KARTU 2: Jarak 112px (top-28). Selisih tumpukan pas 16px! --}}
            <div class="sticky top-28 z-20 w-full bg-[#FDFBF7] rounded-[2rem] shadow-2xl border border-[#F0EBE1] flex flex-col md:flex-row-reverse h-auto md:h-[480px] mb-8 transition-all duration-500 p-3 md:p-5">
                <div class="w-full md:w-1/2 h-64 md:h-full">
                    <img src="{{ asset('images/benefit2.jpg') }}" alt="Healthy Refreshment" class="w-full h-full object-cover rounded-3xl">
                </div>
                <div class="w-full md:w-1/2 p-8 md:px-12 flex flex-col justify-center">
                    <h3 class="text-4xl md:text-5xl font-serif text-gray-900 leading-tight mb-6">
                        Pure, Healthy <br>
                        <span class="italic font-light text-gray-500">Refreshment</span>
                    </h3>
                    <p class="text-gray-600 text-lg leading-relaxed font-light">
                        Beat the Bali heat with nature's best hydration. Serving 100% pure, fresh coconut water offers your guests a premium, healthy, and revitalizing alternative to standard packaged drinks.
                    </p>
                </div>
            </div>

            {{-- KARTU 3: Jarak 128px (top-32). Selisih tumpukan 16px lagi. Sesuai kodemu, margin bottom dihilangkan di kartu terakhir --}}
            <div class="sticky top-32 z-30 w-full bg-[#F7F3EA] rounded-[2rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] border border-[#E8DFCE] flex flex-col md:flex-row h-auto md:h-[480px] transition-all duration-500 p-3 md:p-5">
                <div class="w-full md:w-1/2 h-64 md:h-full">
                    <img src="{{ asset('images/benefit3.jpg') }}" alt="Eco-Friendly Souvenir" class="w-full h-full object-cover rounded-3xl">
                </div>
                <div class="w-full md:w-1/2 p-8 md:px-12 flex flex-col justify-center">
                    <h3 class="text-4xl md:text-5xl font-serif text-gray-900 leading-tight mb-6">
                        Eco-Friendly <br>
                        <span class="italic font-light text-gray-500">Souvenir</span>
                    </h3>
                    <p class="text-gray-600 text-lg leading-relaxed font-light">
                        Make a statement without leaving a trace. Our customized coconuts serve as a unique, zero-waste branding solution that leaves a lasting impression on your guests and a minimal footprint on the earth.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>