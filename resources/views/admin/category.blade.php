
@include("admin/header")

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Category
                                        <small>Welcome to admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
 @include('flash-message')
                                <!-- Breadcrumb start -->
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">
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
                                        <h5>Property Type</h5> 
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="pb-0">
                                        @if(auth()->user()->type == 'super_admin')
                                    <a href="{{route('admin.add.category')}}" class="pull-right"><button type="button" class="btn btn-pill btn-gradient color-4">Add New Category</button></a> 
                                       @elseif(auth()->user()->type == 'admin')
                                       <a href="{{route('user.admin.add.category')}}" class="pull-right"><button type="button" class="btn btn-pill btn-gradient color-4">Add New Category</button></a> 
                                       @endif    
                                </div>
                                </div>
                            </div>
                            
                            <div class="card-body pt-0">
                             <table id="categorylist" class="display" style="width:100%">
                                <thead>
                                    <tr style="background:#878282;color:#fff">
                                        <th>Property Name</th>
                                        <th>Property Sub Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($categorydata as $ca)
                                    <tr>
                                        <td>{{ $ca["categoryname"] }}</td>
                                        <td>{{ $ca["subcat"] }}</td>
                                        <td>
                                        @if(auth()->user()->type == 'super_admin')
                                        <a href="{{ route('admin.edit.category', $ca['id']) }}" class="text-dark"><i class='fas fa-pen'></i></a>
                                        @if($ca['id'] != 1 && $ca['id'] != 2)
										<a href="{{ route('admin.delete.category', $ca['id']) }}" class="text-dark"><i class="fa fa-trash"></i></a>
										@endif
                                        @elseif(auth()->user()->type == 'admin')
                                        <a href="{{ route('user.admin.edit.category', $ca['id']) }}" class="text-dark"><i class='fas fa-pen'></i></a>
										<a href="{{ route('user.admin.delete.category', $ca['id']) }}" class="text-dark"><i class="fa fa-trash"></i></a>
                                        @endif 
                                    </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>

                                <!--<tfoot>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>-->
                             </table>
                            </div>


                            <div class="row card-header">
                                <div class="col-lg-6">
                                    <div class="pb-0">
                                        <h5>Property Sub Type lists</h5> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body pt-0">
                             <table id="subcategorylist" class="display" style="width:100%">
                                <thead>
                                    <tr style="background:#878282;color:#fff">
                                        <th>Property Sub Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($subcategorydata as $ca)
                                    <tr>
                                        <td>{{ $ca["subcategoryname"] }}</td>
                                        <td>
										<a href="{{ route('admin.delete.sub.category', $ca['id']) }}" class="text-dark"><i class="fa fa-trash"></i></a>
                                    </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>

                                <!--<tfoot>
                                    <tr>
                                        <th>Category Name</th>
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
$('#categorylist').DataTable({
    "ordering": false,"searching": false,
});
</script>
<script>
$('#subcategorylist').DataTable({
    "ordering": false
});
</script>
</body>
</html>