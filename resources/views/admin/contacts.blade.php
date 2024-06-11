@include("admin/header")

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">


            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Contact Us - Enquiry
                                        <small>Welcome to admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <!-- Breadcrumb start -->
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">Contact Us - Enquiry</li>
                                </ol>
                                <!-- Breadcrumb end -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    @include('flash-message')
                    <div class="row">
                        <div class="col-lg-12">
                             
                            <div class="card">
                               <div class="row mb-4">
                                    <div class="col-lg-6 card-header pb-0">
                                    <h5>Contact Us - Enquiry lists</h5>
                                </div>
                                <div class="tb_search col-lg-6" style="display: flex;justify-content: end;margin-top:21px;">
                                     <form style="margin-right:10px;"method="post" action="{{route('admin.contacts.export.csv')}}">
                                         @csrf
                                    <button id="export" class="btn btn-success btn-sm" type="submit">Export</button>
                                    </form>
                                </div>
                               </div>
                                <div class="card-body pt-0"style="float: right;width: 100%;overflow: scroll;overflow-y: hidden;">
                                    <table id="enquireslist" class="display" style="width:130%">
                                    <thead>
                                            <tr style="background:#878282;">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Purpose</th>
												<th>Message</th>
												<th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contactsdata as $row)
                                            <tr>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['number'];?></td>
												<td><?php echo $row['purpose'];?></td>
												<td><?php echo $row['message'];?></td>
												<td><?php echo date("d-m-Y", strtotime($row['createdate']));?></td>
												<td>
												<div class="d-flex">
														<a href="{{ route('admin.delete.contacts', $row['id']) }}" class="sharps"><i class="fa fa-trash"></i></a>
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

</body>

</html>