<div class='row navigation'>
	<div class='logo pull-left'><a href="<?php echo base_url(); ?>">OOP</a></div>
	<ul class="nav nav-pills pull-left">
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Master Data <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("master/master_admin","Master Admin"); ?></li>
                    <li><?php echo anchor("#","Link 2"); ?></li>
					<li><?php echo anchor("#","Link 3"); ?></li>
                    <li><?php echo anchor("#","Link 4"); ?></li>
                    <li><?php echo anchor("#","Link 5"); ?></li>
                    <li><?php echo anchor("#","Link 6"); ?></li>
                    <li><?php echo anchor("#","Link 7"); ?></li>
					<li><?php echo anchor("#","Link 8"); ?></li>
					<li><?php echo anchor("#","Link 9"); ?></li>					
				</ul>
			</a>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Account Monitoring <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("#","Users"); ?></li>
					<li><?php echo anchor("#","Admin"); ?></li>
					<li><?php echo anchor("#","Moderator"); ?></li>
				</ul>
			</a>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Messages <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("#","Reply"); ?></li>
					<li><?php echo anchor("#","Don't Reply"); ?></li>
				</ul>
			</a>
		</li>
		<li class="dropdown"><?php echo anchor("#","File Management"); ?></li>
		<li class="dropdown">

			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Report <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("#","Link 1"); ?></li>
					<li><?php echo anchor("#","Link 2"); ?></li>
					<li><?php echo anchor("#","Link 3"); ?></li>
				</ul>
			</a>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Settings <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("#","Profile"); ?></li>
					<li><?php echo anchor("#","General Settings"); ?></li>
					<li><?php echo anchor("#","System Privilege"); ?></li>
				</ul>
			</a>
		</li>
	</ul>
	<div class='pull-right '><?php 
		$user = $this->session->userdata("user");
		
		
		if(!empty($user))
		{
		?>
		<div class="btn-group">
			<button class="btn dropdown-toggle btn-warning" data-toggle="dropdown">Hi, <?php echo $user['username']; ?> <span class="caret"></span></button>
				<ul class="dropdown-menu">								
					<li><?php echo anchor('configuration/profile','<i class="icon-user"></i>Profile'); ?></li>
					<li><?php echo anchor('users/logout','<i class="icon-remove-sign"></i>Log Out'); ?></li>
				</ul>
		</div>
		<?php
		} else { echo anchor("users/login","Hi Guest, Login","class='btn btn-default'"); }
		?>
	</div>
</div>