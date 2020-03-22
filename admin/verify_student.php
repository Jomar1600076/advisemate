<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

		$id = $_GET['id'];
		$connect = mysqli_connect("localhost", "root", "", "advisemate");
		$query = "UPDATE grades SET grade_status = '0' WHERE id = $id";
		if(mysqli_query($connect, $query)){
			header('location:student_grade.php');
		}else{
			echo "Error" .mysqli_error($connect);
		}
?>