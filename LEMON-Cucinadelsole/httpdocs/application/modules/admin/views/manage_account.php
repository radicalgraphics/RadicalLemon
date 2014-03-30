<div class="ls-navigation">
	<?php echo Modules::run('navigation/admin_navigation/getAdminNavigation'); ?>
</div>
<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Edit account!</span><span>Fill form data and save to create new account</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
			<form id="form"  method="post">
				<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label  for="firstname">Your name:</label>
						</div>
						<div class="field-bg">
							<input id="firstname" type="text" name="firstname" value="<?php echo $account->first_name; ?>"/> 
						</div>			
					</div>
					<div class="fields">
						<div class="field-text">
							<label  for="lastname">Your lastname:</label>
						</div>
						<div class="field-bg">
							<input id="lastname" type="text" name="lastname" value="<?php echo $account->last_name; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Please enter your name and your lastname. These fields can not contain less than 2 characters and more then 30 characters!</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>	
				<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label  for="username">Username:</label>
						</div>
						<div class="field-bg">
							<input id="username" type="text" name="username" value="<?php echo $account->username; ?>"/> 
						</div>			
					</div>
					<div class="fields">
						<div class="field-text">
							<label for="password">Password:</label>
						</div>
						<div class="field-bg">
							<input id="password" type="password" name="password" value="<?php echo $account->password; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Please create your username and your new password now.</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>	
				<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label for="company">Company name:</label>
						</div>
						<div class="field-bg">
							<input id="company" type="text" name="company" value="<?php echo $account->company; ?>"/> 
						</div>			
					</div>
					<div class="fields">
						<div class="field-text">
							<label  for="email">E-mail:</label>
						</div>
						<div class="field-bg">
							<input id="email" type="text" name="email" value="<?php echo $account->email; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Please add your company name and your main e-mail address.</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>	
				<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label for="address">Address:</label>
						</div>
						<div class="field-bg">
							<input id="address" type="text" name="address" value="<?php echo $account->address; ?>"/> 
						</div>			
					</div>
					<div class="fields">
						<div class="field-text">
							<label for="city">City:</label>
						</div>
						<div class="field-bg">
							<input id="city" type="text" name="city" value="<?php echo $account->city; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Please add your address details.</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>
				<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label for="country">Country:</label>
						</div>
						<div class="field-bg">
							<input id="country" type="text" name="country" value="<?php echo $account->country; ?>"/> 
						</div>			
					</div>
					<div class="fields">
						<div class="field-text">
							<label for="telephone">Telephone:</label>
						</div>
						<div class="field-bg">
							<input id="telephone" type="text" name="telephone" value="<?php echo $account->telephone; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Please add your country and your main telephone number. Please note that all this information is displayed on your website.</span> 
					</div>
				</div>	
				<div class="bottom-line"></div>
				<div class="form-bottom">	
					<div class="error-msg"></div>
					<div class="buttons-wrapper">
						<div class="cancel">
							<button class="cancel-button" type="button" onclick="window.location.assign('<?php echo base_url('admin/account/') ; ?>')"></button>
						</div>
						<div>
							<button class="save-button" type="submit"></button>
						</div>	
					</div>
					<div class="clear"></div>
				</div>
			</form>
		</div>
		<div class="bottom-line"></div>
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
                firstname: {          
                    required: true,   
                    minlength: 2,
					maxlength: 30 
                },
                lastname: {             
                    required: true,   
                    minlength: 2,
					maxlength: 30 
                },
                username: {           
                    required: true,  
                    minlength: 4,
					maxlength: 30 
                },
                password: {          
                    required: true,
                     minlength: 4,
					maxlength: 20 
                },
				 company: {          
                    required: true,
                    minlength: 1,
					maxlength: 40 
                },
				 email: {          
                    required: true,
                    email: true 
                },
				 address: {          
                    required: true,
                    minlength: 2,
					maxlength: 40 
                },
				 city: {          
                    required: true,
                    minlength: 2,
					maxlength: 30 
                },
				 country: {          
                    required: true,
                    minlength: 2,
					maxlength: 30 
                },
				 telephone: {          
                    required: true,
                    minlength: 2,
					maxlength: 30 
                }
            },

			messages: {             
                firstname: {
                      required:"Please enter your name.",
                      minlength:"You have to put at least 2 characters.",
					  maxlength:"Your name is too long."
                      },
                lastname: {
                      required: "Please enter your lastname.",
                      minlength: "You have to put at least 2 characters",
					  maxlength: "Your last name is too long"
                      },
				username: {
                      required: "Please enter your username.",
                      minlength: "You have to put at least 4 characters.",
					  maxlength:"Your username is too long."
                      },
				password: {
                      required: "Please enter your password.",
                      minlength: "You have to put at least 4 characters.",
					  maxlength:"Your password is too long."
                      },
				company: {
                      required: "Please enter your company name.",
                      minlength: "You have to put at least 1 characters.",
					  maxlength:"Your company name is too long."
                      },
				email: {
                      required: "Please enter your e-mail.",
                      email: "Please enter valid e-mail address."
                      },
				address: {
                      required: "Please enter your address.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your address is too long."
                      },
				city: {
                      required: "Please enter your city.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your city name is too long."
                      },
				country: {
                      required: "Please enter your country.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your country name is too long."
                      },
				telephone: {
                      required: "Please enter your telephone.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your telephone number is too long."
                      }
            },

			submitHandler: function(form) {
                $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/updateAccount');?>",
                        type:"post",
						success: function(data){
							if ( data == 'true') {
								$("#overlay").fadeIn().show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Your account has been updated!</div><div class="close"><a href="<?php echo base_url('admin/account');?>"><img src="<?php echo base_url()."skin/admin/images/close.png"?>" /></a></div><div class="bottom-line"></div></div></div>');
							}	
							else {
								$(".error-msg").addClass('error').html('<img src="<?php echo base_url()."skin/admin/images/warning.jpg"?>"/>'+'<span>Data not saved!</span>');
							}
						}
                });
            }
			
    });
});
</script> 