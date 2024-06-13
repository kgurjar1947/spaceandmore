
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sheltos - Login page">
    <meta name="keywords" content="sheltos">
    <meta name="author" content="sheltos">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon" />
    <title>Spaces & More</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css')}}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

    <!-- Loader start -->
    <div class="loader-wrapper">
        <div class="row loader-img">
            <div class="col-12">
                <img src="{{asset('assets/images/loader/loader-2.gif')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <!-- Loader end -->
    
    <div class="page-wrapper">
        <div class="authentication-box">
            <div class="container-fluid">
                <div class="row log-in">
                    <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-8 form-login">
                        <div class="card">
                            <div class="card-body">
                                
                                <p class="text-center"><img src="{{url('/')}}/assets/images/logo.jpg" style="width:60%"></p>
                                <div class="title-3 text-start">
                                    <h2>Forget Password</h2>
                                </div>
                                @include('flash-message')
                                <form autocomplete="off" method="POST" action="{{ route('ForgetPasswordPost') }}">
                                @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" autocomplete="off" name="email">
                                            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                    </div>
                                    <div class="d-flex">
                                        <label class="d-block mb-0" for="chk-ani">
                                        </label>
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('login') }}" class="font-rubik text-color-2">  {{ __('Login?') }}</a>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <p id="res"></p>
                                        <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">{{ __('Send Reset Password Link') }}</button>
                                    </div>

                                   
                                </form>

                                <p class="text-center pt-3">
                                   Spaces & More &copy; {{ date('Y')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-7 offset-xxl-1 col-lg-6 auth-img">
                        <img src="assets/images/svg/2.jpg" class="bg-img" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- latest jquery-->
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- feather icon js-->
    <script src="{{asset('assets/js/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/feather-icon/feather-icon.js')}}"></script>

    <!--admin js -->
    <script src="{{asset('assets/js/admin-script.js')}}"></script>

    <!-- login js -->
    <script src="{{asset('assets/js/login.js')}}"></script>
  

</body>
</html>