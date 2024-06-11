@include("admin/header")

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">


            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Restore
                                        <small>Welcome to admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
                             @include('flash-message')
                                <!-- Breadcrumb start -->
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">Restore List</li>
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
                                    <h5>Property Type Restore List</h5>
                                </div>

                                <div class="card-body pt-0">
                                    <table id="enquireslist" class="display" style="width:100%">
                                    <thead>
                                            <tr style="background:#878282;">
                                                <th>Name</th>
                                                <th>Restore</th>
                                                <th>Permanent Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categorydata as $row)
                                            <tr>
                                                <td><?php echo $row['categoryname'];?></td>
                                                <td>
												<div class="d-flex">
														<a href="{{ route('admin.delete.restore', $row['id']) }}" class="sharps"><i class="fa fa-refresh"></i></a>
													</div>
												</td>
												<td>
												<div class="d-flex">
														<a href="{{ route('admin.delete.permanently', $row['id']) }}" class="sharps"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            @endforeach
                                        
                                        <tbody>
                                    </table>
                                </div>




                            </div>
                        </div>
                        
                        
                        
                        <div class="col-lg-12">
                            
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h5>Property Sub Restore List</h5>
                                </div>

                                <div class="card-body pt-0">
                                    <table id="subenquireslist" class="display" style="width:100%">
                                    <thead>
                                            <tr style="background:#878282;">
                                                <th>Name</th>
                                                <th>Restore</th>
                                                <th>Permanent Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subcategorydata as $row)
                                            <tr>
                                                <td><?php echo $row['subcategoryname'];?></td>
                                                <td>
												<div class="d-flex">
														<a href="{{ route('admin.delete.sub.restore', $row['id']) }}" class="sharps"><i class="fa fa-refresh"></i></a>
													</div>
												<!--</td>-->
												<td>
												<div class="d-flex">
														<a href="{{ route('admin.delete.sub.permanently', $row['id']) }}" class="sharps"><i class="fa fa-trash"></i></a>
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
    "ordering": false
});
</script>
<script>
$('#subenquireslist').DataTable({
    "ordering": false
});
</script>
</body>

</html>