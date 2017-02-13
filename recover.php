<?php 
	include 'init.php';
	logged_in_redirect();
	include 'overallHeader.php';

	
?>
<div class = "register">
<h1>Recover</h1>
<?php
if (isset($_GET['success']) == true && empty($_GET['success']) == true) {
?>
	<p>Thanks, we've sent your username to your email address</p>
<?php
}

else {
	$mode_allowed = array('username', 'password');
	if(isset($_GET['mode']) == true && in_array($_GET['mode'], $mode_allowed) == true) {
		if(isset($_POST['email']) == true && empty($_POST['email']) == false) {
			if(email_exists($_POST['email']) == true) {
				recover($_GET['mode'], $_POST['email']);
				header("location: recover.php?success");
			}
			else {
				echo '<p>Oops, we couldn\'t find that email address!</p>';
			}
		}
?>

<form action = "" method ="post">
	<ul>
		<li>Please enter your email address:<br>
		<input type = "text" name = "email"></li>
		<li><input type = "submit" value = "Recover"></li>
	<ul>
</form>

<?php
	}
	else {
		header('location: index.php');
		exit();
	}
}
?>
</div>