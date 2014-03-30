<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Add date!</span><span>Add date to your slide</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
            


            
            
            
			<form id="date-form" method="post">				
				
				
				
				
                <p><div id="datepicker"></div></p>
                
                <input type="text" id="alternate" size="30"/>
                
                <input type="hidden" id="slide_id" value="<?php echo $id ;?>"/> 
                
				
				
				<div class="add-page-information">
					<span>Pick the date for your event. It will automatically be linked to the corresponding slide.</span> 
				</div>
				<div class="bottom-line"></div>
				
                
                <?php if ($date): ?>
                <div class="current-date">Current date for this slide is: <?php echo $date; ?></div>
				<div class="add-page-information">
					<span>The date which you already assigned for this slide.</span> 
				</div>
				<div class="bottom-line"></div>
                 <?php endif; ?>
                
                
				
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

   
    $( "#datepicker" ).datepicker({
      numberOfMonths: 3,
      showButtonPanel: true,
      altField: "#alternate",
      altFormat: "dd. mm. yy."
     
    });
 
    
	$("#date-form").validate({
           
          
			submitHandler: function(form) {
                $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/moduleFunctions');?>",
                        type:"post",
						data: { "template": "bgslider", "method" : "saveDate", "slide_date":  $('#alternate').val(), "slide_id": $('#slide_id').val()},
						success: function(data){
							if ( data == 'true') {
								$("#overlay").show()
								$("#overlay-content").show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Date has been saved!</div><div class="close"><button id="cancel" class="close-button" type="button" onclick="window.location.reload()"></button></div><div class="bottom-line"></div></div></div>');							}	
							else {
								$(".error-msg").addClass('error').html('<img src="<?php echo base_url()."skin/admin/images/warning.jpg"?>"/>'+'<span>Data not saved!</span>');
							}
						}
                });
            }
			
    });

});  
</script>