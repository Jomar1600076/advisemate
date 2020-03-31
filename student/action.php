<?php
	include('db.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	if(isset($_POST["firstsem"]))
	{
		
		$output = '';
		if($_POST["query"] != ''){
			$query = "SELECT * FROM subjects WHERE sub_year = '".$_POST["query"]."' AND sub_sem = 2
			";
		}else{
			$query = "SELECT * FROM subjects WHERE sub_year = 1 AND sub_sem = 1";
		}
		
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
					  <td>' .$row["sub_code"]. '</td>
					  <td>' .$row["sub_desc"]. '</td>
					  <td>' .$row["sub_prereq"]. '</td>
					  <td>' .$row["sub_unit"]. '</td>
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
	if(isset($_POST["secondsem"])){
		$output = '';
		$user_id = $_SESSION["uid"];
		$connect = mysqli_connect("localhost", "root", "", "advisemate");
		$query = "SELECT 
		 						subjects.sub_unit,
								subjects.sub_code,
								subjects.sub_desc,
								subjects.sub_prereq,
								grades.grade
								/*Avg(grades.grade) as avg_grade*/
				 			FROM subjects, grades WHERE subjects.sub_code = grades.sub_code AND subjects.sub_year = 1 AND subjects.sub_sem = 1 AND grades.student_id = '$user_id'";
		
				$result = mysqli_query($connect, $query);
		 		while($row = mysqli_fetch_array($result))  
                       {

                       	$sub_code = $row["sub_code"];
                       	$sub_desc = $row["sub_desc"];
                       	$sub_prereq = $row["sub_prereq"];
                       	$sub_unit = $row["sub_unit"];
					echo "
						<tr>
						  <td> $sub_code</td>
						  <td> $sub_desc </td>
						  <td> $sub_prereq </td>
						  <td> $sub_unit </td>
						</tr>
					";
			}
	/*	}
		else
		{
				$output .= '
					<tr>
						<td colspan = "5" align="center">No Data Found</td>
					</tr>
				';

		}*/
		
		echo $output;
	}

	
	if(isset($_POST["sub_code"]))  
		 {  
		 	  $connect = mysqli_connect("localhost", "root", "", "advisemate");	
		      $query = "SELECT * FROM subjects WHERE sub_code = '".$_POST["sub_code"]."'";  
		      $result = mysqli_query($connect, $query);  
		      $row = mysqli_fetch_array($result);  
		      echo json_encode($row);  
		 }  
?>