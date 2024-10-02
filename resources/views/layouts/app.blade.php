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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <!-- CSS only -->
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm ">
        <a class="navbar-brand" href="{{ url('/home') }}"  >
            <img  src="{{asset(url('img/logo-inbal.png'))}}" alt="" width="500px" height="70px">
        </a>
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <strong>
                    <ul class="navbar-nav">
                        @if(Auth::user()->isUser())
                            <a class="nav-link text-dark" href="{{url('/solicitud')}}"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>&nbsp;Solicitud</a>
                        @else
                            <a class="nav-link text-dark" href="{{url('/home')}}"> <i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;Panel</a>
                            <a class="nav-link text-dark" href="{{url('/dashboard')}}" align="center"><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;Centros de Trabajo</a>
                            <a class="nav-link text-dark" href="{{url('/categoria')}}" align="center"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Categorías </a>
                            <a class="nav-link text-dark" href="{{url('/producto')}}" align="center"><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;Productos</a>
                            <a class="nav-link text-dark" href="{{route('inicioProveedores')}}"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;Proveedores</a>
                            <a class="nav-link text-dark" href="{{url('/inicioArticulos')}}"><i class="fa fa-file-archive-o" aria-hidden="true"></i>&nbsp;Inventario</a>  
                            <a class="nav-link text-dark" href="{{url('/facturacion')}}"><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Facturación</a> 
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
