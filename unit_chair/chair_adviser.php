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
    <?php include("../super_admin/AdviserAddModal.php") ?>
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
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#AdviserAddModal">
                        <i class="far fa-file-alt mt-0"></i>
                    </button>
                </div>
                <div class="col-md-2">    
                    <input type="text" class="form-control mt-2" placeholder="Employee ID" name="search_id" id="search_id" autocomplete="off">
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
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>College</th>
                            <th>Year Level</th>
                        </tr>
                        </thead>
                        <tbody id="fetchAdvisers">
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
      advisers();
      function advisers(){
        $.ajax({
          url: "fetch_users.php",
          method: "POST",
          data: {getAdvisers:1},
          success : function(data){
            $("#fetchAdvisers").html(data);
          }
        });
      }

      load_adviser();
      function load_adviser(query){
        $.ajax({
          url:"filter_adviser.php",
          method:"POST",
          data:{query:query},
          success:function(data){
            $('#fetchAdvisers').html(data);
          }
        });
      }
      $("#year_lvl").change(function(){
        var search = $(this).children("option:selected").val();
        if(search != '')
        {
          load_adviser(search);
        }
        else
        {
          load_adviser();
        }
      });
    })  
  </script>
</body>
</html>