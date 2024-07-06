@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" id="success-alert">
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" id="success-alert">
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('warning'))¸¸
<div class="alert alert-warning alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger">
    Please check the form below for errors
</div>
@endif
@section('script')
<script type="text/javascript">
$(document).ready(function () {
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
</script>
@stop