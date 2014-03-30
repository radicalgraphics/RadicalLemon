<div class="ls-navigation">
	<?php echo Modules::run('navigation/admin_navigation/getAdminNavigation'); ?>
</div>
<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Add new page!</span><span>Fill form data and save to create a new page</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
			<form id="form"  method="post">
				<div class="common-fields">
					<div class="fields first">
						<div class="field-text">
							<label for="page_url">Page URL:</label>
						</div>
						<div class="field-bg">
							<input id="page_url" type="text" name="page_url" value=""/> 
						</div>			
					</div>
					<div class="fields">
						<div class="field-text">
							<label for="page_template">Template:</label>
						</div>
						<div class="field-bg">
							<dl id="template" class="dropdown">
								<dt><a href="#"><span></span></a></dt>
									<dd>
										<ul>
											<li><a id="home">Home page</a></li>
											<li><a id="slider">Slider</a></li>
											<li><a id="bgslider">Background slider</a></li>
                                            <li><a id="page">Static page</a></li>
											<li><a id="video">Video</a></li>
											<li><a id="contact">Contact</a></li>
										</ul>
									</dd>
							</dl>
							<input id="page_template" type="hidden" name="page_template" value=""/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Please add page URL, note the URL is displayed in the browser address bar. Use the drop down to select a template.</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>	
				
				
				
				
				<div id="tabs">
  <ul>
    <li><a href="#tab-nl">Dutch settings</a></li>
    <li><a href="#tab-en">English settings</a></li>

  </ul>
				
				
				
				
				  <div id="tab-nl">
				<div class="common-fields">
					<div class="fields">
						<div class="field-text">
							<label for="first_link_name">Dutch link:</label>
						</div>
						<div class="field-bg">
							<input id="first_link_name" type="text" name="first_link_name" value=""/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>The link name is visible in main navigation, when Dutch language is active.</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>	
				<div class="common-fields page-title-field">
					<div class="fields">
						<div class="field-text">
							<label for="first_page_title">Dutch title:</label>
						</div>
						<div class="field-bg">
							<input id="first_page_title" type="text" name="first_page_title" value=""/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>The title will be visible in the browser tab, when Dutch language is active.</span> 
					</div>
					<div class="bottom-line"></div>
				</div>	
				<div class="common-fields text-area-fields">	
					<div class="fields">
						<div class="field-text">
							<label for="first_meta_key">Meta keywords:</label>
						</div>
						<div class="field-bg">
							<textarea id="first_meta_key" name="first_meta_key" rows="4" cols="30"></textarea>
						</div>			
					</div>	
					<div class="fields">
						<div class="field-text">
							<label for="first_meta_desc">Meta description:</label>
						</div>
						<div class="field-bg">
							<textarea id="first_meta_desc" name="first_meta_desc" rows="4" cols="30"></textarea>
						</div>			
					</div>
					<div class="add-page-information">
						<span style="line-height: 20px;">Our tool is SEO friendly. Choose your target keywords and meta description.<br> <br><span style="color: red; font-size: 14px;">Note:</span> <br>You can not save a new page before completing the other languages first. <br>Once it is completed you can press the button save.</span> 
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
							<input id="second_link_name" type="text" name="second_link_name" value=""/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>The link name is visible in main navigation, when English language is active.</span> 
					</div>
					<div class="bottom-line"></div>	
				</div>	
				<div class="common-fields page-title-field">
					<div class="fields">
						<div class="field-text">
							<label for="second_page_title">English title:</label>
						</div>
						<div class="field-bg">
							<input id="second_page_title" type="text" name="second_page_title" value=""/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>The title will be visible in the browser tab, when English language is active.</span> 
					</div>
					<div class="bottom-line"></div>
				</div>	
				<div class="common-fields text-area-fields">	
					<div class="fields">
						<div class="field-text">
							<label for="second_meta_key">Meta keywords:</label>
						</div>
						<div class="field-bg">
							<textarea id="second_meta_key" name="second_meta_key" rows="4" cols="30"></textarea>
						</div>			
					</div>	
					<div class="fields">
						<div class="field-text">
							<label for="second_meta_desc">Meta description:</label>
						</div>
						<div class="field-bg">
							<textarea id="second_meta_desc" name="second_meta_desc" rows="4" cols="30"></textarea>
						</div>			
					</div>
					<div class="add-page-information">
							<span style="line-height: 20px;">Our tool is SEO friendly. Choose your target keywords and meta description.<br> <br><span style="color: red; font-size: 14px;">Note:</span> <br>You can not save a new page before completing the other languages first. <br>Once it is completed you can press the button save.</span> 
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
		
    $(".dropdown dt a").click(function() {
            $(".dropdown dd ul").toggle();
        });  
    $(".dropdown dd ul li a").click(function() {
            var text = $(this).html();
			var template = $(this).attr('id');
            $(".dropdown dt a span").html(text);
			 $("#page_template").val(template);
            $(".dropdown dd ul").hide();
     });	
    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
            if (! $clicked.parents().hasClass("dropdown"))
                $(".dropdown dd ul").hide();
    });

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
						url:"<?php echo base_url('admin/addNewPage');?>",
                        type:"post",
						success: function(data){
							if ( data == 'true') {
								$("#overlay").fadeIn().show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Page has been created!</div><div class="close"><a href="<?php echo base_url('admin/pages');?>"><img src="<?php echo base_url()."skin/admin/images/close.png"?>" /></a></div><div class="bottom-line"></div></div></div>');
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