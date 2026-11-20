            <footer class="fo wrap dk" id="fo">
                <div class="fc2">
                    <h2>
                    <span class="mk in" data-r="">
                        <span>Start with</span>
                    </span>
                    <span class="mk in" data-r="" style="--d:.12">
                        <span>one element.</span>
                    </span>
                    </h2>
                    <a class="b b-v in" href="services.php" data-r="" style="--d:.4">Order content <svg class="pen" aria-hidden="true" viewBox="0 0 171 80">
                        <path d="M8.39 44.57C4.92 9.31 102.04 -3.92 157.53 13.71c17.34 8.82 10.41 52.90 -38.15 59.51C67.35 79.84 8.39 71.02 4.92 40.16 3.15 22.53 36.14 4.90 81.22 4.90" style="--l: 477px;"></path>
                    </svg>
                    </a>
                </div>
                <div class="fcs in" data-r="">
                    <div class="fb">
                    <a class="lgo" href="index.php" aria-label="Gulf Creative Lab, home">
                        <span class="lgm">
                        <i>1</i>
                        <b>Gc</b>
                        </span>
                        <span class="wm">Gulf Creative Lab</span>
                    </a>
                    <p>Content writing, ordered online. <br>From brief to final draft. </p>
                    </div>
                    <div class="fl2">
                    <div>
                        <h2>Services</h2>
                        <a href="services.php#creative-writing">Creative writing</a>
                        <a href="services.php#advertising">Advertising</a>
                        <a href="services.php#social-media">Social media</a>
                        <a href="services.php#corporate-content">Corporate content</a>
                    </div>
                    <div>
                        <h2>Company</h2>
                        <a href="about.php">About us</a>
                        <a href="join-us.php">Join us</a>
                        <a href="contact.php">Contact</a>
                    </div>
                    <div>
                        <h2>Account</h2>
                        <a href="log-in.php">Log in</a>
                        <a href="cart.php">Cart</a>
                    </div>
                    <div>
                        <h2>Legal</h2>
                        <a href="terms.php">Terms</a>
                        <a href="privacy.php">Privacy</a>
                        <button type="button" data-ck="">Cookie settings</button>
                    </div>
                    </div>
                </div>
                <div class="fh"></div>
                <div class="fbt in" data-r="">
                    <span>© 2026 Gulf Creative Lab</span>
                    <span class="pm">
                    <span>We accept</span>
                    <span class="pl" role="img" aria-label="Visa">
                        <svg width="38" height="12" viewBox="0 8.1 24 7.8" aria-hidden="true">
                        <path fill="#1A1F71" d="M9.112 8.262L5.97 15.758H3.92L2.374 9.775c-.094-.368-.175-.503-.461-.658C1.447 8.864.677 8.627 0 8.479l.046-.217h3.3a.904.904 0 01.894.764l.817 4.338 2.018-5.102zm8.033 5.049c.008-1.979-2.736-2.088-2.717-2.972.006-.269.262-.555.822-.628a3.66 3.66 0 011.913.336l.34-1.59a5.207 5.207 0 00-1.814-.333c-1.917 0-3.266 1.02-3.278 2.479-.012 1.079.963 1.68 1.698 2.04.756.367 1.01.603 1.006.931-.005.504-.602.725-1.16.734-.975.015-1.54-.263-1.992-.473l-.351 1.642c.453.208 1.289.39 2.156.398 2.037 0 3.37-1.006 3.377-2.564m5.061 2.447H24l-1.565-7.496h-1.656a.883.883 0 00-.826.55l-2.909 6.946h2.036l.405-1.12h2.488zm-2.163-2.656l1.02-2.815.588 2.815zm-8.16-4.84l-1.603 7.496H8.34l1.605-7.496z"></path>
                        </svg>
                    </span>
                    <span class="pl" role="img" aria-label="Mastercard">
                        <svg width="30" height="19" viewBox="0 0 482.51 298.2" aria-hidden="true">
                        <path fill="#ff5f00" d="M169.81 31.89h143.72v234.42H169.81z"></path>
                        <path d="M184.31 149.1a149.5 149.5 0 0 1 56.74-117.21 149.1 149.1 0 1 0 0 234.42 149.5 149.5 0 0 1-56.74-117.21z" fill="#eb001b"></path>
                        <path d="M482.52 149.1a148.95 148.95 0 0 1-241 117.21 149.43 149.43 0 0 0 0-234.42 148.95 148.95 0 0 1 241 117.21z" fill="#f79e1b"></path>
                        </svg>
                    </span>
                    </span>
                </div>
            </footer>
            </main>
        </div>
        <script src="uiframe/js/jquery.min.js"></script>
        <script src="uiframe/js/bootstrap.bundle.min.js"></script>
        <script src="uiframe/js/popper.min.js"></script>
        <script src="uiframe/js/slick.js"></script>
        <script src="uiframe/js/owl.carousel.js"></script>
        <script src="uiframe/js/swiper-bundle.min.js"></script>
        <script src="uiframe/js/flickity.pkgd.min.js"></script>   
        <script src="uiframe/js/aos.js"></script>
        <script src="assets/js/catalogue.js"></script>
        <script src="assets/js/home.js"></script>
        <script src="assets/js/home-main.js"></script>
        <script>
            $(document).ready(function () {
                $("#mnx").click(function () {
                    $(this).toggleClass("is-active");
                    $("#mn").toggleClass("v");
                    $("html").toggleClass("lock");
                });
            });
            document.addEventListener('DOMContentLoaded', function () {
                const currencyID = document.querySelector('#currencyID');
                const curMain = document.querySelector('.cur');

                if (currencyID) {
                    currencyID.addEventListener('click', function () {
                        this.classList.toggle('active');
                        curMain.classList.toggle('open');
                    });
                }
            });
        </script>
        <script>
            window.addEventListener('scroll', function() {
                var content = document.querySelector('header');
                const htmlCls = document.querySelector('html')
                var scrollPosition = window.scrollY;
                if (scrollPosition > 10) {
                    content.classList.add("header-scroll", "solid")
                    htmlCls.classList.add("scr", "cmp")
                } else {
                    content.classList.remove("header-scroll", "solid")
                    htmlCls.classList.remove("scr", "cmp")
                }
            });
        </script>
        <script>
        AOS.init();
        </script>
        
         <script>
        (function () {
            GCL.page({ white: 1 });
        })();
        </script>

   </body>
    </html>