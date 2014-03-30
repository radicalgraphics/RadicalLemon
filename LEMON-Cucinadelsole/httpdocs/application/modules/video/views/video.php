<?php if ($video_content): ?>
	<div class="container video">
	
        
        
        <?php foreach($video_content as $video): ?>
     
				<div id="<?php echo $video->id; ?>" class="player" style="display: none;">
					<iframe  id="<?php echo "vid".$video->order_active; ?>"class="youtube-player" width="696" height="462" src="http://www.youtube.com/embed/<?php echo $video->video_id; ?>?wmode=transparent;enablejsapi=1;controls=0;showinfo=0"></iframe>
				</div>
		<?php endforeach; ?>
        
        
        
	</div>
	


    <div class="more-videos">
		<?php foreach($video_content as $video_img): ?>
			<div class="more-videos-tmb" id="<?php echo $video_img->id; ?>">
				<img src="http://img.youtube.com/vi/<?php echo $video_img->video_id; ?>/2.jpg" width="120" />
			</div>	
		<?php endforeach; ?>
	</div>



<?php else: ?>
	<div class="empty-page">
		<img src="<?php echo base_url()."skin/site/images/image-holder.png"?>" alt="Empty page"/>
	</div>
<?php endif; ?>	
<script type="text/javascript">
	$(document).ready(function(){ 		
					
		$('.container div:first-child').show();
					
		$('.more-videos div').click(function () {  
            
     
          
			var  videoid = $(this).attr('id');
			$('.container div').hide();
			$('#'+ videoid ).show();
            
            
            
            
                                    var video = $("#vid0").attr("src");
									$("#vid0").attr("src","");
									$("#vid0").attr("src",video);
									
									var video = $("#vid1").attr("src");
									$("#vid1").attr("src","");
									$("#vid1").attr("src",video);
									
									var video = $("#vid2").attr("src");
									$("#vid2").attr("src","");
									$("#vid2").attr("src",video);
									
									var video = $("#vid3").attr("src");
									$("#vid3").attr("src","");
									$("#vid3").attr("src",video);
									
									var video = $("#vid4").attr("src");
									$("#vid4").attr("src","");
									$("#vid4").attr("src",video);
            

            
		});
        
        
	});
</script>

