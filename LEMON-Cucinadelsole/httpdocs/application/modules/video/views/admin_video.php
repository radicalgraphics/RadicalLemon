<div class="ls-navigation">
	<?php echo Modules::run('navigation/admin_navigation/getAdminNavigation'); ?>
</div>
<div class="content-top">
	<div class="title">
		<span class="bold">Drag & drop!</span><span>Drag your video to the left column and publish in <?php if ($lang == "nl"): ?>Dutch<?php elseif ($lang == "en"): ?>English<?php endif; ?></span>
	</div>
	<div class="new">
        <a href="<?php echo current_url()."/add?pid=".$pid;?>"><img src="<?php echo base_url()."skin/admin/images/new.png"?>" /></a>
	</div>
</div>



<div class="cards-holder">
	<div class="cards-holder-a scroll-pane-first">
	
						<ul id="sortable1" class="connectedSortable">
								<?php if ($active_videos): ?>
										<?php foreach ($active_videos as $activevideo) : ?>
												<li id="<?php echo $activevideo->id;?>" class="ui-state-default">
													<div class="image-area">
														<div class="video-img">
															<img src="http://img.youtube.com/vi/<?php echo $activevideo->video_id; ?>/2.jpg"  height="113" />
														</div>
														<div class="over-slide-holder"></div>
													</div>		
												</li>
										<?php endforeach; ?>
								<?php endif; ?>		
						</ul>
	</div>
	<div class="cards-holder-b scroll-pane-second">
	
						<ul id="sortable2" class="connectedSortable">
								 <?php if ($non_active_videos): ?> 
										<?php foreach ($non_active_videos as $nonactivevideo) : ?>
												<li id="<?php echo $nonactivevideo->id;?>" class="ui-state-default">
													<div class="image-area">
														<div class="video-img">
															<img src="http://img.youtube.com/vi/<?php echo $nonactivevideo->video_id; ?>/2.jpg"  height="113" />
														</div>	
														<div class="over-slide-holder"></div>
													</div>		
												</li>
										<?php endforeach; ?>
								<?php endif; ?>		
						</ul>
	
	</div>
	<div class="informer">
			<div class="information-title">Page information!</div>
			<div class="page-informer">
				<div>Page name: <span><?php echo $this->uri->segment(2); ?></span></div>
				<div>Page template: <span><?php echo $page_information_template->template; ?></span></div><br>
				<div><a href="<?php echo base_url().$this->uri->segment(2); ?>" target="_blank"><img src="<?php echo base_url()."skin/admin/images/".$page_information_template->template."-mini.png"?>"/></a> For live preview click on the icon  </div>
			</div>
			
			<div class="informer-lang">
				<div class="text">Content in</div>
				<?php echo Modules::run('language/admin_language/getAdminLangSwitcher'); ?><br>
				<div class="slide-number">Number of videos: <span><?php echo $page_information_name; ?></span></div><br>
                <div class="slide-number">Page status: <span><?php if ($page_information_template->is_active) { echo "LIVE";} else { echo "NOT PUBLISHED"; } ?></span></div>
			</div>
	</div>
</div>
<div class="clear"></div>


<script type="text/javascript">

$(document).ready(function() {  

	$('.scroll-pane-first, .scroll-pane-second').jScrollPane(
		{
			verticalDragMinHeight: 70,
			verticalDragMaxHeight: 70,
			autoReinitialise: true
		});
		
		
	$(function() {
		$( "#sortable1, #sortable2" ).sortable({
			placeholder: "ui-state-highlight",
			connectWith: ".connectedSortable",
			cursor: 'move',
			receive: function( event, ui ) {
											
				var area = $(this).attr("id");	
				var video_id = $(ui.item).attr("id");
				
				$( '#sortable2 .image-area .over-slide-holder').html('<div></div>');
	
				if (area == "sortable2") {				
						$.ajax({
								url: "<?php echo site_url('admin/moduleFunctions');?>",
								type: 'POST',
								data: { "template": "video", "method" : "setNonActiveVideo", "id_page_data": <?php echo $id; ?>, "video_id": video_id },
								success: function(data) {
											$('#imgstatus').html(data);
								}
						});   
				}
			
				if ($("#sortable1 li").length <= 5) {
			
						if (area == "sortable1") {		
								$.ajax({
										url: "<?php echo site_url('admin/moduleFunctions');?>",
										type: 'POST',
										data: { "template": "video", "method" : "setActiveVideo", "id_page_data": <?php echo $id; ?>, "video_id": video_id },
										success: function(data) {
													$('#imgstatus').html(data);
									   }
								});   	
						}
				}
				else {
					
					$(ui.sender).sortable('cancel');
					$("#overlay").fadeIn().show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">You can publish only 5 videos!</div><div class="close"><a href="<?php echo base_url('admin/pages');?>"><img src="<?php echo base_url()."skin/admin/images/close.png"?>" /></a></div><div class="bottom-line"></div></div></div>');
					 
				}
			},
			
			update: function( event, ui ) { 
			    
				var info = $(this).sortable('toArray');
				var area = $(this).attr("id");
				
				
			$( '#sortable2 .image-area .over-slide-holder').html('<div></div>');
				
				if (area == "sortable2") {		
						$.ajax({
								url: "<?php echo site_url('admin/moduleFunctions');?>",
								type: 'POST',
								data: { "template": "video", "method" : "videoOrderNonActive", "id_page_data": <?php echo $id; ?>, "orderId": info },
								success: function(data) {
										$('#imgstatus').html(data);
								}
						});   
				
				}
								
				if (area == "sortable1") {		
						$.ajax({
								url: "<?php echo site_url('admin/moduleFunctions');?>",
								type: 'POST',
								data: { "template": "video", "method" : "videoOrderActive", "id_page_data": <?php echo $id; ?>, "orderId": info },
								success: function(data) {
											$('#imgstatus').html(data);
								}
						});   
				}	
			}
		}).disableSelection();
	});
	
	
	
	
	

	
	$('ul li').hover( 
		function() {
			
		var slide_id = $(this).attr('id');
		
			$( '#sortable2 #'+slide_id+' .image-area .over-slide-holder').html('<div class="button-over-set"><button id="p'+slide_id+'" class="preview-over-button"></button><button id="d'+slide_id+'" class="delete-over-button"></button></div>');
			
			$('#p'+slide_id).click(function(){

			
			$("#overlay").fadeIn().show();

				  $.ajax({
												url: "<?php echo site_url('admin/moduleFunctions');?>",
											type: 'post',
											data: { "template": "video", "method" : "previewVideo", "video_id": slide_id  },
										   success: function(data) {
															
															$('#overlay').html(data);
													
										   }
									});  
		
			
		
			
			
			
			
			
			
			
			
			});
			
			
			$('#d'+slide_id).click(function(){
					
				$("#overlay").show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Do you want to delete this video?</div><div class="close"><button id="del_no" class="no-button" type="button" onclick="window.location.reload()"></button><button id="del_yes" class="yes-button" type="button" onclick="window.location.reload()"></button></div><div class="bottom-line"></div></div></div>');
						
						$("#del_yes").click(function() {
						
													
						   $.ajax({
										url: "<?php echo site_url('admin/moduleFunctions');?>",
										type: 'post',
										data: { "template": "video", "method" : "deleteVideo", "video_id": slide_id  },
										success: function(data) {
														
													if ( data == 'true') {
														window.location.reload(true);
													}	
										   
										   }
									});   
						
						 });
						 
						 
						 	$("#del_no").click(function() {
									
									$("#overlay").hide();
						
							});
				
				

						
				});
	
		},
		function() {
			
		var slide_id = $(this).attr('id');
		
				$( '#sortable2 #'+slide_id+' .image-area .over-slide-holder').html('<div></div>');
		
		}
	);	
	
	


});
</script> 

