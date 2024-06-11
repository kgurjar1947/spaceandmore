@include("admin/header")

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Add Category
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
                                    <li class="breadcrumb-item active">Add Category</li>
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
                                    <h5>Add Category details</h5>
                                </div>
                                 <div class="card-body">

                                
                                    <form class="row gx-3" id="addcategory">
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Category <span class="font-danger">*</span></label>
                                            <input type="text" class="form-control" name="category" placeholder="Enter Your Category Name" required>
                                        </div>
                                        <input type="hidden" class="form-control" name="id" placeholder="Enter Your Category Name" value="{{auth()->user()->id}}">
                                        <h5>Sub Category Details</h5>
                                        
                                        <div id="newinput">
                                            <div id="row" class="col-md-6 col-sm-6">
                                                <label>Sub Category Name<span class="font-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="subcategory[]" placeholder="Enter Your Sub Category Name" required>
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-pill btn-gradient color-4"
                                                                id="DeleteRow"
                                                                type="button">
                                                            Delete
                                                        </button>
                                                    </div>                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <button id="rowAdder" type="button" class="btn btn-dark">
                                                <span class="bi bi-plus-square-dotted">
                                                </span> Add More Sub Category
                                            </button>
                                        </div>    




                                        <div class="form-btn">
                                            <button type="submit" name="submit" class="btn btn-pill btn-gradient color-4">Submit</button>
                                            <button type="reset"  class="btn btn-pill btn-dashed color-4">Cancel</button>
                                        </div>
                                 </div>
                             </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->

            </div>

@include("admin/footer") 


<script>
$(document).ready(function(){
$('#addcategory').submit(function(){
$.ajax({
type: 'POST',
url: '{{url("/api/addnewcategory")}}',
//contentType: "application/json",
//dataType: "json",
data: $(this).serialize(),
})
.done(function(res){  
$("#addcategory")[0].reset();


if(res.status==0){
alert(res.message);
}
else{
alert(res.message);    
@if(auth()->user()->type == 'super_admin')
$(location).attr('href', '{{route('admin.category')}}');
@elseif(auth()->user()->type == 'admin')
$(location).attr('href', '{{route('user.admin.category')}}');
@endif
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
    $(this).parents("#row").remove();
});


});
</script>    

</body>
</html>