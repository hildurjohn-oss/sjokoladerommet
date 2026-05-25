/* Sjokoladerommet — main.js */

(function () {
  'use strict';

  // ─── Mobile nav toggle ───────────────────────────────────────────────────
  const hamburger  = document.querySelector('.hamburger');
  const mobileNav  = document.querySelector('.mobile-nav');

  if (hamburger && mobileNav) {
    hamburger.addEventListener('click', function () {
      const isOpen = mobileNav.classList.toggle('open');
      hamburger.classList.toggle('open', isOpen);
      hamburger.setAttribute('aria-expanded', isOpen);
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Close nav when a link is clicked
    mobileNav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobileNav.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  // ─── Bestill-kake multi-step form ────────────────────────────────────────
  const form = document.getElementById('bestill-form');
  if (!form) return;

  const STEPS      = 6;
  let   currentStep = 1;
  const data = {
    anledning: null, str: null, smak: null,
    allergier: [], melding: '',
    dato: null, tid: null,
    navn: '', tlf: '', epost: '', nyhetsbrev: false,
  };

  function showStep(n) {
    document.querySelectorAll('.step-panel').forEach(function (p) {
      p.classList.remove('active');
    });
    const panel = document.getElementById('step-' + n);
    if (panel) panel.classList.add('active');
    updateStepper(n);
    updateSummary();
    window.scrollTo({ top: form.getBoundingClientRect().top + window.scrollY - 80, behavior: 'smooth' });
  }

  function updateStepper(activeStep) {
    document.querySelectorAll('.stepper-dot').forEach(function (dot, i) {
      const stepN = i + 1;
      dot.classList.remove('done', 'active');
      if (stepN < activeStep) dot.classList.add('done'), dot.textContent = '✓';
      else if (stepN === activeStep) dot.classList.add('active'), dot.textContent = stepN;
      else dot.textContent = stepN;
    });
    document.querySelectorAll('.stepper-label').forEach(function (lbl, i) {
      lbl.classList.toggle('active', i + 1 === activeStep);
    });
    document.querySelectorAll('.stepper-connector').forEach(function (conn, i) {
      conn.classList.toggle('done', i + 1 < activeStep);
    });
  }

  function updateSummary() {
    const ANLEDNINGER = { bursdag: 'Bursdag', daap: 'Dåp / navnefest', konf: 'Konfirmasjon', bryllup: 'Bryllup', minne: 'Minnestund', kos: 'Bare fordi' };
    const STORR       = { s: 'Liten · 6–8 pers', m: 'Mellom · 10–14 pers', l: 'Stor · 16–20 pers', xl: 'Festkake · 25+' };
    const SMAK        = { suksess: 'Suksessterte', sjok: 'Sjokolade & bringebær', verdens: 'Verdens beste', sitron: 'Sitronterte', gulrot: 'Gulrotkake', annet: 'Noe helt annet' };

    const rows = [
      ['Anledning', data.anledning ? ANLEDNINGER[data.anledning] : null],
      ['Størrelse',  data.str       ? STORR[data.str]             : null],
      ['Smak',       data.smak      ? SMAK[data.smak]             : null],
      ['Hensyn',     data.allergier.length ? data.allergier.join(', ') : null],
      ['Henting',    data.dato && data.tid ? data.dato + ' kl. ' + data.tid : null],
    ].filter(function (r) { return r[1]; });

    const box  = document.getElementById('summary-box');
    const list = document.getElementById('summary-list');
    if (!box || !list) return;

    if (!rows.length) { box.style.display = 'none'; return; }

    box.style.display = '';
    list.innerHTML = rows.map(function (r) {
      return '<div style="display:flex;justify-content:space-between;gap:16px;font-size:14px">'
        + '<span style="color:var(--brun-soft)">' + r[0] + '</span>'
        + '<b style="color:var(--brun);text-align:right">' + r[1] + '</b></div>';
    }).join('');
  }

  // Choice card selection (single-select)
  document.querySelectorAll('.choice[data-field]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const field = btn.dataset.field;
      const val   = btn.dataset.value;
      data[field] = val;
      document.querySelectorAll('.choice[data-field="' + field + '"]').forEach(function (b) {
        b.classList.toggle('sel', b === btn);
      });
      clearErr(field);
    });
  });

  // Allergy multi-select
  document.querySelectorAll('.choice[data-allergy]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const a = btn.dataset.allergy;
      if (data.allergier.includes(a)) {
        data.allergier = data.allergier.filter(function (x) { return x !== a; });
        btn.classList.remove('sel');
      } else {
        data.allergier.push(a);
        btn.classList.add('sel');
      }
    });
  });

  // Date selection
  document.querySelectorAll('.choice[data-date]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      data.dato = btn.dataset.date;
      document.querySelectorAll('.choice[data-date]').forEach(function (b) {
        b.classList.toggle('sel', b === btn);
      });
      clearErr('henting');
    });
  });

  // Time selection
  document.querySelectorAll('.choice[data-time]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      data.tid = btn.dataset.time;
      document.querySelectorAll('.choice[data-time]').forEach(function (b) {
        b.classList.toggle('sel', b === btn);
      });
      clearErr('henting');
    });
  });

  // Text field sync
  ['navn', 'tlf', 'epost', 'melding'].forEach(function (id) {
    const el = document.getElementById('field-' + id);
    if (el) {
      el.addEventListener('input', function () { data[id] = el.value; });
    }
  });
  const nyhetsbrev = document.getElementById('field-nyhetsbrev');
  if (nyhetsbrev) {
    nyhetsbrev.addEventListener('change', function () { data.nyhetsbrev = nyhetsbrev.checked; });
  }

  function showErr(field, msg) {
    const el = document.getElementById('err-' + field);
    if (el) { el.textContent = msg; el.style.display = ''; }
  }
  function clearErr(field) {
    const el = document.getElementById('err-' + field);
    if (el) { el.textContent = ''; el.style.display = 'none'; }
  }

  function validate(step) {
    let ok = true;
    if (step === 1 && !data.anledning) { showErr('anledning', 'Velg en anledning'); ok = false; }
    if (step === 2 && !data.str)       { showErr('str',       'Velg en størrelse'); ok = false; }
    if (step === 3 && !data.smak)      { showErr('smak',      'Velg en smak');      ok = false; }
    if (step === 5 && (!data.dato || !data.tid)) { showErr('henting', 'Velg dato og tid'); ok = false; }
    if (step === 6) {
      if (!data.navn.trim()) { showErr('navn', 'Navn må fylles ut'); ok = false; }
      if (!data.tlf.trim() || data.tlf.replace(/\D/g, '').length < 8) { showErr('tlf', 'Telefonnummer må ha minst 8 sifre'); ok = false; }
      if (!data.epost.trim() || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(data.epost)) { showErr('epost', 'Sjekk e-postadressen'); ok = false; }
    }
    return ok;
  }

  const btnNext = document.getElementById('btn-next');
  const btnPrev = document.getElementById('btn-prev');

  if (btnNext) {
    btnNext.addEventListener('click', function () {
      if (!validate(currentStep)) return;
      if (currentStep === STEPS) {
        submitOrder();
        return;
      }
      currentStep++;
      btnPrev.style.opacity  = '1';
      btnPrev.style.pointerEvents = 'auto';
      btnNext.textContent = currentStep === STEPS ? 'Send bestilling' : 'Videre →';
      showStep(currentStep);
    });
  }

  if (btnPrev) {
    btnPrev.addEventListener('click', function () {
      if (currentStep <= 1) return;
      currentStep--;
      btnPrev.style.opacity  = currentStep === 1 ? '0.3' : '1';
      btnPrev.style.pointerEvents = currentStep === 1 ? 'none' : 'auto';
      btnNext.textContent = currentStep === STEPS ? 'Send bestilling' : 'Videre →';
      showStep(currentStep);
    });
  }

  function submitOrder() {
    const SMAK_LABELS = { suksess: 'Suksessterte', sjok: 'Sjokolade & bringebær', verdens: 'Verdens beste', sitron: 'Sitronterte', gulrot: 'Gulrotkake', annet: 'Noe helt annet' };
    const ANLEDNING_LABELS = { bursdag: 'Bursdag', daap: 'Dåp / navnefest', konf: 'Konfirmasjon', bryllup: 'Bryllup', minne: 'Minnestund', kos: 'Bare fordi' };
    const STORR_LABELS = { s: 'Liten (6–8 pers)', m: 'Mellom (10–14 pers)', l: 'Stor (16–20 pers)', xl: 'Festkake (25+)' };

    const payload = new FormData();
    payload.append('action', 'bestill_kake');
    payload.append('nonce', sjokoladerommet_ajax.nonce);
    payload.append('anledning', ANLEDNING_LABELS[data.anledning] || '');
    payload.append('str',       STORR_LABELS[data.str]           || '');
    payload.append('smak',      SMAK_LABELS[data.smak]           || '');
    payload.append('allergier', data.allergier.join(', '));
    payload.append('melding',   data.melding);
    payload.append('dato',      data.dato || '');
    payload.append('tid',       data.tid  || '');
    payload.append('navn',      data.navn);
    payload.append('tlf',       data.tlf);
    payload.append('epost',     data.epost);
    payload.append('nyhetsbrev', data.nyhetsbrev ? 'Ja' : 'Nei');

    btnNext.disabled = true;
    btnNext.textContent = 'Sender…';

    fetch(sjokoladerommet_ajax.ajax_url, { method: 'POST', body: payload })
      .then(function (r) { return r.json(); })
      .then(function (res) {
        if (res.success) {
          showDone();
        } else {
          btnNext.disabled = false;
          btnNext.textContent = 'Send bestilling';
          alert('Noe gikk galt. Ring oss på 76 08 23 14.');
        }
      })
      .catch(function () {
        btnNext.disabled = false;
        btnNext.textContent = 'Send bestilling';
        alert('Noe gikk galt. Ring oss på 76 08 23 14.');
      });
  }

  function showDone() {
    const formWrap = document.getElementById('bestill-form-wrap');
    const donePanel = document.getElementById('bestill-done');
    if (formWrap) formWrap.style.display = 'none';
    if (donePanel) {
      donePanel.style.display = '';
      const firstName = data.navn ? data.navn.split(' ')[0] : '';
      const nameEl = donePanel.querySelector('.done-name');
      if (nameEl && firstName) nameEl.textContent = ', ' + firstName;
    }
  }

  // Populate available pickup dates on page load
  const dateGrid = document.getElementById('date-grid');
  if (dateGrid) {
    const UKEDAGER = ['søndag', 'mandag', 'tirsdag', 'onsdag', 'torsdag', 'fredag', 'lørdag'];
    const MÅNEDER  = ['jan', 'feb', 'mar', 'apr', 'mai', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'des'];

    const dates = [];
    const start = new Date();
    start.setDate(start.getDate() + 3);
    start.setHours(0, 0, 0, 0);
    for (let i = 0; i < 28 && dates.length < 8; i++) {
      const d = new Date(start);
      d.setDate(start.getDate() + i);
      const day = d.getDay();
      if (day === 4 || day === 5 || day === 6 || day === 0) dates.push(d);
    }

    dateGrid.innerHTML = dates.map(function (d) {
      const label = UKEDAGER[d.getDay()] + ' ' + d.getDate() + '. ' + MÅNEDER[d.getMonth()];
      const dayPart = d.getDate() + '. ' + MÅNEDER[d.getMonth()];
      const weekday = UKEDAGER[d.getDay()];
      return '<button type="button" class="choice" data-date="' + label + '">'
        + '<span class="ttl">' + dayPart + '</span>'
        + '<span class="sub">' + weekday + '</span>'
        + '</button>';
    }).join('');

    // Re-attach listeners for dynamically created date buttons
    dateGrid.querySelectorAll('.choice[data-date]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        data.dato = btn.dataset.date;
        dateGrid.querySelectorAll('.choice').forEach(function (b) {
          b.classList.toggle('sel', b === btn);
        });
        clearErr('henting');
      });
    });
  }

  // Init
  showStep(1);

})();
