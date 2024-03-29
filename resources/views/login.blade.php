<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>609-31</title>
    <style> .is-invalid {color: red;} </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/login">Кинотеатр</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
{{--            <li class="nav-item dropdown">--}}
{{--            <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"--}}
{{--               href={{url('sessions')}}>Сессии</a>--}}
{{--            <ul class="dropdown-menu">--}}
                <li class="nav-item"><a class="nav-link" href={{url('sessions')}}>Bce сессии</a></li>
                <li class="nav-item"><a class="nav-link" href={{url('session/create')}}>Добавить сессию</a></li>
{{--                <li><hr class="dropdown-divider"></li>--}}
{{--                <li>--}}
{{--                    <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            </li>--}}
                <li class="nav-item">
                <a class="nav-link"
                   href="/films">Фильмы</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                <a class="nav-link disabled" aria-disabled="true">Покупатели</a>--}}
{{--            </li>--}}
        </ul>
            @if(!Auth::user())
                <form class="d-flex" method="post" action={{url('auth')}}>
                @csrf
                <input
                class="form-control me-2" type="text" placeholder="Логин" name="email"
                aria-label="Логин" value="{{old('email')}}"/>
                <input class="form-control me-2" type="password" placeholder="Пароль" name="password"
                       aria-label="Пароль"
                       value="{{ old('password') }}"/>
                <button class="btn btn-outline-success" type="submit">Войти</button>
        </form>
        @else
            <ul class="navbar-nav">
                <a class="nav-link active" href="#">
                    <i class="fa fa-user" style="font-size:20px;color:white; "></i>
                    <span> </span>{{ Auth::user () ->name }}
                </a>
                <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('logout')}}">Выйти</a>
            </ul>
        @endif
        </div>
            </div>
        </nav>
    </header>
</body>
</html>
