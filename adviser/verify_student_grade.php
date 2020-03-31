<?php
session_start();
if(!isset($_SESSION["ad_id"])){
	header("location:login.php");}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Advisemate--Adviser</title>
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
    <div class="row wow fadeIn">
        <div class="col">
          <div class="card">
          <div class="card-header primary-color-dark">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-2">    
                  <input type="text" class="form-control mt-2" placeholder="Student Info" name="student_search_id" id="student_search_id" autocomplete="off">
                </div>
                <div class="col"></div>
            </div>  
        </div>
        <input type="hidden" id="yrlvl" value="<?php echo $_SESSION["ad_yrlvl"]; ?>">
            <div class="card-body">
                <div class="table-wrapper">
                  <form action="" method="post">
                    <table class="table">
                        <thead>
                        <tr class="row"> 
                            <th class="col-md-2"><input type="checkbox" class="ml-5 mr-2" id="checkAll">Check</th>
                            <th class="col-md-1">Grade</th>
                            <th class="col-md-2">Subject Code</th>
                            <th class="col-md-5">Subject Description</th>
                            <th class="col-md-2"><button name="verify" class="btn btn-primary btn-sm p-2"><i class="fas fa-check-circle mr-2"></i>Verify Checked</button></th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php include("verify_student_request.php") ?>
                        </tbody>
                    </table>
                  </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    $(document).ready(function(){
        // Check/Uncheck ALl
        $('#checkAll').change(function(){
        if($(this).is(':checked')){
            $('input[name="update[]"]').prop('checked',true);
        }else{
            $('input[name="update[]"]').each(function(){
            $(this).prop('checked',false);
            });
        }
        });

        // Checkbox click
        $('input[name="update[]"]').click(function(){
        var total_checkboxes = $('input[name="update[]"]').length;
        var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

        if(total_checkboxes_checked == total_checkboxes){
            $('#checkAll').prop('checked',true);
        }else{
            $('#checkAll').prop('checked',false);
        }
        });
    });
  </script>
</body>
</html>