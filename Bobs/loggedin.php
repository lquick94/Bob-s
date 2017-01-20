<?php
	include 'init.php';
		if (!empty($_POST)) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if (empty($username) || empty($password)) {
					$errors[] = 'Please enter a user name and password.';
			} else if (!user_exists($username)) {
					$errors[] = 'Username does not exist. Register with us today!';
			} else if (user_active($username) != 1) {
					$errors[] = 'You have not activated your account';
			} else {
					$login = login($username, $password);
					$user_id = user_id_from_username($username);
					if ($login == 0) {
						$errors[] = "That username/password combination is incorrect";
					} else {
						echo 'ok';
					}
			}
		
		print_r($errors);
	}
?>