<!-- footer start -->
<footer class="footer">
<div class="container-fluid">
    <div class="row text-center">
    <div class="col-md-12 footer-copyright">
        <p class="mb-0">Copyright 2023 © spaces&more All rights reserved.</p>
    </div>
    </div>
</div>
</footer>
<!-- footer end -->
</div>
</div>


<!-- tap to top start -->
<div class="tap-top">
<div>
    <i class="fas fa-arrow-up"></i>
</div>
</div>
<!-- tap to top end -->


<!-- customizer end -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- latest jquery-->
<script src="{{url('/')}}/assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap js-->
<script src="{{url('/')}}/assets/js/bootstrap.bundle.min.js"></script>

<!-- feather icon js-->
<script src="{{url('/')}}/assets/js/feather-icon/feather.min.js"></script>
<script src="{{url('/')}}/assets/js/feather-icon/feather-icon.js"></script>

<!-- sidebar js -->
<script src="{{url('/')}}/assets/js/sidebar.js"></script>

<!-- apex chart js-->
<script src="{{url('/')}}/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="{{url('/')}}/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="{{url('/')}}/assets/js/admin-dashboard.js"></script>

<!--admin js -->
<script src="{{url('/')}}/assets/js/admin-script.js"></script>

<!-- Customizer js-->
<script src="{{url('/')}}/assets/js/customizer.js"></script>
<script src="{{url('/')}}/assets/js/login.js"></script>
<!-- Color-picker js-->
<script src="{{url('/')}}/assets/js/color/custom-colorpicker.js"></script>

<script src="{{asset('assets/js/notify/js/notifIt.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{asset('assets/js/notify.min.js')}}"></script>
		<script>
			function notify(id=null,message='Something went wrong',position='top right',type='error',willReload=false,url=null,timeout=3000){
            if(id!=null && id != 'input[name=error]' && id!='input[name=error]') $(id).notify(
                             message,
                             {
                                 position:position,
                                 className:type
                             }
                         );
        else  $.notify(
                message,
                {
                    position:'top right',
                    className:type
                }
            );
            if (willReload) setTimeout(function () {
                  if(url==null)window.location.reload();
                  else window.location.href = url;
                }, timeout)
        }
		</script>
		   <script>
            $("#add_residential").submit(function() {
                event.preventDefault();
                 $("#submit").prop('disabled', true);
                 $("#submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading....');
                 @if(auth()->user()->type == 'super_admin')
                axios.post("{{route('admin.add.residential')}}", new FormData($("#add_residential")[0])).then(response => {
                @elseif(auth()->user()->type == 'admin')
                axios.post("{{route('user.add.residential')}}", new FormData($("#add_residential")[0])).then(response => {
                @endif
                    var data = response.data;
                    @if(auth()->user()->type == 'super_admin')
                    if (data.success) notify(null, 'Residential Property Submitted Successfully', 'top right', 'success', true, "{{url('/super-admin/viewproperty/1')}}", 1000);
                    @elseif(auth()->user()->type == 'admin')
                    if (data.success) notify(null, 'Residential Property Submitted Successfully', 'top right', 'success', true, "{{url('/user-admin/viewproperty/1')}}", 1000);
                    @endif
                    else {
                        $("#submit").prop('disabled', false);
                        $("#submit").html('Submit');
                        for (var a in data['error']['message']) { notify(null, data['error']['message'][a][0], 'botton left');
                            if (a == 'success' | a == 'error') notify(null, data['error']['message'][a][0],
                                'botton left');
                        }
                    }
                }).catch(error => {
                    $("#submit").prop('disabled', false);
                    $("#submit").html('Submit');
                    notify(null, 'Something went wrong', 'top right');
                    console.log(error);
                });
            });
        </script>


<script>
    $("#add_commercial").submit(function() {
        event.preventDefault();
         $("#submit").prop('disabled', true);
         $("#submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading....');
         @if(auth()->user()->type == 'super_admin')
        axios.post("{{route('admin.add.commercial')}}", new FormData($("#add_commercial")[0])).then(response => {
             @elseif(auth()->user()->type == 'admin')
             axios.post("{{route('user.add.commercial')}}", new FormData($("#add_commercial")[0])).then(response => {
             @endif
            var data = response.data;
            @if(auth()->user()->type == 'super_admin')
            if (data.success) notify(null, 'Commercial Property Submitted Successfully', 'top right', 'success', true, "{{url('/super-admin/viewproperty/2')}}", 1000);
            @elseif(auth()->user()->type == 'admin')
            if (data.success) notify(null, 'Commercial Property Submitted Successfully', 'top right', 'success', true, "{{url('/user-admin/viewproperty/2')}}", 1000);
            @endif
            else {
                $("#submit").prop('disabled', false);
                $("#submit").html('Submit');
                for (var a in data['error']['message']) { notify(null, data['error']['message'][a][0], 'botton left');
                    if (a == 'success' | a == 'error') notify(null, data['error']['message'][a][0],
                        'botton left');
                }
            }
        }).catch(error => {
            $("#submit").prop('disabled', false);
            $("#submit").html('Submit');
            notify(null, 'Something went wrong', 'top right');
            console.log(error);
        });
    });
</script>

<script>
    $("#add_basic").submit(function() {
        event.preventDefault();
         $("#submit").prop('disabled', true);
         $("#submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading....');
          @if(auth()->user()->type == 'super_admin')
        axios.post("{{route('admin.add.basic')}}", new FormData($("#add_basic")[0])).then(response => {
             @elseif(auth()->user()->type == 'admin')
             axios.post("{{route('user.add.basic')}}", new FormData($("#add_basic")[0])).then(response => {
             @endif
            var data = response.data;
            @if(auth()->user()->type == 'super_admin')
            if (data.success) notify(null, 'Basic Form Submitted Successfully', 'top right', 'success', true);
            @elseif(auth()->user()->type == 'admin')
            if (data.success) notify(null, 'Basic Form Submitted Successfully', 'top right', 'success', true);
            @endif
            else {
                $("#submit").prop('disabled', false);
                $("#submit").html('Submit');
                for (var a in data['error']['message']) { notify(null, data['error']['message'][a][0], 'botton left');
                    if (a == 'success' | a == 'error') notify(null, data['error']['message'][a][0],
                        'botton left');
                }
            }
        }).catch(error => {
            $("#submit").prop('disabled', false);
            $("#submit").html('Submit');
            notify(null, 'Something went wrong', 'top right');
            console.log(error);
        });
    });
</script>


<script>
    $("#add_agent").submit(function() {
        event.preventDefault();
         $("#submit").prop('disabled', true);
         $("#submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading....');
            axios.post("{{ route('admin.submit.agent') }}", new FormData($("#add_agent")[0])).then(response => {
            var data = response.data;
              if (data.success) notify(null, 'Agent Submitted Successfully', 'top right', 'success', true,"{{route('admin.agent.list')}}",1000);
            else {
                $("#submit").prop('disabled', false);
                $("#submit").html('Submit');
				for (var a in data['error']['message']) { notify(null, data['error']['message'][a][0], 'botton left');
                    if (a == 'success' | a == 'error') notify(null, data['error']['message'][a][0],
                        'botton left');
                }
            }
        }).catch(error => {
            $("#submit").prop('disabled', false);
            $("#submit").html('Submit');
            notify(null, 'Something went wrong', 'top right');
            console.log(error);
        });
    });
    
         @if(Request::segment(2) == 'agent-edit')

                $("#edit_agent").submit(function() {
                    event.preventDefault();
                    $("#submit").prop('disabled', true);
                    $("#submit").html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading....'
                    );
                    axios.post("{{ route('admin.submit.edit.agent',$agent->id) }}", new FormData($("#edit_agent")[0])).then(response => {
                        var data = response.data;
                        if (data.success) notify(null, 'updated Agent Submitted Successfully',
                            'top right', 'success', true, "{{ route('admin.agent.list') }}", 1000);
                        else {
                            $("#submit").prop('disabled', false);
                            $("#submit").html('Submit');
                            for (var a in data['error']['message']) {
                                notify(null, data['error']['message'][a][0], 'botton left');
                                if (a == 'success' | a == 'error') notify(null, data['error']['message'][a][0],
                                    'botton left');
                            }
                        }
                    }).catch(error => {
                        $("#submit").prop('disabled', false);
                        $("#submit").html('Submit');
                        notify(null, 'Something went wrong', 'top right');
                        console.log(error);
                    });
                });
 @endif
</script>
        @yield('script')