@include("admin/header")

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Add Sub Category
                                        <small>Welcome to admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <!-- Breadcrumb start -->
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Sub Category</li>
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
                                    <h5>Add Sub Category details</h5>
                                </div>
                                 <div class="card-body">
                                    <form class="row gx-3" id="addsubcategory">
                                        
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Category <span class="font-danger">*</span></label>
                                            <select class="form-control" name="categoryid" required>
                                                <option value="" selected disable>Select Category</option>
                                                @foreach($categorydata as $ca)
                                                <option value="{{$ca->id}}">{{$ca->categoryname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Sub Category<span class="font-danger">*</span></label>
                                            <input type="text" class="form-control" name="subcategory" placeholder="enter your Sub Category Name" required>
                                        </div>

                                    <div class="form-btn">
                                        <button type="submit" name="submit" class="btn btn-pill btn-gradient color-4">Submit</button>
                                        <button type="reset" class="btn btn-pill btn-dashed color-4">Cancel</button>
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
$('#addsubcategory').submit(function(){
$.ajax({
type: 'POST',
url: '{{url("/api/addnewsubcategory")}}',
//contentType: "application/json",
//dataType: "json",
data: $(this).serialize(),
})
.done(function(data){
     
$("#addsubcategory")[0].reset();
 
if(data.status==0){
alert(data.message);
}
else{
alert(data.message);    
$(location).attr('href', '{{url("/subcategory")}}');
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