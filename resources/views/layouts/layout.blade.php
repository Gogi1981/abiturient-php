<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}" />
    <!-- SEO теги для поисковых страниц -->
    <meta name="description" content="Каталог сотрудников УО ВГАВМ" />
    <meta name="keywords" itemprop="keywords" content="Каталог сотрудников УО ВГАВМ" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-auto"><a class="navbar-brand" href="/"><img src="{{ asset('img/logo-vsavm-2017-new3-3.png') }}"
                                                                        alt="" class="logo img-fluid"></a></div>
            <div class="col-4 align-self-center d-none d-xl-block">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/slaid-v-shapke-1-1.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/slaid-v-shapke-2-1.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/slaid-v-shapke-3-1.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container">
        <!-- <a class="navbar-brand" href="#">УО ВГАВМ</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.create') }}">Сщздать пост<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('search.index') }}">Информация о зачисленных<span class="sr-only">(current)</span></a>
                </li>
             </ul>
            <form class="form-inline my-2 my-lg-0" action="{{ route('post.index') }}">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Найти ..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироватся') }}</a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>
<main class="main">
    <div class="container">
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
            @endforeach
        @endif
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
            @if(session('search'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    {{ session('search') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @yield('content')
    </div>
</main>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-sm-12">
                <h3>Контакты</h3>
                <p>Приемная ректора +375 212 53 80 71</p>

                <p>Приемная комиссия +375 212 53 80 61,<br>
                    Канцелярия +375 212 51-75-56,<br>
                    Факс +375 212 51 68 38,<br>
                    Диагностика и лечение болезней животных:<br>
                    +375 (212) 53-80-94 терапия,<br>
                    +375 (212) 53-80-78 хирургия,<br>
                    +375 (212) 51-70-32 акушерство,<br>
                    +375 (212) 28-75-90 болезни мелких животных</p>

                <a href="mailto:vsavm@vsavm.by">vsavm@vsavm.by</a><br>
                <a href="https://vsavm.by/">https://vsavm.by/</a>

                <address>ул. 1-я Доватора 7/11<br>
                    г. Витебск, Республика Беларусь210026</address>
            </div>
            <div class="col">
                <h3>Сертификат соответствия</h3>
                <img src="{{ asset('img/sertifikat-1-0001-eng-214x300.jpg') }}" class="img-fluid rounded mx-auto d-block"
                     alt="Сертификат соответствия">
            </div>
            <div class="col">
                <h3>Conformity Certificate</h3>
                <img src="{{ asset('img/sertifikat-1-0002-rus-213x300.jpg') }}" class="img-fluid rounded mx-auto d-block"
                     alt="Conformity Certificate">
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <p><b>Copyright © 2012-2019 VSAVM.BY. Все права защищены. Свидетельство №3761403875</b></p>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jscript.js') }}" type="text/javascript"></script>
</body>

</html>