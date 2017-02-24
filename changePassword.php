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
				$errors[] = 'YOUR NEW PASSWORDS DO NOT MATCH';
			}
			else if (strlen($_POST['password']) < 7 ) {
				$errors[] = 'YOUR PASSWORD MYST BE AT LEAST 7 CHARACTERS';
			}
		}
		else {
			$errors[] = 'THE CURRENT PASSWORD YOU\'VE ENTERED IS INCORRECT';
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
			
			if(isset($_GET['force']) && empty($_GET['force'])) {
				?>
					<p>You must change your password.</p>
				
				<?php
			}
			
			if(empty($_POST) == false && empty($errors) == true) {
				change_password($user_data['User_id'], $_POST['password']);
				header('Location: changepassword.php?success');
				exit();
			}
	?>
		<div class = errors>
		<?php
		if (empty($errors) == false) {
			 echo output_errors($errors);
		}?>
		</div>
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