<?php
	function user_data($user_id) {
		$data = array();
		$user_id = (int)$user_id;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		
		if ($func_num_args > 1) {
			unset($func_get_args[0]);
			
			$fields = '`'.implode('`, `', $func_get_args). '`';
			$data= mysql_fetch_assoc(mysql_query("select $fields from users where User_Id = '$user_id'"));
			return $data;
		}
		
	}

	function logged_in() {
		return (isset($_SESSION['user_id'])) ? true : false;
	}
	
	function user_exists ($username) {
		$username = sanitize($username);
		$query = mysql_query("SELECT count('User_Id') from users where username = '$username'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	function user_active ($username) {
		$username = sanitize($username);
		$query = mysql_query("SELECT count('User_Id') from users where username = '$username' and active = 1");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	function user_id_from_username($username) {
		$username = sanitize($username);
		return mysql_result(mysql_query("select User_Id from users where username = '$username'"), 0, 'user_id');
	}
	
	function login ($username, $password) {
		$user_id = user_id_from_username($username);
		$username = sanitize($username);
		$password = md5($password);		
		$sql= "select password from users where password = '$password' and username = '$username' limit 1";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if ($row[0] == $password) {
			return 1;
		}
		return 0;	
	}
	
	function firstName ($username)
	{
		$firstName = sanitize($username);
		$result = mysql_query("select first_name from users where username = '$username'");
		return mysql_fetch_array($result);
	}
	
?>