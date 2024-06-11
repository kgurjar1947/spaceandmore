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
								<!-- Breadcrumb start -->
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">Post Property</li>
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
                                    <h5>Post Property</h5>
                                </div>
								
                                 <div class="card-body admin-form">
                                      
                                     @if(auth()->user()->type == 'super_admin')
                                     <form class="row gx-3" method="POST" action="{{route('admin.cat.sub.property')}}">
                                     @elseif(auth()->user()->type == 'admin')
                                      <form class="row gx-3" method="POST" action="{{route('user.admin.cat.sub.property')}}">
                                      @endif
                            
                                   
                                        @csrf <!-- CSRF token for security -->
                                        <div class="form-group col-sm-6">
                                        <label><span style="color:red;font-size: 20px;">*</span>Property Type</label>

                                                <select class="form-select" id="categoryid" name="categoryid" required>
                                                    <option value="" selected disable>Select Category</option>
                                                    @foreach($categorydata as $ca)
                                                    <option value="{{$ca['id']}}">{{$ca['categoryname']}}</option>
                                                    @endforeach
                                                </select> 
                                        </div>

                                        <div class="form-group col-sm-6">
                                                <label><span style="color:red;font-size: 20px;">*</span>Property Sub Type</label>

                                                <select class="form-select" id="subcategoryid" name="subcategoryid" required>
                                                    <option value="" selected disable>Select Sub Category</option>
                                                </select>
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
   

<script>
$(document).ready(function(){
    $("#categoryid").change(function(){
        var cat_id = $("#categoryid").val();
        $.ajax({
            url: '{{url("/api/getsubcategory")}}',
            type: 'POST',
            data: {category_id:cat_id},
            success: function(res) {
                subcategorylist = '<option value="" selected disable>Select Sub Category</option>';
                $.each(res.catdata, function(key,val) {
                    console.log(val.subcategoryname);

                    subcategorylist = subcategorylist.concat('<option value="'+val.id+'">'+val.subcategoryname+'</option>');
                });
                $("#subcategoryid").html(subcategorylist);
                
            }
        });
    });


    

$('#addproperty').submit(function(e){
    e.preventDefault();

    var formData  = new FormData(this);
    formData.append("category_id", $("#categoryid").val());
    formData.append("subcategory_id", $("#subcategoryid").val());

$.ajax({
type: 'POST',
url: '{{url("/api/addnewproperty")}}',
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
alert("Added!");
//$(location).attr('href', '{{url("/setsession")}}/'+data.admin_id);
location.reload();
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