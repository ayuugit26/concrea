<section class="section" id="custom" style="padding-top:0">
    <div class="wrap">
        <p class="eyebrow">Handcrafted for You</p>
        <h2>Precision Customization for Global Projects</h2>
        <p class="lead">We specialise in large-scale projects: CAD workflow, technical review before production, and engineering for high-traffic use.</p>

        <ol class="steps">
            <li>Brief</li>
            <li>CAD &amp; 3D Modeling</li>
            <li>Prototype &amp; Approval</li>
            <li>Production &amp; Shipping</li>
        </ol>

        <div class="gallery" aria-label="Project gallery">
            @foreach($projects as $pr)
            <figure>
                <img src="{{ $pr->image_url }}" alt="{{ $pr->title }}" width="800" height="600" loading="lazy">
                <figcaption>{{ $pr->type }} · {{ $pr->title }}</figcaption>
            </figure>
            @endforeach
        </div>

        <p style="margin-top:32px">
            <a href="#enquiry" class="btn btn-primary" data-track="hero_cta_click" data-label="start_your_project">Start Your Project</a>
        </p>
    </div>
</section>