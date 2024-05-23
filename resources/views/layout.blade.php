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
    <meta name="title" content="EuroCipari">
    <meta name="description" content="This is a business agency html template made by codewithsadee">

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">

    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--
      - preload images
    -->
    <link rel="preload" as="image" href="{{ asset('assets/images/hero-bg.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('assets/images/hero-slide-1.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('assets/images/hero-slide-2.jpg') }}">

</head>

<body>

<!--
  - #HEADER
-->

<header class="header" data-header>
    <div class="container">

        <a href="{{ route( 'main' ) }}" class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" width="74" height="24" alt="EuroCipari" class="logo-light">
        </a>

        <nav class="navbar" data-navbar>

            <div class="navbar-top">
                <a href="#" class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" width="74" height="24" alt="Adex home">
                </a>

                <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>
            </div>

            <ul class="navbar-list">



                <li>
                    <a href="{{ route('contacts.index') }}" class="navbar-link">Questions</a>
                </li>

            </ul>


        </nav>

        <a href="{{ route('companies.login') }}" class="btn btn-primary">Companies panel</a>

        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
            <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
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
                 style="background-image: url({{ asset('assets/images/hero-bg.jpg') }}">
            <div class="container">

                <div class="hero-content">

                    <h1 class="h1 hero-title">Tailored solutions with professionalism.</h1>

                    <p class="hero-text">
                        We are a creative company that values long-term relationships with clients.
                    </p>

                </div>

                <div class="hero-slider" data-slider>

                    <div class="slider-inner">
                        <ul class="slider-container" data-slider-container>

                            <li class="slider-item">

                                <figure class="img-holder" style="--width: 575; --height: 550;">
                                    <img src="{{ asset('assets/images/hero-slide-1.jpg') }}" width="575" height="550" alt="" class="img-cover">
                                </figure>

                            </li>

                            <li class="slider-item">

                                <div class="hero-card">
                                    <figure class="img-holder" style="--width: 575; --height: 550;">
                                        <img src="{{ asset('assets/images/hero-slide-2.jpg') }}" width="575" height="550" alt="hero banner"
                                             class="img-cover">
                                    </figure>

                                </div>

                            </li>

                        </ul>
                    </div>

                    <button class="slider-btn prev" aria-label="slide to previous" data-slider-prev>
                        <ion-icon name="arrow-back"></ion-icon>
                    </button>

                    <button class="slider-btn next" aria-label="slide to next" data-slider-next>
                        <ion-icon name="arrow-forward"></ion-icon>
                    </button>

                </div>

            </div>
        </section>




        @yield('content')


        <!--
          - #CTA
        -->

        <section class="cta" aria-label="call to action">
            <div class="container">

                <h2 class="h2 section-title">
                    Using our services and grow your business.
                </h2>

            </div>
        </section>

    </article>
</main>





<!--
  - #FOOTER
-->

<footer class="footer">
    <div class="container grid-list">

        <div class="footer-brand">


            <p class="footer-text">
                &copy; 2023 EuroCipari. <br> All rights reserved.
            </p>

        </div>

    </div>
</footer>





<!--
  - custom js link
-->
<script src="{{ asset('assets/js/script.js') }}"></script>

<!--
  - ionicon
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
