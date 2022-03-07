<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    
    <title>Quality Service</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{asset('public/bootstrap4/dist/css/bootstrap.min.css')}}" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('public/menu/style5.css')}}">
    @stack('css')

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" style="box-shadow: 0 8px 8px 4px rgba(0,0,0,0.5);">
            <div class="sidebar-header">
                {{-- <h3>Quality Service</h3> --}}
                <img class="imgsidebar" src="{{asset('public/imagenes/logo.jpg')}}">
            </div>
  
            <ul class="list-unstyled components sticky-top">
                <p>Menu</p>
                @if(Auth::user()->rol != 4)
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Trabajadores</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{route('cobradores.index')}}">Cobradores</a>
                        </li>
                         <li>
                            <a href="{{route('vendedores.index')}}">Vendedores</a>
                        </li>
                           <li>
                            
                        </li>
                        <li>
                            <a href="{{route('zonas.index')}}">Zonas</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="#ventassubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cliente</a>
                    <ul class="collapse list-unstyled" id="ventassubmenu">
                        <li>
                            <a href="{{route('cliente.index')}}">Datos del cliente</a>
                        </li>
                       
                    </ul>
                </li>

    @if(Auth::user()->rol != 4)
                <li>
                    <a href="#pagos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">choques</a>
                    <ul class="collapse list-unstyled" id="pagos">
                        <li>
                            <a href="{{route('choques.index')}}">choques</a>
                        </li>
                       
                    </ul>
                </li>
                 <li>
                    <a href="#logs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Supervicion de usuarios</a>
                    <ul class="collapse list-unstyled" id="logs">
                        <li>
                            <a href="{{route('logs.index')}}">Ver movimientos</a>
                        </li>
                        <li>
                            <a href="{{route('usuarios.index')}}">Ver usuarios</a>
                        </li>
                       
                    </ul>
                </li>
                
                <li>
                    <a href="{{route('reportes.index')}}">Reportes</a>
                    
                </li>
    @endif
            
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="box-shadow: 0 6px 6px 0 rgba(0,0,0,0.5);">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
               
                                <a  href="/home">CHAT</a>
                          
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{route('usuarios.show', Auth::user()->id)}}">
                                        {{ __('Perfil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </nav>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Inicio</a></li>
                @yield('breadcrumb')
              </ol>
            </nav>
            <div class="row">
              @yield('content')

            </div>
        </div>
    </div>
    @yield('modales')

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{asset('public/js/jquery/jquery-3.3.1.slim.min.js')}}" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="{{asset('public/js/popper/popper.min.js')}}" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('public/bootstrap4/dist/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>

    <!-- Font Awesome JS -->
    <script defer src="{{asset('public/fontawesome/js/all.js')}}" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
    @stack('js')

</body>

</html>
