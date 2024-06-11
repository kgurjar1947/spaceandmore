@include("admin/header")
<style>
/* <!-- page n0 16934 --> */
.page-header .breadcrumb a {
    color: var(--theme-default7);
    /* <!-- padding: 5px; --> */
    padding: 14px 14px !important;
    position: relative;
}
/* <!-- page n0 16944 --> */
.page-header .breadcrumb a .fa {
    font-size: 24px !important;
}
</style>

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="page-header-left">
                                    <h3>Post Property
                                        <small>Welcome to admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
								<div class="card-body admin-form">
								    <form class="row gx-3" style="display:none">
									<ol class="col-md-2 d-flex justify-content-end breadcrumb pull-right">
										<li class="breadcrumb-item d-flex">
											<a href="">
												<i class="fa fa-home"></i>
											</a>
										</li>
									</ol>
									 <div class="form-group col-sm-5">
                                            <label>Category</label>
                                            <select class="form-select" id="categoryid" readonly>
                                                <option value="" selected disabled>Select Category</option>
                                                @foreach($categorydata as $ca)
                                                <option value="{{$ca['id']}}" {{ $ca['id'] == $categoryid ? "selected" : "disabled"}}>{{$ca['categoryname']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
										 <div class="form-group col-sm-5">
                                            <label>Sub Category</label>

                                            <select class="form-select" id="subcategoryid" readonly>
                                                <option value="" selected disabled>Select Sub Category</option>
                                            </select>
                                        </div>
									</form>
								</div>
                                <!-- Breadcrumb start -->

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
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h5>Post Property Commercial</h5>
                                </div>

                                 <div class="card-body admin-form">
                                    <form class="row gx-3" id="add_commercial" enctype="multipart/form-data">

                                    <div class="form-group col-sm-6">
                                            <label><span style="color:red;font-size: 20px;">*</span>Property Name</label>
                                            <input type="text" name="propertyname" id="propertyname" class="form-control" placeholder="Property Name">
                                            <input type="hidden" id="category_id" name="category_id" value="{{$categoryid}}" class="form-control">
                                            <input type="hidden" id="subcategory_id" name="subcategory_id" value="{{$subcategoryid}}" class="form-control">
                                            <input type="hidden" id="id" name="id" value="{{\Session::get('id')}}" class="form-control">
                                             @if(Session::get('id') == 1)
                                            <input type="hidden" id="approval" name="approval" value="1" class="form-control">
                                            @else
                                            <input type="hidden" id="approval" name="approval" value="0" class="form-control">
                                            @endif
                                    </div>
                                    <div class="form-group col-sm-6">
                                            <label><span style="color:red;font-size: 20px;">*</span>Property ID</label>
                                            <input type="text" name="propertyid" id="propertyid" class="form-control" placeholder="123476" value="<?php echo $Property_id?>" readonly>
                                    </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Executive Name</label>
                                            <select class="form-select" name="executivename" id="executivename">
                                                <option value="">Select Executive Name</option>
                                                @foreach($executive_name as $key => $val)
                                                <option value="{{$val->name}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Data Provided Date</label>
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Owner Name</label>
                                            <input type="text" name="ownername" id="ownername" class="form-control"  placeholder="Owner Name">
                                        </div>
                                        	<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Owner Number</label>
                                            <input type="text" name="ownernumber" id="ownernumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" class="form-control" placeholder="9876543210">
                                        <span id="ownernumber_1" style="color:red;"></span>
                                        </div>
                                        
                                        <div class="form-group col-sm-4">
                                            <label>Contact 2</label>
                                            <input type="number" name="contact_two" id="contact_two" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" class="form-control" placeholder="9876543210">
                                            <span id="contact_two_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="email@gmail.com">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Supervisor Name</label>
                                            <input type="text" name="supervisorname" id="supervisorname" class="form-control" placeholder="Supervisor Name">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Supervisor Contact</label>
                                            <input type="number" name="supervisornumber" id="supervisornumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" class="form-control key_number" placeholder="98976543210">
                                            <span id="supervisornumber_1" style="color:red;"></span>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Source</label>

                                            <select class="form-select" name="source" id="source">
                                                <option value="">Select Source</option>
                                                <option value="Magic Bricks">Magic Bricks</option>
                                                <option value="99Aceers">99Aceers</option>
                                                <option value="S&M">S&M</option>
                                                <option value="Website-Other">Website-Other</option>
                                                <option value="DC">DC</option>
                                                <option value="Times">Times</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Paper Other">Paper Other</option>
                                                <option value="Walk-In">Walk-In</option>
                                                <option value="Management">Management</option>
                                                <option value="Drive Through">Drive Through</option>
                                                <option value="Referred BY">Referred BY</option>
                                                <option value="Business Park">Business Park</option>
                                                <option value="Adv Board">Adv Board</option>
                                                <option value="Cold Calling">Cold Calling</option>
                                                <option value="Other Source">Other Source</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12">
                                           <div class="row">
                                             <div class="col-md-4">
                                            <!--<label><span style="color:red;font-size: 20px;">*</span>Website ID</label>-->
                                            <!--<input type="text" name="websiteid" id="websiteid" class="form-control" placeholder="123er">-->
                                             <label><span style="color:red;font-size: 20px;">*</span>Lead Type</label>
                                             <select class="form-select" name="leadtype" id="leadtype">
                                                 <option value="">Select...</option>
                                                 <option value="Rent">Rent</option>
                                                 <option value="Sale">Sale</option>
                                             </select>
                                             </div>
                                             <div class="col-md-8">
                                               <label><span style="color:red;font-size: 20px;">*</span>Description(Details)</label>
                                            <textarea name="description" class="form-control" rows="4" id="description"></textarea>
                                             </div>
                                           </div>
                                        </div>
                                         <div class="form-group col-sm-4">
                                             <label><span style="color:red;font-size: 20px;">*</span>Service Charge (Days/Amount)</label>
                                             <input type="number" name="servicecharge" class="form-control" placeholder="" id="servicecharge">
                                             <span id="servicecharge_1" style="color:red;"></span>
                                        </div>
                                        <!--<div class="form-group col-sm-4">-->
                                        <!--     <label><span style="color:red;font-size: 20px;">*</span>Hot Property</label>-->
                                        <!--     <select name="hotproperty" class="form-select" id="hotproperty">-->
                                        <!--         <option value="">Select...</option>-->
                                        <!--         <option value="Yes">Yes</option>-->
                                        <!--         <option value="No">No</option>-->
                                        <!--     </select>-->
                                        <!--</div>-->
                                        <div class="form-group col-sm-4">
                                             <label><span style="color:red;font-size: 20px;">*</span>S&M Property</label>
                                             <select name="smproperty" class="form-select" id="smproperty">
                                                 <option value="">Select...</option>
                                                 <option value="Other">Other</option>
                                                 <option value="Managed">Managed</option>
                                                 <option value="BP">BP</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Location in City</label>
                                            <select name="location" class="form-select" id="location">
                                                 <option value="">Select City</option>
                                                 @foreach($location as $key => $val)
                                                 <option value="{{$val->location_slug}}">{{$val->location_name}}</option>
                                                 @endforeach
                                             </select>
                                        </div>
                                         <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Building Name</label>
                                            <input type="text" name="building_name"  id="building_name" class="form-control" placeholder="Building Name">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Unit</label>
                                            <input type="text" name="unit" class="form-control" placeholder="Unit" id="unit">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Landmark</label>
                                            <input type="text" name="landmark" class="form-control" placeholder="Landmark" id="landmark">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Total Price</label>
                                            <input type="text" name="totalprice" class="form-control" placeholder="13000" id="totalprice">
                                            <span id="totalprice_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Price Per Sft</label>
                                            <input type="number" name="pricepersft" id="pricepersft" class="form-control" placeholder="1300...">
                                            <span id="pricepersft_1" style="color:red;"></span>
                                        </div>
                                         <div class="form-group col-sm-4">
                                            <label>Maintenance (Per Sft/Tot)</label>
                                            <input type="text" name="maintenance" id="maintenance" class="form-control" placeholder="">
                                            <span id="maintenance_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Deposit (Months)</label>
                                            <input type="number" name="deposit" class="form-control" placeholder="" id="deposit">
                                            <span id="deposit_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lock-In(Months)</label>
                                           <input type="number" name="lockin" id="lockin" class="form-control key_number" placeholder="">
                                           <span id="lockin_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Built Up Area</label>
                                            <input type="number" name="builtuparea" id="builtuparea" class="form-control" placeholder="Build up Area..">
                                            <span id="builtuparea_1" style="color:red;"></span>
                                        </div>
                                        	<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Available From</label>
                                            <select name="availablefrom" id="availablefrom" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Immediate">Immediate</option>
                                                 <option value="Later">Later</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Available Date</label>
                                            <input type="text" id="availabledate" name="availabledate" value="<?php echo date('d-m-Y');?>" class="form-control" style="display: none;" readonly>
                                            <input type="date" id="availabledate1" name="availabledate" class="form-control" style="display: none;">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>DG Backup</label>
                                            <select name="dgbackup" class="form-select" id="dgbackup">
                                                 <option value="">Select...</option>
                                                 <option value="100%">100%</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>AC</label>
                                            <select name="ac" class="form-select" id="ac">
                                                 <option value="">Select...</option>
                                                 <option value="Split">Split</option>
                                                 <option value="Central">Central</option>
                                                 <option value="Cassette">Cassette</option>
                                                 <option value="NA">NA</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Floor</label>
                                            <input type="number" name="floor" id="floor" class="form-control key_number" placeholder="4..">
                                            <span id="floor_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Total Floors</label>
                                            <input type="number" name="totalfloors" id="totalfloors" class="form-control key_number" placeholder="4..">
                                            <span id="totalfloors_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>No.of Car Parking</label>
                                            <input type="number" name="carparking" id="carparking" class="form-control key_number" placeholder="4..">
                                            <span id="carparking_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lift</label>
                                            <select name="lift" id="lift" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Security</label>
                                            <select name="security" id="security" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Onsite Manager</label>
                                            <select name="onsitemanager" id="onsitemanager" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>No.of Bathrooms</label>
                                            <input type="number" name="bathrooms" id="bathrooms" class="form-control key_number" placeholder="4..">
                                            <span id="bathrooms_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Age( Years)</label>
                                            <input type="number" name="age" id="age" class="form-control key_number" placeholder="4 Years..">
                                            <span id="age_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Plot Area (Sq Yards)</label>
                                            <input type="number" name="plotarea" id="plotarea" class="form-control key_number" placeholder="400">
                                            <span id="plotarea_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Carpet Area(Sft)</label>
                                            <input type="number" name="carpetarea" id="carpetarea" class="form-control key_number" placeholder="400">
                                            <span id="carpetarea_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Property Facing</label>
                                            <select name="propertyfacing" id="propertyfacing" class="form-select">
                                                 <option value="">Select...</option>
                                                 @foreach($facing as $key => $val)
                                                 <option value="{{$val->facing_name}}">{{$val->facing_name}} Facing</option>
                                                 @endforeach
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Keys Available</label>
                                            <select name="keyavailable" id="keyavailable" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Cleint & Owner">Client & Owner</option>
                                                 <option value="Client Only">Client Only</option>
                                                 <option value="No Access(Bio)">No Access(Bio)</option>
                                                 <option value="No Access(Keys)">No Access(Keys)</option>
                                                 <!--<option value="During Office hours only">During Office hours only</option>-->
                                                 <option value="During Work Hours">During Work Hours</option>
                                                 <!--<option value="Keys with Security">Keys with Security </option>-->
                                                 <option value="Owner Only">Owner Only</option>
                                                 <option value="Supervisor">Supervisor</option>
                                                 <option value="Watchman & Bio">Watchman & Bio</option>
                                                 <option value="Watchman & Bio Permission">Watchman & Bio Permission</option>
                                                 <option value="Watchman & No Bio">Watchman & No Bio</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-12 mb-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Suitable For</label>
                                            <div class="additional-checkbox">
                                                <label for="chk-ani">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani" type="checkbox" value="Apt"> Apt
                                                </label>
                                                <label for="chk-ani1">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani1" type="checkbox" value="Boutique"> Boutique
                                                </label>
                                                <label for="chk-ani2">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani2" type="checkbox" value="Call Center"> Call Center
                                                </label>
                                                <label for="chk-ani3">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani3" type="checkbox" value="Clinic"> Clinic
                                                </label>
                                                <label for="chk-ani4">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani4" type="checkbox" value="Gated Apt">Gated Apt
                                                </label>
                                                <label for="chk-ani5">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani5" type="checkbox" value="Godown">Godown
                                                </label>
                                                <label for="chk-ani6">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani6" type="checkbox" value="Gym">Gym
                                                </label>
                                                <label for="chk-ani7">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani7" type="checkbox" value="Hostel">Hostel
                                                </label>
                                                <label for="chk-ani8">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani8" type="checkbox" value="Ind House">Ind House
                                                </label>
                                                <label for="chk-ani9">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani9" type="checkbox" value="Land">Land
                                                </label>
												<label for="chk-ani10">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani10" type="checkbox" value="Office">Office
                                                </label>
												<label for="chk-ani11">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani11" type="checkbox" value="Other">Other
                                                </label>
												<label for="chk-ani12">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani12" type="checkbox" value="Play School">Play School
                                                </label>
												<label for="chk-ani13">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani13" type="checkbox" value="Restaurant">Restaurant
                                                </label>
												<label for="chk-ani14">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani14" type="checkbox" value="Retail">Retail
                                                </label>
												<label for="chk-ani15">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani15" type="checkbox" value="School">School
                                                </label>
												<label for="chk-ani16">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani16" type="checkbox" value="Shop">Shop
                                                </label>
												<label for="chk-ani17">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani17" type="checkbox" value="Spa & saloon">Spa & saloon
                                                </label>
												<label for="chk-ani18">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani18" type="checkbox" value="Studio">Studio
                                                </label>
												<label for="chk-ani19">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani19" type="checkbox" value="Training Center">Training Center
                                                </label>
												<label for="chk-ani20">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani20" type="checkbox" value="Villa">Villa
                                                </label>
												<label for="chk-ani21">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani21" type="checkbox" value="Warehouse">Warehouse
                                                </label>

                                            </div>
                                        </div>
										<!--<div class="form-group col-sm-4">-->
          <!--                                  <label><span style="color:red;font-size: 20px;">*</span>Commercial Subtype</label>-->
          <!--                                  <select name="commercialsubtype" class="form-select" id="commrecialsubtype">-->
          <!--                                       <option value="">Select...</option>-->
          <!--                                       <option value="Godown">Godown</option>-->
          <!--                                       <option value="Land">Land</option>-->
          <!--                                       <option value="Office">Office</option>-->
          <!--                                       <option value="Retial">Retial</option>-->
          <!--                                       <option value="Shop">Shop</option>-->
          <!--                                       <option value="Warehouse">Warehouse</option>-->
          <!--                                   </select>-->
          <!--                              </div>-->
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Commercial Furinished</label>
                                            <select name="commercialfurinished" class="form-select" id="commrecialfurinished">
                                                 <option value="">Select...</option>
                                                 <option value="Plug & Play">Plug & Play</option>
                                                 <option value="Bare Shell">Bare Shell</option>
                                                 <option value="Warm Shell">Warm Shell</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Other Community</label>
                                            <select name="othercommunity" id="othercommunity" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>

                                            <div class="form-group col-sm-4">
                                                <label>No.of work stations</label>
                                                <input type="number" name="workstations" id="workstations" class="form-control key_number" placeholder="4">
                                                <span id="workstations_1" style="color:red;"></span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>No.of Manager Cabins</label>
                                                <input type="number" name="managercabins" id="managercabins" class="form-control key_number" placeholder="4">
                                                <span id="managercabins_1" style="color:red;"></span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>No.of Dicussion Rooms</label>
                                                <input type="number" name="discussionrooms" id="discussionrooms" class="form-control key_number" placeholder="4">
                                                <span id="discussionrooms_1" style="color:red;"></span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>No.of Conference Room</label>
                                                <input type="number" name="conferencerooms" id="conferencerooms" class="form-control key_number" placeholder="4">
                                                <span id="conferencerooms_1" style="color:red;"></span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Boardroom (Capacity)</label>
                                                <input type="number" name="boardrooms" id="boardrooms" class="form-control key_number" placeholder="4">
                                                <span id="boardrooms_1" style="color:red;"></span>
                                            </div>


										<div class="form-group col-sm-4">
                                            <label>Reception</label>
                                            <select name="reception" id="reception" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Pantry</label>
                                            <select name="pantry" id="pantry" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Lunch Room</label>
                                            <select name="lunchroom" id="lunchroom" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Server Room</label>
                                            <select name="serverroom" id="serverroom" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lead time (days) (If Business Park)</label>
                                            <input type="number" name="leadtime" id="leadtime" class="form-control key_number" placeholder="4">
                                            <span id="leadtime_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Liable Upto (If Business Park)</label>
                                            <input type="date" name="liableupto" id="liableupto" class="form-control" placeholder="4">
                                        </div>
										<!--<div class="form-group col-sm-4">-->
          <!--                                  <label>Date</label>-->
          <!--                                  <input type="date" name="dateinend" id="dateinend" class="form-control">-->
          <!--                              </div>-->

										<!--<div class="form-group col-sm-12 mb-4">-->
          <!--                                  <label style="font-size:16px !important;">Select Amenities</label>-->
          <!--                                  <div class="additional-checkbox">-->
          <!--                                      <label for="chk-ani11111">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani11111" type="checkbox" value="Air Conditioning"> Air Conditioning-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani111">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani111" type="checkbox" value="Balcony"> Balcony-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani211">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani211" type="checkbox" value="Basketball Courts">Basketball Courts-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani311">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani311" type="checkbox" value="Club House"> Club House-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani411">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani411" type="checkbox" value="DG Back Up 100%">DG Back Up 100%-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani511">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani511" type="checkbox" value="DG Backup">DG Backup-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani611">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani611" type="checkbox" value="Lift">Lift-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani711">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani711" type="checkbox" value="Lunch Area">Lunch Area-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani811">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani811" type="checkbox" value="OnSite Manager">OnSite Manager-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani911">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani911" type="checkbox" value="Party Hall">Party Hall-->
          <!--                                      </label>-->
										<!--		<label for="chk-ani1011">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1011" type="checkbox" value="Security">Security-->
          <!--                                      </label>-->
										<!--		<label for="chk-ani1111">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1111" type="checkbox" value="Servant Room">Servant Room-->
          <!--                                      </label>-->
										<!--		<label for="chk-ani1211">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1211" type="checkbox" value="Swimming Pool">Swimming Pool-->
          <!--                                      </label>-->
          <!--                                      	<label for="chk-ani12112">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1211" type="checkbox" value="Pantry">Pantry-->
          <!--                                      </label>-->
          <!--                                  </div>-->
          <!--                              </div>-->
                                    <div class="input-field col-sm-12 pb-2">
                                        <label class="active">Images</label><span style="color:red;font-size: 20px;">*</span>
                                        <div class="input-images-2" style="padding-top: .5rem;"></div>
                                    </div>
										<div class="form-group col-sm-12">
										 <label>Floor Plan</label>
                                         <div class="floorplan" style="padding-top: .5rem;"></div>

                                            <!--<div class="panel-body row">

												  <div id="floor_plan">

														</div>
												<div class="col-sm-12 nopadding">
												  <div class="form-group">
													<div class="input-group">

													<input type="file" class="form-control" id="floor" name="file[]"/>
													  <div class="input-group-btn">
														<button class="btn btn-success" type="button"  onclick="floor_plan();"> <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span> </button>
													  </div>
													</div>
												  </div>
												</div>
												<div class="clear"></div>

											</div>-->
                                        </div>

										<div class="form-group col-sm-12">
                                            <label>Property GPS Location</label><span style="color:red;font-size: 20px;">*</span>
                                            <input type="text" class="form-control" id="locations" name="locations" placeholder="iframe">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Landmark GPS Location<span style="color:red;font-size: 20px;">*</span></label>
                                            <input type="text" name="landmark_gps" id="landmark_gps" class="form-control" placeholder="iframe">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Video Url</label>
                                            <input type="text" name="video_url" id="video_url" class="form-control" placeholder="video url">
                                        </div>
                                        
										 <div class="form-btn col-sm-12">
                                            <button id="submit"  name="submit" type="submit" class="btn btn-pill btn-gradient color-4">Submit</button>
                                            @if(auth()->user()->type == 'super_admin')
                                            <a type="button" href="{{url('/super-admin/viewproperty/2')}}" class="btn btn-pill btn-dashed color-4">Cancel</a>
                                            @elseif(auth()->user()->type == 'admin')
                                            <a type="button" href="{{url('/user-admin/viewproperty/2')}}" class="btn btn-pill btn-dashed color-4">Cancel</a>
                                            @endif
                                        </div>
                                    </form>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->

            </div>
@include("admin/footer")

<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/imgup/image-uploader.min.css">
<script type="text/javascript" src="{{url('/')}}/assets/imgup/image-uploader.min.js"></script>
   <script>


/*
let preloaded = [
    {id: 1, src: 'https://picsum.photos/500/500?random=1'},
    {id: 2, src: 'https://picsum.photos/500/500?random=2'},
    {id: 3, src: 'https://picsum.photos/500/500?random=3'},
    {id: 4, src: 'https://picsum.photos/500/500?random=4'},
    {id: 5, src: 'https://picsum.photos/500/500?random=5'},
    {id: 6, src: 'https://picsum.photos/500/500?random=6'},
];*/

$('.input-images-2').imageUploader({
    //preloaded: preloaded,
    imagesInputName: 'proimages',
    //preloadedInputName: 'old',
    //maxSize: 2 * 1024 * 1024,
    //maxFiles: 10
});

$('.floorplan').imageUploader({
    //preloaded: preloaded,
    imagesInputName: 'file',
    //preloadedInputName: 'old',
    //maxSize: 2 * 1024 * 1024,
    //maxFiles: 10
});


		var room = 1;
function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-12 nopadding"><div class="col-sm-6 nopadding"><div class="form-group"><div class="input-group"><input type="file" class="form-control" id="floor" name="file" value=""/><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span> </button></div></div></div></div><div class="clear"></div>';

    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }


$(document).ready(function(){
var cat_id = $("#categoryid").val();
    $.ajax({
        url: '{{url("/api/getsubcategory")}}',
        type: 'POST',
        data: {category_id:cat_id},
        success: function(res) {
            subcategorylist = '<option value="" selected disabled>Select Sub Category</option>';
            subcatid = {{$subcategoryid}};
            $.each(res.catdata, function(key,val) {
                //console.log(val.subcategoryname);
                selsubcat = val.id == subcatid ? "selected" : "disabled";
                subcategorylist = subcategorylist.concat('<option value="'+val.id+'" '+selsubcat+'>'+val.subcategoryname+'</option>');
            });
            $("#subcategoryid").html(subcategorylist);

        }
    });


$('#addpropertycom').submit(function(e){
e.preventDefault();
$('input[type="submit"]').attr('disabled','disabled');
var formData  = new FormData(this);
formData.append("category_id", $("#categoryid").val());
formData.append("subcategory_id", $("#subcategoryid").val());

$.ajax({
type: 'POST',
url: '{{url("/api/addnewpropertycom")}}',
//contentType: "application/json",
//dataType: "json",
//data: $(this).serialize(),

data: formData,
   contentType: false,
         cache: false,
   processData:false,

})
.done(function(data){


$("#addpropertycom")[0].reset();

if(data.status==0){
alert("Something Went Wrong!");
}
else{
alert("Added!");
location.reload();
//$(location).attr('href', '{{url("/setsession")}}/'+data.admin_id);
}

})
.fail(function() {
//alert( "Posting failed." );
});
return false;
});

});

$("#ownernumber").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#ownernumber_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	});  
	
	$("#contact_two").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#contact_two_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	});  
		$("#servicecharge").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#servicecharge_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	});  
	
// 		$("#totalprice").keypress(function(e) {
// 		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
// 			$("#totalprice_1").html("Digits Only").show().fadeOut("slow");
// 			return false;
// 		}
// 	});  
	
// 		$("#maintenance").keypress(function(e) {
// 		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
// 			$("#maintenance_1").html("Digits Only").show().fadeOut("slow");
// 			return false;
// 		}
// 	});  
	
	$("#pricepersft").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#pricepersft_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
		$("#deposit").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#deposit_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	$("#builtuparea").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#builtuparea_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
		$("#lockin").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#lockin_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
		$("#floor").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#floor_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	
		$("#totalfloors").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#totalfloors_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
		$("#carparking").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#carparking_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
// 		$("#bathrooms").keypress(function(e) {
// 		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
// 			$("#bathrooms_1").html("Digits Only").show().fadeOut("slow");
// 			return false;
// 		}
// 	}); 
	
// 		$("#age").keypress(function(e) {
// 		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
// 			$("#age_1").html("Digits Only").show().fadeOut("slow");
// 			return false;
// 		}
// 	}); 
	
		$("#plotarea").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#plotarea_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
		$("#bathrooms").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#bathrooms_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 


		$("#carpetarea").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#carpetarea_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	
		$("#workstations").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#workstations_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	
	
		$("#managercabins").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#managercabins_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	
		$("#discussionrooms").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#discussionrooms_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	
		$("#conferencerooms").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#conferencerooms_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	
		$("#boardrooms").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#boardrooms_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	
		$("#supervisornumber").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#supervisornumber_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
		$("#leadtime").keypress(function(e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$("#leadtime_1").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	}); 
	
	$(document).ready(function () {
        $('#availablefrom').change(function () {
            if ($('#availablefrom').val() == 'Immediate') {
                $('#availabledate1').hide();
                $('#availabledate').show();
            }else if($('#availablefrom').val() == 'Later'){
                $('#availabledate1').show();
                $('#availabledate').hide();
            }
            else {
                $('#availabledate').hide();
                $('#availabledate1').hide();
            }
        });
    });
    
    
    
    $(function () {
        $("input[id*='maintenance']").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
    });
    
    $(function () {
        $("input[id*='totalprice']").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
    });
    
    $(function () {
        $("input[id*='age']").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
    });
    
    $(function () {
        $("input[id*='bathrooms']").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
    });
    
    </script>
</body>
</html>
