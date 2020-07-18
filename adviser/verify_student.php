<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

		$id = $_GET['id'];
		$connect = mysqli_connect("localhost", "root", "", "advisemate");
		$query = "UPDATE grades SET grade_status = '0' WHERE id = $id";
		if(mysqli_query($connect, $query)){
			$id = $_GET['id'];
			$date_now = date("Y-m-d H:i:s");
			$info = "Grade Accepted";
			$log_query = "INSERT INTO grades_log(grade_id, trans_info, trans_date) VALUES($id, '$info', '$date_now')";
			if(mysqli_query($connect, $log_query)){
				echo '<script>
				alert("Grade Verified")
				window.location.href = "javascript:history.go(-1)"
			</script>';
			}else{
				echo "Error" .mysqli_error($connect);
			}
		}else{
			echo "Error" .mysqli_error($connect);
		}
?>