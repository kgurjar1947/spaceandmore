@include('website/header')
<section class="banner-style-two centred">
    <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
        <div class="slide-item">
            <div class="image-layer" style="background-image:url(webassets/images/banner/banner-2.jpg)"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Redefining Workspaces</h2>
                    <p>Explore vibrant Team Offices in Hyderabad</p>
                </div>
            </div>
        </div>
        <div class="slide-item">
            <div class="image-layer" style="background-image:url(webassets/images/banner1.jpg)"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Last chance to elevate your lifestyle</h2>
                    <p>Make a home for your business with Spaces and More</p>
                </div>
            </div>
        </div>
        <div class="slide-item">
            <div class="image-layer" style="background-image:url(webassets/images/banner2.jpg)"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Empower your business with premium flexible workspaces</h2>
                    <p>Dynamic serviced office space in Hyderabad with flexible terms.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- banner-section -->
<section class="search-field-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="search-field">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-2">Residential</li>
                            <li class="tab-btn" data-tab="#tab-1">Commercial</li>
                            @foreach($get_new_cat as $key => $val)
                            <li class="tab-btn" data-tab="#tab-{{$val->id}}">{{$val->categoryname}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tabs-content info-group">
                        <div class="tab" id="tab-1">
                            <div class="inner-box">
                                <div class="top-search">
                                    <form action="{{route('viewfitter', 2)}}" method="get" class="search-form">
                                        <!--@csrf-->
                                        <input type="hidden" name="cat" value="2" required="">
                                        <div class="row clearfix">
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Commercial Property</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="type">
                                                            <option value="">All Type</option>
                                                            @foreach($commercial_cat as $cd)
                                                            <option value="{{ $cd->id }}">{{ $cd->subcategoryname}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Rent/Sale</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="leadtype">
                                                            <option value="">Rent/Sale</option>
                                                            <option value="Sale">Sale</option>
                                                            <option value="Rent">Rent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="location">
                                                            <option value="">Select Location</option>
                                                            @foreach($location as $key => $val)
                                                            <option value="{{$val->location_slug}}">
                                                                {{$val->location_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <div class="col-lg-3 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Built Up Area</label>
                                                    <div class="field-input">
                                                        <i class="fas fa-search"></i>
                                                        <input type="search" name="bhk_name"
                                                            placeholder="Search by Built Up Area...">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="fas fa-search"></i>Search</button>
                                        </div>
                                        <div class="switch_btn_one ">
                                            <button
                                                class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced
                                                Search<i class="fas fa-angle-down"></i></button>
                                            <div class="advanced-search">
                                                <div class="close-btn">
                                                    <a href="#" class="close-side-widget"><i
                                                            class="far fa-times"></i></a>
                                                </div>
                                                <div class="row clearfix">
                                            <!--        <div class="col-lg-4 col-md-12 col-sm-12 column">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label>Search Property Name</label>-->
                                            <!--        <div class="field-input">-->
                                            <!--            <i class="fas fa-search"></i>-->
                                            <!--            <input type="search" name="property_name"-->
                                            <!--                placeholder="Property Name">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                                    <!--<div class="col-lg-4 col-md-6 col-sm-12 column">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>Max Price</label>-->
                                                    <!--        <div class="select-box">-->
                                                    <!--            <select class="wide" name="price">-->
                                                    <!--                <option value="">Any</option>-->
                                                    <!--                <option value="1000">Rs 1000</option>-->
                                                    <!--                <option value="5000">Rs 5000</option>-->
                                                    <!--                <option value="10000">Rs 10000</option>-->
                                                    <!--                <option value="50000">Rs 50000</option>-->
                                                    <!--                <option value="100000">Rs 100000</option>-->
                                                    <!--                <option value="500000">Rs 500000</option>-->
                                                    <!--                <option value="1000000">Rs 1000000</option>-->
                                                    <!--            </select>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Facing</label>
                                                            <div class="select-box">
                                                                <select class="wide" name="facing_name">
                                                                    <option value="">Any</option>
                                                                    @foreach($facing as $key => $val)
                                                                    <option value="{{$val->facing_name}}">
                                                                        {{$val->facing_name}}
                                                                        Facing</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-lg-3 col-md-6 col-sm-12 column">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>Min BHK</label>-->
                                                    <!--        <div class="select-box">-->
                                                    <!--            <select class="wide" name="bhk_name">-->
                                                    <!--                <option value="">Any</option>-->
                                                    <!--                @foreach($bhk as $key => $val)-->
                                                    <!--                <option value="{{$val->bhk_name}}BHK">-->
                                                    <!--                    {{$val->bhk_name}} BHK-->
                                                    <!--                </option>-->
                                                    <!--                @endforeach-->
                                                    <!--            </select>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Property Id</label>
                                                            <div class="field-input">
                                                                <i class="fas fa-search"></i>
                                                                <input type="search" name="property_id"
                                                                    placeholder="Search by Property id...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="range-box">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-6 col-sm-12 column">
                                                            <div class="price-range">
                                                                <h6>(Rs) Select Price Range</h6>
                                                                <div class="range-input">
                                                                    <div class="input"><input type="text"
                                                                            class="property-amount" name="price_range"
                                                                            readonly=""></div>
                                                                </div>
                                                                <div class="price-range-slider"></div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-lg-6 col-md-6 col-sm-12 column">-->
                                                        <!--    <div class="area-range">-->
                                                        <!--        <h6>Select Area</h6>-->
                                                        <!--        <div class="range-input">-->
                                                        <!--            <div class="input"><input type="text"-->
                                                        <!--                    class="area-range" name="area" readonly="">-->
                                                        <!--            </div>-->
                                                        <!--        </div>-->
                                                        <!--        <div class="area-range-slider"></div>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab active-tab" id="tab-2">
                            <div class="inner-box">
                                <div class="top-search">
                                    <form action="{{route('viewfitter', 1)}}" method="get" class="search-form">
                                        <!--@csrf-->
                                        <input type="hidden" name="cat" value="1" required="">
                                        <div class="row clearfix">
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Residential Property</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="type">
                                                            <option value="">All Type</option>
                                                            @foreach($property_cat as $cd)
                                                            <option value="{{ $cd->id }}">{{ $cd->subcategoryname}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Rent/Sale</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="leadtype">
                                                            <option value="">Rent/Sale</option>
                                                            <option value="Sale">Sale</option>
                                                            <option value="Rent">Rent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="location">
                                                            <option value="">Select Location</option>
                                                            @foreach($location as $key => $val)
                                                            <option value="{{$val->location_slug}}">
                                                                {{$val->location_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Min BHK</label>
                                                            <div class="select-box">
                                                                <select class="wide" name="bhk_name">
                                                                    <option value="">Any</option>
                                                                    @foreach($bhk as $key => $val)
                                                                    <option value="{{$val->bhk_name}}BHK">
                                                                        {{$val->bhk_name}} BHK
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                            


                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="fas fa-search"></i>Search</button>
                                        </div>
                                        <div class="switch_btn_one ">
                                            <button
                                                class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced
                                                Search<i class="fas fa-angle-down"></i></button>
                                            <div class="advanced-search">
                                                <div class="close-btn">
                                                    <a href="#" class="close-side-widget"><i
                                                            class="far fa-times"></i></a>
                                                </div>
                                                <div class="row clearfix">
                                                    <!--<div class="col-lg-3 col-md-6 col-sm-12 column">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>Max Price</label>-->
                                                    <!--        <div class="select-box">-->
                                                    <!--            <select class="wide" name="price">-->
                                                    <!--                <option value="">Any</option>-->
                                                    <!--                <option value="1000">Rs 1000</option>-->
                                                    <!--                <option value="5000">Rs 5000</option>-->
                                                    <!--                <option value="10000">Rs 10000</option>-->
                                                    <!--                <option value="50000">Rs 50000</option>-->
                                                    <!--                <option value="100000">Rs 100000</option>-->
                                                    <!--                <option value="500000">Rs 500000</option>-->
                                                    <!--                <option value="1000000">Rs 1000000</option>-->
                                                    <!--            </select>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Facing</label>
                                                            <div class="select-box">
                                                                <select class="wide" name="facing_name">
                                                                    <option value="">Any</option>
                                                                    @foreach($facing as $key => $val)
                                                                    <option value="{{$val->facing_name}}">
                                                                        {{$val->facing_name}}
                                                                        Facing</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                            <!--       <div class="col-lg-4 col-md-12 col-sm-12 column">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label>Search Property Name</label>-->
                                            <!--        <div class="field-input">-->
                                            <!--            <i class="fas fa-search"></i>-->
                                            <!--            <input type="search" name="property_name"-->
                                            <!--                placeholder="Property Name">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                                   
                                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Property Id</label>
                                                            <div class="field-input">
                                                                <i class="fas fa-search"></i>
                                                                <input type="search" name="property_id"
                                                                    placeholder="Search by Property id...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="range-box">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-6 col-sm-12 column">
                                                            <div class="price-range">
                                                                <h6>(Rs) Select Price Range </h6>
                                                                <div class="range-input">
                                                                    <div class="input"><input type="text"
                                                                            class="property-amount" name="price_range"
                                                                            readonly=""></div>
                                                                </div>
                                                                <div class="price-range-slider"></div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-lg-6 col-md-6 col-sm-12 column">-->
                                                        <!--    <div class="area-range">-->
                                                        <!--        <h6>Select Area</h6>-->
                                                        <!--        <div class="range-input">-->
                                                        <!--            <div class="input"><input type="text"-->
                                                        <!--                    class="area-range" name="area" readonly="">-->
                                                        <!--            </div>-->
                                                        <!--        </div>-->
                                                        <!--        <div class="area-range-slider"></div>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @foreach($get_new_cat as $key => $val)
                        <div class="tab" id="tab-{{$val->id}}">
                            <div class="inner-box">
                                <div class="top-search">
                                    <form action="{{route('viewfitter', $val->categoryid)}}" method="get" class="search-form">
                                         <!--@csrf-->
                                        <input type="hidden" name="cat" value="3" required="">
                                        <div class="row clearfix">
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Property Type</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="type">
                                                            <option value="">All Type</option>
                                                            @foreach($property_cat as $cd)
                                                            <option value="{{ $cd->id }}">{{ $cd->subcategoryname}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Rent/Sales</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="leadtype">
                                                            <option value="">Rent/Sale</option>
                                                            <option value="Sale">Sale</option>
                                                            <option value="Rent">Rent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="location">
                                                            <option value="">Input location</option>
                                                            @foreach($location as $key => $val)
                                                            <option value="{{$val->location_slug}}">
                                                                {{$val->location_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-3 col-md-12 col-sm-12 column">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label>Search Property</label>-->
                                            <!--        <div class="field-input">-->
                                            <!--            <i class="fas fa-search"></i>-->
                                            <!--            <input type="search" name="property_name"-->
                                            <!--                placeholder="Search by Property, Location or Landmark...">-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="fas fa-search"></i>Search</button>
                                        </div>

                                        <div class="switch_btn_one ">
                                            <button
                                                class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced
                                                Search<i class="fas fa-angle-down"></i></button>
                                            <div class="advanced-search">
                                                <div class="close-btn">
                                                    <a href="#" class="close-side-widget"><i
                                                            class="far fa-times"></i></a>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Max Price</label>
                                                            <div class="select-box">
                                                                <select class="wide" name="price">
                                                                    <option value="">Any</option>
                                                                    <option value="1000">Rs 1000</option>
                                                                    <option value="5000">Rs 5000</option>
                                                                    <option value="10000">Rs 10000</option>
                                                                    <option value="50000">Rs 50000</option>
                                                                    <option value="100000">Rs 100000</option>
                                                                    <option value="500000">Rs 500000</option>
                                                                    <option value="1000000">Rs 1000000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Facing</label>
                                                            <div class="select-box">
                                                                <select class="wide" name="facing_name">
                                                                    <option value="">Any</option>
                                                                    @foreach($facing as $key => $val)
                                                                    <option value="{{$val->facing_name}}">
                                                                        {{$val->facing_name}}
                                                                        Facing</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Min BHK</label>
                                                            <div class="select-box">
                                                                <select class="wide" name="bhk_name">
                                                                    <option value="">Any</option>
                                                                    @foreach($bhk as $key => $val)
                                                                    <option value="{{$val->bhk_name}}BHK">
                                                                        {{$val->bhk_name}} BHK
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Property Id</label>
                                                            <div class="field-input">
                                                                <i class="fas fa-search"></i>
                                                                <input type="search" name="property_id" placeholder="Search by Property id...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="range-box">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-6 col-sm-12 column">
                                                            <div class="price-range">
                                                                <h6>(Rs) Select Price Range</h6>
                                                                <div class="range-input">
                                                                    <div class="input"><input type="text"
                                                                            class="property-amount" name="price_range"
                                                                            readonly=""></div>
                                                                </div>
                                                                <div class="price-range-slider"></div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-lg-6 col-md-6 col-sm-12 column">-->
                                                        <!--    <div class="area-range">-->
                                                        <!--        <h6>Select Area</h6>-->
                                                        <!--        <div class="range-input">-->
                                                        <!--            <div class="input"><input type="text"-->
                                                        <!--                    class="area-range" name="area" readonly="">-->
                                                        <!--            </div>-->
                                                        <!--        </div>-->
                                                        <!--        <div class="area-range-slider"></div>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->


<!-- category-section -->
<section class="category-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <div class="sec-title">
                <h5>Services</h5>
                <h2>Our Premium Value Added Services</h2>
                <p>With our professional experts, we guide you to sell, buy or rent the best property</p>
<p>That fits your expectations in and around the prime locations of Hyderabad, Telangana.</p>
            </div>
            <ul class="category-list clearfix five-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">


                @foreach($results as $key=>$su)
                <li>
                    <div class="category-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-1"></i></div>
                            <h5><a
                                    href="{{url('/')}}/viewsub/{{$su->categoryid}}/{{$su->id}}">{{$su->subcategoryname}}</a>
                            </h5>
                            <span>{{ get_sub_cat_count($su->id) }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <!-- <div class="more-btn"><a href="categories.html" class="theme-btn btn-one">All Categories</a></div> -->
        </div>
    </div>
</section>
<!-- category-section end -->
<!-- deals-section -->
<section class="deals-section sec-pad">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Hot Property</h5>
            <h2>Our Best Deals</h2>
        </div>
        <div class="deals-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            @foreach($favourites_property as $row)
            <div class="single-item">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="deals-block-one">
                            <div class="inner-box">
                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">Featured</span>
                                <div class="lower-content">
                                    <div class="title-text">
                                        <h4>({{$row->propertyid}}) <a href="residential_details/{{ $row->id}}">{{ $row->propertyname}}</a> </h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>₹<?php echo $row->totalprice; ?>.00</h4>
                                        </div>
                                        <!--<ul class="other-option pull-right clearfix">-->
                                        <!--    <li><a><i class="icon-12"></i></a>-->
                                        <!--    </li>-->
                                        <!--    <li><a><i class="icon-13"></i></a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                    </div>
                                    <p><?php echo mb_strimwidth($row->description, 0, 80, '...'); ?>.</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $row->communitydetails}} Beds</li>
                                        <li><i class="icon-15"></i>{{ $row->bathrooms}} Baths</li>
                                        <li><i class="icon-16"></i>{{$row->plotarea}} Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a href="residential_details/{{ $row->id}}"
                                            class="theme-btn btn-one">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block" style="height: 410px;">
                        <div class="image-box">
                            @php
                            $pic1 = explode(",",$row->proimages);
                            @endphp
                            <figure class="image"><img src="{{$pic1[0]}}" alt="" style="height: 410px;"></figure>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($favourites_commercial as $val)
            <div class="single-item">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="deals-block-one">
                            <div class="inner-box">
                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">Featured</span>
                                <div class="lower-content">
                                    <div class="title-text">
                                        <h4>({{$val->propertyid}})<a href="commercial_details/{{ $val->id}}">{{ $val->propertyname}}</a> </h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>₹<?php echo $val->totalprice; ?>.00</h4>
                                        </div>
                                        <!--<ul class="other-option pull-right clearfix">-->
                                        <!--    <li><a><i class="icon-12"></i></a>-->
                                        <!--    </li>-->
                                        <!--    <li><a><i class="icon-13"></i></a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                    </div>
                                    <p><?php echo mb_strimwidth($val->description, 0, 80, '...'); ?></p>
                                    <ul class="more-details clearfix">
                                        <!--<li><i class="icon-14"></i>{{ $val->communitydetails}} Beds</li>-->
                                        <li><i class="icon-15"></i>{{ $val->bathrooms}} Baths</li>
                                        <li><i class="icon-16"></i>{{$val->plotarea}} Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a href="commercial_details/{{ $val->id}}"
                                            class="theme-btn btn-one">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block" style="height: 410px;">
                        <div class="image-box">
                            @php
                            $pic1 = explode(",",$val->proimages);
                            @endphp
                            <figure class="image"><img src="{{$pic1[0]}}" alt="" style="height: 410px;"></figure>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- deals-section end -->

<!-- feature-section start -->
<section class="feature-style-two sec-pad">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Recently Listed</h5>
            <h2>Recently Listed Property</h2>
            <p>The company has four verticals: Business Parks, Property Consulting Services, Turnkey Office Interiors,
                Property Management Services.</p>
        </div>
        <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            @foreach($property as $row)
            <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                <div class="inner-box">
                    <a href="residential_details/{{ $row->id}}">
                    <div class="image-box">
                        @php
                        $pic1 = explode(",",$row->proimages);
                        @endphp

                        <figure class="image"><img src="{{$pic1[0]}}" alt=""></figure>
                        <div class="batch"><i class="icon-11"></i></div>
                        <span class="category">Residential</span>
                    </div>
                    </a>
                    <div class="lower-content">
                        <div class="author-info clearfix">
                            <div class="author pull-left">



                                <figure class="author-thumb"><img src="webassets/images/map.png" alt=""></figure>
                                <h6>{{ get_city_name($row->location) }}</h6>
                            </div>
                            <div class="buy-btn pull-right"><a
                                    href="residential_details/{{ $row->id}}"><?php echo $row['leadtype']; ?></a></div>
                        </div>
                        <div class="title-text">
                            <h4><a href="residential_details/{{ $row->id}}">(<?php echo $row['propertyid']; ?>) {{ $row->propertyname}} <br>
                                    {{ $row->builtuparea}} Built Up Area, {{get_sub_cat_name($row->subcategoryid)}} <br /></a>
                            </h4>
                        </div>
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
                        <div class="btn-box"><a href="residential_details/{{ $row->id}}" class="theme-btn btn-two">See
                                Details</a></div>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($commercial as $row)
            <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                <div class="inner-box">
                    <div class="image-box">
                        @php
                        $pic1 = explode(",",$row->proimages);
                        @endphp

                        <figure class="image"><img src="{{$pic1[0]}}" alt=""></figure>
                        <div class="batch"><i class="icon-11"></i></div>
                        <span class="category">Commercial</span>
                    </div>
                    <div class="lower-content">
                        <div class="author-info clearfix">
                            <div class="author pull-left">
                                <figure class="author-thumb"><img src="webassets/images/map.png" alt=""></figure>
                                <h6>{{ get_city_name($row->location) }}</h6>
                            </div>
                            <div class="buy-btn pull-right"><a
                                    href="commercial_details/{{ $row->id}}"><?php echo $row['leadtype']; ?></a></div>
                        </div>
                        <div class="title-text">
                            <h4><a href="commercial_details/{{ $row->id}}">(<?php echo $row['propertyid']; ?>)  {{ $row->propertyname}} <br>
                                    {{ $row->builtuparea}} Built Up Area, {{get_sub_cat_name($row->subcategoryid)}} <br /></a>
                            </h4>
                        </div>
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
                        <div class="btn-box"><a href="commercial_details/{{ $row->id}}" class="theme-btn btn-two">See
                                Details</a></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- feature-style-two end -->

<!-- video-section -->
<!--<section class="video-section centred" style="background-image: url(assets/images/background/video-1.jpg);">-->
<!--    <div class="auto-container">-->
<!--        <div class="video-inner">-->
<!--            <div class="video-btn">-->
<!--                <a href="" class="lightbox-image"-->
<!--                    data-caption=""><i class="icon-17"></i></a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- video-section end -->





<!-- testimonial-section end -->
<section class="testimonial-section bg-color-1 centred">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
    <div class="auto-container">
        <div class="sec-title">
            <h5>Testimonials</h5>
            <h2>What They Say About Us</h2>
        </div>
        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="webassets/images/profiel.png" alt=""></figure>
                    <div class="text">
                        <p>Professional service provided in finding our office space. Will definitely recommend Spaces and More.
                        </p>
                    </div>
                    <div class="author-info">
                        <h4>Santosh </h4>
                        <span class="designation">(IT Professional)</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="webassets/images/profiel.png" alt=""></figure>
                    <div class="text">
                        <p>We have thoroughly enjoyed partnering with you and appreciate all the support that you and your team have given when required. Looking forward to being associated in the near future when possible.
                        </p>
                    </div>
                    <div class="author-info">
                        <h4>Pavan On Device </h4>
                        <span class="designation">(Lead - Human Resources)</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="webassets/images/profiel.png" alt=""></figure>
                    <div class="text">
                        <p>I want to thank you and Spaces and More Business Park. You have given our business a chance to grow. Without your attention to our needs and making sure that our facility was always functioning properly, we would not have been able to achieve success.
                        </p>
                    </div>
                    <div class="author-info">
                        <h4>Suman Madupu - Prop Tank </h4>
                        <span class="designation">(Director)</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="webassets/images/profiel.png" alt=""></figure>
                    <div class="text">
                        <p>Spaces & More is so professional and well lead and managed, may be you should seek for VC funding and expand to other cities :-) I am sure your presence will help so many startups focus on their core business in different cities.
                        </p>
                    </div>
                    <div class="author-info">
                        <h4>Anil Guduru </h4>
                        <span class="designation"> (CEO @ Alganox)</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="webassets/images/profiel.png" alt=""></figure>
                    <div class="text">
                        <p>Thank you for a professional service provided when we were scouting to set up our Chit Chat Chai outlet in Jubilee Hills. Due to the assist provided by Spaces&More executives, I was able to close this deal with minimum issues. - Poorna Tej (Chit Chat Chai)
                        </p>
                    </div>
                    <div class="author-info">
                        <h4>Poorna Tej</h4>
                        <span class="designation"> (Business)</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="webassets/images/profiel.png" alt=""></figure>
                    <div class="text">
                        <p>Wanted to thank you and your Team @ Spaces & More for the help and support due to which we managed to finish the signing of the agreement for our new office @ Gachibowli. - Mohit Bhog (Team1Architects)
                        </p>
                    </div>
                    <div class="author-info">
                        <h4>Mohit Bhog</h4>
                        <span class="designation"> (Architect)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-section end -->

        <section class="chooseus-section" style="margin-bottom:90px;">
            <div class="auto-container">
                <div class="inner-container bg-color-2" style=" background-color: #17476f !important;">
                    <div class="upper-box clearfix">
                        <div class="sec-title light">
                            <h5>Why Choose Us?</h5>
                            <h2>Reasons To Choose Us</h2>
                        </div>
                    </div>
                    <div class="lower-box">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 chooseus-block">
                                <div class="chooseus-block-one">
                                    <div class="inner-box">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="icon"><i class="fas fa-handshake"style="font-size: 51px;color: #FFF;"></i></div>
                                            </div>
                                            <div class="col-lg-10">
                                                <h4>Transperancy, Truthfulness, Trust</h4>
                                        <p>When you are working with Spaces & More, rest assured all the transactions reflect the company's founding policy of Transperancy, Truthfulness, Trust.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 chooseus-block">
                                <div class="chooseus-block-one">
                                    <div class="inner-box">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="icon"><i class="fas fa-history"style="font-size: 51px;color: #FFF;"></i></div>
                                            </div>
                                            <div class="col-lg-10">
                                                <h4>Experience</h4>
                                        <p>Their experience ensures that their projects will be done right and with the upmost professionalism. They also use only proven and reputable subcontractors and material suppliers.</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix" style="padding-top: 20px">
                            <div class="col-lg-6 col-md-6 col-sm-12 chooseus-block">
                                <div class="chooseus-block-one">
                                    <div class="inner-box">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="icon"><i class="fas fa-question-circle"style="font-size: 51px;color: #FFF;"></i></div>
                                            </div>
                                            <div class="col-lg-10">
                                                <h4>Sound Advice</h4>
                                        <p>With an industry expereince of more than 15 years, you can be assured of well informed and honest advice.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 chooseus-block">
                                <div class="chooseus-block-one">
                                    <div class="inner-box">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="icon"><i class="fas fa-users"style="font-size: 51px;color: #FFF;"></i></div>
                                            </div>
                                            <div class="col-lg-10">
                                                <h4>Professional Service</h4>
                                        <p>Spaces & More prides itself in providing professional consulting services with atmost transperancy.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- chooseus-section end -->


<!-- place-section -->
<!--<section class="place-section sec-pad">-->
<!--    <div class="auto-container">-->
<!--        <div class="sec-title centred">-->
<!--            <h5>Top Places</h5>-->
<!--            <h2>Most Popular Places</h2>-->
<!--            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore-->
<!--                magna aliqua enim.</p>-->
<!--        </div>-->
<!--        <div class="sortable-masonry">-->
<!--            <div class="items-container row clearfix">-->
<!--                <div-->
<!--                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">-->
<!--                    <div class="place-block-one">-->
<!--                        <div class="inner-box">-->
<!--                            <figure class="image-box"><img src="webassets/images/resource/place-1.jpg" alt=""></figure>-->
<!--                            <div class="text">-->
<!--                                <h4 style="margin-top:0px !important;"><a-->
<!--                                        href="{{ route('viewcity', 'jubliee-hills' ) }}">Jubliee Hills</a></h4>-->
<!--                                <p>{{get_count_status_of_property_jubliee_hills()}} Properties</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div-->
<!--                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">-->
<!--                    <div class="place-block-one">-->
<!--                        <div class="inner-box">-->
<!--                            <figure class="image-box"><img src="webassets/images/resource/place-2.jpg" alt=""></figure>-->
<!--                            <div class="text">-->
<!--                                <h4 style="margin-top:0px !important;"><a-->
<!--                                        href="{{ route('viewcity', 'banjara-hills' ) }}">Banjara Hills</a></h4>-->
<!--                                <p>{{get_count_status_of_property_banjara_hills()}} Properties</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">-->
<!--                    <div class="place-block-one">-->
<!--                        <div class="inner-box">-->
<!--                            <figure class="image-box"><img src="webassets/images/resource/place-3.jpg" alt=""></figure>-->
<!--                            <div class="text">-->
<!--                                <h4 style="margin-top:0px !important;"><a-->
<!--                                        href="{{ route('viewcity', 'madhapur' ) }}">Madhapur</a></h4>-->
<!--                                <p>{{get_count_status_of_property_madhapur()}} Properties</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div-->
<!--                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">-->
<!--                    <div class="place-block-one">-->
<!--                        <div class="inner-box">-->
<!--                            <figure class="image-box"><img src="webassets/images/resource/place-2.jpg" alt=""></figure>-->
<!--                            <div class="text">-->
<!--                                <h4 style="margin-top:0px !important;"><a-->
<!--                                        href="{{route('viewcity', 'gachibowli')}}">Gachibowli</a></h4>-->
<!--                                <p>{{get_count_status_of_property_gachibowli()}} Properties</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">-->
<!--                    <div class="place-block-one">-->
<!--                        <div class="inner-box">-->
<!--                            <figure class="image-box"><img src="webassets/images/resource/place-3.jpg" alt=""></figure>-->
<!--                            <div class="text">-->
<!--                                <h4 style="margin-top:0px !important;"><a-->
<!--                                        href="{{route('viewcity', 'bio-diversity')}}">Bio Diversity</a></h4>-->
<!--                                <p>{{get_count_status_of_property_bio_diversity()}} Properties</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->


<!--                <div class="col-lg-12 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">-->
<!--                    <div class="place-block-one">-->
<!--                        <div class="inner-box">-->
<!--                            <figure class="image-box"><img src="webassets/images/resource/place-4.jpg" alt=""></figure>-->
<!--                            <div class="text" style="width:31%;">-->
<!--                                <h4 style="margin-top:0px !important;"><a-->
<!--                                        href="{{route('viewcity', 'kavuri-hills')}}">Kavuri Hills</a></h4>-->
<!--                                <p>{{get_count_status_of_property_kavuri_hills()}} Properties</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- place-section end -->


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
<script src="webassets/js/jquery.js"></script>
<script src="webassets/js/popper.min.js"></script>
<script src="webassets/js/bootstrap.min.js"></script>
<script src="webassets/js/owl.js"></script>
<script src="webassets/js/wow.js"></script>
<script src="webassets/js/validation.js"></script>
<script src="webassets/js/jquery.fancybox.js"></script>
<script src="webassets/js/appear.js"></script>
<script src="webassets/js/scrollbar.js"></script>
<script src="webassets/js/isotope.js"></script>
<script src="webassets/js/jquery.nice-select.min.js"></script>
<script src="webassets/js/jQuery.style.switcher.min.js"></script>
<script src="webassets/js/jquery-ui.js"></script>
<script src="webassets/js/nav-tool.js"></script>

<!-- main-js -->
<script src="webassets/js/script.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<script>
$(document).ready(function() {
    $("#myCarousel").on("slide.bs.carousel", function(e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
        var totalItems = $(".carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $(".carousel-item")
                        .eq(i)
                        .appendTo(".carousel-inner");
                } else {
                    $(".carousel-item")
                        .eq(0)
                        .appendTo($(this).find(".carousel-inner"));
                }
            }
        }
    });



    $('#enquiryform').submit(function() {
        $.ajax({
                type: 'POST',
                url: '{{url(' / ')}}/api/enquiryform',
                //contentType: "application/json",
                //dataType: "json",
                data: $(this).serialize(),
            })
            .done(function(data) {

                $("#enquiryform")[0].reset();
                alert("Enquiry Submitted");
                location.reload(true);

            })
            .fail(function() {
                //alert( "Posting failed." );
            });
        return false;
    });


}); <
!--popup-- >


</script>

</body><!-- End of .page_wrapper -->

</html>