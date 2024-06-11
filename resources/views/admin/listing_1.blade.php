@include("admin/header")
            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Enabled List
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
                                    <li class="breadcrumb-item active">{{$categorydata->categoryname}}</li>
                                    <li class="breadcrumb-item active">My properties</li>
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
                                                   <div class="col-md-6" style="display: flex;align-items: center;">@php $currentPage = $prodata->currentPage();@endphp
												       <p><h5 class="mb-0">Showing <span>{{$currentPage}} to  {{$total_page}}</span>Pages</h5>
												       <nav class="theme-pagination" style="margin-left: 30px;"><ul class="pagination">{!! $prodata->links() !!}</ul></nav></p>
												   </div>
                                                    <div class="col-md-6">
                                                        <div class="row d-flex justify-content-end">
														<div class="col-md-8">
														 <select class="form-select" aria-label="Default select example" id="categoryid" onchange="window.location.assign('{{ url()->current().'?zone=' }}'+this.value)">
														  <option selected value="">select your Category</option>
														  @php $id = $_GET['zone'] ?? '' @endphp
														  @foreach($subcategorydata as $key => $cd)
                                                          <option value="{{$cd->id}}" {{ $cd->id == $id ? "selected" : ""}}>{{ $cd->subcategoryname }}</option>
														  @endforeach
														</select>
														</div>
														<!--<div class="col-md-6">-->
														<!--  <select class="form-select" aria-label="Default select example" id="subcategoryid">-->
														<!--  <option selected>select your Sub Category</option>-->
														<!--</select>-->
														<!--</div>-->
                                                            <!-- <span class="m-r-10">Map view</span> -->
                                                             <!-- <label class="switch"> -->
                                                                 <!-- <input type="checkbox" class="option-list" name="step_1" value="ani1" checked=""><span class="switch-state"></span> -->
                                                             <!-- </label> -->
                                                             <!-- <span class="m-l-10">List view</span> -->
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="property-2 row column-sm property-label property-grid">
                                                @foreach($prodata as $pd)
                                                    @php
                                                    $pic = explode(", ",$pd->proimages);   
                                                    //print_r($pic);exit;
                                                    @endphp
                                                    <div class="col-xl-4 col-md-4">
                                                    <div class="property-box">
                                                        <div class="property-image">
                                                            <div class="property-slider">
                                                                 
                                                            @foreach($pic as $p)
                                                            @if(!empty($p))
                                                            <a href="javascript:void(0)">
                                                                    <img src="{{url('/')}}/{{$p}}" class="bg-img" alt="" style="width: 100%;height:185px;display:block !important">                                     
                                                            </a>
                                                            @endif
                                                            @endforeach

                                                            </div>
                                                            <div class="labels-left">
                                                                <div>
                                                                    <span class="label label-dark">{{$pd->leadtype}}</span>
                                                                    <span class="label label-success">@if($pd->approval == 1) approved @else waiting for approval @endif </span>
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
                                                            <span class="font-roboto">{{get_subcategoryid_name($pd->subcategoryid)}}</span>
                                                             @if(auth()->user()->type == 'super_admin')
                                                            <a href="{{ route('admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                	@elseif(auth()->user()->type == 'admin')
                                                            <a href="{{ route('user.admin.details.property', [$pd->id, $pd->categoryid]) }}">
                                                                @endif
                                                                <h4>({{ $pd->propertyid}}) {{ $pd->propertyname}}</h4>
                                                            </a>
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


<script>

    function selectcat(){
        var cat_id = $("#categoryid").val();
        $.ajax({
            url: '{{url("/api/getsubcategory")}}',
            type: 'POST',
            data: {category_id:cat_id},
            success: function(res) {
                subcategorylist = '<option value="" selected disabled>Select Sub Category</option>';
                $.each(res.catdata, function(key,val) {
                    subcategorylist = subcategorylist.concat('<option value="'+val.id+'">'+val.subcategoryname+'</option>');
                });
                $("#subcategoryid").html(subcategorylist);
                
            }
        });
    }
$(document).ready(function(){

    selectcat();

    var cat_id = $("#categoryid").val();
    $.ajax({
            url: '{{url("/api/getproperty")}}',
            type: 'POST',
            data: {category_id:cat_id},
            success: function(res) {
                console.log(res);
                //var displayproperty = '<div class="col-sm-4 col-md-4">123</div> <div class="col-sm-4 col-md-4">123</div> <div class="col-sm-4 col-md-4">123</div>';
                displayproperty = '';
                displayproperty2 = '';

                $.each(res, function(key,val) {
                    
                    displayproperty2 = displayproperty2.concat(`

                    <div class="col-sm-4 col-md-4">
                                                    <div class="property-box">
                                                        <div class="property-image">
                                                            <div class="property-slider">
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{url('/')}}/assets/images/property/1.jpg" class="bg-img" alt="">
                                                                    
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{url('/')}}/assets/images/property/2.jpg" class="bg-img" alt="">
                                                                    
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{url('/')}}/assets/images/property/3.jpg" class="bg-img" alt="">
                                                                    
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{url('/')}}/assets/images/property/4.jpg" class="bg-img" alt="">
                                                                    
                                                                </a>
                                                            </div>
                                                            <div class="labels-left">
                                                                <div>
                                                                    <span class="label label-shadow">sale</span>
                                                                </div>
                                                            </div>
                                                            <div class="seen-data">
                                                                <i data-feather="camera"></i>
                                                                <span>04</span>
                                                            </div>                 
                                                            <div class="overlay-property-box">
                                                                <a href="" class="effect-round like" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist">
                                                                    <i data-feather="heart"></i>                                                                               
                                                                </a>
                                                            </div>
                                                        </div>
                        
                                                        <div class="property-details">
                                                            <span class="font-roboto">Villa</span>
                                                            <a href="property-details.html">
                                                                <h4>The Ivy Residences...</h4>
                                                            </a>
                                                            <ul>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/double-bed.svg" class="img-fluid" alt="">:2 Unit</li>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/bathroom.svg" class="img-fluid" alt="">Baths:4</li>
                                                                <li><img src="{{url('/')}}/assets/images/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="">SqF:5000</li>
                                                            </ul>
                                                            <div class="property-btn d-flex">
                                                                <span>August 14, 2023</span>
                                                              <a href="property-details.html"><button type="button"  onclick="" class="btn btn-dashed btn-pill color-2">Details</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    `);

                });
                $("#displayproperty").html(displayproperty);
                
            }
        });


    $("#categoryid").change(function(){
        //selectcat();
        //alert("new case");
    });

});
</script>

<!-- magnific js -->
<script src="{{url('/')}}/assets/js/jquery.magnific-popup.js"></script>
    <script src="{{url('/')}}/assets/js/zoom-gallery.js"></script>


    <!-- slick js -->
    <script src="{{url('/')}}/assets/js/slick.js"></script>
    <script src="{{url('/')}}/assets/js/slick-animation.min.js"></script>
    <script src="{{url('/')}}/assets/js/custom-slick.js"></script>

</body>
</html>