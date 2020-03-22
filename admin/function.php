<?php
	$con = new PDO('mysql:host=localhost;dbname=advisemate','root','');

	function modify_grade($con){
		$query = "SELECT * FROM grades WHERE grade_status = 1";

		$stmt = $con->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}
?>