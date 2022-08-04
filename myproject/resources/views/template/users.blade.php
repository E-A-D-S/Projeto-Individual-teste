<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
.container {

    background-color: #00000018;


}

body {
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url(https://scontent.ffln9-1.fna.fbcdn.net/v/t39.30808-6/252343175_5216014125082479_2198621695347702607_n.png?_nc_cat=102&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=5LcDlTtMwO4AX9oAvgg&_nc_ht=scontent.ffln9-1.fna&oh=00_AT9mxXlClLAvSzIuyeh3gFvbrZc_9TUGjjSHjBFaMnglhQ&oe=62EFE1B8);
}
</style>

<body>
    <div class="container w-75 p-3">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="{{ route('users.index') }}">Usuários</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('products.index') }}">Produtos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('categories.index') }}">Categorias</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="navbar-nav mr-auto">
                                @if(Auth::user())
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">{{ Auth::user()->name }}</a>
                                </li>
                                @if(Auth::user()->is_admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin') }}">Dashboard</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a style="cursor:pointer" class="nav-link text-white" :href="route('logout')"
                                            onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            {{ __('Sair') }}
                                        </a>
                                    </form>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">Entrar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">Registrar-se</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div>


            <style>
            .bg {
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url("https://freight.cargo.site/w/1500/i/a758cdc502c18b9b037032243f12dd6b453a1f978dda857ee5c726b5a93d2d40/_V1_-11.png");
            }
            </style>
            <div class="bg">
                @yield('body')
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>