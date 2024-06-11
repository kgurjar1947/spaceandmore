@include("admin/header")
            <div class="page-body">
                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Disabled List
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
                                    <li class="breadcrumb-item active">My Disable Properties</li>
                                </ol>
                                <!-- Breadcrumb end -->
                                
                            </div>
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
                                        <div class="col-12">
                                            <div class="filter-panel">
                                                <div class="row listing-option">
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="property-2 row column-sm property-label property-grid">
                                                @foreach($prodata1 as $pd)
                                                    @php
                                                    $pic = explode(", ",$pd->proimages);         
                                                    @endphp
                                                    <div class="col-xl-4 col-md-4">
                                                    <div class="property-box">
                                                        <div class="property-image">
                                                            <div class="property-slider">
                                                            @foreach($pic as $p)
                                                             @if(auth()->user()->type == 'super_admin')
                                                            <a href="{{ route('admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                    <img src="{{url('/')}}/{{$p}}" class="bg-img" alt="">                                     
                                                            </a>
                                                            	@elseif(auth()->user()->type == 'admin')
                                                            	<a href="{{ route('user.admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                    <img src="{{url('/')}}/{{$p}}" class="bg-img" alt="">                                     
                                                            </a>
                                                            	@endif
                                                            @endforeach
                                                            </div>
                                                            <div class="labels-left">
                                                                <div>
                                                                    <span class="label label-shadow">{{$pd->leadtype}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="seen-data">
                                                                <i data-feather="camera"></i>
                                                                <span>{{ count($pic) }}</span>
                                                            </div>                 
                                                            <div class="overlay-property-box">
                                                                <a href="" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist">
                                                                    <i data-feather="heart"></i>                                                                               
                                                                </a>
                                                            </div>
                                                        </div>
                        
                                                        <div class="property-details">
                                                            <span class="font-roboto">Apartment </span>
                                                            @if(auth()->user()->type == 'super_admin')
                                                            <a href="{{ route('admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                	@elseif(auth()->user()->type == 'admin')
                                                                	<a href="{{ route('user.admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                	@endif
                                                                <h4>({{ $pd->propertyid}}) {{ $pd->propertyname}}</h4>
                                                            </a>
                                                            <ul>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">:{{ $pd->unit}} Unit</li>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths: {{ $pd->bathrooms}}</li>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">SqF:{{ $pd->pricepersft }}</li>
                                                            </ul>
                                                            <div class="property-btn d-flex">
                                                                <span>{{ date('F d, Y',strtotime($pd->createdate)) }}</span>
                                                                @if(auth()->user()->type == 'super_admin')
                                                              <a href="{{ route('admin.details.property', [$pd->id, $pd->categoryid]) }}"><button type="button"  onclick="" class="btn btn-dashed btn-pill color-2">Details</button></a>
                                                            	@elseif(auth()->user()->type == 'admin')
                                                            	<a href="{{ route('user.disable.property', [$pd->id, $pd->categoryid]) }}"><button type="button"  onclick="" class="btn btn-dashed btn-pill color-2">Details</button></a>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach


@foreach($prodata2 as $pd)
                                                    @php
                                                    $pic = explode(", ",$pd->proimages);         
                                                    @endphp
                                                    <div class="col-xl-4 col-md-4">
                                                    <div class="property-box">
                                                        <div class="property-image">
                                                            <div class="property-slider">
                                                            @foreach($pic as $p)
                                                            @if(auth()->user()->type == 'super_admin')
                                                            <a href="{{ route('admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                    <img src="{{url('/')}}/{{$p}}" class="bg-img" alt="">   
                                                                    @elseif(auth()->user()->type == 'admin')
                                                                    <a href="{{ route('user.admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                    <img src="{{url('/')}}/{{$p}}" class="bg-img" alt="">   
                                                                    @endif
                                                            </a>
                                                            @endforeach
                                                            </div>
                                                            <div class="labels-left">
                                                                <div>
                                                                    <span class="label label-shadow">{{$pd->leadtype}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="seen-data">
                                                                <i data-feather="camera"></i>
                                                                <span>{{ count($pic) }}</span>
                                                            </div>                 
                                                            <div class="overlay-property-box">
                                                                <a href="" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist">
                                                                    <i data-feather="heart"></i>                                                                               
                                                                </a>
                                                            </div>
                                                        </div>
                        
                                                        <div class="property-details">
                                                            <span class="font-roboto">Apartment </span>
                                                             @if(auth()->user()->type == 'super_admin')
                                                            <a href="{{ route('admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                <h4>{{ $pd->propertyname}}</h4>
                                                            </a>
                                                            @elseif(auth()->user()->type == 'admin')
                                                              <a href="{{ route('user.admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                <h4>{{ $pd->propertyname}}</h4>
                                                            </a>
                                                             @endif
                                                            <ul>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">:2 Unit</li>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths: {{ $pd->bathrooms}}</li>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">SqF:{{ $pd->pricepersft }}</li>
                                                            </ul>
                                                            <div class="property-btn d-flex">
                                                                <span>{{ date('F d, Y',strtotime($pd->createdate)) }}</span>
                                                                @if(auth()->user()->type == 'super_admin')
                                                              <a href="{{ route('admin.details.property', [$pd->id, $pd->categoryid]) }}"><button type="button"  onclick="" class="btn btn-dashed btn-pill color-2">Details</button></a>
                                                            @elseif(auth()->user()->type == 'admin')
                                                            <a href="{{ route('user.admin.details.property', [$pd->id, $pd->categoryid]) }}"><button type="button"  onclick="" class="btn btn-dashed btn-pill color-2">Details</button></a>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach

                                                <div id="displayproperty" class="row" hidden></div>


												<nav class="theme-pagination" hidden>
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
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
    <!-- magnific js -->
    <script src="{{url('/')}}/assets/js/jquery.magnific-popup.js"></script>
    <script src="{{url('/')}}/assets/js/zoom-gallery.js"></script>
    <!-- sidebar js -->
    <!--<script src="{{url('/')}}/assets/js/sidebar.js"></script>-->
    <!-- slick js -->
    <script src="{{url('/')}}/assets/js/slick.js"></script>
    <script src="{{url('/')}}/assets/js/slick-animation.min.js"></script>
    <script src="{{url('/')}}/assets/js/custom-slick.js"></script>
    <style>
        .circle {
    background-color:#ac111a;
    border:2px solid red;    
    height:100px;
    border-radius:50%;
    -moz-border-radius:50%;
    -webkit-border-radius:50%;
    width:100px;
    color: #fff !important;
    
}
</style>


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