<!DOCTYPE HTML>
<html>
<title><?php echo $tittle ?></title>

<head>
		<?php

			echo "<script src='".base_url()."common/js/jquery-1.11.1.min.js'></script>";
			echo "<script src='".base_url()."common/js/jquery.ui.js'></script>";
			echo "<script src='".base_url()."common/js/jquery.dataTables.js'></script>";
			echo "<script src='".base_url()."common/js/bootstrap.js'></script>";
			echo "<script src='".base_url()."common/js/chosen.jquery.js'></script>";
			
			echo link_tag(base_url().'common/css/bootstrap.css');
			echo link_tag(base_url().'common/css/bootstrap-theme.css');
			echo link_tag(base_url().'common/css/jquery.dataTables.css');
			echo link_tag(base_url().'common/css/template.css');
			echo link_tag(base_url().'common/css/chosen.css');
			echo link_tag(base_url().'common/css/jquery-ui.css');
			
			echo "<script src='".base_url()."common/js/ics.js'></script>";
			
		?>
</head>
<body>
		<div class="header">
			<div class="container">
			<?php echo $this->load->view('include/navigation'); ?>
			</div>
		</div>

		<div class="boxDashboard">
			<div class="container">
			<?php echo (!empty($view) ? $this->load->view($view) : ""); ?>
			</div>
		</div>
</body>
</html>