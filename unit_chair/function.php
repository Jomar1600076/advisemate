<?php
	$con = new PDO('mysql:host=localhost;dbname=advisemate','root','');

	function count_advisers($con){
		$query = "SELECT * FROM advisers";

		$stmt = $con->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}

	function count_studs($con){
		$query = "SELECT * FROM students WHERE status=0";

		$stmt = $con->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}

	function count_curs($con){
		$query = "SELECT * FROM curriculum";
		$stmt = $con->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}

	function count_subs($con){
		$query = "SELECT * FROM subjects";

		$stmt = $con->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}

?>