<?php
	include 'init.php';
	logged_in_redirect();
		if (!empty($_POST)) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			if (empty($username) || empty($password)) {
					$errors[] = 'You have not entered both a user name and password.';
			} else if (!user_exists($username)) {
					$errors[] = 'That user name does not exist. Register with us today!';
			} else if (user_active($username) != 1) {
					$errors[] = 'You have not activated your account';
			} else {
					$login = login($username, $password);
					$user_id = user_id_from_username($username);
					if ($login == 0) {
						$errors[] = "The username and password combination is incorrect you have ented is incorrect";
					} else {
						$_SESSION['user_id'] = $user_id;
						header('Location: index.php');
						exit();
					}
			}
	}
	else {
		$errors[] = "No data recieved.";
	}
	
		include 'overallHeader.php';
		include 'login_wid.php';
		if (empty($errors) == false) {
			
?>
<div class = "register">
<h2>We tried to log you in but...</h2>

<?php	echo output_errors($errors);}?>
</div>

