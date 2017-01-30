<?php
	include 'init.php';
	protect_page();
	
	if (empty($_POST) == false) {
		$required_fields = array('currentPassword', 'password', 'passwordAgain');
		foreach ($_POST as $key=>$value) {
			if (empty($value) && in_array($key, $required_fields) == true) {
				$errors[] = 'Please fill out all input fields';
				break 1;
			}
		}
		
		if (md5($_POST['currentPassword']) == $user_data['password']) {
			if (trim($_POST['password']) != trim($_POST['passwordAgain'])){
				$errors[] = 'Your new passwords do not match';
			}
			else if (strlen($_POST['password']) < 7 ) {
				$errors[] = 'Your password must be at least 7 characters';
			}
		}
		else {
			$errors[] = 'The current password you\'ve entered is incorrect';
		}
	}
	
	include 'overallHeader.php';
	include 'loggedin.php';
?>
<div class = 'register'>
<h1>Change Password</h1>
<?php
		if (isset($_GET['success']) && empty($_GET['success'])) {
			echo 'You\'re password has been changed successfully!';
		}
		else {
		
			if(empty($_POST) == false && empty($errors) == true) {
				change_password($session_user_id, $_POST['password']);
				header('Location: changepassword.php?success');
				exit();
			}
			else if (empty($errors) == false) {
				echo output_errors($errors);
			}
	?>
<div class = 'form'>
		<form action="" method="post">
			<input type="password" name = "currentPassword" placeholder="Current Password" />
			<input type="password" name = "password" placeholder="New Password"/>
			<input type="password" name = "passwordAgain" placeholder="Repeat New Password"/>
			<input type="submit" name = "Submit" value = "Submit"/>
		</form>
	</div>
</div>
		<?php }?>