<!DOCTYPE html>
<html lang="en">
<head>
    <title>PT. PALEM MEKAR UTAMA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}  ">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }} ">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-160 p-t-50">
                @include('flash-message')
                <form action="{{ route('postLogin') }}" method="post" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Login Karyawan
                    </span>
                    
                    <div class="wrap-input100 rs1 validate-input" data-validate = "email is required">
                        <input class="input100" type="text" name="email">
                        <span class="label-input100">email</span>
                    </div>
                    
                    
                    <div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Sign in
                        </button>
                    </div>
                    
                    <div class="text-center w-full p-t-23">
                        <a href="#" class="txt1">
                            Forgot password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    
    
<!--===============================================================================================-->
    <script src="{{ asset ('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset ('login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset ('login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset ('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset ('login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset ('login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset ('login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset ('login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset ('login/js/main.js') }}"></script>

</body>
</html>