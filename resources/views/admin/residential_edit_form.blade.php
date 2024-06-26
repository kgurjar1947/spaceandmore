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
                                    <h3>Edit property
                                        <small>Welcome to admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
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
                                    <h5>Edit property Residential</h5>
                                </div>
								
                                 <div class="card-body admin-form">
                                    <form class="row gx-3" id="addproperty" enctype="multipart/form-data">

                                    <div class="form-group col-sm-6">
                                            <label><span style="color:red;font-size: 20px;">*</span>Property Name</label>
                                            <input type="text" name="propertyname" class="form-control"  value="{{$prodata->propertyname}}" placeholder="Property Name" required="">
                                            <input type="hidden" name="id" class="form-control"  value="{{$prodata->id}}" placeholder="Property Name" required="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                            <label><span style="color:red;font-size: 20px;">*</span>Property ID</label>
                                            <input type="text" name="propertyid" class="form-control" value="<?php echo $prodata->propertyid?>" placeholder="123476" required="" readonly>
                                    </div>
                                     @if(auth()->user()->type == 'admin')
										<div class="form-group col-sm-4">
                                            <input type="hidden" name="approval" value="0" class="form-control" placeholder="98976543210" required="">
                                        </div>
                                        @else
                                        	<div class="form-group col-sm-4">
                                            <input type="hidden" name="approval" value="0" class="form-control" placeholder="98976543210" required="">
                                        </div>
                                        @endif
                                    
										<div class="form-group col-sm-12">
                                            <label><span style="color:red;font-size: 20px;">*</span>Executive Name</label>
                                            <!--<input type="text" name="executivename" class="form-control" value="{{$prodata->executivename}}" placeholder="Name" required="">-->
                                            <select name="executivename" class="form-select" required="">
                                                 <option>Select Executive Name</option>
                                                  @foreach($executive_name as $key => $val)
                                                 <option value="{{$val->name}}" {{ $prodata->executivename == $val->name ? 'selected':'' }}>{{$val->name}}</option>
                                                 @endforeach
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Data Provided Date</label>
                                            <input type="date" name="date" class="form-control" value="{{$prodata->date}}">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span> Owner Name</label>
                                            <input type="text" name="ownername" class="form-control" value="{{$prodata->ownername}}" placeholder="Owner Name" required="">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Contact 1</label>
                                            <input type="number" name="ownernumber" id="ownernumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" class="form-control" value="{{$prodata->ownernumber}}" placeholder="9876543210" required="">
                                        <span id="ownernumber_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Contact 2</label>
                                            <input type="number" name="contact_two" id="contact_two" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" class="form-control" value="{{$prodata->contact_two}}" placeholder="9876543210">
                                        <span id="contact_two_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control" value="{{$prodata->email}}" placeholder="email@gmail.com">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Supervisor Name</label>
                                            <input type="text" name="supervisorname" class="form-control" value="{{$prodata->supervisorname}}" placeholder="Supervisor Name">
                                        </div>
										
										<div class="form-group col-sm-4">
                                            <label>Supervisor Contact</label>
                                            <input type="number" name="supervisornumber" id="supervisornumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" class="form-control" value="{{$prodata->supervisornumber}}" placeholder="98976543210">
                                            <span id="supervisornumber_1" style="color:red;"></span>
                                        </div>
										
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Source</label>

                                            <select class="form-select" name="source" required="">
                                                <option>Select Source</option>
                                                <option value="Magic Bricks" {{ $prodata->source == 'Magic Bricks' ? 'selected':'' }}>Magic Bricks</option>
                                                <option value="99Aceers" {{ $prodata->source == '99Aceers' ? 'selected':'' }}>99Aceers</option>
                                                <option value="S&M" {{ $prodata->source == 'S&M' ? 'selected':'' }}>S&M</option>
                                                <option value="Website-Other" {{ $prodata->source == 'Website-Other' ? 'selected':'' }}>Website-Other</option>
                                                <option value="DC" {{ $prodata->source == 'DC' ? 'selected':'' }}>DC</option>
                                                <option value="Times" {{ $prodata->source == 'Times' ? 'selected':'' }}>Times</option>
                                                <option value="Hindu" {{ $prodata->source == 'Hindu' ? 'selected':'' }}>Hindu</option>
                                                <option value="Paper Other" {{ $prodata->source == 'Paper Other' ? 'selected':'' }}>Paper Other</option>
                                                <option value="Walk-In" {{ $prodata->source == 'Walk-In' ? 'selected':'' }}>Walk-In</option>
                                                <option value="Management" {{ $prodata->source == 'Management' ? 'selected':'' }}>Management</option>
                                                <option value="Drive Through" {{ $prodata->source == 'Drive Through' ? 'selected':'' }}>Drive Through</option>
                                                <option value="Referred BY" {{ $prodata->source == 'Referred BY' ? 'selected':'' }}>Referred BY</option>
                                                <option value="Business Park" {{ $prodata->source == 'Business Park' ? 'selected':'' }}>Business Park</option>
                                                <option value="Adv Board" {{ $prodata->source == 'Adv Board' ? 'selected':'' }}>Adv Board</option>
                                                <option value="Cold Calling" {{ $prodata->source == 'Cold Calling' ? 'selected':'' }}>Cold Calling</option>
                                                <option value="Other Source" {{ $prodata->source == 'Other Source' ? 'selected':'' }}>Other Source</option>
                                            </select>
                                        </div>
										<div class="form-group col-sm-12">
                                           <div class="row">
										     <div class="col-md-4">
											<!--<label><span style="color:red;font-size: 20px;">*</span>Website ID</label>
                                        <input type="text" name="websiteid" class="form-control" value="{{$prodata->websiteid}}" placeholder="123er" required="">-->
											 <label><span style="color:red;font-size: 20px;">*</span>Lead Type</label>
                                             <select class="form-select" name="leadtype" required="">
                                                 <option>Select...</option>
                                                 <option value="Rent" {{ $prodata->leadtype == 'Rent' ? 'selected':'' }}>Rent</option>
                                                 <option value="Sale" {{ $prodata->leadtype == 'Sale' ? 'selected':'' }}>Sale</option>
                                             </select>
											 </div>
											 <div class="col-md-8">
											   <label>Description(Details)</label>
                                            <textarea name="description" class="form-control" rows="4">{{$prodata->description}}</textarea>
											 </div>
										   </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                             <label><span style="color:red;font-size: 20px;">*</span>Service Charge (Days/Amount)</label>
                                             <input type="number" name="servicecharge" id="servicecharge" class="form-control" value="{{$prodata->servicecharge}}" placeholder="" required="">
                                              <span id="servicecharge_1" style="color:red;"></span>
                                        </div>
                                        <!--<div class="form-group col-sm-4">-->
                                        <!--     <label><span style="color:red;font-size: 20px;">*</span>Hot Property</label>-->
                                        <!--     <select name="hotproperty" class="form-select" required="">-->
                                        <!--         <option>Select...</option>-->
                                        <!--         <option value="Yes" {{ $prodata->hotproperty == 'Yes' ? 'selected':'' }}>Yes</option>-->
                                        <!--         <option value="No" {{ $prodata->hotproperty == 'No' ? 'selected':'' }}>No</option>-->
                                        <!--     </select>-->
                                        <!--</div>-->
										<div class="form-group col-sm-4">
                                             <label><span style="color:red;font-size: 20px;">*</span>S&M Property</label>
                                             <select name="smproperty" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Other" {{ $prodata->smproperty == 'Other' ? 'selected':'' }}>Other</option>
                                                 <option value="Managed" {{ $prodata->smproperty == 'Managed' ? 'selected':'' }}>Managed</option>
                                                 <option value="BP" {{ $prodata->smproperty == 'BP' ? 'selected':'' }}>BP</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Location in City</label>
                                            <select name="location" class="form-select" required="">
                                                 <option>Select City</option>
                                                  @foreach($location as $key => $val)
                                                 <option value="{{$val->location_slug}}" {{ $prodata->location == $val->location_slug ? 'selected':'' }}>{{$val->location_name}}</option>
                                                 @endforeach
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Building Name</label>
                                            <input type="text" name="building_name" class="form-control" value="{{$prodata->building_name}}" placeholder="Building Name" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Unit</label>
                                            <input type="text" name="unit" class="form-control" value="{{$prodata->unit}}" placeholder="Unit" required="">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Landmark</label>
                                            <input type="text" name="landmark" class="form-control" value="{{$prodata->landmark}}" placeholder="Landmark" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Total Price</label>
                                            <input type="text" name="totalprice" id="totalprice" class="form-control" value="{{$prodata->totalprice}}" placeholder="13000" required="">
                                             <span id="totalprice_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Price Per Sft</label>
                                            <input type="text" id="pricepersft" name="pricepersft" class="form-control" value="{{$prodata->pricepersft}}" placeholder="1300...">
                                            <span id="pricepersft_1" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Maintenance (Per Sft/Tot)</label>
                                            <input type="text" name="maintenance" id="maintenance" class="form-control" value="{{$prodata->maintenance}}" placeholder="">
                                            <span id="maintenance_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Deposit (Months)</label>
                                            <input type="number" name="deposit" id="deposit" class="form-control" value="{{$prodata->deposit}}" placeholder="1300..." required="">
                                            <span id="deposit_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Lock-In(Months)</label>
                                            <input type="number" name="lockin" id="lockin" class="form-control" value="{{$prodata->lockin}}" placeholder="">
                                              <span id="lockin_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Built Up Area</label>
                                            <input type="number" id="builtuparea" name="builtuparea" class="form-control" value="{{$prodata->builtuparea}}" placeholder="Build up Area.." required="">
                                        <span id="builtuparea_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Available From</label>
                                            <select name="availablefrom" id="availablefrom" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Immediate" {{ $prodata->availablefrom == 'Immediate' ? 'selected':'' }}>Immediate</option>
                                                 <option value="Later" {{ $prodata->availablefrom == 'Later' ? 'selected':'' }}>Later</option>
                                             </select>
                                        </div>
                                        @if(!empty($prodata->availablefrom == 'Immediate'))
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Available Date</label>
                                            <input type="date" id="availabledate1" name="availabledate" value="{{$prodata->availabledate}}" class="form-control">
                                        </div>
                                        @elseif(!empty($prodata->availablefrom == 'Later'))
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Available Date</label>
                                            <input type="date" id="availabledate1" name="availabledate" value="{{$prodata->availabledate}}" class="form-control">
                                        </div>
                                        @else
                                        <div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Available Date</label>
                                            <input type="text" id="availabledate" name="availabledate2" value="<?php echo date('d-m-Y');?>" class="form-control" style="display: none;" readonly>
                                            <input type="date" id="availabledate1" name="availabledate" value="{{$prodata->availabledate}}" class="form-control" style="display: none;">
                                        </div>
                                        @endif
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Dg Backup</label>
                                            <select name="dgbackup" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="100%" {{ $prodata->dgbackup == '100%' ? 'selected':'' }}>100%</option>
                                                 <option value="Yes" {{ $prodata->dgbackup == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->dgbackup == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Ac</label>
                                            <select name="ac" class="form-select" required="">
                                                 <option>Select...</option>
                                                 <option value="Split" {{ $prodata->ac == 'Split' ? 'selected':'' }}>Split</option>
                                                 <option value="Central" {{ $prodata->ac == 'Central' ? 'selected':'' }}>Central</option>
                                                 <option value="Cassette" {{ $prodata->ac == 'Cassette' ? 'selected':'' }}>Cassette</option>
                                                 <option value="NA" {{ $prodata->ac == 'NA' ? 'selected':'' }}>NA</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Floor</label>
                                             <input type="number" name="floor" id="floor" class="form-control" value="{{$prodata->floor}}" placeholder="2.."> 
                                             <span id="floor_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Total Floors</label>
                                            <input type="number" name="totalfloors" id="totalfloors" class="form-control" value="{{$prodata->totalfloors}}" placeholder="4..">
                                             <span id="totalfloors_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>No.Car Parking</label>
                                            <input type="number" name="carparking" id="carparking" class="form-control" value="{{$prodata->carparking}}" placeholder="4..">
                                            <span id="carparking_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Lift</label>
                                            <select name="lift" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->lift == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->lift == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Security</label>
                                            <select name="security" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->security == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->security == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Onsite Manager</label>
                                            <select name="onsitemanager" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes"  {{ $prodata->onsitemanager == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->onsitemanager == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>No.of Bathrooms</label>
                                            <input type="text" name="bathrooms" id="bathrooms" class="form-control" value="{{$prodata->bathrooms}}" placeholder="4..">
                                            <span id="bathrooms_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Age( Years)</label>
                                            <input type="text" name="age" id="age" class="form-control" value="{{$prodata->age}}" placeholder="4 Years..">
                                            <span id="age_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Plot Area (Sq Yards)</label>
                                            <input type="number" name="plotarea" id="plotarea" class="form-control" value="{{$prodata->plotarea}}" placeholder="400">
                                            <span id="plotarea_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Carpet Area(Sft)</label>
                                            <input type="number" name="carpetarea" id="carpetarea" class="form-control" value="{{$prodata->carpetarea}}" placeholder="400">
                                            <span id="carpetarea_1" style="color:red;"></span>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Property Facing</label>
                                            <select name="propertyfacing" class="form-select">
                                                 <option value="">Select...</option>
                                                 @foreach($facing as $key => $val)
                                                 <option value="{{$val->facing_name}}" {{ $prodata->propertyfacing == $val->facing_name ? 'selected':'' }}>{{$val->facing_name}} Facing</option>
                                                 @endforeach
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Keys Available</label>
                                            <select name="keyavailable" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Cleint & Owner" {{ $prodata->keyavailable == 'Cleint & Owner' ? 'selected':'' }}>Client & Owner</option>
                                                 <option value="Client Only" {{ $prodata->keyavailable == 'Client Only' ? 'selected':'' }}>Client Only</option>
                                                 <option value="No Access(Bio)" {{ $prodata->keyavailable == 'No Access(Bio)' ? 'selected':'' }}>No Access(Bio)</option>
                                                 <option value="No Access(Keys)" {{ $prodata->keyavailable == 'No Access(Keys)' ? 'selected':'' }}>No Access(Keys)</option>
                                                 <option value="Owner Only" {{ $prodata->keyavailable == 'Owner Only' ? 'selected':'' }}>Owner Only</option>
                                                 <option value="Supervisor" {{ $prodata->keyavailable == 'Supervisor' ? 'selected':'' }}>Supervisor</option>
                                                 
                                                  <!--<option value="During Office hours only" {{ $prodata->keyavailable == 'During Office hours only' ? 'selected':'' }}>During Office hours only</option>-->
                                                 <!--<option value="Keys with Security" {{ $prodata->keyavailable == 'Keys with Security' ? 'selected':'' }}>Keys with Security</option>-->
                                                 <option value="During Work Hours" {{ $prodata->keyavailable == 'During Work Hours' ? 'selected':'' }}>During Work Hours</option>
                                                 <option value="Watchman & Bio" {{ $prodata->keyavailable == 'Watchman & Bio' ? 'selected':'' }}>Watchman & Bio</option>
                                                 <option value="Watchman & Bio Permission" {{ $prodata->keyavailable == 'Watchman & Bio Permission' ? 'selected':'' }}>Watchman & Bio Permission</option>
                                                 <option value="Watchman & No Bio" {{ $prodata->keyavailable == 'Watchman & No Bio' ? 'selected':'' }}>Watchman & No Bio</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-12 mb-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Suitable For</label>
                                            <div class="additional-checkbox">
                                                <label for="chk-ani">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani" type="checkbox" {{ in_array('Apt', $suitable_for) ? 'checked' : null }} value="Apt"> Apt
                                                </label>
                                                <label for="chk-ani1">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani1" type="checkbox" {{ in_array('Boutique', $suitable_for) ? 'checked' : null }} value="Boutique"> Boutique
                                                </label>
                                                <label for="chk-ani2">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani2" type="checkbox" {{ in_array('Call Center', $suitable_for) ? 'checked' : null }} value="Call Center"> Call Center
                                                </label>
                                                <label for="chk-ani3">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani3" type="checkbox" {{ in_array('Clinic', $suitable_for) ? 'checked' : null }} value="Clinic"> Clinic
                                                </label>
                                                <label for="chk-ani4">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani4" type="checkbox" {{ in_array('Gated Apt', $suitable_for) ? 'checked' : null }} value="Gated Apt">Gated Apt
                                                </label>
                                                <label for="chk-ani5">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani5" type="checkbox" {{ in_array('Godown', $suitable_for) ? 'checked' : null }} value="Godown">Godown
                                                </label>
                                                <label for="chk-ani6">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani6" type="checkbox" {{ in_array('Gym', $suitable_for) ? 'checked' : null }} value="Gym">Gym
                                                </label>
                                                <label for="chk-ani7">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani7" type="checkbox" {{ in_array('Hostel', $suitable_for) ? 'checked' : null }} value="Hostel">Hostel
                                                </label>
                                                <label for="chk-ani8">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani8" type="checkbox" {{ in_array('Ind House', $suitable_for) ? 'checked' : null }} value="Ind House">Ind House
                                                </label>
                                                <label for="chk-ani9">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani9" type="checkbox" {{ in_array('Land', $suitable_for) ? 'checked' : null }} value="Land">Land
                                                </label>
												<label for="chk-ani10">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani10" type="checkbox" {{ in_array('Office', $suitable_for) ? 'checked' : null }} value="Office">Office
                                                </label>
												<label for="chk-ani11">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani11" type="checkbox" {{ in_array('Other', $suitable_for) ? 'checked' : null }} value="Other">Other
                                                </label>
												<label for="chk-ani12">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani12" type="checkbox" {{ in_array('Play School', $suitable_for) ? 'checked' : null }} value="Play School">Play School
                                                </label>
												<label for="chk-ani13">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani13" type="checkbox" {{ in_array('Restaurant', $suitable_for) ? 'checked' : null }} value="Restaurant">Restaurant
                                                </label>
												<label for="chk-ani14">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani14" type="checkbox" {{ in_array('Retail', $suitable_for) ? 'checked' : null }} value="Retail">Retail
                                                </label>
												<label for="chk-ani15">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani15" type="checkbox" {{ in_array('School', $suitable_for) ? 'checked' : null }} value="School">School
                                                </label>
												<label for="chk-ani16">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani16" type="checkbox" {{ in_array('Shop', $suitable_for) ? 'checked' : null }} value="Shop">Shop
                                                </label>
												<label for="chk-ani17">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani17" type="checkbox" {{ in_array('Spa & saloon', $suitable_for) ? 'checked' : null }} value="Spa & saloon">Spa & saloon
                                                </label>
												<label for="chk-ani18">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani18" type="checkbox" {{ in_array('Studio', $suitable_for) ? 'checked' : null }} value="Studio">Studio
                                                </label>
												<label for="chk-ani19">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani19" type="checkbox" {{ in_array('Training Center', $suitable_for) ? 'checked' : null }} value="Training Center">Training Center
                                                </label>
												<label for="chk-ani20">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani20" type="checkbox" {{ in_array('Villa', $suitable_for) ? 'checked' : null }} value="Villa">Villa
                                                </label>
												<label for="chk-ani21">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani21" type="checkbox" {{ in_array('Warehouse', $suitable_for) ? 'checked' : null }} value="Warehouse">Warehouse
                                                </label>
											
                                            </div>
                                        </div>
										<!--<div class="form-group col-sm-4">-->
          <!--                                  <label><span style="color:red;font-size: 20px;">*</span>Residential Subtype</label>-->
          <!--                                  <select name="residentialsubtype" class="form-select" required="">-->
          <!--                                       <option value="">Select...</option>-->
          <!--                                       <option value="Apartment" {{ $prodata->residentialsubtype == 'Apartment' ? 'selected':'' }}>Apartment</option>-->
          <!--                                       <option value="Gated Apartment" {{ $prodata->residentialsubtype == 'Gated Apartment' ? 'selected':'' }}>Gated Apartment</option>-->
          <!--                                       <option value="Hotel" {{ $prodata->residentialsubtype == 'Hotel' ? 'selected':'' }}>Hotel</option>-->
          <!--                                       <option value="Independent House" {{ $prodata->residentialsubtype == 'Independent House' ? 'selected':'' }}>Independent House</option>-->
          <!--                                       <option value="Land" {{ $prodata->residentialsubtype == 'Land' ? 'selected':'' }}>Land</option>-->
          <!--                                       <option value="Villa" {{ $prodata->residentialsubtype == 'Villa' ? 'selected':'' }}>Villa</option>-->
          <!--                                   </select>-->
          <!--                              </div>-->
										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Residential Furinished</label>
                                            <select name="residentialfurinished" class="form-select" required="">
                                                 <option value="">Select...</option>
                                                 <option value="Semi Furnished" {{ $prodata->residentialfurinished == 'Semi Furnished' ? 'selected':'' }}>Semi Furnished</option>
                                                 <option value="Full Furnished" {{ $prodata->residentialfurinished == 'Full Furnished' ? 'selected':'' }}>Full Furnished</option>
                                                 <option value="Bare Shell" {{ $prodata->residentialfurinished == 'Bare Shell' ? 'selected':'' }}>Bare Shell</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Other Community</label>
                                            <select name="othercommunity" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->othercommunity == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->othercommunity == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>No.of BHK</label>
                                             <select name="communitydetails" class="form-select">
                                                 <option value="">Select...</option>
                                                 @foreach($bhk as $key => $val)
                                                 <option value="{{$val->bhk_name}}BHK" {{ $val->bhk_name.'BHK' == $prodata->communitydetails ? 'selected':'' }}>{{$val->bhk_name}} BHK</option>
                                                 @endforeach
                                             </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Geysers</label>
                                            <!--<input type="text" name="geysers" class="form-control" value="{{$prodata->geysers}}" placeholder="No. of Geysers">-->
                                            <select name="geysers" class="form-select">
                                            <option value="">Select...</option>
                                            <option value="Yes" {{ $prodata->geysers == 'Yes' ? 'selected':'' }}>Yes</option>
                                            <option value="No" {{ $prodata->geysers == 'No' ? 'selected':'' }}>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Wardrobes</label>
                                            <!--<input type="text" name="wardrobes" class="form-control" value="{{$prodata->wardrobes}}" placeholder="Wardrobes">-->
                                            <select name="wardrobes" class="form-select">
                                            <option value="">Select...</option>
                                            <option value="Yes" {{ $prodata->wardrobes == 'Yes' ? 'selected':'' }}>Yes</option>
                                            <option value="No" {{ $prodata->wardrobes == 'No' ? 'selected':'' }}>No</option>
                                            </select>
                                        </div>

										<div class="form-group col-sm-4">
                                            <label><span style="color:red;font-size: 20px;">*</span>Bachelors Allowed</label>
                                            <select name="bachelors" class="form-select" required="">
                                                 <option value="">Select...</option>
                                                 <option value="no" {{ $prodata->bachelors == 'no' ? 'selected':'' }}>No/Not Provided</option>
                                                 <option value="Boys" {{ $prodata->bachelors == 'Boys' ? 'selected':'' }}>Boys</option>
                                                 <option value="Girls" {{ $prodata->bachelors == 'Girls' ? 'selected':'' }}>Girls</option>
                                                 <option value="Both" {{ $prodata->bachelors == 'Both' ? 'selected':'' }}>Both</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Clinic</label>
                                            <select name="clinic" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->clinic == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->clinic == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Servant Room</label>
                                            <select name="servantroom" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->servantroom == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->servantroom == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Pets Allowed</label>
                                            <select name="petsallowed" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->petsallowed == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->petsallowed == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Club House</label>
                                            <select name="clubhouse" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->clubhouse == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->clubhouse == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Duplex</label>
                                            <select name="duplex" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->duplex == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->duplex == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Pool</label>
                                            <select name="pool" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->pool == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->pool == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Tennis Court</label>
                                            <select name="tennis" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->tennis == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->tennis == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Grocery Store</label>
                                            <select name="grocerystore" class="form-select">
                                                 <option value="">Select...</option>
                                                 <option value="Yes" {{ $prodata->grocerystore == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->grocerystore == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<!--<div class="form-group col-sm-12 mb-4">-->
          <!--                                  <label style="font-size:16px !important;">Select Amenities</label>-->
          <!--                                  <div class="additional-checkbox">-->
          <!--                                      <label for="chk-ani">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani" type="checkbox" {{ in_array('Air Conditioning', $amenities) ? 'checked' : null }} value="Air Conditioning"> Air Conditioning-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani1">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1" type="checkbox" {{ in_array('Balcony', $amenities) ? 'checked' : null }} value="Balcony"> Balcony-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani2">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani2" type="checkbox" {{ in_array('Basketball Courts', $amenities) ? 'checked' : null }} value="Basketball Courts">Basketball Courts-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani3">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani3" type="checkbox" {{ in_array('Club House', $amenities) ? 'checked' : null }} value="Club House"> Club House-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani4">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani4" type="checkbox" {{ in_array('DG Back Up 100%', $amenities) ? 'checked' : null }} value="DG Back Up 100%">DG Back Up 100%-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani5">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani5" type="checkbox" {{ in_array('DG Backup', $amenities) ? 'checked' : null }} value="DG Backup">DG Backup-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani6">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani6" type="checkbox" {{ in_array('Lift', $amenities) ? 'checked' : null }} value="Lift">Lift-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani7">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani7" type="checkbox" {{ in_array('Lunch Area', $amenities) ? 'checked' : null }} value="Lunch Area">Lunch Area-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani8">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani8" type="checkbox" {{ in_array('OnSite Manager', $amenities) ? 'checked' : null }} value="OnSite Manager">OnSite Manager-->
          <!--                                      </label>-->
          <!--                                      <label for="chk-ani9">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani9" type="checkbox" {{ in_array('Party Hall', $amenities) ? 'checked' : null }} value="Party Hall">Party Hall-->
          <!--                                      </label>-->
										<!--		<label for="chk-ani10">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani10" type="checkbox" {{ in_array('Security', $amenities) ? 'checked' : null }} value="Security">Security-->
          <!--                                      </label>-->
										<!--		<label for="chk-ani11">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani11" type="checkbox" {{ in_array('Servant Room', $amenities) ? 'checked' : null }} value="Servant Room">Servant Room-->
          <!--                                      </label>-->
										<!--		<label for="chk-ani12">-->
          <!--                                          <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani12" type="checkbox" {{ in_array('Swimming Pool', $amenities) ? 'checked' : null }} value="Swimming Pool">Swimming Pool-->
          <!--                                      </label>-->
          <!--                                  </div>-->
          <!--                              </div>-->
										 <div class="input-field col-sm-12 pb-2">
                                        <label class="active">Images</label><span style="color:red;font-size: 20px;">*</span>
                                        <div class="input-images-2" style="padding-top: .5rem;"></div>
                                    </div>
                                         @php
                                           $pic = explode(", ",$prodata->proimages);         
                                        @endphp
									    <div class="form-group col-sm-12">
									        @if(!empty($prodata->proimages))
									         @foreach($pic as $key => $p)
									         @if(!empty($p))
                                           <img src="{{ url('/')}}/{{$p}}" style="width:300px">
                                            @if(auth()->user()->type == 'super_admin')
                                           <a class="remove-image" href="{{route('admin.image.delete', [$prodata->categoryid, $prodata->id, $key])}}" style="display: inline;">&#215;</a>
                                           @elseif(auth()->user()->type == 'admin')
                                           <a class="remove-image" href="{{route('user.admin.image.delete', [$prodata->categoryid, $prodata->id, $key])}}" style="display: inline;">&#215;</a>
                                             @endif
                                             @endif
                                            @endforeach
                                            @endif
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
                                        
                                        
                                        @php
                                           $pic = explode(", ",$prodata->file);         
                                        @endphp
									    <div class="form-group col-sm-12">
									         @foreach($pic as $key => $p)
									          @if(!empty($p))
                                           <img src="{{ url('/')}}/{{$p}}" style="width:300px;height: 170px;">
                                           @if(auth()->user()->type == 'super_admin')
                                           <a class="remove-image" href="{{route('admin.file.delete', [$prodata->categoryid, $prodata->id, $key])}}" style="display: inline;">&#215;</a>
                                           @elseif(auth()->user()->type == 'admin')
                                           <a class="remove-image" href="{{route('user.admin.file.delete', [$prodata->categoryid, $prodata->id, $key])}}" style="display: inline;">&#215;</a>
                                             @endif
                                             @endif
                                            @endforeach
                                        </div>
										<div class="form-group col-sm-12">
                                            <label>Property GPS Location</label></label><span style="color:red;font-size: 20px;">*</span>
                                            <input type="text" name="locations" class="form-control" value="{{$prodata->locations}}" placeholder="iframe" required>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Landmark GPS Location</label><span style="color:red;font-size: 20px;">*</span>
                                            <input type="text" name="landmark_gps" class="form-control" value="{{$prodata->landmark_gps}}" placeholder="iframe" >
                                        </div>
                                         <div class="form-group col-sm-12">
                                            <label>Video Url</label>
                                            <input type="text" name="video_url" id="video_url"  value="{{$prodata->video_url}}" class="form-control" placeholder="video url">
                                        </div>
										 <div class="form-btn col-sm-12">
                                            <button type="submit" name="submit" class="btn btn-pill btn-gradient color-4">Submit</button>
                                           @if(auth()->user()->type == 'super_admin')
                                            <a type="button" href="{{url('/super-admin/viewproperty/1')}}" class="btn btn-pill btn-dashed color-4">Cancel</a>
                                            @elseif(auth()->user()->type == 'admin')
                                            <a type="button" href="{{url('/user-admin/viewproperty/1')}}" class="btn btn-pill btn-dashed color-4">Cancel</a>
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



		var floorplan_id = 1;
function floor_plan() {
 
    floorplan_id++;
    var objTo = document.getElementById('floor_plan')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+floorplan_id);
	var rdiv = 'removeclass'+floorplan_id;
    divtest.innerHTML = '<div class="col-sm-12 nopadding"><div class="col-sm-12 nopadding"><div class="form-group"><div class="input-group"><input type="file" class="form-control" id="floor" name="file[]" value=""/><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_floor_fields('+ floorplan_id +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span> </button></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_floor_fields(rid) {
	   $('.removeclass'+rid).remove();
   }


$(document).ready(function(){



    var cat_id = $("#categoryid").val();


    /*$("#categoryid").change(function(){
        
    });*/


    

$('#addproperty').submit(function(e){
    e.preventDefault();

    var formData  = new FormData(this);
    formData.append("category_id", $("#categoryid").val());
    formData.append("subcategory_id", $("#subcategoryid").val());

$.ajax({
type: 'POST',
url: '{{url("/api/editnewproperty")}}',
//contentType: "application/json",
//dataType: "json",
//data: $(this).serialize(),

data: formData,
   contentType: false,
         cache: false,
   processData:false,

})
.done(function(data){
 
$("#addproperty")[0].reset();   

if(data.status==0){
alert("Something Went Wrong!");
}
else{
    alert("Update Successfully !");
//location.reload();
@if(auth()->user()->type == 'super_admin')
$(location).attr('href', '{{url("/super-admin/viewproperty/1")}}/');
 @elseif(auth()->user()->type == 'admin')
 $(location).attr('href', '{{url("/user-admin/viewproperty/1")}}/');
  @endif
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
	
// 	$("#pricepersft").keypress(function(e) {
// 		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
// 			$("#pricepersft_1").html("Digits Only").show().fadeOut("slow");
// 			return false;
// 		}
// 	}); 

$(function () {
            $("input[id*='pricepersft']").keydown(function (event) {
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
	
// 		$("#bathrooms").keypress(function(e) {
// 		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
// 			$("#bathrooms_1").html("Digits Only").show().fadeOut("slow");
// 			return false;
// 		}
// 	}); 


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
                $('#availabledate').hide();
                $('#availabledate2').hide();
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
</script>
<style>
 .remove-image {
  top: -10px;
  right: -10px;
  border-radius: 10em;
  padding: 2px 6px 3px;
  text-decoration: none;
  font: 700 21px/20px sans-serif;
  background: #555;
  border: 3px solid #fff;
  color: #FFF;
  box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 2px 4px rgba(0,0,0,0.3);
    text-shadow: 0 1px 2px rgba(0,0,0,0.5);
    -webkit-transition: background 0.5s;
    transition: background 0.5s;
  }
  .remove-image:hover {
   background: #E54E4E;
    padding: 3px 7px 5px;
    top: -11px;
  right: -11px;
  }
  .remove-image:active {
   background: #E54E4E;
    top: -10px;
  right: -11px;
  }
  
  
  
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
    
</style>
</body>
</html>