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
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="others/css/mdb.min.css">
	<link rel="stylesheet" type="text/css" href="others/css/fontawesome/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="others/css/fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="others/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<script src="others/js/jquery-3.4.1.min.js"></script>
	<script src="others/js/bootstrap.min.js"></script>
	<script src="others/js/mdb.js"></script>
	<script src="others/js/html2pdf.bundle.min.js"></script>
	<script src="others/js/qrcode.min.js"></script>
	<script src="main.js"></script>		
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
				      <li class="nav-item ">
				        <a class="nav-link" href="advisement.php">Advisement</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="grades.php">Grades </a>
				      </li>
				      <li class="nav-item active">
					  	<a class="nav-link" href="notif.php">Notifications<span class="sr-only">(current)</span></a>
				      </li>
				    </ul>
				  </div>
				</nav>
			</div>
        	<div class="col-md-12 mt-2">
                <div class="card grey lighten-3 chat-room">
                    <div class="card-body">
                        <!-- Grid row -->
                        <div class="row px-lg-2 px-2">
                            <!-- Grid column -->
                            <div class="px-lg-auto px-0">
                                <div class="chat-message">
                                    <ul class="list-unstyled chat">

                                    <?php $connect = mysqli_connect("localhost", "root", "", "advisemate");
										$user_id = $_SESSION["uid"];
										$query = "SELECT
										students.student_id,
										students.year_lvl,
										grades.student_id,    
										subjects.sub_unit,
										subjects.sub_code,
										subjects.sub_desc,
										subjects.sub_year, 
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

										$result = mysqli_query($connect, $query);
										if (!$result) 
											{
												printf("Error: %s\n", mysqli_error($connect));
												exit();
											}
										while($row = mysqli_fetch_array($result))  
											{
												$sub_year = $row['sub_year'];

												if($sub_year == 1){
													
												}
												
										?>
                                            <li class="mb-4">
                                                <div class="chat-body white p-3 ml-2">
                                                    <div class="header">
                                                    <strong class="primary-font"><?php echo $row['sub_code']; ?></strong>
                                                    <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small>
                                                    </div>
                                                    <hr class="w-100">
                                                    <p class="mb-0">
                                                    The completion period for your deficiency in the Subject <strong><u class="text-secondary"><?php echo $row['sub_desc']; ?></u></strong> 
                                                    is nearly expiring
                                                    </p>
                                                </div>
                                            </li>
									    <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                    </div>
                </div>
			</div>
        </div>
		<form action="advisement_pdf.php" method="POST">
			<input type="submit" class="print_float" value="Print"><i class="fas fa-print"></i></input>
		</form>


		<!--Print Floating BTN-->
<footer>
  <div class="page-footer font-small footer-copyright text-center py-3">© 2018 Copyright:
    <a href=""> ToDoCode</a>
  </div>
</footer>

<!-- Footer -->
	
</body>
</html>
<script>
		$(document).ready(function(){
		    function makeCode(){
		    	const element = document.getElementById('tab');	
		    	html2pdf().from(element).save();

		    }
		})
  
		</script>