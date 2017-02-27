<?php 
	include 'init.php';
	include 'overallHeader.php';
?>
<div class = "contact">

<?php 
if (empty($_POST) == false) {
		$require_fields = array('first_name', 'email', 'subject', 'message');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $require_fields) == true) {
				$errors[] = '*PLEASE FILL OUT ALL INPUT FIELDS';
				break 1;
			}
		}
	}	
?>


	<h2>Contact Us</h2>
<?php
	if (isset($_GET['success']) && empty ($_GET['success'])) {
		echo 'Your message has been sent! Thanks you for sharing your feedback!';
	}
	
	else {
		if(empty($_POST) == false && empty($errors) == true) {
			$subject = $_POST['subject'];
			$to = 'lesliequick94@gmail.com';
			$body = $_POST['message'] . "\n\n From: ". $_POST['email'];
			send_email($to, $subject, $body);
			header('Location: contact.php?success');
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
			<input type="text" name = "first_name" placeholder="First Name" />
			<input type="text" name = "email" placeholder="E-mail Address"/>
			<input type="text" name = "subject" placeholder="Subject"/><br><br>
			<textarea name="message" placeholder = "Please share any comments, questions, or feedback with us!"></textarea>
			<input type = "submit" value = "Send"/>
		</form>
	</div>
	<?php } ?>
</div>
