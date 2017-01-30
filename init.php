<?php
session_start();
error_reporting(0);

require 'connect.php';
require 'users.php';
require 'general.php';

if (logged_in() == true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'User_id', 'username', 'password', 'first_name', 'last_name', 'email','admin');

	if (user_active($user_data['username']) == false) {
		session_destroy();
		header('Location: index.php');
		exit();
	}
}

$errors = array();
?>