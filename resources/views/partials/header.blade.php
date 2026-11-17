<header class="header" id="header">
    <div class="wrap">
        <a href="{{ route('home') }}" class="logo" aria-label="CONCREA home">CONCREA</a>
        <div class="header-actions">
            <a href="{{ route('home') }}#enquiry" class="link" data-track="hero_cta_click" data-label="header_enquire">Enquire</a>
            <button class="icon-btn" id="menu-open" aria-label="Open menu" aria-expanded="false" aria-controls="menu">☰</button>
        </div>
    </div>
</header>

<div class="menu" id="menu" role="dialog" aria-modal="true" aria-label="Main menu">
    <div class="menu-top">
        <span class="logo">CONCREA</span>
        <button class="icon-btn" id="menu-close" aria-label="Close menu" style="color:inherit">✕</button>
    </div>
    <nav>
        <a href="{{ route('home') }}#collection">Collection</a>
        <a href="{{ route('home') }}#finishes">Finishes</a>
        <a href="{{ route('home') }}#custom">Custom Projects</a>
        <a href="{{ route('home') }}#about">About</a>
        <a href="{{ route('home') }}#enquiry">Contact</a>
    </nav>
    <div class="menu-foot">
        <a href="{{ config('concrea.instagram') }}">Instagram</a>
        <a href="mailto:{{ config('concrea.notify_email') }}">Email</a>
    </div>
</div>