<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Almacén | INBAL</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <!-- CSS only -->
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</head>
<style>
div.card-header {
    background-color: #109375;
 }

</style>

<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/home') }}"  >
            <img  src="{{asset(url('img/logo-inbal.png'))}}" alt="" width="400px" height="60px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <strong>
                <ul class="navbar-nav">
                    @if(Auth::user()->isUser())
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="{{url('/solicitud')}}"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>&nbsp;Solicitud</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{url('/home')}}"> <i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;Panel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{url('/dashboard')}}"><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;Centros de Trabajo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list-ol" aria-hidden="true"></i>&nbsp;Almacén
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="nav-link text-dark" href="{{url('/categoria')}}"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Categorías </a>
                                <a class="nav-link text-dark" href="{{url('/producto')}}"><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;Productos</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{route('inicioProveedores')}}"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;Proveedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{url('/inicioArticulos')}}"><i class="fa fa-file-archive-o" aria-hidden="true"></i>&nbsp;Inventario</a>  
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{url('/facturacion')}}"><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Facturación</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light" href="{{route('respuesta.solicitud')}}"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Solicitudes&nbsp;<span class="badge badge-warning">{{ $solicitudes }}</span></a>  
                        </li>
                    @endif
                </ul>
            </strong>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a> -->
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Registro') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <strong><i class="fa fa-user-o fa-2x" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name }}</strong> <span class="caret"></span>
                            </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Panel de inicio') }}
                                    </a>
                                    <!-- <a class="dropdown-item" href="{{ route('perfil') }}">
                                        {{ __('Mi perfil') }}
                                    </a> -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        </li>
                    @endguest
            </ul>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


</body>


</html>
