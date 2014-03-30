<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Slide preview!</span><span>See your slide before publish</span>
		</div>
		<div class="top-line"></div>
		
		<div class="slide-content">
			<div class="slide-content-bg">
				<img src="<?php echo base_url()."media/bgslider/".$preview_slide->img.".jpg"?>"/>
			</div>	
			<div class="slide-content-text">
				<div class="slide-title">
					<?php echo $preview_slide->title ; ?>
				</div>
				<div class="slide-content-center">
					<?php echo $preview_slide->content; ?>
					<?php echo $preview_slide->pdf; ?>
				</div>	
			</div>
		</div>		
		<div class="buttons-wrapper">
			<div class="close">
				<button class="close-button" type="button" onclick="window.location.reload()"></button>
			</div>	
		</div>
		<div class="bottom-line"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {  
		
		$(".slide-content-center").jScrollPane({
			verticalDragMinHeight: 70,
			verticalDragMaxHeight: 70,
			autoReinitialise: true
		});
		
		$( ".new-page-container" ).draggable();

	});
</script> 
