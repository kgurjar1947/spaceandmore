@include('website/header')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style type="text/css">
                                .property-details-content .details-box .list li span{
                                    color: black; font-size: 18px; font-weight: 500
                                }
                                .property-details-content .details-box .list li span hr{
                                    width: 175px
                                }
                            </style>


        <!--Page Title-->
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Property Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/')}}">Home</a></li>
                        <li>Property Details</li>
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
                        <h3>( {{ $row['propertyid'] }} ) {{  $row['propertyname'] }}</h3>
                        <div class="author-info clearfix">
                            <div class="author-box pull-left">
                                <figure class="author-thumb"><img src="{{url('/')}}/webassets/images/map.png" alt=""></figure>
                                <h6><?php echo get_city_name($row['location']); ?></h6>
                            </div>

                        </div>
                    </div>
                    <div class="right-column pull-right clearfix">
                        <div class="price-inner clearfix">
                            <ul class="category clearfix pull-left">
                                <li><a href="">Available</a></li>
                                <li><a href=""><?php echo $row['leadtype']; ?></a></li>
                            </ul>
                            <div class="price-box pull-right">
                                <h3>₹<?php echo $row['totalprice']; ?>.00</h3>
                            </div>
                        </div>
                        <!--<ul class="other-option pull-right clearfix">-->
                        <!--    <li><a href=""><i class="icon-37"></i></a></li>-->
                        <!--    <li><a href=""><i class="icon-38"></i></a></li>-->
                        <!--    <li><a href=""><i class="icon-12"></i></a></li>-->
                        <!--    <li><a href=""><i class="icon-13"></i></a></li>-->
                        <!--</ul>-->
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="property-details-content">
                            <div class="carousel-inner">
                                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                        @php
                                           $pic = explode(", ",$row->proimages);         
                                        @endphp

                                        @foreach($pic as $p)
                                              @if(!empty($p))
                                            <figure class="image-box"><img src="{{ url('/')}}/{{$p}}"
                                            alt="" style="height: 400px;"></figure>
                                             @endif
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
                            
                            <div class="details-box content-widget">
                                <div class="title-box">
                                    <h4>Property Details</h4>
                                </div>
                                <ul class="list clearfix">
                                    @if($row['categoryid'] == 1)
                                    @php
                                    $name = DB::table('tblsubcategory')->where('id',$row['subcategoryid'])->first();
                                     @endphp
                                    <li><p>Residential Subtype</p><span><?php echo $name->subcategoryname; ?><hr></span></li>
                                    <li><p>Residential Furinished</p><span><?php echo $row['residentialfurinished']; ?><hr></span></li>
                                    <li><p>Location in City</p><span><?php echo $row['location']; ?></span><hr></li>
                                    <li><p>Landmark</p><span> <?php echo $row['landmark']; ?><hr></span></li>
                                    <li><p>No. of BHK</p><span><?php echo $row['communitydetails']; ?><hr></span></li>
                                    <li><p>Built Up Area</p><span><?php echo $row['builtuparea']; ?><hr></span></li>
                                    <li><p>Property Facing</p><span><?php echo $row['propertyfacing']; ?><hr></span></li>
                                     <li><p>Bachelors Allowed</p><span><?php echo $row['bachelors']; ?><hr></span></li>
                                     <li><p>Deposit(Months)</p> <span><?php echo $row['deposit']; ?><hr></span></li>
                                     <li><p> Maintenance (Sft/Tot)</p> <span><?php echo $row['maintenance']; ?><hr></span></li>
                                     <li><p>No. of Bathrooms</p><span><?php echo $row['bathrooms']; ?><hr></span></li>
                                     <li><p>Geysers</p><span><?php echo $row['geysers']; ?><hr></span></li>
                                     <li><p>Wardrobes</p><span><?php echo $row['wardrobes']; ?><hr></span></li>
                                     <li><p>Servant Room</p><span><?php echo $row['servantroom']; ?><hr></span></li>
                                     <li><p>Duplex</p><span><?php echo $row['duplex']; ?><hr></span></li>
                                     <li><p>Available From</p><span><?php echo $row['availablefrom']; ?><hr></span></li>
                                     <li><p>Available Date</p><span><?php echo $row['availabledate']; ?><hr></span></li>
                                     <li><p>Floor</p><span><?php echo $row['floor']; ?><hr></span></li>
                                     <li><p>Total Floors</p><span><?php echo $row['totalfloors']; ?><hr></span></li>
                                     <li><p>Age(Years)</p><span><?php echo $row['age']; ?><hr></span></li>
                                     <li><p>Lock-In(Months)</p> <span><?php echo $row['lockin']; ?><hr></span></li>
                                     <li><p>Price Per Sft</p><span><?php echo $row['pricepersft']; ?><hr></span></li>
                                      <li><p>Executive Name</p><span><?php echo $row['executivename']; ?><hr></span></li>
                                     <li style="width:100% !important;"><p>Suitable For</p><span><?php echo $row['suitablefor']; ?></span></li>
                                     
                                    <!--<li><p>Property Type</p> <span><?php echo get_sub_cat_name($row['subcategoryid']); ?><hr></span></li>-->
                                    <!--<li><p>Hot Property: </p><span><?php echo $row['hotproperty']; ?><hr></span></li>-->
                                    <!--<li><p>DG Backup</p><span><?php echo $row['dgbackup']; ?><hr></span></li>-->
                                    <!--<li><p>AC</p><span><?php echo $row['ac']; ?><hr></span></li>-->
                                    <!--<li><p>NO.Car Parking</p><span><?php echo $row['carparking']; ?><hr></span></li>-->
                                    <!--<li><p>Lift</p><span><?php echo $row['lift']; ?><hr></span></li>-->
                                    <!--<li><p>Security</p><span><?php echo $row['security']; ?><hr></span></li>-->
                                    <!--<li><p>Onsite Manager</p><span><?php echo $row['onsitemanager']; ?><hr></span></li>-->
                                    <!--<li><p>Plot Area </p><span><?php echo $row['plotarea']; ?> Sq Yards<hr></span></li>-->
                                    <!--<li><p>Carpet Area</p><span><?php echo $row['carpetarea']; ?>sft<hr></span></li>-->
                                    
                                    
                                    <!--<li><p>Clinic Available</p><span><?php echo $row['clinic']; ?><hr></span></li>-->
                                    <!--<li><p>No.of Bathrooms</p> <span><?php echo $row['bathrooms']; ?><hr></span></li>-->
                                    
                                    
                                    
                                    <!--<li><p>Bachelors Allowed</p><span><?php echo $row['bachelors']; ?><hr></span></li>-->
                                    <!--<li><p>Pets Allowed</p><span><?php echo $row['petsallowed']; ?><hr></span></li>-->
                                    <!--<li><p>Club House</p><span><?php echo $row['clubhouse']; ?><hr></span></li>-->
                                    <!--<li><p>Pool</p><span><?php echo $row['pool']; ?></span><hr></li>-->
                                    <!--<li><p>Tennis court</p><span><?php echo $row['tennis']; ?><hr></span></li>-->
                                    
                                    <!--<li><p>City</p><span>Hyderabad</span><hr></li>-->
                                    <!--<li><p>State</p><span>Telangana</span><hr></li>-->
                                    
                                   
                                    
                               
                               
                                    @elseif($row['categoryid'] == 2)
                                    @php
                                    $name = DB::table('tblsubcategory')->where('id',$row['subcategoryid'])->first();
                                     @endphp
                                    <li><p>Commercial Subtype</p> <span><?php echo $name->subcategoryname; ?><hr></span></li>
                                    <li><p>Commercial Furinished</p><span><?php echo $row['commercialfurinished']; ?><hr></span></li>
                                    <li><p>Built Up Area</p> <span><?php echo $row['builtuparea']; ?><hr></span></li>
                                    <li><p>Property Facing</p><span><?php echo $row['propertyfacing']; ?><hr></span></li>
                                    <li><p> Location in City</p><span><?php echo $row['location']; ?><hr></span></li>
                                    <li><p>Landmark</p> <span><?php echo $row['landmark']; ?><hr></span></li>
                                    <li><p>Price Per(Sft)</p> <span><?php echo $row['pricepersft']; ?><hr></span></li>
                                    <li><p>Maintenance (Sft/Tot)</p> <span><?php echo $row['maintenance']; ?><hr></span></li>
                                    <li><p>Deposit (Months)</p> <span><?php echo $row['deposit']; ?><hr></span></li>
                                    <li><p>Lock-In(Months)</p> <span><?php echo $row['lockin']; ?><hr></span></li>
                                    <li><p>No. of Work stations</p><span><?php echo $row['workstations']; ?><hr></span></li>
                                    <li><p>No. of Manager Cabins</p> <span><?php echo $row['managercabins']; ?><hr></span></li>
                                    <li><p>No. of Dicussion Rooms</p> <span><?php echo $row['discussionrooms']; ?><hr></span></li>
                                    <li><p>No. of Conference Room</p><span><?php echo $row['conferencerooms']; ?><hr></span></li>
                                     <li><p>Available From</p> <span><?php echo $row['availablefrom']; ?><hr></span></li>
                                    <li><p>Available Date</p><span><?php echo $row['availabledate']; ?><hr></span></li>
                                    <li><p>Floor</p> <span><?php echo $row['floor']; ?><hr></span></li>
                                    <li><p>Total Floors</p> <span><?php echo $row['totalfloors']; ?><hr></span></li>
                                    <li><p>No. of Bathrooms</p> <span><?php echo $row['bathrooms']; ?><hr></span></li>
                                    <li><p>Age(Years)</p><span> <?php echo $row['age']; ?><hr></span></li>
                                    <li><p>Boardroom</p><span><?php echo $row['boardrooms']; ?><hr></span></li>
                                    <li><p>Reception</p><span><?php echo $row['reception']; ?><hr></span></li>
                                    <li><p>Pantry</p><span><?php echo $row['pantry']; ?><hr></span></li>
                                     <li><p>Server Room</p><span><?php echo $row['serverroom']; ?><hr></span></li>
                                     <li><p>Executive Name</p><span><?php echo $row['executivename']; ?><hr></span></li>
                                     
                                    <!--<li><p>Property Type</p> <span><?php echo get_sub_cat_name($row['subcategoryid']); ?><hr></span></li>-->
                                    <!--<li><p>Hot Property</p> <span><?php echo $row['hotproperty']; ?><hr></span></li>-->
                                    <!--<li><p>Plot Area  (Sq Yards)</p> <span><?php echo $row['plotarea']; ?><hr></span></li>-->
                                    <!-- <li>Landmark:  <span>Near</span></li> -->
                                    <!--<li><p>Dg Backup</p> <span><?php echo $row['dgbackup']; ?><hr></span></li>-->
                                    <!--<li><p>AC</p> <span><?php echo $row['ac']; ?><hr></span></li>-->
                                    <!--<li><p>NO. of Car Parking</p> <span><?php echo $row['carparking']; ?><hr></span></li>-->
                                    <!--<li><p>Lift</p><span><?php echo $row['lift']; ?><hr></span></li>-->
                                    <!--<li><p>Security</p> <span><?php echo $row['security']; ?><hr></span></li>-->
                                    <!--<li><p>Onsite Manager</p><span><?php echo $row['onsitemanager']; ?><hr></span></li>-->
                                    <!--<li><p>Carpet Area</p> <span><?php echo $row['carpetarea']; ?>sft<hr></span></li>-->
                                     @php
                                    $name = DB::table('tblsubcategory')->where('id',$row['subcategoryid'])->first();
                                     @endphp
                                    <!--<li><p>Lunch Room</p><span><?php echo $row['lunchroom']; ?><hr></span></li>-->
                                    <!--<li><p>Property ID</p><span><?php echo $row['propertyid']; ?><hr></span></li>-->
                                    <!--<li><p>City</p> <span>Hyderabad<hr></span></li>-->
                                    <!--<li><p>State</p> <span>Telangana<hr></span></li>-->
                                    <!--<li><p>Furinished Status</p><span> <?php echo $row['commercialfurinished']; ?><hr></span></li>-->
                                    <li style="width:100% !important;"><p>Suitable For</p><span><?php echo $row['suitablefor']; ?><hr></span></li>
                                    @else
                                    <li><p>Property Type</p> <span><?php echo get_sub_cat_name($row['subcategoryid']); ?><hr></span></li>
                                    <!--<li><p>Hot Property</p> <span><?php echo $row['hotproperty']; ?><hr></span></li>-->
                                    <li><p>Plot Area</p> <span><?php echo $row['plotarea']; ?><hr></span></li>
                                    <!-- <li>Landmark:  <span>Near</span></li> -->
                                    <li><p>Maintenance</p> <span><?php echo $row['maintenance']; ?><hr></span></li>
                                    <li><p>Deposit</p> <span><?php echo $row['deposit']; ?><hr></span></li>
                                    <li><p>Lock In-(Months)</p> <span><?php echo $row['lockin']; ?><hr></span></li>
                                    <li><p>Built Up Area</p> <span><?php echo $row['builtuparea']; ?><hr></span></li>
                                    <li><p>Available From</p> <span><?php echo $row['availablefrom']; ?><hr></span></li>
                                    <li><p>Available Date</p><span><?php echo $row['availabledate']; ?><hr></span></li>
                                    <li><p>DG Backup</p> <span><?php echo $row['dgbackup']; ?><hr></span></li>
                                    <li><p>Floor</p> <span><?php echo $row['floor']; ?><hr></span></li>
                                    <li><p>Total Floors</p> <span><?php echo $row['totalfloors']; ?><hr></span></li>
                                    <li><p>AC</p> <span><?php echo $row['ac']; ?><hr></span></li>
                                    <li><p>NO. of Car Parking</p> <span><?php echo $row['carparking']; ?><hr></span></li>
                                    <li><p>Lift</p><span><?php echo $row['lift']; ?><hr></span></li>
                                    <li><p>Security</p> <span><?php echo $row['security']; ?><hr></span></li>
                                    <li><p>Onsite Manager</p><span><?php echo $row['onsitemanager']; ?><hr></span></li>
                                    <li><p>No. of Bathrooms</p> <span><?php echo $row['bathrooms']; ?><hr></span></li>
                                    <li><p>Age(Years)</p><span><?php echo $row['age']; ?><hr></span></li>
                                    <!--<li><p>Carpet Area</p> <span><?php echo $row['carpetarea']; ?>sft<hr></span></li>-->
                                    <li><p>Property Facing</p><span><?php echo $row['propertyfacing']; ?><hr></span></li> 
                                    <li><p>Work Stations</p><span><?php echo $row['workstations']; ?><hr></span></li>
                                    <li><p>Commercial Subtype</p> <span><?php echo $row['commercialsubtype']; ?><hr></span></li>
                                    <li><p>Coomercial Furinished</p><span><?php echo $row['commercialfurinished']; ?><hr></span></li>
                                    <li><p>Manager Cabins</p> <span><?php echo $row['managercabins']; ?><hr></span></li>
                                    <li><p>Discussion Rooms</p> <span><?php echo $row['discussionrooms']; ?><hr></span></li>
                                    <li><p>Conference Rooms</p><span><?php echo $row['conferencerooms']; ?><hr></span></li>
                                    <li><p>Boardroom</p><span><?php echo $row['boardrooms']; ?><hr></span></li>
                                    <li><p>Reception</p><span><?php echo $row['reception']; ?><hr></span></li>
                                    <li><p>Pantry</p><span><?php echo $row['pantry']; ?><hr></span></li>
                                    <li><p>Lunch Room</p><span><?php echo $row['lunchroom']; ?><hr></span></li>
                                    <li><p>Server Room</p><span><?php echo $row['serverroom']; ?><hr></span></li>
                                    <!--<li><p>Property ID</p><span><?php echo $row['propertyid']; ?><hr></span></li>-->
                                    <li><p> Location in City</p><span><?php echo $row['location']; ?><hr></span></li>
                                    <li><p>City</p> <span>Hyderabad<hr></span></li>
                                    <li><p>State</p> <span>Telangana<hr></span></li>
                                    <li><p>Landmark</p> <span><?php echo $row['landmark']; ?><hr></span></li>
                                    <li><p>Age(Years)</p><span> <?php echo $row['age']; ?><hr></span></li>
                                    <li><p>Furinished Status</p><span> <?php echo $row['commercialfurinished']; ?><hr></span></li>
                                    <li style="width:100% !important;"><p>Suitable For</p><span><?php echo $row['suitablefor']; ?><hr></span></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="amenities-box content-widget">
                                <div class="title-box">
                                    <h4>Amenities</h4>
                                </div>
                                <?php
                                    $amenitieslist = $row['amenities'];
                                    $amenities= explode(',', $amenitieslist);
                                    $amenities_array = array('Air Conditioning','Balcony','Basketball Courts','Club House','DG Back Up 100%','DG Backup','Lift','Lunch Area','OnSite Manager',
                                    'Party Hall','Security','Servant Room','Swimming Pool');
                                ?>
                                <ul class="list clearfix">
                                    
                                      <?php if(!empty($row['dgbackup'])){ ?>
                                    <li>DG Backup: <?php echo $row['dgbackup']; ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['ac'])){ ?>
                                    <li>AC: <?php echo $row['ac']; ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['carparking'])){ ?>
                                    <li>No. of Car Parking: <?php echo $row['carparking']; ?></li>
                                    <?php } ?>
                                    
                                    
                                    <?php if(!empty($row['lift'])){ ?>
                                    <li>Lift : <?php echo $row['lift']; ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['security'])){ ?>
                                    <li>Security : <?php echo $row['security']; ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['onsitemanager'])){ ?>
                                    <li>Onsite Manager : <?php echo $row['onsitemanager']; ?></li>
                                    <?php } ?>
                                     <?php if(!empty($row['lunchroom'])){ ?>
                                    <li>Lunch Room : <?php echo $row['lunchroom']; ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['clinic'])){ ?>
                                    <li>Clinic : <?php echo $row['clinic']; ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['petsallowed'])){ ?>
                                    <li>Pets Allowed : <?php echo $row['petsallowed']; ?></li>
                                    <?php } ?>
                                    
                                    
                                    <?php if(!empty($row['clubhouse'])){ ?>
                                    <li>club house : <?php echo $row['clubhouse']; ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['pool'])){ ?>
                                    <li>Pool : <?php echo $row['pool']; ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['tennis'])){ ?>
                                    <li>Tennis Court : <?php echo $row['tennis']; ?></li>
                                    <?php } ?>
                                    
                                   
                                    
                                    <?php if(!empty($row['grocerystore'])){ ?>
                                    <li>Grocery Store : <?php echo $row['grocerystore']; ?></li>
                                    <?php } ?>
                                <?php foreach ($amenities as $amenity){ ?>
                                    <!--<li><?php echo $amenity; ?></li>-->
                                <?php } ?>
                                
                                </ul>
                                 <!--<ul class="list clearfix">-->
                                <?php 
                                foreach($amenities_array as $key => $val){ ?>
                                      <!--<li><s><?php //echo $val?></s></li>-->
                                     <?php }  ?>
                                    
                                    
                                  
                                <!--</ul>-->
                                
                              
                            </div>
                             <?php if(!empty($row->file) && $row->file != []){ ?>
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
                            <?php  } ?>
                            <?php if(!empty($row['landmark_gps'])){ ?>
                            <div class="location-box content-widget">
                                <div class="title-box">
                                    <h4>Landmark GPS Location</h4>
                                </div>
                                <div class="google-map-area">
                                    <!-- <div class="google-map" id="contact-google-map" data-map-lat="40.712776"
                                        data-map-lng="-74.005974" data-icon-path="{{url('/')}}/webassets/images/icons/map-marker.png"
                                        data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="12"
                                        data-markers='{
                                            "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","{{url('/')}}/webassets/images/icons/map-marker.png"]
                                        }'>

                                    </div> -->
                                    
                                    <?php 
                                    $loc = str_replace('width="600"','width="100%"',$row['landmark_gps']);
                                    echo $loc; 
                                    
                                    ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(!empty($row['video_url'])){ ?>
                            <div class="location-box content-widget">
                                <div class="title-box">
                                    <h4>Video</h4>
                                </div>
                                <div class="google-map-area">
                                   <?php echo $row['video_url']; ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
					<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
					<div class="property-sidebar default-sidebar">
                            <div class="author-widget sidebar-widget">
                                <div class="author-box text-center" style="padding-left: 0px !important;">
                                    <div class="inner">
                                        <h4>Property Enquiry Form</h4>
                                        <p>Are you interested in this property?</p>
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
                                <a href="tel:+91-7799708814" style="color:#fff;font-size:20px;">+91-7799708814</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="similar-content">
                    <div class="title">
                        <h4>Similar Properties</h4>
                    </div>
                    <div class="row clearfix">
                        
                        
                            
                        
                        
                        @foreach($commercial as $val)
                        @if($val->location == $row['location'])
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                        @php
                                           $pic1 = explode(",",$row->proimages);         
                                        @endphp

                                    <figure class="image"><img src="{{url('/')}}/{{$pic1[0]}}" alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">{{ get_category_name($val->categoryid) }}</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            <figure class="author-thumb"><img src="{{url('/')}}/webassets/images/map.png" alt=""></figure>
                                            <h6>{{get_city_name($val->location)}}</h6>
                                        </div>
                                        <div class="buy-btn pull-right"><a href="{{url('/')}}/commercial_details/{{ $val->id}}"><?php echo $row['leadtype']; ?></a></div>
                                    </div>
                                  
                                    <div class="title-text"><h4><a href="{{url('/')}}/commercial_details/{{ $val->id}}"> {{ $val->propertyname}} <br> {{ $row->builtuparea}} Built Up Area, {{get_sub_cat_name($row->subcategoryid)}} <br/><?php echo $row['propertyid']; ?></a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>₹<?php echo $val['totalprice']; ?>.00</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <!-- <li><a href="property-details.html"><i class="icon-12"></i></a></li> -->
                                            <!--<li><a href="#"><i class="icon-13"></i></a></li>-->
                                        </ul>
                                    </div>
                                    
                                    <p><?php echo mb_strimwidth($val['description'], 0, 120, '...'); ?>.</p>
                                    
                                    <div class="btn-box"><a href="{{url('/')}}/commercial_details/{{ $val->id}}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endif
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
    <!--<script src="{{url('/')}}/webassets/js/timePicker.js"></script>-->

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{url('/')}}/webassets/js/gmaps.js"></script>
    <script src="{{url('/')}}/webassets/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="{{url('/')}}/webassets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>