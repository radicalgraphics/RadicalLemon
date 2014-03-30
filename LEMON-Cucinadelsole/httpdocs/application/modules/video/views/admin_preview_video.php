<div class="new-page-container video">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Video preview!</span><span>See your video before publish</span>
		</div>
		<div class="top-line"></div>
				<div id="<?php echo $preview_video->id ; ?>" class="centered">
					<iframe class="youtube-player" width="696" height="462" src="http://www.youtube.com/embed/<?php echo $preview_video->video_id; ?>?wmode=transparent;enablejsapi=1;controls=0;showinfo=0;rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="close right">
					<a id="close"><img src="<?php echo base_url()."skin/admin/images/close.png"?>" /></a>
				</div>
		<div class="bottom-line"></div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {  
	$("#close").click(function() {
		window.location.reload(true);
	});
});
</script> 
