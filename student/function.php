<?php
	include ('db.php');
	function fetch_yrlvl($con){

		$sql = "SELECT * FROM year_lvl";
		$stmt = $con->query($sql);
		//$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

		$output=
		"<option value='" . $row['year_lvl'] . "'>" . $row['name'] . "</option>";
		}
		return $output;
	}

	function student_lack_grades($con){
		$user_id = $_SESSION["uid"];
		$query = "SELECT
		students.student_id,
		grades.student_id,    
		subjects.sub_unit,
		subjects.sub_code,
		subjects.sub_desc,
		subjects.sub_prereq,
		grades.grade, 
		grades.grade_status
		FROM subjects
		LEFT JOIN grades ON subjects.sub_code = grades.sub_code 
		LEFT JOIN students ON (grades.student_id = students.student_id)
		WHERE (grades.grade = '4.0' OR grades.grade = '5.0' OR grades.grade = 'INCOMPLETE' OR grades.grade = 'INC')
		AND grades.student_id = '$user_id'
		AND students.student_id = '$user_id'
		LIMIT 5";
		$stmt = $con->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}
?>