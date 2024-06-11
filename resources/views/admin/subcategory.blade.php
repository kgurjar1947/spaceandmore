
@include("admin/header")

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Sub Category
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
                                    <li class="breadcrumb-item active">Category</li>
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
                             
                            <div class="row card-header">
                                <div class="col-lg-6">
                                    <div class="pb-0">
                                        <h5>Sub Category lists</h5> 
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="pb-0">
                                    <a href="/add_sub_category" class="pull-right"><button type="button" class="btn btn-pill btn-gradient color-4">Add New Sub Category</button></a> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body pt-0">
                             <table id="subcategorylist" class="display" style="width:100%">
                                <thead>
                                    <tr style="background:#878282;color:#fff">
                                       <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($subcategorydata as $ca)
                                    <tr>
                                        <td>{{ $ca->categoryname }}</td>
                                        <td>{{ $ca->subcategoryname }}</td>
                                        <td>{{ $ca->createdate }}</td>
                                        <td>
                                        <a href="/edit_sub_ategory/{{ $ca->id}}" class="text-dark"><i class='fas fa-pen'></i></a>
										<a href="/delete_sub_category/{{ $ca->id}}" class="text-dark"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>

                                <!--<tfoot>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>-->
                             </table>
                            </div>




                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Container-fluid end -->

            </div>

@include("admin/footer")            

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$('#subcategorylist').DataTable({
    "ordering": false
});
</script>

</body>
</html>