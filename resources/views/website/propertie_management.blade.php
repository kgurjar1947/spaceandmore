@include("website/header")

   <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/background/page-title-4.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Property Management</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Property Management</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- career-page-section -->
        <section class="career-page-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 left-side">
                        <div class="sec-title">
                            <h2>Property Management</h2>
                            <p>Spaces & More simplifies property ownership by offering a thorough range of property management services covering everything from advertising to Lease agreements and ongoing tenant support. Property Management services provide a convenient solution for Investors and NRIs by handling the rental and maintenance aspects allowing them to focus on other priorities </p>
                            <p>As part of Property Management services, the company will advertise the rental property, handle tenant enquiries, screen applicants, select suitable candidates, draft a lease agreement and conduct move-in process. Once the move-in is complete we help monitor the rental payments and coordinate any maintenance issues. The services are provided to the owners thru Annual contracts. </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 right-side">
                         <div class="image-box wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="3000ms">
                            <figure class="image"><img src="{{url('/')}}/webassets/images/resource/contact-1.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- career-page-section end -->

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
        <!-- main-footer end -->

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
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="{{url('/')}}/webassets/js/jQuery.style.switcher.min.js"></script>
    <script src="{{url('/')}}/webassets/js/jquery-ui.js"></script>
    <script src="{{url('/')}}/webassets/js/product-filter.js"></script>

    <!-- main-js -->
    <script src="{{url('/')}}/webassets/js/script.js"></script>