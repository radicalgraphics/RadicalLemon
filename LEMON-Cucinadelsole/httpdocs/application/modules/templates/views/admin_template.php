<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<?php $this->load->view('admin/head'); ?>
</head>
<body class="<?php echo ($this->uri->segment(1) == false ? $class="admin" : $class=$this->uri->segment(1)) ?>">
	<div id="overlay" class="overlay"></div>
	<div id="overlay-content" class="overlay-content"></div>
	<div class="wrapper">
		<?php echo Modules::run('message/admin_message/getMessage'); ?>
		<div class="header"></div>
		<div class="content">
			<?php echo Modules::run($module."/admin_".$module."/".$method); ?>
		</div>
		<div class="footer">
			<div class="powered-ls">
				<a href="http://www.lemonshuttle.com" target="_blank"><img src="<?php echo base_url()."skin/site/images/powered_by_lemon_shuttle.png"?>" alt="powered by Lemon Shuttle"/></a>
			</div>
		</div>
	</div>	
</body>
</html>