<?php 
include('db.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

$connect = mysqli_connect("localhost", "root", "", "advisemate");
if(isset($_POST["students"])){
		$query = "SELECT * from students
			WHERE student_id LIKE '%".$search."%'
			  OR fname LIKE '%".$search."%' 
			  OR mname LIKE '%".$search."%' 
			  OR lname LIKE '%".$search."%'";
	}else{
		$query = "SELECT * from students";
	}
	$result = mysqli_query($connect, $query);
		if(mysqli_num_rows($result) > 0)
		{
		 $output .= '
		  <div class="table-responsive">
		   <table class="table table bordered">
		    <tr>
		     <th>Student ID</th>
		     <th>First Name</th>
		     <th>Middle Name</th>
		     <th>Last Name</th>
		    </tr>
		 ';
		 while($row = mysqli_fetch_array($result))
		 {
		  $output .= '
		  <tr>
			<td>' .$row["student_id"]. '</td>
			<td>' .$row["fname"]. '</td>
			<td>' .$row["lname"]. '</td>
			<td><a href="prospectus.php?id=' .$row['student_id'].'" class="btn btn-info btn-m"><span class="glyphicon glyphicon-edit" name="verify_student"></span>View</a></td>
					</tr>
		  ';
		 }
		 echo $output;
		}
		else
		{
		 echo 'Data Not Found';
		}

?>