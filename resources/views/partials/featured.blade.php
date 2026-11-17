<section class="section" style="padding-top:0">
    <div class="wrap">
        <div class="feat-head">
            <div>
                <p class="eyebrow">Our Collection</p>
                <h2 style="margin:0">Featured Pieces</h2>
            </div>
            <div class="feat-nav">
                <span class="count" id="feat-count">01 / {{ str_pad($featured->count() + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <button type="button" id="feat-prev" aria-label="Previous">←</button>
                <button type="button" id="feat-next" aria-label="Next">→</button>
            </div>
        </div>

        <div class="feat-track" id="feat-track" tabindex="0" role="region" aria-label="Featured pieces">
            @foreach($featured as $p)
                @include('partials.product-card', ['p' => $p, 'i' => $loop->iteration])
            @endforeach
            <a href="{{ route('home') }}#collection" class="card card-all" data-track="product_card_click" data-label="view_all" data-section="featured">View all pieces →</a>
        </div>
    </div>
</section>