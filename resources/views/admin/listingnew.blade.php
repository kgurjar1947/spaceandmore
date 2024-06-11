@include("admin/header")

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">


            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Categories
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
                                    <li class="breadcrumb-item active">Categories</li>
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
                                    <h5>Categories lists</h5>
                                </div>

                                <div class="card-body pt-0">
                                    <table id="enquireslist" class="display" style="width:100%">
                                    <thead>
                                            <tr style="background:#878282;">
                                                <th>Category Name</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categorydata as $row)
                                            <tr>
                                                <td>  @if(auth()->user()->type == 'super_admin')
                                                <a href="{{route('admin.view.property',$row['id'])}}"><?php echo $row['categoryname'];?></a>
                                                	@elseif(auth()->user()->type == 'admin')
                                                	<a href="{{route('user.admin.view.property',$row['id'])}}"><?php echo $row['categoryname'];?></a>
                                                	@endif
                                                </td>
												<td>
												<div class="d-flex">
												      @if(auth()->user()->type == 'super_admin')
														<a href="{{route('admin.view.property',$row['id'])}}" class="sharps"><i class="fa fa-eye"></i></a>
														@elseif(auth()->user()->type == 'admin')
														<a href="{{route('user.admin.view.property',$row['id'])}}" class="sharps"><i class="fa fa-eye"></i></a>
														@endif
													</div>
												</td>
                                            </tr>
                                            @endforeach
                                        
                                        <tbody>
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
$('#enquireslist').DataTable({
    "ordering": false,
    "searching": false,
});
</script>

</body>

</html>