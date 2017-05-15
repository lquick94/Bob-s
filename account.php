<?php
	include "init.php";
	include "overallHeader.php"
?>
<div class = "form">
	<h1 class = "loginHeader">Hello, <?php echo $user_data['first_name'];?>!</h1>
	<ul>
		<li class = "forgot">
			<p class = "forgot"><a href = 'changepassword.php'>Change Password</a></p>
		</li><br>
		<li class = "forgot">
			<p class = "forgot"><a href = 'changeEmail.php'>Change Email</a></p>
		</li><br>
		<li class = "forgot">
			<a href = 'changeEmail.php'>Order History</a>
		</li><br>
		<li class = "forgot">
			<a href = 'changeEmail.php'>Cart</a>
		</li><br>
		<?php 
			if (is_admin($user_data['User_id'])) { ?>
				<li class = "forgot">
					<a href = 'admin/index.php'>Admin Page</a>
				</li><br>
			<?php } ?>
		
	</ul>
	<div id = "logout">
		<br><a href="logout.php">
		<button class = "logout" style="vertical-align:middle"><span>Log Out</span></button></a>
	</div>
</div>