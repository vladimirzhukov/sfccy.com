<!DOCTYPE html>
<html class="h-full bg-gray-900" lang="{{ (!empty($meta->locale) ? $meta->locale : 'en') }}"{!! (in_array($meta->locale, array('ar', 'he', 'fa')) ? ' dir="rtl"' : '') !!}>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <title>{{ (!empty($meta->metas[$meta->locale]->title) ? $meta->metas[$meta->locale]->title : (!empty($meta->metas['en']->title) ? $meta->metas['en']->title : 'SFC.CY')) }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="{{ (!empty($meta->metas[$meta->locale]->description) ? $meta->metas[$meta->locale]->description : (!empty($meta->metas['en']->description) ? $meta->metas['en']->description : '')) }}">
    <meta name="keywords" content="{{ (!empty($meta->metas[$meta->locale]->keywords) ? $meta->metas[$meta->locale]->keywords : (!empty($meta->metas['en']->keywords) ? $meta->metas['en']->keywords : '')) }}">
    <meta property="og:title" content="{{ (!empty($meta->metas[$meta->locale]->title) ? $meta->metas[$meta->locale]->title : (!empty($meta->metas['en']->title) ? $meta->metas['en']->title : 'SFC.CY')) }}">
    <meta property="og:description" content="{{ (!empty($meta->metas[$meta->locale]->description) ? $meta->metas[$meta->locale]->description : (!empty($meta->metas['en']->description) ? $meta->metas['en']->description : '')) }}">
    <meta property="og:locale" content="{{ (!empty($meta->locale) ? $meta->locale : 'en') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ (!empty($meta->image) ? $meta->image : 'https://tarot.ac/assets/img/main_banner.png') }}">
    <meta property="og:url" content="{{ str_replace('http://', 'https://', url()->current()) }}">
    <meta property="og:site_name" content="{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'SFC.CY')) }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ (!empty($meta->metas[$meta->locale]->title) ? $meta->metas[$meta->locale]->title : (!empty($meta->metas['en']->title) ? $meta->metas['en']->title : 'SFC.CY')) }}">
    <meta property="twitter:description" content="{{ (!empty($meta->metas[$meta->locale]->description) ? $meta->metas[$meta->locale]->description : (!empty($meta->metas['en']->description) ? $meta->metas['en']->description : '')) }}">
    <meta property="twitter:image" content="{{ (!empty($meta->image) ? $meta->image : 'https://tarot.ac/assets/img/main_banner.png') }}">
    {{--<meta name="robots" content="noindex, nofollow">--}}
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ str_replace('http://', 'https://', url()->current()) }}">
    @yield('styles')
    @yield('ldbread')
</head>
<body class="h-full">
    <div class="flex min-h-full">
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                @yield('content')
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 lg:block">
            <img class="absolute inset-0 size-full object-cover brightness-25" src="/assets/images/socialbg.jpg" alt="{{ (!empty($meta->metas[$meta->locale]->name) ? $meta->metas[$meta->locale]->name : (!empty($meta->metas['en']->name) ? $meta->metas['en']->name : 'SFC.CY')) }}" />
        </div>
    </div>
    @yield('js')
</body>
</html>
