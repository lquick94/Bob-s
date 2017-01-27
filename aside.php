
<?php
	include 'hours.php';
	include 'orderOnline.php';
	if (logged_in() === true) {
		?><div class = 'login'>
		<?php
		include 'loggedin.php';?>
		</div><?php
	}
	
	else {
		include 'login_wid.php';
	}
?>