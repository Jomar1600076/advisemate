<?php
session_start();
if (isset($_SESSION["uid"])) {
  header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Advisemate</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="others/css/bootstrap.min.css" rel="stylesheet">
  <link href="others/css/mdb.min.css" rel="stylesheet">
  <link href="others/css/style.min.css" rel="stylesheet">
  <link rel="stylesheet" href="others/css/daterangepicker.css">
  <script src="others/js/moment/moment.min.js"></script>
  <script src="others/js/daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="others/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="others/js/popper.min.js"></script>
  <script type="text/javascript" src="others/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="others/js/mdb.min.js"></script>
</head>

<body style="background-color:#fdd835;">
  <!-- Navigation -->

  <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color-dark lighten-1 sticky-top">
    <a class="navbar-brand ml-5" href="#">Advisemate</a>
    <img src="logo.png" alt="mdb logo" width="30px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" >
    </div>
  </nav>
    <div class="container">
          <div class="row">
            <div class="col-md-5">
              <!-- Card -->
              <div class="card mx-xl-5 mt-5">
                <div class="card-body primary-color-dark">
                  <form class="text-center p-3" action="login.php" method="post" autocomplete="off">
                      <p class="h4 mb-4 text-white">Log in</p>
                      <!-- Email -->
                      <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="username" placeholder="E-mail">
                      <!-- Password -->
                      <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="password" placeholder="Password">
                      <!-- Sign in button -->
                      <button class="btn btn-block my-4 text-white" type="submit" name="login" style="background-color:#fdd835;">Login</button>

                      <hr class="white">
                      <!-- Register -->
                      <p class="texxt-white">Not a member?
                          <a href="register.php">Register</a>
                      </p>
                  </form>
                </div>
              </div>
              <!-- Card -->
            </div>
            <div class="col-md-7">
            </div>
          </div>
    </div>
</body>

</html>
