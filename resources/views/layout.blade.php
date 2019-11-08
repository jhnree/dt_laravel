<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/report.css')}}">
    <link rel="stylesheet" href="{{asset('css/loader.css')}}">
    <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.10.2/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('pe-icon-7-stroke/css/helper.css')}}">
    <link rel="stylesheet" href="{{asset('pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" /> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="{{asset('js/app.js')}}"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/report.js')}}"></script>
    <script src="{{asset('toastr/toastr.min.js')}}"></script>
    <title>Dash TiTo</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-standard">
        <div class="container-fluid" id="nav">
            <a class="navbar-brand" href="/"><img src="{{asset('img/dt.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav">
                <i class="fas fa-bars text-white"></i>
            </button>
            <div id="myNav" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item">
                        <a id="dashsuccess" class="nav-link text-white" href="https://agm.dashsuccess.com/home/autoLoginDT?u=jcvergara&p=$2y$10$dF5UxZ1zvrkrJ3qRh/mgVep6jLa5szUOvPqkvci2fizeepV4/R7eC" target="_blank" tabindex="-1" aria-disabled="true">Dashsuccess</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white text-center" id="navbardrop" data-toggle="dropdown" href="#" tabindex="-1" aria-disabled="true">
                            <i class="pe-7s-user pe-2x"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mb-3">
                            <h5 class="dropdown-header text-white">{{Auth::user()->username}}</h5>
                            <a class="dropdown-item" href="#">Attendance</a>
                            <a class="dropdown-item" href="/report">Reports</a>
                            <a class="dropdown-item" id="logout" href="/logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="modal fade" id="loader">
        <div class="modal-dialog">
            <div class="spinner"></div>
        </div>
    </div>
</body>
</html>
