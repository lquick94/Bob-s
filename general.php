<?php
	function send_email($to, $subject, $body) {
		mail($to, $subject, $body, 'From: Hello@BobsBurgers.com');
	}

	function logged_in_redirect() {
		if (logged_in() == true) {
			header('Location: index.php');
			exit();
		}
	}
	
	function protect_page() {
		if (logged_in() == false) {
			header('Location: index.php');
			exit();
		}
	}
	
	function sanitize($data) {
		return mysql_real_escape_string($data);
	}
	
	function array_sanitize(&$item) {
		$item = mysql_real_escape_string($item);
	}
	
	function output_errors($errors){
		return'<ul><li>'. implode('</li><li>', $errors) . '</li></ul>';
	}
?>