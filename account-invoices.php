<?php include 'includes/header.php'; ?>

  <section class="ih ac-h wrap bg-y" aria-label="Invoices">
    <div class="ac-hc">
      <h1 class="h1 mk in acc_d_h1" data-r="" style="--d: 0.1">
        <span>Invoices</span>
      </h1>
      <p class="bl in" data-r="" style="--d: 0.35">One invoice per order, as a PDF.</p>
    </div>
    <nav class="acn in" aria-label="Account" data-r="" style="--d: 0.5">
      <a class="act" href="account-pieces.php">
        <b>Or</b>
        <span>Orders</span>
      </a>
      <a class="act on" aria-current="page" href="account-invoices.php">
        <b>In</b>
        <span>Invoices</span>
      </a>
      <a class="act" href="account-details.php">
        <b>De</b>
        <span>Details</span>
      </a>
      <a class="act" href="index.php" data-out="">
        <b>Lo</b>
        <span>Log out</span>
      </a>
    </nav>
  </section>
  <section class="ac wrap" aria-label="Invoices">
    <div class="ac-ih in" data-r="">
      <span>Invoice</span>
      <span>Date</span>
      <span>Pieces</span>
      <span>Total</span>
      <span></span>
    </div>
    <div id="list" class="acc_in_list">
      <article class="ac-i in" data-r="" style="--d:0.10">
        <h2 class="ls">GCL-0412</h2>
        <p class="br">
          <span>28 October 2026</span>
          <span class="mo">, 3 pieces</span>
        </p>
        <p class="br de">3 pieces</p>
        <p class="ls">AED 661.52</p>
        <button type="button" class="b b-v acc_in_btn" data-nb="File not attached in this build">
          <span>Download PDF</span>
          <svg class="pen" aria-hidden="true" viewBox="0 0 253 105"><path d="M12.41 58.50C7.28 12.21 150.96 -5.14 233.07 18.00c25.66 11.57 15.39 69.43 -56.45 78.11C99.65 104.79 12.41 93.21 7.28 52.71 4.65 29.57 53.46 6.43 120.18 6.43" style="--l: 686px;"></path></svg>
        </button>
      </article>
      <article class="ac-i in" data-r="" style="--d:0.18">
        <h2 class="ls">GCL-0389</h2>
        <p class="br">
          <span>2 October 2026</span>
          <span class="mo">, 1 piece</span>
        </p>
        <p class="br de">1 piece</p>
        <p class="ls">AED 154.25</p>
        <button type="button" class="b b-v acc_in_btn " data-nb="File not attached in this build">
          <span>Download PDF</span>
          <svg class="pen" aria-hidden="true" viewBox="0 0 253 105"><path d="M12.41 58.50C7.28 12.21 150.96 -5.14 233.07 18.00c25.66 11.57 15.39 69.43 -56.45 78.11C99.65 104.79 12.41 93.21 7.28 52.71 4.65 29.57 53.46 6.43 120.18 6.43" style="--l: 686px;"></path></svg>
        </button>
      </article>
      <article class="ac-i in" data-r="" style="--d:0.26">
        <h2 class="ls">GCL-0351</h2>
        <p class="br">
          <span>9 September 2026</span>
          <span class="mo">, 1 piece</span>
        </p>
        <p class="br de">1 piece</p>
        <p class="ls">AED 440.70</p>
        <button type="button" class="b b-v acc_in_btn" data-nb="File not attached in this build">
          <span>Download PDF</span>
          <svg class="pen" aria-hidden="true" viewBox="0 0 253 105"><path d="M12.41 58.50C7.28 12.21 150.96 -5.14 233.07 18.00c25.66 11.57 15.39 69.43 -56.45 78.11C99.65 104.79 12.41 93.21 7.28 52.71 4.65 29.57 53.46 6.43 120.18 6.43" style="--l: 686px;"></path></svg>
        </button>
      </article>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>