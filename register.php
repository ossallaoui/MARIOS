<?php 
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php'
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 				<title>Welcome to MariOss</title>
 				<link rel="stylesheet" type="text/css" href="assets/css/register_style2.css">
 				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 				<script src="assets/js/register.js"></script>
 </head>
 <body>

		<?php 
			if (isset($_POST['register_button'])) {
				echo '
				<script>
					$(document).ready(function() {
							$("#first").hide();
							$("#second").show();

						})

				</script>

				';
			}


		 ?>




 		<div class="wrapper">
 			<div class="login_box">
 				<div class="login_header">
 					<h1>Concert!</h1>
 					Login or sing up below!
 				</div>
 	 	  <div id="first">
 	 	  	
			 	 	  	<form action="register.php" method="POST">
							<input type="email" name="log_email" placeholder="Email Adresse" value="<?php 
					 	  	if(isset($_SESSION['log_email'])) {
					 	  		echo $_SESSION['log_email'];
					 	  		}
					 	  		?>" required> 
					 	  		<br>
									<input type="password" name="log_password" placeholder="Password" required></br>
							   		<input type="submit" name="login_button" value="Login"><br>
					 	 	  		<?php if(in_array("Email or Password was incorrect<br>", $error_array)) echo "Email or Password was incorrect<br>"; ?><br>
			 	 	  				<a href="#" id="singup" >Need an account? Register here!</a>
			 	 	  </form>

 	 	  </div>  

 	 	<div id="second">

			 	  <form action="register.php" method="POST">
			 	  	<input type="text" name="reg_fname" placeholder="First Name" value="<?php 
			 	  	if (isset($_SESSION['reg_fname'])) {
			 	  		echo $_SESSION['reg_fname'];
			 	  	}
			 	  	?>"  required></br>

			 	  	<?php if (in_array("first name must be between 2 and 25 characteres<br>", $error_array)) echo "first name must be between 2 and 25 characteres<br>"; ?>
			 	  	<input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
			 	  	if (isset($_SESSION['reg_lname'])) {
			 	  		echo $_SESSION['reg_lname'];
			 	  	}
			 	  	?>"
			 	  	required>
			 	  	<br/>
			 	  	 <?php if (in_array("last name must be between 2 and 25 characteres<br>", $error_array)) echo "last name must be between 2 and 25 characteres<br>"; ?>
					<input type="email" name="reg_email" placeholder="Email" value="<?php 
			 	  	if (isset($_SESSION['reg_email'])) {
			 	  		echo $_SESSION['reg_email'];
			 	  	}
			 	  	?>"
			 	  	required></br>
			 	  	<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
			 	  	if (isset($_SESSION['reg_email2'])) {
			 	  		echo $_SESSION['reg_email2'];
			 	  	}
			 	  	?>"
			 	  	 required>
			 	  	<br/>
			 	  	<?php if (in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; 
						else if (in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
				        else   if (in_array("invalid email format<br>", $error_array)) echo "invalid email format<br>"; ?>

					<input type="password" name="reg_password" placeholder="Password" required></br>
			 	  	<?php if (in_array("your password must be between 5 and 30<br>", $error_array)) echo "your password must be between 5 and 30<br>"; ?>

			 	  	<input type="password" name="reg_password2" placeholder="Confirm Password" required>
			 	  	<br/>
			 	  	<?php if (in_array("your Passwords do not match<br>", $error_array)) echo "your Passwords do not match<br>"; ?>


			 	  		<input type="submit" name="register_button" value="Register">
						<br>	
			 	  		<?php if (in_array("<span style='color:blue;'>you're all set! go ahead and login!</span><br>", $error_array)) echo "<span style='color:blue;'>you're all set! go ahead and login!</span><br>"; ?>
							<br>
			 	  		<a href="#" id="singin" >Already have an account? Sign in here!</a>



 	  			</form>
			</div>
		</div>
	</div>
 </body>
 </html>