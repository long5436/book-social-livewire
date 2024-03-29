<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/scss/app.scss')
    @vite('resources/ts/app.ts')
    @livewireStyles
    {{ $meta }}

</head>

<body class="antialiased bg-test"
    @if (Auth::check()) @if (Auth::user()->primary_color)
    style="--color-primary: {{ Auth::user()->primary_color }} @endif
    @endif
    ">
    <livewire:components.partials.navbar />
    {{-- @livewire('components.partials.navbar') --}}

    {{ $slot }}

    <livewire:components.partials.footer />
    @livewireScripts
</body>

</html>
