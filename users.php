<?php

	
	// Returns a connection to the database.
	function connection() {
		$con = mysqli_connect('localhost', 'root', 'root','bobsburgers') or die('error');
		return $con;
	}
	
	// Sends email to recover forgotten user information.
	function recover($mode, $email) {
		$mode = sanitize($mode);
		$email = sanitize($email);
		$user_data = user_data(user_id_from_email($email), 'user_id' ,'first_name', 'email');
		
		if ($mode == 'email') {
			send_email($email, 'Your Username', "Hello " . $user_data['first_name'] . ", \n\nYour email is:". $user_data['email'] ." \n\n-Bob's Burgers, Pasta, and Pizza");
		}
		else if ($mode == 'password') {
			$generated_password = password_hash(rand(999, 999999), PASSWORD_DEFAULT, ['cost => 12']);
			//echo $generated_password;
			change_password($user_data['user_id'], $generated_password);
			update_user($user_data['user_id'], array('password_recover' => '1'));
			send_email($email, 'Your password recovery', "Hello " . $user_data['first_name'] . ", \n\nYour new password is:\n\n". $generated_password ." \n\n-Bob's Burgers, Pasta, and Pizza");

		}
	}
	
	function is_admin($user_id) {
		$query = mysqli_fetch_array(mysqli_query(connection(), "SELECT admin from users where User_id = $user_id"));
		if ($query[0] == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	// Return the user_id from a given email.
	function user_id_from_email($email) {
		$email = sanitize($email);
		return mysqli_fetch_array(mysqli_query(connection(), "select User_Id from users where email = '$email'"));
	}
	
	// Activates the users account and returns true if a user's account is activated. 
	function activate($email, $email_code) {
		$email = mysqli_real_escape_string(connection(), $email);
		$email_code = mysqli_real_escape_string(connection(), $email_code);
		$query = mysqli_fetch_array(mysqli_query(connection(), "select count(user_id) from users where email = '$email' and email_code = '$email_code' and active = 0"));
		if ($query[0] == 1) {
			mysqli_query(connection(), "update users set active = 1 where email = '$email'");
			return true;
		}
		else {
			return false;
		}
	}

	// Changes the user's password in the database.
	function change_password($user_id, $password) {
		$user_id = (int)$user_id;
		$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
		mysqli_query(connection(), "update users set password = '$password', password_recover = 0 where user_id = $user_id");
	}
	
	// Changes the user's password in the database.
	function change_email($user_id, $email) {
		$user_id = (int)$user_id;
		mysqli_query(connection(), "update users set email = '$email' where user_id = $user_id");
	}

	// Registers the user by inputting the user's information into the database.
	function register_user($register_data) {
		array_walk($register_data, 'array_sanitize');
		$register_data['password'] = password_hash($register_data['password'], PASSWORD_DEFAULT, ['cost => 12']);
		$fields = '`'. implode('`, `', array_keys($register_data)).'`';
		$data = '\'' . implode('\', \'', $register_data) . '\'';
		mysqli_query(connection(), "insert into users ($fields) values ($data)");
		send_email($register_data['email'], 'Activate your account', "Hello ".$register_data['first_name'] .",\n\nYou need to activate your account, so use the link below:\n\nhttp://74.192.1.233:721/activate.php?email=".$register_data['email']."&email_code=".$register_data['email_code']."\n\n-Bob's Burger");
	}

	// Counts how many users are active in the database.
	function user_count() {
		return mysqli_fetch_array(mysqli_query(connection(), "select count('user_id') from users where active = 1"));
	}

	// Returns an array with the user's information.
	function user_data($user_id) {
		$data = array();
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		
		if ($func_num_args > 1) {
			unset($func_get_args[0]);
			$fields = '`'.implode('`, `', $func_get_args). '`';
			$data= mysqli_fetch_assoc(mysqli_query(connection(), "select $fields from users where User_Id = '$user_id[0]'"));
			return $data;
		}
	}

	// Returns true if a user is already logged in.
	function logged_in() {
		return (isset($_SESSION['user_id'])) ? true : false;
	}
	
	// Returns false if a user does not exist in the database, and true if a user exists in the database.
	function user_exists ($email) {
		$email = sanitize($email);
		$query = mysqli_fetch_array(mysqli_query(connection(), "SELECT count('User_Id') from users where email = '$email'"));
		if ($query[0] == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	//Return true if a user's account is already activated, and false if not.
	function user_active($email) {
		$email = sanitize($email);
		$query = mysqli_fetch_array(mysqli_query(connection(), "SELECT count('User_Id') from users where email = '$email' and active = 1"));
		if ($query[0] == 1) {
			return true;
		}
		else {
			return false;
		}
	}
	
	
	// Returns 0 if password and email match with entered password and email from a user trying to login.
	function login ($email, $password) {
		$user_id = user_id_from_email($email);
		$email = sanitize($email);		
		$sql= "select password from users where email = '$email' and User_id = $user_id[0] limit 1";
		$result = mysqli_query(connection(), $sql);
		$row = mysqli_fetch_array($result);
		if (password_verify($password, $row[0])) {
			return 1;
		}
		return 0;	
	}
	
	// Returns the users first name
	function firstName ($email) {
		$firstName = sanitize($email);
		$result = mysqli_query(connection(), "select first_name from users where email = '$email'");
		return mysqli_fetch_array($result);
	}
	
	// Return true if a given email already exists in the database.
	function email_exists ($email) {
		$email = sanitize($email);
		$query = mysqli_fetch_array(mysqli_query(connection(), "SELECT count('User_Id') from users where email = '$email'"));
		if ($query[0] >= 1) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function update_user($user_id, $update_data) {
		$update = array();
		array_walk($update_data, 'array_sanitize');
		foreach ($update_data as $fields=>$data) {
			$update[] = '`' . $fields . '` = \'' . $data . '\'';
		}
		
		mysqli_query(connection(), "update users set " . implode(', ', $update). " where User_id = $user_id"); 
	}
?>