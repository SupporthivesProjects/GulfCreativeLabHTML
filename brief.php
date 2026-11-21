<?php include 'includes/header.php'; ?>

<section class="ih bf-h wrap breif1" aria-label="Write your brief">
  <div class="ih-c">
    <h1 class="h1 mk in" data-r="" style="--d: 0.1"><span>Write your brief</span></h1>
    <p class="bl in" data-r="" style="--d: 0.35">
      Tell your writer what the piece has to do. The more they know, the closer the first
      draft.
    </p>
  </div>
  <div class="bf-tog in" id="tog" role="tablist" aria-label="Form length" data-r="" style="--d: 0.5">
    <i style="--x: 4px; --w: 145px;"></i><button type="button" role="tab" data-f="d" class="on"
      aria-selected="true">Detailed form</button><button type="button" role="tab" data-f="s" aria-selected="false"
      class="">Simple form</button>
  </div>
</section>
<section class="bf wrap breif2" aria-label="Brief">
  <form class="bf-f" id="frm" novalidate="">
    <div class="bf-w in" id="st1" data-r="" style="--d: 0.2">
      <div class="bf-st bf-std">
        <div class="bf-sh">
          <span class="ts t-p">Se</span>
          <div>
            <h2 class="h4">01 The details</h2>
            <p class="bs mu">Length, writer and turnaround. The price updates as you go.</p>
          </div>
        </div>
        <div class="bf-row">
          <div>
            <h3 class="h5">Length</h3>
            <p class="bs mu">
              Type a number or drag. Extra words are priced in blocks of 25.
            </p>
          </div>
          <div class="bf-wc">
            <div class="fd bf-wci">
              <span class="fvv"><label for="wc">Word count</label><span class="bf-wv"><input id="wc" inputmode="numeric"
                    autocomplete="off" style="width: 41px;"><span>words</span><span
                    style="position: absolute; visibility: hidden; white-space: pre; font: 500 16px / 19.2px &quot;Schibsted Grotesk&quot;, sans-serif;">1,400</span></span></span>
            </div>
            <div class="bf-trk" id="trk" role="slider" tabindex="0" aria-label="Word count" aria-valuemin="20"
              aria-valuemax="10000" aria-valuenow="1400" style="--p: 13.827655310621243%;">
              <i></i><b></b>
            </div>
          </div>
        </div>
        <div class="bf-row">
          <div>
            <h3 class="h5">Writer grade</h3>
            <p class="bs mu">You can change it on any order.</p>
          </div>
          <div class="bf-ops" id="gr" role="radiogroup" aria-label="Writer grade">
            <button type="button" role="radio" class="bf-op on" data-v="s" aria-checked="true">
              <span class="btr">Standard</span><span class="bc">Base price</span></button><button type="button"
              role="radio" class="bf-op" data-v="p" aria-checked="false">
              <span class="btr">Premium</span><span class="bc">Adds 10%</span></button><button type="button"
              role="radio" class="bf-op" data-v="e" aria-checked="false">
              <span class="btr">Expert</span><span class="bc">Adds 25%</span>
            </button>
          </div>
        </div>
        <div class="bf-row">
          <div>
            <h3 class="h5">Turnaround</h3>
            <p class="bs mu">Standard is included. Express adds 25% of the starting price.</p>
          </div>
          <div class="bf-ops" id="ta" role="radiogroup" aria-label="Turnaround">
            <button type="button" role="radio" class="bf-op on" data-v="0" aria-checked="true">
              <span class="btr">Standard</span><span class="bc">5 to 7 days, included</span></button><button
              type="button" role="radio" class="bf-op" data-v="1" aria-checked="false">
              <span class="btr">Express</span><span class="bc">2 to 3 days</span>
            </button>
          </div>
        </div>
        <div class="bf-row">
          <div>
            <h3 class="h5">Extras</h3>
            <p class="bs mu">One image included, then <span id="imgp">AED 68.86</span> each.</p>
          </div>
          <div class="bf-sts">
            <div class="fd">
              <div>
                <span class="fk">Images</span><span class="ll" id="iv" aria-live="polite">1</span>
              </div>
              <div class="bf-stp" data-k="i">
                <button type="button" aria-label="Fewer images" disabled="">
                  <svg width="14" height="2" viewBox="0 0 14 2" aria-hidden="true">
                    <path d="M0 1h14" stroke="#16151A" stroke-width="1.5"></path>
                  </svg></button><button type="button" aria-label="More images">
                  <svg width="14" height="14" viewBox="0 0 14 14" aria-hidden="true">
                    <path d="M0 7h14M7 0v14" stroke="#16151A" stroke-width="1.5"></path>
                  </svg>
                </button>
              </div>
            </div>
            <div class="fd">
              <div>
                <span class="fk">Quantity</span><span class="ll" id="qv" aria-live="polite">1</span>
              </div>
              <div class="bf-stp" data-k="q">
                <button type="button" aria-label="Lower quantity" disabled="">
                  <svg width="14" height="2" viewBox="0 0 14 2" aria-hidden="true">
                    <path d="M0 1h14" stroke="#16151A" stroke-width="1.5"></path>
                  </svg></button><button type="button" aria-label="Higher quantity">
                  <svg width="14" height="14" viewBox="0 0 14 14" aria-hidden="true">
                    <path d="M0 7h14M7 0v14" stroke="#16151A" stroke-width="1.5"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bf-w" data-r="" style="--d: 0.26">
      <div class="bf-st">
        <div class="bf-sh">
          <span class="ts t-v">Pc</span>
          <div>
            <h2 class="h4">02 The piece</h2>
            <p class="bs mu">What you need written and what it is for.</p>
          </div>
        </div>
        <div class="fd">
          <span class="fvv"><label for="ttl">Working title</label><input type="text" id="ttl"
              placeholder="What a Gulf summer does to your coffee beans"></span>
        </div>
        <div class="fd">
          <span class="fvv"><label for="todo">What it has to do</label><textarea rows="1" id="todo"
              placeholder="Show cafe owners why summer storage matters, and bring them to our sample box."
              style="height: 22px;"></textarea>
          </span>
        </div>
      </div>
    </div>
    <div class="bf-w" id="vo" data-r="" style="--d: 0.32;">
      <div class="bf-st">
        <div class="bf-sh">
          <span class="ts t-g">Vo</span>
          <div>
            <h2 class="h4">03 Voice and audience</h2>
            <p class="bs mu">Who is reading and how it should sound.</p>
          </div>
        </div>
        <div class="frow">
          <div class="fd">
            <span class="fvv"><label for="f-who-it-is-for">Who it is for</label><input type="text" id="f-who-it-is-for"
                placeholder="Independent cafe owners in the Gulf"></span>
          </div>
          <div class="fd">
            <span class="fvv"><label for="f-sector">Sector</label><input type="text" id="f-sector"
                placeholder="Food and drink"></span>
          </div>
        </div>
        <div class="frow">
          <div class="fd">
            <span class="fvv">
              <label for="f-preferred-voice">Preferred voice</label>

              <select id="f-preferred-voice">
                <option value="" selected hidden>Warm and knowledgeable</option>
                <option value="Warm and knowledgeable">Warm and knowledgeable</option>
                <option value="Plain and direct">Plain and direct</option>
                <option value="Formal">Formal</option>
                <option value="Light and playful">Light and playful</option>
              </select>
            </span>
          </div>

          <div class="fd">
            <span class="fvv">
              <label for="f-words-to-use-or-avoid">Words to use or avoid</label>
              <input type="text" id="f-words-to-use-or-avoid" placeholder="Say roastery. Avoid artisanal.">
            </span>
          </div>
        </div>
        <div class="fd">
          <span class="fvv"><label for="f-writing-you-like">Writing you like</label><input type="url"
              id="f-writing-you-like" placeholder="https://www.example.com/journal"></span>
        </div>
      </div>
    </div>
    <div class="bf-w" data-r="" style="--d: 0.38">
      <div class="bf-st">
        <div class="bf-sh">
          <span class="ts t-y">Up</span>
          <div>
            <h2 class="h4"><span id="n4" class="rl" data-rid="1"><span>04</span></span> Documents</h2>
            <p class="bs mu">
              Attach anything you already have, so you don’t have to retype it.
            </p>
          </div>
        </div>
        <label class="bf-up" id="up"><b>UPLOAD DOCUMENTS</b><span class="bs mu">Click to upload or drag and
            drop</span><input class="vh" type="file" multiple="" id="fi"></label>
        <ul class="bf-upl" id="upl" aria-live="polite"></ul>
        <div class="fd">
          <span class="fvv"><label for="f-anything-else">Anything else</label><input type="text" id="f-anything-else"
              placeholder="Please let us know here."></span>
        </div>
      </div>
    </div>
  </form>
  <aside class="sp bf-yo dk in" id="yo" data-r="" style="--d: 0.2" aria-label="Your order">
    <div class="bf-yoh">
      <span class="ts t-y" id="ytile" data-sym="Wb">Wb</span>
      <h2 class="h4" id="yname">Website policies</h2>
    </div>
    <div>
      <div class="srow"><span id="k1" class="rl"><span>1,400 words at Standard</span></span><span id="v1"
          class="rl"><span>AED 459.06</span></span></div>
      <div class="srow"><span id="k2" class="rl"><span>Standard, 5 to 7 days</span></span><span id="v2"
          class="rl"><span>Included</span></span></div>
      <div class="srow"><span id="k3" class="rl"><span>1 image, included</span></span><span id="v3"
          class="rl"><span>Included</span></span></div>
      <div class="srow"><span>Quantity</span><span id="v4" class="rl"><span>1</span></span></div>
    </div>
    <div class="stot">
      <span>Your price</span><strong class="pl48" id="tot" aria-live="polite">AED 459.06</strong>
    </div>
    <div class="bf-sub" id="sub">
      <span class="cs" role="checkbox" aria-checked="false" tabindex="0" data-need=""><i></i><span>I agree to the <a
            href="terms.html">Terms</a> and the
          <a href="privacy.html">Privacy policy</a>.</span></span><span class="cs rc" role="checkbox"
        aria-checked="false" tabindex="0" data-need=""><i></i>I’m not a robot</span>
    </div>
    <button type="button" class="b b-v b-w" id="add">Add to cart<svg class="pen" aria-hidden="true"
        viewBox="0 0 331 80">
        <path
          d="M16.24 44.57C9.52 9.31 197.51 -3.92 304.93 13.71c33.57 8.82 20.14 52.90 -73.85 59.51C130.37 79.84 16.24 71.02 9.52 40.16 6.09 22.53 69.95 4.90 157.23 4.90"
          style="--l: 825px;"></path>
      </svg></button>
  </aside>
</section>
<div class="bf-bar mo" id="bar" aria-hidden="true">
  <div><small id="bn">Website policies</small><span id="bs">1,400 words at Standard</span></div>
  <strong id="bt">AED 459.06</strong>
</div>

<script>

  (function () {
    const toggle = document.querySelector('#tog');
    if (!toggle) return;

    const tabs = toggle.querySelectorAll('[role="tab"]');
    const indicator = toggle.querySelector('i');

    function activateTab(tab) {
      const value = tab.dataset.f;

      tabs.forEach((item) => {
        const active = item === tab;

        item.classList.toggle('on', active);
        item.setAttribute('aria-selected', active ? 'true' : 'false');
      });

      // Animate tab indicator
      if (indicator) {
        indicator.style.setProperty('--x', tab.offsetLeft + 'px');
        indicator.style.setProperty('--w', tab.offsetWidth + 'px');
      }

      // Store selected form mode
      toggle.dataset.active = value;
    }

    tabs.forEach((tab) => {
      tab.addEventListener('click', () => activateTab(tab));
    });

    const initial = toggle.querySelector('.on') || tabs[0];
    if (initial) activateTab(initial);
  })();

</script>


<!-- SLIDER JS -->

<script>
  /* =====================================
   WORD COUNT SLIDER
===================================== */

  (function () {
    const slider = document.getElementById('trk');
    const input = document.getElementById('wc');

    if (!slider || !input) return;

    const MIN = 20;
    const MAX = 10000;

    let dragging = false;

    function updateSlider(value) {
      value = parseInt(String(value).replace(/[^\d]/g, ''), 10);

      if (!Number.isFinite(value)) value = MIN;

      value = Math.max(MIN, Math.min(MAX, value));

      const percent = ((value - MIN) / (MAX - MIN)) * 100;

      // Update slider fill and thumb
      slider.style.setProperty('--p', percent + '%');
      slider.setAttribute('aria-valuenow', value);

      // Update word input
      input.value = value.toLocaleString('en-GB');

      // Update pricing state if available
      if (typeof state !== 'undefined') {
        state.words = value;
      }

      // Recalculate price if function exists
      if (typeof updatePrice === 'function') {
        updatePrice();
      }
    }

    function getValue(clientX) {
      const rect = slider.getBoundingClientRect();

      const position = Math.max(
        0,
        Math.min(1, (clientX - rect.left) / rect.width)
      );

      return Math.round(MIN + position * (MAX - MIN));
    }

    // Start dragging
    slider.addEventListener('pointerdown', function (e) {
      e.preventDefault();

      dragging = true;

      slider.setPointerCapture(e.pointerId);

      updateSlider(getValue(e.clientX));
    });

    // Drag
    slider.addEventListener('pointermove', function (e) {
      if (!dragging) return;

      updateSlider(getValue(e.clientX));
    });

    // Stop dragging
    slider.addEventListener('pointerup', function () {
      dragging = false;
    });

    slider.addEventListener('pointercancel', function () {
      dragging = false;
    });

    // Manual input
    input.addEventListener('input', function () {
      const value = this.value.replace(/[^\d]/g, '');

      if (value) {
        updateSlider(value);
      }
    });

    input.addEventListener('blur', function () {
      updateSlider(this.value || MIN);
    });

    // Keyboard support
    slider.addEventListener('keydown', function (e) {
      let value = Number(slider.getAttribute('aria-valuenow')) || MIN;

      if (e.key === 'ArrowRight' || e.key === 'ArrowUp') value += 25;
      else if (e.key === 'ArrowLeft' || e.key === 'ArrowDown') value -= 25;
      else if (e.key === 'PageUp') value += 250;
      else if (e.key === 'PageDown') value -= 250;
      else if (e.key === 'Home') value = MIN;
      else if (e.key === 'End') value = MAX;
      else return;

      e.preventDefault();
      updateSlider(value);
    });

    // Initial value
    updateSlider(input.value || 1400);

  })();
</script>

<script>

  (function () {
    'use strict';

    function initBriefForm() {
      const G = window.GCL;
      if (!G || !G.CAT) {
        console.error('GCL is not ready. Load this script after the main GCL script.');
        return;
      }

      const $ = (s, r = document) => r.querySelector(s);
      const $$ = (s, r = document) => [...r.querySelectorAll(s)];

      const form = $('#frm');
      const track = $('#trk');
      const wordInput = $('#wc');
      const gradeGroup = $('#gr');
      const turnaroundGroup = $('#ta');
      const summary = $('#yo');
      const addButton = $('#add');

      if (!form || !track || !wordInput || !summary) return;

      const serviceCode = $('#ytile')?.dataset.sym || 'Wb';
      const service = G.CAT[serviceCode];

      if (!service) {
        console.error('Service not found in GCL.CAT:', serviceCode);
        return;
      }

      const MIN_WORDS = 20;
      const MAX_WORDS = 10000;
      const DEFAULT_WORDS = 1400;

      const state = {
        words: DEFAULT_WORDS,
        grade: 's',
        express: 0,
        images: 1,
        quantity: 1
      };

      let previousTotal;
      let dragging = false;

      /* --------------------------------
         Formatting and summary animation
      -------------------------------- */

      function money(value) {
        return G.fmtN(value);
      }

      function rollingText(selector, value) {
        const element = $(selector);
        if (element) G.roll(element, String(value));
      }

      function animatedPrice(selector, value) {
        const element = $(selector);
        if (!element) return;

        if (previousTotal === undefined || G.RM) {
          element.textContent = money(value);
        } else {
          G.count(element, Number(element.dataset.price || previousTotal), value);
        }

        element.dataset.price = value;
      }

      /* --------------------------------
         Pricing
      -------------------------------- */

      function makeLine(options = {}) {
        return {
          c: serviceCode,
          w: state.words,
          g: state.grade,
          x: state.express,
          i: state.images,
          q: state.quantity,
          t: $('#ttl')?.value || '',
          ...options
        };
      }

      function calculate() {
        const fullLine = makeLine();
        const baseLine = makeLine({ x: 0, i: 1, q: 1 });
        const expressLine = makeLine({ x: 1, i: 1, q: 1 });
        const imageLine = makeLine({ x: 0, i: state.images, q: 1 });

        const basePrice = G.linePrice(baseLine);
        const expressPrice = state.express
          ? G.linePrice(expressLine) - basePrice
          : 0;

        const imagePrice = state.images > 1
          ? G.linePrice(imageLine) - basePrice
          : 0;

        const total = G.linePrice(fullLine);

        return {
          basePrice,
          expressPrice,
          imagePrice,
          total
        };
      }

      function updateSummary() {
        const prices = calculate();

        rollingText(
          '#k1',
          `${state.words.toLocaleString('en-GB')} words at ${G.GRADE[state.grade][0]}`
        );

        rollingText('#v1', money(prices.basePrice));

        rollingText(
          '#k2',
          state.express ? 'Express, 2 to 3 days' : 'Standard, 5 to 7 days'
        );

        rollingText(
          '#v2',
          state.express ? money(prices.expressPrice) : 'Included'
        );

        rollingText(
          '#k3',
          state.images > 1
            ? `${state.images} images, one included`
            : '1 image, included'
        );

        rollingText(
          '#v3',
          state.images > 1 ? money(prices.imagePrice) : 'Included'
        );

        rollingText('#v4', state.quantity);

        animatedPrice('#tot', prices.total);

        rollingText('#bn', $('#yname')?.textContent || service.name);
        rollingText(
          '#bs',
          `${state.words.toLocaleString('en-GB')} words at ${G.GRADE[state.grade][0]}`
        );

        animatedPrice('#bt', prices.total);

        previousTotal = prices.total;
      }

      /* --------------------------------
         Word count input and slider
      -------------------------------- */

      function clampWords(value) {
        const number = parseInt(String(value).replace(/[^\d]/g, ''), 10);

        if (!Number.isFinite(number)) return MIN_WORDS;

        return Math.min(MAX_WORDS, Math.max(MIN_WORDS, number));
      }

      function updateTrack() {
        const percentage =
          ((state.words - MIN_WORDS) / (MAX_WORDS - MIN_WORDS)) * 100;

        track.style.setProperty('--p', `${percentage}%`);
        track.setAttribute('aria-valuenow', state.words);

        wordInput.value = state.words.toLocaleString('en-GB');
        wordInput.style.width = `${Math.max(41, wordInput.value.length * 9)}px`;
      }

      function setWords(value) {
        state.words = clampWords(value);
        updateTrack();
        updateSummary();
      }

      function setWordsFromPointer(event) {
        const rect = track.getBoundingClientRect();
        const percentage = Math.max(
          0,
          Math.min(1, (event.clientX - rect.left) / rect.width)
        );

        setWords(Math.round(
          MIN_WORDS + percentage * (MAX_WORDS - MIN_WORDS)
        ));
      }

      track.addEventListener('pointerdown', event => {
        dragging = true;
        track.setPointerCapture(event.pointerId);
        setWordsFromPointer(event);
      });

      track.addEventListener('pointermove', event => {
        if (dragging) setWordsFromPointer(event);
      });

      track.addEventListener('pointerup', () => {
        dragging = false;
      });

      track.addEventListener('pointercancel', () => {
        dragging = false;
      });

      track.addEventListener('keydown', event => {
        let value = state.words;

        if (event.key === 'ArrowRight' || event.key === 'ArrowUp') {
          value += 25;
        } else if (event.key === 'ArrowLeft' || event.key === 'ArrowDown') {
          value -= 25;
        } else if (event.key === 'PageUp') {
          value += 250;
        } else if (event.key === 'PageDown') {
          value -= 250;
        } else if (event.key === 'Home') {
          value = MIN_WORDS;
        } else if (event.key === 'End') {
          value = MAX_WORDS;
        } else {
          return;
        }

        event.preventDefault();
        setWords(value);
      });

      wordInput.addEventListener('input', () => {
        const value = wordInput.value.replace(/[^\d]/g, '');

        if (value) {
          state.words = clampWords(value);
          updateTrack();
          updateSummary();
        }
      });

      wordInput.addEventListener('blur', () => {
        setWords(wordInput.value);
      });

      wordInput.addEventListener('keydown', event => {
        if (event.key === 'Enter') {
          event.preventDefault();
          wordInput.blur();
        }
      });

      /* --------------------------------
         Writer grade
      -------------------------------- */

      function setRadio(group, value) {
        if (!group) return;

        $$('[role="radio"]', group).forEach(button => {
          const active = button.dataset.v === String(value);

          button.classList.toggle('on', active);
          button.setAttribute('aria-checked', String(active));
          button.tabIndex = active ? 0 : -1;
        });
      }

      gradeGroup?.addEventListener('click', event => {
        const button = event.target.closest('[data-v]');
        if (!button || !gradeGroup.contains(button)) return;

        if (!G.GRADE[button.dataset.v]) return;

        state.grade = button.dataset.v;
        setRadio(gradeGroup, state.grade);
        updateSummary();
      });

      /* --------------------------------
         Turnaround
      -------------------------------- */

      turnaroundGroup?.addEventListener('click', event => {
        const button = event.target.closest('[data-v]');
        if (!button || !turnaroundGroup.contains(button)) return;

        state.express = Number(button.dataset.v) ? 1 : 0;

        setRadio(turnaroundGroup, state.express);
        updateSummary();
      });

      /* --------------------------------
         Images and quantity controls
      -------------------------------- */

      function updateStepper(group) {
        const minus = $('button:first-child', group);
        const plus = $('button:last-child', group);

        if (minus) minus.disabled = group.dataset.k === 'i'
          ? state.images <= 1
          : state.quantity <= 1;

        if (plus) plus.disabled = group.dataset.k === 'i'
          ? state.images >= 20
          : state.quantity >= 99;
      }

      function updateSteppers() {
        const imageGroup = $('.bf-stp[data-k="i"]');
        const quantityGroup = $('.bf-stp[data-k="q"]');

        if ($('#iv')) rollingText('#iv', state.images);
        if ($('#qv')) rollingText('#qv', state.quantity);

        if (imageGroup) updateStepper(imageGroup);
        if (quantityGroup) updateStepper(quantityGroup);
      }

      $$('.bf-stp').forEach(group => {
        group.addEventListener('click', event => {
          const button = event.target.closest('button');
          if (!button || button.disabled) return;

          const isPlus = button === $('button:last-child', group);

          if (group.dataset.k === 'i') {
            state.images = Math.max(
              1,
              Math.min(20, state.images + (isPlus ? 1 : -1))
            );
          }

          if (group.dataset.k === 'q') {
            state.quantity = Math.max(
              1,
              Math.min(99, state.quantity + (isPlus ? 1 : -1))
            );
          }

          updateSteppers();
          updateSummary();
        });
      });


      /* --------------------------------
         Initial state
      -------------------------------- */

      setRadio(gradeGroup, state.grade);
      setRadio(turnaroundGroup, state.express);

      updateTrack();
      updateSteppers();
      updateSummary();
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initBriefForm, { once: true });
    } else {
      initBriefForm();
    }
  })();

</script>

<!-- DROPDOWN -->
<script>
  /* =========================================
     CUSTOM DROPDOWN
     Native select + generated button + SVG
  ========================================= */

  let ddOpen = null;

  function dropdown(sel) {

    if (sel.dataset.dropdownReady === '1') return;

    const fd = sel.closest('.fd');
    if (!fd) return;

    const id = sel.id + '-dd';
    const options = [...sel.options].filter(option => !option.hidden);

    if (!options.length) return;

    let btn = fd.querySelector('.dd-b');
    let ul = fd.querySelector('.dd-l');

    // Create button if missing
    if (!btn) {
      btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'dd-b ph';
      sel.insertAdjacentElement('afterend', btn);
    }

    // Create button text if missing
    let valueText = btn.querySelector('span');

    if (!valueText) {
      valueText = document.createElement('span');
      valueText.id = id + '-v';
      btn.appendChild(valueText);
    }

    // Find existing SVG arrow
    let arrow = btn.querySelector('svg.chev');

    // Move existing sibling SVG into button
    if (!arrow) {
      const existingArrow = fd.querySelector(':scope > svg.chev');

      if (existingArrow) {
        arrow = existingArrow;
        btn.appendChild(arrow);
      }
    }

    // Create SVG if missing
    if (!arrow) {
      arrow = document.createElementNS(
        'http://www.w3.org/2000/svg',
        'svg'
      );

      arrow.setAttribute('class', 'chev');
      arrow.setAttribute('width', '12');
      arrow.setAttribute('height', '7');
      arrow.setAttribute('viewBox', '0 0 12 7');
      arrow.setAttribute('fill', 'none');
      arrow.setAttribute('aria-hidden', 'true');

      const path = document.createElementNS(
        'http://www.w3.org/2000/svg',
        'path'
      );

      path.setAttribute(
        'd',
        'M0.53125 0.530273L5.53125 5.53027L10.5312 0.530273'
      );

      path.setAttribute('stroke-width', '1.5');
      path.setAttribute('stroke', '#16151A');
      path.setAttribute('stroke-linecap', 'round');
      path.setAttribute('stroke-linejoin', 'round');

      arrow.appendChild(path);
      btn.appendChild(arrow);
    }

    // Create list if missing
    if (!ul) {
      ul = document.createElement('ul');
      ul.className = 'dd-l';
      ul.id = id;
      ul.setAttribute('role', 'listbox');
      ul.tabIndex = -1;

      ul.innerHTML = options.map((option, index) => `
        <li
          role="option"
          id="${id}-${index}"
          data-i="${index}"
          aria-selected="false"
        >${option.textContent.trim()}</li>
      `).join('');

      fd.appendChild(ul);
    }

    // Prepare dropdown elements
    fd.classList.add('dd');

    btn.classList.add('dd-b');
    btn.type = 'button';
    btn.setAttribute('aria-haspopup', 'listbox');
    btn.setAttribute('aria-expanded', 'false');
    btn.setAttribute('aria-controls', ul.id);

    ul.setAttribute('role', 'listbox');

    sel.classList.add('dd-n');
    sel.tabIndex = -1;
    sel.setAttribute('aria-hidden', 'true');

    // Connect label
    const label = fd.querySelector('label');

    if (label) {
      label.id = label.id || sel.id + '-lab';

      btn.setAttribute(
        'aria-labelledby',
        label.id + ' ' + valueText.id
      );

      label.removeAttribute('for');
    }

    if (!valueText.id) {
      valueText.id = id + '-v';
    }

    const items = [...ul.querySelectorAll('li[data-i]')];

    let activeIndex = -1;

    sel.dataset.dropdownReady = '1';

    // Update selected value
    function sync() {
      const value = sel.value;
      const placeholder = !value;

      valueText.textContent = placeholder
        ? sel.options[0].textContent.trim()
        : value;

      btn.classList.toggle('ph', placeholder);
      sel.classList.toggle('ph', placeholder);

      items.forEach((item, index) => {
        const selected =
          !placeholder &&
          options[index] &&
          options[index].value === value;

        item.setAttribute('aria-selected', String(!!selected));
        item.classList.toggle('selected', !!selected);
      });
    }

    // Highlight option
    function highlight(index) {
      activeIndex = Math.max(
        0,
        Math.min(items.length - 1, index)
      );

      items.forEach((item, i) => {
        item.classList.toggle('on', i === activeIndex);
      });

      const activeItem = items[activeIndex];

      if (activeItem) {
        btn.setAttribute('aria-activedescendant', activeItem.id);

        activeItem.scrollIntoView({
          block: 'nearest'
        });
      }
    }

    // Close dropdown
    function close(focus = false) {
      fd.classList.remove('dd-o');

      btn.setAttribute('aria-expanded', 'false');
      btn.removeAttribute('aria-activedescendant');

      if (ddOpen === close) {
        ddOpen = null;
      }

      if (focus) btn.focus();
    }

    // Open dropdown
    function open() {
      if (ddOpen && ddOpen !== close) {
        ddOpen();
      }

      fd.classList.add('dd-o');
      btn.setAttribute('aria-expanded', 'true');

      ddOpen = close;

      const selectedIndex = options.findIndex(
        option => sel.value && option.value === sel.value
      );

      highlight(selectedIndex >= 0 ? selectedIndex : 0);
    }

    // Select option
    function choose(index) {
      if (!options[index]) return;

      sel.value = options[index].value;

      sync();

      sel.dispatchEvent(
        new Event('change', { bubbles: true })
      );

      sel.dispatchEvent(
        new Event('input', { bubbles: true })
      );

      close(true);
    }

    // Button click
    btn.addEventListener('click', function (event) {
      event.preventDefault();
      event.stopPropagation();

      if (fd.classList.contains('dd-o')) {
        close();
      } else {
        open();
      }
    });

    // Option click
    ul.addEventListener('click', function (event) {
      event.stopPropagation();

      const item = event.target.closest('li[data-i]');

      if (!item) return;

      choose(Number(item.dataset.i));
    });

    // Mouse hover
    ul.addEventListener('pointermove', function (event) {
      const item = event.target.closest('li[data-i]');

      if (!item) return;

      const index = Number(item.dataset.i);

      if (index !== activeIndex) {
        highlight(index);
      }
    });

    // Keyboard controls
    btn.addEventListener('keydown', function (event) {
      const isOpen = fd.classList.contains('dd-o');

      switch (event.key) {
        case 'ArrowDown':
          event.preventDefault();

          if (!isOpen) open();
          else highlight(activeIndex + 1);

          break;

        case 'ArrowUp':
          event.preventDefault();

          if (!isOpen) open();
          else highlight(activeIndex - 1);

          break;

        case 'Enter':
        case ' ':
          if (isOpen) {
            event.preventDefault();
            choose(activeIndex);
          }
          break;

        case 'Escape':
          if (isOpen) {
            event.preventDefault();
            close(true);
          }
          break;

        case 'Home':
          if (isOpen) {
            event.preventDefault();
            highlight(0);
          }
          break;

        case 'End':
          if (isOpen) {
            event.preventDefault();
            highlight(items.length - 1);
          }
          break;

        case 'Tab':
          if (isOpen) close();
          break;
      }
    });

    // Native select change
    sel.addEventListener('change', sync);

    // Form reset
    if (sel.form) {
      sel.form.addEventListener('reset', function () {
        setTimeout(sync, 0);
      });
    }

    // Initial state
    sync();
  }

  // Initialize dropdowns
  function initDropdowns(root = document) {
    root.querySelectorAll('.fd select').forEach(dropdown);
  }

  // Close when clicking outside
  document.addEventListener('pointerdown', function (event) {
    if (ddOpen && !event.target.closest('.fd.dd')) {
      ddOpen();
    }
  });

  // Initialize on page load
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      initDropdowns();
    });
  } else {
    initDropdowns();
  }

</script>

<!-- STICKY PART -->

<script>
  
(function () {
  "use strict";

  const BREAKPOINT = 992;
  const TOP_GAP = 120;

  function initPricingSticky() {
    const section = document.querySelector(".breif2");
    const panel = section?.querySelector("#yo");

    if (!section || !panel) return;

    let ticking = false;
    let panelLeft = 0;
    let panelWidth = 0;
    let panelHeight = 0;

    function resetPanel() {
      panel.style.position = "";
      panel.style.top = "";
      panel.style.left = "";
      panel.style.right = "";
      panel.style.width = "";
      panel.style.maxHeight = "";
      panel.style.overflowY = "";
    }

    function measurePanel() {
      resetPanel();

      if (window.innerWidth < BREAKPOINT) return;

      const sectionRect = section.getBoundingClientRect();
      const panelRect = panel.getBoundingClientRect();

      panelLeft = panelRect.left - sectionRect.left;
      panelWidth = panelRect.width;

      panel.style.width = panelWidth + "px";
      panel.style.maxHeight = "calc(100vh - 140px)";
      panel.style.overflowY = "auto";

      panelHeight = panel.offsetHeight;
    }

    function updatePanel() {
      if (window.innerWidth < BREAKPOINT) {
        resetPanel();
        return;
      }

      const sectionRect = section.getBoundingClientRect();
      const sectionHeight = section.offsetHeight;

      // Before reaching the form
      if (sectionRect.top > TOP_GAP) {
        resetPanel();
        return;
      }

      panel.style.width = panelWidth + "px";
      panel.style.maxHeight = "calc(100vh - 140px)";
      panel.style.overflowY = "auto";

      panelHeight = panel.offsetHeight;

      // Stop at the bottom of the form section
      if (sectionRect.bottom <= TOP_GAP + panelHeight) {
        panel.style.position = "absolute";
       const BOTTOM_GAP = 104;

panel.style.top =
  Math.max(0, sectionHeight - panelHeight - BOTTOM_GAP) + "px";
        panel.style.left = panelLeft + "px";
        panel.style.right = "auto";
        return;
      }

      // Keep panel fixed in its original right-column position
      panel.style.position = "fixed";
      panel.style.top = TOP_GAP + "px";
      panel.style.left =
        (sectionRect.left + panelLeft) + "px";
      panel.style.right = "auto";
    }

    function requestUpdate() {
      if (ticking) return;

      ticking = true;

      requestAnimationFrame(function () {
        updatePanel();
        ticking = false;
      });
    }

    window.addEventListener("scroll", requestUpdate, {
      passive: true
    });

    window.addEventListener("resize", function () {
      measurePanel();
      requestUpdate();
    });

    window.addEventListener("load", function () {
      measurePanel();
      requestUpdate();
    });

    measurePanel();
    updatePanel();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initPricingSticky);
  } else {
    initPricingSticky();
  }
})();

</script>


<?php include 'includes/footer.php'; ?>