<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-dark">

<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-light text-decoration-none">
                <span class="fs-4">EuroCipari</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto"> <!-- Создает навигационное меню. -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('admin.companies.index')}}">Companies</a> <!-- Создает ссылку "". -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('admin.users.index')}}">Administrators</a> <!-- Создает ссылку "". -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('admin.posts.index')}}">Posts</a> <!-- Создает ссылку "". -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('admin.questions.index')}}">Questions</a> <!-- Создает ссылку "". -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('admin.invoices.index')}}">Invoices</a> <!-- Создает ссылку "". -->
            </nav>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">

                <form action="{{ route('logout') }}" method="POST" class="me-3 py-2 text-light text-decoration-none">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>

                </form>
            </nav>
        </div>
    </header>

    @if (session()->has('success'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container text-light">@yield("main_content")</div>
</div>

<!--
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
    <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 lh-1 text-light">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="mb-3 mb-md-0 text-light">© 2023 Company "EuroCipari", Inc - All Rights Reserved</span>
    </div>
    <div class="bg-transparent text-center text-white">
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <a class="btn text-white btn-floating m-1" href="https://www.facebook.com/V.a.l.i.k.63?locale=ru_RU" role="button">
                    <img src="{{ asset('/images/facebook.png') }}" alt="" />
                </a>
                <a class="btn text-white btn-floating m-1" href="https://www.instagram.com/v.a.l.i.k_63/" role="button">
                    <img src="{{ asset('/images/instagram.png') }}" alt="" />
                </a>
                <a class="btn text-white btn-floating m-1" href="https://www.linkedin.com/in/valentin-kasper-7a9939286/" role="button">
                    <img src="{{ asset('/images/linkedin.png') }}" alt="" />
                </a>
            </section>
        </div>
    </div>
</footer>
-->
</body>
</html>
