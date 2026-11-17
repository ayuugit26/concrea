<section class="hero">
    <div class="wrap hero-grid">
        <div class="hero-text">
            <p class="eyebrow">Natural Concrete · Engineered in Yogyakarta</p>
            <h1>High Performance Natural Concrete Furniture</h1>
            <p class="lead">Lightweight, weather-resistant, and made to order for homes, hotels, and global projects.</p>
            <div class="stack">
                <a href="#enquiry" class="btn btn-primary" data-track="hero_cta_click" data-label="request_quote">Request a Quote</a>
                <a href="#collection" class="btn btn-secondary" data-track="hero_cta_click" data-label="explore_collection">Explore Collection</a>
            </div>
        </div>
        @if($hero)
        <figure>
            <img src="{{ $hero->image_url }}" alt="{{ $hero->name }} in sage green with an oval cut-out" width="800" height="1000" fetchpriority="high">
            <figcaption><a href="{{ route('product.show', $hero) }}" data-track="product_card_click" data-label="{{ $hero->name }}" data-section="hero">{{ $hero->name }} · {{ $hero->color_label }} →</a></figcaption>
        </figure>
        @endif
    </div>
</section>