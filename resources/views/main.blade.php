@extends('layout')

@section('content')





    <!--
          - #SERVICE
        -->

    <section class="section service" aria-labelledby="service-label">
        <div class="container">

            <p class="section-subtitle" id="service-label">WHAT ARE WE DOING ?</p>

            <h2 class="h2 section-title">
                Our service is specifically designed to meet your needs.
            </h2>

            <ul class="grid-list">

                <li>
                    <div class="service-card">

                        <div class="card-icon">
                            <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
                        </div>

                        <h3 class="h4 card-title">24/7 support</h3>

                        <p class="card-text">
                            We are always ready to help you. Our team of specialists works around the clock to provide you with the best service.
                        </p>

                    </div>
                </li>

                <li>
                    <div class="service-card">

                        <div class="card-icon">
                            <ion-icon name="shield-checkmark-outline" aria-hidden="true"></ion-icon>
                        </div>

                        <h3 class="h4 card-title">Secure Payments</h3>

                        <p class="card-text">
                            We guarantee the security of your payments. Our system provides reliable protection of your financial data.
                        </p>

                    </div>
                </li>

                <li>
                    <div class="service-card">

                        <div class="card-icon">
                            <ion-icon name="cloud-download-outline" aria-hidden="true"></ion-icon>
                        </div>

                        <h3 class="h4 card-title">Daily Updates</h3>

                        <p class="card-text">
                            We are constantly working to improve our service. You will always be aware of the latest news and updates.
                        </p>

                    </div>
                </li>

                <li>
                    <div class="service-card">

                        <div class="card-icon">
                            <ion-icon name="pie-chart-outline" aria-hidden="true"></ion-icon>
                        </div>

                        <h3 class="h4 card-title">Market Research</h3>

                        <p class="card-text">
                            We conduct thorough market research to offer you the most effective and relevant solutions.
                        </p>

                    </div>
                </li>

            </ul>

        </div>
    </section>





    <!--
      - #ABOUT
    -->

    <section class="about" aria-labelledby="about-label">
        <div class="container">

            <figure class="about-banner">
                <img src="{{ asset('assets/images/about-banner.png') }}" width="800" height="580" loading="lazy" alt="about banner"
                     class="w-100">
            </figure>

            <div class="about-content">

                <p class="section-subtitle" id="about-label">WHY CHOOSE US ?</p>

                <h2 class="h2 section-title">
                    We offer solutions that make our customers' lives easier.
                </h2>

                <ul>

                    <li class="about-item">
                        <div class="accordion-card" data-accordion>

                            <h3 class="card-title">
                                <button class="accordion-btn" data-accordion-btn>
                                    <ion-icon name="chevron-down-outline" aria-hidden="true" class="down"></ion-icon>

                                    <spna class="span h5">Efficiency</spna>
                                </button>
                            </h3>

                            <p class="accordion-content">
                                Our payment system automates all your payments, saving you time and effort.
                            </p>

                        </div>
                    </li>

                    <li class="about-item">
                        <div class="accordion-card" data-accordion>

                            <h3 class="card-title">
                                <button class="accordion-btn" data-accordion-btn>
                                    <ion-icon name="chevron-down-outline" aria-hidden="true" class="down"></ion-icon>

                                    <spna class="span h5">Integration</spna>
                                </button>
                            </h3>

                            <p class="accordion-content">
                                Our payment system integrates easily with other systems to ensure your business runs smoothly and efficiently.
                            </p>

                        </div>
                    </li>

                </ul>

            </div>

        </div>
    </section>





    <!--
      - #FEATURE
    -->

    <section class="section feature" aria-labelledby="feature-label">
        <div class="container">

            <figure class="feature-banner">
                <img src="{{ asset('assets/images/feature-banner.png') }}" width="800" height="531" loading="lazy" alt="feature banner"
                     class="w-100">
            </figure>

            <div class="feature-content">

                <p class="section-subtitle" id="feautre-label">Our Solutions</p>

                <h2 class="h2 section-title">
                    We make your business process flawless so that you can control everything perfectly.
                </h2>

                <p class="section-text">
                    Your business processes become more efficient with our system:
                </p>

                <ul class="feature-list">

                    <li>
                        <div class="feature-card">

                            <div class="card-icon">
                                <ion-icon name="checkmark" aria-hidden="true"></ion-icon>
                            </div>

                            <span class="span">
                    Provides seamless integration with your current operations.
                  </span>

                        </div>
                    </li>

                    <li>
                        <div class="feature-card">

                            <div class="card-icon">
                                <ion-icon name="checkmark" aria-hidden="true"></ion-icon>
                            </div>

                            <span class="span">
                    Allows you to easily track and manage your business processes.
                  </span>

                        </div>
                    </li>

                    <li>
                        <div class="feature-card">

                            <div class="card-icon">
                                <ion-icon name="checkmark" aria-hidden="true"></ion-icon>
                            </div>

                            <span class="span">
                    Offers an intuitive interface that makes it easy to use.
                  </span>

                        </div>
                    </li>

                    <li>
                        <div class="feature-card">

                            <div class="card-icon">
                                <ion-icon name="checkmark" aria-hidden="true"></ion-icon>
                            </div>

                            <span class="span">
                    Provides a reliable and secure environment for your data.
                  </span>

                        </div>
                    </li>

                </ul>

            </div>

        </div>
    </section>





    <!--
      - #STATS
    -->

    <section class="stats" aria-label="our stats">
        <div class="container">

            <ul class="stats-card has-bg-image" style="background-image: url({{ asset('assets/images/stats-bg.jpg') }}">

                <li>
                    <p class="card-text">
                        <span class="h1">{{$paymentsQuantity}}</span>

                        <spna class="span">Processed Payments</spna>
                    </p>
                </li>

                <li>
                    <p class="card-text">
                        <span class="h1">{{$companiesQuantity}}</span>

                        <spna class="span">companies chose us</spna>
                    </p>
                </li>

            </ul>

        </div>
    </section>





    <!--
      - #PROJECT
    -->

    <section class="section project" aria-labelledby="project-label">
        <div class="container">
            <ul class="grid-list">
                    @foreach($posts as $post)
                        <li>
                            <div class="project-card">

                                <figure class="card-banner img-holder" style="--width: 560; --height: 350;">
                                    <img src="{{ $post->getImageFullUrl() }}" width="560" height="350" loading="lazy" alt="Ultricies fusce porta elit" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <h3 class="h3">
                                        <a href="{{ route('blog.show', $post) }}" class="card-title">{{ $post->title }}</a>
                                    </h3>

                                    <p class="card-text">{{ Str::limit(strip_tags($post->text), 500) }}</p>

                                    <ul class="card-meta-list">

                                        <li class="card-meta-item">
                                            <ion-icon name="calendar-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>

                                            <time class="meta-text" datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
                                        </li>

                                    </ul>

                                    <ul class="card-meta-list">


                                    </ul>

                                </div>

                            </div>
                        </li>
                    @endforeach
             </ul>

        </div>
    </section>



@endsection
