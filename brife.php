<?php include 'includes/header.php'; ?>

      <section class="ih bf-h wrap" aria-label="Write your brief">
        <div class="ih-c">
          <h1 class="h1 mk in" data-r="" style="--d: 0.1"><span>Write your brief</span></h1>
          <p class="bl in" data-r="" style="--d: 0.35">
            Tell your writer what the piece has to do. The more they know, the closer the first
            draft.
          </p>
        </div>
        <div class="bf-tog in" id="tog" role="tablist" aria-label="Form length" data-r="" style="--d: 0.5">
          <i style="--x: 4px; --w: 145px;"></i><button type="button" role="tab" data-f="d" class="on" aria-selected="true">Detailed form</button><button type="button" role="tab" data-f="s" aria-selected="false" class="">Simple form</button>
        </div>
      </section>
      <section class="bf wrap" aria-label="Brief">
        <form class="bf-f" id="frm" novalidate="">
          <div class="bf-w in" id="st1" data-r="" style="--d: 0.2">
            <div class="bf-st bf-std">
              <div class="bf-sh">
                <span class="ts t-p">Se</span>
                <div>
                  <h2 class="h4">01  The details</h2>
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
                    <span class="fvv"><label for="wc">Word count</label><span class="bf-wv"><input id="wc" inputmode="numeric" autocomplete="off" style="width: 41px;"><span>words</span><span style="position: absolute; visibility: hidden; white-space: pre; font: 500 16px / 19.2px &quot;Schibsted Grotesk&quot;, sans-serif;">1,400</span></span></span>
                  </div>
                  <div class="bf-trk" id="trk" role="slider" tabindex="0" aria-label="Word count" aria-valuemin="20" aria-valuemax="10000" aria-valuenow="1400" style="--p: 13.827655310621243%;">
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
                    <span class="btr">Standard</span><span class="bc">Base price</span></button><button type="button" role="radio" class="bf-op" data-v="p" aria-checked="false">
                    <span class="btr">Premium</span><span class="bc">Adds 10%</span></button><button type="button" role="radio" class="bf-op" data-v="e" aria-checked="false">
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
                    <span class="btr">Standard</span><span class="bc">5 to 7 days, included</span></button><button type="button" role="radio" class="bf-op" data-v="1" aria-checked="false">
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
                  <h2 class="h4">02  The piece</h2>
                  <p class="bs mu">What you need written and what it is for.</p>
                </div>
              </div>
              <div class="fd">
                <span class="fvv"><label for="ttl">Working title</label><input type="text" id="ttl" placeholder="What a Gulf summer does to your coffee beans"></span>
              </div>
              <div class="fd">
                <span class="fvv"><label for="todo">What it has to do</label><textarea rows="1" id="todo" placeholder="Show cafe owners why summer storage matters, and bring them to our sample box." style="height: 22px;"></textarea>
                </span>
              </div>
            </div>
          </div>
          <div class="bf-w" id="vo" data-r="" style="--d: 0.32;">
            <div class="bf-st">
              <div class="bf-sh">
                <span class="ts t-g">Vo</span>
                <div>
                  <h2 class="h4">03  Voice and audience</h2>
                  <p class="bs mu">Who is reading and how it should sound.</p>
                </div>
              </div>
              <div class="frow">
                <div class="fd">
                  <span class="fvv"><label for="f-who-it-is-for">Who it is for</label><input type="text" id="f-who-it-is-for" placeholder="Independent cafe owners in the Gulf"></span>
                </div>
                <div class="fd">
                  <span class="fvv"><label for="f-sector">Sector</label><input type="text" id="f-sector" placeholder="Food and drink"></span>
                </div>
              </div>
              <div class="frow">
                <div class="fd dd">
                  <span class="fvv"><label id="f-preferred-voice-lab">Preferred voice</label><select class="ph dd-n" id="f-preferred-voice" data-dd="1" tabindex="-1" aria-hidden="true">
                      <option value="" selected="" hidden="">Warm and knowledgeable</option>
                      <option>Warm and knowledgeable</option>
                      <option>Plain and direct</option>
                      <option>Formal</option>
                      <option>Light and playful</option>
                    </select><button type="button" class="dd-b ph" aria-haspopup="listbox" aria-expanded="false" aria-controls="f-preferred-voice-dd" aria-labelledby="f-preferred-voice-lab f-preferred-voice-dd-v"><span id="f-preferred-voice-dd-v">Warm and knowledgeable</span></button></span><svg class="chev" width="12" height="7" viewBox="0 0 12 7" fill="none" aria-hidden="true">
                    <path d="M1 1l5 5 5-5" stroke="#16151A" stroke-width="1.5"></path>
                  </svg>
                <ul class="dd-l" id="f-preferred-voice-dd" role="listbox" tabindex="-1"><li role="option" id="f-preferred-voice-dd-0" data-i="0" aria-selected="false">Warm and knowledgeable</li><li role="option" id="f-preferred-voice-dd-1" data-i="1" aria-selected="false">Plain and direct</li><li role="option" id="f-preferred-voice-dd-2" data-i="2" aria-selected="false">Formal</li><li role="option" id="f-preferred-voice-dd-3" data-i="3" aria-selected="false">Light and playful</li></ul></div>
                <div class="fd">
                  <span class="fvv"><label for="f-words-to-use-or-avoid">Words to use or avoid</label><input type="text" id="f-words-to-use-or-avoid" placeholder="Say roastery. Avoid artisanal."></span>
                </div>
              </div>
              <div class="fd">
                <span class="fvv"><label for="f-writing-you-like">Writing you like</label><input type="url" id="f-writing-you-like" placeholder="https://www.example.com/journal"></span>
              </div>
            </div>
          </div>
          <div class="bf-w" data-r="" style="--d: 0.38">
            <div class="bf-st">
              <div class="bf-sh">
                <span class="ts t-y">Up</span>
                <div>
                  <h2 class="h4"><span id="n4" class="rl" data-rid="1"><span>04</span></span>  Documents</h2>
                  <p class="bs mu">
                    Attach anything you already have, so you don’t have to retype it.
                  </p>
                </div>
              </div>
              <label class="bf-up" id="up"><b>UPLOAD DOCUMENTS</b><span class="bs mu">Click to upload or drag and drop</span><input class="vh" type="file" multiple="" id="fi"></label>
              <ul class="bf-upl" id="upl" aria-live="polite"></ul>
              <div class="fd">
                <span class="fvv"><label for="f-anything-else">Anything else</label><input type="text" id="f-anything-else" placeholder="Please let us know here."></span>
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
            <div class="srow"><span id="k1" class="rl"><span>1,400 words at Standard</span></span><span id="v1" class="rl"><span>AED 459.06</span></span></div>
            <div class="srow"><span id="k2" class="rl"><span>Standard, 5 to 7 days</span></span><span id="v2" class="rl"><span>Included</span></span></div>
            <div class="srow"><span id="k3" class="rl"><span>1 image, included</span></span><span id="v3" class="rl"><span>Included</span></span></div>
            <div class="srow"><span>Quantity</span><span id="v4" class="rl"><span>1</span></span></div>
          </div>
          <div class="stot">
            <span>Your price</span><strong class="pl48" id="tot" aria-live="polite">AED 459.06</strong>
          </div>
          <div class="bf-sub" id="sub">
            <span class="cs" role="checkbox" aria-checked="false" tabindex="0" data-need=""><i></i><span>I agree to the <a href="terms.html">Terms</a> and the
                <a href="privacy.html">Privacy policy</a>.</span></span><span class="cs rc" role="checkbox" aria-checked="false" tabindex="0" data-need=""><i></i>I’m not a robot</span>
          </div>
          <button type="button" class="b b-v b-w" id="add">Add to cart<svg class="pen" aria-hidden="true" viewBox="0 0 331 80"><path d="M16.24 44.57C9.52 9.31 197.51 -3.92 304.93 13.71c33.57 8.82 20.14 52.90 -73.85 59.51C130.37 79.84 16.24 71.02 9.52 40.16 6.09 22.53 69.95 4.90 157.23 4.90" style="--l: 825px;"></path></svg></button>
        </aside>
      </section>
      <div class="bf-bar mo" id="bar" aria-hidden="true">
        <div><small id="bn">Website policies</small><span id="bs">1,400 words at Standard</span></div>
        <strong id="bt">AED 459.06</strong>
      </div>


<?php include 'includes/footer.php'; ?>