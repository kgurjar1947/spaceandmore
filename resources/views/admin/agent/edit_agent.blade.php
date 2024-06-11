@include("admin/header")

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Edit Agent
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
                                    <li class="breadcrumb-item active">Edit Agnet </li>
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
                                    <h5>Edit Agent</h5>
                                </div>
                                 <div class="card-body">
                                    <form class="row gx-3" id="edit_agent" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Agent Name <span class="font-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$agent->name}}" placeholder="Enter Your Agent Name">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Agent Email <span class="font-danger">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" value="{{$agent->email}}" placeholder="Enter Your Agent Email" readonly>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Agent Phone <span class="font-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone" id="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10"  value="{{$agent->phone}}" placeholder="Enter Your Agent Phone">
                                        </div>
                                        <input type="hidden" class="form-control" name="id" placeholder="Enter Your Category Name" value="{{auth()->user()->id}}">
                                        <div class="form-btn">
                                            <button id="submit"  name="submit" type="submit" class="btn btn-pill btn-gradient color-4">Submit</button>
                                            <button type="reset"  class="btn btn-pill btn-dashed color-4">Cancel</button>
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

</script>    

</body>
</html>