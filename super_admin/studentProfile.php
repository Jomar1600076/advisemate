
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
        <?php include("StudentSearch.php") ?>
        <?php include("StudentAddModal.php") ?>
    </header>
    <main>
    <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header primary-color-dark">
                        </div>
                        <div class="card-body" id="side">
                            <a type="button" class="list-group-item list-group-item-action active" onclick="student_info()">Student Information</a>
                            <a type="button" class="list-group-item list-group-item-action" onclick="student_grade()">Grades</a>
                       </div>
                    </div>
                </div>    
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header primary-color-dark">
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:history.go(-1)" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                        <i class="fas fa-arrow-alt-circle-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="student_profile">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $('#side').on('click','a', function(){
            $(this).addClass('active').siblings().removeClass('active');
        });
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const user_id = urlParams.get('id');
        console.log(user_id);
        $(function(){
            $("#student_profile").load("student_profile_info.php?id="+user_id+"");
            $(this).addClass('active').siblings().removeClass('active');
        });
        function student_info(){
            $("#student_profile").load("student_profile_info.php?id="+user_id+"");
        }
        function student_grade(){
            $("#student_profile").load("student_profile_grade.php?id="+user_id+"");
        }
    </script> 
</body>
</html>