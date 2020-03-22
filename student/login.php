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
if(isset($_POST["username"]) && isset($_POST["password"])){
	$username = mysqli_real_escape_string($con, $_POST["username"]);
	$password = mysqli_real_escape_string($con, $_POST["password"]);
	$sql = "SELECT * FROM students WHERE student_id = '$username' AND pword = '$password'";
	$row = mysqli_query($con,$sql);
	$count = mysqli_num_rows($row);
	//if user record is available in database then $count will be equal to 1
	if($count == 1){
		$run_query = mysqli_fetch_array($row);
		$_SESSION["uid"] = $run_query["student_id"];
		$_SESSION["name"] = $run_query["fname"];
			//if user is login from page we will send login_success
			header("location:index.php");
			exit();
		}else{
			echo "<span style='color:red;'>Please register before login..!</span>";
			exit();
		}
}

?>