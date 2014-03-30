<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<?php $this->load->view('page/head', $head); ?>
</head>
<body class="<?php echo $main_class;?>">
	<div id="overlay" class="overlay"></div>
	<div class="wrapper">
			<div class="header" id="header">
					<?php $this->load->view('page/header', $lang); ?>
			</div>
			<div class="content" id="content">
					<?php echo Modules::run($module, $id_page); ?>
			</div>
			<div class="footer" id="footer">
					<?php $this->load->view('page/footer'); ?>
			</div>
	</div>	
</body>
</html>