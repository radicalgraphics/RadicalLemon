<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Slide preview!</span><span>See your slide before publish</span>
		</div>
		<div class="top-line"></div>
		<div class="slide-content">
			<ul id="flip" class="bgslider">
				<li>
					<!-- <div class="slider-content-bg"> -->
					<!-- </div>	 -->
					<div class="bgslide-content">
						<!-- <div class="slider-title"> -->
							<?php // echo $preview_slide->title ; ?>
						<!-- </div> -->
						<div class="bg-inner-content">
							<?php echo $preview_slide->content; ?>
							<?php if ($preview_slide->pdf): ?>
							<div class="download"><span>Om de mogelijke menu's te bekijken klik </span><a href="<?php echo base_url()."media/pdf/".$preview_slide->pdf;?>" target="_blank"></a></div>
							<?php endif; ?>
						</div>	
					</div>
					<img src="<?php echo base_url()."media/bgslider/".$preview_slide->img.".jpg"?>"/> 
				</li>
			</ul>
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
		
		$(".bgslide-content").jScrollPane({
			verticalDragMinHeight: 70,
			verticalDragMaxHeight: 70,
			autoReinitialise: true
		});
		
		$( ".new-page-container" ).draggable();

	});
</script> 
