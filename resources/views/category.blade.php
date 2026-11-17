@extends('layouts.app')

@section('title', $category->name . ' | CONCREA')

@section('body')
    @include('partials.announcement')
    @include('partials.header')

    <main id="main" class="section" style="padding-top:32px">
        <div class="wrap">
            <nav class="crumbs" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a> / <a href="{{ route('home') }}#collection">Collection</a> / <span>{{ $category->name }}</span>
            </nav>

            <p class="eyebrow">Collections</p>
            <h1 style="font-size:clamp(34px,6vw,56px);line-height:1.1">{{ $category->name }}</h1>
            <p class="lead" style="margin-top:12px">{{ $category->tagline }}</p>

            <div class="grid-products">
                @forelse($products as $p)
                    @include('partials.product-card', ['p' => $p, 'i' => $loop->iteration])
                @empty
                    <p class="lead">New pieces are coming soon. <a class="link" href="{{ route('home') }}#enquiry">Ask about this category</a>.</p>
                @endforelse
            </div>
        </div>
    </main>

    @include('partials.footer')
@endsection