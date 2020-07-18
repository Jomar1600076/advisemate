<?php
session_start();
if(!isset($_SESSION["chair_id"])){
	header("location:login.php");}
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

  <!--Main Navigation-->
  <header>
    <?php include("includes/navbar.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <?php include("fetch_yrlvl.php"); ?>
    <?php include("../super_admin1/StudentAddModal.php") ?>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-2">
    <div class="row wow fadeIn">
        <div class="col">
          <div class="card">
          <div class="card-header primary-color-dark">
            <div class="row">
                <div class="col-md-2">    
                  <input type="text" class="form-control mt-2" placeholder="Student Info" name="student_search_id" id="student_search_id" autocomplete="off">
                </div>
                <div class="col"></div>
                <div class="col-md-3">
                  <select class="browser-default custom-select mb-2" name="year_lvl" id="year_lvl">
                    <option value = ""selected>Select Year Level</option>
                    <?php echo $yr_lvl;?>
                  </select>
                </div>
            </div>  
        </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                        <tr class="row">
                            <th class="col-md-2">Student ID</th>
                            <th class="col">Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php include("chair_fetch_goodstud.php") ?>
                </div>
            </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    $(document).ready(function(){
      $('li').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
      });

        load_students();
      function load_students(query){
        $.ajax({
          url:"filter_students.php",
          method:"POST",
          data:{query:query},
          success:function(data){
            $('#getStudents').html(data);
          }
        });
      }
      $("#year_lvl").change(function(){
        var search = $(this).children("option:selected").val();
        if(search != '')
        {
          load_students(search);
        }
      });

      /*search*/
      load_student_search();
      function load_student_search(query)
      {
        $.ajax({
        url:"../super_admin1/fetchStudentSearch.php",
        method:"POST",
        data:{query:query},
        success:function(data)
        {
          $('#getStudents').html(data);
        }
        });
      }
      $('#student_search_id').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
          load_student_search(search);
        }
        else
        {
          load_student_search();
        }
      });

    })
</script>
  </body>
  </html>
