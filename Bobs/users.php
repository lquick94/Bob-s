<?php
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
	
?>