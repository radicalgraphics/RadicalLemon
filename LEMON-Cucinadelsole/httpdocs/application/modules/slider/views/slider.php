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
		<div class="slider-wrapper">
			<ul id="flip">
				<?php foreach ($slider_content as $slide): ?>
					<li>
						<img src="<?php echo base_url()."media/slider/".$slide->img ?>" />
						<div class="slider-wrapper-inner">
							<div class="slider-title"><span style="color:#B72025; position: absolute; top: 2px; left:1px; "><?php echo $slide->title; ?></span></div>
							<div class="slider-content"> 
								<div class="slider-inner-content"><?php echo $slide->content; ?></div>
								<?php if ($slide->pdf): ?>	
									<div class="download"><span>Om de mogelijke menu's te bekijken klik </span><a href="<?php echo base_url()."media/pdf/".$slide->pdf;?>" target="_blank"></a></div>
								<?php endif; ?>
							</div>
	                        <div class="slider-inform-text"><span>Put the mouse on top of the image to see the content</span></div>
						</div>
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
			<div class="content-wrapper slider">
				<img src="<?php echo base_url()."media/slider/".$slide->img ?>" />
				<div class="bg-content">
					<?php if(empty($slide->title) && (empty($slide->content))): ?>
					<?php else: ?>
					<div class="inner">
						<div class="title"><?php echo $slide->title; ?></div>
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

<?php if(!$detect->isMobile() && !$detect->isTablet()): ?>
<script type="text/javascript">
 $(document).ready( function(){
      
        $( '#flip' ).jcoverflip({
          current: <?php if (!isset($_GET['s'])) { echo 2; } else { echo  $_GET['s'];} ?>,
		  time: 200,		
          beforeCss: function( el, container, offset ){
			el.removeClass('current');
            $('.current .slider-wrapper-inner').removeClass('current-ov');
            el.find('.slider-title') .css({width: "230px" , fontSize : "26px" });
            
         $('.slider-inform-text').hide();
            
            return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 600 - 330 *offset )+'px', bottom: '160px'}, { } ),
                $.jcoverflip.animationElement( el.find( 'img' ), {  width: '250px', height: '166px', paddingBottom:'0px' }, {} )
            ];
          },
		  
          afterCss: function( el, container, offset ){
			el.removeClass('current');
             $('.current .slider-wrapper-inner').removeClass('current-ov');
            el.find('.slider-title').css({width: "230px" , fontSize : "26px" });
            

             $('.slider-inform-text').hide();
          
            
            return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 + 330 + 330 *offset )+'px', bottom: '160px'}, { } ),
                $.jcoverflip.animationElement( el.find( 'img' ), {  width: '250px', height: '166', paddingBottom:'0px' }, {} )
            ];
          },
          currentCss: function( el, container ){
			
            el.addClass('current');
           
            $('.current .slider-title').css({width: "95%" , height: "100%", fontSize : "62px" });
           
          
        
          
         

            return [
              	$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 360 )+'px', bottom: '0px' }, { } ),
                $.jcoverflip.animationElement( el.find( 'img' ), {  width: '696px', height: '462px', paddingBottom:'70px' }, {} )
            ];

          },
                  
          
          
            start: function() {
                 
                 
                  $('.slider-wrapper-inner').removeClass('current-ov');
                  
                  $('.slider-inform-text').hide();
               
       
            },
                  
                  
                  
                  
          stop: function() {
               
                  $('.current .slider-wrapper-inner').addClass('current-ov');
                  
                  $('.current .slider-inform-text').fadeIn();
                  

            }

	
    });
    
    
    
   $('.current .slider-wrapper-inner').addClass('current-ov');
    
   $('.current .slider-inform-text').fadeIn();
    
    
		
		$('.next').click(function(){
             $('#flip').jcoverflip('next', '1', true);
        });
        $('.prev').click(function(){
             $('#flip').jcoverflip('previous', '1', true);
        });
		

    
    $(".slider-content").jScrollPane({
		verticalDragMinHeight: 70,
		verticalDragMaxHeight: 70,
        mouseWheelSpeed: 30,
		autoReinitialise: true
	});
	 
	 
	
});	  
</script> 
<?php endif; ?>