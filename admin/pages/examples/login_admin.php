<?php


$servername = "localhost";
$username = "root";
$password = "";
$db = "advisemate";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click() 

if(isset($_POST["login"])){

	$username = mysqli_real_escape_string($con, $_POST["user_id"]);
	$password = mysqli_real_escape_string($con, $_POST["pword"]);
	$sql = "SELECT * FROM admin WHERE user_id = '$username' AND password = '$password'";
	
	if(mysqli_query($con, $sql)){
		header('location:../../students.php');
	}else{
		echo "Error" .mysqli_error($connect);
	}
}

?>