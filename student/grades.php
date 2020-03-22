<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:into_login.php");
}
include('db.php');
include('function.php');

?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<title>Advisement</title>
	<link rel="stylesheet" type="text/css" href="others/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="others/css/mdb.min.css">
	<link rel="stylesheet" type="text/css" href="others/css/fontawesome/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="others/css/fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="others/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<style>
	.input_grade{
		width: 100%;
		padding: 6px;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 2px;
		box-sizing: border-box;
	}
</style>
</head>
<body>
<?php include("includes/navbar.php")?>
<!--/.Navbar -->
        <div class="container ">
        	<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-dark light-blue darken-3">
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
				    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav">
				      <li class="nav-item">
				        <a class="nav-link" href="index.php">Prospectus</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="advisement.php">Advisement</a>
				      </li>
				      <li class="nav-item active">
				        <a class="nav-link" href="grades.php">Grades<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="#">About</a>
				      </li>
				    </ul>
				  </div>
				</nav>
			</div>
        	<div class="col-md-12 mt-2" id="tab">

        		<?php
								$user_id = $_SESSION["uid"];
								$connect = mysqli_connect("localhost", "root", "", "advisemate");
		 						$query = "SELECT 
				 						subjects.sub_unit,
										subjects.sub_code,
										subjects.sub_desc,
										subjects.sub_prereq,
										grades.grade_status,
										grades.grade,
										students.year_lvl,
										students.year_started
										/*Avg(grades.grade) as avg_grade*/
						 			FROM subjects, grades, students WHERE subjects.sub_code = grades.sub_code AND grades.student_id = '$user_id' AND students.student_id = '$user_id'";
		 						$result = mysqli_query($connect, $query);
		 						while($row = mysqli_fetch_array($result))  
                               		{

										$year_started = $row['year_lvl'];
								        $month = date('m');
								        $month_now = '';

										if($month >= 8){
										  $month_now = 1;
										} elseif($month <= 5) {
										  $month_now = 2;
										}else{
											echo "Summer";
										}
										?>
					<div class="card">
  						<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Grades</h3>
  						<div class="card-body">
    					<div id="table" class="table-editable">Year <?php echo $year_started ?>, Semester <?php echo $month_now ?>
					<div class="table-responsive">
					<form method="POST" action="">
						  <table class="table table-sm table-bordered subjects" id="grade_table">
						    <thead >
						      <tr>
						        <!--<th scope="col">Subject ID</th>-->
						        <th scope="col">Subject Code</th>
						        <th scope="col">Subject Description</th>
						        <th scope="col">Subject Unit</th>
						        <th scope="col">Grade</th>
						       
						      </tr>
						    </thead>
						    <tbody><?php
						    		  $user_id = $_SESSION["uid"];
										$connect = mysqli_connect("localhost", "root", "", "advisemate");
										$query = "SELECT
				 						subjects.sub_unit,
										subjects.sub_code,
										subjects.sub_desc,
										subjects.sub_prereq,
										grades.grade,
										grades.id,
										students.student_id,
										grades.grade_status
										FROM subjects
						 				LEFT JOIN grades ON subjects.sub_code = grades.sub_code 
										LEFT JOIN students ON (grades.student_id = students.student_id)
										WHERE sub_year = '$year_started' AND sub_sem = '$month_now' AND grades.student_id = $user_id
				 						ORDER BY subjects.sub_year ASC ,subjects.sub_sem ASC";

										 $result = mysqli_query($connect, $query);
										 $count = mysqli_num_rows($result);

										
										 if(isset($_POST["submit"])){
											
											$count=count($_POST["grade_id"]);
	
											for($i=0;$i<$count;$i++){
												$sql="UPDATE grades SET grade='" . $_POST['grades'][$i] . "', grade_status='1' WHERE id='" . $_POST['grade_id'][$i] . "'";
												$res=mysqli_query($connect, $sql);
											}
											if(!$res) 
	                               				{
												printf("Error: %s\n", mysqli_error($connect));
												exit();
											} 
										}
										mysqli_close($connect);

				 						while($row = mysqli_fetch_array($result))  
		                               		{

									?>
								
								      <tr>
									  	<td style="display:none;"><input type="hidden" name="grade_id[]" value="<?php echo $row['id']; ?>"> </td>
								        <td><?php echo $row['sub_code']; ?></td>
								        <td><?php echo $row['sub_desc']; ?></td>
								        <td><?php echo $row['sub_unit']; ?></td>
								        <td>
										<?php
											if($row['grade_status'] == '' || $row['grade_status'] == 1){
												?>	
													<select class="input_grade" id="input_grade" name="grades[]">
													<option value="<?php echo $row['grade'];?>"><?php echo $row['grade'];?></option>
													<option value="1.0">1.0</option>
													<option value="1.1">1.1</option>
													<option value="1.2">1.2</option>
													<option value="1.3">1.3</option>
													<option value="1.4">1.4</option>
													<option value="1.5">1.5</option>
													<option value="1.6">1.6</option>
													<option value="1.7">1.7</option>
													<option value="1.8">1.8</option>
													<option value="1.9">1.9</option>
													<option value="2.0">2.0</option>
													<option value="2.1">2.1</option>
													<option value="2.2">2.2</option>
													<option value="2.3">2.3</option>
													<option value="2.4">2.4</option>
													<option value="2.5">2.5</option>
													<option value="2.6">2.6</option>
													<option value="2.7">2.7</option>
													<option value="2.8">2.8</option>
													<option value="2.9">2.9</option>
													<option value="3.0">3.0</option>
													<option value="4.0">4.0</option>
													<option value="5.0">5.0</option>
													<option value="INC">Incomplete</option>
													<option value="DRP">Drop</option>
													
													</select>
												<?php
								        	}else{
													 echo $row['grade'];
													 
												}

											?>	
										</td>
						        <?php
											   }

								}
							    ?>
						      </tr>
						    </tbody>
						  </table>
						  <button class="btn btn-primary btn-sm float-right" id="submit" type="submit" name="submit">Submit</button>
						</form>
							<button class="btn btn-primary btn-sm float-right editgrade" type="button" >Edit</button>	
						  <span id="sum" class="float-right mr-2"></span>
						  <span id="val" class="float-right mr-2"></span>
					</div>    
                    </div>
					</div>
						
					</div>
				</div>
					 
<input type="button" class="print_float" onclick="makeCode()"/>
		
		<!--Print Floating BTN-->
<footer>
  <div class="page-footer font-small footer-copyright text-center py-3">© 2018 Copyright:
    <a href=""> ToDoCode</a>
  </div>
</footer>
<!-- Footer -->

	<script src="others/js/jquery-3.4.1.min.js"></script>
	<script src="others/js/bootstrap.min.js"></script>
	<script src="others/js/mdb.js"></script>
	<script src="others/js/html2pdf.bundle.min.js"></script>
	<script src="others/js/qrcode.min.js"></script>
	<script src="main.js"></script>
</body>	
</html>
<script>

		$(document).ready(function(){
			$("#submit").prop('hidden', true);
        	$(".editgrade").click(function(event){ 
				$("#input_grade").prop('disabled', false);
				$(".editgrade").prop('hidden', true);
				$("#submit").prop('hidden', false);
        });
		    function makeCode(){
		    	const element = document.getElementById('tab');	
		    	html2pdf().from(element).save();
		    }
		});

			  var table = document.getElementById("grade_table"), avgVal, sumVal = 0, allSum= 0,
                        rowCount = table.rows.length - 1;// minus the header
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseFloat(table.rows[i].cells[4].innerHTML);
            }
            for(var i = 1; i < table.rows.length; i++)
            {
                allSum = allSum + parseInt(table.rows[i].cells[3].innerHTML);
            }
            document.getElementById("sum").innerHTML = " " + " | Total Units = " + allSum;
            document.getElementById("val").innerHTML = "GWA = " + parseFloat(sumVal / rowCount).toFixed(3) + " ";
             

		</script>