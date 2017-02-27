<?php
	include 'hours.php';
	include 'orderOnline.php';

	if (logged_in() === true) {
		
		include 'loggedin.php';
	}
	
	else {
		include 'login_wid.php';
	}
			include 'slide.php';

	//include 'user_count.php';
?>