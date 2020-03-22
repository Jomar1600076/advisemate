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
<body class="grey">
    <header>
        <?php include("includes/navbar.php") ?>
        <?php include("includes/sidebar.php") ?>
        <?php include("UnitChairSearch.php") ?>
        <?php include("AdviserAddModal.php") ?>
    </header>
    <main class="">
        <div class="container-fluid mt-4">
            <div class="row">  
                <div class="col">
                    <div class="card">
                        <div class="card-header primary-color-dark">
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#ChairAddModal">
                                        <i class="far fa-file-alt mt-0"></i>
                                    </button>
                                </div>
                                <div class="col">    
                                    <input type="text" class="form-control mt-2" placeholder="Employee Id" nanme="search_id" id="search_id" autocomplete="off">
                                </div>
                            </div>  
                        </div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">User_id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">College</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getAdvisers">
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
    </main>
<script>
    $(document).ready(function(){
        advisers();

        function advisers(){
            $.ajax({
            url: "fetchAdvisers.php",
            method: "POST",
            data:  {getAdvisers:1},
            success : function(data){
                $("#getAdvisers").html(data);
            }
        })
        }
    })
</script>
</body>
</html>