<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
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
if(isset($_POST["uChairUname"]) && isset($_POST["uChairPword"])){
	$username = mysqli_real_escape_string($con, $_POST["uChairUname"]);
	$password = mysqli_real_escape_string($con, $_POST["uChairPword"]);
	$sql = "SELECT * FROM chair WHERE chair_uname = '$username' AND chair_pword = '$password'";
	$row = mysqli_query($con,$sql);
	$count = mysqli_num_rows($row);
	//if user record is available in database then $count will be equal to 1
	if($count == 1){
		$run_query = mysqli_fetch_array($row);
		$_SESSION["chair_id"] = $run_query["chair_id"];
        $_SESSION["chair_fname"] = $run_query["chair_fname"] ;
        $u_id = $_SESSION["chair_id"];
        $uip = $_SERVER['REMOTE_ADDR'];
        $action="Login";
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO user_logs (u_id, u_ip, u_action, date_login)VALUES('$u_id','$uip','$action','$date')";
        mysqli_query($con, $query);
			header("location:index.php");   
            exit();
		}else{
			$message = "Invalid Username or Password";
			echo "<script type='text/javascript'>alert('$message');
			javascript:history.go(-1);
			</script>";
			
			exit();
		}
}

?>