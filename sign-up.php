<?php include 'includes/header.php'; ?>

      <section class="au" aria-label="Create an account">
        <div class="au-art bg-p">
          <img src="assets/img/auth-sign-up.jpg" width="960" height="1080" alt="An open notebook on a desk">
        </div>
        <div class="au-f">
          <div class="au-b">
            <form id="frm" class="au-st" novalidate="">
              <div class="au-c">
                <h1 class="h2 mk in" data-r="" style="--d: 0.1"><span>Create an account</span></h1>
              </div>
              <div class="fst in" data-r="" style="--d: 0.4">
                <div class="fd">
                  <span class="fvv"><label for="f-full-name">Full name</label><input type="text" id="f-full-name" data-v="name" autocomplete="name" placeholder="John Smith"></span>
                </div>
                <div class="fd">
                  <span class="fvv"><label for="f-email">Email</label><input type="email" id="f-email" data-v="email" autocomplete="email" placeholder="john@example.com"></span>
                </div>
                <div class="fd">
                  <span class="fvv"><label for="f-password">Password</label><input type="password" id="f-password" data-v="pass" autocomplete="new-password" placeholder="••••••••"></span><button type="button" class="eye" aria-label="Show password" aria-pressed="false">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                      <path d="M1.697 10.268a.84.84 0 010-.532C2.853 6.258 6.134 3.75 10 3.75c3.866 0 7.145 2.506 8.303 5.982a.84.84 0 010 .532C17.148 13.742 13.867 16.25 10 16.25c-3.865 0-7.145-2.506-8.303-5.982z" stroke="#16151A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                      <circle cx="10" cy="10" r="2.5" stroke="#16151A" stroke-width="1.25"></circle>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="bf-sub in" data-r="" style="--d: 0.45">
                <span class="cs" role="checkbox" aria-checked="false" tabindex="0" data-need=""><i></i><span>I agree to the <a href="terms.php">Terms</a> and the
                    <a href="privacy.php">Privacy policy</a>.</span></span><span class="cs rc" role="checkbox" aria-checked="false" tabindex="0" data-need=""><i></i>I’m not a robot</span>
              </div>
              <div class="au-a in" data-r="" style="--d: 0.5">
                <button type="submit" class="b b-v b-w">Create account<svg class="pen" aria-hidden="true" viewBox="0 0 499 80"><path d="M24.48 44.57C14.36 9.31 297.75 -3.92 459.69 13.71c50.61 8.82 30.36 52.90 -111.33 59.51C196.54 79.84 24.48 71.02 14.36 40.16 9.18 22.53 105.45 4.90 237.03 4.90" style="--l: 1202px;"></path></svg></button>
                <p>Already have an account? <a class="tx" href="log-in.php">Log in</a></p>
              </div>
            </form>
          </div>
        </div>
      </section>

<?php include 'includes/footer.php'; ?>