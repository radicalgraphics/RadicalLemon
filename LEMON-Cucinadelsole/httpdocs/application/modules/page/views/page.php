<div class="page-content">
	<div class="page-top-content">
		<?php if(!empty($bg_content->content)): ?>
			<?php echo $bg_content->content; ?>
		<?php endif; ?>
	</div>
	<div class="page-bottom-content">
        <?php if ($slider_content) : ?>
            <?php foreach( $slider_content as $page): ?>
                <div id="<?php echo $page->order_active;?>" class="page-slide">
					<div class="page-inner">
						<div class="left">
		                    <img src="<?php echo base_url()."media/page/".$page->img ?>" />
		                    <div class="title"><?php echo $page->title; ?></div>
						</div>
		                <div id="<?php echo "over".$page->order_active; ?>" class="page-overlaytext">
							<div class="overtext">
								<?php echo $page->content; ?>
							</div>
						</div>
						<div class="clearer"></div>
					</div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
	</div>
</div>
<script type="text/javascript">
 $(document).ready( function(){			 
	$(".page-overlaytext").jScrollPane({
		verticalDragMinHeight: 70,
		verticalDragMaxHeight: 70,
        mouseWheelSpeed: 30,
		autoReinitialise: true
	});
});	  
</script> 