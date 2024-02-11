<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Устанавливает кодировку документа на UTF-8 (Unicode). -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- Определяет метаданные для масштабирования и отображения на мобильных устройствах. -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Устанавливает совместимость с браузером Internet Explorer. -->
    <title>@yield('title')</title> <!-- Устанавливает заголовок страницы, значение будет вставлено вместо '@yield('title')'. -->

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) <!-- Вставляет скрипты (возможно, используется как шаблонизатор, подставляющий пути к скриптам). -->

</head>
<body class="bg-dark"> <!-- Устанавливает класс 'bg-dark' для всего тела документа, устанавливая темный фон. -->

<div class="container py-3"> <!-- Создает контейнер с отступами сверху и снизу. Сontainer-fluid (na ves ekran) -->
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-light text-decoration-none">
                <!-- <img src="{{ asset('/images/preview.png') }}" width="50" height="50" alt=""> -->
                <!-- Создает ссылку с логотипом или текстом 'EuroCipari' и устанавливает стили. -->
                <span class="fs-4">EuroCipari</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto"> <!-- Создает навигационное меню. -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('about')}}">About</a> <!-- Создает ссылку "About". -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('services')}}">Services</a> <!-- Создает ссылку "Services". -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('blog.index')}}">Blog</a> <!-- Создает ссылку "Blog". -->
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('contacts.index')}}">Questions</a>
                <a class="me-3 py-2 text-light text-decoration-none" href="{{route('login')}}">Log In</a> <!-- Создает ссылку "Log In". -->
            </nav>
        </div>
    </header>

    <div class="container text-light">@yield("main_content")</div> <!-- Создает контейнер для основного контента. Значение '@yield("main_content")' будет вставлено здесь. -->
</div>

<!-- <footer class="fixed-bottom d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
    <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 lh-1 text-light">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="mb-3 mb-md-0 text-light">© 2023 Company "EuroCipari", Inc - All Rights Reserved</span>
    </div>

    <div class="bg-transparent text-center text-white">
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <a
                    class="btn text-white btn-floating m-1"
                    href="https://www.facebook.com/V.a.l.i.k.63?locale=ru_RU"
                    role="button"
                >
                    <img src="{{ asset('/images/facebook.png') }}" alt="" />
                </a>

                <a
                    class="btn text-white btn-floating m-1"
                    href="https://www.instagram.com/v.a.l.i.k_63/"
                    role="button"
                >
                    <img src="{{ asset('/images/instagram.png') }}" alt="" />
                </a>

                <a
                    class="btn text-white btn-floating m-1"
                    href="https://www.linkedin.com/in/valentin-kasper-7a9939286/"
                    role="button"
                >
                    <img src="{{ asset('/images/linkedin.png') }}" alt="" />
                </a>
            </section>
        </div>
    </div>


</footer>
-->

</body>
</html>
