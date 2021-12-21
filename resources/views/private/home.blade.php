<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <title>App - @yield('title')</title>
        <script src="https://code.jquery.com/jquery-3.6.0.js"   integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="   crossorigin="anonymous"></script>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" ">Bienvenido {{Auth::user()->nombre}}( {{ (Auth::user()->perfil=='1')?'admin':'usuario' }} )</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if(Auth::user()->perfil=='1')
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/formulario-productos">Crear productos</a>
                        </li>
                        @endif

                        @if(Auth::user()->perfil=='1')
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lista-productos">Lista productos</a>
                        </li>
                        @endif

                        @if(Auth::user()->perfil=='1')
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lista-usuarios">Lista ususarios</a>
                        </li>
                        @endif

                        @if(Auth::user()->perfil=='2')
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/user/lista-productos">Lista productos</a>
                        </li>
                        @endif

                        <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>