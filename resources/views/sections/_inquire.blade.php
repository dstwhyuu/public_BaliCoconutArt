{{-- ░░ INQUIRE NOW SECTION ░░ --}}

<section id="inquire" class="bg-white pt-0 pb-24 px-4 md:px-6 lg:px-12">
    <div class="max-w-6xl mx-auto">

    {{-- ── Section Header ── --}}
        <div class="text-center md:text-left mb-12 md:mb-16 reveal-up">

            {{-- Eyebrow --}}
            <div class="flex items-center justify-center md:justify-start gap-4 mb-3">
                <span class="text-[#8CC63F] text-xs font-bold tracking-[0.2em] uppercase">Get In Touch</span>
            </div>

            {{-- Headline --}}
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase leading-tight mb-4">
                INQUIRE
                <span class="text-[#8CC63F]">NOW</span>
            </h2>

            {{-- Description --}}
            <p class="text-gray-500 text-sm md:text-base max-w-2xl px-4 md:px-0 mx-auto md:mx-0">
                Fill in your event details and we'll craft a coconut experience made exactly for it.
            </p>

        </div>

        {{-- ── Form + Visual Wrapper ── --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">

            {{-- Form Column --}}
            <div class="w-full max-w-2xl lg:max-w-none">

            @if (session('success'))
                <div id="success-alert" class="flex items-start gap-4 bg-[#f2f8ec] border border-[#8CC63F]/30 rounded-xl px-5 py-4 mb-8 transition-opacity duration-500">
                    <div class="shrink-0 w-8 h-8 rounded-full bg-[#8CC63F] flex items-center justify-center mt-0.5">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-[#3B6D11] mb-0.5">Inquiry Sent!</p>
                        <p class="text-xs text-[#5B8C2A] leading-relaxed">{{ session('success') }}</p>
                    </div>
                    <button type="button" onclick="dismissSuccessAlert()" class="shrink-0 text-[#8CC63F] hover:text-[#5B8C2A] transition-colors mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            @endif

            @if (session('success') || $errors->any())
                <script>
                    function dismissSuccessAlert() {
                        const alertBox = document.getElementById('success-alert');
                        if (alertBox) {
                            alertBox.style.opacity = '0';
                            setTimeout(() => alertBox.remove(), 500);
                        }
                    }

                    document.addEventListener('DOMContentLoaded', function () {
                        const el = document.getElementById('inquire');
                        if (el) {
                            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }

                        @if (session('success'))
                            // Auto-hide alert sukses setelah 6 detik
                            setTimeout(dismissSuccessAlert, 6000);
                        @endif
                    });
                </script>
            @endif
            <form method="POST" action="{{ route('inquire.store') }}" id="inquire-form">
                @csrf
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                {{-- ───────────────────────────── --}}
                {{-- Group 1: Personal Information --}}
                {{-- ───────────────────────────── --}}
                <div class="mb-12">

                    <div class="space-y-5">

                        {{-- Full Name --}}
                        <div>
                            <label for="name"
                                class="block text-sm text-gray-600 font-medium mb-2">
                                Full Name
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                placeholder="First and last name"
                                autocomplete="name"
                                value="{{ old('name') }}"
                                class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400
                                       transition-all duration-200
                                       focus:outline-none focus:border-[#8CC63F] focus:ring-4 focus:ring-[#8CC63F]/10
                                       @error('name') border-red-400 @enderror">
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email & Phone --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div>
                                <label for="email"
                                    class="block text-sm text-gray-600 font-medium mb-2">
                                    Email Address
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="you@email.com"
                                    autocomplete="email"
                                    value="{{ old('email') }}"
                                    class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400
                                           transition-all duration-200
                                           focus:outline-none focus:border-[#8CC63F] focus:ring-4 focus:ring-[#8CC63F]/10
                                           @error('email') border-red-400 @enderror">
                                @error('email')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone"
                                    class="block text-sm text-gray-600 font-medium mb-2">
                                    Phone Number
                                </label>
                                <input
                                    type="tel"
                                    name="phone"
                                    id="phone"
                                    placeholder="+62 8xx xxxx xxxx"
                                    autocomplete="tel"
                                    value="{{ old('phone') }}"
                                    class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400
                                           transition-all duration-200
                                           focus:outline-none focus:border-[#8CC63F] focus:ring-4 focus:ring-[#8CC63F]/10
                                           @error('phone') border-red-400 @enderror">
                                @error('phone')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ─────────────────────────── --}}
                {{-- Group 2: Event Information --}}
                {{-- ─────────────────────────── --}}
                <div class="mb-12">

                    <div class="space-y-5">

                        {{-- Event / Brand Name --}}
                        <div>
                            <label for="event_name"
                                class="block text-sm text-gray-600 font-medium mb-2">
                                Event / Brand Name
                            </label>
                            <input
                                type="text"
                                name="event_name"
                                id="event_name"
                                placeholder="e.g. Coconut Vibes Festival"
                                value="{{ old('event_name') }}"
                                class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400
                                       transition-all duration-200
                                       focus:outline-none focus:border-[#8CC63F] focus:ring-4 focus:ring-[#8CC63F]/10
                                       @error('event_name') border-red-400 @enderror">
                            @error('event_name')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Event Date & Number of Coconuts --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div>
                                <label for="event_date"
                                    class="block text-sm text-gray-600 font-medium mb-2">
                                    Event Date
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="far fa-calendar-alt text-gray-400" aria-hidden="true"></i>
                                    </div>
                                    <input
                                        type="text"
                                        onfocus="(this.type='date')"
                                        onblur="if(!this.value) this.type='text'"
                                        name="event_date"
                                        id="event_date"
                                        placeholder="Select a date"
                                        value="{{ old('event_date') }}"
                                        class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-10 pr-4 py-3.5 text-sm text-gray-900 placeholder-gray-400
                                               transition-all duration-200 cursor-pointer
                                               focus:outline-none focus:border-[#8CC63F] focus:ring-4 focus:ring-[#8CC63F]/10
                                               @error('event_date') border-red-400 @enderror">
                                </div>
                                @error('event_date')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="coconut_count"
                                    class="block text-sm text-gray-600 font-medium mb-2">
                                    Number of Coconuts
                                </label>
                                <input
                                    type="number"
                                    name="coconut_count"
                                    id="coconut_count"
                                    min="1"
                                    placeholder="Estimated quantity"
                                    value="{{ old('coconut_count') }}"
                                    class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400
                                           transition-all duration-200
                                           focus:outline-none focus:border-[#8CC63F] focus:ring-4 focus:ring-[#8CC63F]/10
                                           @error('coconut_count') border-red-400 @enderror">
                                @error('coconut_count')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Location --}}
                        <div>
                            <label for="location"
                                class="block text-sm text-gray-600 font-medium mb-2">
                                Location
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400" aria-hidden="true"></i>
                                </div>
                                <input
                                    type="text"
                                    name="location"
                                    id="location"
                                    maxlength="150"
                                    placeholder="City, venue, or address"
                                    value="{{ old('location') }}"
                                    oninput="document.getElementById('char-counter').textContent = this.value.length + '/150'"
                                    class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-10 pr-16 py-3.5 text-sm text-gray-900 placeholder-gray-400
                                           transition-all duration-200
                                           focus:outline-none focus:border-[#8CC63F] focus:ring-4 focus:ring-[#8CC63F]/10
                                           @error('location') border-red-400 @enderror">
                                <span id="char-counter"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-[0.65rem] text-gray-400 pointer-events-none select-none">
                                    0/150
                                </span>
                            </div>
                            @error('location')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                
                {{-- ────────────── --}}
                {{-- Submit Area   --}}
                {{-- ────────────── --}}
                <div class="flex flex-col sm:flex-row items-center justify-between gap-5">

                    {{-- reCAPTCHA Legal Text --}}
                    <p class="text-[0.7rem] text-gray-400 font-light leading-relaxed
                               text-center sm:text-left order-2 sm:order-1 max-w-[240px]">
                        Protected by reCAPTCHA —
                        <a href="https://policies.google.com/privacy" target="_blank" rel="noopener"
                            class="underline hover:text-[#8CC63F] transition-colors">Privacy</a>
                        &amp;
                        <a href="https://policies.google.com/terms" target="_blank" rel="noopener"
                            class="underline hover:text-[#8CC63F] transition-colors">Terms</a>&nbsp;apply.
                    </p>

                    {{-- Submit Button --}}
                    <button
                        type="submit"
                        class="group w-full sm:w-auto order-1 sm:order-2 shrink-0
                               inline-flex items-center justify-center gap-2
                               bg-[#0F1D06] text-white
                               px-6 py-2.5 rounded-full
                               font-bold tracking-[0.1em] uppercase text-[0.7rem]
                               transition-all duration-300 hover:-translate-y-0.5">
                        Submit
                        <svg class="w-3 h-3 transition-transform duration-300 group-hover:translate-x-0.5"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </button>

                </div>

            </form>

            <script>
                document.getElementById('inquire-form').addEventListener('submit', function (e) {
                    e.preventDefault();
                    const form = this;

                    grecaptcha.ready(function () {
                        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'inquire_submit' })
                            .then(function (token) {
                                document.getElementById('g-recaptcha-response').value = token;
                                form.submit();
                            });
                    });
                });
                </script>
            </div>

            {{-- ░░ Image Collage Column ░░ --}}
            <div class="hidden lg:flex items-center relative">
                <div class="relative h-[500px] w-full">

                {{-- Decorative blobs --}}
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-[#8CC63F]/15 rounded-full blur-3xl -z-10"></div>
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-[#8CC63F]/10 rounded-full blur-2xl -z-10"></div>

                {{-- Main large image --}}
                <div class="absolute top-0 right-0 w-[72%] h-[360px] rounded-[1.75rem] overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/n7.webp') }}" class="w-full h-full object-cover" alt="Custom engraved coconut">
                </div>

                {{-- Secondary image, overlap bottom-left --}}
                <div class="absolute bottom-0 left-0 w-[52%] h-[225px] rounded-[1.75rem] overflow-hidden shadow-2xl border-4 border-white">
                    <img src="{{ asset('images/n13.webp') }}" class="w-full h-full object-cover" alt="Coconut setup at event">
                </div>

                {{-- Small accent image, floating --}}
                <div class="absolute top-1/2 -translate-y-1/2 -right-4 w-32 h-32 rounded-2xl overflow-hidden shadow-xl border-4 border-white rotate-6 z-10">
                    <img src="{{ asset('images/n4.webp') }}" class="w-full h-full object-cover" alt="Coconut detail close-up">
                </div>

                </div>
            </div>

        </div>

    </div>
</section>