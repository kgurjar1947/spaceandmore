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
                                    <form class="row gx-3" id="addpropertycom" enctype="multipart/form-data">

                                    <div class="form-group col-sm-6">
                                            <label>Property Name</label>
                                            <input type="text" name="propertyname" class="form-control" placeholder="Property Name" required="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                            <label><span style="color:red;font-size: 20px;">*</span>Property ID</label>
                                            <input type="text" name="propertyid" class="form-control" placeholder="123476" value="<?php echo $Property_id?>" required="">
                                    </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Executive Name</label>
                                            <input type="text" name="executivename" class="form-control" placeholder="Name" required="">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Data Provided Date</label>
                                            <input type="date" name="date" class="form-control" required="">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Owner Name</label>
                                            <input type="text" name="ownername" class="form-control" placeholder="Owner Name" required="">
                                        </div>
                                        	<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Contact 1</label>
                                            <input type="number" name="ownernumber" maxlength="10" minlength="10" class="form-control" placeholder="9876543210" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Contact 2</label>
                                            <input type="number" name="contact_two" maxlength="10" minlength="10" class="form-control" placeholder="9876543210">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control" placeholder="email@gmail.com" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Supervisor Name</label>
                                            <input type="text" name="supervisorname" class="form-control" placeholder="Supervisor Name" required="">
                                        </div>
                                        
                                        <div class="form-group col-sm-4">
                                            <label>Supervisor Contact</label>
                                            <input type="number" name="supervisornumber" class="form-control" placeholder="98976543210" required="">
                                        </div>
										
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Source</label>

                                            <select class="form-select" name="source" required="">
                                                <option>Select Source</option>
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
                                            <label><span style="color:red;font-size: 20px;">*</span>Website ID</label>
                                            <input type="text" name="websiteid" class="form-control" placeholder="123er" required="">
                                             <label><span style="color:red;font-size: 20px;">*</span>Lead Type</label>
                                             <select class="form-select" name="leadtype" required="">
                                                 <option>Select...</option>
                                                 <option value="Rent">Rent</option>
                                                 <option value="Sale">Sale</option>
                                             </select>
                                             </div>
                                             <div class="col-md-8">
                                               <label><span style="color:red;font-size: 20px;">*</span>Description(Details)</label>
                                            <textarea name="description" class="form-control" rows="4" required=""></textarea>
                                             </div>
                                           </div>
                                        </div>
                                         <div class="form-group col-sm-4">
                                             <label><span style="color:red;font-size: 20px;">*</span>Service Charge (Days/Amount)</label>
                                             <input type="number" name="servicecharge" class="form-control" placeholder="" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                             <label><span style="color:red;font-size: 20px;">*</span>Hot Property</label>
                                             <select name="hotproperty" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                             <label><span style="color:red;font-size: 20px;">*</span>S&M Property</label>
                                             <select name="smproperty" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Other">Other</option>
                                                 <option value="Managed">Managed</option>
                                                 <option value="BP">BP</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Location in City</label>
                                            <select name="location" class="form-select" required="">
                                                 <option>Select City</option>
                                                 @foreach($location as $key => $val)
                                                 <option value="{{$val->location_slug}}">{{$val->location_name}}</option>
                                                 @endforeach
                                             </select>
                                        </div>
                                         <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Building Name</label>
                                            <input type="text" name="building_name" class="form-control" placeholder="Building Name" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Unit</label>
                                            <input type="text" name="unit" class="form-control" placeholder="Unit" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Landmark</label>
                                            <input type="text" name="landmark" class="form-control" placeholder="Landmark" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Total Price</label>
                                            <input type="text" name="totalprice" class="form-control" placeholder="13000" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Price Per Sft</label>
                                            <input type="number" name="pricepersft" class="form-control" placeholder="1300...">
                                        </div>
                                         <div class="form-group col-sm-4">
                                            <label>Maintenance (Per Sft/Tot)</label>
                                            <input type="text" name="maintenance" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Deposit (Months)</label>
                                            <input type="number" name="deposit" class="form-control" placeholder="" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lock-In(Months)</label>
                                            <select name="lockin" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="1 Year">1 Year</option>
                                                 <option value="2 Year">2 Year</option>
                                                 <option value="3 Year">3 Year</option>
                                                 <option value="4 Year">4 Year</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Built Up Area</label>
                                            <input type="number" name="builtuparea" class="form-control" placeholder="Build up Area.." required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Available From</label>
                                            <select name="availablefrom" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Immediate">Immediate</option>
                                                 <option value="Later">Later</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Available Date</label>
                                            <input type="date" name="availabledate" class="form-control" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Dg Backup</label>
                                            <select name="dgbackup" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="100%">100%</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Ac</label>
                                            <select name="ac" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Split">Split</option>
                                                 <option value="Central">Central</option>
                                                 <option value="Cassette">Cassette</option>
                                                 <option value="NA">NA</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Floor</label>
                                            <select name="floor" class="form-select">
                                                 <option>Select...</option>
                                                 @foreach($floor as $key => $val)
                                                 <option value="{{$val->floor_name}}">{{$val->floor_name}} Floor</option>
                                                 @endforeach
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Total Floors</label>
                                            <input type="number" name="totalfloors" class="form-control" placeholder="4..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>No.of Car Parking</label>
                                            <input type="number" name="carparking" class="form-control" placeholder="4..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lift</label>
                                            <select name="lift" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Security</label>
                                            <select name="security" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Onsite Manager</label>
                                            <select name="onsitemanager" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>No.of Bathrooms</label>
                                            <input type="number" name="bathrooms" class="form-control" placeholder="4..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Age( Years)</label>
                                            <input type="number" name="age" class="form-control" placeholder="4 Years..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Plot Area (Sq Yards)</label>
                                            <input type="number" name="plotarea" class="form-control" placeholder="400">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Carpet Area(Sft)</label>
                                            <input type="number" name="carpetarea" class="form-control" placeholder="400">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Property Facing</label>
                                            <select name="propertyfacing" class="form-select">
                                                 <option>Select...</option>
                                                 @foreach($facing as $key => $val)
                                                 <option value="{{$val->facing_name}}">{{$val->facing_name}} Facing</option>
                                                 @endforeach
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Keys Available</label>
                                            <select name="keyavailable" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Cleint & Owner">Client & Owner</option>
                                                 <option value="Client Only">Client Only</option>
                                                 <option value="No Access(Bio)">No Access(Bio)</option>
                                                 <option value="No Access(Keys)">No Access(Keys)</option>
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
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Commercial Subtype</label>
                                            <select name="commrecialsubtype" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Godown">Godown</option>
                                                 <option value="Land">Land</option>
                                                 <option value="Office">Office</option>
                                                 <option value="Retial">Retial</option>
                                                 <option value="Shop">Shop</option>
                                                 <option value="Warehouse">Warehouse</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Commercial Furinished</label>
                                            <select name="commrecialfurinished" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Plug & Play">Plug & Play</option>
                                                 <option value="Bare Shell">Bare Shell</option>
                                                 <option value="Warm Shell">Warm Shell</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Other Community</label>
                                            <select name="othercommunity" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
										
                                            <div class="form-group col-sm-4">
                                                <label>No.of work stations</label>
                                                <input type="number" name="workstations" class="form-control" placeholder="4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>No.of Manager Cabins</label>
                                                <input type="number" name="managercabins" class="form-control" placeholder="4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>No.of Dicussion Rooms</label>
                                                <input type="number" name="discussionrooms" class="form-control" placeholder="4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>No.of Conference Room</label>
                                                <input type="number" name="conferencerooms" class="form-control" placeholder="4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Boardroom (Capacity)</label>
                                                <input type="number" name="boardrooms" class="form-control" placeholder="4">
                                            </div>
                                            
                                        
										<div class="form-group col-sm-4">
                                            <label>Reception</label>
                                            <select name="reception" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Pantry</label>
                                            <select name="pantry" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Lunch Room</label>
                                            <select name="lunchroom" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Server Room</label>
                                            <select name="serverroom" class="form-select">
                                                 <option>Select...</option>
                                                 <option value="Yes">Yes</option>
                                                 <option value="No">No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lead time (days) (If Business Park)</label>
                                            <input type="number" name="leadtime" class="form-control" placeholder="4">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Liable Upto (If Business Park)</label>
                                            <input type="number" name="liableupto" class="form-control" placeholder="4">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Date</label>
                                            <input type="date" name="dateinend" class="form-control" required="">
                                        </div>
										
										<div class="form-group col-sm-12 mb-4">
                                            <label style="font-size:16px !important;">Select Amenities</label>
                                            <div class="additional-checkbox">
                                                <label for="chk-ani11111">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani11111" type="checkbox" value="Air Conditioning"> Air Conditioning
                                                </label>
                                                <label for="chk-ani111">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani111" type="checkbox" value="Balcony"> Balcony
                                                </label>
                                                <label for="chk-ani211">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani211" type="checkbox" value="Basketball Courts">Basketball Courts
                                                </label>
                                                <label for="chk-ani311">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani311" type="checkbox" value="Club House"> Club House
                                                </label>
                                                <label for="chk-ani411">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani411" type="checkbox" value="DG Back Up 100%">DG Back Up 100%
                                                </label>
                                                <label for="chk-ani511">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani511" type="checkbox" value="DG Backup">DG Backup
                                                </label>
                                                <label for="chk-ani611">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani611" type="checkbox" value="Lift">Lift
                                                </label>
                                                <label for="chk-ani711">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani711" type="checkbox" value="Lunch Area">Lunch Area
                                                </label>
                                                <label for="chk-ani811">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani811" type="checkbox" value="OnSite Manager">OnSite Manager
                                                </label>
                                                <label for="chk-ani911">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani911" type="checkbox" value="Party Hall">Party Hall
                                                </label>
												<label for="chk-ani1011">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1011" type="checkbox" value="Security">Security
                                                </label>
												<label for="chk-ani1111">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1111" type="checkbox" value="Servant Room">Servant Room
                                                </label>
												<label for="chk-ani1211">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1211" type="checkbox" value="Swimming Pool">Swimming Pool
                                                </label>
                                            </div>
                                        </div>
                                    <div class="input-field col-sm-12 pb-2">
                                        <label class="active">Images</label>
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
                                              <label>Property GPS Location</label>
                                            <input type="text" class="form-control" name="locations" placeholder="iframe">
                                        </div>
										 <div class="form-btn col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-pill btn-gradient color-4">Submit</button>
                                            <button type="button" class="btn btn-pill btn-dashed color-4">Cancel</button>
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


    </script>
</body>
</html>