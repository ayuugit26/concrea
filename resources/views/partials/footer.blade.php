<footer class="footer">
    <div class="wrap">
        <div class="foot-grid">
            <div>
                <a href="{{ route('home') }}" class="logo">CONCREA</a>
                <p style="margin-top:12px">{{ config('concrea.address') }}<br>{{ config('concrea.notify_email') }}</p>
            </div>
            <ul><li><a href="#collection">Collection</a></li><li><a href="#finishes">Finishes</a></li><li><a href="#custom">Custom Projects</a></li></ul>
            <ul><li><a href="#about">About</a></li><li><a href="#enquiry">Contact</a></li><li><a href="#">Shipping &amp; Care</a></li></ul>
            <ul><li><a href="{{ config('concrea.instagram') }}">Instagram</a></li><li><a href="#">Pinterest</a></li><li><a href="#">Privacy</a></li></ul>
        </div>
        <div class="foot-bottom"><span>© {{ date('Y') }} CONCREA</span><span>EN</span></div>
    </div>
</footer>