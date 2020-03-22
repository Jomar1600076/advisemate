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
        <?php include("ChairAddModal.php") ?>
        <?php include("fetchChairProfile.php") ?>
    </header>
    <main>
    <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header primary-color-dark">
                            Search
                        </div>
                        <div class="container">
                            <input type="text" class="form-control mt-2" placeholder="Student ID" nanme="search_id" id="search_id" autocomplete="off">
                            <!-- Password -->
                            <input type="text" class="form-control mt-2" placeholder="First Name">
                            <!-- Phone number -->
                            <input type="text" class="form-control mt-2" placeholder="Last Name">
                            <input type="text" class="form-control mb-2 mt-2" placeholder="M.I">
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
                                    <button class="btn btn-cyan btn-sm">Personal Information</button>
                                    <button class="btn btn-cyan btn-sm">Primary</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 border border-success">
                                        <button type="button" class="btn btn-outline-blue btn-rounded btn-sm px-2 float-right" id="editProfile">
                                        <i class="fas fa-edit"></i>
                                        </button>
                                        <p class="font-weight-bold bottom"><?php echo $chair_id ?></p>
                                    <div class="container mt-5 ">
                                        <div class="row border border-top-2 border-dark">
                                            <div class="col">
                                            <form class="text-center p-2" action="#!">
                                                <input type="hidden" id="user_id" class="form-control white" value="<?php echo $chair_id ?>" disabled>
                                                <div class="form-row mb-3">
                                                    <div class="col">
                                                        <input type="text" id="fname" class="form-control white" value="<?php echo $fname ?>" disabled>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" id="lname" class="form-control white" value="<?php echo $lname ?>" disabled>
                                                    </div>
                                                </div>
                                                <input type="text" id="bday" class="form-control mb-3 white" value="<?php echo $bday ?>" disabled>
                                                <input type="text" id="sex" class="form-control mb-3 white" value="<?php echo $sex ?>" disabled>
                                                <input type="text" id="add" class="form-control mb-3 white" value="<?php echo $add ?>" disabled>
                                                <!-- Phone number -->
                                                <input type="text" id="" class="form-control" value="Phone number">
                                                <button type="submit" class="btn btn-blue float-right" id="saveProfile">Save</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <img src="https://mdbootstrap.com/img/Others/documentation/img%20(75)-mini.jpg" alt="thumbnail" class="img-thumbnail"
  style="width: 200px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
    </main>
    <script> 
        $(document).ready(function() {
            $("#saveProfile").hide();
        });
        $("#editProfile").click(function(event) { 
            $('#fname').prop('disabled', false);
            $('#lname').prop('disabled', false);
            $('#bday').prop('disabled', false);
            $('#sex').prop('disabled', false);
            $('#add').prop('disabled', false);
            $("#saveProfile").show();
            $('#editProfile').prop('disabled', true);
        });
    </script> 
</body>
</html>