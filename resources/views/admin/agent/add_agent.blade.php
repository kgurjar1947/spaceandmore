@include("admin/header")

            <div class="page-body">

                <!-- Container-fluid start -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-header-left">
                                    <h3>Add Agent
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
                                    <li class="breadcrumb-item active">Add Agnet </li>
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
                                    <h5>Add Agent</h5>
                                </div>
                                 <div class="card-body">
                                    <form class="row gx-3" id="add_agent" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Agent Name <span class="font-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Agent Name">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Agent Email <span class="font-danger">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Agent Email">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Agent Phone <span class="font-danger">*</span></label>
                                            <input type="text"  class="form-control" name="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" id="phone" placeholder="Enter Your Agent Phone">
                                        </div>
                                        
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label>Agent Password <span class="font-danger">*</span></label>
                                            <div class="input-group">
                                            <input type="password" id="pwd-input" class="form-control" placeholder="Password" autocomplete="off"  name="password" required>
                                            <div class="input-group-apend">
                                                <div class="input-group-text">
                                                    <i id="pwd-icon" class="far fa-eye-slash"></i>
                                                </div>
                                            </div>
                                        </div>
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