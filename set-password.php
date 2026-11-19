<?php include 'includes/header.php'; ?>
  <section class="au" aria-label="Forgot your password?">
    <div class="au-art bg-v">
      <img src="assets/img/auth-forgot-password.jpg" width="960" height="1080" alt="Crumpled drafts beside a clean sheet of paper">
    </div>
    <div class="au-f">
      <div class="au-b">
        <form id="s3" class="au-st" novalidate="">
          <div class="au-c">
            <h2 class="h2">Set a new <br>password </h2>
          </div>
          <div class="fst">
            <div class="fd">
              <span class="fvv">
                <label for="f-new-password">New password</label>
                <input type="password" id="f-new-password" data-v="pass" autocomplete="new-password" placeholder="••••••••">
              </span>
              <button type="button" class="eye" aria-label="Show password" aria-pressed="false">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M1.697 10.268a.84.84 0 010-.532C2.853 6.258 6.134 3.75 10 3.75c3.866 0 7.145 2.506 8.303 5.982a.84.84 0 010 .532C17.148 13.742 13.867 16.25 10 16.25c-3.865 0-7.145-2.506-8.303-5.982z" stroke="#16151A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                  <circle cx="10" cy="10" r="2.5" stroke="#16151A" stroke-width="1.25"></circle>
                </svg>
              </button>
            </div>
            <div class="fd">
              <span class="fvv">
                <label for="f-repeat-it">Repeat it</label>
                <input type="password" id="f-repeat-it" data-v="same" autocomplete="new-password" placeholder="••••••••">
              </span>
              <button type="button" class="eye" aria-label="Show password" aria-pressed="false">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M1.697 10.268a.84.84 0 010-.532C2.853 6.258 6.134 3.75 10 3.75c3.866 0 7.145 2.506 8.303 5.982a.84.84 0 010 .532C17.148 13.742 13.867 16.25 10 16.25c-3.865 0-7.145-2.506-8.303-5.982z" stroke="#16151A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                  <circle cx="10" cy="10" r="2.5" stroke="#16151A" stroke-width="1.25"></circle>
                </svg>
              </button>
            </div>
          </div>
          <div class="au-a">
            <button type="submit" class="b b-v b-w">Save password <svg class="pen" aria-hidden="true">
                <path></path>
              </svg>
            </button>
            <a class="tx" href="log-in.html">Back to log in</a>
          </div>
        </form>
      </div>
    </div>
  </section>
    

<?php include 'includes/footer.php'; ?>