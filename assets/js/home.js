document.documentElement.classList.add('js');
(function () {
  const VERSION = 'v1.9';
  const BUILT = '2026-11-11';
  const C = window.GCLCAT;
  const RATES = C.rates;
  const RU = C.rules;
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => [...r.querySelectorAll(s)];
  const RM = matchMedia('(prefers-reduced-motion:reduce)').matches;
  const clamp = (v, a = 0, b = 1) => Math.min(b, Math.max(a, v));
  const esc = (s) => String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/"/g, '&quot;');
  const nf = (n) => n.toLocaleString('en-GB');

  const CAT = {};
  C.services.forEach((r) => {
    CAT[r[0]] = {
      c: r[0],
      name: r[1],
      g: r[2],
      n: r[3],
      usd: r[4],
      w: r[5],
      blk: r[6] * RU.block,
      slug: r[7],
      noun: r[8],
      suits: r[9],
      desc: r[10],
      exT: r[11],
      exA: r[12],
      exB: r[13],
    };
  });
  const PK = C.packages;
  const GROUPS = C.groups;
  const GRADE = { s: ['Standard', 0], p: ['Premium', RU.premium], e: ['Expert', RU.expert] };
  // round to the currency's decimal places, nudged so a half never lands short
  const rnd = (v, d) => {
    const m = Math.pow(10, d);
    return Math.round(v * m + 1e-7) / m;
  };

  const DEMO = () => [
    {
      c: 'Bl',
      w: 1200,
      g: 'p',
      x: 0,
      i: 2,
      q: 1,
      t: 'What a Gulf summer does to your coffee beans',
    },
    { c: 'Pr', w: 450, g: 's', x: 1, i: 1, q: 1, t: 'Harbour Roasters opens its second site' },
    { c: 'Ca', w: 120, g: 's', x: 0, i: 1, q: 4, t: 'Summer roast launch posts' },
  ];
  const DEF = () => ({
    cur: 'AED',
    code: 'GCL10',
    cart: DEMO(),
    cfg: null,
    edit: -1,
    brief: 'd',
    user: 0,
    ret: '',
    to: '',
    ck: null,
    last: null,
    fail: 0,
    acct: null,
    seen: {},
  });
  const enc = (o) =>
    btoa(unescape(encodeURIComponent(JSON.stringify(o))))
      .replace(/\+/g, '-')
      .replace(/\//g, '_')
      .replace(/=+$/, '');
  const dec = (s) =>
    JSON.parse(decodeURIComponent(escape(atob(s.replace(/-/g, '+').replace(/_/g, '/')))));
  let S = DEF();
  // state arrives in the URL hash from the previous page, else from local storage
  (function hydrate() {
    let got = false;
    try {
      const m = location.hash.match(/s=([\w-]+)/);
      if (m) {
        S = Object.assign(DEF(), dec(m[1]));
        got = true;
        history.replaceState(null, '', location.pathname + location.search);
      }
    } catch (e) {}
    if (!got) {
      try {
        const v = localStorage.getItem('gcl');
        if (v) S = Object.assign(DEF(), JSON.parse(v));
      } catch (e) {}
    }
    if (!S.ck) {
      try {
        const v = sessionStorage.getItem('gcl-consent');
        if (v) S.ck = JSON.parse(v);
      } catch (e) {}
    }
    if (!RATES[S.cur]) S.cur = 'AED';
    if (/[?&]pay=fail/.test(location.search)) S.fail = 1;
  })();
  function save() {
    try {
      localStorage.setItem('gcl', JSON.stringify(S));
    } catch (e) {}
  }
  addEventListener('pagehide', save);

  /* money */
  const dp = () => RATES[S.cur][3];
  const conv = (u) => rnd(u * RATES[S.cur][0], dp());
  const fmtN = (v) =>
    RATES[S.cur][1] +
    v.toLocaleString('en-GB', { minimumFractionDigits: dp(), maximumFractionDigits: dp() });
  const money = (u) => fmtN(conv(u));
  function pieceUSD(l) {
    const s = CAT[l.c];
    const extra = Math.ceil(Math.max(0, l.w - s.w) / RU.block) * s.blk;
    return (
      (s.usd + extra) * (1 + GRADE[l.g][1]) +
      (l.x ? s.usd * RU.express : 0) +
      Math.max(0, l.i - 1) * s.usd * RU.image
    );
  }
  const lineUSD = (l) => pieceUSD(l) * l.q;
  const linePrice = (l) => rnd(conv(pieceUSD(l)) * l.q, dp());
  const std = (c, q, g) => ({ c, w: CAT[c].w, g: g || 's', x: 0, i: 1, q: q || 1, t: '' });
  // a discount is the gap between two rounded sums, so the lines always add up
  const off = (sum, pct) => rnd(sum - rnd(sum * (1 - pct), dp()), dp());
  function setPrice(lines, pct) {
    const sum = rnd(
      lines.reduce((a, l) => a + linePrice(l), 0),
      dp()
    );
    const save = off(sum, pct);
    return { sum, save, price: rnd(sum - save, dp()) };
  }
  const pkLines = (i) => PK[i][2].map((p) => std(p[0], p[1], p[2]));
  function totals(cart, code) {
    cart = cart || S.cart;
    code = code === undefined ? S.code : code;
    const d = dp();
    const lines = cart.map(linePrice);
    const sub = rnd(
      lines.reduce((a, b) => a + b, 0),
      d
    );
    // a set discount holds only while every line of the set is still in the cart
    const gs = {};
    cart.forEach((l, i) => {
      if (l.b) {
        gs[l.b[3]] = gs[l.b[3]] || { label: l.b[0], pct: l.b[1], n: l.b[2], sum: 0, k: 0 };
        gs[l.b[3]].sum += lines[i];
        gs[l.b[3]].k++;
      }
    });
    const sets = Object.values(gs)
      .filter((g) => g.k === g.n)
      .map((g) => ({ label: g.label, pct: g.pct, save: off(rnd(g.sum, d), g.pct) }));
    const bsave = rnd(
      sets.reduce((a, g) => a + g.save, 0),
      d
    );
    const after = rnd(sub - bsave, d);
    const rate = (code && RU.codes[code]) || 0;
    const disc = rnd(after * rate, d);
    return { lines, sub, sets, bsave, after, disc, total: rnd(after - disc, d) };
  }
  function spec(l) {
    const p = [
      nf(l.w) + ' words' + (l.q > 1 ? ' each' : ''),
      GRADE[l.g][0] + ' writer',
      l.x ? 'Express turnaround' : 'Standard turnaround',
    ];
    if (l.i > 1) p.push(l.i + ' images');
    if (l.q > 1) p.push('quantity ' + l.q);
    return p.join(', ');
  }
  function priceOf(key) {
    const [k, a] = key.split(':');
    if (k === 'from') return conv(CAT[a].usd);
    if (k === 'img') return conv(CAT[a].usd * RU.image);
    if (k === 'cfg') {
      const v = a.split(',');
      return linePrice({ c: v[0], w: +v[1], g: v[2], x: +v[3], i: +v[4], q: +v[5] });
    }
    if (k === 'pk' || k === 'pks' || k === 'pkd') {
      const r = setPrice(pkLines(+a), RU.pack);
      return k === 'pk' ? r.price : k === 'pks' ? r.sum : r.save;
    }
    if (k === 'set' || k === 'sets') {
      const r = setPrice(
        a.split('+').map((c) => std(c)),
        RU.set
      );
      return k === 'set' ? r.price : r.sum;
    }
    return 0;
  }

  /* counters and painted prices */
  function count(el, from, to, pre, suf) {
    pre = pre || '';
    suf = suf || '';
    if (RM || from === to || from === undefined) {
      el.textContent = pre + fmtN(to) + suf;
      return;
    }
    const d = dp();
    const t0 = performance.now();
    const dur = 650;
    const id = (el.dataset.cid = (+el.dataset.cid || 0) + 1);
    const step = (t) => {
      if (+el.dataset.cid !== id) return;
      const k = clamp((t - t0) / dur);
      const e = 1 - Math.pow(1 - k, 3);
      el.textContent = pre + fmtN(rnd(from + (to - from) * e, d)) + suf;
      if (k < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  }
  function paint(anim, root) {
    $$('[data-p]', root || document).forEach((e) => {
      const v = priceOf(e.dataset.p);
      const old = e._v;
      e._v = v;
      if (anim && old !== undefined && e._c === S.cur)
        count(e, old, v, e.dataset.pre, e.dataset.suf);
      else e.textContent = (e.dataset.pre || '') + fmtN(v) + (e.dataset.suf || '');
      e._c = S.cur;
    });
  }

  /* navigation between pages */
  function go(url, card) {
    const h = url.indexOf('#');
    if (h >= 0) {
      S.to = url.slice(h + 1);
      url = url.slice(0, h);
    }
    const nav = () => {
      save();
      const same = pageOf(url) === here();
      location.href = url + '#s=' + enc(S);
      if (same) location.reload();
    };
    if (RM) {
      save();
      setTimeout(nav, 0);
      return;
    }
    if (card) {
      expand(card, nav);
      return;
    }
    save();
    document.body.classList.add('leave');
    setTimeout(nav, 300);
  }
  function expand(card, done) {
    const r = card.getBoundingClientRect();
    const cs = getComputedStyle(card);
    const bg = cs.backgroundColor;
    const fg = cs.color;
    const sym = card.dataset.sym || ($('b', card) || card).textContent.trim();
    S.arr = bg;
    const d = document.createElement('div');
    d.className = 'xp';
    d.style.cssText =
      `left:${r.left}px;top:${r.top}px;width:${r.width}px;height:${r.height}px;` +
      `background:${bg};color:${fg}`;
    d.innerHTML = `<b>${esc(sym)}</b>`;
    document.body.appendChild(d);
    card.style.visibility = 'hidden';
    const W = innerWidth;
    const H = innerHeight;
    const b = $('b', d);
    const fs = parseFloat(getComputedStyle($('b', card) || card).fontSize) || 48;
    b.style.fontSize = fs + 'px';
    d.animate(
      [
        { transform: 'none', borderRadius: '12px' },
        {
          transform: 'translateY(-10px) rotate(-2deg) scale(1.04)',
          borderRadius: '12px',
          offset: 0.22,
        },
        {
          left: '0px',
          top: '0px',
          width: W + 'px',
          height: H + 'px',
          borderRadius: '0px',
          transform: 'none',
        },
      ].map((k, i) =>
        i < 2
          ? Object.assign(
              {
                left: r.left + 'px',
                top: r.top + 'px',
                width: r.width + 'px',
                height: r.height + 'px',
              },
              k
            )
          : k
      ),
      { duration: 720, easing: 'cubic-bezier(.65,0,.35,1)', fill: 'forwards' }
    );
    b.animate(
      [
        { transform: 'none', opacity: 1 },
        { transform: `scale(${Math.min(4, (H * 0.32) / fs)})`, opacity: 1, offset: 0.75 },
        { transform: `scale(${Math.min(4.4, (H * 0.36) / fs)})`, opacity: 0 },
      ],
      { duration: 720, easing: 'cubic-bezier(.65,0,.35,1)', fill: 'forwards' }
    );
    setTimeout(done, 700);
  }
  function arrive() {
    if (!S.arr) return;
    const c = S.arr;
    S.arr = '';
    save();
    if (RM) return;
    const d = document.createElement('div');
    d.className = 'xp xa';
    d.style.background = c;
    document.body.appendChild(d);
    requestAnimationFrame(() =>
      requestAnimationFrame(() => {
        d.classList.add('go');
        setTimeout(() => d.remove(), 900);
      })
    );
  }
  addEventListener('pageshow', (e) => {
    if (e.persisted) document.body.classList.remove('leave');
  });
  const pageOf = (path) => {
    let f = decodeURIComponent(path.split('/').pop() || '');
    if (!f) f = 'index.html';
    else if (!/\.\w+$/.test(f)) f += '.html';
    return f;
  };
  const here = () => pageOf(location.pathname);
  function local(a) {
    const h = a.getAttribute('href') || '';
    if (!h || /^(mailto:|tel:|javascript:)/.test(h)) return null;
    if (h.charAt(0) === '#') return [here(), h.slice(1)];
    let u;
    try {
      u = new URL(a.href, location.href);
    } catch (e) {
      return null;
    }
    if (u.protocol !== location.protocol || (u.protocol !== 'file:' && u.host !== location.host))
      return null;
    return [pageOf(u.pathname), u.hash.slice(1)];
  }

  /* tooltip for anything not built */
  let tip;
  let tipT;
  function showTip(a, txt) {
    if (!tip) {
      tip = document.createElement('div');
      tip.className = 'tip';
      tip.setAttribute('role', 'status');
      document.body.appendChild(tip);
    }
    tip.textContent = txt || 'Page not built yet';
    tip.classList.remove('below');
    const r = a.getBoundingClientRect();
    const w = tip.offsetWidth;
    const h = tip.offsetHeight;
    const x = clamp(r.left + r.width / 2 - w / 2, 8, innerWidth - w - 8);
    let y = r.top - h - 9;
    if (y < 8) {
      y = r.bottom + 9;
      tip.classList.add('below');
    }
    tip.style.left = x + 'px';
    tip.style.top = y + 'px';
    tip.style.setProperty('--ax', r.left + r.width / 2 - x + 'px');
    tip.classList.add('v');
    clearTimeout(tipT);
    tipT = setTimeout(hideTip, 1600);
  }
  const hideTip = () => {
    if (tip) tip.classList.remove('v');
  };

  /* pen ring on buttons */
  const PEN = '<svg class="pen" aria-hidden="true"><path/></svg>';
  const RING =
    'M4.4 48.6C.1 5.4 120.5-10.800 189.3 10.800c21.500 10.800 12.900 64.800-47.300 72.900' +
    'C77.500 91.800 4.400 81 .1 43.200-2.100 21.600 38.800 0 94.700 0';
  function pens(root) {
    $$('.b', root || document).forEach((b) => {
      if (!$('.pen', b)) b.insertAdjacentHTML('beforeend', PEN);
    });
    drawPens();
  }
  function drawPens() {
    $$('.pen').forEach((sv) => {
      const w = sv.clientWidth || sv.getBoundingClientRect().width;
      const h = sv.clientHeight || sv.getBoundingClientRect().height;
      if (!w || !h) return;
      const sx = w / 212;
      const sy = h / 98;
      const p = sv.firstElementChild;
      let abs = true;
      const d = RING.replace(/([MCc])([^MCc]*)/g, (m, c, a) => {
        abs = c !== 'c';
        const nums = a.match(/-?\d*\.?\d+/g).map(Number);
        return (
          c +
          nums
            .map((v, i) => (i % 2 ? (v + (abs ? 6 : 0)) * sy : (v + (abs ? 6 : 0)) * sx))
            .map((v) => v.toFixed(2))
            .join(' ')
        );
      });
      sv.setAttribute('viewBox', '0 0 ' + w + ' ' + h);
      p.setAttribute('d', d);
      p.style.setProperty('--l', Math.ceil(p.getTotalLength() + 2) + 'px');
    });
  }

  /* rolling text and cross fades */
  let tok = {};
  let tid = 0;
  function roll(el, txt) {
    if (!el) return;
    if (!el.classList.contains('rl')) {
      el.classList.add('rl');
      el.innerHTML = '<span></span>';
      el.firstChild.textContent = txt;
      return;
    }
    const sp = el.firstElementChild;
    if (sp.textContent === txt) return;
    if (RM) {
      sp.textContent = txt;
      return;
    }
    const id = el.dataset.rid || (el.dataset.rid = ++tid);
    tok[id] = (tok[id] || 0) + 1;
    const t = tok[id];
    el.classList.add('o');
    setTimeout(() => {
      if (t !== tok[id]) return;
      el.classList.remove('o');
      el.classList.add('n0');
      sp.textContent = txt;
      void sp.offsetWidth;
      el.classList.remove('n0');
    }, 200);
  }
  function fade(el, fn) {
    if (RM) {
      fn();
      return;
    }
    const id = el.dataset.rid || (el.dataset.rid = ++tid);
    tok[id] = (tok[id] || 0) + 1;
    const t = tok[id];
    el.classList.add('sf', 'o');
    setTimeout(() => {
      if (t !== tok[id]) return;
      fn();
      el.classList.remove('o');
    }, 170);
  }

  /* cart count and the flying chip */
  // header cart badge removed; kept as a no-op so callers still work
  function bump() {}
  function fly(srcs, done) {
    const c = $('#cart');
    if (RM || !srcs.length || !c) {
      bump();
      done && done();
      return;
    }
    const tgt = c.getBoundingClientRect();
    srcs.forEach((src, i) => {
      const r = src.getBoundingClientRect();
      const d = document.createElement('span');
      d.className = 'chip';
      d.textContent = src.dataset.sym || src.textContent;
      const cs = getComputedStyle(src);
      d.style.background = cs.backgroundColor === 'rgba(0, 0, 0, 0)' ? '#fff' : cs.backgroundColor;
      d.style.color = cs.color;
      d.style.left = r.left + r.width / 2 - 24 + 'px';
      d.style.top = r.top + r.height / 2 - 20 + 'px';
      document.body.appendChild(d);
      const dx = tgt.left + tgt.width / 2 - (r.left + r.width / 2);
      const dy = tgt.top + tgt.height / 2 - (r.top + r.height / 2);
      const a = d.animate(
        [
          { transform: 'none', opacity: 1 },
          {
            transform: `translate(${dx * 0.5}px,${dy * 0.5 - 60}px) scale(1.1) rotate(-6deg)`,
            opacity: 1,
            offset: 0.55,
          },
          { transform: `translate(${dx}px,${dy}px) scale(.5)`, opacity: 0.2 },
        ],
        { duration: 800, delay: i * 90, easing: 'cubic-bezier(.45,0,.2,1)', fill: 'both' }
      );
      a.onfinish = () => {
        d.remove();
        if (i === srcs.length - 1) {
          bump();
          done && done();
        }
      };
    });
  }
  let uid = 0;
  function addSet(label, pct, lines) {
    const id = label + '-' + Date.now().toString(36) + uid++;
    lines.forEach((l) => {
      l.nb = 1;
      l.b = [label, pct, lines.length, id];
      S.cart.push(l);
    });
    save();
  }

  /* currency */
  const listeners = [];
  function onCur(fn) {
    listeners.push(fn);
  }
  function setCur(c, quiet) {
    S.cur = c;
    if (!quiet) {
      paint(true);
      listeners.forEach((f) => f());
      save();
    }
  }

  /* smooth wheel scroll */
  const lenis = { t: scrollY, c: scrollY, on: false, k: 0.085 };
  let VH = innerHeight;
  const maxY = () => document.documentElement.scrollHeight - VH;
  function scrollToY(y) {
    if (typeof y === 'string') {
      const t = $(y);
      if (!t) return;
      y = t.getBoundingClientRect().top + scrollY - (innerWidth < 900 ? 64 : 96);
    }
    if (RM || innerWidth < 900) {
      scrollTo(0, y);
      return;
    }
    lenis.t = clamp(y, 0, maxY());
    lenis.c = scrollY;
    lenis.on = true;
  }
  const hooks = [];
  const measures = [];
  function frame() {
    if (lenis.on) {
      const d = lenis.t - lenis.c;
      if (Math.abs(d) < 0.4) {
        lenis.c = lenis.t;
        lenis.on = false;
      } else lenis.c += d * lenis.k;
      scrollTo(0, lenis.c);
    }
    const y = scrollY;
    hooks.forEach((h) => h(y, lenis.on));
    requestAnimationFrame(frame);
  }
  let tRO;
  function remeasure() {
    VH = innerHeight;
    measures.forEach((f) => f());
    drawPens();
    if (lenis.on) lenis.t = clamp(lenis.t, 0, maxY());
  }

  /* overlays: popups, cookie settings */
  let layer = null;
  function trap(el, onEsc) {
    const prev = document.activeElement;
    const key = (e) => {
      if (e.key === 'Escape') {
        e.preventDefault();
        onEsc();
        return;
      }
      if (e.key !== 'Tab') return;
      const f = $$(
        'a[href],button:not([disabled]),input,select,textarea,[tabindex="0"]',
        el
      ).filter((x) => x.offsetParent !== null);
      if (!f.length) return;
      const a = f[0];
      const z = f[f.length - 1];
      if (e.shiftKey && document.activeElement === a) {
        e.preventDefault();
        z.focus();
      } else if (!e.shiftKey && document.activeElement === z) {
        e.preventDefault();
        a.focus();
      }
    };
    document.addEventListener('keydown', key, true);
    return () => {
      document.removeEventListener('keydown', key, true);
      if (prev && prev.focus) prev.focus({ preventScroll: true });
    };
  }
  function openLayer(html, o) {
    o = o || {};
    closeLayer(true);
    const w = document.createElement('div');
    w.className = 'ov' + (RM ? ' st' : '');
    const cls = 'pp' + (o.wide ? ' pp-w' : '') + (o.cls ? ' ' + o.cls : '');
    w.innerHTML =
      '<div class="ov-bg"></div>' +
      `<div class="${cls}" role="dialog" aria-modal="true" aria-labelledby="pp-t" tabindex="-1">` +
      `${html}</div>`;
    document.body.appendChild(w);
    document.documentElement.classList.add('lock');
    pens(w);
    const close = () => closeLayer();
    const untrap = trap(w, close);
    $('.ov-bg', w).onclick = close;
    layer = { w, untrap, onClose: o.onClose };
    requestAnimationFrame(() => {
      w.classList.add('v');
      const f = o.cls ? $('.pp', w) : $('[data-af]', w) || $('.pp', w);
      f.focus({ preventScroll: true });
    });
    return w;
  }
  function closeLayer(quiet) {
    if (!layer) return;
    const L = layer;
    layer = null;
    L.untrap();
    document.documentElement.classList.remove('lock');
    L.w.classList.remove('v');
    setTimeout(() => L.w.remove(), RM ? 0 : 260);
    if (!quiet && L.onClose) L.onClose();
  }
  function popup(o) {
    const w = openLayer(
      `<div class="pp-sy"><span class="ts t-${o.tone || 'p'}">${o.sym}</span>${PEN}</div>` +
        `<div class="pp-c"><h2 class="h4 pp-h" id="pp-t"><span>${o.title}</span></h2>` +
        `<p class="br mu">${o.body}</p></div>` +
        `<button type="button" class="b b-v b-w" data-af>${o.btn || 'Done'}</button>`,
      { onClose: o.onClose, cls: 'pp-m' }
    );
    const ps = $('.pp-sy .pen', w);
    if (ps) {
      const sy = $('.pp-sy', w);
      requestAnimationFrame(() => {
        const W = sy.offsetWidth + 28;
        const H = sy.offsetHeight + 28;
        ps.style.cssText = 'left:-14px;top:-14px;width:' + W + 'px;height:' + H + 'px';
        drawPens();
      });
    }
    $('.b', w).onclick = () => {
      if (o.to) {
        layer && (layer.onClose = null);
        closeLayer();
        go(o.to);
      } else closeLayer();
    };
    return w;
  }

  /* cookie consent */
  const CK = [
    [
      'necessary',
      'Strictly necessary',
      'Log in, cart, checkout security and this choice. Always on.',
    ],
    ['preferences', 'Preferences', 'Your currency and the services you looked at.'],
    ['analytics', 'Analytics', 'How the site is used, so we can fix what is slow or unclear.'],
    ['marketing', 'Marketing', 'Ads and social posts shown to you on other sites.'],
  ];
  const waiting = [];
  function consent() {
    return Object.assign(
      { necessary: true, preferences: false, analytics: false, marketing: false },
      S.ck || {}
    );
  }
  // optional scripts wait here until their cookie category is allowed
  function gate(cat, fn) {
    if (consent()[cat]) fn();
    else waiting.push([cat, fn]);
  }
  function setConsent(v) {
    S.ck = Object.assign(
      { necessary: true, preferences: false, analytics: false, marketing: false },
      v,
      { necessary: true }
    );
    try {
      sessionStorage.setItem('gcl-consent', JSON.stringify(S.ck));
    } catch (e) {}
    save();
    for (let i = waiting.length - 1; i >= 0; i--)
      if (S.ck[waiting[i][0]]) {
        const f = waiting.splice(i, 1)[0][1];
        f();
      }
    hideBanner();
  }
  let banner;
  function hideBanner() {
    if (banner) {
      const b = banner;
      banner = null;
      b.classList.remove('v');
      setTimeout(() => b.remove(), RM ? 0 : 400);
    }
  }
  function showBanner() {
    if (banner || S.ck) return;
    banner = document.createElement('aside');
    banner.className = 'ckb' + (RM ? ' st' : '');
    banner.setAttribute('aria-label', 'Cookies');
    banner.innerHTML =
      '<div><h2 class="h5">Cookies</h2><p class="bs">We use cookies to keep the site working ' +
      'and, if you say yes, to see how it is used. ' +
      '<button type="button" class="ck-l" data-m>Manage settings.</button></p></div>' +
      '<div class="ckb-b"><button type="button" class="b" data-r0>Reject all</button>' +
      '<button type="button" class="b" data-a1>Accept all</button></div>';
    document.body.appendChild(banner);
    pens(banner);
    $('[data-m]', banner).onclick = cookieSettings;
    $('[data-r0]', banner).onclick = () => setConsent({});
    $('[data-a1]', banner).onclick = () =>
      setConsent({ preferences: true, analytics: true, marketing: true });
    requestAnimationFrame(() => banner && banner.classList.add('v'));
  }
  function cookieSettings() {
    const c = consent();
    const rows = CK.map((k) => {
      const [key, name, line] = k;
      const on = c[key];
      return (
        `<div class="ck-c"><div><p class="ls" id="ck-${key}">${name}</p>` +
        `<p class="bs mu">${line}</p></div>` +
        `<button type="button" class="tg${on ? ' on' : ''}" role="switch" aria-checked="${!!on}" ` +
        `aria-labelledby="ck-${key}" data-k="${key}"${key === 'necessary' ? ' disabled' : ''}>` +
        '<i></i></button></div>'
      );
    }).join('');
    const w = openLayer(
      '<div class="pp-c"><h2 class="h4" id="pp-t">Cookies on this site</h2>' +
        '<p class="bs mu">Some cookies keep the site working. ' +
        'The rest are off until you say yes. ' +
        '<a class="ck-l" href="cookies.html">Read the cookie policy.</a></p></div>' +
        `<div class="ck-cs">${rows}</div>` +
        '<div class="ck-a"><div class="ckb-b">' +
        '<button type="button" class="b" data-r0>Reject all</button>' +
        '<button type="button" class="b" data-a1>Accept all</button></div>' +
        '<button type="button" class="b b-2 b-w" data-sv data-af>Save my choices</button></div>',
      { wide: 1 }
    );
    $$('.tg', w).forEach((t) => {
      t.onclick = () => {
        const on = t.classList.toggle('on');
        t.setAttribute('aria-checked', on);
      };
    });
    const done = (v) => {
      setConsent(v);
      closeLayer();
    };
    $('[data-r0]', w).onclick = () => done({});
    $('[data-a1]', w).onclick = () => done({ preferences: true, analytics: true, marketing: true });
    $('[data-sv]', w).onclick = () => {
      const v = {};
      $$('.tg', w).forEach((t) => {
        v[t.dataset.k] = t.classList.contains('on');
      });
      done(v);
    };
  }

  /* forms */
  const RULES = {
    name: [(v) => v.trim().length > 1, 'Enter your full name.'],
    email: [(v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()), 'Enter a valid email address.'],
    phone: [
      (v) => v.replace(/[^\d]/g, '').length >= 7,
      'Enter a phone number we can reach you on.',
    ],
    dob: [
      (v) => /\d{4}/.test(v) && v.trim().length >= 8,
      'Enter your date of birth, like 14 March 1988.',
    ],
    req: [(v) => v.trim().length > 0, 'This one is needed.'],
    pass: [(v) => v.length >= 8, 'Use eight characters or more.'],
    code: [(v) => v.replace(/\D/g, '').length === 6, 'Enter the six digit code.'],
    same: [
      (v, f) => {
        const p = $$('[data-v="pass"]', f).pop();
        return !p || v === p.value;
      },
      'The two passwords do not match.',
    ],
  };
  function fieldErr(fd, msg) {
    let e = $('.fe', fd.parentNode === fd.closest('.fdw') ? fd.parentNode : fd);
    if (!fd.closest('.fdw')) {
      const w = document.createElement('div');
      w.className = 'fdw';
      fd.parentNode.insertBefore(w, fd);
      w.appendChild(fd);
    }
    const w = fd.closest('.fdw');
    e = $('.fe', w);
    if (!e) {
      e = document.createElement('p');
      e.className = 'fe';
      e.setAttribute('role', 'alert');
      w.appendChild(e);
    }
    e.textContent = msg || '';
    w.classList.toggle('bad', !!msg);
    fd.classList.toggle('bad', !!msg);
  }
  function checks(root) {
    $$('.cs', root).forEach((c) => {
      if (c._w) return;
      c._w = 1;
      const t = () => {
        const on = c.classList.toggle('on');
        c.setAttribute('aria-checked', on);
        c.classList.remove('bad');
      };
      c.addEventListener('click', (e) => {
        if (e.target.closest('a')) return;
        t();
      });
      c.onkeydown = (e) => {
        if (e.key === ' ' || e.key === 'Enter') {
          e.preventDefault();
          t();
        }
      };
    });
  }
  /* brand dropdown: the native select stays for the value and validation, a styled list replaces its menu */
  let ddOpen = null;
  function dropdown(sel) {
    if (sel.dataset.dd) return;
    sel.dataset.dd = '1';
    const fd = sel.closest('.fd');
    const lab = fd.querySelector('label');
    const opts = [...sel.options].filter((o) => !o.hidden);
    const id = sel.id + '-dd';
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'dd-b';
    btn.setAttribute('aria-haspopup', 'listbox');
    btn.setAttribute('aria-expanded', 'false');
    btn.setAttribute('aria-controls', id);
    if (lab) {
      lab.id = lab.id || sel.id + '-lab';
      btn.setAttribute('aria-labelledby', lab.id + ' ' + id + '-v');
      lab.removeAttribute('for');
    }
    btn.innerHTML = `<span id="${id}-v"></span>`;
    const ul = document.createElement('ul');
    ul.className = 'dd-l';
    ul.id = id;
    ul.setAttribute('role', 'listbox');
    ul.tabIndex = -1;
    ul.innerHTML = opts
      .map(
        (o, i) =>
          `<li role="option" id="${id}-${i}" data-i="${i}" aria-selected="false">${o.textContent}</li>`
      )
      .join('');
    sel.after(btn);
    fd.appendChild(ul);
    sel.classList.add('dd-n');
    sel.tabIndex = -1;
    sel.setAttribute('aria-hidden', 'true');
    fd.classList.add('dd');
    const items = [...ul.children];
    let act = -1;
    const sync = () => {
      const v = sel.value;
      const ph = !v;
      btn.firstChild.textContent = ph ? sel.options[0].textContent : v;
      btn.classList.toggle('ph', ph);
      sel.classList.toggle('ph', ph);
      items.forEach((li, i) => li.setAttribute('aria-selected', !ph && opts[i].value === v));
    };
    const d = Object.getOwnPropertyDescriptor(HTMLSelectElement.prototype, 'value');
    Object.defineProperty(sel, 'value', {
      get() {
        return d.get.call(this);
      },
      set(v) {
        d.set.call(this, v);
        sync();
      },
    });
    const mark = (i) => {
      act = Math.max(0, Math.min(items.length - 1, i));
      items.forEach((li, j) => li.classList.toggle('on', j === act));
      btn.setAttribute('aria-activedescendant', items[act].id);
      items[act].scrollIntoView({ block: 'nearest' });
    };
    const close = (focus) => {
      fd.classList.remove('dd-o');
      btn.setAttribute('aria-expanded', 'false');
      btn.removeAttribute('aria-activedescendant');
      if (ddOpen === close) ddOpen = null;
      if (focus) btn.focus();
    };
    const open = () => {
      if (ddOpen) ddOpen();
      fd.classList.add('dd-o');
      btn.setAttribute('aria-expanded', 'true');
      ddOpen = close;
      const cur = opts.findIndex((o) => sel.value && o.value === sel.value);
      mark(cur < 0 ? 0 : cur);
    };
    const pick = (i) => {
      sel.value = opts[i].value;
      sel.dispatchEvent(new Event('change', { bubbles: true }));
      sel.dispatchEvent(new Event('input', { bubbles: true }));
      close(true);
    };
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      fd.classList.contains('dd-o') ? close() : open();
    });
    fd.addEventListener('click', (e) => {
      if (e.target.closest('.dd-l,.dd-b')) return;
      btn.focus();
      fd.classList.contains('dd-o') ? close() : open();
    });
    ul.addEventListener('click', (e) => {
      const li = e.target.closest('li');
      if (li) pick(+li.dataset.i);
    });
    ul.addEventListener('pointermove', (e) => {
      const li = e.target.closest('li');
      if (li && +li.dataset.i !== act) mark(+li.dataset.i);
    });
    btn.addEventListener('keydown', (e) => {
      const isO = fd.classList.contains('dd-o');
      const k = e.key;
      if (k === 'ArrowDown' || k === 'ArrowUp') {
        e.preventDefault();
        if (!isO) open();
        else mark(act + (k === 'ArrowDown' ? 1 : -1));
      } else if ((k === 'Enter' || k === ' ') && isO) {
        e.preventDefault();
        pick(act);
      } else if (k === 'Escape' && isO) {
        e.preventDefault();
        e.stopPropagation();
        close(true);
      } else if (k === 'Tab' && isO) close();
      else if (k === 'Home' && isO) (e.preventDefault(), mark(0));
      else if (k === 'End' && isO) (e.preventDefault(), mark(items.length - 1));
    });
    sel.addEventListener('change', sync);
    const f = sel.form;
    f && f.addEventListener('reset', () => setTimeout(sync));
    sync();
  }
  document.addEventListener('pointerdown', (e) => {
    if (ddOpen && !e.target.closest('.fd.dd-o')) ddOpen();
  });

  function fields(root) {
    root = root || document;
    checks(root);
    $$('.fd', root).forEach((d) =>
      d.addEventListener('click', (e) => {
        if (e.target.closest('input,select,textarea,button,label')) return;
        const i = $('input,select,textarea', d);
        i && i.focus();
      })
    );
    $$('textarea', root).forEach((t) => {
      const fit = () => {
        t.style.height = 'auto';
        t.style.height = Math.max(t.scrollHeight, t.dataset.min || 0) + 'px';
      };
      t.addEventListener('input', fit);
      requestAnimationFrame(fit);
    });
    $$('select', root).forEach((sel) =>
      sel.addEventListener('change', () => sel.classList.toggle('ph', !sel.value))
    );
    $$('.fd select', root).forEach(dropdown);
    $$('.eye', root).forEach((b) => {
      b.onclick = (e) => {
        e.preventDefault();
        const i = $('input', b.closest('.fd'));
        const sh = i.type === 'password';
        i.type = sh ? 'text' : 'password';
        b.setAttribute('aria-pressed', sh);
        b.setAttribute('aria-label', sh ? 'Hide password' : 'Show password');
      };
    });
    $$('[data-v]', root).forEach((i) =>
      i.addEventListener('input', () => {
        const fd = i.closest('.fd');
        if (fd.classList.contains('bad')) fieldErr(fd, '');
      })
    );
  }
  function validate(f) {
    let ok = true;
    let first = null;
    $$('[data-v]', f).forEach((i) => {
      if (i.offsetParent === null) return;
      const r = RULES[i.dataset.v];
      const good = r[0](i.value, f);
      fieldErr(i.closest('.fd'), good ? '' : r[1]);
      if (!good) {
        ok = false;
        first = first || i;
      }
    });
    $$('.cs[data-need]', f).forEach((c) => {
      const good = c.classList.contains('on');
      c.classList.toggle('bad', !good);
      if (!good) {
        ok = false;
        first = first || c;
      }
    });
    if (first) {
      first.focus({ preventScroll: true });
      const r = first.getBoundingClientRect();
      if (r.top < 110 || r.bottom > innerHeight - 20) scrollToY(r.top + scrollY - innerHeight / 3);
    }
    return ok;
  }
  function busy(btn, fn) {
    if (btn.classList.contains('ld')) return;
    if (RM) {
      fn();
      return;
    }
    btn.classList.add('ld');
    btn.setAttribute('aria-busy', 'true');
    setTimeout(() => {
      btn.classList.remove('ld');
      btn.removeAttribute('aria-busy');
      fn();
    }, 750);
  }
  function form(f, o) {
    fields(f);
    f.setAttribute('novalidate', '');
    f.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!validate(f)) return;
      busy($('[type=submit]', f), () => o.ok(f));
    });
  }

  /* question rows */
  function faq(root) {
    $$('.qa', root || document).forEach((q) => {
      const b = $('button', q);
      const a = $('.ans', q);
      if (q.classList.contains('op')) a.style.height = 'auto';
      b.onclick = () => {
        const o = q.classList.toggle('op');
        b.setAttribute('aria-expanded', o);
        if (RM) {
          a.style.height = o ? 'auto' : '0';
          remeasure();
          return;
        }
        a.style.height = a.scrollHeight + 'px';
        if (!o) {
          void a.offsetHeight;
          a.style.height = '0px';
        }
        setTimeout(() => {
          if (o && q.classList.contains('op')) a.style.height = 'auto';
          remeasure();
        }, 460);
      };
    });
  }

  /* card deck */
  const GC = { y: 't-y', p: 't-p', v: 't-v', g: 't-g', k: 't-k', w: '' };
  function deck(el, cards, o) {
    o = o || {};
    const U = (n) => `calc(${n}*var(--du))`;
    const X = (n) => `calc(${n}*var(--dux,var(--du)))`;
    el.classList.add('dek');
    const widths = cards.map((c) => `calc(${c.x}*var(--dux,var(--du)) + ${c.w}*var(--du))`);
    el.style.width = `max(${widths.join(',')})`;
    el.style.height = U(o.h);
    el.innerHTML = cards
      .map((c, i) => {
        const sx = X(o.sx === undefined ? c.x : o.sx);
        const sy = U(o.sy === undefined ? c.y : o.sy);
        const style =
          `--i:${i};--x:${X(c.x)};--y:${U(c.y)};--r:${c.r}deg;--sx:${sx};--sy:${sy};` +
          `--hx:${c.hx || 0}px;--hy:${c.hy || 0}px;` +
          `width:${U(c.w)};height:${U(c.h)};padding:${U(c.p)};z-index:${i + 1}`;
        const meta = c.meta ? `<span style="font-weight:500;font-size:.93em">${c.meta}</span>` : '';
        const label = c.lab
          ? `<span class="dl" style="display:block;margin-top:${U(8)};` +
            `font-size:max(11px,${U(c.ls || 13)})">${c.lab}</span>`
          : '';
        return (
          `<div class="dkc ${c.cls || ''}" data-sym="${c.sym}" style="${style}">` +
          `<span class="tl-m" style="font-size:max(10px,${U(c.fs || 14)})">` +
          `<span>${c.n || ''}</span>${meta}</span>` +
          `<div><b style="display:block;font-size:${U(c.sz)}">${c.sym}</b>${label}</div></div>`
        );
      })
      .join('');
    paint(false, el);
  }
  function fan(el, items) {
    const n = items.length;
    const rot = [8, -6, -1];
    const ys = [[0], [0, 0], [0, 0, 20]][n - 1];
    deck(
      el,
      items.map((t, i) => ({
        cls: GC[t.g],
        sym: t.sym,
        n: t.n,
        lab: t.lab,
        x: i * 96,
        y: ys[i],
        r: n === 1 ? 4 : rot[i],
        w: 200,
        h: 176,
        p: 16,
        sz: 50,
        hx: (i - (n - 1) / 2) * 22,
        hy: -6,
      })),
      { h: 236, sx: (n - 1) * 48, sy: 10 }
    );
  }
  function cartDeck(el, cart) {
    const cs = (cart || S.cart).slice(0, 3);
    el.style.display = cs.length ? '' : 'none';
    if (cs.length)
      fan(
        el,
        cs.map((l) => ({ g: CAT[l.c].g, sym: l.c, n: CAT[l.c].n, lab: CAT[l.c].name }))
      );
  }

  /* preloader */
  function preload(next) {
    const ready = document.fonts && document.fonts.ready ? document.fonts.ready : Promise.resolve();
    let first = true;
    try {
      first = !sessionStorage.getItem('gcl-pl');
      sessionStorage.setItem('gcl-pl', '1');
    } catch (e) {
      first = !S.pl;
    }
    S.pl = 1;
    if (!first || RM) {
      ready.then(next);
      return;
    }
    document.documentElement.classList.add('plv');
    const d = document.createElement('div');
    d.className = 'gpl';
    d.setAttribute('aria-hidden', 'true');
    d.innerHTML =
      '<div class="gpl-t"><i>000</i><s>Gc</s><b>Gc</b><u><em></em></u></div>' +
      '<p class="gpl-l">Mixing your copy</p>';
    document.body.appendChild(d);
    document.documentElement.classList.add('lock');
    const n = $('i', d);
    const bar = $('em', d);
    const t = $('.gpl-t', d);
    const t0 = performance.now();
    const D = 1500;
    let done = false;
    let loaded = false;
    Promise.all([
      ready,
      new Promise((r) =>
        document.readyState === 'complete' ? r() : addEventListener('load', r, { once: true })
      ),
    ]).then(() => {
      loaded = true;
    });
    const step = (now) => {
      const k = Math.min(1, (now - t0) / D);
      const e = 1 - Math.pow(1 - k, 2.4);
      const v = Math.round((loaded ? e : Math.min(e, 0.9)) * 100);
      n.textContent = String(v).padStart(3, '0');
      bar.style.width = v + '%';
      if (v < 100) requestAnimationFrame(step);
      else if (!done) {
        done = true;
        land();
      }
    };
    requestAnimationFrame(step);
    setTimeout(() => {
      loaded = true;
    }, 6000);
    function land() {
      const lg = $('.nv .lgm');
      d.classList.add('out');
      if (!lg) {
        d.remove();
        document.documentElement.classList.remove('lock');
        next();
        return;
      }
      const a = t.getBoundingClientRect();
      const b = lg.getBoundingClientRect();
      lg.style.visibility = 'hidden';
      const dx = b.left - a.left - (a.width - b.width) / 2;
      const dy = b.top - a.top - (a.height - b.height) / 2;
      t.animate(
        [
          { transform: 'none', borderRadius: '24px' },
          {
            transform: `translate(${dx}px,${dy}px) scale(${b.width / a.width})`,
            borderRadius: (8 * a.width) / b.width + 'px',
          },
        ],
        { duration: 800, easing: 'cubic-bezier(.65,0,.35,1)', fill: 'forwards' }
      );
      setTimeout(() => {
        document.documentElement.classList.remove('lock');
        next();
      }, 250);
      setTimeout(() => {
        lg.style.visibility = '';
        d.remove();
      }, 820);
    }
  }

  /* soft follow on service cards */
  let leanOn = false;
  function lean() {
    if (leanOn || RM) return;
    leanOn = true;
    let mx = -1e4;
    let my = -1e4;
    let hov = null;
    let moving = false;
    const st = new WeakMap();
    addEventListener(
      'pointermove',
      (e) => {
        if (e.pointerType !== 'mouse') return;
        mx = e.clientX;
        my = e.clientY;
        moving = true;
      },
      { passive: true }
    );
    document.addEventListener('pointerover', (e) => {
      const t = e.target.closest && e.target.closest('.et');
      hov = t || null;
    });
    document.addEventListener('pointerleave', () => {
      mx = my = -1e4;
      hov = null;
    });
    const tick = () => {
      if (innerWidth >= 900) {
        const cards = $$('.et');
        let any = false;
        for (const el of cards) {
          if (el.style.visibility === 'hidden') continue;
          const b = el.getBoundingClientRect();
          if (b.bottom < -50 || b.top > innerHeight + 50) continue;
          let s = st.get(el);
          if (!s) {
            s = { x: 0, y: 0, h: 0 };
            st.set(el, s);
          }
          const cx = b.left + b.width / 2 - s.x;
          const cy = b.top + b.height / 2 - s.y;
          const dx = mx - cx;
          const dy = my - cy;
          const dd = Math.hypot(dx, dy);
          const R = Math.max(320, b.width * 1.8);
          const f = clamp(1 - dd / R);
          const on = hov === el;
          const tx = (dx / (dd || 1)) * f * f * (on ? 7 : 10) + (on ? (dx / b.width) * 10 : 0);
          const ty = (dy / (dd || 1)) * f * f * (on ? 7 : 10) + (on ? (dy / b.height) * 8 : 0);
          const th = on ? 1 : 0;
          s.x += (tx - s.x) * 0.12;
          s.y += (ty - s.y) * 0.12;
          s.h += (th - s.h) * 0.12;
          if (Math.abs(tx - s.x) + Math.abs(ty - s.y) + Math.abs(th - s.h) > 0.02) any = true;
          const px = s.x.toFixed(2);
          const py = (s.y - 6 * s.h).toFixed(2);
          const deg = (-1 * s.h + s.x * 0.06).toFixed(3);
          el.style.transform = `translate3d(${px}px,${py}px,0) rotate(${deg}deg)`;
          el.classList.toggle('hv', on);
        }
      }
      requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  }

  /* carousels on small screens */
  function cars() {
    $$('.car').forEach((c) => {
      if (c._d) return;
      const n = c.children.length;
      if (n < 2) return;
      const d = document.createElement('div');
      d.className = 'dots';
      d.setAttribute('aria-hidden', 'true');
      d.innerHTML = '<i class="on"></i>' + '<i></i>'.repeat(n - 1);
      c.after(d);
      c._d = d;
      c.classList.add('scrl');
      let t;
      c.addEventListener(
        'scroll',
        () => {
          cancelAnimationFrame(t);
          t = requestAnimationFrame(() => {
            const mid = c.scrollLeft + c.clientWidth / 2;
            let best = 0;
            let bd = 1e9;
            [...c.children].forEach((k, i) => {
              const dd = Math.abs(k.offsetLeft + k.offsetWidth / 2 - mid);
              if (dd < bd) {
                bd = dd;
                best = i;
              }
            });
            [...d.children].forEach((k, i) => k.classList.toggle('on', i === best));
          });
        },
        { passive: true }
      );
    });
  }

  /* shared bits of markup */
  function tile(c, o) {
    o = o || {};
    const s = CAT[c];
    const cls = 'tl et t-' + s.g + (o.cls ? ' ' + o.cls : '');
    const reveal = o.r !== undefined ? ` data-r style="--d:${o.r}"` : '';
    return (
      `<a class="${cls}" href="${s.slug}.html"${reveal}>` +
      `<span class="tl-m"><span>${s.n}</span>` +
      `<span><i class="frp">From </i><span data-p="from:${c}"></span></span></span>` +
      `<span class="et-n"><b>${c}</b><span>${s.name}</span></span></a>`
    );
  }
  function lineRows(cart, t, dark) {
    return cart
      .map(
        (l, i) =>
          `<div class="oll"><div><p class="btr">${CAT[l.c].name}</p><p class="bs">` +
          `${spec(l)}</p></div><span class="ll">${fmtN(t.lines[i])}</span></div>`
      )
      .join('');
  }
  function sumRows(t, code, lab) {
    const row = (k, v, cls) =>
      `<div class="ors${cls || ''}">` + `<span>${k}</span><span>${v}</span></div>`;
    const pct = (s) => Math.round(s.pct * 100);
    const sets = t.sets
      .map((s) => row(`${s.label}, ${pct(s)}% off as a set`, `Minus ${fmtN(s.save)}`))
      .join('');
    const disc = t.disc ? row(`${code} applied`, `Minus ${fmtN(t.disc)}`) : '';
    return row('Subtotal', fmtN(t.sub)) + sets + disc + row(lab, fmtN(t.total), ' ors-t');
  }
  function recap(el, o) {
    const draw = () => {
      const cart = o.cart();
      const code = o.code();
      const t = totals(cart, code);
      el.innerHTML = lineRows(cart, t) + sumRows(t, code, o.label);
    };
    draw();
    onCur(draw);
  }

  /* page boot */
  function page(o) {
    o = o || {};
    if (o.guard && !S.user) {
      S.ret = here();
      save();
      location.replace('log-in.html#s=' + enc(S));
      return;
    }
    setCur(S.cur, true);
    paint(false);
    document.addEventListener(
      'click',
      (e) => {
        const nb = e.target.closest('[data-nb]');
        if (nb) {
          e.preventDefault();
          e.stopPropagation();
          showTip(nb, nb.dataset.nb || '');
          return;
        }
        const a = e.target.closest('a');
        if (!a) return;
        e.preventDefault();
        e.stopPropagation();
        if ('out' in a.dataset) {
          S.user = 0;
          S.ret = '';
        }
        if (a.dataset.scroll) {
          scrollToY(a.dataset.scroll);
          return;
        }
        const L = local(a);
        if (!L) {
          showTip(a);
          return;
        }
        const [p, f] = L;
        if (p === here() && f) {
          if ($('#' + f)) scrollToY('#' + f);
          return;
        }
        if (p === here() && !a.dataset.pre && !('out' in a.dataset)) {
          closeLayer(true);
          scrollToY(0);
          return;
        }
        if (a.dataset.pre && window[a.dataset.pre]) window[a.dataset.pre](a);
        closeLayer(true);
        const card = !RM && a.matches('.et,.tl.et') && a.offsetParent ? a : null;
        go(p + (f ? '#' + f : ''), card);
      },
      true
    );
    if (!RM) {
      addEventListener(
        'wheel',
        (e) => {
          if (e.ctrlKey || innerWidth < 900 || layer) return;
          if (e.target.closest && e.target.closest('.scrl')) return;
          const mouse =
            e.deltaMode !== 0 ||
            (e.wheelDeltaY !== undefined &&
              e.wheelDeltaY !== 0 &&
              Math.abs(e.wheelDeltaY) % 120 === 0 &&
              Math.abs(e.deltaY) >= 50 &&
              !e.deltaX);
          if (!mouse) {
            lenis.on = false;
            return;
          }
          e.preventDefault();
          if (!lenis.on) {
            lenis.t = lenis.c = scrollY;
            lenis.on = true;
          }
          lenis.t = clamp(
            lenis.t + e.deltaY * (e.deltaMode === 1 ? 32 : e.deltaMode === 2 ? VH : 1),
            0,
            maxY()
          );
        },
        { passive: false }
      );
      addEventListener('keydown', (e) => {
        if (!/INPUT|TEXTAREA|SELECT/.test(document.activeElement.tagName)) lenis.on = false;
      });
      addEventListener(
        'touchstart',
        () => {
          lenis.on = false;
        },
        { passive: true }
      );
      addEventListener('mousedown', (e) => {
        if (e.target === document.documentElement) lenis.on = false;
      });
    }
    addEventListener('scroll', hideTip, { passive: true });
    addEventListener('resize', () => {
      clearTimeout(tRO);
      tRO = setTimeout(remeasure, 120);
    });
    fields();
    faq();
    cars();
    const start = () => {
      pens();
      arrive();
      document.body.classList.add('on');
      lean();
      const first = document.querySelector('main>section');
      if (RM) {
        $$('[data-r]').forEach((e) => e.classList.add('in'));
      } else {
        if (first) $$('[data-r]', first).forEach((e) => e.classList.add('in'));
        const io = new IntersectionObserver(
          (es) =>
            es.forEach((en) => {
              if (en.isIntersecting) {
                en.target.classList.add('in');
                io.unobserve(en.target);
              }
            }),
          { threshold: 0.08, rootMargin: '0px 0px -6% 0px' }
        );
        $$('[data-r]').forEach((e) => {
          if (!e.classList.contains('in') && !e.hasAttribute('data-hold')) io.observe(e);
        });
        G.observe = (el) =>
          $$('[data-r]', el).forEach((e) => {
            if (!e.classList.contains('in')) io.observe(e);
          });
        requestAnimationFrame(frame);
      }
      o.ready && o.ready();
      remeasure();
      if (S.to) {
        const t = S.to;
        S.to = '';
        setTimeout(() => {
          const el = document.getElementById(t);
          if (el) {
            const y = el.getBoundingClientRect().top + scrollY - (innerWidth < 900 ? 64 : 96);
            scrollTo(0, y);
          }
        }, 60);
      }
      setTimeout(showBanner, RM ? 0 : 1800);
    };
    preload(start);
    addEventListener('load', remeasure);
  }

  const G = (window.GCL = {
    VERSION,
    BUILT,
    CAT,
    PK,
    GROUPS,
    GRADE,
    RATES,
    RU,
    get S() {
      return S;
    },
    pieceUSD,
    lineUSD,
    linePrice,
    money,
    fmtN,
    conv,
    totals,
    setPrice,
    pkLines,
    std,
    spec,
    priceOf,
    paint,
    go,
    save,
    showTip,
    hideTip,
    pens,
    drawPens,
    roll,
    fade,
    count,
    fly,
    bump,
    addSet,
    onCur,
    setCur,
    page,
    scrollToY,
    hooks,
    measures,
    remeasure,
    RM,
    $,
    $$,
    clamp,
    esc,
    nf,
    deck,
    fan,
    cartDeck,
    tile,
    recap,
    popup,
    openLayer,
    closeLayer,
    form,
    fields,
    validate,
    busy,
    fieldErr,
    faq,
    gate,
    consent,
    cookieSettings,
    observe() {},
    DEMO,
    add(l) {
      S.cart.push(l);
      save();
    },
    signIn() {
      S.user = 1;
      const r = S.ret || 'account-pieces.html';
      S.ret = '';
      return r;
    },
  });
  window.gcl = {
    version: VERSION,
    built: BUILT,
    state: () => JSON.parse(JSON.stringify(S)),
    remeasure,
    tune: {
      set lerp(v) {
        lenis.k = v;
      },
      get lerp() {
        return lenis.k;
      },
    },
    to: scrollToY,
    cart: () => {
      const t = totals();
      return {
        lines: S.cart.map((l, i) => ({
          service: CAT[l.c].name,
          spec: spec(l),
          price: fmtN(t.lines[i]),
          brief: !l.nb,
        })),
        subtotal: fmtN(t.sub),
        sets: t.sets,
        discount: fmtN(t.disc),
        total: fmtN(t.total),
      };
    },
    consent,
    gate,
    reset: () => {
      S = DEF();
      try {
        localStorage.removeItem('gcl');
        sessionStorage.removeItem('gcl-consent');
      } catch (e) {}
      save();
      location.reload();
    },
    preloader: () => {
      try {
        sessionStorage.removeItem('gcl-pl');
      } catch (e) {}
      S.pl = 0;
      save();
      location.reload();
    },
    payment: (v) => {
      if (v !== undefined) {
        S.fail = v === 'fail' ? 1 : 0;
        save();
      }
      return S.fail ? 'fail' : 'ok';
    },
  };
})();