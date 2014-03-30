<div class="ls-navigation">
	<?php echo Modules::run('navigation/admin_navigation/getAdminNavigation'); ?>
</div>
<div class="container">
	<div class="sub-container">
		<div class="wrap">
		<h1><span class="bold">Where do you want to go?</span></h1>
		<div class="top-line"></div>
		<div class="links">
			<?php if ($links):?> 
				<?php foreach ($links as $link) :?>
					<a href="<?php echo base_url()."admin/edit/".$link->url; ?>">
						<div class="link-content">
							<div class="link-img"><img src="<?php echo base_url()."skin/admin/images/".$link->template.".png"; ?>" /></div>
							<div class="link-text"><span><?php echo $link->url; ?></span></div>
						</div>	
					</a>
				<?php endforeach;?>
			<?php else:?>
				<div class="no-pages-dashboard">
					<div>There are no active pages!</div>
					<div class="text">Click on the icon below, in order to create new page and publish.</div>
					<a href="<?php echo base_url()."admin/pages";?>">
						<div class="link-content">
							<div class=""><img src="<?php echo base_url()."skin/admin/images/manage-pages.png"; ?>" /></div>
							<div class="link-text"><span>Manage pages</span></div>
						</div>	
					</a>
				</div>
			<?php endif;?>
		</div>
		<div class="bottom-line"></div>	
		<div class="dashboard-text">just select an icon and click! </div>
		</div>
	</div>
</div>