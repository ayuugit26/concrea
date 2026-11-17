<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CONCREA | Natural Concrete Furniture from Yogyakarta')</title>
    <meta name="description" content="@yield('description', 'High performance natural concrete furniture, handcrafted in Yogyakarta. Custom projects for hotels, restaurants and villas with worldwide shipping.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Fraunces:opsz,wght@9..144,400;9..144,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/concrea.css') }}">
    <script>document.documentElement.classList.add('js');</script>

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "CONCREA",
      "url": "{{ url('/') }}",
      "description": "High performance natural concrete furniture handcrafted in Yogyakarta, Indonesia.",
      "address": { "@@type": "PostalAddress", "addressLocality": "Yogyakarta", "addressCountry": "ID" }
    }
    </script>
    @stack('head')
</head>
<body>
    <a class="skip" href="#main">Skip to content</a>
    @yield('body')
    <script>window.dataLayer = window.dataLayer || [];</script>
    <script src="{{ asset('js/concrea.js') }}" defer></script>
</body>
</html>