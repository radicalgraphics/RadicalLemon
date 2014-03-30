<div class="container">
	<div class="sub-container">
		<div class="admin-wrap">
			<h1><span class="bold">Hi!</span> This is your management tool.</h1> 
			<div class="top-line"></div>						<div class="login-form">			
			<form id="form"  method="post">
					<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label  for="username">Username:</label>
						</div>
						<div class="field-bg">
							<input id="username" type="text" name="username" value=""/> 
						</div>			
					</div>
					<div class="fields">
						<div class="field-text">
							<label for="password">Password:</label>
						</div>
						<div class="field-bg">
							<input id="password" type="password" name="password" value=""/> 
						</div>			
					</div>
				</div>								<div class="clear"></div>				
				<div class="form-bottom">	
					<div class="error-msg"></div>
					<div>
						<button class="login-button" type="submit"></button> 
					</div>	
				</div>
				<div class="clear"></div>
			</form>			</div>
			<div class="bottom-line"></div>			
		</div>
	</div>
</div>






<script type="text/javascript">
$(document).ready(function() {

	$("input").focus(function () {
		$(this).addClass('selected');
	});
	$("input").focusout(function () {
		$(this).removeClass('selected');
	});
 
    $("#form").validate({
            rules: {
                username: {           
                    required: true,  
                    minlength: 4,
					maxlength: 30 
                },
                password: {          
                    required: true,
                    minlength: 4,
					maxlength: 20 
                }
			
            },

			messages: {    
				username: {
                      required: "Please enter your username.",
                      minlength: "You have to put at least 4 characters.",
					  maxlength:"Your username is too long."
                      },
				password: {
                      required: "Please enter your password.",
                      minlength: "You have to put at least 4 characters.",
					  maxlength:"Your password is too long."
                      }
				
            },

			submitHandler: function(form) {
                $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/proceedLogin');?>",
                        type:"post",
						success: function(data){
							if ( data == 'true') {
							window.location = "<?php echo base_url('admin/dashboard') ?>";
						
							}	
							else {
								$(".error-msg").addClass('error').html('<img src="<?php echo base_url()."skin/admin/images/warning.jpg"?>"/>'+'<span>Please check username and password!</span>');
							}
						}
                });
            }
			
    });
});
</script> 