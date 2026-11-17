@if($spotlight)
@push('head')
<script type="application/ld+json">
{
  "@@context":"https://schema.org","@@type":"Product",
  "name":"{{ $spotlight->name }}",
  "description":"{{ $spotlight->description }}",
  "image":"{{ $spotlight->image_url }}",
  "brand":{"@@type":"Brand","name":"CONCREA"}
}
</script>
@endpush

<section class="section spotlight" id="best-product">
    <div class="wrap spot-grid">
        <div class="spot-photo">
            <img src="{{ $spotlight->image_url }}" alt="{{ $spotlight->name }} in lightweight concrete" width="800" height="1000" loading="lazy">
            <div class="badge"><b>IFEX 2026</b>Standout Piece</div>
        </div>
        <div>
            <p class="eyebrow">Best Product 2026</p>
            <h2>Engineered for Comfort, Designed for Joy.</h2>
            <p class="lead">{{ $spotlight->description }}</p>
            @if($spotlight->specs)
            <ul class="specs">
                @foreach($spotlight->specs as $label => $value)
                <li><span>{{ $label }}</span><span>{{ $value }}</span></li>
                @endforeach
            </ul>
            @endif
            <a href="#enquiry" class="btn btn-primary" data-track="spotlight_cta_click" data-label="{{ $spotlight->name }}">Shop the Tuby</a>
            <a href="{{ route('product.show', $spotlight) }}" class="link" style="margin-left:16px;color:var(--limestone)">View details →</a>
        </div>
    </div>
</section>
@endif