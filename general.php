<?php
	
	// fucntion that sends out emails
	function send_email($to, $subject, $body) {
		mail($to, $subject, $body, 'From: Hello@BobsBurgers.com');
	}

	// Redirects users to index page when used if they are already logged in.
	function logged_in_redirect() {
		if (logged_in() == true) {
			header('Location: index.php');
			exit();
		}
	}
	
	// Redirects users to index page if they are not logged in.
	function protect_page() {
		if (logged_in() == false) {
			header('Location: index.php');
			exit();
		}
	}
	
	// Escapes special characters in a string
	function sanitize($data) {
		return mysqli_real_escape_string(connection(), $data);
	}
	
	function array_sanitize(&$item) {
		$item = mysqli_real_escape_string(connection(), $item);
	}
	
	// Puts an array into a list form.
	function output_errors($errors){
		return'<ul><li>'. implode('</li><li>', $errors) . '</li></ul>';
	}
?>