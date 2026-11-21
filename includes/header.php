<?php
  $currentPage = basename($_SERVER['PHP_SELF']);
?>
<!doctype php>
<php lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulf Creative Lab</title>
    <link rel="icon" href="./assets/logos/mark-amber.svg" type="image/svg+xml">
    <link rel="stylesheet" href="./assets/devcss/mainBase.css">
  </head>
  <body>
  <div class="main-div">
    <header class="nv">
        <a class="lgo" href="index.php" aria-label="Gulf Creative Lab, home">
          <span class="lgm">
            <i>1</i>
            <b>Gc</b>
          </span>
          <span class="wm">Gulf Creative Lab</span>
        </a>
        <nav class="nvl" aria-label="Main">
          <a class="n nd on" href="services.php">
            <i>13</i>
            <b>Sv</b>
            <span>Services</span>
          </a>
          <a class="n nd" href="about.php">
            <i>14</i>
            <b>Ab</b>
            <span>About us</span>
          </a>
          <a class="n nd" href="join-us.php">
            <i>15</i>
            <b>Jn</b>
            <span>Join us</span>
          </a>
          <a class="n nd" href="contact.php">
            <i>16</i>
            <b>Ct</b>
            <span>Contact</span>
          </a>
          <div class="n nd cur">
            <button type="button" class="cb" id="currencyID" aria-haspopup="listbox" aria-expanded="false" aria-label="Currency">
              <i>17 <svg width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true">
                  <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
              </i>
              <b id="cs">Bd</b>
              <span id="cv">BHD</span>
            </button>
            <ul class="cl" role="listbox" aria-label="Currency">
              <li role="option" tabindex="0" data-c="AED" aria-selected="false">
                <i>17</i>
                <b>Dh</b>
                <span>AED</span>
              </li>
              <li role="option" tabindex="0" data-c="BHD" class="on" aria-selected="true">
                <i>17</i>
                <b>Bd</b>
                <span>BHD</span>
              </li>
              <li role="option" tabindex="0" data-c="USD" aria-selected="false">
                <i>17</i>
                <b>Us</b>
                <span>USD</span>
              </li>
            </ul>
          </div>
          <a class="n nd" href="log-in.php">
            <i>18</i>
            <b>Lg</b>
            <span>Log in</span>
          </a>
          <a class="n n-c" href="cart.php" id="cart" aria-label="Cart">
            <i>19 <em id="cc">3</em>
            </i>
            <b>Cr</b>
            <span>Cart</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M3 4H5.2L7.5 15H17.7L19.7 7H6.6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              <circle cx="9" cy="19.5" r="1.5" fill="currentColor"></circle>
              <circle cx="16.5" cy="19.5" r="1.5" fill="currentColor"></circle>
            </svg>
          </a>
          <button type="button" class="n nm" id="mnb" aria-label="Open menu" aria-expanded="false">
            <u></u>
            <u></u>
            <u></u>
          </button>
        </nav>
      </header>
      <div class="mn" id="mn" role="dialog" aria-modal="true" aria-label="Menu">
        <div class="mn-t">
          <a class="lgo" href="index.php" aria-label="Gulf Creative Lab, home">
            <span class="lgm">
              <i>1</i>
              <b>Gc</b>
            </span>
          </a>
          <div class="mn-tt">
            <a class="n n-c" href="cart.php" aria-label="Cart">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M3 4H5.2L7.5 15H17.7L19.7 7H6.6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <circle cx="9" cy="19.5" r="1.5" fill="currentColor"></circle>
                <circle cx="16.5" cy="19.5" r="1.5" fill="currentColor"></circle>
              </svg>
              <em>3</em>
            </a>
            <button type="button" class="n mn-x" id="mnx" aria-label="Close menu">
              <u></u>
              <u></u>
            </button>
          </div>
        </div>
        <div class="mn-l">
          <a href="services.php" style="--i:0">
            <span class="mn-s">Sv</span>
            <b>Services</b>
            <i>13</i>
          </a>
          <a href="about.php" style="--i:1">
            <span class="mn-s">Ab</span>
            <b>About us</b>
            <i>14</i>
          </a>
          <a href="join-us.php" style="--i:2">
            <span class="mn-s">Jn</span>
            <b>Join us</b>
            <i>15</i>
          </a>
          <a href="contact.php" style="--i:3">
            <span class="mn-s">Ct</span>
            <b>Contact</b>
            <i>16</i>
          </a>
        </div>
        <div class="mn-b">
          <div class="mn-c">
            <span>Currency</span>
            <div>
              <button type="button" data-c="AED" class="on">AED</button>
              <button type="button" data-c="BHD">BHD</button>
              <button type="button" data-c="USD">USD</button>
            </div>
          </div>
          <div class="mn-a">
            <a class="b b-2" href="account-pieces.php">Account <svg class="pen" aria-hidden="true">
                <path></path>
              </svg>
            </a>
            <a class="b b-v" href="index.php" data-out="">Log out <svg class="pen" aria-hidden="true">
                <path></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <button type="button" class="cue" id="cue" aria-label="Scroll down">
        <span class="cue-t">
          <svg width="14" height="20" viewBox="0 0 14 20" fill="none" aria-hidden="true">
            <path d="M7 1v17M1 12l6 6 6-6" stroke="currentColor" stroke-width="1.5" />
          </svg>
          </span>
        <span class="cue-l">Scroll</span>
      </button>
      <div class="fl" id="fl" aria-hidden="true">
        <span class="mt"><i>01</i><i data-p="from:Bl" data-pre="From "></i></span><b>Bl</b
        ><span class="lb">Blog writing</span>
      </div>
      <main class="page">


  


  
  