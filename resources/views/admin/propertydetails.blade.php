@include("admin/header")

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Property Details
                                        <small>Welcome to admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <!-- Breadcrumb start -->
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">My properties</li>
                                </ol>
                                <!-- Breadcrumb end -->
                            </div>
                            @include('flash-message')
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        
                            <div class="property-admin">
                                <div class="property-section section-sm">
                                    <div class="row ratio_55 property-grid-2 property-map map-with-back">
                                        <div class="col-xl-12 col-md-12 xl-12">
                                            <div class="property-box">
                                                <div class="row property-details d-flex">
                                                    <div class="top-details clearfix">
                                                        <div class="left-column pull-left clearfix">
                                                            <h3>({{$prodata->propertyid ?? ''}}) {{$prodata->propertyname ?? ''}}</h3>
															<p>{{$prodata->location ?? ''}}, {{$prodata->landmark ?? ''}} </p>
                                                            <div class="author-info clearfix">
                                                                <!-- <div class="author-box pull-left"> -->
                                                                    <!-- <h6><img src="assets/images/map.png" width="23%" -->
                                                                            <!-- height="23%" alt="map img" /> Hitech City -->
                                                                    <!-- </h6> -->
                                                                <!-- </div> -->

                                                            </div>
                                                        </div>
                                                        <div class="right-column pull-right clearfix">
                                                            <div class="price-inner clearfix d-flex"
                                                                style="align-items:center;">
                                                                <div class="labels-left">
                                                                    <div>
                                                                        <span class="label label-success"
                                                                            style="font-size:100% !important;">Availble</span>
                                                                        <span class="label label-dark"
                                                                            style="font-size:100% !important;">for
                                                                            {{$prodata->leadtype ?? ''}}</span>
                                                                    </div>

                                                                </div>
                                                                <div class="price-box pull-right">
                                                                    <h3 class="price"
                                                                        style="color:#31b14a;margin-left:5px;">
                                                                        ₹{{$prodata->totalprice ?? ''}} <span>/ start From</span></h3>
                                                                </div>
                                                            </div>
                <!--                                            <ul class="other-option pull-right clearfix d-flex" style="align-items:center;">-->
                <!--                                                <li> <div class="author-box pull-left">-->
                                                                    <!-- <h6><img src="assets/images/map.png" width="23%" -->
                                                                            <!-- height="23%" alt="map img" /> Hitech City -->
                                                                    <!-- </h6> -->
                <!--                                                </div></li>-->
																<!-- <li><a class="hero-detail"-->
                <!--                                                        href="#"><i-->
                <!--                                                            class="fa fa-share-alt"></i></a></li>-->
																<!--<li><a class="hero-detail"-->
                <!--                                                        href="#"><i class="fas fa-pen"></i></a></li>-->
                <!--                                                <li><a class="hero-detail"-->
                <!--                                                        href="#"><i-->
                <!--                                                            class="fa fa-print"></i></a></li>-->
                <!--                                                <li><a class="hero-detail"-->
                <!--                                                        href="#"><i-->
                <!--                                                            class="fa fa-heart"></i></a></li>-->
                <!--                                            </ul>-->
                
                <ul class="other-option pull-right clearfix d-flex" style="align-items:center;">
                     @if(auth()->user()->type == 'super_admin')
                     @if($prodata->approval==0)
                     Approval Property:&nbsp;&nbsp; <li> <div class="author-box pull-left">
                                                   <form method="post" action="{{ route('admin.approval.property') }}">
                                                                @csrf
                                                                <input type="hidden" name="idname" value="<?=$prodata->id;?>">
                                                                <input type="hidden" name="cat" value="<?=$prodata->categoryid;?>">
                                                                <input onChange="this.form.submit()" type="checkbox" name="feature"
                                                                    id="status_f<?=$prodata->id;?>" class="check"
                                                                    value="<?php if($prodata->approval==0){echo '1';}else{echo '0';}?>"
                                                                    <?php if($prodata->approval==1)echo 'checked';?>>
                                                                <label for="status_f<?=$prodata->id;?>" class="checktoggle">checkbox</label>
                                                            </form>
                                                </div></li>
                                               @endif     @endif               
                       Hot Property:&nbsp;&nbsp; <li><div class="author-box pull-left">
                                                                    @if(auth()->user()->type == 'super_admin')
                                                                   <form method="post" action="{{ route('admin.status.favourites.property') }}">
                                                                       	@elseif(auth()->user()->type == 'admin')
                                                                       	 <form method="post" action="{{ route('user.admin.status.favourites.property') }}">
                                                                       	      @endif
                                                            @csrf
                                                                <input type="hidden" name="idname" value="<?=$prodata->id;?>">
                                                                <input type="hidden" name="cat" value="<?=$prodata->categoryid;?>">
                                                                <input onChange="this.form.submit()" type="checkbox" name="feature"
                                                                    id="status_f<?=$prodata->id;?>" class="check"
                                                                    value="<?php if($prodata->favourites==0){echo '1';}else{echo '0';}?>"
                                                                    <?php if($prodata->favourites==1)echo 'checked';?>>
                                                                <label for="status_f<?=$prodata->id;?>" class="checktoggle">checkbox</label>
                                                            </form>
                                                                </div></li>
                                                                
                                                                Property Enable/Disable Status:&nbsp;&nbsp;<li> <div class="author-box pull-left">
                                                                    @if(auth()->user()->type == 'super_admin')
                                                                  <form method="post" action="{{ route('admin.status.property') }}">
                                                                      	@elseif(auth()->user()->type == 'admin')
                                                                      	<form method="post" action="{{ route('user.admin.status.property') }}">
                                                                      	@endif
                                                            @csrf
                                                                <input type="hidden" name="idname" value="<?=$prodata->id;?>">
                                                                <input type="hidden" name="cat" value="<?=$prodata->categoryid;?>">
                                                                <input onChange="this.form.submit()" type="checkbox" name="feature"
                                                                    id="status_a<?=$prodata->id;?>" class="check"
                                                                    value="<?php if($prodata->status==0){echo '1';}else{echo '0';}?>"
                                                                    <?php if($prodata->status==1)echo 'checked';?>>
                                                                <label for="status_a<?=$prodata->id;?>" class="checktoggle">checkbox</label>
                                                            </form>

                                                                </div></li>
                                                                 @if(auth()->user()->type == 'super_admin')
																 <li><a class="hero-detail"
                                                                        href="{{ route('admin.update.property', [$prodata->id, $prodata->categoryid]) }}"><span class="label label-success"
                                                                            style="font-size:100% !important;"><i
                                                                            class="fa fa-pen"></i> Edit</span></a></li>
                                                                            	@elseif(auth()->user()->type == 'admin')
                                                                            	<li><a class="hero-detail"
                                                                        href="{{ route('user.admin.update.property', [$prodata->id, $prodata->categoryid]) }}"><span class="label label-success"
                                                                            style="font-size:100% !important;"><i
                                                                            class="fa fa-pen"></i> Edit</span></a></li>
                                                                            		@endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<div class="col-xl-12 col-md-12 xl-12 mt-4">
                                            
                                            @php
                                               $pic = explode(", ",$prodata->proimages);         
                                            @endphp
    
                                            <div class="property-box">
                                                <div class="row property-details d-flex">
                                                    <div id="carouselExampleIndicators"
                                                                                    class="carousel slide">
                                                        
                                                                                    <div class="carousel-indicators">
                                                                                        
                                                                                        
                                                                                        @foreach($pic as $key=>$p)  
                                                                                          @if(!empty($p))
                                                                                        <button type="button"
                                                                                            data-bs-target="#carouselExampleIndicators"
                                                                                            data-bs-slide-to="{{$key}}"
                                                                                            class="{{ ++$key == 1 ? 'active':''}}"
                                                                                            aria-current="{{ ++$key == 1 ? 'true':''}}"
                                                                                            aria-label="Slide {{++$key}}"></button>
                                                                                             @endif
                                                                                        @endforeach
                                                                                            
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="carousel-inner">
                                                                                        
                                                                                        @foreach($pic as $key=>$p)
                                                                                        @if(!empty($p))
                                                                                            <div class="carousel-item {{ ++$key == 1 ? 'active':''}}">
                                                                                            <img src="{{url('/')}}/{{$p}}"
                                                                                                class="d-block w-100"
                                                                                                alt="..." style="height: 500px;">
                                                                                            </div>
                                                                                            @endif
                                                                                        @endforeach
                                                                                        
                                                                                    </div>
                                                                                    <button
                                                                                        class="carousel-control-prev"
                                                                                        type="button"
                                                                                        data-bs-target="#carouselExampleIndicators"
                                                                                        data-bs-slide="prev">
                                                                                        <span
                                                                                            class="carousel-control-prev-icon"
                                                                                            aria-hidden="true"></span>
                                                                                        <span
                                                                                            class="visually-hidden">Previous</span>
                                                                                    </button>
                                                                                    <button
                                                                                        class="carousel-control-next"
                                                                                        type="button"
                                                                                        data-bs-target="#carouselExampleIndicators"
                                                                                        data-bs-slide="next">
                                                                                        <span
                                                                                            class="carousel-control-next-icon"
                                                                                            aria-hidden="true"></span>
                                                                                        <span
                                                                                            class="visually-hidden">Next</span>
                                                                                    </button>
                                                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 xl-12 col-md-12 mt-4">
                                            <div class="about-profile">
                                                <div class="about-info">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <nav class="d-flex justify-content-start">
                                                                <div class="nav nav-tabs mb-3" id="nav-tab"
                                                                    role="tablist">
                                                                    <button class="nav-link active"
                                                                        id="nav-PropertyDescription-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#nav-PropertyDescription"
                                                                        type="button" role="tab"
                                                                        aria-controls="nav-PropertyDescription"
                                                                        aria-selected="true">Property
                                                                        Description</button>
                                                                    <button class="nav-link"
                                                                        id="nav-PropertyDetails-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#nav-PropertyDetails"
                                                                        type="button" role="tab"
                                                                        aria-controls="nav-PropertyDetails"
                                                                        aria-selected="false">Property Details</button>
                                                                    <button class="nav-link" id="nav-Gallery-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#nav-Gallery" type="button"
                                                                        role="tab" aria-controls="nav-Gallery"
                                                                        aria-selected="false" hidden>Gallery</button>
                                                                    <button class="nav-link" id="nav-Amenities-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#nav-Amenities" type="button"
                                                                        role="tab" aria-controls="nav-Amenities"
                                                                        aria-selected="false">Amenities</button>
                                                                    <button class="nav-link" id="nav-Location-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#nav-Location" type="button"
                                                                        role="tab" aria-controls="nav-Location"
                                                                        aria-selected="false">Property GPS Location</button>
                                                                        <button class="nav-link" id="nav-Location-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#nav-landmark-Location" type="button"
                                                                        role="tab" aria-controls="nav-landmark-Location"
                                                                        aria-selected="false"> Landmark GPS Location</button>
                                                                        
																	<button class="nav-link" id="nav-landmark-Location-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#nav-floorplane" type="button"
                                                                        role="tab" aria-controls="nav-floorplane"
                                                                        aria-selected="false">Floor Plan</button>
                                                                        
                                                                        <button class="nav-link" id="nav-landmarkvideo-tab"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#nav-landmarkvideo" type="button"
                                                                        role="tab" aria-controls="nav-landmarkvideo"
                                                                        aria-selected="false">Video</button>
                                                                </div>
                                                            </nav>
                                                            <hr style="margin-top:0px !important;"/>


                                                            <div class="row">
                                                                <div class="col-lg-12 amenities-box content-widget">
                                                                    <div class="tab-content" id="nav-tabContent">
                                                                        <div class="tab-pane active"
                                                                            id="nav-PropertyDescription" role="tabpanel"
                                                                            aria-labelledby="nav-PropertyDescription-tab">
                                                                            <p style="font-size: 16px;">{{$prodata->description}}</p>
                                                                        </div>

                                                                        <div class="tab-pane" id="nav-PropertyDetails"
                                                                            role="tabpanel"
                                                                            aria-labelledby="nav-PropertyDetails-tab">
                                                                            <!-- Property details content -->
                                                                            <div class="row">
                                                                                <ul class="col-lg-12 list clearfix">
                                                                                    <li>Property ID: <span> {{$prodata->propertyid}}</span>
                                                                                    </li>
                                                                                    <li>Executive Name: <span>{{$prodata->executivename}}</span></li>
                                                                                    <li>Data Provided Date: <span>{{$prodata->date}}</span></li>
                                                                                    <!-- <li>Landmark:  <span>Near</span></li> -->
                                                                                    <li>Owner Name: <span>{{$prodata->ownername}}</span>
                                                                                    </li>
                                                                                    <li>Contact #1: <span>{{$prodata->ownernumber}}</span>
                                                                                    </li>
                                                                                    <li>Contact #2: <span>{{$prodata->contact_two}}</span>
                                                                                    </li>
                                                                                    <li>Email:<span>{{$prodata->email}}</span></li>
                                                                                    <li>Supervisor Name:<span>{{$prodata->supervisorname}}</span></li>
                                                                                    <li>Supervisor Contact#:<span>{{$prodata->supervisornumber}}</span></li>
                                                                                    <li>Source: <span>{{$prodata->source}}</span>
                                                                                    <li>No. of Bathrooms: <span><?php echo $prodata->bathrooms; ?></span></li>
                                                                                    <!--<li>Website ID: <span>{{ $prodata->websiteid }}</span></li>-->
                                                                                    <!--<li>Carpet Area: <span>{{ $prodata->carpetarea }}</span></li>-->
                                                                                   
                                                                                    <li>Lead Type: <span>{{ $prodata->leadtype }}</span></li>
                                                                                    <li>Property type:<span>{{ get_cat_name($prodata->categoryid) }}</span></li>
                                                                                    <li>Service Charge Details:<span>{{ $prodata->servicecharge }}</span></li>
                                                                                    <!--<li>Hot Property: <span>{{ $prodata->hotproperty }}</span></li>-->
                                                                                    <li>S&M Property: <span>{{ $prodata->smproperty }}</span></li>
                                                                                    <li>Location in City: <span>{{ get_city_name($prodata->location) }}</span></li>
                                                                                    <li>Building Name: <span>{{ $prodata->building_name }}</span></li>
                                                                                     <li>Unit:<span>{{ $prodata->unit }}</span></li>
                                                                                    <li>Landmark: <span>{{ $prodata->landmark }}</span></li>
                                                                                    <li>Total price:<span>₹{{ $prodata->totalprice }}</span></li>
                                                                                    <li>Price Per Sft: <span>₹{{ $prodata->pricepersft }}</span></li>
                                                                                    <li>Maintence(Sft/Tot):<span>{{ $prodata->maintenance }}</span></li>
                                                                                    <li>Deposit (Months): <span>{{ $prodata->deposit }}</span></li>
                                                                                    <li>Lock-In(Months): <span>{{ $prodata->lockin }}</span></li>
                                                                                    <li>Built Up Area: <span>{{ $prodata->builtuparea }}</span></li>
                                                                                    <li>Available From: <span>{{ $prodata->availablefrom }}</span></li>
                                                                                    <li>Available Date: <span>{{ $prodata->availabledate }}</span></li>
                                                                                    <!--<li>DG Backup: <span>{{ $prodata->dgbackup }}</span></li>-->
                                                                                    <!--<li>AC: <span>{{ $prodata->ac }}</span></li>-->
                                                                                    <li>Floor: <span>{{ $prodata->floor }}</span></li>
                                                                                    <li>Total Floors: <span>{{ $prodata->totalfloors }}</span></li>
                                                                                    <!--<li>No .of car parking:<span>{{ $prodata->carparking }}</span></li>-->
                                                                                    <!--<li>Lift: <span> {{ $prodata->lift }}</span></li>-->
                                                                                    <!--<li>Security: <span>{{ $prodata->security }}</span></li>-->
                                                                                    <!--<li>Onsite manager: <span>{{ $prodata->onsitemanager }}</span></li>-->
                                                                                    <li>Age( Years):<span> {{ $prodata->age }}</span></li>
                                                                                    @if(Request::segment(4) != 1)
                                                                                     @php
                                                                                       $name = DB::table('tblsubcategory')->where('id',$prodata->subcategoryid)->first();
                                                                                       @endphp
                                                                                    <li>Commercial Sub Type: <span>{{ $name->subcategoryname }}</span></li>
                                                                                    <li>Commercial Furinished: <span>{{ $prodata->commercialfurinished }}</span></li>
                                                                                    <li>No. of Work Stations: <span>{{ $prodata->workstations }}</span></li>
                                                                                    <li>No. of Manager Cabins: <span>{{ $prodata->managercabins }}</span></li>
                                                                                     <li>No. of Discussion Rooms: <span>{{ $prodata->discussionrooms }}</span></li>
                                                                                      <li>No. of Conference Rooms: <span>{{ $prodata->conferencerooms }}</span></li>
                                                                                      <li>Boardroom (Capacity): <span>{{ $prodata->boardrooms }}</span></li>
                                                                                      <li>Reception: <span>{{ $prodata->reception }}</span></li>
                                                                                      <li>Pantry: <span>{{ $prodata->pantry }}</span></li>
                                                                                      <li>Server Room: <span>{{ $prodata->serverroom }}</span></li>
                                                                                      <li>Lead Time(days)(If Business Park): <span>{{ $prodata->leadtime }}</span></li>
                                                                                      <!--<li>Liable Upto (If Business Park): <span>{{ $prodata->liableupto }}</span></li>-->
                                                                                      <li>Plot Area (Sq Yards): <span>{{ $prodata->plotarea }}</span></li>
                                                                                      <li>Carpet Area(Sft): <span>{{ $prodata->carpetarea }}</span></li>
                                                                                      <li>Liable Upto (If Business Park): <span>{{ $prodata->liableupto }}</span></li>
                                                                                    @endif
                                                                                     <li>Property Facing: <span>{{ $prodata->propertyfacing }}</span></li>
                                                                                    <li>Key Available: <span>{{ $prodata->keyavailable }}</span></li>
                                                                                    
                                                                                    
                                                                                    @if(Request::segment(4) != 2)
                                                                                    <li>No.of Bathrooms: <span> {{ $prodata->bathrooms }}</span></li>
                                                                                    <li>Age( Years):<span> {{ $prodata->age }}</span></li>
                                                                                    <li>Plot Area(Sq Yards): <span>{{ $prodata->plotarea }}</span></li>
                                                                                    <li>Carpet Area(sft):<span>{{ $prodata->carpetarea }}</span></li>
                                                                                     <li>Property Facing: <span>{{ $prodata->propertyfacing }}</span></li>
                                                                                       <li>Keys Available: <span>{{ $prodata->keyavailable }}</span></li>
                                                                                       @php
                                                                                       $name = DB::table('tblsubcategory')->where('id',$prodata->subcategoryid)->first();
                                                                                       @endphp
                                                                                     <li>Residential Subtype:<span> {{ $name->subcategoryname}}</span></li>
                                                                                    <li>Residential Furnished:<span>{{ $prodata->residentialfurinished }}</span></li>
                                                                                    <li>Other Community:<span>{{ $prodata->othercommunity }}</span></li>
                                                                                    <li>Geyser: <span> {{ $prodata->geysers }}</span></li>
                                                                                    <!--<li>Clinic: <span>{{ $prodata->clinic }}</span></li>-->
                                                                                    <li>Servant Room: <span> {{ $prodata->servantroom }}</span></li>
                                                                                    <!--<li>Pets Allowed:<span>{{ $prodata->petsallowed }}</span></li>-->
                                                                                    <!--<li>Club House: <span> {{ $prodata->clubhouse }}</span></li>-->
                                                                                    <li>Duplex: <span>{{ $prodata->duplex }}</span></li>
                                                                                    <!--<li>Pool: <span> {{ $prodata->pool }}</span></li>-->
                                                                                    <!--<li>Tennis Court:<span>{{ $prodata->tennis }}</span></li>-->
                                                                                    <!--<li>Grocery Store: <span>{{ $prodata->grocerystore }}</span>-->
                                                                                     <li>No.of BHK: <span>{{ $prodata->communitydetails }}</span>
                                                                                     <li>Wardrobes: <span>{{ $prodata->wardrobes }}</span>
                                                                                     <li>Bachelors Allowed: <span>{{ $prodata->bachelors }}</span>
                                                                                    @endif
                                                                                    </li>
                                                                                     <li>Suitable For: <span>{{ $prodata->suitablefor }}</span></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <div class="tab-pane" id="nav-Gallery"
                                                                            role="tabpanel"
                                                                            aria-labelledby="nav-Gallery-tab">
                                                                            <!-- Gallery content -->
                                                                            <div class="col-sm-12 col-md-12">
                                                                                <div id="carouselExampleIndicators"
                                                                                    class="carousel slide">
                                                                                    <div class="carousel-indicators">
                                                                                        <button type="button"
                                                                                            data-bs-target="#carouselExampleIndicators"
                                                                                            data-bs-slide-to="0"
                                                                                            class="active"
                                                                                            aria-current="true"
                                                                                            aria-label="Slide 1"></button>
                                                                                        <button type="button"
                                                                                            data-bs-target="#carouselExampleIndicators"
                                                                                            data-bs-slide-to="1"
                                                                                            aria-label="Slide 2"></button>
                                                                                        <button type="button"
                                                                                            data-bs-target="#carouselExampleIndicators"
                                                                                            data-bs-slide-to="2"
                                                                                            aria-label="Slide 3"></button>
                                                                                        <button type="button"
                                                                                            data-bs-target="#carouselExampleIndicators"
                                                                                            data-bs-slide-to="3"
                                                                                            aria-label="Slide 4"></button>
                                                                                    </div>
                                                                                    <div class="carousel-inner">
                                                                                        <div
                                                                                            class="carousel-item active">
                                                                                            <img src="assets/images/property/3.jpg"
                                                                                                class="d-block w-100"
                                                                                                alt="...">
                                                                                        </div>
                                                                                        <div class="carousel-item">
                                                                                            <img src="assets/images/property/4.jpg"
                                                                                                class="d-block w-100"
                                                                                                alt="...">
                                                                                        </div>
                                                                                        <div class="carousel-item">
                                                                                            <img src="assets/images/property/5.jpg"
                                                                                                class="d-block w-100"
                                                                                                alt="...">
                                                                                        </div>
                                                                                        <div class="carousel-item">
                                                                                            <img src="assets/images/property/6.jpg"
                                                                                                class="d-block w-100"
                                                                                                alt="...">
                                                                                        </div>
                                                                                    </div>
                                                                                    <button
                                                                                        class="carousel-control-prev"
                                                                                        type="button"
                                                                                        data-bs-target="#carouselExampleIndicators"
                                                                                        data-bs-slide="prev">
                                                                                        <span
                                                                                            class="carousel-control-prev-icon"
                                                                                            aria-hidden="true"></span>
                                                                                        <span
                                                                                            class="visually-hidden">Previous</span>
                                                                                    </button>
                                                                                    <button
                                                                                        class="carousel-control-next"
                                                                                        type="button"
                                                                                        data-bs-target="#carouselExampleIndicators"
                                                                                        data-bs-slide="next">
                                                                                        <span
                                                                                            class="carousel-control-next-icon"
                                                                                            aria-hidden="true"></span>
                                                                                        <span
                                                                                            class="visually-hidden">Next</span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="tab-pane" id="nav-Amenities"
                                                                            role="tabpanel"
                                                                            aria-labelledby="nav-Amenities-tab">
                                                                            <!-- Amenities content -->
                                                                            <div
                                                                                class="col-lg-12 amenities-box content-widget">
                                                                                
                                                                                <?php
                                                                                    $amenitieslist = $prodata['amenities'];
                                                                                    $amenities= explode(',', $amenitieslist);
                                                                                ?>
                                                                                
                                                                                <ul class="list clearfix">
                                                                                      <?php if(!empty($prodata['dgbackup'])){ ?>
                                                                                    <li>DG Backup: <?php echo $prodata['dgbackup']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['ac'])){ ?>
                                                                                    <li>AC: <?php echo $prodata['ac']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['carparking'])){ ?>
                                                                                    <li>No. of Car Parking: <?php echo $prodata['carparking']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    
                                                                                    <?php if(!empty($prodata['lift'])){ ?>
                                                                                    <li>Lift : <?php echo $prodata['lift']; ?></li>
                                                                                    <?php } ?>
                                                                                    <?php if(!empty($prodata['lunchroom'])){ ?>
                                                                                    <li>Lunch Room : <?php echo $prodata['lunchroom']; ?></li>
                                                                                    <?php } ?>
                                                                                    <?php if(!empty($prodata['security'])){ ?>
                                                                                    <li>Security : <?php echo $prodata['security']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['onsitemanager'])){ ?>
                                                                                    <li>Onsite Manager : <?php echo $prodata['onsitemanager']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['clinic'])){ ?>
                                                                                    <li>Clinic : <?php echo $prodata['clinic']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['petsallowed'])){ ?>
                                                                                    <li>Pets Allowed : <?php echo $prodata['petsallowed']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['clubhouse'])){ ?>
                                                                                    <li>club house : <?php echo $prodata['clubhouse']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['pool'])){ ?>
                                                                                    <li>Pool : <?php echo $prodata['pool']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['tennis'])){ ?>
                                                                                    <li>Tennis : <?php echo $prodata['tennis']; ?></li>
                                                                                    <?php } ?>
                                                                                    
                                                                                    <?php if(!empty($prodata['grocerystore'])){ ?>
                                                                                    <li>Grocery Store : <?php echo $prodata['grocerystore']; ?></li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                                
                                                                                <ul class="list clearfix" hidden>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/air.png"
                                                                                            alt="" />Air
                                                                                        Conditioning</li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/balcony.png"
                                                                                            alt="" />Balcony</li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/basketball.png"
                                                                                            alt="" />Basketball Courts
                                                                                    </li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/club.png"
                                                                                            alt="" />Club House</li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/backup.png"
                                                                                            alt="" /> DG Backup</li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/lift.png"
                                                                                            alt="" />Lift </li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/lunch.png"
                                                                                            alt="" /> Lunch Area</li>
                                                                                    <li> <img class="hero-imgs"
                                                                                            src="assets/images/manager.png"
                                                                                            alt="" />OnSite Manager</li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/hall.png"
                                                                                            alt="" /> Party Hall</li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/security.png"
                                                                                            alt="" /> Security</li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/maid.png"
                                                                                            alt="" /> Servant Room</li>
                                                                                    <li><img class="hero-imgs"
                                                                                            src="assets/images/swimming-pool.png"
                                                                                            alt="" /> Swimming Pool</li>
                                                                                </ul>

                                                                            </div>
                                                                        </div>

                                                                        <div class="tab-pane" id="nav-Location"
                                                                            role="tabpanel"
                                                                            aria-labelledby="nav-Location-tab">
                                                                            <!-- Location content -->
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-lg-12 amenities-box content-widget">
                                                                                    <ul class="list clearfix" hidden>
                                                                                        <li>Address: <span>Virginia
                                                                                                temple hills</span></li>
                                                                                        <li>Country: <span>United
                                                                                                State</span></li>
                                                                                        <li>State/county:
                                                                                            <span>California</span></li>
                                                                                        <li>Neighborhood:
                                                                                            <span>Andersonville</span>
                                                                                        </li>
                                                                                        <li>Zip Code: <span>33333</span>
                                                                                        </li>
                                                                                        <li>City: <span>Brooklyn</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div class="responsive-map">
                                                                                        <!--iframe
                                                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889"
                                                                                            width="100%" height="300"
                                                                                            frameborder="0"
                                                                                            style="border:0"
                                                                                            allowfullscreen></iframe>-->
                                                                                            
                                                                                            <?php 
                                                                                            $loc = str_replace('width="600"','width="100%"',$prodata['locations']);
                                                                                            echo $loc; 
                                                                                            
                                                                                            ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                        
                                                                        <div class="tab-pane" id="nav-landmark-Location"
                                                                            role="tabpanel"
                                                                            aria-labelledby="nav-landmark-Location-tab">
                                                                            <!-- Location content -->
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-lg-12 amenities-box content-widget">
                                                                                    <ul class="list clearfix" hidden>
                                                                                        <li>Address: <span>Virginia
                                                                                                temple hills</span></li>
                                                                                        <li>Country: <span>United
                                                                                                State</span></li>
                                                                                        <li>State/county:
                                                                                            <span>California</span></li>
                                                                                        <li>Neighborhood:
                                                                                            <span>Andersonville</span>
                                                                                        </li>
                                                                                        <li>Zip Code: <span>33333</span>
                                                                                        </li>
                                                                                        <li>City: <span>Brooklyn</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div class="responsive-map">
                                                                                        <!--iframe
                                                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889"
                                                                                            width="100%" height="300"
                                                                                            frameborder="0"
                                                                                            style="border:0"
                                                                                            allowfullscreen></iframe>-->
                                                                                            
                                                                                            <?php 
                                                                                            $loc = str_replace('width="600"','width="100%"',$prodata['landmark_gps']);
                                                                                            echo $loc; 
                                                                                            
                                                                                            ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                       
    																	<div class="tab-pane" id="nav-floorplane"
                                                                                role="tabpanel"
                                                                                aria-labelledby="nav-floorplane-tab">
                                                                                <!-- Location content -->
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-12 amenities-box content-widget">
                                                                                       <div class="accordion" id="accordionExample">
    																						  @php
                                                                                                   $pic2 = explode(", ",$prodata->file);         
                                                                                              @endphp
                                                                                              @foreach($pic2 as $key => $p2)
    																						  <div class="accordion-item">
    																							<h2 class="accordion-header" id="heading{{$key}}">
    																							  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="{{ $key==0 ? 'true': 'false'}}" aria-controls="collapse{{$key}}">
    																								Floor Plan
    																							  </button>
    																							</h2>
    																							<div id="collapse{{$key}}" class="accordion-collapse collapse {{ $key==0 ? 'show': 'false'}}" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
    																							  <div class="accordion-body">
    																								<div class="d-flex justify-content-center" style="width:100%">
    																								  <img class="mt-4" src="{{ url('/')}}/{{$p2}}" alt=""/  style="width:60%">
    																								</div>
    																							  </div>
    																							</div>
    																						  </div>
    																						  @endforeach
    																						</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="tab-pane" id="nav-landmarkvideo"
                                                                                role="tabpanel"
                                                                                aria-labelledby="nav-landmarkvideo-tab">
                                                                                <!-- Location content -->
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-12 amenities-box content-widget">
                                                                                       <div class="accordion" id="accordionExample">
    																						   <?php echo $prodata->video_url; ?>
    																						</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                       
                                        <div class="col-xl-12 xl-12 col-md-12" hidden>
                                            <div class="about-profile">
                                                <div class="about-info">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="title-about">
                                                                <h3
                                                                    style=" font-size: 20px !important;line-height: 30px;font-weight: 500;">
                                                                    What’s Nearby?</h3>
                                                                <hr>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-12 amenities-box content-widget">
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="single-item d-flex">
                                                                                <div class="icon-box"
                                                                                    style="font-size:18px;margin-top: 10px;margin-right: 6px;">
                                                                                    <i class="fas fa-book-reader"></i>
                                                                                </div>
                                                                                <div class="inner">
                                                                                    <h5
                                                                                        style="font-size:18px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                        Education:</h5>
                                                                                    <div class="box clearfix">
                                                                                        <div class="text pull-left">
                                                                                            <h4
                                                                                                style="font-size:16px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                                Western Reserve
                                                                                                University <span
                                                                                                    style="font-size:16px; color:#808288;font-weight:400;">(2.10
                                                                                                    km)</span></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="box clearfix">
                                                                                        <div class="text pull-left">
                                                                                            <h4
                                                                                                style="font-size:16px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                                Georgia Institute of
                                                                                                Technology <span
                                                                                                    style="font-size:16px; color:#808288;font-weight:400;">(1.42
                                                                                                    km)</span>
                                                                                            </h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="box clearfix">
                                                                                        <div class="text pull-left">
                                                                                            <h4
                                                                                                style="font-size:16px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                                Harvey Mudd College
                                                                                                <span
                                                                                                    style="font-size:16px; color:#808288;font-weight:400;">(2.10
                                                                                                    km)</span></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="single-item d-flex">
                                                                                <div class="icon-box"
                                                                                    style="font-size:18px;margin-top: 10px;margin-right: 6px;">
                                                                                    <i class="fas fa-coffee"></i></div>
                                                                                <div class="inner">
                                                                                    <h5
                                                                                        style="font-size:18px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                        Restaurant:</h5>
                                                                                    <div class="box clearfix">
                                                                                        <div class="text pull-left">
                                                                                            <h4
                                                                                                style="font-size:16px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                                SC Ranch Market <span
                                                                                                    style="font-size:16px; color:#808288;font-weight:400;">(3.10
                                                                                                    km)</span></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="box clearfix">
                                                                                        <div class="text pull-left">
                                                                                            <h4
                                                                                                style="font-size:16px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                                Chill On The Hill<span
                                                                                                    style="font-size:16px; color:#808288;font-weight:400;">(2.42
                                                                                                    km)</span></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="box clearfix">
                                                                                        <div class="text pull-left">
                                                                                            <h4
                                                                                                style="font-size:16px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                                Gordon Ramsay Hell's
                                                                                                Kitchen <span
                                                                                                    style="font-size:16px; color:#808288;font-weight:400;">(1.22
                                                                                                    km)</span></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="single-item d-flex">
                                                                                <div class="icon-box"
                                                                                    style="font-size:18px;margin-top: 10px;margin-right: 6px;">
                                                                                    <i class="fas fa-capsules"></i>
                                                                                </div>
                                                                                <div class="inner">
                                                                                    <h5
                                                                                        style="font-size:18px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                        Health &amp; Medical:</h5>
                                                                                    <div class="box clearfix">
                                                                                        <div class="text pull-left">
                                                                                            <h4
                                                                                                style="font-size:16px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                                North Star Medical
                                                                                                Clinic <span
                                                                                                    style="font-size:16px; color:#808288;font-weight:400;">
                                                                                                    (2.10 km)</span>
                                                                                            </h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="box clearfix">
                                                                                        <div class="text pull-left">
                                                                                            <h4
                                                                                                style="font-size:16px;line-height: 26px;font-weight: 500;color: #0f172b;">
                                                                                                Clairvoyant Healing
                                                                                                <span
                                                                                                    style="font-size:16px; color:#808288;font-weight:400;">(1.42
                                                                                                    km)</span></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->
            </div>

   @include("admin/footer")
<style>
    .check {
        display: block;
        margin: 0;
        padding: 0;
        width: 0;
        height: 0;
        visibility: hidden;
        opacity: 0;
        pointer-events: none;
        position: absolute;
    }

    .checktoggle {
        background-color:
            #e0001a;
        border-radius: 12px;
        cursor: pointer;
        display: block;
        font-size: 0;
        height: 24px;
        margin-bottom: 0;
        position: relative;
        width: 48px;
    }

    .checktoggle::after {
        content: ' ';
        display: block;
        position: absolute;
        top: 50%;
        left: 0;
        transform: translate(5px, -50%);
        width: 16px;
        height: 16px;
        background-color:
            #fff;
        border-radius: 50%;
        transition: left 300ms ease, transform 300ms ease;
    }

    .check:checked+.checktoggle {
        background-color:
            #55ce63;
    }

    .checktoggle {

        cursor: pointer;
        font-size: 0;

    }

    .check:checked+.checktoggle::after {
        left: 100%;
        transform: translate(calc(-100% - 5px), -50%);
    }
</style>
</body>

</html>