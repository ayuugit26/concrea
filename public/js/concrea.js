(() => {
  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  /* ---------- Analytics helper (PRD bagian 12) ---------- */
  const track = (event, params = {}) => {
    window.dataLayer.push({ event, ...params });
    // console.debug('[track]', event, params);
  };
  document.addEventListener('click', e => {
    const el = e.target.closest('[data-track]');
    if (!el) return;
    track(el.dataset.track, { label: el.dataset.label, section: el.dataset.section, position: el.dataset.position });
  });

  /* ---------- Announcement bar (diingat per sesi) ---------- */
  const announce = $('#announce');
  try { if (sessionStorage.getItem('announce-closed')) announce.hidden = true; } catch (_) {}
  $('#announce-close')?.addEventListener('click', () => {
    announce.hidden = true;
    try { sessionStorage.setItem('announce-closed', '1'); } catch (_) {}
  });

  /* ---------- Header: solid setelah 80px, sembunyi saat scroll turun ---------- */
  const header = $('#header');
  let lastY = window.scrollY;
  window.addEventListener('scroll', () => {
    const y = window.scrollY;
    header.classList.toggle('is-solid', y > 80);
    header.classList.toggle('is-hidden', y > lastY && y > 200);
    lastY = y;
  }, { passive: true });

  /* ---------- Menu fullscreen + focus trap ---------- */
  const menu = $('#menu'), openBtn = $('#menu-open'), closeBtn = $('#menu-close');
  const focusables = () => $$('a, button', menu);
  const openMenu = () => {
    menu.classList.add('is-open'); openBtn.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden'; closeBtn.focus();
  };
  const closeMenu = () => {
    menu.classList.remove('is-open'); openBtn.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = ''; openBtn.focus();
  };
  openBtn.addEventListener('click', openMenu);
  closeBtn.addEventListener('click', closeMenu);
  $$('a', menu).forEach(a => a.addEventListener('click', closeMenu));
  document.addEventListener('keydown', e => {
    if (!menu.classList.contains('is-open')) return;
    if (e.key === 'Escape') return closeMenu();
    if (e.key !== 'Tab') return;
    const f = focusables(), first = f[0], last = f[f.length - 1];
    if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
    else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
  });

  /* ---------- Filter chip kategori ---------- */
  $$('.chip').forEach(chip => chip.addEventListener('click', () => {
    $$('.chip').forEach(c => c.classList.remove('is-active'));
    chip.classList.add('is-active');
    const f = chip.dataset.filter;
    $$('.cat').forEach(c => c.hidden = f !== 'all' && c.dataset.cat !== f);
  }));

  /* ---------- Carousel Featured ---------- */
  const track_ = $('#feat-track');
  if (track_) {
    const cards = $$('.card', track_), count = $('#feat-count');
    const step = dir => {
      const w = cards[0].getBoundingClientRect().width + 12;
      track_.scrollBy({ left: dir * w, behavior: 'smooth' });
      window.dataLayer.push({ event: 'carousel_interact', direction: dir > 0 ? 'next' : 'prev' });
    };
    $('#feat-prev').addEventListener('click', () => step(-1));
    $('#feat-next').addEventListener('click', () => step(1));
    track_.addEventListener('keydown', e => {
      if (e.key === 'ArrowRight') { e.preventDefault(); step(1); }
      if (e.key === 'ArrowLeft') { e.preventDefault(); step(-1); }
    });
    track_.addEventListener('scroll', () => {
      const w = cards[0].getBoundingClientRect().width + 12;
      const i = Math.min(cards.length, Math.round(track_.scrollLeft / w) + 1);
      count.textContent = `${String(i).padStart(2, '0')} / ${String(cards.length).padStart(2, '0')}`;
    }, { passive: true });
  }

  /* ---------- Finishes Explorer (tab accessible) ---------- */
  const tabs = $$('.tab');
  const selectTab = tab => {
    tabs.forEach(t => {
      const on = t === tab;
      t.setAttribute('aria-selected', on);
      $('#panel-' + t.dataset.finish).classList.toggle('is-active', on);
    });
    track('finish_select', { label: tab.textContent.trim() });
  };
  tabs.forEach((t, i) => {
    t.addEventListener('click', () => selectTab(t));
    t.addEventListener('keydown', e => {
      const n = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
      if (!n) return;
      const next = tabs[(i + n + tabs.length) % tabs.length];
      next.focus(); selectTab(next);
    });
  });

  /* ---------- Form enquiry (AJAX) ---------- */
  const form = $('#enquiry-form'), msg = $('#form-msg');
  form?.addEventListener('submit', async e => {
    e.preventDefault();
    const btn = form.querySelector('button[type=submit]');
    msg.className = ''; msg.textContent = '';
    btn.disabled = true;
    try {
      const res = await fetch(form.action, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
          'Accept': 'application/json',
        },
        body: new FormData(form),
      });
      const data = await res.json();
      if (res.ok) {
        msg.className = 'form-msg ok'; msg.textContent = data.message;
        form.reset();
        track('enquiry_submit', { result: 'success', label: form.project_type.value });
      } else {
        const first = data.errors ? Object.values(data.errors)[0][0] : (data.message || 'Something went wrong.');
        msg.className = 'form-msg err'; msg.textContent = first;
        track('enquiry_submit', { result: 'error' });
      }
    } catch (_) {
      msg.className = 'form-msg err'; msg.textContent = 'Network error. Please try again or use WhatsApp.';
    } finally { btn.disabled = false; }
  });

  /* ---------- Scroll depth 25/50/75/100 ---------- */
  const fired = new Set();
  window.addEventListener('scroll', () => {
    const p = (window.scrollY + innerHeight) / document.documentElement.scrollHeight * 100;
    [25, 50, 75, 100].forEach(m => {
      if (p >= m - 1 && !fired.has(m)) { fired.add(m); track('scroll_depth', { percent: m }); }
    });
  }, { passive: true });
})();