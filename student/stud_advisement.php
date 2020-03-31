
				<?php
				error_reporting(E_ERROR | E_PARSE);
								$user_id = $_SESSION["uid"];
								$connect = mysqli_connect("localhost", "root", "", "advisemate");
		 						$query = "SELECT 
								subjects.sub_unit as unit,
								subjects.sub_code as code,
								subjects.sub_desc as S_desc,
								subjects.sub_prereq as prereq,
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
									";
		 						$result = mysqli_query($connect, $query);
								 while($row = mysqli_fetch_assoc($result))  
								 
                               		{
										$sub_cur = $row['stud_cur'];
										$year_started = $row['year_lvl'];
                               			$stud_start = $year_started + 1;

										

                               			$month = date('m');
                               			$month_now = '';

										//sem
										if($month >= 8){
										  $month_now = 2;
										} elseif($month <= 5) {
										  $month_now = 1;
										}else{
											echo "Summer";
										}

										//next sem
										if($month >= 8){
										  $next_sem = 1;
										} elseif($month <= 5) {
										  $next_sem = 2;
										}else{
											echo "Summer";

										

										
										}?>
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

                               			if($row['grade'] !='' || $row['grade'] != '4.0' || $row['grade'] != 'INC' || $row['grade'] != '5.0' || $row['grade'] != 'DROP')
                               				{
                               					$connect = mysqli_connect("localhost", "root", "", "advisemate");
                               					$sql = "SELECT sub_code, sub_desc, sub_year, sub_prereq, sub_sem, sub_unit FROM subjects WHERE sub_year = '$stud_start' 
												   		AND sub_prereq='NONE' 
														AND sub_cur = '$sub_cur'
														AND sub_sem='$month_now' LIMIT 5;";

                               					$sql .= "SELECT sub_code, sub_desc, sub_year, sub_prereq, sub_sem, sub_unit FROM subjects WHERE sub_year = '$stud_start' 
												   AND sub_sem='$next_sem' 
												   AND sub_cur = '$sub_cur' 
												   AND sub_prereq = 'NONE' LIMIT 8";

												if (mysqli_multi_query($connect, $sql))
												{
                               						do
                               						{
                               							if($result = mysqli_store_result($connect))
                               							{

                               								if (!$result) 
	                               								{
														    		printf("Error: %s\n", mysqli_error($conn));
														    		exit();
																}
							 									while($row = mysqli_fetch_assoc($result))  
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
                               							}
                               							mysqli_free_result($result);  
                               						}
                               						 
													 while (mysqli_next_result($connect));

												}                       					
											}
											else
											{
												$query = "SELECT * FROM subjects WHERE sub_year = '$stud_start' AND sub_sem= '$month_now' AND sub_cur = '$sub_cur'";
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
											}



									}
									?>
									</tbody>
								  </table>
								</div>    
                    		</div>
						</div>
					</div>
			</div>