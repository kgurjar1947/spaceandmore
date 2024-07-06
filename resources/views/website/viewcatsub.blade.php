
@include("website/header")


        <!--Page Title-->
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>{{ $subcatdetasils->subcategoryname}}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/')}}">Home</a></li>
                                     @php 
                                    $url = Request::segment(2);
                                    
                                    @endphp
                        @if($url == 1)
                        <li>Residential</li>
                        @elseif($url ==2)
                        <li>Commercial</li>
                        @else
                        <li>{{ $subcatdetasils->subcategoryname}}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- property-page-section -->
        <section class="property-page-section property-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar property-sidebar">
                            <div class="category-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5 style="display:none !important">{{ $subcatdetasils->subcategoryname}}</h5>
                                     <h5>Location in City</h5>
                                </div>
                               <ul class="category-list clearfix">
                                    @include('website/city_view')
                                </ul>
                            </div>
                            <!--<div class="price-filter sidebar-widget">-->
                            <!--   @include('website/price_range_slider')-->
                            <!--</div>-->
                            <div class="category-widget sidebar-widget">
                                <div class="widget-title">
                                    @php 
                                    $url = Request::segment(2);
                                    @endphp
                                    @if($url == 1)
                                    <h5>Lead Type</h5>
                                    @elseif($url == 2)
                                     <h5>Commercial Propertys</h5>
                                     @else
                                     <h5>Status Of Propertys</h5>
                                    @endif
                                </div>
                                <ul class="category-list clearfix">
                                     @include('website/property_type_view')
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            <div class="item-shorting clearfix">
                                <div class="left-column pull-left">
                                    <h5>Search Reasults: <span>Showing 1 of {{count($property)}} Listings</span></h5>
                                </div>
                                <div class="right-column pull-right clearfix">
                                    <div class="short-box clearfix">
                                        <div class="select-box">
                                        @include('website/sort_by')    
                                        </div>
                                    </div>
                                    <div class="short-menu clearfix">
                                        <button class="grid-view on"><i class="icon-36"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper grid">

                                <div class="deals-grid-content grid-item">
                                    <div class="row clearfix">
                                        
                                        @foreach($property as $row)

                                        @php
                                             if($row["categoryid"] == 1){
                                                $recolink ="residential_details";
                                            }elseif($row["categoryid"] == 2){
                                                $recolink = "commercial_details";    
                                            }else{
                                                $recolink = "basic_details";
                                            }

                                        @endphp
                                        <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                            <div class="feature-block-one">
                                            <div class="inner-box">
                                <div class="image-box">
                                        @php
                                           $pic1 = explode(",",$row->proimages);         
                                        @endphp

                                    <a href="{{url('/')}}/{{$recolink}}/{{ $row->id}}"><figure class="image"><img src="{{url('/')}}/{{$pic1[0]}}" alt=""></figure></a>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">{{ get_cat_name($row->categoryid) }}</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">

                                        
                                            <figure class="author-thumb"><img src="{{url('/')}}/webassets/images/map.png" alt=""></figure>
                                            <h6>{{ get_city_name($row->location) }}</h6>
                                        </div>
                                        <div class="buy-btn pull-right"><a href="{{url('/')}}/{{$recolink}}/{{ $row->id}}"><?php echo $row['leadtype']; ?></a></div>
                                    </div>
                                    <div class="title-text"><h4><a href="{{url('/')}}/{{$recolink}}/{{ $row->id}}">{{ $row->propertyname}} <br>{{ $row->builtuparea}} Built Up Area, {{get_sub_cat_name($row->subcategoryid)}} <br/><?php echo $row['propertyid']; ?></a></h4></div>
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
                                    <p><?php echo mb_strimwidth($row['description'], 0, 80, '...'); ?>.</p>
                                    <div class="btn-box"><a href="{{url('/')}}/{{$recolink}}/{{ $row->id}}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        
                                        

                                    </div>
                                </div>
                            </div>
                            <div class="pagination-wrapper" hidden>
                                <ul class="pagination clearfix">
                                    <li><a href="" class="current">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href=""><i class="fas fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- property-page-section end -->
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

    <!-- main-js -->
    <script src="{{url('/')}}/webassets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>