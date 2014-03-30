<?php 
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<?php if(!$detect->isMobile() && !$detect->isTablet()): ?>
	<?php if ($slider_content != FALSE): ?>
		<div class="calendar-filter">	
			<a id="calendar-icon"><img src="<?php echo base_url()."skin/site/images/calendar.png"?>" alt="next" title="Table of events"/></a>
		</div>	
        <div id="calendar" class="calendar"><?php echo Modules::run('filter/filter/calendarFilter',$slider_content); ?></div>
		<div class="bgslider-wrapper">
			<ul id="flip">
				<?php foreach ($slider_content as $slide): ?>
					<li>
						<div class="bgslider-title <?php echo $slide->img; ?>"><?php echo $slide->title; ?></div>
						<div class="bgslide-content"> 
                            <div class="bg-inner-content"><?php echo $slide->content; ?></div>
                            <?php if ($slide->pdf): ?>	
								<div class="download"><span><?php echo $this->lang->line('download-text'); ?> </span><a href="<?php echo base_url()."media/pdf/".$slide->pdf;?>" target="_blank"></a></div>
							<?php endif; ?>
						</div>
						<img src="<?php echo base_url()."media/bgslider/".$slide->img.".jpg" ?>"/>
					</li>	
				<?php endforeach; ?>
			</ul>
			<div class="navigation-buttons">
				<a class="prev">	
					<img src="<?php echo base_url()."skin/site/images/prev.png"?>" alt="prev"/>
				</a>
				<a class="next">
					<img src="<?php echo base_url()."skin/site/images/next.png"?>" alt="next"/>
				</a>
			</div>
		</div>
	<?php else: ?>	
		<div class="empty-page">
			<img src="<?php echo base_url()."skin/site/images/image-holder.png"?>" alt="Empty page"/>
		</div>
	<?php endif; ?>
<?php else: ?>
    <?php if ($slider_content != FALSE): ?>
	<div class="">
		<?php foreach ($slider_content as $slide): ?>
			<div class="content-wrapper">
				<div class="bg-content">
					<?php if(empty($slide->title) && (empty($slide->content))): ?>
					<?php else: ?>
					<div class="title" style="background: url(<?php echo base_url()."media/bgslider/".$slide->img.".jpg" ?>) ">
						<div class="title-inner">
							<?php echo $slide->title; ?>
						</div>
					</div>
					<div class="inner">
						<div class="text"><?php echo $slide->content; ?></div>
						<?php if ($slide->pdf): ?>	
							<div class="download"><span>Om de mogelijke menu's te bekijken klik </span><a href="<?php echo base_url()."media/pdf/".$slide->pdf;?>" target="_blank"></a>
							</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>	
		<?php endforeach; ?>
	</div>
    <?php else: ?>	
		<div class="empty-page">
			<img src="<?php echo base_url()."skin/site/images/image-holder.png"?>" alt="Empty page"/>
		</div>
	<?php endif; ?>
<?php endif; ?>

<script type="text/javascript">
 $(document).ready( function(){

        $( '#flip' ).jcoverflip({
          current:<?php if(!isset($_GET['s'])) { echo 2; } else { echo $_GET['s'];}?>,
		  time: 200,		
          beforeCss: function( el, container, offset ){
			el.removeClass('bgcurrent');
            el.find('.bgslider-title').show();
			el.find('.bgslide-content').hide();
		
            return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 600 - 330 *offset )+'px', bottom: '160px'}, { } ),
                $.jcoverflip.animationElement( el.find( 'img' ), {  width: '250px', height: '166px' }, {} )
            ];
          },
		  
          afterCss: function( el, container, offset ){
			el.removeClass('bgcurrent');
            el.find('.bgslider-title').show();
			el.find('.bgslide-content').hide();
			
            return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 + 330 + 330 *offset )+'px', bottom: '160px'}, { } ),
                $.jcoverflip.animationElement( el.find( 'img' ), {  width: '250px', height: '166' }, {} )
            ];
          },
          currentCss: function( el, container ){
			
            el.addClass('bgcurrent');
            el.find('.bgslider-title').hide();
          
            return [
              	$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 360 )+'px', bottom: '0px' }, { } ),
                $.jcoverflip.animationElement( el.find( 'img' ), {  width: '696px', height: '534px' }, {} )
            ];

          },
       
          stop: function() {
              $('.bgcurrent .bgslide-content').fadeIn();
              
          }

    });
		
		$('.next').click(function(){
             $('#flip').jcoverflip('next', '1', true);
        });
        $('.prev').click(function(){
             $('#flip').jcoverflip('previous', '1', true);
        });
		
    $(".bgslide-content").jScrollPane({
		verticalDragMinHeight: 70,
		verticalDragMaxHeight: 70,
        mouseWheelSpeed: 30,
		autoReinitialise: true
	});
});	  
</script> 