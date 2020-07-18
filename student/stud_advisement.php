<?php
error_reporting(E_ERROR | E_PARSE);
$user_id = $_SESSION["uid"];
$sub_cur = '';
$year_started = '';
$connect = mysqli_connect("localhost", "root", "", "advisemate");
$query = "SELECT * from students where student_id = '$user_id'";
$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_assoc($result))  
	{
		$sub_cur = $row['stud_cur'];
		$year_started = $row['year_lvl'];
	}

$stud_start = $year_started + 1;

$month = date('m');
$month_now = '';
$sem_now = '';

//sem
if($month >= 8){
	$month_now = 2;
} elseif($month <= 7) {
	$month_now = 1;
}else{
		
}

//current sem
if($month <= 8){
	$sem_now = 2;
} elseif($month >= 7) {
	$sem_now = 1;
}else{
		
}

//next sem
if($month >= 8){
	$next_sem = 2;
}else {
	$next_sem = 1;
}

?>
<div class="card">
<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Advisement</h3>
	<div class="card-body">
		<div id="table" class="table-editable">Year <?php echo $stud_start ?>, Semester <?php echo $month_now ?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered subjects" id="tab">
				<thead >
					<tr>
					<th scope="col">Subject Code</th>
					<th scope="col">Subject Description</th>
					<th scope="col">Pre Requisite</th>
					<th scope="col">Subject Unit</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$grades[] = '';
					$sql = "SELECT 
					subjects.sub_unit,
					subjects.sub_code,
					subjects.sub_desc,
					subjects.sub_prereq,
					subjects.sub_cur,
					students.stud_cur,
					grades.grade,
					students.year_started,
					students.year_lvl,
					students.student_id
					
					FROM students
						LEFT JOIN grades ON grades.student_id = students.student_id
						LEFT JOIN subjects on subjects.sub_code = grades.sub_code
						WHERE grades.student_id = $user_id 
						AND students.student_id = '$user_id'
						AND students.stud_cur = subjects.sub_cur
						AND sub_cur = '$sub_cur'
						AND sub_sem='$sem_now'
						AND sub_year = '$year_started'
						";
					$res = mysqli_query($connect, $sql);
					while($row = mysqli_fetch_assoc($res))  
						{
							$grades[] = $row['grade'];
						}

						if(in_array('4.0', $grades) || in_array('5.0', $grades) || in_array('INC', $grades) || in_array('DROP', $grades))
						{	
							$subs[] = '';
							$def_grade = "SELECT 
								subjects.sub_unit,
								subjects.sub_code,
								subjects.sub_desc,
								subjects.sub_prereq,
								subjects.sub_cur,
								students.stud_cur,
								grades.grade,
								students.year_started,
								students.year_lvl,
								students.student_id
								
								FROM students
									LEFT JOIN grades ON grades.student_id = students.student_id
									LEFT JOIN subjects on subjects.sub_code = grades.sub_code
									WHERE grades.student_id = $user_id 
									AND students.student_id = '$user_id'
									AND students.stud_cur = subjects.sub_cur
									AND sub_cur = '$sub_cur'
									AND sub_sem ='$sem_now'	
									AND sub_year = '$year_started'
									AND (grade = '4.0' OR grade = '5.0' OR grade = 'INC' OR grade = 'DROP')";

								$res = mysqli_query($connect, $def_grade);
								if (!$res) 
								{
									printf("Error: %s\n", mysqli_error($connect));
									exit();
								}
								while($row = mysqli_fetch_array($res))  
									{
										$subs[] = $row['sub_code'];
									}
							
							$in = '(' . implode(',', $subs) .')';
							$sql = "SELECT sub_code, sub_desc, sub_year, sub_prereq, sub_sem, sub_unit FROM subjects WHERE sub_year = '$stud_start'
										AND sub_cur = '$sub_cur'
										AND sub_sem='$month_now'
										AND sub_prereq NOT IN ( '" . implode( "', '" , $subs ) . "' )
										";
							$result = mysqli_query($connect, $sql);
							if (!$result) 
							{
								printf("Error: %s\n", mysqli_error($connect));
								exit();
							}
							while($row = mysqli_fetch_array($result))  
								{
								?>
									<tr>
										<td><?php echo $row['sub_code']; ?></td>
										<td><?php echo $row['sub_desc']; ?></td>
										<td><?php echo $row['sub_prereq']; ?></td>
										<td><?php echo $row['sub_unit']; ?></td>    
									</tr>
								<?php
								}
								?>
								</tbody>
								</table>
								<table class="table table-striped table-bordered subjects" id="tab">
								<thead >
									<tr>
									<th scope="col">Subject Code</th>
									<th scope="col">Subject Description</th>
									<th scope="col">Pre Requisite</th>
									<th scope="col">Subject Unit</th>
									</tr>
								</thead>
								<tbody>
								<?php
						
							$query = "SELECT sub_code, sub_desc, sub_year, sub_prereq, sub_sem, sub_unit FROM subjects WHERE sub_year = '$stud_start'
										AND sub_cur = '$sub_cur'
										AND sub_sem='$month_now'
										AND sub_prereq IN ( '" . implode( "', '" , $subs ) . "' )";
							$res = mysqli_query($connect, $query);
							?>
							<p>You have a grade(s) with deficieny you cant take these subjects that are prerequisite</p>
							<?php
							while($row = mysqli_fetch_array($res))  
								{
								?>
									<tr>
										<td><?php echo $row['sub_code']; ?></td>
										<td><?php echo $row['sub_desc']; ?></td>
										<td><?php echo $row['sub_prereq']; ?></td>
										<td><?php echo $row['sub_unit']; ?></td>    
									</tr>
								<?php
								}
								?>
								</tbody>
								</table>
								<?php

						}else{


							$query = "SELECT * FROM subjects WHERE sub_year = '$stud_start' AND sub_sem= '$month_now' AND sub_cur = '$sub_cur' GROUP BY sub_code";
									$result = mysqli_query($connect, $query);
									while($row = mysqli_fetch_array($result))  
										{
										?>
											<tr>
												<td><?php echo $row['sub_code']; ?></td>
												<td><?php echo $row['sub_desc']; ?></td>
												<td><?php echo $row['sub_prereq']; ?></td>
												<td><?php echo $row['sub_unit']; ?></td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
								<?php

						}
					?>   
			</div>
		</div>
	</div>
</div>