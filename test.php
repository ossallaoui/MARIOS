<?php
$con = mysqli_connect("localhost", "root", "", "social");//connection variable
if (mysqli_connect_errno()) {
	echo "failed to connect" .mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES ('1','ossama'),('2','MARIA')");

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
hello ossama !!
</body>
</html>