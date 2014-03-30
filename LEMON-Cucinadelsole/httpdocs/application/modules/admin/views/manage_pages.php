<div class="ls-navigation">
	
</div>
<div class="content-top">
	<div class="title">
		<span class="bold">Drag & drop!</span><span>Drag your page to the left column and publish</span>
	</div>
	<div class="new">
		<a href="<?php echo base_url('admin/pages/add');?>"><img src="<?php echo base_url()."skin/admin/images/new.png"?>" /></a>
	</div>
</div>	
<div class="cards-holder">
	<div class="cards-holder-a scroll-pane-first">

						<ul id="sortable1" class="connectedSortable">
								<?php if ($active_pages): ?>
										<?php foreach ($active_pages as $activepage) : ?>
												<li id="<?php echo $activepage->id_page;?>" class="ui-state-default" title="<?php echo $activepage->template;?>" value="<?php echo $activepage->url;?>">
													<div class="image-area">
														
														<div class="blue-bg" id="bg-color" title="<?php echo $activepage->url;?>"><?php echo $activepage->url;?></div>
														<div class="over-slide-holder"></div>
														
													</div>		
												</li>
										<?php endforeach; ?>
								<?php endif; ?>		
						</ul>
	</div>
	<div class="cards-holder-b scroll-pane-second">
	
						<ul id="sortable2" class="connectedSortable">
								 <?php if ($non_active_pages): ?> 
										<?php foreach ($non_active_pages as $nonactivepage) : ?>
												<li id="<?php echo $nonactivepage->id_page;?>" class="ui-state-default" title="<?php echo $nonactivepage->template;?>" value="<?php echo $nonactivepage->url;?>">
													<div class="image-area">
														
														<div class="blue-bg" id="bg-color"><?php echo $nonactivepage->url;?></div>
														<div class="over-slide-holder"></div>
														
													</div>		
												</li>
										<?php endforeach; ?>
								<?php endif; ?>		
						</ul>
	
	</div>
    <div class="informer">
        <div class="information-title">Manage or create new pages!</div>
        <div class="page-informer">
            <div>Please note, that in this area you can create new pages and store them. Remember you can only publish the amount of pages we have configured for you.</div>
          
        </div>

       
    </div>
</div>
<div class="clear"></div>







<script type="text/javascript">

$(document).ready(function() {  
	$('.ls-navigation').load("<?php echo site_url('admin/dynamicPageNavigation');?>" );
	$('.scroll-pane-first, .scroll-pane-second').jScrollPane(
		{
			verticalDragMinHeight: 70,
			verticalDragMaxHeight: 70,
             mouseWheelSpeed: 30,
			autoReinitialise: true
		});
		
		
	$(function() {
		$( "#sortable1, #sortable2" ).sortable({
			placeholder: "ui-state-highlight",
			connectWith: ".connectedSortable",
			cursor: 'move',
			receive: function( event, ui ) {
									
				var area = $(this).attr("id");	
				var page_id = $(ui.item).attr("id");
				
				$( '#sortable2 .image-area .over-slide-holder').html('<div></div>');
	
				if (area == "sortable2") {	
							
						$.ajax({
								url: "<?php echo site_url('admin/NonActivePage');?>",
								type: 'POST',
								data: { "page_id": page_id },
								success: function(data) {
											$('#imgstatus').html(data);
								}
						});   
					
				}
			
				if ($("#sortable1 li").length <= 7) {
					
						if (area == "sortable1") {		
								$.ajax({
										url: "<?php echo site_url('admin/ActivePage');?>",
										type: 'POST',
										data: { "page_id": page_id },
										success: function(data) {
													$('#imgstatus').html(data);
									   }
								});  
							$('.ls-navigation').load("<?php echo site_url('admin/dynamicPageNavigation');?>" );	
						}
				}
				else {
					
					$(ui.sender).sortable('cancel');
					$("#overlay").fadeIn().show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">You can set only 7 active pages!</div><div class="close"><a href="<?php echo base_url('admin/pages');?>"><img src="<?php echo base_url()."skin/admin/images/close.png"?>" /></a></div><div class="bottom-line"></div></div></div>');
					 
				}
				
			$('.ls-navigation').load("<?php echo site_url('admin/dynamicPageNavigation');?>" );	
				
			},
			
			update: function( event, ui ) { 
			    
				var info = $(this).sortable('toArray');
				var area = $(this).attr("id");
				
				
			$( '#sortable2 .image-area .over-slide-holder').html('<div></div>');
				
				if (area == "sortable2") {		
						$.ajax({
								url: "<?php echo site_url('admin/pageOrderNonActive');?>",
								type: 'POST',
								data: { "orderId": info },
								success: function(data) {
										$('#imgstatus').html(data);
								}
						});   
				$('.ls-navigation').load("<?php echo site_url('admin/dynamicPageNavigation');?>" );	
				}
								
				if (area == "sortable1") {		
						$.ajax({
								url: "<?php echo site_url('admin/pageOrderActive');?>",
								type: 'POST',
								data: { "orderId": info },
								success: function(data) {
											$('#imgstatus').html(data);
								}
						});   
							$('.ls-navigation').load("<?php echo site_url('admin/dynamicPageNavigation');?>" );		
				}	
				
					$('.ls-navigation').load("<?php echo site_url('admin/dynamicPageNavigation');?>" );	
				
			}
		}).disableSelection();
	});
	
	
	
	
	
	
	
	
	
	
	
	
	$('ul li').hover( 
		function() {
			
		var page_id = $(this).attr('id');
		var page_template = $(this).attr('title');
        var page_url = $(this).attr('value');
	
			$( '#sortable2 #'+page_id+' .image-area .over-slide-holder').html('<div class="button-over-set"><a id="e'+page_id+'" href="#"><img src="<?php echo base_url()."skin/admin/images/icons/edit.png"?>"/></a><a href="<?php echo base_url()."admin/edit/"?>'+page_url+'"><img src="<?php echo base_url()."skin/admin/images/icons/content.png"?>"/></a><a id="d'+page_id+'" href="#"><img src="<?php echo base_url()."skin/admin/images/icons/delete.png"?>"/></a></div>');
			
			$('#e'+page_id).click(function(){
	
				$("#overlay").show();

				  $.ajax({
											url: "<?php echo site_url('admin/editPage');?>",
											type: 'post',
											data: { "page_id": page_id },
										   success: function(data) {
															
															$('#overlay-content').html(data);
													
										   }
									});  
		
		
		
		
		
			});
			
			
			$('#d'+page_id).click(function(){
					
				$("#overlay").fadeIn().show().html('<div class="message"><div class="message-container"><div class="title">Message!</div><div class="top-line"></div><div class="message-icon"><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div><div class="message-text">Do you really want to delete this page?</div><div class="close"><a href="#" id="del_no"><img src="<?php echo base_url()."skin/admin/images/no.png"?>" /></a><a href="#" id="del_yes"><img src="<?php echo base_url()."skin/admin/images/yes.png"?>" /></a></div><div class="bottom-line"></div></div></div>');
						
						$("#del_yes").click(function() {
						
													
						   $.ajax({
											url: "<?php echo site_url('admin/deletePage');?>",
											type: 'post',
											data: { "page_id": page_id, "template": page_template },
										   success: function(data) {
														
													if ( data == 'true') {
														window.location.reload(true);
													}	
										   
										   }
									});   
						
						 });
						 
						 
						 	$("#del_no").click(function() {
									
									$("#overlay").fadeOut();
						
							});
						 

						
				});
				
				
	
		},
		function() {
			
		var page_id = $(this).attr('id');
		
				$( '#sortable2 #'+page_id+' .image-area .over-slide-holder').html('<div></div>');
		
		}
	);	
	
	
	

});
</script> 