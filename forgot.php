<?php include 'includes/header.php'; ?>
      <section class="au" aria-label="Forgot your password?">
        <div class="au-art bg-v">
          <img src="assets/img/auth-forgot-password.jpg" width="960" height="1080" alt="Crumpled drafts beside a clean sheet of paper">
        </div>
        <div class="au-f">
          <div class="au-b">
            <form id="s1" class="au-st" novalidate="">
              <div class="au-c">
                <h1 class="h2 mk in" data-r="" style="--d: 0.1"><span>Forgot your password?</span></h1>
                <p class="br in" data-r="" style="--d: 0.30000000000000004">
                  Enter the email on your account and we send you a link to set a new&nbsp;password.
                </p>
              </div>
              <div class="fst in" data-r="" style="--d: 0.4">
                <div class="fd">
                  <span class="fvv"><label for="f-email">Email</label><input type="email" id="f-email" data-v="email" autocomplete="email" placeholder="john@example.com"></span>
                </div>
              </div>
              <div class="au-a in" data-r="" style="--d: 0.5">
                <button type="submit" class="b b-v b-w">Send the link<svg class="pen" aria-hidden="true" viewBox="0 0 499 80"><path d="M24.48 44.57C14.36 9.31 297.75 -3.92 459.69 13.71c50.61 8.82 30.36 52.90 -111.33 59.51C196.54 79.84 24.48 71.02 14.36 40.16 9.18 22.53 105.45 4.90 237.03 4.90" style="--l: 1202px;"></path></svg></button><a class="tx" href="log-in.php">Back to log in</a>
              </div>
            </form>
            <form id="s2" class="au-st" novalidate="" hidden="">
              <div class="au-c">
                <h2 class="h2">Check your email</h2>
                <p class="br">
                  We sent a link to <span id="em">john@example.com</span>. Click it to set a
                  new&nbsp;password.
                </p>
              </div>
              <div class="au-a">
                <div class="au-r">
                  <button type="button" class="tx" data-nb="Link sent again">Send it again</button><a class="tx" href="log-in.php">Back to log in</a>
                </div>
              </div>
            </form>
            <form id="s3" class="au-st" novalidate="" hidden="">
              <div class="au-c">
                <h2 class="h2">Set a new<br>password</h2>
              </div>
              <div class="fst">
                <div class="fd">
                  <span class="fvv"><label for="f-new-password">New password</label><input type="password" id="f-new-password" data-v="pass" autocomplete="new-password" placeholder="••••••••"></span><button type="button" class="eye" aria-label="Show password" aria-pressed="false">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                      <path d="M1.697 10.268a.84.84 0 010-.532C2.853 6.258 6.134 3.75 10 3.75c3.866 0 7.145 2.506 8.303 5.982a.84.84 0 010 .532C17.148 13.742 13.867 16.25 10 16.25c-3.865 0-7.145-2.506-8.303-5.982z" stroke="#16151A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                      <circle cx="10" cy="10" r="2.5" stroke="#16151A" stroke-width="1.25"></circle>
                    </svg>
                  </button>
                </div>
                <div class="fd">
                  <span class="fvv"><label for="f-repeat-it">Repeat it</label><input type="password" id="f-repeat-it" data-v="same" autocomplete="new-password" placeholder="••••••••"></span><button type="button" class="eye" aria-label="Show password" aria-pressed="false">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                      <path d="M1.697 10.268a.84.84 0 010-.532C2.853 6.258 6.134 3.75 10 3.75c3.866 0 7.145 2.506 8.303 5.982a.84.84 0 010 .532C17.148 13.742 13.867 16.25 10 16.25c-3.865 0-7.145-2.506-8.303-5.982z" stroke="#16151A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                      <circle cx="10" cy="10" r="2.5" stroke="#16151A" stroke-width="1.25"></circle>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="au-a">
                <button type="submit" class="b b-v b-w">Save password<svg class="pen" aria-hidden="true"><path></path></svg></button><a class="tx" href="log-in.php">Back to log in</a>
              </div>
            </form>
          </div>
        </div>
      </section>
    

<?php include 'includes/footer.php'; ?>