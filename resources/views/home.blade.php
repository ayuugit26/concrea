@extends('layouts.app')

@section('body')
    @include('partials.announcement')
    @include('partials.header')

    <main id="main">
        @include('partials.hero')
        @include('partials.trust')
        @include('partials.spotlight')
        @include('partials.categories')
        @include('partials.featured')
        @include('partials.finishes')
        @include('partials.about')
        @include('partials.customization')
        @include('partials.cta')
    </main>

    @include('partials.footer')
@endsection