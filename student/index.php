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
</head>
<body>
<?php include("includes/navbar.php")?>
<!-- header -->

	
        <div class="container ">
        	<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-dark light-blue darken-3">
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
				    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav">
				      <li class="nav-item active">
				        <a class="nav-link" href="index.php">Prospectus <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="advisement.php">Advisement</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="grades.php">Grades</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="#">About</a>
				      </li>
				    </ul>
				  </div>
				</nav>
			</div>
        	<div class="col-md-12 mt-2" id="tab">
					<div class="card">
  						<h3 class="card-header text-center font-weight-bold text-uppercase py-4">BSIT Prospectus</h3>
  						<h6 class="text-center font-weight-bold py-4">First Year</h6>
						<h6 class="text-left ml-2">1st Semester</h6>
  						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered subjects">
									<thead >
									<tr>
										<!--<th scope="col">Subject ID</th>-->
										<th scope="col">Subject Grade</th>
										<th scope="col">Subject Code</th>
										<th scope="col">Subject Description</th>
										<th scope="col">Pre Requisite</th>
										<th scope="col">Subject Unit</th>
									</tr>
									</thead>
									<tbody id="mygrade1">
									</tbody>
									<tbody id="mygrade2">
					
									</tbody>
								</table>
							</div>
							<h6 class="text-left ml-2">2nd Semester</h6>
							<div class="table-responsive">
								<table class="table table-striped table-bordered subjects">
									<thead >
										<tr>
											<!--<th scope="col">Subject ID</th>-->
											<th scope="col">Subject Grade</th>
											<th scope="col">Subject Code</th>
											<th scope="col">Subject Description</th>
											<th scope="col">Pre Requisite</th>
											<th scope="col">Subject Unit</th>
										</tr>
									</thead>
									<tbody id="mygrade2">
					
									</tbody>
								</table>
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
	<script>
	$(document).ready(function(){
		
		students();
		
		students2();
        function students(){
            $.ajax({
            url: "mygrade.php",
            method: "POST",
            data:  {query:1},
            success : function(data){
                $("#mygrade1").html(data);
            } 
        })
        }
        function students2(){
            $.ajax({
            url: "mygrade.php",
            method: "POST",
            data:  {second_sem:1},
            success : function(data){
                $("#mygrade2").html(data);
            } 
        })
        }
	})	
	</script>
</body>
</html>
