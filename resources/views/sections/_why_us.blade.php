<section id="why-us" class="relative bg-white pt-8 pb-12 px-4 md:px-6 lg:px-12 overflow-visible">    
    <div class="max-w-6xl mx-auto relative">
        
        {{-- Header Section --}}
        <div class="text-center mb-12 md:mb-16 relative z-0">
            <div class="flex items-center justify-center gap-4 mb-3">
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
                <span class="text-[#DEC484] text-xs font-bold tracking-[0.2em] uppercase">Why Choose Us</span>
                <span class="w-8 h-[1px] bg-[#DEC484]"></span>
            </div>
            
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0B1A28] uppercase leading-tight mb-4">
                WHY CUSTOM <br>
                <span class="text-[#DEC484]">COCONUTS?</span>
            </h2>
            
            <p class="text-gray-500 text-sm md:text-base max-w-2xl mx-auto px-4 md:px-0">
                Elevate your event with a touch of tropical luxury and sustainability that your guests will never forget.
            </p>
        </div>

        {{-- STACKING CARDS CONTAINER --}}
        <div class="relative w-full pb-20 md:pb-32">
            
            {{-- KARTU 1 --}}
            {{-- Menempel di 96px dari atas. Jarak normal mb-12 --}}
            <div class="sticky top-24 md:top-32 z-10 w-full bg-white rounded-[2rem] shadow-[0_10px_30px_rgba(0,0,0,0.08)] border border-gray-100 flex flex-col md:flex-row h-auto md:h-[480px] mb-12 md:mb-16 transition-all duration-500 p-3 md:p-5">
                <div class="w-full md:w-1/2 h-[220px] sm:h-64 md:h-full shrink-0">
                    <img src="{{ asset('images/g9.webp') }}" alt="Tropical Aesthetics" class="w-full h-full object-cover rounded-3xl">
                </div>
                <div class="w-full md:w-1/2 p-6 sm:p-8 md:px-12 flex flex-col justify-center text-center md:text-left">
                    <h3 class="text-3xl md:text-5xl font-serif text-gray-900 leading-tight mb-4 md:mb-6">
                    Sip, Snap, and<br>
                        <span class="italic font-light text-gray-500">Share</span>
                    </h3>
                    <p class="text-gray-600 text-[0.95rem] md:text-lg leading-relaxed font-light">
                    Give your guests something to talk about! A personalized coconut is the ultimate tropical accessory for your event. It’s refreshing, totally unique, and practically guarantees your event will be all over their Instagram stories.
                    </p>
                </div>
            </div>

            {{-- KARTU 2 --}}
            {{-- Menempel di 128px dari atas (selisih pas 32px dari kartu 1). Jarak normal mb-12 --}}
            <div class="sticky top-32 md:top-40 z-20 w-full bg-[#FDFBF7] rounded-[2rem] shadow-[0_10px_30px_rgba(0,0,0,0.08)] border border-[#F0EBE1] flex flex-col md:flex-row-reverse h-auto md:h-[480px] mb-12 md:mb-16 transition-all duration-500 p-3 md:p-5">
                <div class="w-full md:w-1/2 h-[220px] sm:h-64 md:h-full shrink-0">
                    <img src="{{ asset('images/benefit2.webp') }}" alt="Healthy Refreshment" class="w-full h-full object-cover rounded-3xl">
                </div>
                <div class="w-full md:w-1/2 p-6 sm:p-8 md:px-12 flex flex-col justify-center text-center md:text-left">
                    <h3 class="text-3xl md:text-5xl font-serif text-gray-900 leading-tight mb-4 md:mb-6">
                        Pure, Healthy <br>
                        <span class="italic font-light text-gray-500">Refreshment</span>
                    </h3>
                    <p class="text-gray-600 text-[0.95rem] md:text-lg leading-relaxed font-light">
                        Beat the Bali heat with nature's best hydration. Serving 100% pure, fresh coconut water offers your guests a premium, healthy, and revitalizing alternative to standard packaged drinks.
                    </p>
                </div>
            </div>

            {{-- KARTU 3 --}}
            {{-- Menempel di 160px dari atas (selisih pas 32px dari kartu 2). mb-0 karena kartu terakhir --}}
            <div class="sticky top-40 md:top-48 z-30 w-full bg-[#F7F3EA] rounded-[2rem] shadow-[0_10px_30px_rgba(0,0,0,0.08)] border border-[#E8DFCE] flex flex-col md:flex-row h-auto md:h-[480px] transition-all duration-500 p-3 md:p-5">
                <div class="w-full md:w-1/2 h-[220px] sm:h-64 md:h-full shrink-0">
                    <img src="{{ asset('images/benefit1.webp') }}" alt="Eco-Friendly Souvenir" class="w-full h-full object-cover rounded-3xl">
                </div>
                <div class="w-full md:w-1/2 p-6 sm:p-8 md:px-12 flex flex-col justify-center text-center md:text-left">
                    <h3 class="text-3xl md:text-5xl font-serif text-gray-900 leading-tight mb-4 md:mb-6">
                    ZERO-WASTE <br>
                        <span class="italic font-light text-gray-500">ELEGANCE</span>
                    </h3>
                    <p class="text-gray-600 text-[0.95rem] md:text-lg leading-relaxed font-light">
                    True luxury respects the environment. Our engraved coconuts offer a stunning, plastic-free alternative to traditional event drinks. You get all the visual impact of customized branding, completely guilt-free and perfectly in tune with nature.                    </p>
                </div>
            </div>

        </div>
    </div>
</section>