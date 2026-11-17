<section class="section" id="finishes" style="background:var(--sand)">
    <div class="wrap">
        <p class="eyebrow">Material Innovation</p>
        <h2>Engineered Finishes</h2>

        <div class="tabs" role="tablist" aria-label="Finishes">
            @foreach($finishes as $f)
            <button class="tab" role="tab" id="tab-{{ $f->slug }}" aria-controls="panel-{{ $f->slug }}"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}" data-finish="{{ $f->slug }}">{{ $f->name }}</button>
            @endforeach
        </div>

        @foreach($finishes as $f)
        <article class="finish {{ $loop->first ? 'is-active' : '' }}" id="panel-{{ $f->slug }}" role="tabpanel" aria-labelledby="tab-{{ $f->slug }}">
            <img src="{{ $f->image_url }}" alt="Close-up of {{ $f->name }} concrete finish" width="800" height="600" loading="lazy">
            <div>
                <h3>{{ $f->title }}</h3>
                <p class="lead">{{ $f->description }}</p>
            </div>
        </article>
        @endforeach

        <div class="stack">
            <a href="#enquiry" class="btn btn-secondary" data-track="sample_request_click">Request Free Sample</a>
            <a href="#" class="link" style="align-self:center">Download Finish Guide →</a>
        </div>
    </div>
</section>