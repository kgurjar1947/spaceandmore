@include('website/header')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>




        <!--Page Title-->
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Residental Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/')}}">Home</a></li>
                        <li>Residental Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->

                                                


        <!-- property-details -->
        <section class="property-details property-details-one">
            <div class="auto-container">
                <div class="top-details clearfix">
                    <div class="left-column pull-left clearfix">
                        <h3>{{  $row['propertyname'] }}</h3>
                        <div class="author-info clearfix">
                            <div class="author-box pull-left">
                                <figure class="author-thumb"><img src="{{ url('/')}}/webassets/images/map.png" alt=""></figure>
                                <h6>{{get_city_name($row['location'])}}</h6>
                            </div>

                        </div>
                    </div>
                    <div class="right-column pull-right clearfix">
                        <div class="price-inner clearfix">
                            <ul class="category clearfix pull-left">
                                <li><a href="property-details.html">Available</a></li>
                                <li><a href="property-details.html"><?php echo $row['leadtype']; ?></a></li>
                            </ul>
                            <div class="price-box pull-right">
                                <h3>₹<?php echo $row['totalprice']; ?>.00</h3>
                            </div>
                        </div>
                        <!--<ul class="other-option pull-right clearfix">-->
                        <!--    <li><a href="property-details.html"><i class="icon-37"></i></a></li>-->
                        <!--    <li><a href="property-details.html"><i class="icon-38"></i></a></li>-->
                        <!--    <li><a href="property-details.html"><i class="icon-12"></i></a></li>-->
                        <!--    <li><a href="property-details.html"><i class="icon-13"></i></a></li>-->
                        <!--</ul>-->
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-8 col-sm-12 content-side">
                        <div class="property-details-content">
                            <div class="carousel-inner">
                                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                        @php
                                           $pic = explode(", ",$row->proimages);         
                                        @endphp

                                        @foreach($pic as $p)
                                            <figure class="image-box"><img src="{{ url('/')}}/{{$p}}"
                                            alt=""></figure>
                                        @endforeach

                                </div>

                            </div>
                            <div class="discription-box content-widget">
                                <div class="title-box">
                                    <h4>Property Description</h4>
                                </div>
                                <div class="text">
                                    <p><?php echo $row['description']; ?></p>
                                </div>
                            </div>
                            <div class="details-box amenities-box content-widget">
                                <div class="title-box">
                                    <h4>Property Details</h4>
                                </div>
                                <ul class="list clearfix">
                                    <li><p>Property Type:</p> <span> Residential</hr></span></li>
                                    <li>Hot Property: <span><?php echo $row['hotproperty']; ?></span></li>
                                    <li>Price Per Sft: <span><?php echo $row['pricepersft']; ?> Sq.Ft</span></li>
                                    <li>Maintenance Per Sft/Tot: <span><?php echo $row['maintenance']; ?></span></li>
                                    <li>Deposit(Months): <span><?php echo $row['deposit']; ?></span></li>
                                    <li>Lock-In(Months): <span><?php echo $row['lockin']; ?></span></li>
                                    <li>Built Up Area: <span><?php echo $row['builtuparea']; ?></span></li>
                                    <li>Available From: <span><?php echo $row['availablefrom']; ?></span></li>
                                    <li>Available Date: <span><?php echo $row['availabledate']; ?></span></li>
                                    <li>Dg Backup: <span>Yes</span></li>
                                    <li>Ac: <span><?php echo $row['ac']; ?></span></li>
                                    <li>Floor: <span><?php echo $row['floor']; ?> Floor</span></li>
                                    <li>Total Floors: <span><?php echo $row['totalfloors']; ?></span></li>
                                    <li>No. of Car Parking: <span><?php echo $row['carparking']; ?></span></li>
                                    <li>Lift: <span><?php echo $row['lift']; ?></span></li>
                                    <li>Security: <span><?php echo $row['security']; ?></span></li>
                                    <li>Onsite Manager: <span><?php echo $row['onsitemanager']; ?></span></li>
                                    <li>No. of Bathrooms: <span><?php echo $row['bathrooms']; ?></span></li>
                                    <li>Plot Area  (Sq Yards): <span><?php echo $row['plotarea']; ?></span></li>
                                    <!--<li>Carpet Area: <span><?php echo $row['carpetarea']; ?>sft</span></li>-->
                                    <li>Property Facing: <span><?php echo $row['propertyfacing']; ?></span></li>
                                    
                                    <li>Residential Subtype: <span><?php echo $row['residentialsubtype']; ?></span></li>
                                    <li>Residential Furinished: <span><?php echo $row['residentialfurinished']; ?></span></li>
                                    <li>Geyesers: <span><?php echo $row['geysers']; ?></span></li>
                                    <li>Wardrobes: <span>Yes</span></li>
                                    <li>Clinic Available: <span><?php echo $row['clinic']; ?></span></li>
                                    <li>Duplex: <span><?php echo $row['duplex']; ?></span></li>
                                    <li>BHK: <span><?php echo $row['othercommunity']; ?></span></li>
                                    <li>Servant Room: <span><?php echo $row['servantroom']; ?></span></li>
                                    <li>Pets Allowed: <span><?php echo $row['petsallowed']; ?></span></li>
                                    <li>Club House: <span><?php echo $row['clubhouse']; ?></span></li>
                                    <li>Pool: <span><?php echo $row['pool']; ?></span></li>
                                    <li>Tennis court: <span><?php echo $row['tennis']; ?></span></li>
                                    <li>Area: <span><?php echo $row['location']; ?></span></li>
                                    <li>City: <span>Hyderabad</span></li>
                                    <li>State: <span>Telangana</span></li>
                                    <li>Landmark: <span> <?php echo $row['landmark']; ?></span></li>
                                    <li>Age of Construction:<span><?php echo $row['age']; ?></span></li>
                                    <!--<li>Furinished Status: <span> <?php echo $row['residentialfurinished']?></span></li>-->
                                    
                                    <li>Suitable For: <span><?php echo $row['suitablefor']; ?></span></li>
                                </ul>
                            </div>
                            <div class="amenities-box content-widget">
                                <div class="title-box">
                                    <h4>Amenities</h4>
                                </div>
                                <?php
                                    $amenitieslist = $row['amenities'];
                                    $amenities= explode(',', $amenitieslist);
                                ?>
                                <ul class="list clearfix">
                                <?php foreach ($amenities as $amenity){ ?>
                                    <li><?php echo $amenity; ?></li>
                                <?php } ?>
                                </ul>
                            </div>
                            <div class="floorplan-inner content-widget">
                            <div class="title-box">
                                    <h4>Floor Plan</h4>
                                </div>
                                <ul class="accordion-box">


                                        @php
                                           $pic2 = explode(", ",$row->file);         
                                        @endphp

                                        @foreach($pic2 as $key => $p2)
                                            

                                    <li class="accordion block">
                                            <li class="accordion {{ $key==0 ? 'block active-block' : 'block'}}">
                                                <div class="acc-btn {{ $key==0 ? 'active' : ''}}">
                                                    <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                                    <h5>Floor Plan</h5>
                                                </div>
                                                <div class="acc-content {{ $key==0 ? 'current' : ''}}">
                                                    <div class="content-box">
                                                        <!--<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui
                                                            officia deserunt mollit anim est laborum. Sed perspiciatis unde
                                                            omnis iste natus error sit voluptatem accusa dolore mque laudant.
                                                        </p>-->
                                                        <figure class="image-box">
                                                            <img src="{{ url('/')}}/{{$p2}}" alt="">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </li>

                                        @endforeach
                                
                                </ul>
                            </div>
                            <div class="location-box content-widget">
                                <div class="title-box">
                                    <h4>Location</h4>
                                </div>
                                <div class="google-map-area">
                                    <!-- <div class="google-map" id="contact-google-map" data-map-lat="40.712776"
                                        data-map-lng="-74.005974" data-icon-path="{{ url('/')}}/webassets/images/icons/map-marker.png"
                                        data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="12"
                                        data-markers='{
                                            "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","{{ url('/')}}/webassets/images/icons/map-marker.png"]
                                        }'>

                                    </div> -->
                                    <?php 
                                    $loc = str_replace('width="600"','width="100%"',$row['locations']);
                                    echo $loc; 
                                    
                                    ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
					<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
					<div class="property-sidebar default-sidebar">
                            <div class="author-widget sidebar-widget">
                                <div class="author-box">
                                    <div class="inner">
                                        <h4>Contact Us</h4>
                                    </div>
                                </div>
                                <div class="form-inner">
                                   @include('website/contact_form')
                                </div>
                            </div>
                        </div>
                        <div class="property-sidebar default-sidebar mt-4">
                            <div class="author-widget sidebar-widget" style="background-color: #05508e;">
                                <i class="fa fa-phone" style="color: #fff; font-size: 25px; padding-bottom: 25px"></i>
                                <h4 style="color: #fff; padding-bottom: 10px; font-size: 20px">Call Us</h4><h4 style="color: #fff; padding-bottom: 10px; font-size: 20px">For Quick Response</h4>
                                <a href="tel:+91-9876543210" style="color:#fff;font-size:20px;">+91-9876543210</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="similar-content">
                    <div class="title">
                        <h4>Similar Properties</h4>
                    </div>
                    <div class="row clearfix">
                        
                         @foreach($property as $row)
                         <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                        @php
                                           $pic1 = explode(",",$row->proimages);         
                                        @endphp

                                    <figure class="image"><img src="{{url('/')}}/{{$pic1[0]}}" alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Residential</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">

                                        
                                            <figure class="author-thumb"><img src="{{url('/')}}/webassets/images/map.png" alt=""></figure>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                        <div class="buy-btn pull-right"><a href="{{url('/')}}/residential_details/{{ $row->id}}"><?php echo $row['leadtype']; ?></a></div>
                                    </div>
                                    <div class="title-text"><h4><a href="{{url('/')}}/residential_details/{{ $row->id}}"> {{ $row->propertyname}} <br> {{ $row->builtuparea}} Built Up Area, {{get_sub_cat_name($row->subcategoryid)}}<br/><?php echo $row['propertyid']; ?></a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>₹<?php echo $row['totalprice']; ?>.00</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <!-- <li><a href="property-details.html"><i class="icon-12"></i></a></li> -->
                                            <!--<li><a href="#"><i class="icon-13"></i></a></li>-->
                                        </ul>
                                    </div>
                                    <p><?php echo mb_strimwidth($row['description'], 0, 120, '...'); ?>.</p>
                                    <div class="btn-box"><a href="{{url('/')}}/residential_details/{{ $row->id}}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                        </div>
					@endforeach
                        
                        
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- property-details end -->
        <!-- team-section end -->
        <section class="subscribe-section bg-color-3">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                        <div class="text">
                            <!-- <span>Subscribe</span> -->
                            <h2>Looking to Buy a New Property or <br />Sell an Existing One?</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                        <div class="form-inner" style="float:right;">
                            <button class="theme-btn btn-one" data-toggle="modal" data-target="#exampleModal"
                                type="submit">Enquiry form</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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
        <!-- popup code start-->

         @include('website/enquiry')
        <!-- end popupform -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{ url('/')}}/webassets/js/jquery.js"></script>
    <script src="{{ url('/')}}/webassets/js/popper.min.js"></script>
    <script src="{{ url('/')}}/webassets/js/bootstrap.min.js"></script>
    <script src="{{ url('/')}}/webassets/js/owl.js"></script>
    <script src="{{ url('/')}}/webassets/js/wow.js"></script>
    <script src="{{ url('/')}}/webassets/js/validation.js"></script>
    <script src="{{ url('/')}}/webassets/js/jquery.fancybox.js"></script>
    <script src="{{ url('/')}}/webassets/js/appear.js"></script>
    <script src="{{ url('/')}}/webassets/js/scrollbar.js"></script>
    <script src="{{ url('/')}}/webassets/js/isotope.js"></script>
    <script src="{{ url('/')}}/webassets/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('/')}}/webassets/js/jQuery.style.switcher.min.js"></script>
    <script src="{{ url('/')}}/webassets/js/jquery-ui.js"></script>
    <script src="{{ url('/')}}/webassets/js/product-filter.js"></script>
    <script src="{{ url('/')}}/webassets/js/timePicker.js"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ url('/')}}/webassets/js/gmaps.js"></script>
    <script src="{{ url('/')}}/webassets/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="{{ url('/')}}/webassets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>