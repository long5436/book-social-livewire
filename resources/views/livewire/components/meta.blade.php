<div>
    <x-slot name='meta'>

        @php
            // $siteName = 'Diễn đàn sách đỉnh cao';
            // $title = '';
            // $description = '';
            $url = request()->fullUrl();
            // $image = '';
            $keywords = 'Sách hay, review sách, đánh giá sách, mua sách, bán sách, mạng xã hội sách';
        @endphp

        <title>{{ $title }}</title>
        <meta name="keywords" content="{{ $keywords }}">
        <meta name="author" content="{{ $siteName }}">
        <meta name="description" content="{{ $description }}">

        <meta property="og:site_name" content="{{ $siteName }}">
        <meta property="og:image" content="{{ $image }}">

        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ $url }}">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="{{ $description }}">

        <meta property="twitter:card" content="summary">
        <meta property="twitter:title" content="{{ $title }}">
        <meta property="twitter:description" content="{{ $description }}">
        <meta property="twitter:image" content="{{ $image }}">
        <meta property="twitter:url" content="{{ $url }}">

        <meta name="robots" content="max-image-preview:large">


    </x-slot>
</div>
