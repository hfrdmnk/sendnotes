<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="relative flex items-center justify-center min-h-screen p-6">
        @if (Route::has('login'))
            <header class="absolute inset-0 bottom-auto w-full p-6 bg-white">
                <livewire:welcome.navigation />
            </header>
        @endif
        <div class="flex flex-col items-center gap-4 p-6 mx-auto max-w-7xl lg:p-8">
            <x-application-logo class="w-24 h-24 fill-current text-primary" />
            <x-button primary xl :href="route('register')">Get Started</x-button>
        </div>
    </div>
</body>

</html>
