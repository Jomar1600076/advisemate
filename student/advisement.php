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
				      <li class="nav-item active">
				        <a class="nav-link" href="advisement.php">Advisement<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="grades.php">Grades </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="#">About</a>
				      </li>
				    </ul>
				  </div>
				</nav>
			</div>
        	<div class="col-md-12 mt-2" id="#table">
				<?php include ('stud_advisement.php'); ?>
						
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