<?php
session_start();
if(isset($_POST['add_grade'])) {

	$user_id = $_GET['id'];
	$sub_code = $_POST['sub_code'];
	$grade = $_POST['grade'];
	$status = 0;
	$user_id = $_SESSION["uid"];
	$connect = mysqli_connect("localhost", "root", "", "advisemate");
	$query = "UPDATE grades SET grade = '$grade', grade_status = '$status' WHERE sub_code = '$sub_code' AND student_id = '$user_id'";

	if(mysqli_query($connect, $query)){
		header('location:students.php');
	}else{
		echo "Error" .mysqli_error($connect);
	}

}
?>