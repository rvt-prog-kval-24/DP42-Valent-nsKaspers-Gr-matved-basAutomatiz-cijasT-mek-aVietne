@extends("layout")

@section('title')
    About
@endsection

@section("content")
    <!--
      - #ABOUT
    -->

    <section class="about" aria-labelledby="about-label">
        <div class="container">

            <figure class="about-banner">
                <img src="./assets/images/about-banner.png" width="800" height="580" loading="lazy" alt="about banner"
                     class="w-100">
            </figure>

            <div class="about-content">

                <p class="section-subtitle" id="about-label">Why Choose Us?</p>

                <h2 class="h2 section-title">
                    We bring solutions to make life easier for our clients.
                </h2>

                <ul>

                    <li class="about-item">
                        <div class="accordion-card expanded" data-accordion>

                            <h3 class="card-title">
                                <button class="accordion-btn" data-accordion-btn>
                                    <ion-icon name="chevron-down-outline" aria-hidden="true" class="down"></ion-icon>

                                    <spna class="span h5">Professional Design</spna>
                                </button>
                            </h3>

                            <p class="accordion-content">
                                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum
                                massa justo
                                sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo
                                cursus magna,
                                vel.
                            </p>

                        </div>
                    </li>

                    <li class="about-item">
                        <div class="accordion-card" data-accordion>

                            <h3 class="card-title">
                                <button class="accordion-btn" data-accordion-btn>
                                    <ion-icon name="chevron-down-outline" aria-hidden="true" class="down"></ion-icon>

                                    <spna class="span h5">Top-Notch Support</spna>
                                </button>
                            </h3>

                            <p class="accordion-content">
                                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum
                                massa justo
                                sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo
                                cursus magna,
                                vel.
                            </p>

                        </div>
                    </li>

                    <li class="about-item">
                        <div class="accordion-card" data-accordion>

                            <h3 class="card-title">
                                <button class="accordion-btn" data-accordion-btn>
                                    <ion-icon name="chevron-down-outline" aria-hidden="true" class="down"></ion-icon>

                                    <spna class="span h5">Exclusive Assets</spna>
                                </button>
                            </h3>

                            <p class="accordion-content">
                                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum
                                massa justo
                                sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo
                                cursus magna,
                                vel.
                            </p>

                        </div>
                    </li>

                </ul>

            </div>

        </div>
    </section>



    {{--
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-6">
                <h3 class="mb-4" style="text-shadow: 0 0 3px rgba(255, 255, 255, 1), 0 0 1px rgba(255, 255, 255, 1), 0 0 1px rgba(255, 255, 255, 1);">― EuroCipari ―</h3>
                <h1 class="display-4 mb-4"><strong style="font-weight: bold;">About Us</strong></h1>
                <p class="mb-4">

                    EuroCipari is an online accounting automation company that helps businesses and individuals save time and money.
                    We offer a wide range of services including web accounting software, bookkeeping services, tax consulting and financial analysis.
                    <br>
                    <br>
                    Our mission is to help our clients succeed by providing them with the tools
                    and resources they need to effectively manage their finances.
                    <br>
                    <br>
                    We believe that everyone should have access to high-quality accounting services,
                    regardless of their budget or experience level.
                    That's why we offer many affordable and flexible solutions.
                    <br>
                    <br>
                    If you are looking for a way to simplify your accounting
                    and streamline your business operations, EuroCipari is the perfect solution for you.
                    <br>
                    <br>
                    Contact us today on social media to learn more about our services or visit our services section.

                </p>
            </div>
        </div>
    </div>


    <div class="container-fluid p-0">
        <section class="map-section text-center">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item w-100" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCy9r70T3NYf3PhvVflTo0_zdif2_IoIYs&amp;q=place_id:ChIJn6wOs6lZwokRLKy1iqRcoKw" allowfullscreen=""></iframe>
            </div>
        </section>
    </div>
    --}}

@endsection
