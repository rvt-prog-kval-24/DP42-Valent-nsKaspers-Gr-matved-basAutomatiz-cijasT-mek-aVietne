<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
      - primary meta tags
    -->
    <title>EuroCipari</title>
    <meta name="EuroCipari" content="Business System">

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">

    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!--
      - preload images
    -->
    <link rel="preload" as="image" href="./assets/images/hero-bg.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-slide-1.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-slide-2.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-slide-3.jpg">

</head>

<body>

<!--
  - #HEADER
-->

<header class="header" data-header>
    <div class="container">

        <a href="#" class="logo">
            <img src="./assets/images/logo-light.svg" width="74" height="24" alt="" class="logo-light">

            <img src="./assets/images/logo-dark.svg" width="74" height="24" alt="" class="logo-dark">
        </a>

        <nav class="navbar" data-navbar>

            <div class="navbar-top">
                <a href="#" class="logo">
                    <img src="./assets/images/logo-light.svg" width="74" height="24" alt="">
                </a>

            </div>

            <ul class="navbar-list">

                <li>
                    <a href="#" class="navbar-link">Home</a>
                </li>

                <li>
                    <a href="#" class="navbar-link">About</a>
                </li>

                <li>
                    <a href="#" class="navbar-link">Blog</a>
                </li>

                <li>
                    <a href="#" class="navbar-link">Contacts</a>
                </li>

                <li>
                    <a href="#" class="navbar-link">Questions</a>
                </li>

                <li>
                    <a href="#" class="navbar-link">Bills and payment</a>
                </li>

            </ul>

        </nav>

        <a href="http://localhost:8000/login" class="btn btn-primary">Admin panel</a>

        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        </button>

        <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
</header>





<main>
    <article>

        <!--
          - #HERO
        -->

        <section class="section hero has-bg-image" aria-label="home"
                 style="background-image: url('./assets/images/hero-bg.jpg')">
            <div class="container">

                <div class="hero-content">

                    <h1 class="h1 hero-title">Crafting project specific solutions with expertise.</h1>

                    <p class="hero-text">
                        We’re a creative company that focuses on establishing long-term relationships with customers.
                    </p>

                    <div class="btn-wrapper">

                        <a href="#" class="btn btn-primary">Explore Now</a>

                        <a href="#" class="btn btn-outline">Contact Us</a>

                    </div>

                </div>

                <div class="hero-slider" data-slider>

                    <div class="slider-inner">
                        <ul class="slider-container" data-slider-container>

                            <li class="slider-item">

                                <figure class="img-holder" style="--width: 575; --height: 550;">
                                    <img src="./assets/images/hero-slide-1.jpg" width="575" height="550" alt="" class="img-cover">
                                </figure>

                            </li>

                            <li class="slider-item">

                                <div class="hero-card">
                                    <figure class="img-holder" style="--width: 575; --height: 550;">
                                        <img src="./assets/images/hero-slide-2.jpg" width="575" height="550" alt="hero banner"
                                             class="img-cover">
                                    </figure>
                                </div>

                            </li>

                            <li class="slider-item">

                                <figure class="img-holder" style="--width: 575; --height: 550;">
                                    <img src="./assets/images/hero-slide-3.jpg" width="575" height="550" alt="" class="img-cover">
                                </figure>

                            </li>

                        </ul>
                    </div>

                    <button class="slider-btn prev" aria-label="slide to previous" data-slider-prev>
                    </button>

                    <button class="slider-btn next" aria-label="slide to next" data-slider-next>
                    </button>

                </div>

            </div>
        </section>

        @yield('content')

    </article>
</main>





<!--
  - #FOOTER
-->

<footer class="footer">
    <div class="container grid-list">

        <div class="footer-brand">

            <a href="#" class="logo">
                <img src="./assets/images/logo-light.svg" width="74" height="24" alt="Adex home">
            </a>

            <p class="footer-text">
                &copy; 2022 codewithsadee. <br> All rights reserved.
            </p>

            <ul class="social-list">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-dribbble"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                </li>

            </ul>

        </div>

        <ul class="footer-list">

            <li>
                <p class="h4 footer-list-title">Get in Touch</p>
            </li>

            <li>
                <address class="footer-text">
                    Moonshine St. 14/05 Light City, London, United Kingdom
                </address>
            </li>

            <li>
                <a href="mailto:info@email.com" class="footer-link">info@email.com</a>
            </li>

            <li>
                <a href="tel:001234567890" class="footer-link">00 (123) 456 78 90</a>
            </li>

        </ul>

        <ul class="footer-list">

            <li>
                <p class="h4 footer-list-title">Learn More</p>
            </li>

            <li>
                <a href="#" class="footer-link">About Us</a>
            </li>

            <li>
                <a href="#" class="footer-link">Our Story</a>
            </li>

            <li>
                <a href="#" class="footer-link">Projects</a>
            </li>

            <li>
                <a href="#" class="footer-link">Terms of Use</a>
            </li>

            <li>
                <a href="#" class="footer-link">Privacy Policy</a>
            </li>

        </ul>

        <div class="footer-list">

            <p class="h4 footer-list-title">Our Newsletter</p>

            <p class="footer-text">
                Subscribe to our newsletter to get our news & deals delivered to you.
            </p>

            <form action="" class="input-wrapper">
                <input type="email" name="email_address" placeholder="Email Address" required class="input-field">

                <button type="submit" class="submit-btn">Join</button>
            </form>

        </div>

    </div>
</footer>


<script src="./assets/js/script.js"></script>


</body>

</html>
