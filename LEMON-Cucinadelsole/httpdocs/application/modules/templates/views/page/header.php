<div class="logo-container">
	<div class="logo">
		<div class="center">
			<a href="<?php echo base_url() ?>"><img src="<?php echo base_url()."skin/site/images/cucina_del_sole.png"?>" alt="La cucina del sole"/></a>
		</div>
		<div class="left">
			<a href="<?php echo base_url() ?>"><img src="<?php echo base_url()."skin/site/images/italiaanse_kookschool.png"?>" alt="Italiaanse kookschool"/></a>
		</div>
		<div class="right">
			<a href="<?php echo base_url() ?>"><img src="<?php echo base_url()."skin/site/images/italian_cooking_school.png"?>" alt="Italian cooking school"/></a>
		</div>	
		<div class="logo-overlay">
				<a href="<?php echo base_url() ?>"><img src="<?php echo base_url()."skin/site/images/by-nicoletta-tavella.png"?>" alt="by nicoletta tavella"/></a>
		</div>
	</div>	
</div>
<div class="menu-container">
	<div class="lang-switcher">
		<?php echo Modules::run('language/getLangSwitcher', $lang); ?>	
	</div>
	<div class="top-menu">
		<?php echo Modules::run('navigation/getNavigation', $lang); ?>
	</div>
	<div class="clearer"></div>
</div>