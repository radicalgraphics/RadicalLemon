<div class="ls-navigation">
	<?php echo Modules::run('navigation/admin_navigation/getAdminNavigation'); ?>
</div>
<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Add new slide!</span><span>Upload your image and crop</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
            
            <div id="loading" class="loading-image"></div>
            
			<form id="upload_img"  method="post">	
                <div id="image-place" class="image-place">
                    <input type="file" class="use" name="userfile" id="userfile" size="20"/>
                    <input class="upload-btn" style="display:none" name="submit" type="submit" value=""/>
                     <!-- <img src="<?php echo base_url()."skin/admin/images/image-holder.png" ?>"/>          -->
                     <div class="upload-img-placeholder"><div class="inner"></div></div>
                </div>
            </form>           
                
            
            
            
            
            
            
               <form id="save_img"  method="post">	 
                   <input id="id_page" type="hidden" name="id_page" value="<?php echo $this->input->get('pid'); ?>"/> 
                 	<input id="img_name" type="hidden" name="img_name" value=""/> 
                <div id="save-bar" style="display: none;" >
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
            
                   
                    
                <div class="form-bottom">	
					<div class="error-msg"></div>
					<div class="buttons-wrapper">
						<div class="cancel">
							<button class="cancel-button" type="button" onclick="window.location.reload()"></button>
						</div>
						<div>
							<button class="save-button" type="submit"></button>
						</div>	
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
        
		$('#userfile').customFileInput();	
        
        $(document).ajaxStart(function() {
            $( "#loading" ).show();
        });
        $(document).ajaxStop(function() {
            $( "#loading" ).hide();
        });
        
        $("input:file").change(function (){
           var inputcontent = $(this).val();
           if (typeof  inputcontent !== 'undefined') {
               $(".upload-btn").show();
           }
        });
        
        $('#nl div').addClass('radio-selected');

	$('.radio-buttons-add div div').click(function() {
		$('.radio-buttons-add div div').removeClass('radio-selected');					
		$(this).addClass('radio-selected');
	});
	
        
        

             $('#upload_img').submit(function(e) {
                e.preventDefault();

                    $.ajaxFileUpload({
                       url         :'<?php echo site_url('admin/moduleFunctions'); ?>',
                       secureuri      :false,
                       fileElementId  :'userfile',
                       dataType    : 'json',
                       data        : {
                                  "template": "page", 
                                  "method" : "addSlideImg"
                       },
                       success  : function (data)
                       {
      
                        
                         $('#image-place').html('<img id="crop" src="<?php echo base_url('media/page/original_images');?>/'+data.img+'"alt="eeee"/>');
                         
                         $('#img_name').attr( "value", data.img);

                         
                         $('#save-bar').show(); 
                         
                         
                         $('#crop').Jcrop({				
							setSelect:   [ 0, 0, 216, 244 ],
							boxWidth: 828,
							boxHeight: 720,
							allowSelect: false,
							allowMove: true,
							allowResize: false,
							onSelect: showCoords
                          
                         });

                         function showCoords(c)
                        {
                            var x = c.x ;
                            var y = c.y;
                            var w = c.w;
                            var h = c.h;
                            var img = data.img;
                                    $.ajax({
                                                type: "post",
                                                url: "<?php echo site_url('admin/moduleFunctions'); ?>",
                                                data: { "template": "page", "method" : "cropImg", "x": x , "y": y , "w" : w , "h" : h, "img" : img },
                                                cache:false,
                                                success: function(data) {            

                         							 		
                                                 }
                                            });	
                                                    
                        };
                        

                         
                       }
                    });
                 return false;
             });
     
    
    
             
             $("#save_img").validate({

		submitHandler: function(form) {
			
			
			var lang = $('.radio-selected').parents().attr('id');			

            $(form).ajaxSubmit({
						url:"<?php echo base_url('admin/moduleFunctions');?>",
                        type:"post",
						data: { "template":"page", "method":"saveSlide", "lang":lang },
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