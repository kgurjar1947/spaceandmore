@include("website/header")
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Contact Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/')}}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- contact-info-section -->
        <section class="contact-info-section sec-pad centred">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>Get In Touch</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box" style="height: 365px;">
                                <div class="icon-box"><i class="icon-32"></i></div>
                                <h4>Email Address</h4>
                                <p><a href="mailto:webcontact@spacesandmore.com">webcontact@spacesandmore. com</a><br /><a href="mailto:info@spacesandmore.com">info@spacesandmore.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box" style="height: 365px;">
                                <div class="icon-box"><i class="icon-33"></i></div>
                                <h4>Phone Number</h4>
                                <p><a href="tel:+91-7799708814">+91-7799708814</a>   <a href="tel:+91-9052429999">+91-9052429999</a><br/><a href="tel:+91-9581109090">+91-9581109090</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box" style="height: 365px;">
                                <div class="icon-box"><i class="icon-34"></i></div>
                                <h4>Office Address</h4>
                                <p>Plot 105, 106, Lumbini Layout,Opp. Bio Diversity Park,Hitech City Main Road, Gachibowli,Hyderabad, Telangana 500032.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-info-section end -->


        <!-- contact-section -->
        <section class="contact-section bg-color-1">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h2>Contact Us</h2>
                            </div>
                            <div class="form-inner">
                            <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                    Submitted your request!
                        </div>
                                <form id="add_contact_us" method="post" class="default-form"> 
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group"><span style="color:red">*</span>
                                            <input type="text" name="name" id="name" placeholder="Name ">
                                            <span class="text-danger" id="nameErrorMsg"></span>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group"><span style="color:red">*</span>
                                            <input type="email" name="email" id="email" placeholder="Email">
                                            <span class="text-danger" id="emailErrorMsg"></span>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group"><span style="color:red">*</span>
                                            <input type="text" name="number" id="number" placeholder="Phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                                            <span class="text-danger" id="mobileErrorMsg"></span> 
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group"><span style="color:red">*</span>
                                            <input type="text" name="purpose" id="purpose" placeholder="Purpose">
                                            <span class="text-danger" id="purposeErrorMsg"></span> 
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group"><span style="color:red">*</span>
                                            <textarea name="message" id="message" placeholder="Message"></textarea>
                                            <span class="text-danger" id="messageErrorMsg"></span>
                                        </div><span style="color:red">*</span>
                                        <div class="g-recaptcha" id="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn btn-one" id="submit"  name="submit" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                        <div class="google-map-area">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15226.277702731382!2d78.3745122!3d17.4324392!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2e3166e9d47f72f4!2sSpaces+%26+More!5e0!3m2!1sen!2sin!4v1475675145257"  width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        <!-- main-footer -->
       

        <!-- main-footer -->
         <footer class="main-footer">
            <div class="footer-top bg-color-2">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget about-widget">
                                <div class="widget-title">
                                    <h3>About</h3>
                                </div>
                                <div class="text">
                                    <p style="margin-bottom:15px !important;">Spaces & More is a company established in
                                        2013 focusing on the Real-Estate space in the twin cities of Hyderabad &
                                        Secunderabad.</p>
                                    <p>The founding principles of Transparency, Truthfulness and Trust drive the
                                        company.</p>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-lg-4 col-md-6 col-sm-12 footer-column">-->
                        <!--    <div class="footer-widget links-widget ml-70">-->
                        <!--        <div class="widget-title">-->
                        <!--            <h3>Services</h3>-->
                        <!--        </div>-->
                        <!--        <div class="widget-content">-->
                        <!--            <ul class="links-list class">-->
                        <!--                <li><a href="{{url('/')}}/aboutus">About Us</a></li>-->
                        <!--                <li><a href="{{url('/')}}/business-parks">Business Parks</a></li>-->
                        <!--                <li><a href="">Property Consulting</a></li>-->
                        <!--                <li><a href="{{url('/')}}/property-management">Property Management</a></li>-->
                                        <!--<li><a href="index.html">Our Blog</a></li>-->
                        <!--                <li><a href="{{url('/')}}/contactus">Contact Us</a></li>-->
                        <!--            </ul>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-lg-3 col-md-6 col-sm-12 footer-column">-->
                        <!--    <div class="footer-widget links-widget ml-70">-->
                        <!--        <div class="widget-title" style="display:none;">-->
                        <!--            <h3>Services</h3>-->
                        <!--        </div>-->
                        <!--        <div class="widget-content">-->
                        <!--            <ul class="links-list class">-->
                        <!--                <li><a href="index.html">About Us</a></li>-->
                        <!--                <li><a href="index.html">Listing</a></li>-->
                        <!--                <li><a href="index.html">How It Works</a></li>-->
                        <!--                <li><a href="index.html">Our Services</a></li>-->
                        <!--                <li><a href="index.html">Our Blog</a></li>-->
                        <!--                <li><a href="index.html">Contact Us</a></li>-->
                        <!--            </ul>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contacts</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li><a href="https://maps.app.goo.gl/9T1QHuEHQECJiyGf9"><i class="fas fa-map-marker-alt"></i>Plot 105, 106, Lumbini Layout,Opp. Bio
                                            Diversity Park,Hitech City Main Road, Gachibowli,Hyderabad, Telangana
                                            500032.</a></li>
                                        <li><i class="fas fa-microphone"></i><a href="tel:7799708814">+91 7799708814</a>
                                        </li>
                                        <li><i class="fas fa-envelope"></i><a
                                                href="mailto:webcontact@spacesandmore.com">webcontact@spacesandmore.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-box clearfix">
                        <figure class="footer-logo"><a href="{{url('/')}}"><img src="{{url('/')}}/webassets/images/footer-logo.png"
                                    alt=""></a></figure>
                        <div class="copyright pull-left">
                            <p><a href="{{url('/')}}">Spaces & More</a> &copy; 2013</p>
                        </div>
                        <ul class="footer-nav pull-right clearfix">
                            <li> All Rights Reserved</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
 @include('website/enquiry')

        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{url('/')}}/webassets/js/jquery.js"></script>
    <script src="{{url('/')}}/webassets/js/popper.min.js"></script>
    <script src="{{url('/')}}/webassets/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/webassets/js/owl.js"></script>
    <script src="{{url('/')}}/webassets/js/wow.js"></script>
    <script src="{{url('/')}}/webassets/js/validation.js"></script>
    <script src="{{url('/')}}/webassets/js/jquery.fancybox.js"></script>
    <script src="{{url('/')}}/webassets/js/appear.js"></script>
    <script src="{{url('/')}}/webassets/js/scrollbar.js"></script>
    <script src="{{url('/')}}/webassets/js/isotope.js"></script>
    <script src="{{url('/')}}/webassets/js/jquery.nice-select.min.js"></script>
    <script src="{{url('/')}}/webassets/js/jQuery.style.switcher.min.js"></script>
    <script src="{{url('/')}}/webassets/js/jquery-ui.js"></script>
    <script src="{{url('/')}}/webassets/js/product-filter.js"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{url('/')}}/webassets/js/gmaps.js"></script>
    <script src="{{url('/')}}/webassets/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="{{url('/')}}/webassets/js/script.js"></script>
    
    
    <script>
   $(document).ready(function() { 
    $('#contact-form').submit(function(){
$.ajax({
type: 'POST',
url: '{{url('/')}}/api/enquiryform',
//contentType: "application/json",
//dataType: "json",
data: $(this).serialize(),
})
.done(function(data){
 
$("#contact-form")[0].reset();   
alert("Submitted your request!");
location.reload(true);

})
.fail(function() { 
//alert( "Posting failed." );
});
return false;
});
});
    
    </script>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

$('#SubmitForm1').on('submit',function(e){
    e.preventDefault();

    let name = $('#name').val();
    let email = $('#email').val();
    let number = $('#number').val();
    let purpose = $('#purpose').val();
    let message = $('#message').val();
    $.ajax({
      url: "{{route('enquiryform')}}",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        number:number,
        purpose:purpose,
        message:message,
      },
      success:function(response){
        $('#successMsg').show();
        setInterval(function(){
        window.location.reload(1);
        }, 3000);
      },
      error: function(response) {
        $('#nameErrorMsg').text(response.responseJSON.errors.name);
        $('#emailErrorMsg').text(response.responseJSON.errors.email);
        $('#mobileErrorMsg').text(response.responseJSON.errors.number);
        $('#purposeErrorMsg').text(response.responseJSON.errors.purpose);
        $('#messageErrorMsg').text(response.responseJSON.errors.message);
      },
      });
    });
  </script>
  
  
  <script src="{{asset('assets/js/notify/js/notifIt.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{asset('assets/js/notify.min.js')}}"></script>
		<script>
			function notify(id=null,message='Something went wrong',position='top right',type='error',willReload=false,url=null,timeout=3000){
            if(id!=null && id != 'input[name=error]' && id!='input[name=error]') $(id).notify(
                             message,
                             {
                                 position:position,
                                 className:type
                             }
                         );
        else  $.notify(
                message,
                {
                    position:'top right',
                    className:type
                }
            );
            if (willReload) setTimeout(function () {
                  if(url==null)window.location.reload();
                  else window.location.href = url;
                }, timeout)
        }
		</script>
		   <script>
            $("#add_contact_us").submit(function() {
                event.preventDefault();
                 $("#submit").prop('disabled', true);
                 $("#submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading....');
                  axios.post("{{route('contactus')}}", new FormData($("#add_contact_us")[0])).then(response => {
                    var data = response.data;
                    if (data.success) notify(null, 'Thank You For Contacting Us! A representative will get back to you within 24 hours.', 'top right', 'success', true);
                    else {
                        $("#submit").prop('disabled', false);
                        $("#submit").html('Submit');
                        for (var a in data['error']['message']) { notify(null, data['error']['message'][a][0], 'botton left');
                            if (a == 'success' | a == 'error') notify(null, data['error']['message'][a][0],
                                'botton left');
                        }
                    }
                }).catch(error => {
                    $("#submit").prop('disabled', false);
                    $("#submit").html('Submit');
                    notify(null, 'Something went wrong', 'top right');
                    console.log(error);
                });
            });
        </script>
</body>
</html>
