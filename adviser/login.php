<?php
session_start();
if(isset($_SESSION["ad_id"])) {
  header("location:ad_students.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Advisement Adviser</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="others/css/bootstrap.min.css" rel="stylesheet">
    <link href="others/css/mdb.min.css" rel="stylesheet">
    <link href="others/css/style.min.css" rel="stylesheet">
    <link href="others/style.css" rel="stylesheet">
	<script type="text/javascript" src="others/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="others/js/popper.min.js"></script>
    <script type="text/javascript" src="others/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="others/js/mdb.min.js"></script>
</head>	
<body style="background-color:#fdd835;">

    <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color-dark lighten-1 sticky-top">
            <a class="navbar-brand" href="#">Advisemate Adviser</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
            aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse" >
            </div>
    </nav>
    <div class="container mt-3">
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form class="text-center border border-light p-5 white" action="ad_login.php" method="POST">
                    <img src="logo.png" alt="mdb logo" width="100px">
                    <p class="h4 mb-4">Sign in</p>
                    <!-- Email -->
                    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="AdUname"placeholder="Username">
                    <!-- Password -->
                    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="AdPword" placeholder="Password">

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>
