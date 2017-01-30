<div class = "login">
	<h2>Hello, <?php echo $user_data['first_name'];?>!</h2>
	<ul>
		<li>
			<a href = 'changepassword.php'>Change Password</a>
		</li>
		<li>
			<a href = 'settings.php'>Settings</a>
		</li>
		
	</ul>
	<div id = "logout">
		<br><a href="logout.php">
		<button class = "logout" style="vertical-align:middle"><span>Log Out</span></button></a>
	</div>
</div>