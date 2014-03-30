<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Attach PDF!</span><span>Add pdf to your slide</span>
		</div>
		<div class="top-line"></div>
        <div class="form-content">
            <div  id="loading" class="loading-image">
                <img src="<?php echo base_url()."skin/admin/images/loading.gif"; ?>" style="display:block;">
            </div>
            <div>
                <form method="post" id="upload_file">				  										 
                    <input type="hidden" id="slide_id" size="20" value="<?php echo $id; ?>"/>
                    <input type="file" name="userfile" id="userfile" size="20" />
                    <input class="upload-btn" name="submit" type="submit" value="" />  
                    <div class="add-page-information">
                        <span>Browse and upload the PDF your want to link to your slide.</span> 
                    </div>
                    <div class="bottom-line"></div>					
                    <div class="clear"></div>											
                </form>										
            </div>	
            <?php if (!empty($pdf)): ?>
                <div class="pdfs">
                    <p>Attached PDF :<?php echo $pdf; ?></p>
                    <a class="first" href="<?php echo base_url()."media/pdf/".$pdf; ?>" target="_blank"><img src="<?php echo base_url()."skin/admin/images/preview-pdf.png";?>"/></a>
                    <button class="delete-button right" type="button" id="delete"></button>
                    <div class="clear"></div>
                </div>
                <div>
                    <div class="add-page-information">
                        <span>Check you are uploading the right PDF by using the preview tool.</span> 
                    </div>	
                    <div class="bottom-line"></div>														
                </div>									
            <?php endif; ?>        
                <div class="form-bottom">	
                    <div class="error-msg"></div>															
                    <button class="close-button right" type="button" onclick="window.location.reload()"></button>
                </div>
		</div>
		<div class="bottom-line"></div>
	</div>
</div>		


<script type="text/javascript">

    $('#userfile').customFileInput();	
    
    $( ".new-page-container" ).draggable();

    $(document).ajaxStart(function() {
      $( "#loading" ).show();
    });
    $(document).ajaxStop(function() {
      $( "#loading" ).hide();
    });

    $(function() {
       $('#upload_file').submit(function(e) {
          e.preventDefault();

          $.ajaxFileUpload({
             url         :'<?php echo site_url('admin/moduleFunctions');?>',
             secureuri      :false,
             fileElementId  :'userfile',
             dataType    : 'json',
             data        : {
                        "template": "slider", 
                        "method" : "upload",
                        'slide_id' : $('#slide_id').val()
             },
             success  : function (data){
                        if ( data == true) {
                               $("#overlay").show()
                               $("#overlay-content").show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">PDF has been uploaded!</div><div class="close"><button id="cancel" class="close-button" type="button" onclick="window.location.reload()"></button></div><div class="bottom-line"></div></div></div>');
                        }	
                        else {
                                    $(".error-msg").addClass('error').html('<img src="<?php echo base_url()."skin/admin/images/warning.jpg"?>"/>'+'<span>Data not saved!</span>');
                        }
             }
          });
          return false;
       });
    });
    
    

     $('#delete').click(function() {
     
       $.ajax({
            type: "POST",
            cache:false,
			url :'<?php echo site_url('admin/moduleFunctions');?>',
			data : {
                        "template": "slider", 
                        "method" : "deletePdf",
                        'slide_id' : $('#slide_id').val()
             },
            success: function(data) {            
				 if ( data == 'true') {
                               $("#overlay").show()
                               $("#overlay-content").show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">PDF has been deleted!</div><div class="close"><button id="cancel" class="close-button" type="button" onclick="window.location.reload()"></button></div><div class="bottom-line"></div></div></div>');
                        }	
                        else {
                                    $(".error-msg").addClass('error').html('<img src="<?php echo base_url()."skin/admin/images/warning.jpg"?>"/>'+'<span>Data not saved!</span>');
                        }
			}
        });  

    });
</script>