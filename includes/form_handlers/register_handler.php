<?php 
//declaring variables to prevent errors
$fname = "";//first name
$lname = "";//last name
$em  = "";//email
$em2 = "";//email2
$password = "";//password
$password2 = "";//password2
$date = "";//sing up date
$error_array= array();//holds error messages

if (isset($_POST['register_button'])) {
	
	//registration form values

	//Fisrt name
	$fname = strip_tags($_POST['reg_fname']);//remove html tags 
	$fname = str_replace(' ', '', $fname);//remove spaces
	$fname = ucfirst(strtolower($fname));//Uppercase first letter
	$_SESSION['reg_fname'] = $fname;//stores first name into session variable

// last name
	$lname = strip_tags($_POST['reg_lname']);
	$lname = str_replace(' ', '', $lname);
	$lname = ucfirst(strtolower($fname));
	$_SESSION['reg_lname'] = $lname;//stores last name into session variable

//Email
	$em = strip_tags($_POST['reg_email']);//remove html tags 
	$em = str_replace(' ', '', $em);//remove spaces
	$em = ucfirst(strtolower($em));//Uppercase first letter
	$_SESSION['reg_email'] = $em;//stores email into session variable


//Email2
	$em2 = strip_tags($_POST['reg_email2']);//remove html tags 
	$em2 = str_replace(' ', '', $em2);//remove spaces
	$em2 = ucfirst(strtolower($em2));//Uppercase first letter
	$_SESSION['reg_email2'] = $em2;//stores first name into session variable

//Password
	$password = strip_tags($_POST['reg_password']);//remove html tags 
	$password2 = strip_tags($_POST['reg_password2']);//remove html tags 

	$date = date("Y-m-d");//curent date


		if ($em == $em2) {
			//check if email is in valid format
			if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
				$em = filter_var($em, FILTER_VALIDATE_EMAIL);

				//check if email exist
				$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

				//count the number of rows 
				$num_rows = mysqli_num_rows($e_check);

				if ($num_rows > 0) {
					array_push($error_array, "Email already in use<br>");
				}

}
			
			else{
				array_push($error_array, "invalid email format<br>");
			}
		}

		else{
			array_push($error_array, "Emails don't match<br>");
		}

		if (strlen($fname) > 25 || strlen($fname) < 2){
			array_push($error_array, "first name must be between 2 and 25 characteres<br>");
		
		}

		if (strlen($lname) > 25 || strlen($lname) < 2){
			array_push($error_array, "last name must be between 2 and 25 characteres<br>");
		
		}

		if ($password != $password2){
			array_push($error_array, "your Passwords do not match<br>");
		
		}
		/*else{
			if (preg_match('/[A-Za-z0-9]/',$password)) {
				echo "your password can only contain english letters";
			}
		}*/
		if (strlen($password) > 30 || strlen($password) < 5) {
			array_push($error_array, "your password must be between 5 and 30<br>");
		}

		if (empty($error_array)) {
			$password = md5($password);//Encrypt password before sinding to database

			//Generate username by concatenating first name and last name
			$username = strtolower($fname . "_" . $lname);
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
			$i = 0;
			while (mysqli_num_rows($check_username_query) != 0) {
					$i++;//add 1 to i
					$username = $username . "_" . $i;
					$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
				}	

				//profile picture assignment
					$rand = rand(1, 2,);//random number between  and 2

					if ($rand == 1) {
										$profile_pic = "assets/images/profile_pics/head_deep_blue.png";

					}
					else if ($rand == 2) {
										$profile_pic = "assets/images/profile_pics/head_sun_flower.png";

					}
					
			$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

			array_push($error_array, "<span style='color:blue;'>you're all set! go ahead and login!</span><br>");		

			$_SESSION['reg_fname'] = "";
			$_SESSION['reg_lname'] = "";
			$_SESSION['reg_email'] = "";
			$_SESSION['reg_email2'] = "";

		} 

}


 ?>