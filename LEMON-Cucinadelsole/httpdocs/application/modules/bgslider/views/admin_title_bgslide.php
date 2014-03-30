<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Add title!</span><span>Add title to your slide</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
			<form id="text-form" method="post">				
				
				
				
				<div class="common-fields page-title-field">
				<div class="fields">
					<div class="field-text">
						<label for="title">Slide title:</label>
					</div>
					<div class="field-bg">
						<input id="slide_id" type="hidden" name="slide_id" value="<?php echo $title->id; ?>"/>
						<input id="title" type="text" name="title" value="<?php echo $title->title; ?>"/>
					</div>			
				</div>
				</div>
				
				
				
				
				<div class="add-page-information">
					<span>The title is customized according to your visual identity.</span> 
				</div>
				<div class="bottom-line"></div>
				
				
				
				<div class="form-bottom">	
					<div class="error-msg"></div>
					<div class="buttons-wrapper">
						<div class="cancel">
							<button id="cancel" class="cancel-button" type="button" onclick="window.location.reload()"></button>
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
		
  $( ".new-page-container" ).draggable();

	$("input").focus(function () {
			$(this).addClass('selected');
		});
		$("input").focusout(function () {
			$(this).removeClass('selected');
		});
	   	

	
	   


	$("#text-form").validate({
           

			submitHandler: function(form) {
                $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/moduleFunctions');?>",
                        type:"post",
						data: { "template": "bgslider", "method" : "saveTitle"},
						success: function(data){
							if ( data == 'true') {
								$("#overlay").show()
								$("#overlay-content").show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Title has been saved!</div><div class="close"><button id="cancel" class="close-button" type="button" onclick="window.location.reload()"></button></div><div class="bottom-line"></div></div></div>');							}	
							else {
								$(".error-msg").addClass('error').html('<img src="<?php echo base_url()."skin/admin/images/warning.jpg"?>"/>'+'<span>Data not saved!</span>');
							}
						}
                });
            }
			
    });

});  
</script>