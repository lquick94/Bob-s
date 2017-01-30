<?php
	include 'init.php';
	protect_page();
	include 'overallHeader.php';
	include 'loggedin.php';
?>
<div class = "register">
<?php
	
	if(empty($_POST) == false) {
		$require_fields = array('first_name', 'last_name', 'email');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $require_fields) == true) {
				$errors[] = '*PLEASE FILL OUT ALL INPUT FIELDS';
				break 1;
			}
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

<h1>Settings</h1>

<?php
	if (isset($_GET['success']) && empty ($_GET['success'])) {
			echo 'You\'re information has successfully been updated!';
	}
	
	else {
		if(empty($_POST) == false && empty($errors) == true) {
		$update_data = array(
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'email' => $_POST['email'],
			);
			header('Location: settings.php?success');
			update_user($update_data);			
			exit();
		}

		else if (empty($errors) == false) {
			echo output_errors($errors);
		}
?>
 
	<div class = "form">
	<form action = "" method = "post">
		<input type = 'text' name="first_name" placeholder="First Name" value=<?php echo $user_data['first_name'];?>>
		<input type = 'text' name="last_name" placeholder="Last Name" value=<?php echo $user_data['last_name'];?>>
		<input type = 'text' name="email" placeholder="EMail" value=<?php echo $user_data['email'];?>>
		<input type ="submit" value="Update"/>
	</form>
	</div>
	<?php } ?>
</div>
	