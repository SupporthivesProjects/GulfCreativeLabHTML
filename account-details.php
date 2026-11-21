<?php include 'includes/header.php'; ?>


    <section class="ih ac-h wrap bg-y" aria-label="Details">
        <div class="ac-hc">
            <h1 class="h1 mk in acc_d_h1" data-r="" style="--d: 0.1"><span>Details</span></h1>
            <p class="bl in" data-r="" style="--d: 0.35">
            The name on your invoices, how we reach you, and your password.
            </p>
        </div>
        <nav class="acn in" aria-label="Account" data-r="" style="--d: 0.5">
            <a class="act" href="account-pieces.php"><b>Or</b><span>Orders</span></a><a class="act" href="account-invoices.php"><b>In</b><span>Invoices</span></a><a class="act on" aria-current="page" href="account-details.php"><b>De</b><span>Details</span></a><a class="act" href="index.php" data-out=""><b>Lo</b><span>Log out</span></a>
        </nav>
    </section>
    <section class="ac wrap" aria-label="Details">
        <div class="ac-d">
            <form class="ac-b in" id="f1" novalidate="" data-r="" style="--d: 0.1">
            <h2 class="h4">Your details</h2>
            <div class="fst acc_d_fst">
                <div class="frow">
                <div class="fd fw">
                    <span class="fvv"><label for="f-full-name">Full name</label><input type="text" id="f-full-name" data-v="name" autocomplete="name" placeholder="John Smith"></span>
                </div>
                <div class="fd fw">
                    <span class="fvv"><label for="f-email">Email</label><input type="email" id="f-email" data-v="email" autocomplete="email" placeholder="john@example.com"></span>
                </div>
                </div>
                <div class="frow">
                <div class="fd fw">
                    <span class="fvv"><label for="f-phone">Phone</label><input type="tel" id="f-phone" data-v="phone" autocomplete="tel" placeholder="+971 50 123 4567"></span>
                </div>
                <div class="fd fw">
                    <span class="fvv"><label for="f-date-of-birth">Date of birth</label><input type="text" id="f-date-of-birth" data-v="dob" autocomplete="bday" placeholder="14 March 1988"></span>
                </div>
                </div>
                <div class="frow">
                <div class="fd fw">
                    <span class="fvv"><label for="f-address">Address</label><input type="text" id="f-address" data-v="req" autocomplete="street-address" placeholder="Office 1204, Al Saqr Business Tower"></span>
                </div>
                <div class="fd fw dd">
                    <span class="fvv"><label id="f-country-lab">Country</label><select class="dd-n" id="f-country" data-v="req" autocomplete="country-name" data-dd="1" tabindex="-1" aria-hidden="true">
                        <option value="" selected="" hidden="">United Arab Emirates</option>
                        <option>United Arab Emirates</option>
                        <option>Bahrain</option>
                        <option>Saudi Arabia</option>
                        <option>Qatar</option>
                        <option>Kuwait</option>
                        <option>Oman</option>
                    </select><button type="button" class="dd-b" aria-haspopup="listbox" aria-expanded="false" aria-controls="f-country-dd" aria-labelledby="f-country-lab f-country-dd-v"><span id="f-country-dd-v">United Arab Emirates</span></button></span><svg class="chev" width="12" height="7" viewBox="0 0 12 7" fill="none" aria-hidden="true">
                    <path d="M1 1l5 5 5-5" stroke="#16151A" stroke-width="1.5"></path>
                    </svg>
                <ul class="dd-l" id="f-country-dd" role="listbox" tabindex="-1"><li role="option" id="f-country-dd-0" data-i="0" aria-selected="true">United Arab Emirates</li><li role="option" id="f-country-dd-1" data-i="1" aria-selected="false">Bahrain</li><li role="option" id="f-country-dd-2" data-i="2" aria-selected="false">Saudi Arabia</li><li role="option" id="f-country-dd-3" data-i="3" aria-selected="false">Qatar</li><li role="option" id="f-country-dd-4" data-i="4" aria-selected="false">Kuwait</li><li role="option" id="f-country-dd-5" data-i="5" aria-selected="false">Oman</li></ul></div>
                </div>
                <div class="frow">
                <div class="fd fw">
                    <span class="fvv"><label for="f-city">City</label><input type="text" id="f-city" data-v="req" autocomplete="address-level2" placeholder="Dubai"></span>
                </div>
                <div class="fd fw">
                    <span class="fvv"><label for="f-postcode">Postcode</label><input type="text" id="f-postcode" data-v="req" autocomplete="postal-code" placeholder="PO Box 50211"></span>
                </div>
                </div>
            </div>
            <button type="button" class="b acc_de_btn b-v" data-bs-toggle="modal" data-bs-target="#exampleModal">Save details<svg class="pen" aria-hidden="true" viewBox="0 0 156 80"><path d="M7.65 44.57C4.49 9.31 93.08 -3.92 143.71 13.71c15.82 8.82 9.49 52.90 -34.81 59.51C61.44 79.84 7.65 71.02 4.49 40.16 2.87 22.53 32.97 4.90 74.10 4.90" style="--l: 446px;"></path></svg></button>
            </form>
            <form class="ac-b in" id="f2" novalidate="" data-r="" style="--d: 0.2">
            <h2 class="h4">Password</h2>
            <div class="fst acc_d_fst">
                <div class="fd fw">
                <span class="fvv"><label for="f-current-password">Current password</label><input type="password" id="f-current-password" data-v="req" autocomplete="current-password" placeholder="••••••••"></span><button type="button" class="eye" aria-label="Show password" aria-pressed="false">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M1.697 10.268a.84.84 0 010-.532C2.853 6.258 6.134 3.75 10 3.75c3.866 0 7.145 2.506 8.303 5.982a.84.84 0 010 .532C17.148 13.742 13.867 16.25 10 16.25c-3.865 0-7.145-2.506-8.303-5.982z" stroke="#16151A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                    <circle cx="10" cy="10" r="2.5" stroke="#16151A" stroke-width="1.25"></circle>
                    </svg>
                </button>
                </div>
                <div class="fd fw">
                <span class="fvv"><label for="f-new-password">New password</label><input type="password" id="f-new-password" data-v="pass" autocomplete="new-password" placeholder="••••••••"></span><button type="button" class="eye" aria-label="Show password" aria-pressed="false">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M1.697 10.268a.84.84 0 010-.532C2.853 6.258 6.134 3.75 10 3.75c3.866 0 7.145 2.506 8.303 5.982a.84.84 0 010 .532C17.148 13.742 13.867 16.25 10 16.25c-3.865 0-7.145-2.506-8.303-5.982z" stroke="#16151A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                    <circle cx="10" cy="10" r="2.5" stroke="#16151A" stroke-width="1.25"></circle>
                    </svg>
                </button>
                </div>
                <div class="fd fw">
                <span class="fvv"><label for="f-repeat-it">Repeat it</label><input type="password" id="f-repeat-it" data-v="same" autocomplete="new-password" placeholder="••••••••"></span><button type="button" class="eye" aria-label="Show password" aria-pressed="false">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M1.697 10.268a.84.84 0 010-.532C2.853 6.258 6.134 3.75 10 3.75c3.866 0 7.145 2.506 8.303 5.982a.84.84 0 010 .532C17.148 13.742 13.867 16.25 10 16.25c-3.865 0-7.145-2.506-8.303-5.982z" stroke="#16151A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                    <circle cx="10" cy="10" r="2.5" stroke="#16151A" stroke-width="1.25"></circle>
                    </svg>
                </button>
                </div>
            </div>
            <button type="submit" class="b acc_de_btn b-v">Change password<svg class="pen" aria-hidden="true" viewBox="0 0 204 80"><path d="M10.01 44.57C5.87 9.31 121.73 -3.92 187.93 13.71c20.69 8.82 12.41 52.90 -45.52 59.51C80.35 79.84 10.01 71.02 5.87 40.16 3.75 22.53 43.11 4.90 96.90 4.90" style="--l: 547px;"></path></svg></button>
            </form>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content acc_d_modal">
                <div class="acc_d_modal_div">De</div>
                <div class="acc_d_modal_main">
                    <h1 class="acc_d_modal_head">Details saved</h1>
                    <p class="acc_d_modal_p">Your next invoice uses the new details.</p>
                </div>
                <button type="button" class="b acc_de_btn b-v w-100">Done<svg class="pen" aria-hidden="true" viewBox="0 0 156 80"><path d="M7.65 44.57C4.49 9.31 93.08 -3.92 143.71 13.71c15.82 8.82 9.49 52.90 -34.81 59.51C61.44 79.84 7.65 71.02 4.49 40.16 2.87 22.53 32.97 4.90 74.10 4.90" style="--l: 446px;"></path></svg></button>
            </div>
        </div>
    </div>


<?php include 'includes/footer.php'; ?>