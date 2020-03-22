<?php
session_start();
if (!isset($_SESSION["sAdmin_id"])) {
  header("location:login.php");
}
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
  <script type="text/javascript" src="others/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="others/js/popper.min.js"></script>
  <script type="text/javascript" src="others/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="others/js/mdb.min.js"></script>
</head>
<body class="grey lighten-3">
    <header>
        <?php include("includes/navbar.php") ?>
        <?php include("includes/sidebar.php") ?>
        <?php include("UnitChairSearch.php") ?>
        <?php include("ChairAddModal.php") ?>
    </header>

    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row">   
                <div class="col">
                    <div class="card">
                        <div class="card-header primary-color-dark">
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:history.go(-1)" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                        <i class="fas fa-arrow-alt-circle-left"></i>
                                    </a>
                                </div>
                                <div class="col-md-10">
                                    <nav class="navbar navbar-expand-sm navbar-dark" id="side">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a type="button" class="nav-link" onclick="chair_info()">Chair Information</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a type="button" class="nav-link" onclick="chair_load()">Chair load</a>
                                            </li>
                                        </ul>
                                    <nav>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="chair_profile">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script> 

        $('#side').on('click','li', function(){
            $(this).addClass('active').siblings().removeClass('active');
        });
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const user_id = urlParams.get('id');
        console.log(user_id);
        $(function(){
            $("#chair_profile").load("chair_profile_info.php?id="+user_id+"");
            $(this).addClass('active').siblings().removeClass('active');
        });
        function chair_info(){
            $("#chair_profile").load("chair_profile_info.php?id="+user_id+"");
        }
        function chair_load(){
            $("#chair_profile").load("chair_profile_load.php?id="+user_id+"");
        }
    </script> 
</body>
</html>