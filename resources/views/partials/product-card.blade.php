<a href="{{ route('product.show', $p) }}" class="card" data-track="product_card_click" data-label="{{ $p->name }}" data-section="featured" data-position="{{ $i }}">
    <div class="card-img">
        <img src="{{ $p->image_url }}" alt="{{ $p->name }}" width="600" height="750" loading="lazy">
        @if($p->insitu_url)
            <img class="alt" src="{{ $p->insitu_url }}" alt="" aria-hidden="true" loading="lazy">
        @endif
    </div>
    <div class="card-body">
        <small>{{ $p->collection }}</small>
        <h3>{{ $p->name }}</h3>
        <p>{{ $p->spec_line }}</p>
        <span class="link">View piece →</span>
    </div>
</a>