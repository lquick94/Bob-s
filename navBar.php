
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>

<nav>
  <div class="row">
    <div class="quarter">
      <a href="index.php">
        <img src="Images/logo.png">
      </a>
    </div>

    <div class="rest">
      <i class="fa fa-bars"></i>
      <div class="text-menu">
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
				<a href="contact.php">Contact Us</a>
				<a href="locate.php">Locate Us</a>
       	<?php 
				if (logged_in() === true) { ?>
					<a href='account.php'>Account</a>
				<?php }
				else { ?>
					<a href='login.php'>Sign In/Sign Up</a>
				<?php } ?>
				
      </div>
    </div>
  </div>
	<script>
    $(document).ready(function() {
    
    console.log('Document ready');

    $('.fa-bars').click(function() {
        $('.text-menu').toggleClass('menu-appear');
    });

    $('nav .text-menu a').click(function() {
        $('.text-menu').toggleClass('menu-appear');
    });
    
});
  </script>
</nav>