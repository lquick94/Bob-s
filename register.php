<?php 
	include 'init.php';
	include 'overallHeader.php';
	include 'login_wid.php';
?>
<div class = "register">
<?php	
	if (empty($_POST) == false) {
		$require_fields = array('first_Name', 'last_Name', 'email', 'username', 'password', 'passwordAgain');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $require_fields) == true) {
				$errors[] = '*PLEASE FILL OUT ALL INPUT FIELDS';
				break 1;
			}
			
		}
		
		if (empty($errors) == true) {
			// Makes sure username doesn't already exist.
			if(user_exists($_POST['username']) == 1) {
				$errors[] = '*SORRY, THE USERNAME \'' .htmlentities($_POST['username']). '\' IS ALREADY TAKE';
			}
			
			// Checks if there are spaces in the username.
			if (preg_match("/\\s/", $_POST['username']) == true) {
				$errors[] = '*YOUR USERNAME MUST NOT CONTAIN SPACES';
			}
			
			// Checks for password length.
			if (strlen($_POST['password']) <= 6) {
				$errors[] = '*YOUR PASSWORD MUST BE AT LEAST 6 CHARACTERS';
			}
			
			// Checks if passwords match.
			if ($_POST['password'] != $_POST['passwordAgain']) {
				$errors[] = '*YOUR PASSWORDS DO NOT MATCH';
			}
			
			// Checks if EMAIL is written corretly.
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL == false)) {
				$errors = 'A valid email address is required';
			}
			
			// Checks if email address already exists.
			if (email_exists($_POST['email']) == true) {
				$errors = '*SORRY THAT EMAIL ADDRESS IS ALREADY REGISTERED';
			}
		
		}
	}	
?>


	<h2>Register</h2>
	<?php
		if(empty($_POST) == true && empty($errors) == true) {
			//regiest user;
		}
		else {
			echo output_errors($errors);
		}
	?>
	<div class = 'form'>
		<form action="" method="post">
			<input type="text" name = "first_Name" placeholder="First Name" />
			<input type="text" name = "last_Name" placeholder="Last Name"/>
			<input type="text" name = "email" placeholder="E-mail Address"/>
			<input type="text" name = "username" placeholder="Username"/>
			<input type="password" name = "password" placeholder="Password"/>
			<input type = "password" name = "passwordAgain" placeholder="Repeat Password"/>
			<input type="submit" value="Register" oninvalid="alert('You must fill out the form!');">
		</form>
	</div>
</div>