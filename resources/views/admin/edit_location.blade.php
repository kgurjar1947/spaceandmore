@include("admin/header")

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Edit Location
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
                                    <li class="breadcrumb-item active">Location</li>
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
                            <div class="card"> 
                                
                                <div class="card-header pb-0">
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <h5>Edit Location details</h5>
                                    </div>
                                    </div>                                    
                                </div>
                                
                                 <div class="card-body admin-form">
                                    <form class="row gx-3" id="editlocation">
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Location Name<span class="font-danger">*</span></label>
                                                <input type="text" name="location" class="form-control" value="<?php echo $location->location_name; ?>" required="">
                                            <input type="hidden" name="catid" class="form-control" value="<?php echo $location->id; ?>">
                                        </div>
                                    <div class="form-btn">
                                        <button type="submit" name="submit" class="btn btn-pill btn-gradient color-4">Save</button>
                                        <button type="reset" class="btn btn-pill btn-dashed color-4">Cancel</button>
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


<script>
$(document).ready(function(){

$('#editlocation').submit(function(){
$.ajax({
type: 'POST',
url: '{{url("/api/editlocationnow")}}',
//contentType: "application/json",
//dataType: "json",
data: $(this).serialize(),
})
.done(function(res){  
$("#editlocation")[0].reset();
//console.log(res);

if(res.status==0){
alert(res.message);
}
else{
alert(res.message); 
$(location).attr('href', '{{route('admin.location')}}');
}


})
.fail(function() { 
//alert( "Posting failed." );
});
return false;
});
    

$("#rowAdder").click(function () {
newRowAdd ='<div id="row" class="col-md-6 col-sm-6"> <label>Sub Category Name<span class="font-danger">*</span></label> <div class="input-group mb-3"> <input type="text" class="form-control" name="subcategory[]" placeholder="Enter Your Sub Category Name" required> <div class="input-group-prepend"> <button class="btn btn-pill btn-gradient color-4"id="DeleteRow"type="button"> Delete </button> </div> </div> </div>';
$('#newinput').append(newRowAdd);
});

$("body").on("click", "#DeleteRow", function () {
var subcatid = $(this).val();
if(subcatid != ""){
   $.ajax({
    url: '{{url("/api/delete_subcategory")}}',
    type: 'POST',
    data: {subcatid:subcatid},
    success: function(res) {
        //console.log(res);
        alert(res.message);
       
    }
}); 
}

$(this).parents("#row").remove();
});

});
</script>    
</body>
</html>