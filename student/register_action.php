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
if(isset($_POST["register"])){

	$student_id = $_POST["student_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $yr_lvl = $_POST["yr_lvl"];
	$student_type = $_POST["student_type"];
	$college =  $_POST["college"];
	$course =  $_POST["course"];
	$status = "1";
	$sql = "INSERT INTO students (student_id, fname, lname, year_lvl, stud_type, status, pword, student_college, student_course)
		values('$student_id', '$fname', '$lname', '$yr_lvl', '$student_type', '$status', '$student_id', '$college', '$course' )";

	if(mysqli_query($con, $sql)){
			$message = "successfuly registered!! Wait for adviser Confirmation";
			echo "<script type='text/javascript'>alert('$message');
			location.href = 'into_login.php';
			</script>";
		
		exit();
		}else{
			echo "Error" .mysqli_error($con);
		}
}

?>