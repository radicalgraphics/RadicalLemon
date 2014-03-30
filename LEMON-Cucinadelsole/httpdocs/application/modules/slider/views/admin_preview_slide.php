<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Slide preview!</span><span>See your slide before publish</span>
		</div>
		<div class="top-line"></div>
		<div class="slide-content">
			<ul id="flip">
				<li>
					<img src="<?php echo base_url()."media/slider/".$preview_slide->img; ?>"/>
					<div class="slider-wrapper-inner">
						<?php //var_dump($preview_slide); ?>

						<div class="slider-title">
							<span><?php echo $preview_slide->title ; ?></span>
						</div>	
						<div class="slider-content">
							<div class="slider-inner-content">
								<?php echo $preview_slide->content; ?>
								<?php if ($preview_slide->pdf): ?>
								<div class="download"><span>Om de mogelijke menu's te bekijken klik </span><a href="<?php echo base_url()."media/pdf/".$preview_slide->pdf;?>" target="_blank"></a></div>
								<?php // var_dump($preview_slide); ?>
							<?php endif; ?>
							</div>	
						</div>
						<div class="slider-inform-text"><span>Put the mouse on top of the image to see the content</span>
					</div>
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
		
		$(".slider-content").jScrollPane({
			verticalDragMinHeight: 70,
			verticalDragMaxHeight: 70,
			autoReinitialise: true
		});
		
		$( ".new-page-container" ).draggable();

	});
</script> 
