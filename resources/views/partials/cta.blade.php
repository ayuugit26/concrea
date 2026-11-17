<section class="section cta" id="enquiry">
    <div class="wrap cta-grid">
        <div>
            <p class="eyebrow" style="color:var(--sage)">Get in Touch</p>
            <h2>Let's engineer your flawless vision.</h2>
            <p class="lead" style="color:var(--sand)">Tell us about your project. We reply within 1–2 business days.</p>
            <div class="alt-contact">
                <a class="btn" data-track="whatsapp_click" data-section="cta"
                   href="https://wa.me/{{ config('concrea.whatsapp') }}?text={{ urlencode('Hello CONCREA, I would like to discuss a project.') }}">WhatsApp</a>
                <a class="btn" href="mailto:{{ config('concrea.notify_email') }}">Email</a>
            </div>
        </div>

        <form class="form" id="enquiry-form" action="{{ route('enquiry.store') }}" method="POST" novalidate>
            @csrf
            <div class="hp" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
            <div><label for="f-name">Name</label><input id="f-name" name="name" required autocomplete="name"></div>
            <div><label for="f-email">Email</label><input id="f-email" type="email" name="email" required autocomplete="email"></div>
            <div>
                <label for="f-type">Project type</label>
                <select id="f-type" name="project_type" required>
                    @foreach(['Residential','Hotel','Restaurant','Villa','Distributor','Other'] as $t)
                        <option>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="f-msg">Message</label>
                <textarea id="f-msg" name="message" required minlength="10">{{ request('piece') ? 'I am interested in the ' . request('piece') . '. ' : '' }}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Send Enquiry</button>
            <div id="form-msg" role="status" aria-live="polite"></div>
        </form>
    </div>
</section>