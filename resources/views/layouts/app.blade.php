<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{-- dash --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logostar.jpg') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('bower_components\EasyAutocomplete\dist\easy-autocomplete.min.css') }}">
    
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



    

  

</head>
<body>

    @if ( Auth::user())
    
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="{{asset('assets/images/logo/gtslogo.jpeg') }}" style="width: 100%; height: 100%; border-radius: 20% " alt="Logo StarSoft" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item ">
                            <a href="{{Route('indexquote')}}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Cotizaciones</span>
                            </a>

                        </li>


                        <li class="sidebar-item  ">
                            <a href="{{Route('indexsale')}}" class='sidebar-link'>
                                <i data-feather="layout" width="20"></i>
                                <span>Facturas</span>
                            </a>

                        </li>


                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i data-feather="layout" width="20"></i>
                                <span>Recibos</span>
                            </a>

                        </li>
                        
                   
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="layers" width="20"></i>
                                <span>Inventario</span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{Route('indexproducto')}}">Productos</a>
                                </li>
                                <li>
                                    <a href="#">Otro</a>
                                </li>
                                <li>
                                    <a href="#">Mas</a>
                                </li>
                            </ul>

                        </li>

                        
                
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="book" width="20"></i>
                                <span>Contactos</span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{Route('indexcliente')}}">Clientes</a>
                                </li>
                                <li>
                                    <a href="#">Otro</a>
                                </li>
                                <li>
                                    <a href="#">Mas</a>
                                </li>
                            </ul>

                        </li>
                    
                    


                        <li class="sidebar-item  ">
                            <a href="table.html" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Notificaciones</span>
                            </a>

                        </li>



                        <li class="sidebar-item  ">
                            <a href="{{ route('home') }}" class='sidebar-link'>
                                <i data-feather="file-plus" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>

                        <li class="sidebar-item  ">
                            <a href="table-datatable.html" class='sidebar-link'>
                                <i data-feather="settings" width="20"></i>
                                <span>Configuracion</span>
                            </a>

                        </li>

                        <li class="sidebar-item  ">
                            <a href="table-datatable.html" class='sidebar-link'>
                                <i data-feather="alert-circle" width="20"></i>
                                <span>Ayuda</span>
                            </a>

                        </li>

                    </ul>
                        
                 
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

       
        @endif
        
    @if (Auth::user())
        <div id="main">
            @endif
            <nav class="navbar navbar-header navbar-expand navbar-light">
                @if (Auth::user())
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @endif
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                    
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="{{asset('assets/images/avatar.jpg') }}" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Bienvenido,  {{ Auth::user()->name }}</div>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                  <i data-feather="log-out"></i>  {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endguest
                </div>
            </nav>
       
    

        <main class="py-4">
            @yield('content')
        </main>

        {{$slot}}


      
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; StarSoft</p>
            </div>
            <div class="float-end">
                <p>Desarollado <span class='text-danger'><i data-feather="heart"></i></span> por <a
                        href="http:/">Company</a></p>
            </div>
        </div>
    </footer>
</div>
</div>

@section('scripts')
{{ Html::script('melody/js/alerts.js')}}
{{ Html::script('melody/js/avgrund.js') }}

{{ Html::script('select/dist/js/bootstrap-select.min.js') }}
{{ Html::script('js/sweetalert2.all.min.js') }}


@endsection


    <script src="{{ asset('bower_components\jquery\dist\jquery.min.js') }}"></script>

    <script src="bower_components\EasyAutocomplete\dist\jquery.easy-autocomplete.min.js"></script>



    <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>

     <script src="{{ asset('js\codigo.js') }}"></script>
     
     <script>
         function baseUrl(url){
             return '{{url('')}}/' + url;
         }
     </script>
  
   
</body>
</html>
