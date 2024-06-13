<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('website/flash-message')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enquiry </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="alert alert-success" role="alert" id="en_successMsg" style="display: none" >
                    Thank You For Enquiry! A representative will get back to you within 24 hours.
                        </div>
                        <form method="post" id="SubmitForm_eq" action="">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="name" class="form-control" id="en_name" name="en_name" placeholder="Name">
                                    <span class="text-danger" id="en_nameErrorMsg"></span>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="en_email" id="en_email" placeholder="Email">
                                    <span class="text-danger" id="en_emailErrorMsg"></span>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="en_phone" name="en_phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" placeholder="Phone">
                                    <span class="text-danger" id="en_mobileErrorMsg"></span> 
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" id="type_of_loan" name="type_of_loan" placeholder="Purpose">
                                    <span class="text-danger" id="en_type_of_loanErrorMsg"></span> 
                                </div>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" id="en_message" name="en_message"
                                        placeholder="Message" rows="3"></textarea>
                                        
                                </div>
                                <span class="text-danger" id="en_messageErrorMsg"></span>
                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit"  id="submitting" class="btn btn-danger" value="Submit">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

$('#SubmitForm_eq').on('submit',function(e){
     $('#submitting').val("Loading....");  
	$('#submitting').attr('disabled','disabled');
	
    e.preventDefault();
    let name = $('#en_name').val();
    let email = $('#en_email').val();
    let phone = $('#en_phone').val();
    let type_of_loan = $('#type_of_loan').val();
    let message = $('#en_message').val();
    $.ajax({
      url: "{{route('new.propertie.form')}}",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        phone:phone,
        type_of_loan:type_of_loan,
        message:message,
      },
      success:function(response){
        $('#en_successMsg').show();
        $('#submitting').attr('disabled','disabled');
        setInterval(function(){
        window.location.reload(1);
        }, 3000);
      },
      error: function(response) {
           
        $('#en_nameErrorMsg').text(response.responseJSON.errors.name);
        $('#en_emailErrorMsg').text(response.responseJSON.errors.email);
        $('#en_mobileErrorMsg').text(response.responseJSON.errors.phone);
        $('#en_type_of_loanErrorMsg').text(response.responseJSON.errors.type_of_loan);
        $('#en_messageErrorMsg').text(response.responseJSON.errors.message);
        $('#submitting').removeAttr('disabled');
        $('#submitting').val('Submit');
      },
      });
    });
  </script>
  
  