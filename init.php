<?php
session_start();
//error_reporting(0);

require 'users.php';
require 'general.php';
$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);

if (logged_in() == true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'User_id', 'username', 'password', 'first_name', 'last_name', 'email','admin','password_recover');
	if (user_active($user_data['email']) == false) {
		session_destroy();
		header('Location: index.php');
		exit();
	}
	if ($current_file !== 'changepassword.php' && $current_file !== 'logout.php' && $user_data['password_recover'] == 1) {
		header('location: changepassword.php?force');
		exit();
	}
}

$errors = array();
?>