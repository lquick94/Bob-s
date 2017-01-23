
<?php
	include 'hours.php';
	if (logged_in() === true) {
		?><div class = 'login'>
		<?php
		echo 'Logged in';?>
		</div><?php
	}
	
	else {
		include 'login_wid.php';
	}
?>