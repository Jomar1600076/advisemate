<?php
if(isset($_POST['edit'])) {

	$sub_code = $_GET['sub_code'];
	$user_id = $_GET['user_id'];
	$grade = $_POST['grade'];
	$grade_status = 0;
	$connect = mysqli_connect("localhost", "root", "", "advisemate");
	$query = "UPDATE grades SET grade = '$grade', grade_status = '$status' WHERE sub_code = '$sub_code' AND student_id = '$user_id'";
	//echo $query;

	if(mysqli_query($connect, $query)){
		header('location:students.php?');
	}else{
		echo "Error" .mysqli_error($connect);
	}

}
?>