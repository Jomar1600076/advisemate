<?php
session_start();

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
if(isset($_POST["sAdminUname"]) && isset($_POST["sAdminPword"])){
	$username = mysqli_real_escape_string($con, $_POST["sAdminUname"]);
	$password = mysqli_real_escape_string($con, $_POST["sAdminPword"]);
	$sql = "SELECT * FROM super_admin WHERE uName = '$username' AND pWord = '$password'";
	$row = mysqli_query($con,$sql);
	$count = mysqli_num_rows($row);
	//if user record is available in database then $count will be equal to 1
	if($count == 1){
		$run_query = mysqli_fetch_array($row);
		$_SESSION["sAdmin_id"] = $run_query["user-id"];
		$_SESSION["sAdmin_name"] = $run_query["fName"];
			//if user is login from page we will send login_success
			header("location:index.php");
			exit();
		}else{
			echo "<span style='color:red;'>Please register before login..!</span>";
			exit();
		}
}

?>