<?php
session_start();
if(!isset($_SESSION["chair_id"])){
  header("location:login.php");}

  include_once "function.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Advisemate--Unit Chair</title>
  <!-- Font Awesome -->
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

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>
    <?php include("includes/navbar.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <?php include("includes/google-calendar.php"); ?>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
          <div class="card">
             <div class="card-body">
               <div class="row">
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body secondary-color text-white text-center">
                        <h1><?php echo count_advisers($con); ?></h1>
                        <p>Advisers</p>
                      </div>
                      <div class="card-footer">
                          <a href="chair_adviser.php">
                            <i class="fas fa-external-link-alt"></i>Go To
                          </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body secondary-color text-white text-center">
                        <h1><?php echo count_studs($con); ?></h1>
                        <p>Students</p>
                      </div>
                      <div class="card-footer">
                          <a href="chair_adviser.php">
                            <i class="fas fa-external-link-alt"></i>Go To
                          </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body secondary-color text-white text-center">
                        <h1><?php echo count_curs($con); ?></h1>
                        <p>Curriculum</p>
                      </div>
                      <div class="card-footer">
                          <a href="chair_adviser.php">
                            <i class="fas fa-external-link-alt"></i>Go To
                          </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body secondary-color text-white text-center">
                        <h1><?php echo count_subs($con); ?></h1>
                        <p>Curriculum</p>
                      </div>
                      <div class="card-footer">
                          <a href="chair_adviser.php">
                            <i class="fas fa-external-link-alt"></i>Go To
                          </a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
          </div>
    </div>
  </main>
</body>

</html>