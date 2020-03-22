<?php
session_start();
if(!isset($_SESSION["sAdmin_id"])){
	header("location:login.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">                                                                
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Advisement Super Admin</title>
	<title>Advisement Super Admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="others/css/bootstrap.min.css" rel="stylesheet">
    <link href="others/css/mdb.min.css" rel="stylesheet">
    <link href="others/css/style.min.css" rel="stylesheet">
	<script type="text/javascript" src="others/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="others/js/popper.min.js"></script>
    <script type="text/javascript" src="others/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="others/js/mdb.min.js"></script>
</head>	
<body class="grey lighten-3">
    <header>
        <?php include("includes/navbar.php") ?>
    </header>
    <!--Main layout-->
  <main>
    <div class="container-fluid mt-5">
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">
        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">
          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>
          <form class="d-flex justify-content-center">
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
      </div>
      <!-- Heading -->
      <!--Grid row-->
      <div class="row wow fadeIn">
        <div class="col-md-9 mb-4">
          <div class="card">
            <div class="card-body">
              <!--something-->
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="card mb-4">
            <div class="card-header text-center">
              Pie chart
            </div>
            <div class="card-body">
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-body">
              <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action waves-effect">Sales
                  <span class="badge badge-success badge-pill pull-right">22%
                    <i class="fas fa-arrow-up ml-1"></i>
                  </span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Traffic
                  <span class="badge badge-danger badge-pill pull-right">5%
                    <i class="fas fa-arrow-down ml-1"></i>
                  </span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Orders
                  <span class="badge badge-primary badge-pill pull-right">14</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Issues
                  <span class="badge badge-primary badge-pill pull-right">123</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Messages
                  <span class="badge badge-primary badge-pill pull-right">8</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row wow fadeIn">
        <div class="col-lg-6 col-md-6 mb-4">
          <div class="card">
            <div class="card-header">Doughnut Chart</div>
            <div class="card-body">
              <canvas id="doughnutChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
          <div class="card">
            <div class="card-header">Horizontal Bar Chart</div>
            <div class="card-body">
              <canvas id="horizontalBar"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--Main layout-->
</body>
</html>
