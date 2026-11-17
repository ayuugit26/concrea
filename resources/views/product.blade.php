@extends('layouts.app')

@section('title', $product->name . ' | CONCREA')

@push('head')
<meta name="description" content="{{ \Illuminate\Support\Str::limit($product->description ?: $product->name . ' by CONCREA, natural concrete furniture from Yogyakarta.', 150) }}">
<script type="application/ld+json">
{
  "@context":"https://schema.org","@type":"Product",
  "name":"{{ $product->name }}",
  "description":"{{ $product->description }}",
  "image":"{{ $product->image_url }}",
  "brand":{"@type":"Brand","name":"CONCREA"},
  "category":"{{ $product->category->name }}"
}
</script>
<script type="application/ld+json">
{
  "@context":"https://schema.org","@type":"BreadcrumbList",
  "itemListElement":[
    {"@type":"ListItem","position":1,"name":"Home","item":"{{ route('home') }}"},
    {"@type":"ListItem","position":2,"name":"{{ $product->category->name }}","item":"{{ route('category.show', $product->category) }}"},
    {"@type":"ListItem","position":3,"name":"{{ $product->name }}"}
  ]
}
</script>
@endpush

@section('body')
    @include('partials.announcement')
    @include('partials.header')

    <main id="main" class="section" style="padding-top:32px">
        <div class="wrap">
            <nav class="crumbs" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a> /
                <a href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a> /
                <span>{{ $product->name }}</span>
            </nav>

            <div class="pdp">
                <div class="pdp-photos">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" width="900" height="1125" fetchpriority="high">
                    @if($product->insitu_url)
                        <img src="{{ $product->insitu_url }}" alt="{{ $product->name }} in situ" width="900" height="1125" loading="lazy">
                    @endif
                </div>

                <div class="pdp-info">
                    <p class="eyebrow">{{ $product->collection }}</p>
                    <h1 style="font-size:clamp(34px,5vw,52px);line-height:1.1">{{ $product->name }}</h1>
                    @if($product->description)
                        <p class="lead" style="margin:16px 0">{{ $product->description }}</p>
                    @endif

                    <ul class="specs light">
                        <li><span>Category</span><span>{{ $product->category->name }}</span></li>
                        @if($product->spec_line)
                            <li><span>Material &amp; finish</span><span>{{ $product->spec_line }}</span></li>
                        @endif
                        @foreach(($product->specs ?? []) as $label => $value)
                            <li><span>{{ $label }}</span><span>{{ $value }}</span></li>
                        @endforeach
                        <li><span>Price</span><span>On request</span></li>
                    </ul>

                    <div class="stack">
                        <a class="btn btn-primary"
                           href="{{ route('home', ['piece' => $product->name]) }}#enquiry"
                           data-track="hero_cta_click" data-label="pdp_request_quote">Request a Quote</a>
                        <a class="btn btn-secondary"
                           href="https://wa.me/{{ config('concrea.whatsapp') }}?text={{ urlencode('Hello CONCREA, I am interested in the ' . $product->name . '.') }}"
                           data-track="whatsapp_click" data-section="pdp">WhatsApp</a>
                    </div>
                </div>
            </div>

            @if($related->isNotEmpty())
            <section style="margin-top:var(--section)">
                <h2>More from {{ $product->category->name }}</h2>
                <div class="grid-products">
                    @foreach($related as $p)
                        @include('partials.product-card', ['p' => $p, 'i' => $loop->iteration])
                    @endforeach
                </div>
            </section>
            @endif
        </div>
    </main>

    @include('partials.footer')
@endsection