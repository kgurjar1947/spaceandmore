
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sheltos - Login page">
    <meta name="keywords" content="sheltos">
    <meta name="author" content="sheltos">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>Spaces & More</title>

   <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
   
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

    <!-- Template css -->
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">

</head>

<body>

    <!-- Loader start -->
    <div class="loader-wrapper">
        <div class="row loader-img">
            <div class="col-12">
                <img src="assets/images/loader/loader-2.gif" class="img-fluid" alt="">
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
                                
                                <p class="text-center"><img src="{{url('/')}}/assets/images/logo.png" style="width:60%"></p>
                                <div class="title-3 text-start">
                                    <h2>Log in</h2>
                                </div>
                                <form autocomplete="off" id="login_now">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Enter Email" autocomplete="off" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i data-feather="mail"></i>
                                                </div>
                                            </div>
                                            <input type="password" id="pwd-input" class="form-control" placeholder="Password" autocomplete="off" minlength="8" name="password" required>
                                            <div class="input-group-apend">
                                                <div class="input-group-text">
                                                    <i id="pwd-icon" class="far fa-eye-slash"></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="g-recaptcha" data-sitekey="6LdBPHQoAAAAADC1BypJMMtYKTYt8M10GUflGePH"></div>
                                        <div class="important-note">
                                            password should be a minimum of 8 characters and should contains letters and numbers
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <label class="d-block mb-0" for="chk-ani">
                                            <input class="checkbox_animated color-2" id="chk-ani" type="checkbox"> Remember me
                                        </label>
                                        <a href="forgot-password.html" class="font-rubik text-color-2">Forgot password ?</a>
                                    </div>
                                    <div class="text-center">
                                        <p id="res"></p>
                                        <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">Log in</button>
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
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather-icon/feather.min.js"></script>
    <script src="assets/js/feather-icon/feather-icon.js"></script>

    <!--admin js -->
    <script src="assets/js/admin-script.js"></script>

    <!-- login js -->
    <script src="assets/js/login.js"></script>

    <script>
$(document).ready(function(){
$('#login_now').submit(function(){
$.ajax({
type: 'POST',
url: '{{url("/api/adminlogin")}}',
//contentType: "application/json",
//dataType: "json",
data: $(this).serialize(),
})
.done(function(data){
 
$("#login_now")[0].reset();   

if(data.status==0){
$("#res").show();
$('#res').html("Invalid User Id or Password!");
setTimeout(function() { $("#res").hide(); }, 5000);
}
else{
$(location).attr('href', '{{url("/setsession")}}/'+data.admin_id);
}

})
.fail(function() { 
//alert( "Posting failed." );
});
return false;
});
});
</script>    
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>