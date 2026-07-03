<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bali Coconut Art | Trusted Custom Fresh Coconut in Bali')</title>
    <meta name="description" content="Bali's Branded Coconut Supplier For Hotels, Villas, Weddings, and Events. We provide premium fresh coconuts with custom laser engraving.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Oswald:wght@600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
</head>
<body class="bg-[#0f0f12] font-sans text-gray-300 antialiased overflow-x-hidden">

    @yield('content')
    @stack('scripts')
</body>
</html>