<?php 
	include 'init.php';
	include 'overallHeader.php';
?>

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
<head>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>

<body>
  <div class="form">
        <div id="login">   
          <h1 class = "loginHeader">Contact Us!</h1>

          <form method="post">
          
            <div class="field-wrap">
            <input placeholder = "E-mail" name = "email" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <input placeholder = "Subject" name = "subject" type="text"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <input placeholder = "Please share any comments, concerns, questions, or feedback with us!" name = "message" type="textarea"required autocomplete="off"/>
          </div>
          <button class="button button-block"/>SEND</button>
          
          </form>
<?php } ?>
        </div>
      
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

</body>

