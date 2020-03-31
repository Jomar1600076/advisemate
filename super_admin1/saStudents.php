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
  <title>Advisemate--Se]Uper Admin</title>
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
        <?php include("StudentSearch.php") ?>
        <?php include("StudentAddModal.php") ?>
    </header>

    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <div class="col">
                <div class="card">
                <div class="card-header primary-color-dark">
                    <div class="row">
                        <div class="col-md-1">
                            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#StudentAddModal">
                                <i class="far fa-file-alt mt-0"></i>
                            </button>
                        </div>
                        <div class="col-md-2">    
                            <input type="text" class="form-control mt-2" placeholder="Student ID" name="student_search_id" id="student_search_id" autocomplete="off">
                        </div>
                        <div class="col"></div>
                    </div>  
                </div>
                    <div class="card-body">
                        <div class="table-wrapper">
                            <table class="table">
                                <thead>
                                <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">College</th>
                                <th scope="col">Year Level</th>
                                </tr>
                                </thead>
                                <tbody id="getStudents">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script>
    $(document).ready(function(){
        students();
        function students(){
            $.ajax({
            url: "fetchStudents.php",
            method: "POST",
            data:  {sa_getStudents:1},
            success : function(data){
                $("#getStudents").html(data);
            } 
        })
        }
    })
</script>
</body>
</html>