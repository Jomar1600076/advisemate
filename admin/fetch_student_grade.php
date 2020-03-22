<?php 
include('db.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

if(isset($_POST["student_grade"])){
		$query = $query = "SELECT * FROM 
				grades, subjects, students WHERE grades.grade_status = 1 AND students.student_id = grades.student_id GROUP BY grades.student_id";

		$statement = $con->prepare($query);
		$statement->execute();

		$result = $statement->fetchAll();
		$total_row	= $statement->rowCount();

		if($total_row > 0)
		{
			foreach ($result as $row)
			{
				$output .='
					<tr>
					  <td><a href="verify_student_grade.php?id='.$row['student_id'].'">' .$row["student_id"]. '</a></td>
					  <td>' .$row["fname"]. '</td>
					  <td>' .$row["lname"]. '</td>
					</tr>
				';
			}
		}
		else
		{
				$output .= '
					<tr>
						<td colspan = "5" align="center">No Data Found</td>
					</tr>
				';
		}
		
		echo $output;



	}
?>