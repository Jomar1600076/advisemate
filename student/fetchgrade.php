<?php

if(isset($_POST["grades"])){

		$year_started = new DateTime($row['year_started']);
        $cur_date = new DateTime();
        $time_diff = $year_started->diff($cur_date);

        $stud_started =  $year_started->diff($cur_date)->format("%Y");

        $month = date('m');
        $month_now = '';

		if($month >= 8){
		  $month_now = 1;
		} elseif($month <= 5) {
		  $month_now = 2;
		}else{
			echo "Summer";
		}
		$output.="";
		$user_id = $_SESSION["uid"];
		$query = "SELECT
				FROM subjects
					LEFT JOIN grades ON grades.sub_code = subjects.sub_code 
					LEFT JOIN students ON grades.student_id='$user_id' 
					WHERE (subjects.sub_year = '$stud_started' AND subjects.sub_sem = '$month_now') AND (grades.grade IS NOT NULL AND students.student_id = '$user_id' AND grades.grade = '$user_id')
					";
		$statement = $con->prepare($query);
		$statement->execute();

		$result = $statement->fetchAll();
		$total_row	= $statement->rowCount();

		if($total_row > 0)
		{
			foreach ($result as $row)
			{
			$output.= '
				<tr>
					<td>'.$row['sub_code'].'</td>
					<td>'.$row['sub_desc'].'</td>
					<td>'.$row['grade'].'</td>
					<td>'.$row['sub_unit'].'</td>
					<td>'.$row['avg_grade']. '</td>
				</tr>
				';
			}
		}
	}