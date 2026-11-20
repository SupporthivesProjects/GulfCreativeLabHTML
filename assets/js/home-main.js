
      (function () {
        const G = GCL;
        const $ = G.$;
        const $$ = G.$$;
        const S = G.S;
        const CAT = G.CAT;
        const RM = G.RM;
        const clamp = G.clamp;
        const mixv = (a, b, t) => a + (b - a) * t;
        const eio = (t) => (t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2);
        const eo = (t) => 1 - Math.pow(1 - t, 3);
        const TONE = { p: '#F9C9B8', v: '#D7CCFA', g: '#BFE9DA', y: '#F5DEA3' };

        const gd = $('#gd');
        gd.innerHTML = ['Bl', 'Ar', 'Sc', 'Ad', 'Ca', 'Wc', 'Tg', 'Pr', 'Cv', 'Pd', 'Cc', 'Eb']
          .map((c, i) => {
            const s = CAT[c];
            return (
              `<button type="button" class="el t-${s.g}" data-s="${c}" style="--i:${i}` +
              `" aria-label="Add ${s.name} to your mix"><span class="mt"><i>${s.n}` +
              `</i><i data-p="from:${c}" data-pre="From "></i></span>` +
              `<b style="font-weight:400">${c}</b><span class="lb">${s.name}</span></button>`
            );
          })
          .join('');
        const els = $$('.el', gd);
        const elBy = Object.fromEntries(els.map((e) => [e.dataset.s, e]));
        let sel = ['Wc', 'Pd', 'Ca'];
        let mixV;
        const mix = $('#mix');
        const cmp = $('#cmp');
        const mixPrice = () =>
          G.setPrice(
            sel.map((c) => G.std(c)),
            sel.length > 1 ? G.RU.set : 0
          ).price;
        function drawMix(anim) {
          els.forEach((e) => {
            const on = sel.includes(e.dataset.s);
            e.classList.toggle('sel', on);
            e.setAttribute('aria-pressed', on);
          });
          mix.innerHTML = sel
            .map(
              (x, i) =>
                `${i ? '<span class="mop">+</span>' : ''}<span class="ch t-${CAT[x].g}">${x}</span>`
            )
            .join('');
          if (sel.length) {
            const v = mixPrice();
            G.count(cmp, anim ? mixV : undefined, v, 'From ');
            mixV = v;
          } else {
            cmp.textContent = 'Pick an element';
            mixV = undefined;
          }
          $('#omx').disabled = !sel.length;
        }
        els.forEach((e) => {
          e.onclick = () => {
            document.body.classList.add('picked');
            const x = e.dataset.s;
            const i = sel.indexOf(x);
            if (i >= 0) sel.splice(i, 1);
            else {
              if (sel.length === 3) sel.shift();
              sel.push(x);
            }
            drawMix(true);
          };
        });
        $('#omx').onclick = () => {
          if (!sel.length) return;
          const lines = sel.map((c) => G.std(c));
          if (lines.length > 1) G.addSet('Your mix', G.RU.set, lines);
          else {
            lines[0].nb = 1;
            G.add(lines[0]);
          }
          G.fly($$('.ch', mix));
        };

        $('#gs').innerHTML = ['p', 'v', 'g', 'y']
          .map(
            (g) =>
              `<div class="gp t-${g}" data-r><h3>${G.GROUPS[g][0]}</h3><div>` +
              Object.values(CAT)
                .filter((s) => s.g === g)
                .map(
                  (s) =>
                    `<button type="button" class="rw" data-c="${s.c}"><b style="font-weight:400">` +
                    `${s.c}</b><span><span>${s.name}</span><small data-p="from:${s.c}` +
                    `" data-suf=" for ${G.nf(s.w)} words"></small></span></button>`
                )
                .join('') +
              `</div></div>`
          )
          .join('');
        $('#pcs').innerHTML = G.PK.map(
          (p, i) =>
            `<article class="pc" data-r style="--d:${i * 0.12}" data-sp="` +
            `${[0.02, -0.03, 0.02][i]}"><div class="fm">` +
            p[2]
              .map(
                (t, j) => `<span class="ft t-${CAT[t[0]].g}" style="--i:${i + j}">${t[0]}</span>`
              )
              .join('') +
            `</div><div><h3>${p[0]}</h3><p>${p[1]}</p></div><div>` +
            p[3].map((r) => '<div class="pr">' + r + '</div>').join('') +
            `</div><div class="pb"><div><span>You pay</span><strong data-p="pk:${i}` +
            `"></strong></div>` +
            `<button type="button" class="b b-v b-w" data-pk="${i}">Order ${p[0]}</button>` +
            `</div></article>`
        ).join('');
        $$('[data-pk]').forEach((b) => {
          b.onclick = () => {
            const i = +b.dataset.pk;
            G.addSet(G.PK[i][0], G.RU.pack, G.pkLines(i));
            G.fly($$('.ft', b.closest('.pc')));
          };
        });

        let svc = '';
        function setSheet(c, instant) {
          const s = CAT[c];
          if (!s || svc === c) return;
          svc = c;
          const sht = $('#sht');
          sht.style.setProperty('--sc', TONE[s.g]);
          const write = () => {
            $('#shc h3').textContent = s.name;
            $('#shc p').textContent = s.desc;
          };
          const writeF = () => {
            $('#fp').textContent = 'For ' + G.nf(s.w) + ' words, one image included';
            $('#fg').textContent = G.GROUPS[s.g][0];
            $('#fs').textContent = s.suits;
            const v = $('#fv');
            v.dataset.p = 'from:' + c;
            v._v = undefined;
            G.paint(false, v.parentNode);
          };
          const writeE = () => {
            const e = $('#she');
            $('small', e).textContent = 'Example copy: ' + s.name;
            $('h4', e).textContent = s.exT;
            const p = $$('p', e);
            p[0].textContent = s.exA;
            p[1].textContent = s.exB;
          };
          const mass = () => {
            const m = $('#shm span');
            m.dataset.p = 'from:' + c;
            m._v = undefined;
            G.paint(false, m.parentNode);
          };
          if (instant || RM) {
            write();
            writeF();
            writeE();
            mass();
            $('#shn span').textContent = s.n;
            $('#shs span').textContent = c;
            $('#shl span').textContent = s.name;
          } else {
            G.fade($('#shc'), write);
            G.fade($('#shf'), writeF);
            G.fade($('#she'), writeE);
            G.roll($('#shn'), s.n);
            G.roll($('#shs'), c);
            G.roll($('#shl'), s.name);
            setTimeout(mass, 200);
          }
          $$('.rw').forEach((r) => r.classList.toggle('cur-s', r.dataset.c === c));
        }
        $('#ob').onclick = () => G.go(CAT[svc].slug + 'php');

        const he = $('#he');
        const hx = $('.hx');
        const hfs = $$('.hf');
        const fl = $('#fl');
        const flm = $('.mt', fl);
        const flb = $('b', fl);
        const fll = $('.lb', fl);
        const sht = $('#sht');
        const svp = $('#svp');
        const svs = $('#svs');
        const grp = $('#grp');
        const hop = $('#hop');
        const gs = $('#gs');
        const cue = $('#cue');
        const holds = $$('[data-hold]');
        let holdK = -1;
        const gcs = [$('.g1'), $('.g2'), $('.g3')];
        const hcs = $$('.hc');
        const hops = $$('.ho-o');
        const sps = $$('[data-sp]');
        const ORDER = ['Bl', 'Wc', 'Ca', 'Ar'];
        let VH = innerHeight;
        let VW = innerWidth;
        let U = VW / 1920;
        let mob = false;
        let pins = { sv: false, gr: false, ho: false };
        let svTop = 0;
        let svLen = 0;
        let grTop = 0;
        let grLen = 0;
        let hoTop = 0;
        let hoLen = 0;
        let docEnd = 0;
        let hcO = [];
        let over = null;
        let lastI = 0;
        let jump = false;
        let mx0 = -1e4;
        let my0 = -1e4;
        let leanX = els.map(() => 0);
        let leanY = els.map(() => 0);
        let dirty = true;
        let wasOn = false;
        let cbg = '';
        const SEEDS = els.map((_, i) => [
          ((i % 4) - 1.5) * 70 + (((i * 37) % 23) - 11) * 3,
          -120 - ((i * 53) % 80),
        ]);
        const top = (el) => el.getBoundingClientRect().top + scrollY;
        function measure() {
          VH = innerHeight;
          VW = innerWidth;
          U = VW / 1920;
          mob = VW < 900;
          const fits = (n) => !RM && !mob && VH >= n * U + 90;
          pins.sv = fits(634);
          pins.gr = fits(576);
          pins.ho = fits(448);
          svp.classList.toggle('np', !pins.sv);
          grp.classList.toggle('np', !pins.gr);
          hop.classList.toggle('np', !pins.ho);
          svp.style.height = pins.sv ? VH + VH * 1.5 + 'px' : '';
          grp.style.height = pins.gr ? VH + VH * 0.9 + 'px' : '';
          hop.style.height = pins.ho ? VH + VH * 1.2 + 'px' : '';
          gcs.forEach((g) => {
            g.style.height = '';
          });
          hcs.forEach((c) => {
            c.style.transform = '';
            c.style.zIndex = '';
            c.style.opacity = '';
          });
          hops.forEach((o) => {
            o.style.opacity = '';
            o.style.transform = '';
          });
          if (pins.sv) {
            const inner = $('.hd', svs).offsetHeight + $('.sh', svs).offsetHeight + 56 * U;
            const free = (VH - 60 - inner) / 2;
            gs.style.marginTop = 56 * U - free + 'px';
          } else gs.style.marginTop = '';
          svTop = top(svp);
          svLen = svp.offsetHeight - VH;
          grTop = top(grp);
          grLen = grp.offsetHeight - VH;
          hoTop = top(hop);
          hoLen = hop.offsetHeight - VH;
          hcO = hcs.map((c) => c.offsetLeft);
          docEnd = top($('#fo'));
          dirty = true;
        }
        const go = (el, off) =>
          G.scrollToY(typeof el === 'number' ? el : top(el) - (off === undefined ? 60 : off));
        addEventListener(
          'wheel',
          () => {
            jump = false;
          },
          { passive: true }
        );
        addEventListener('keydown', () => {
          jump = false;
        });
        $$('.rw').forEach((r) => {
          r.onclick = () => {
            const c = r.dataset.c;
            over = c;
            jump = true;
            lastI = 0;
            setSheet(c);
            if (pins.sv) go(svTop + 1, 0);
            else go(svs, mob ? 64 : 60);
          };
        });
        cue.onclick = () => {
          const y = scrollY;
          const st = [...$$('.sec'), $('#fo')].map(top).concat(svTop + svLen);
          if (y < svTop - 5) {
            go(svTop, 0);
            return;
          }
          const n = st.filter((v) => v > y + 40).sort((a, b) => a - b)[0];
          if (n !== undefined) go(n, 0);
        };
        addEventListener(
          'pointermove',
          (e) => {
            mx0 = e.clientX;
            my0 = e.clientY;
            dirty = true;
          },
          { passive: true }
        );
        addEventListener(
          'scroll',
          () => {
            dirty = true;
          },
          { passive: true }
        );
        function render(y) {
          document.documentElement.classList.toggle('end', y > docEnd - VH * 0.7);
          const p = mob ? 1 : clamp(y / VH);
          const e = eio(p);
          const heroOn = !mob && y < VH * 1.02;
          he.style.visibility = !mob && y > VH * 1.04 ? 'hidden' : '';
          if (heroOn) {
            hx.style.translate = '0 ' + -70 * U * e + 'px';
            hx.style.opacity = 1 - clamp(p * 2.1);
            hfs.forEach((f) => {
              f.style.opacity = f.classList.contains('in') ? 1 - clamp(p * 3) : '';
            });
            els.forEach((el, i) => {
              const s = SEEDS[i];
              let lx = 0;
              let ly = 0;
              if (!p && mx0 > -9e3) {
                const b = el.getBoundingClientRect();
                const cx = b.left + b.width / 2 - leanX[i];
                const cy = b.top + b.height / 2 - leanY[i];
                const dx = mx0 - cx;
                const dy = my0 - cy;
                const dd = Math.hypot(dx, dy);
                const f = clamp(1 - dd / (520 * U));
                lx = (dx / (dd || 1)) * f * f * 10;
                ly = (dy / (dd || 1)) * f * f * 10;
              }
              leanX[i] = mixv(leanX[i], lx, 0.14);
              leanY[i] = mixv(leanY[i], ly, 0.14);
              if (Math.abs(leanX[i] - lx) > 0.05 || Math.abs(leanY[i] - ly) > 0.05) dirty = true;
              const k = eo(clamp(p * 1.25));
              el.style.translate =
                leanX[i] + s[0] * U * k + 'px ' + (leanY[i] + s[1] * U * k * 1.6) + 'px';
              if (el.dataset.s !== 'Bl') el.style.opacity = 1 - clamp(p * 1.7);
            });
            const on = p > 0.002 && p < 1 && pins.sv;
            elBy.Bl.style.visibility = on ? 'hidden' : '';
            if (pins.sv) {
              sht.style.visibility = p < 1 ? 'hidden' : '';
              if (on) {
                const b = gd.getBoundingClientRect();
                const sx = b.left + elBy.Bl.offsetLeft;
                const sy = b.top + elBy.Bl.offsetTop;
                const sw = 178 * U;
                const sh = 156 * U;
                const t = sht.getBoundingClientRect();
                fl.style.display = 'flex';
                fl.style.left = mixv(sx, t.left, e) + 'px';
                fl.style.top = mixv(sy, t.top, e) + 'px';
                fl.style.width = mixv(sw, t.width, e) + 'px';
                fl.style.height = mixv(sh, t.height, e) + 'px';
                fl.style.padding = mixv(16, 32, e) * U + 'px';
                flm.style.fontSize = mixv(14, 13, e) * U + 'px';
                flm.lastElementChild.style.fontSize = mixv(12, 17, e) * U + 'px';
                flb.style.fontSize = mixv(50, Math.max(176, 90 / U), e) * U + 'px';
                fll.style.fontSize = mixv(13, 17, e) * U + 'px';
                fll.style.marginTop = mixv(8, 16, e) * U + 'px';
                fl.style.boxShadow = '0 ' + 30 * Math.sin(p * 3.14) + 'px 60px -30px #0007';
              } else fl.style.display = 'none';
            }
          } else {
            fl.style.display = 'none';
            sht.style.visibility = '';
          }
          if (pins.sv) {
            const q = clamp((y - svTop) / svLen);
            if (y < svTop - 1) {
              if (!jump) {
                over = null;
                if (svc !== 'Bl') setSheet('Bl', p < 1);
                lastI = 0;
              }
            } else if (!jump) {
              const f = q * 4;
              const i =
                f > lastI + 1.08 || f < lastI - 0.08
                  ? Math.min(3, Math.max(0, Math.floor(f)))
                  : lastI;
              if (i !== lastI) {
                lastI = i;
                over = null;
                setSheet(ORDER[i]);
              } else if (!over) setSheet(ORDER[i]);
            }
          }
          const hold = !pins.sv || y >= svTop - VH * 0.06;
          const hk = hold ? 1 : y < svTop - VH * 0.2 ? 0 : -1;
          if (hk !== -1 && hk !== holdK) {
            holdK = hk;
            holds.forEach((h) => h.classList.toggle('in', !!hk));
          }
          if (pins.gr) {
            const q = eo(clamp((y - grTop) / (grLen * 0.85)));
            [432, 504, 576].forEach((h, i) => {
              const k = clamp(q * 1.5 - i * 0.25);
              gcs[i].style.height = mixv(330, h, k) * U + 'px';
            });
          }
          if (pins.ho) {
            const q = clamp((y - hoTop) / (hoLen * 0.9));
            hcs.forEach((c, i) => {
              const k = i ? eio(clamp((q - (i - 1) * 0.28) / 0.4)) : 1;
              const dx = (hcO[0] - hcO[i]) * (1 - k);
              const rot = i ? (i % 2 ? -2.5 : 2.5) * (1 - k) : 0;
              c.style.zIndex = 10 - i;
              c.style.transform = i ? 'translateX(' + dx + 'px) rotate(' + rot + 'deg)' : '';
              c.style.opacity = i ? clamp(k * 2.2) : '';
            });
            hops.forEach((o, i) => {
              const k = eo(clamp((q - i * 0.28 - 0.3) / 0.14));
              o.style.opacity = k;
              o.style.transform = 'scale(' + (0.3 + 0.7 * k) + ')';
            });
          }
          if (!mob)
            sps.forEach((el) => {
              const b = el.parentElement.getBoundingClientRect();
              const m = b.top + b.height / 2 - VH / 2;
              el.style.transform = 'translateY(' + m * +el.dataset.sp + 'px)';
            });
          const lab = y >= hoTop - VH / 2 && y < hoTop + hoLen + VH / 2 ? '#FFFFFF' : '#EDE8FD';
          if (lab !== cbg) {
            cbg = lab;
            cue.style.setProperty('--cb', lab);
          }
        }
        G.hooks.push((y, on) => {
          if (wasOn && !on) jump = false;
          wasOn = on;
          if (on) dirty = true;
          if (dirty) {
            dirty = false;
            render(y);
          }
        });
        G.onCur(() => drawMix(false));
        G.measures.push(measure);
        he.classList.add('on');
        G.page({
          closing: 1,
          ready() {
            setSheet('Bl', true);
            drawMix(false);
            measure();
            setTimeout(
              () =>
                hfs.forEach((f) => {
                  f.style.transition = 'none';
                }),
              2600
            );
            if (RM) $$('.rl').forEach((r) => r.classList.remove('o'));
          },
        });
        window.gclHome = { state: () => ({ y: scrollY, svc, over, lastI, pins, sel: [...sel] }) };
      })();