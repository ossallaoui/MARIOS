<?php  
require 'config/config.php';


if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to MariOss</title>

	<!--- Javascript --->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
	</script>
	<script src="assets/js/bootstrap.js"></script>
	
	<!--- CSS --->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

	<div class="top_bar">
		<div class="logo">
			<a href="index.php">MariOss!</a>
		</div>

		<nav>			
			 
			<a href="<?php echo $userLoggedIn; ?>">
				<?php echo $user['first_name']; ?>	
			</a>
			<a href="#">
				<i class="fa fa-home fa-lg"></i>	
			</a>
			<a href="#">
				<i class="fas fa-comments"></i>
			</a>
			<a href="#">
				<i class="fas fa-bell"></i>
			</a>
			<a href="#">
				<i class="fas fa-user-friends"></i>

			</a>
			<a href="#">
				<i class="fas fa-cog"></i>

			</a>
			<a href="includes/handlers/logout.php">
				<i class="fas fa-sign-out-alt"></i>

			</a>
			

			

		</nav>
	</div>

	<div class="wrapper">

