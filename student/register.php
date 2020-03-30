<?php
session_start();
if (isset($_SESSION["uid"])) {
  header("location:index.php");
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
<?php include("college_course.php"); ?>
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
    <div class="container-fluid mt-5">
          <div class="row">
            <div class="col-md-4 ml-5">
                  <!-- Default form register -->
                    <form class="text-center border border-light p-5 primary-color-dark" action="register_action.php" method="POST">
                    <p class="h4 mb-4">Sign up</p>
                    
                    <input type="text" class="form-control mb-3" name="student_id" placeholder="Student Number">
                    <div class="form-row mb-3">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" class="form-control" name="fname" placeholder="First name">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" class="form-control" name="lname" placeholder="Last name">
                        </div>
                    </div>
                    <select class="browser-default custom-select mb-3" name="yr_lvl">
                        <option value=""selected disabled>Choose Year Level</option>
                        <option value="1">First Year</option>
                        <option value="2">Second Year</option>
                        <option value="3">Third Year</option>
                        <option value="4">Fourth Year</option>
                    </select>
                    <!-- Group of default radios - option 1 -->
                    <div class="custom-control custom-radio custom-control-inline text-white mb-3">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2" value="1" name="student_type" checked>
                        <label class="custom-control-label" for="defaultGroupExample2">Transferee</label>
                    </div>
                        <!-- Group of default radios - option 3 -->
                    <div class="custom-control custom-radio custom-control-inline text-white mb-3">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample3" value="0" name="student_type">
                        <label class="custom-control-label" for="defaultGroupExample3">Old Student</label>
                    </div>
                    <select class="browser-default custom-select mb-3" name="college">
                        <?php echo $options;?>
                    </select>
                    <select class="browser-default custom-select mb-3" name="course">
                        <?php echo $opts;?>
                    </select>
                    <button class="btn my-4 btn-block" style="background-color:#fdd835;" type="submit" name="register">Register</button>

                    <hr class="white">
                    <p>Already Have an Account?
                        <a href="into_login.php">Login</a>
                    </p>
                    </form>
                    <!-- Default form register -->
            </div>
            <div class="col-md-7">
            </div>
          </div>
    </div>
</body>

</html>
