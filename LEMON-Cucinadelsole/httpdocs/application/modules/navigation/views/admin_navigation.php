<div class="expand">
	<div class="expand-content">
		<div class="navigation-title-container">
			<div><img src="<?php echo base_url()."skin/admin/images/ls-navigation.png"?>"/></div>
			<div class="navigation-title"><span>Navigation! </span>Click on the icon below</div>
		</div>
		<div class="bottom-line"></div>
		<?php if ($links == true): ?>	
		<div class="expand-links">
			<?php foreach ($links as $link) :?>
				<a href="<?php echo base_url()."admin/edit/".$link->url; ?>">
					<div class="link-content">
						<div class="link-img"><img src="<?php echo base_url()."skin/admin/images/".$link->template."-small.png"; ?>" /></div>
						<div class="link-text"><span><?php echo humanize($link->url); ?></span></div>
					</div>	
				</a>
			<?php endforeach; ?>
		</div>
		<div class="expand-information">
			<span>Click on the icon to chose the page you are editing</span> 
		</div>
		<div class="bottom-line"></div>
		<?php endif; ?>	
		<div class="expand-links">
			<a href="<?php echo base_url("admin/pages"); ?>">
				<div class="link-content">
					<div class="link-img"><img src="<?php echo base_url()."skin/admin/images/manage-pages.png"; ?>" /></div>
					<div class="link-text"><span>manage pages</span></div>
				</div>	
			</a>
			<a href="<?php echo base_url("admin/account"); ?>">
				<div class="link-content">
					<div class="link-img"><img src="<?php echo base_url()."skin/admin/images/user-details.png"; ?>" /></div>
					<div class="link-text"><span>manage account</span></div>
				</div>	
			</a>
		</div>
		<div class="expand-information">
			<div>Click on the icon to set up your preferences</div> 
			<div class="logout">
				<a href="<?php echo base_url('admin/logout');?>"><img src="<?php echo base_url()."skin/admin/images/logout.png"?>"/></a>
			</div>
		</div>
	</div>
	<div class="expand-btn">
		<a href="#"><img src="<?php echo base_url()."skin/admin/images/expand.png"?>"/></a>	
	</div>
</div>

<script type="text/javascript">
  	$(document).ready(function() {  
		$(".expand ").hover(
			function () {
				$(this).animate({
						left: '0px',
						}, 100, function() {
				});
			},
			function () {
				$(this).animate({
						left: '-460px',
						}, 100, function() {
				});
		});
		
									var bodyclass = $("body").attr('class');
											$(".expand .expand-links a div:last-child ").each(function(){
													if($(this).attr("id") == bodyclass) {
															$(this).addClass('active-navigation-link');
													}
									});
									
				
});  
</script>