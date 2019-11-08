<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('toastr/toastr.min.js')}}"></script>
    <script src="{{asset('js/login.js')}}"></script>

    {{-- pe icon --}}
    <link rel="stylesheet" href="{{asset('pe-icon-7-stroke/css/helper.css')}}">
    <link rel="stylesheet" href="{{asset('pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    
    <title>Login</title>
</head>
<body class="body-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <div class="card rounded-0 shadow card-pad text-center font px-3">
                    <img class="mx-auto dashtito-img" src="{{asset('img/dash_tito_full.png')}}">
                    <div class="mb-5">
                        <span>Login using your Dashsuccess account</span>
                    </div>
                    <form method="post" action="" id="loginForm">
                        <div class="inputBox">
                            <div class="form-group" id="usernameBox">
                                <input id="username" class="form-control input" type="text" name="username" placeholder="Username" tabindex="1">
                            </div>
                            <div class="form-group" id="passwordBox">
                                <div id="welcome" class="pb-2">
                                    <span></span>
                                </div>
                                <input id="password" class="form-control input" type="password" name="password" placeholder="Password" tabindex="3">
                            </div>
                        </div>
                        <button type="button" class="btn form-control submit-btn text-white" id="next" tabindex="2">Next</button>
                        <button type="submit" class="btn form-control submit-btn text-white" id="login" tabindex="4">Login</button>
                    </form>
                </div>
                <div class="m-3 text-white" id="backBox">
                    <i class="pe-7s-back"></i>
                    <a class="text-white" id="back">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>