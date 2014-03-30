<div class="ls-navigation">
	<?php echo Modules::run('navigation/admin_navigation/getAdminNavigation'); ?>
</div>
<div class="new-page-container video">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Add new video!</span><span>Copy video URL</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
		<form id="form"  method="post">	
			<div id="tabs">
				<ul>
					<li><a href="#tab-yt" style="position: relative; top: 10px;"><img src="<?php echo base_url()."skin/admin/images/youtube.png"?>" /></a></li>
				<!--<li><a href="#tab-vm"><img src="<?php //echo base_url()."skin/admin/images/vimeo.png"?>" /></a></li> -->
				</ul>
				<div id="tab-yt">
				
				<div class="common-fields page-title-field video">
					<div class="fields">
						<div class="field-text">
							<label for="video_url">Video URL:</label>
						</div>
						<div class="field-bg">
                            <input id="id_page" type="hidden" name="id_page" value="<?php echo $id_page; ?>"/> 
							<input id="video_url" type="text" name="video_url" value=""/> 
						</div>			
					</div>
					<div class="add-page-information">
						<span>Paste here the video URL.</span> 
					</div>
					
					<div class="bottom-line"></div>
					<div class="radio-buttons-add">						
					<ul>
						<li>
							<div class="radio-name">Dutch</div>
							<div id="nl" class="radio-button">
								<div></div>
							</div>
						</li>
						<li>
							<div class="radio-name">English</div>
							<div id="en" class="radio-button">
								<div></div>
							</div>
						</li>
						<li>
							<div class="radio-name">Both</div>
							<div id="all" class="radio-button">
								<div></div>
							</div>
						</li>
					</ul>	
				</div>
					<div class="add-page-information">
					<span>Select the language where you are publishing this video.</span> 
				</div>
				<div class="clear"></div>

				</div>	
					
				</div>
			<!--	<div id="tab-vm">
							Available in Version 2
				</div> -->
			</div>
				<div class="form-bottom">	
					<div class="error-msg"></div>
					<div class="buttons-wrapper">
						<div class="cancel">
							<button class="cancel-button" type="button" onclick="window.location.assign('<?php echo base_url('admin/edit/'.$this->uri->segment(2)) ; ?>')"></button>
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
	   	
	
	$('#nl div').addClass('radio-selected');

	$('.radio-buttons-add div div').click(function() {
		$('.radio-buttons-add div div').removeClass('radio-selected');					
		$(this).addClass('radio-selected');
	});
	
	
	   
	$(function() {
		$( "#tabs" ).tabs();
	});

	$("#form").validate({
            rules: {
              
				second_page_title: {          
                    required: true,
                    minlength: 1,
					maxlength: 40 
                },
				second_meta_desc: {          
                    required: true,
                    minlength: 2,
					maxlength: 40 
                }
				
            },

			messages: {             
                page_url: {
                      required:"Please enter page URL.",
                      minlength:"You have to put at least 2 characters.",
					  maxlength:"Your name is too long."
                      },
				second_meta_desc: {
                      required: "Please enter Meta descroption.",
                      minlength: "You have to put at least 2 characters.",
					  maxlength:"Your address is too long."
                      }		  
            },

			submitHandler: function(form) {
              
              var lang = $('.radio-selected').parents().attr('id');	
                
                $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/moduleFunctions');?>",
                        type:"post",
						data: { "template": "video", "method" : "save", "lang":lang},
						success: function(data){
							if ( data == 'true') {
								$("#overlay").fadeIn().show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Video has been saved!</div><div class="close"><a href="<?php echo base_url('admin/edit/'.$this->uri->segment(2));?>"><img src="<?php echo base_url()."skin/admin/images/close.png"?>" /></a></div><div class="bottom-line"></div></div></div>');
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