<section class="section" id="collection">
    <div class="wrap">
        <p class="eyebrow">Collections</p>
        <h2>Shop by Category</h2>

        <div class="chips" role="group" aria-label="Filter categories">
            <button class="chip is-active" data-filter="all">All</button>
            @foreach($categories as $c)
                <button class="chip" data-filter="{{ $c->slug }}">{{ \Illuminate\Support\Str::before($c->name, ' ') }}</button>
            @endforeach
        </div>

        <div class="cat-grid">
            @foreach($categories as $c)
            <a href="{{ route('category.show', $c) }}" class="cat {{ $c->is_dark ? 'is-dark' : '' }}" data-cat="{{ $c->slug }}"
               data-track="category_tile_click" data-label="{{ $c->name }}" data-position="{{ $loop->iteration }}">
                <div class="cat-img">
                    @if($c->is_dark)
                        <span>✎ {{ $c->tagline }}</span>
                    @else
                        <img src="{{ $c->image_url }}" alt="{{ $c->name }}" width="600" height="750" loading="lazy">
                    @endif
                </div>
                <div class="cat-label">{{ $c->name }}
                    <small>{{ $c->is_dark ? 'Start a project →' : $c->products_count . ' ' . \Illuminate\Support\Str::plural('piece', $c->products_count) }}</small>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>