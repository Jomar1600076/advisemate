<?php
session_start();
if (isset($_SESSION["uid"])) {
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Advisemate</title>

  <!-- Bootstrap core CSS -->
  <link href="others/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="others/css/font-awesome/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="others/css/simple-line-icons.css">
  <link rel="stylesheet" type="text/css" href="others/css/mdb.min.css">
 <!--  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet"> -->
  <script src="main.js"></script>

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="others/css/device-mockups.min.css">

  <!-- Custom styles for this template -->
  <link href="others/css/new-age.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Advisemate
      <img src="logo.png" alt="mdb logo" width="40px">
  		</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      </div>
    </div>
  </nav>

  <header class="masthead">
    <div class="container h-100">
          <div class="row">
            <div class="col-md-5 mt-5">
              <!-- Card -->
              <div class="card mx-xl-5 mt-5">
                <div class="card-body primary-color-dark">
                  <form method="post" action="login.php">
                    <p class="h4 text-center py-4">Login</p>
                    <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Username</label>
                    <input type="text" id="defaultFormCardNameEx" class="form-control" name="username" id="username" required/>
                    <br>
                    <label for="defaultFormCardEmailEx" class="grey-text font-weight-light">Password</label>
                    <input type="password" id="defaultFormCardEmailEx" class="form-control" name="password" id="password" required/>
                    <div class="text-center py-4 mt-3">
                    <input class="btn primary-color-darks fa fa-paper-plane-o" type="submit" value="Login" name="login">
                    </div>
                  </form>
                  <a href="./admin/pages/examples/login.php">I am an admin</a>
                </div>
              </div>
              <!-- Card -->
            </div>
            <div class="col-md-7">
            <div class="device-mockup iphone6_plus portrait">
              <div class="device">
                <div class="screen">
                  <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                  <img src="img/advisemate.png" width="1000px" height="1000px" class="img-fluid" alt="">
                </div>
              </div>
            </div>
            </div>
          </div>
    </div>
  </header>
 <!--  <section class="features" id="features">
    <div class="container">
      <div class="section-heading text-center">
        <h2>Unlimited Features, Unlimited Fun</h2>
        <p class="text-muted">Check out what you can do with this app theme!</p>
        <hr>
      </div>
      <div class="row">
        <div class="col-lg-4 my-auto">
          <div class="device-container">
            <div class="device-mockup iphone6_plus portrait white">
              <div class="device">
                <div class="screen">
                  
                  <img src="img/demo-screen-1.jpg" class="img-fluid" alt="">
                </div>
                <div class="button">

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 my-auto">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-screen-smartphone text-primary"></i>
                  <h3>Device Mockups</h3>
                  <p class="text-muted">Ready to use HTML/CSS device mockups, no Photoshop required!</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-camera text-primary"></i>
                  <h3>Flexible Use</h3>
                  <p class="text-muted">Put an image, video, animation, or anything else in the screen!</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-present text-primary"></i>
                  <h3>Free to Use</h3>
                  <p class="text-muted">As always, this theme is free to download and use for any purpose!</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-lock-open text-primary"></i>
                  <h3>Open Source</h3>
                  <p class="text-muted">Since this theme is MIT licensed, you can use it commercially!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; Your Website 2019. All Rights Reserved.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#">Privacy</a>
        </li>
        <li class="list-inline-item">
          <a href="#">Terms</a>
        </li>
        <li class="list-inline-item">
          <a href="#">FAQ</a>
        </li>
      </ul>
    </div>
  </footer> -->

  <!-- Bootstrap core JavaScript -->
  <script src="others/js/jquery-3.4.1.min.js"></script>
  <script src="others/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="others/js/new-age.min.js"></script>
  <script src="others/js/mdb.js"></script>


</body>

</html>
