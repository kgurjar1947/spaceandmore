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
                                    <h5>Edit property Commercial</h5>
                                </div>
								
                                 <div class="card-body admin-form">
                                    <form class="row gx-3" id="addpropertycom" enctype="multipart/form-data">

                                    <div class="form-group col-sm-6">
                                            <label>Property Name</label>
                                            <input type="text" name="propertyname" class="form-control" value="{{$prodata->propertyname}}" placeholder="Property Name" required="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                            <label>Property ID</label>
                                            <input type="text" name="propertyid" class="form-control" placeholder="123476" value="{{$prodata->propertyid}}" required="" readonly>
                                    </div>

                                    <div class="input-field col-sm-12 pb-2">
                                        <label class="active">Images</label>
                                        <div class="input-images-2" style="padding-top: .5rem;"></div>
                                    </div>


									
                                        
										<div class="form-group col-sm-4">
                                            <label>Executive Name</label>
                                            <input type="text" name="executivename" class="form-control" value="{{$prodata->executivename}}" placeholder="Name" required="">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Date</label>
                                            <input type="date" name="date" class="form-control" value="{{$prodata->date}}" required="">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Owner Name</label>
                                            <input type="text" name="ownername" class="form-control" value="{{$prodata->ownername}}" placeholder="Owner Name" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Owner Number</label>
                                            <input type="number" name="ownernumber" class="form-control" value="{{$prodata->ownernumber}}" placeholder="9876543210" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{$prodata->email}}" placeholder="email@gmail.com" required="">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Supervisor Name</label>
                                            <input type="text" name="supervisorname" value="{{$prodata->supervisorname}}" class="form-control" placeholder="Supervisor Name" required="">
                                        </div>
                                        
                                        <div class="form-group col-sm-4">
                                            <label>Supervisor Contact</label>
                                            <input type="number" name="supervisornumber" value="{{$prodata->supervisornumber}}" class="form-control" placeholder="98976543210" required="">
                                        </div>
										
                                        <div class="form-group col-sm-4">
                                            <label>Source</label>

                                            <select class="form-control" name="source">
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
                                            <label>Website ID</label>
                                            <input type="text" name="websiteid" class="form-control" value="{{$prodata->websiteid}}" placeholder="123er" required="">
                                             <label>Lead Type</label>
                                             <select class="form-control" name="leadtype">
                                                 <option>Select...</option>
                                                 <option value="Rent" {{ $prodata->leadtype == 'Rent' ? 'selected':'' }}>Rent</option>
                                                 <option value="Sale" {{ $prodata->leadtype == 'Sale' ? 'selected':'' }}>Sale</option>
                                             </select>
                                             </div>
                                             <div class="col-md-8">
                                               <label>Description(Details)</label>
                                            <textarea name="description" class="form-control" rows="4"></textarea>
                                             </div>
                                           </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                             <label>Service Charge Details</label>
                                             <select name="servicecharge" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Day" {{ $prodata->servicecharge == 'Day' ? 'selected':'' }}>Day</option>
                                                 <option value="Amount" {{ $prodata->servicecharge == 'Amount' ? 'selected':'' }}>Amount</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                             <label>Hot Property</label>
                                             <select name="hotproperty" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes" {{ $prodata->hotproperty == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->hotproperty == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                             <label>S&M Property</label>
                                             <select name="smproperty" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Other" {{ $prodata->smproperty == 'Other' ? 'selected':'' }}>Other</option>
                                                 <option value="Managed" {{ $prodata->smproperty == 'Managed' ? 'selected':'' }}>Managed</option>
                                                 <option value="BP" {{ $prodata->smproperty == 'BP' ? 'selected':'' }}>BP</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Location in City</label>
                                            <select name="location" class="form-control">
                                                 <option>Select City</option>
                                                 <option value="gachibowli" {{ $prodata->location == 'gachibowli' ? 'selected':'' }}>Gachibowli</option>
                                                 <option value="banjara-hills" {{ $prodata->location == 'banjara-hills' ? 'selected':'' }}>Banjara Hills</option>
                                                 <option value="madhapur" {{ $prodata->location == 'madhapur' ? 'selected':'' }}>Madhapur</option>
                                                 <option value="hubliee-hills" {{ $prodata->location == 'hubliee-hills' ? 'selected':'' }}>Jubliee Hills</option>
                                                 <option value="bio-diversity" {{ $prodata->location == 'bio-diversity' ? 'selected':'' }}>Bio Diversity</option>
                                                 <option value="kavuri-hills" {{ $prodata->location == 'kavuri-hills' ? 'selected':'' }}>Kavuri Hills</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Landmark</label>
                                            <input type="text" name="landmark" class="form-control" value="{{$prodata->landmark}}" placeholder="near sbi...">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Total Price</label>
                                            <input type="number" name="totalprice" class="form-control" value="{{$prodata->totalprice}}" placeholder="13000">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Price Per Sft</label>
                                            <input type="number" name="pricepersft" class="form-control" value="{{$prodata->pricepersft}}" placeholder="1300...">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Maintenance</label>
                                            <select name="maintenance" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Per Sft" {{ $prodata->maintenance == 'Per Sft' ? 'selected':'' }}>Per Sft</option>
                                                 <option value="Total" {{ $prodata->maintenance == 'Total' ? 'selected':'' }}>Total</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Deposit (months)</label>
                                            <select name="deposit" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="1" {{ $prodata->deposit == '1' ? 'selected':'' }}>1</option>
                                                 <option value="2" {{ $prodata->deposit == '2' ? 'selected':'' }}>2</option>
                                                 <option value="3" {{ $prodata->deposit == '3' ? 'selected':'' }}>3</option>
                                                 <option value="4" {{ $prodata->deposit == '4' ? 'selected':'' }}>4</option>
                                                 <option value="5" {{ $prodata->deposit == '5' ? 'selected':'' }}>5</option>
                                                 <option value="6" {{ $prodata->deposit == '6' ? 'selected':'' }}>6</option>
                                                 <option value="7" {{ $prodata->deposit == '7' ? 'selected':'' }}>7</option>
                                                 <option value="8" {{ $prodata->deposit == '8' ? 'selected':'' }}>8</option>
                                                 <option value="9" {{ $prodata->deposit == '9' ? 'selected':'' }}>9</option>
                                                 <option value="10" {{ $prodata->deposit == '10' ? 'selected':'' }}>10</option>
                                                 <option value="11" {{ $prodata->deposit == '11' ? 'selected':'' }}>11</option>
                                                 <option value="12" {{ $prodata->deposit == '12' ? 'selected':'' }}>12</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lock In-(Period)</label>
                                            <select name="lockin" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="1 Year" {{ $prodata->lockin == '1 Year' ? 'selected':'' }}>1 Year</option>
                                                 <option value="2 Year" {{ $prodata->lockin == '2 Year' ? 'selected':'' }}>2 Year</option>
                                                 <option value="3 Year" {{ $prodata->lockin == '3 Year' ? 'selected':'' }}>3 Year</option>
                                                 <option value="4 Year" {{ $prodata->lockin == '4 Year' ? 'selected':'' }}>4 Year</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Built Up Area</label>
                                            <input type="text" name="builtuparea" class="form-control" value="{{$prodata->builtuparea}}" placeholder="Build up Area..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Available From</label>
                                            <select name="availablefrom" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Immediate" {{ $prodata->availablefrom == 'Immediate' ? 'selected':'' }}>Immediate</option>
                                                 <option value="Later" {{ $prodata->availablefrom == 'Later' ? 'selected':'' }}>Later</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Available Date</label>
                                            <input type="date" name="availabledate" class="form-control">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Dg Backup</label>
                                            <select name="dgbackup" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="100%" {{ $prodata->dgbackup == '100%' ? 'selected':'' }}>100%</option>
                                                 <option value="Yes" {{ $prodata->dgbackup == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->dgbackup == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Ac</label>
                                            <select name="ac" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Split" {{ $prodata->ac == 'Split' ? 'selected':'' }}>Split</option>
                                                 <option value="Central" {{ $prodata->ac == 'Central' ? 'selected':'' }}>Central</option>
                                                 <option value="Cassette" {{ $prodata->ac == 'Cassette' ? 'selected':'' }}>Cassette</option>
                                                 <option value="NA" {{ $prodata->ac == 'NA' ? 'selected':'' }}>NA</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Floor</label>
                                            <input type="text" name="floor" class="form-control" value="{{$prodata->floor}}" placeholder="2..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Total Floors</label>
                                            <input type="text" name="totalfloors" class="form-control" value="{{$prodata->totalfloors}}" placeholder="4..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>No.Car Parking</label>
                                            <input type="text" name="carparking" class="form-control" value="{{$prodata->carparking}}" placeholder="4..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lift</label>
                                            <select name="lift" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes"  {{ $prodata->lift == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No"  {{ $prodata->lift == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Security</label>
                                            <select name="security" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes"  {{ $prodata->security == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No"  {{ $prodata->security == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Onsite Manager</label>
                                            <select name="onsitemanager" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes"  {{ $prodata->onsitemanager == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No"  {{ $prodata->onsitemanager == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>No. of Bathrooms</label>
                                            <input type="text" name="bathrooms" class="form-control" value="{{$prodata->bathrooms}}" placeholder="4..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Age</label>
                                            <input type="text" name="age" class="form-control" value="{{$prodata->age}}" placeholder="4 Years..">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Plot Area (Sq Yards)</label>
                                            <input type="text" name="plotarea" class="form-control" value="{{$prodata->plotarea}}" placeholder="400">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Carpet Area Sft</label>
                                            <input type="text" name="carpetarea" class="form-control" value="{{$prodata->carpetarea}}" placeholder="400">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Property Facing</label>
                                            <select name="propertyfacing" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="N"  {{ $prodata->propertyfacing == 'N' ? 'selected':'' }}>N</option>
                                                 <option value="S"  {{ $prodata->propertyfacing == 'S' ? 'selected':'' }}>S</option>
                                                 <option value="E"  {{ $prodata->propertyfacing == 'E' ? 'selected':'' }}>E</option>
                                                 <option value="W"  {{ $prodata->propertyfacing == 'W' ? 'selected':'' }}>W</option>
                                                 <option value="NE"  {{ $prodata->propertyfacing == 'NE' ? 'selected':'' }}>NE</option>
                                                 <option value="NW"  {{ $prodata->apropertyfacingc == 'NW' ? 'selected':'' }}>NW</option>
                                                 <option value="SE"  {{ $prodata->propertyfacing == 'SE' ? 'selected':'' }}>SE</option>
                                                 <option value="SW"  {{ $prodata->propertyfacing == 'SW' ? 'selected':'' }}>SW</option>
                                                 <option value="EN"  {{ $prodata->propertyfacing == 'EN' ? 'selected':'' }}>EN</option>
                                                 <option value="ES"  {{ $prodata->propertyfacing == 'ES' ? 'selected':'' }}>ES</option>
                                                 <option value="WN"  {{ $prodata->propertyfacing == 'WN' ? 'selected':'' }}>WN</option>
                                                 <option value="WS"  {{ $prodata->propertyfacing == 'WS' ? 'selected':'' }}>WS</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Key Available</label>
                                            <select name="keyavailable" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Cleint & Owner" {{ $prodata->keyavailable == 'Cleint & Owner' ? 'selected':'' }}>Client & Owner</option>
                                                 <option value="Client Only" {{ $prodata->keyavailable == 'Client Only' ? 'selected':'' }}>Client Only</option>
                                                 <option value="No Access(Bio)" {{ $prodata->keyavailable == 'No Access(Bio)' ? 'selected':'' }}>No Access(Bio)</option>
                                                 <option value="No Access(Keys)" {{ $prodata->keyavailable == 'No Access(Keys)' ? 'selected':'' }}>No Access(Keys)</option>
                                                 <option value="Owner Only" {{ $prodata->keyavailable == 'Owner Only' ? 'selected':'' }}>Owner Only</option>
                                                 <option value="Supervisor" {{ $prodata->keyavailable == 'Supervisor' ? 'selected':'' }}>Supervisor</option>
                                                 <option value="Watchman & Bio" {{ $prodata->keyavailable == 'Watchman & Bio' ? 'selected':'' }}>Watchman & Bio</option>
                                                 <option value="Watchman & Bio Permission" {{ $prodata->keyavailable == 'Watchman & Bio Permission' ? 'selected':'' }}>Watchman & Bio Permission</option>
                                                 <option value="Watchman & No Bio" {{ $prodata->keyavailable == 'Watchman & No Bio' ? 'selected':'' }}>Watchman & No Bio</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-12 mb-4">
                                            <label>Suitable For</label>
                                            <div class="additional-checkbox">
                                                <label for="chk-ani">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani" type="checkbox" value="Apt"> Apt
                                                </label>
                                                <label for="chk-ani1">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani1" type="checkbox" value="Boutique"> Boutique
                                                </label>
                                                <label for="chk-ani2">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani2" type="checkbox" checked value="Call Center"> Call Center
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
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani6" type="checkbox" checked value="Gym">Gym
                                                </label>
                                                <label for="chk-ani7">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani7" type="checkbox" value="Hostel">Hostel
                                                </label>
                                                <label for="chk-ani8">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani8" type="checkbox" value="Ind House">Ind House
                                                </label>
                                                <label for="chk-ani9">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani9" type="checkbox" checked value="Land">Land
                                                </label>
												<label for="chk-ani10">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani10" type="checkbox" checked value="Office">Office
                                                </label>
												<label for="chk-ani11">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani11" type="checkbox" checked value="Other">Other
                                                </label>
												<label for="chk-ani12">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani12" type="checkbox" checked value="Play School">Play School
                                                </label>
												<label for="chk-ani13">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani13" type="checkbox" checked value="Restaurant">Restaurant
                                                </label>
												<label for="chk-ani14">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani14" type="checkbox" checked value="Retail">Retail
                                                </label>
												<label for="chk-ani15">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani15" type="checkbox" checked value="School">School
                                                </label>
												<label for="chk-ani16">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani16" type="checkbox" checked value="Shop">Shop
                                                </label>
												<label for="chk-ani17">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani17" type="checkbox" checked value="Spa & saloon">Spa & saloon
                                                </label>
												<label for="chk-ani18">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani18" type="checkbox" checked value="Studio">Studio
                                                </label>
												<label for="chk-ani19">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani19" type="checkbox" checked value="Training Center">Training Center
                                                </label>
												<label for="chk-ani20">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani20" type="checkbox" checked value="Villa">Villa
                                                </label>
												<label for="chk-ani21">
                                                    <input class="checkbox_animated color-4" name="suitablefor[]" id="chk-ani21" type="checkbox" checked value="Warehouse">Warehouse
                                                </label>
											
                                            </div>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Commrecial Subtype</label>
                                            <select name="commrecialsubtype" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Godown" {{ $prodata->commrecialsubtype == 'Godown' ? 'selected':'' }}>Godown</option>
                                                 <option value="Land" {{ $prodata->commrecialsubtype == 'Land' ? 'selected':'' }}>Land</option>
                                                 <option value="Office" {{ $prodata->commrecialsubtype == 'Office' ? 'selected':'' }}>Office</option>
                                                 <option value="Retial" {{ $prodata->commrecialsubtype == 'Retial' ? 'selected':'' }}>Retial</option>
                                                 <option value="Shop" {{ $prodata->commrecialsubtype == 'Shop' ? 'selected':'' }}>Shop</option>
                                                 <option value="Warehouse" {{ $prodata->commrecialsubtype == 'Warehouse' ? 'selected':'' }}>Warehouse</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Commrecial Furinished</label>
                                            <select name="commrecialfurinished" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Plug & Play" {{ $prodata->commrecialfurinished == 'Plug & Play' ? 'selected':'' }}>Plug & Play</option>
                                                 <option value="Bare Shell" {{ $prodata->commrecialfurinished == 'Bare Shell' ? 'selected':'' }}>Bare Shell</option>
                                                 <option value="Warm Shell" {{ $prodata->commrecialfurinished == 'Warm Shell' ? 'selected':'' }}>Warm Shell</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Other Community</label>
                                            <select name="othercommunity" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes" {{ $prodata->othercommunity == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->othercommunity == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										
                                            <div class="form-group col-sm-4">
                                                <label>NO.of work stations</label>
                                                <input type="number" name="workstations" class="form-control" value="{{$prodata->workstations}}" placeholder="4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>NO.of Manager Cabins</label>
                                                <input type="number" name="managercabins" class="form-control" value="{{$prodata->managercabins}}" placeholder="4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>NO.of Dicussion Rooms</label>
                                                <input type="number" name="discussionrooms" class="form-control" value="{{$prodata->discussionrooms}}" placeholder="4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>NO.of Conference Room</label>
                                                <input type="number" name="conferencerooms" class="form-control" value="{{$prodata->conferencerooms}}" placeholder="4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Boardroom</label>
                                                <input type="number" name="boardrooms" class="form-control" value="{{$prodata->boardrooms}}" placeholder="4">
                                            </div>
                                            
                                        
										<div class="form-group col-sm-4">
                                            <label>Reception</label>
                                            <select name="reception" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes" {{ $prodata->reception == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->reception == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Pantry</label>
                                            <select name="pantry" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes" {{ $prodata->pantry == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->pantry == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Lunch Room</label>
                                            <select name="lunchroom" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes" {{ $prodata->Yes == 'lunchroom' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->No == 'lunchroom' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Server Room</label>
                                            <select name="serverroom" class="form-control">
                                                 <option>Select...</option>
                                                 <option value="Yes" {{ $prodata->serverroom == 'Yes' ? 'selected':'' }}>Yes</option>
                                                 <option value="No" {{ $prodata->serverroom == 'No' ? 'selected':'' }}>No</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Lead time (days) (If Business Park)</label>
                                            <input type="number" name="leadtime" class="form-control" value="{{$prodata->leadtime}}" placeholder="4">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Liable Upto (If Business Park)</label>
                                            <input type="number" name="liableupto" class="form-control" value="{{$prodata->liableupto}}" placeholder="4">
                                        </div>
										<div class="form-group col-sm-4">
                                            <label>Date</label>
                                            <input type="date" name="dateinend" class="form-control" value="{{$prodata->dateinend}}" required="">
                                        </div>
										
										<div class="form-group col-sm-12 mb-4">
                                            <label style="font-size:16px !important;">Select Amenities</label>
                                            <div class="additional-checkbox">
                                                <label for="chk-ani">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani" type="checkbox" value="Air Conditioning" {{ $prodata->amenities=="Air Conditioning"? 'checked':'' }}> Air Conditioning
                                                </label>
                                                <label for="chk-ani1">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani1" type="checkbox" value="Balcony" {{ $prodata->amenities=="Balcony"? 'checked':'' }}> Balcony
                                                </label>
                                                <label for="chk-ani2">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani2" type="checkbox"  value="Basketball Courts" {{ $prodata->amenities=="Basketball Courts"? 'checked':'' }}>Basketball Courts
                                                </label>
                                                <label for="chk-ani3">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani3" type="checkbox" value="Club House" {{ $prodata->amenities=="Club House"? 'checked':'' }}> Club House
                                                </label>
                                                <label for="chk-ani4">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani4" type="checkbox" value="DG Back Up 100%" {{ $prodata->amenities=="DG Back Up 100%"? 'checked':'' }}>DG Back Up 100%
                                                </label>
                                                <label for="chk-ani5">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani5" type="checkbox" value="DG Backup" {{ $prodata->amenities=="DG Backup"? 'checked':'' }}>DG Backup
                                                </label>
                                                <label for="chk-ani6">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani6" type="checkbox" value="Lift" {{ $prodata->amenities=="Lift"? 'checked':'' }}>Lift
                                                </label>
                                                <label for="chk-ani7">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani7" type="checkbox" value="Lunch Area" {{ $prodata->amenities=="Lunch Area"? 'checked':'' }}>Lunch Area
                                                </label>
                                                <label for="chk-ani8">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani8" type="checkbox" value="OnSite Manager" {{ $prodata->amenities=="OnSite Manager"? 'checked':'' }}>OnSite Manager
                                                </label>
                                                <label for="chk-ani9">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani9" type="checkbox" value="Party Hall" {{ $prodata->amenities=="Party Hall"? 'checked':'' }}>Party Hall
                                                </label>
												<label for="chk-ani10">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani10" type="checkbox" value="Security" {{ $prodata->amenities=="Security"? 'checked':'' }}>Security
                                                </label>
												<label for="chk-ani11">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani11" type="checkbox" value="Servant Room" {{ $prodata->amenities=="Servant Room"? 'checked':'' }}>Servant Room
                                                </label>
												<label for="chk-ani12">
                                                    <input class="checkbox_animated color-4" name="amenities[]" id="chk-ani12" type="checkbox" value="Swimming Pool" {{ $prodata->amenities=="Swimming"? 'checked':'' }}>Swimming Pool
                                                </label>
                                            </div>
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

										<div class="form-group col-sm-6">
                                            <label>Location</label>
                                            <input type="text" class="form-control" name="locations" value="{{$prodata->locations}}" placeholder="iframe">
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
            subcatid = '';
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