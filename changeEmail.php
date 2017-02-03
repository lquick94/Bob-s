<?php
	include 'init.php';
	protect_page();
	include 'overallHeader.php';
	include 'loggedin.php';
?>
<div class = "register">
<?php
	
	if(empty($_POST) == false) {
		$require_fields = array('password', 'new_email', 'email');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $require_fields) == true) {
				$errors[] = '*PLEASE FILL OUT ALL INPUT FIELDS';
				break 1;
			}
		}
		
		if (md5($_POST['password']) != $user_data['password'] && strlen($_POST['password']) > 1) {
			$errors[] = 'Password you entered is incorrect';
		}

		if ($_POST['email'] != $_POST['new_email']) {
			$errors[] = 'THE EMAILS YOU HAVE ENTERED DO NOT MATCH';
		}
		
		if(empty($errors) == true) {
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
				$errors[] = 'A valid email address is required';
			}
			else if (email_exists($_POST['email']) == true && $user_data['email'] != $_POST['email']) {
				$errors[] = 'Sorry, the email \''.$_POST['email'].'\' is already in use';
			}
		}
	}
?>

<h1>Change Email</h1>

<?php
	if (isset($_GET['success']) && empty ($_GET['success'])) {
			echo 'You\'re information has successfully been updated!';
	}
	
	else {
		if(empty($_POST) == false && empty($errors) == true) {
			change_email($user_data['User_id'], $_POST['new_email']);
			header('Location: changeEmail.php?success');
						
			exit();
		}
?>
		<div class = errors>
		<?php
		if (empty($errors) == false) {
			 echo output_errors($errors);
		}?>
		</div>
 
	<div class = "form">
	<form action = "" method = "post">
		<input type = 'password' name="password" placeholder="Verify Password">
		<input type = 'text' name="new_email" placeholder="New EMail">
		<input type = 'text' name="email" placeholder="Verify New EMail">
		<input type ="submit" value="Update"/>
	</form>
	</div>
	<?php } ?>
</div>
	