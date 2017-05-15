<?php 
	include 'init.php';
	logged_in_redirect();	
	include 'overallHeader.php';

			if (!empty($_POST)) {
				if(!empty($_POST['email']) && !empty($_POST['password'])) {
					$email = $_POST['email'];
					$password = $_POST['password'];

					if (empty($email) || empty($password)) {
							$errors[] = 'You have not entered both a user name and password.';
					} 
					
					else if (!user_exists($email)) {
							$errors[] = 'That user name does not exist. Register with us today!';
					} 
					
					else if (user_active($email) != 1) {
							$errors[] = 'You have not activated your account';
					} 
					
					else {
						$login = login($email, $password);
						$user_id = user_id_from_email($email);
						if ($login == 0) {
							$errors[] = "The email and password combination is incorrect you have ented is incorrect";
						} 
						
						else {
							$_SESSION['user_id'] = $user_id;
							header('Location: index.php');
							exit();
						}
					}
				}
				else if (!empty($_POST['Email']) && !empty($_POST['Password']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])) {
			
					if (empty($errors) == true) {

						// Checks for password length.
						if (strlen($_POST['Password']) <= 6) {
							$errors[] = '*YOUR PASSWORD MUST BE AT LEAST 7 CHARACTERS';
						}
			
						// Checks if passwords match.
						if ($_POST['Password'] != $_POST['passwordagain']) {
							$errors[] = '*YOUR PASSWORDS DO NOT MATCH';
						}

						// Checks if email address already exists.
						if (email_exists($_POST['Email']) == 1) {
							$errors[] = '*SORRY THAT EMAIL ADDRESS IS ALREADY REGISTERED';
						}
					}
				}
			}

			if (isset($_GET['success']) && empty ($_GET['success'])) {
				?><div class = form> <h1 class = "loginHeader"> <?php echo 'You\'ve been registered successfully! Please check your email to activate your account.'; ?> </h1> </div><?php
			}
	
			else {
				if(empty($_POST) == false && empty($errors) == true) {
					$register_data = array(
						'password' 		=> $_POST['Password'],
						'first_name' 	=> $_POST['first_name'],
						'last_name' 	=> $_POST['last_name'],
						'email' 			=> $_POST['Email'],
						'email_code' 	=> md5($_POST['Email'] + microtime()),
					);
				
					register_user($register_data);
					header('Location: login.php?success');
					exit();
				}
			
?>



<head>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1 class = "loginHeader">Sign Up for Free</h1>
          
          <form method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <input placeholder = "First Name" name = "first_name" type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <input placeholder = "Last Name" name = "last_name" type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <input placeholder = "E-mail" name = "Email" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <input placeholder = "Password" name = "Password" type="password"required autocomplete="off"/>
          </div>
					
					<div class="field-wrap">
            <input placeholder = "Re-enter Password" name = "passwordagain" type="password"required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1 class = "loginHeader">Welcome Back!</h1>

          <form method="post">
          
            <div class="field-wrap">
            <input placeholder = "E-mail" name = "email" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <input placeholder = "Password" name = "password" type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="recover.php">Forgot Password?</a></p><br>
          <button class="button button-block"/>Log In</button>
          
          </form>
<?php } ?>
        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

</body>

	

