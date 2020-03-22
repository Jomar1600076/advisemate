<?php
session_start();
if(isset($_SESSION["sAdmin_id"])) {
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Advisement Super Admin</title>
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
<body>

    <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color-dark lighten-1 sticky-top">
            <a class="navbar-brand" href="#">Advisemate Super-Admin</a>
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
                <form class="text-center border border-light p-5 white" action="sAdminLogin.php" method="POST">
                    <p class="h4 mb-4">Sign in</p>
                    <!-- Email -->
                    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="sAdminUname"placeholder="Username">
                    <!-- Password -->
                    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="sAdminPword" placeholder="Password" autocomplete="off">
                    <div class="d-flex justify-content-around">
                        <div>
                            <!-- Remember me -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                            </div>
                        </div>
                        <div>
                            <!-- Forgot password -->
                            <a href="">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                    <!-- Register -->
                    <p>Not a member?
                        <a href="">Register</a>
                    </p>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>
