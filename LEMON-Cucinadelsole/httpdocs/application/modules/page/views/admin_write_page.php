<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Add text!</span><span>Add text to your slide</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
			<form id="text-form" method="post">
				<input id="slide_id" type="hidden" name="slide_id" value="<?php echo $write_slide->id; ?>"/>
				<textarea name="content"><?php echo $write_slide->content ?></textarea>
				<div class="clear"></div>
				<div class="add-page-information">
					<span>The text editor is customized according to your visual identity. Once you enter the content remember to style accordingly.</span> 
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
						<div class="clear"></div>	
					</div>	
				</div>
			</form>
		</div>
		<div class="bottom-line"></div>
	</div>
</div>		



<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	theme: "modern",
	menubar:false,
	plugins: "link textcolor",
	fontsize_formats: "8px 10px 12px 14px 15px 16px",
	textcolor_map: [
        "FFFFFF", "White",
        "000101", "Black",
        "B72025", "Red",
        "FFA225", "Orange"
    ],
	textcolor_rows: 1,
    textcolor_cols: 4,
	resize: false,
	height: "360",
	statusbar: false,
    style_formats: [
        {title : 'Title 1', block : 'h1', styles : {color : '#FFFFFF', fontSize: '26px', fontFamily: 'Georgia1,Georgia,serif', fontWeight: 'bold' , lineHeight: '160%'}},
        {title : 'Text', block : 'p', styles : { fontSize: '14px', fontFamily: 'Georgia1,Georgia,serif', fontWeight: 'normal', lineHeight: '140%' }}
      
	],
    toolbar: "undo redo | bold italic underline | bullist numlist | styleselect | fontsizeselect | link | alignleft aligncenter alignright alignjustify | forecolor"
});
</script>


<script type="text/javascript">
	$(document).ready(function() {  

		
		
    $( ".new-page-container" ).draggable();
  

	$("#text-form").validate({
           

			submitHandler: function(form) {
                $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/moduleFunctions');?>",
                        type:"post",
						data: { "template": "page", "method" : "saveText"},
						success: function(data){
							if ( data == 'true') {
								tinyMCE.activeEditor.remove();
								$("#overlay").show()
								$("#overlay-content").show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Text has been saved!</div><div class="close"><button id="cancel" class="close-button" type="button" onclick="window.location.reload()"></button></div><div class="bottom-line"></div></div></div>');
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