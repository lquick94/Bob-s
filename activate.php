<?php
	include 'init.php';
	logged_in_redirect();
	include 'overallHeader.php';


	if (isset($_GET['success']) && empty($_GET['success'])) {
		include 'login_wid.php';?>
		<div class = register>
		<?php
		echo "Thanks, we've activate your account. You're free to log in.";
		
	}	
	
	else if(isset($_GET['email'], $_GET['email_code']) == true){
		$email = trim($_GET['email']);
		$email_code = trim($_GET['email_code']);
		
		if(email_exists($email) == false) {
			$errors[] = 'Oops, something went wrong, and we couldn\'t find that email address!';
		}
		
		else if (activate($email, $email_code) == false) {
			$errors[] = 'We had problems activating your account';
		}
		
		if(empty($errors) == false) {
			echo "Oops..."; echo output_errors($errors);
		}
		else {
			header('Location: activate.php?success');
			exit();
		}
	}
	
	else {
		header('Location: index.php');
		exit();
	}
	
?>
</div>