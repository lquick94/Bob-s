
<div class = "login">
	<h2>Users</h2>
	<?php
	// Counts the number of active users and prints it.
	$user_count = user_count();
	$suffix = ($user_count != 1) ? 's' : '';
	?>
	<p>We currently have <?php echo $user_count[0]?> registered user<?php echo $suffix?>.
</div>