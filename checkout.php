<?php include 'includes/header.php'; ?>


        <section class="ih ct-h wrap bg-v dif_flex_style dif_paddingt" aria-label="Checkout">
          <h1 class="h1 mk in w-100" data-r="" style="--d: 0.1;padding-bottom: 0px;"><span>Checkout</span></h1>
          <div id="dkc" aria-hidden="true" class="dek"
            style="width: max(calc(0*var(--dux,var(--du)) + 200*var(--du)),calc(96*var(--dux,var(--du)) + 200*var(--du)),calc(192*var(--dux,var(--du)) + 200*var(--du))); height: calc(236*var(--du));">
            <div class="dkc t-p" data-sym="Bl"
              style="--i:0;--x:calc(-30*var(--dux,var(--du)));--y:calc(30*var(--du));--r:8deg;--sx:calc(96*var(--dux,var(--du)));--sy:calc(10*var(--du));--hx:-22px;--hy:-6px;width:calc(200*var(--du));height:calc(176*var(--du));padding:calc(16*var(--du));z-index:1">
              <span class="tl-m" style="font-size:max(10px,calc(14*var(--du)))"><span>01</span></span>
              <div><b style="display:block;font-size:calc(50*var(--du))">Bl</b><span class="dl"
                  style="display:block;margin-top:calc(8*var(--du));font-size:max(11px,calc(13*var(--du)))">Blog
                  writing</span></div>
            </div>
            <div class="dkc t-y" data-sym="Pr"
              style="--i:1;--x:calc(96*var(--dux,var(--du)));--y:calc(0*var(--du));--r:-6deg;--sx:calc(96*var(--dux,var(--du)));--sy:calc(10*var(--du));--hx:0px;--hy:-6px;width:calc(200*var(--du));height:calc(176*var(--du));padding:calc(16*var(--du));z-index:2">
              <span class="tl-m" style="font-size:max(10px,calc(14*var(--du)))"><span>08</span></span>
              <div><b style="display:block;font-size:calc(50*var(--du))">Pr</b><span class="dl"
                  style="display:block;margin-top:calc(8*var(--du));font-size:max(11px,calc(13*var(--du)))">Press
                  releases</span></div>
            </div>
            <div class="dkc t-g" data-sym="Ca"
              style="--i:2;--x:calc(182*var(--dux,var(--du)));--y:calc(20*var(--du));--r:-1deg;--sx:calc(96*var(--dux,var(--du)));--sy:calc(10*var(--du));--hx:22px;--hy:-6px;width:calc(200*var(--du));height:calc(176*var(--du));padding:calc(16*var(--du));z-index:3">
              <span class="tl-m" style="font-size:max(10px,calc(14*var(--du)))"><span>05</span></span>
              <div><b style="display:block;font-size:calc(50*var(--du))">Ca</b><span class="dl"
                  style="display:block;margin-top:calc(8*var(--du));font-size:max(11px,calc(13*var(--du)))">Captions and
                  posts</span></div>
            </div>
          </div>
        </section>
        <section class="ck wrap" aria-label="Your details and order">
          <form class="ck-f dif_mobt_gap" id="frm" novalidate="">
            <h2 class="h3 mk in" data-r="" style="padding-bottom: 0px;"> <span>Your details</span></h2>
            <div class="fst">
              <div class="frow in" data-r="" style="--d: 0.1">
                <div class="fd">
                  <span class="fvv"><label for="f-full-name fontsize_bara">Full name</label><input class="input_t"
                      type="text" id="f-full-name" data-v="name" autocomplete="name" placeholder="John Smith"></span>
                </div>
                <div class="fd">
                  <span class="fvv"><label for="f-email fontsize_bara">Email</label><input class="input_t" type="email"
                      id="f-email" data-v="email" autocomplete="email" placeholder="john@example.com"></span>
                </div>
              </div>
              <div class="frow in" data-r="" style="--d: 0.16">
                <div class="fd">
                  <span class="fvv"><label for="f-phone fontsize_bara">Phone</label><input class="input_t" type="tel"
                      id="f-phone" data-v="phone" autocomplete="tel" placeholder="+971 50 123 4567"></span>
                </div>
                <div class="fd">
                  <span class="fvv"><label for="f-date-of-birth fontsize_bara">Date of birth</label><input
                      class="input_t" type="text" id="f-date-of-birth" data-v="dob" autocomplete="bday"
                      placeholder="14 March 1988"></span>
                </div>
              </div>
              <div data-r="" style="--d: 0.22" class="in">
                <div class="fd">
                  <span class="fvv"><label for="f-address fontsize_bara">Address</label><input class="input_t"
                      type="text" id="f-address" data-v="req" autocomplete="street-address"
                      placeholder="Office 1204, Al Saqr Business Tower"></span>
                </div>
              </div>
              <div class="frow in" data-r="" style="--d: 0.28">
                <div class="fd dd">
                  <span class="fvv"><label id="f-country-lab fontsize_bara">Country</label>

                    <div class="dropdown_t">
                      <button class="dropdown-btn_t" type="button">
                        <span class="dropdown-value_t">Select Country</span>

                        <svg class="dropdown-arrow_t" xmlns="http://www.w3.org/2000/svg" width="12" height="7"
                          viewBox="0 0 12 7" fill="none">
                          <path d="M1 1L6 6L11 1" stroke-width="1.5" stroke="#16151A" />
                        </svg>
                      </button>

                      <ul class="dropdown-menu_t">
                        <li>United Arab Emirates</li>
                        <li>Bahrain</li>
                        <li>Saudi Arabia</li>
                        <li>Qatar</li>
                        <li>Kuwait</li>
                        <li>Oman</li>
                      </ul>
                    </div>
                  </span>
                </div>
                <div class="fd">
                  <span class="fvv"><label for="f-city">City</label><input class="input_t" type="text" id="f-city"
                      data-v="req" autocomplete="address-level2" placeholder="Dubai"></span>
                </div>
              </div>
              <div data-r="" style="--d: 0.34" class="in">
                <div class="fd">
                  <span class="fvv"><label for="f-postcode">Postcode</label><input class="input_t" type="text"
                      id="f-postcode" data-v="req" autocomplete="postal-code" placeholder="PO Box 50211"></span>
                </div>
              </div>
            </div>
            <div class="bf-sub dif_mobt_gap diff_gapttts" data-r="" style="--d: 0.4">
              <span class="cs" role="checkbox" aria-checked="false" tabindex="0" data-need=""><i></i><span>I agree to
                  the <a href="terms.php" style="text-decoration: none;">Terms</a> and the
                  <a href="privacy.php" style="text-decoration: none;">Privacy policy</a>.</span></span><span
                class="cs rc" role="checkbox" aria-checked="false" tabindex="0" data-need=""><i></i>I’m not a
                robot</span>
            </div>
          </form>
          <aside class="ck-o dk in twentyfiur_gapt" data-r="" style="--d: 0.2" aria-label="Your order">
            <h2 class="h3">Your order</h2>
            <div id="lns">
              <div class="oll dif_colt" style="border-top: 0px;">
                <div>
                  <p class="btr seeventeen_pixeld">Blog writing</p>
                  <p class="bs fifteenpixel_t">1,200 words, Premium writer, Standard turnaround, 2 images</p>
                </div><span class="ll">AED 174.96</span>
              </div>
              <div class="oll dif_colt">
                <div>
                  <p class="btr seeventeen_pixeld">Press releases</p>
                  <p class="bs fifteenpixel_t">450 words, Standard writer, Express turnaround</p>
                </div><span class="ll">AED 266.26</span>
              </div>
              <div class="oll dif_colt">
                <div>
                  <p class="btr seeventeen_pixeld">Captions and posts</p>
                  <p class="bs fifteenpixel_t">120 words each, Standard writer, Standard turnaround, quantity 4</p>
                </div><span class="ll">AED 293.80</span>
              </div>
            </div>
            <div class="ck-dcr">
              <div class="fd fw">
                <span class="fvv"><label for="code fontsize_bara">Discount code</label><input class="input_t"
                    class="seeventeen_pixeld" type="text" id="code" autocomplete="off" placeholder="GCL10"></span>
              </div>
              <button type="button" class="b b-v" id="apl">Apply<svg class="pen" aria-hidden="true"
                  viewBox="0 0 106 80">
                  <path
                    d="M5.20 44.57C3.05 9.31 63.25 -3.92 97.65 13.71c10.75 8.82 6.45 52.90 -23.65 59.51C41.75 79.84 5.20 71.02 3.05 40.16 1.95 22.53 22.40 4.90 50.35 4.90"
                    style="--l: 344px;"></path>
                </svg></button>
            </div>
            <div class="ck-tots">
              <div class="ors fifteenpixel_t"><span>Subtotal</span><span id="sub">AED 735.02</span></div>
              <div id="sets"></div>
              <div class="ck-dsc" id="dsc" style="height: 36px;">
                <div class="ors fifteenpixel_t"><span id="dk">GCL10 applied</span><span id="dv">Minus AED 73.50</span>
                </div>
              </div>
            </div>
            <div class="stot dif_colt no_gapt">
              <span>Total today</span><strong class="pl48" id="tot" aria-live="polite">AED 661.52</strong>
            </div>
            <button type="button" class="b b-v b-w" id="pay">Continue to secure payment<svg class="pen"
                aria-hidden="true" viewBox="0 0 446 80">
                <path
                  d="M21.88 44.57C12.83 9.31 266.13 -3.92 410.87 13.71c45.23 8.82 27.14 52.90 -99.51 59.51C175.67 79.84 21.88 71.02 12.83 40.16 8.20 22.53 94.25 4.90 211.85 4.90"
                  style="--l: 1083px;"></path>
              </svg></button>
            <p class="bs fifteenpixel_t">
              You pay on our payment provider’s secure page. We never see your card details.
            </p>
            <div class="ck-prw">
              <a class="b b-2" href="cart.php">Back to cart<svg class="pen" aria-hidden="true" viewBox="0 0 156 80">
                  <path
                    d="M7.65 44.57C4.49 9.31 93.08 -3.92 143.71 13.71c15.82 8.82 9.49 52.90 -34.81 59.51C61.44 79.84 7.65 71.02 4.49 40.16 2.87 22.53 32.97 4.90 74.10 4.90"
                    style="--l: 446px;"></path>
                </svg></a><span class="pm"><span>We accept</span><span class="pl" role="img" aria-label="Visa"><svg
                    width="38" height="12" viewBox="0 8.1 24 7.8" aria-hidden="true">
                    <path fill="#1A1F71"
                      d="M9.112 8.262L5.97 15.758H3.92L2.374 9.775c-.094-.368-.175-.503-.461-.658C1.447 8.864.677 8.627 0 8.479l.046-.217h3.3a.904.904 0 01.894.764l.817 4.338 2.018-5.102zm8.033 5.049c.008-1.979-2.736-2.088-2.717-2.972.006-.269.262-.555.822-.628a3.66 3.66 0 011.913.336l.34-1.59a5.207 5.207 0 00-1.814-.333c-1.917 0-3.266 1.02-3.278 2.479-.012 1.079.963 1.68 1.698 2.04.756.367 1.01.603 1.006.931-.005.504-.602.725-1.16.734-.975.015-1.54-.263-1.992-.473l-.351 1.642c.453.208 1.289.39 2.156.398 2.037 0 3.37-1.006 3.377-2.564m5.061 2.447H24l-1.565-7.496h-1.656a.883.883 0 00-.826.55l-2.909 6.946h2.036l.405-1.12h2.488zm-2.163-2.656l1.02-2.815.588 2.815zm-8.16-4.84l-1.603 7.496H8.34l1.605-7.496z">
                    </path>
                  </svg></span><span class="pl" role="img" aria-label="Mastercard"><svg width="30" height="19"
                    viewBox="0 0 482.51 298.2" aria-hidden="true">
                    <path fill="#ff5f00" d="M169.81 31.89h143.72v234.42H169.81z"></path>
                    <path
                      d="M184.31 149.1a149.5 149.5 0 0 1 56.74-117.21 149.1 149.1 0 1 0 0 234.42 149.5 149.5 0 0 1-56.74-117.21z"
                      fill="#eb001b"></path>
                    <path
                      d="M482.52 149.1a148.95 148.95 0 0 1-241 117.21 149.43 149.43 0 0 0 0-234.42 148.95 148.95 0 0 1 241 117.21z"
                      fill="#f79e1b"></path>
                  </svg></span></span>
            </div>
          </aside>
        </section>

<?php include 'includes/footer.php'; ?>


  <script>
    document.querySelectorAll('.dropdown_t').forEach(dropdown => {
      const button = dropdown.querySelector('.dropdown-btn_t');
      const value = dropdown.querySelector('.dropdown-value_t');
      const menu = dropdown.querySelector('.dropdown-menu_t');

      button.addEventListener('click', () => {
        document.querySelectorAll('.dropdown_t').forEach(item => {
          if (item !== dropdown) {
            item.classList.remove('active_t');
          }
        });

        dropdown.classList.toggle('active_t');
      });

      menu.querySelectorAll('li').forEach(option => {
        option.addEventListener('click', () => {
          value.textContent = option.textContent;
          dropdown.classList.remove('active_t');
        });
      });

      document.addEventListener('click', e => {
        if (!dropdown.contains(e.target)) {
          dropdown.classList.remove('active_t');
        }
      });
    });
  </script>