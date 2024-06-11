<div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
Thank You For Property Enquiry! A representative will get back to you within 24 hours.
                        </div>
                        <form method="post" id="SubmitForm1" class="default-form">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" placeholder="Name">
                                            <span class="text-danger" id="nameErrorMsg"></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="Email">
                                            <span class="text-danger" id="emailErrorMsg"></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="10" placeholder="Phone">
                                            <span class="text-danger" id="mobileErrorMsg"></span> 
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="pro_name" id="pro_name"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" value="{{  $row['propertyname'] }}" placeholder="Phone">
                                        </div>
                                         <div class="form-group">
                                            <input type="hidden" name="pro_id" id="pro_id" value="{{  $row['propertyid'] }}" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" id="message" placeholder="Message"></textarea>
                                        </div>
                                        <span class="text-danger" id="messageErrorMsg"></span>
                                        <div class="g-recaptcha" data-sitekey="6LcYwIMpAAAAAFz57MAZJW_B0FRbe8nzY5BbJMup"></div>
                                        <br/>
                                        <div class="form-group message-btn">
                                            <input type="submit"  id="submitting_1" class="theme-btn btn-one" value="Submit">
                                            <!--<button type="submit" class="theme-btn btn-one">Send Message</button>-->
                                        </div>
                                    </form>


                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

$('#SubmitForm1').on('submit',function(e){
    e.preventDefault();
    $('#submitting_1').val("Loading....");  
	$('#submitting_1').attr('disabled','disabled');
	
    let name = $('#name').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let message = $('#message').val();
    let pro_name = $('#pro_name').val();
    let pro_id = $('#pro_id').val();
    $.ajax({
      url: "{{route('propertie.form')}}",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        phone:phone,
        pro_name:pro_name,
         pro_id:pro_id,
        message:message,
      },
      success:function(response){
        $('#successMsg').show();
        $('#submitting_1').attr('disabled','disabled');
        setInterval(function(){
        window.location.reload(1);
        }, 3000);
      },
      error: function(response) {
        $('#nameErrorMsg').text(response.responseJSON.errors.name);
        $('#emailErrorMsg').text(response.responseJSON.errors.email);
        $('#mobileErrorMsg').text(response.responseJSON.errors.phone);
        $('#messageErrorMsg').text(response.responseJSON.errors.message);
        $('#submitting_1').removeAttr('disabled');
        $('#submitting_1').val('Submit');
      },
      });
    });
  </script>