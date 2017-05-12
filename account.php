<?php
	include "init.php";
	include "overallHeader.php"
?>
<div class = "login">
	<h2>Hello, <?php echo $user_data['first_name'];?>!</h2>
	<ul>
		<li>
			<a href = 'changepassword.php'>Change Password</a>
		</li>
		<li>
			<a href = 'changeEmail.php'>Change Email</a>
		</li>
		<li>
			<a href = 'changeEmail.php'>Order History</a>
		</li>
		<li>
			<a href = 'changeEmail.php'>Cart</a>
		</li>
		<?php 
			if (is_admin($user_data['User_id'])) { ?>
				<li>
					<a href = 'accountHome.php'>Account Page</a>
				</li>
			<?php } ?>
		
	</ul>
	<div id = "logout">
		<br><a href="logout.php">
		<button class = "logout" style="vertical-align:middle"><span>Log Out</span></button></a>
	</div>
</div>