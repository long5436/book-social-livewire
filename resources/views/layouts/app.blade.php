<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/scss/app.scss')
    @vite('resources/ts/app.ts')
    @livewireStyles

</head>

<body class="antialiased bg-test"
    @if (Auth::check()) @if (Auth::user()->primary_color)
    style="--color-primary: {{ Auth::user()->primary_color }} @endif
    @endif
    ">
    <livewire:components.partials.navbar />
    {{-- @livewire('components.partials.navbar') --}}

    {{ $slot }}

    @livewireScripts
</body>

</html>
