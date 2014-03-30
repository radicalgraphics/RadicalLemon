<div class="ls-navigation">
	<?php echo Modules::run('navigation/admin_navigation/getAdminNavigation'); ?>
</div>
<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Add new slide!</span><span>Click on and select slider background</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
			<form id="form"  method="post">	
				<input id="id_page" type="hidden" name="id_page" value="<?php echo $this->input->get('pid'); ?>"/> 
				<div class="add-slide-bg">
					<ul>
						<li>
							<div id="color1" class="color1">
								<div></div>
							</div>
						</li>
						<li>
							<div id="color2" class="color2">
								<div></div>
							</div>
						</li>
						<li>	
							<div id="color3" class="color3">
								<div></div>
							</div>
						</li>
					</ul>		
				</div>
			
				<div class="clear"></div>
			
				<div class="add-page-information">
					<span>Pick the color of your slide and click on it.</span> 
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
					<span>Select here the language where you are using the slide.</span> 
				</div>
				<div class="clear"></div>
				
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

	$('#color1 div').addClass('active-bg-slide');

	$('.add-slide-bg div div').click(function() {
		$('.add-slide-bg div div').removeClass('active-bg-slide');					
		$(this).addClass('active-bg-slide');
	});
		
	$('#nl div').addClass('radio-selected');

	$('.radio-buttons-add div div').click(function() {
		$('.radio-buttons-add div div').removeClass('radio-selected');					
		$(this).addClass('radio-selected');
	});
	
	$("#form").validate({

		submitHandler: function(form) {
			
			var img = $('.active-bg-slide').parents().attr('id');
			var lang = $('.radio-selected').parents().attr('id');			

            $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/moduleFunctions');?>",
                        type:"post",
						data: { "template":"bgslider", "method":"addSlide", "img":img, "lang":lang },
						success: function(data){
							if ( data == 'true') {
								$("#overlay").show();
								$("#overlay-content").show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Slide has been saved!</div><div class="close"><a href="<?php echo base_url('admin/edit/'.$this->uri->segment(2));?>"><img src="<?php echo base_url()."skin/admin/images/close.png"?>" /></a></div><div class="bottom-line"></div></div></div>');
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