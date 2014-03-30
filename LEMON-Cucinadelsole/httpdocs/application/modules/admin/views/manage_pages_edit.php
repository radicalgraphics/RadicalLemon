<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Edit page!</span><span>Change page data and save!</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
			<form id="form"  method="post">

				<input id="id_page" type="hidden" name="id_page" value="<?php echo $page_id; ?>"/> 
				
				<div id="tabs">
				  <ul>
					<li><a href="#tab-nl">Ductsh settings</a></li>
					<li><a href="#tab-en">English settings</a></li>
				  </ul>

				 <div id="tab-nl">
				<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label for="first_link_name">Dutch link:</label>
						</div>
						<div class="field-bg">
							<input id="first_link_name" type="text" name="first_link_name" value="<?php echo $page_data[0]->link_name; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Link name will be visible in main navigation. Add link name for English and for Dutch. Link name can be the same like Page URL.</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>	
				<div class="common-fields page-title-field">
					<div class="fields">
						<div class="field-text">
							<label for="first_page_title">Dutch title:</label>
						</div>
						<div class="field-bg">
							<input id="first_page_title" type="text" name="first_page_title" value="<?php echo $page_data[0]->page_title; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Link name will be visible in main navigation. Add link name for English and for Dutch. Link name can be the same like Page URL.</span> 
					</div>
					<div class="bottom-line"></div>
				</div>	
				<div class="common-fields text-area-fields">	
					<div class="fields">
						<div class="field-text">
							<label for="first_meta_key">Meta keywords:</label>
						</div>
						<div class="field-bg">
							<textarea id="first_meta_key" name="first_meta_key" rows="4" cols="30"><?php echo $page_data[0]->meta_keywords; ?></textarea>
						</div>			
					</div>	
					<div class="fields">
						<div class="field-text">
							<label for="first_meta_desc">Meta description:</label>
						</div>
						<div class="field-bg">
							<textarea id="first_meta_desc" name="first_meta_desc" rows="4" cols="30"><?php echo $page_data[0]->meta_description; ?></textarea>
						</div>			
					</div>
					<div class="add-page-information">
						<span>Link name will be visible in main navigation. Add link name for English and for Dutch. Link name can be the same like Page URL.</span> 
					</div>
				</div>	
				  
				  
				  
				  </div>
				
				  <div id="tab-en">
				  
				<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label for="second_link_name">English link:</label>
						</div>
						<div class="field-bg">
							<input id="second_link_name" type="text" name="second_link_name" value="<?php echo $page_data[1]->link_name; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Link name will be visible in main navigation. Add link name for English and for Dutch. Link name can be the same like Page URL.</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>	
				<div class="common-fields page-title-field">
					<div class="fields">
						<div class="field-text">
							<label for="second_page_title">English title:</label>
						</div>
						<div class="field-bg">
							<input id="second_page_title" type="text" name="second_page_title" value="<?php echo $page_data[1]->page_title; ?>"/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Link name will be visible in main navigation. Add link name for English and for Dutch. Link name can be the same like Page URL.</span> 
					</div>
					<div class="bottom-line"></div>
				</div>	
				<div class="common-fields text-area-fields">	
					<div class="fields">
						<div class="field-text">
							<label for="second_meta_key">Meta keywords:</label>
						</div>
						<div class="field-bg">
							<textarea id="second_meta_key" name="second_meta_key" rows="4" cols="30"><?php echo $page_data[1]->meta_keywords; ?></textarea>
						</div>			
					</div>	
					<div class="fields">
						<div class="field-text">
							<label for="second_meta_desc">Meta description:</label>
						</div>
						<div class="field-bg">
							<textarea id="second_meta_desc" name="second_meta_desc" rows="4" cols="30"><?php echo $page_data[1]->meta_description; ?></textarea>
						</div>			
					</div>
					<div class="add-page-information">
						<span>Link name will be visible in main navigation. Add link name for English and for Dutch. Link name can be the same like Page URL.</span> 
					</div>
				</div>	
		  
				  </div>

				</div>

				<div class="form-bottom">	
					<div class="error-msg"></div>
					<div class="buttons-wrapper">
						<div class="cancel">
							<button class="cancel-button" type="button" onclick="window.location.assign('<?php echo base_url('admin/pages/');?>')"></button>
						</div>
						<div>
							<button class="save-button" type="submit"></button>
						</div>	
					</div>
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
	   	
		$("textarea").focus(function () {
			$(this).addClass('selected-area');
		});
		$("textarea").focusout(function () {
			$(this).removeClass('selected-area');
		});
	   
		$(".dropdown dt a").focus(function () {
			$(this).addClass('selected-drop');
		});
		$(".dropdown dt a").focusout(function () {
			$(this).removeClass('selected-drop');
		});

	$(function() {
		$( "#tabs" ).tabs();
	});

	$("#form").validate({
            rules: {
                page_url: {          
                    required: true,   
                    minlength: 2,
					maxlength: 30 
                },
                page_template: {             
                    required: true,   
                    minlength: 2
                },
                first_link_name: {           
                    required: true,  
                    minlength: 2,
					maxlength: 30 
                },
                second_link_name: {          
                    required: true,
                     minlength: 2,
					maxlength: 20 
                },
				first_page_title: {          
                    required: true,
                    minlength: 1,
					maxlength: 40 
                },
				second_page_title: {          
                    required: true,
                    minlength: 1,
					maxlength: 40 
                },
				first_meta_key: {          
                    required: true,
                    minlength: 2,
					maxlength: 256 
                },
				second_meta_key: {          
                    required: true,
                    minlength: 2,
					maxlength: 256 
                },
				 fisrt_meta_desc: {          
                    required: true,
                    minlength: 2,
					maxlength: 256 
                },
				second_meta_desc: {          
                    required: true,
                    minlength: 2,
					maxlength: 256 
                }
				
            },

			messages: {             
                page_url: {
                      required:"Please enter page URL.",
                      minlength:"You have to put at least 2 characters.",
					  maxlength:"Your name is too long."
                      },
                page_template: {
                      required: "Please select page template.",
					  maxlength: "Your last name is too long"
                      },
				first_link_name: {
                      required: "Please enter Dutch link name.",
                      minlength: "You have to put at least 4 characters.",
					  maxlength:"Your username is too long."
                      },
				second_link_name: {
                      required: "Please enter English link name.",
                      minlength: "You have to put at least 4 characters.",
					  maxlength:"Your password is too long."
                      },
				first_page_title: {
                      required: "Please enter page title.",
                      minlength: "You have to put at least 1 characters.",
					  maxlength:"Your company name is too long."
                      },
				second_page_title: {
                      required: "Please enter page title.",
                      minlength: "You have to put at least 1 characters.",
					  maxlength:"Your company name is too long."
                      },	  
				first_meta_key: {
                      required: "Please enter Meta keywords.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your keywords are too long."
                      },
				second_meta_key: {
                      required: "Please enter Meta keywords.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your keywords are too long."
                      },	  
				first_meta_desc: {
                      required: "Please enter Meta descroption.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your description is too long."
                      },
				second_meta_desc: {
                      required: "Please enter Meta descroption.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your description is too long."
                      }		  
            },

			submitHandler: function(form) {
                $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/saveCurrentPageData');?>",
                        type:"post",
						success: function(data){
							if ( data == 'true') {
								$("#overlay").show();
                                $("#overlay-content").fadeIn().show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Page data has been changed!</div><div class="close"><a href="<?php echo base_url('admin/pages');?>"><img src="<?php echo base_url()."skin/admin/images/close.png"?>" /></a></div><div class="bottom-line"></div></div></div>');
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