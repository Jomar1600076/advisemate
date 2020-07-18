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
    <?php include("SubjectAddModal.php"); ?>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header primary-color-dark">
                <div class="row">
                <div class="col-md-3">
                        <a href="javascript:history.go(-1)" class="btn btn-outline-white btn-rounded btn-sm px-2">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                        </a>
                        <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#SubjectAddModal">
                            <i class="far fa-file-alt mt-0"></i>
                        </button>
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
                    <h6>First Semester</h6>
                    <table class="table bordered">
                        <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Desc</th>
                            <th>Pre-req</th>
                            <th>Unit</th>
                        </tr>
                        </thead>
                        <tbody id="subjects_sem1">
                        </tbody>
                    </table>
    <hr>
                    <h6>Second Semester</h6>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Desc</th>
                            <th>Pre-req</th>
                            <th>Unit</th>
                        </tr>
                        </thead>
                        <tbody id="subjects_sem2">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </main>
  <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const user_id = urlParams.get('id');
        console.log(user_id);
        $(document).ready(function(){
            subjects();
            function subjects(){
                $.ajax({
                    url: "chair_fetchSubjects.php?id="+user_id+"",
                    method: "POST",
                    data:  {getSubjects:1},
                    success : function(data){
                        $("#subjects_sem1").html(data);
                    } 
                })
            }
        load_sem_one();
        function load_sem_one(query){
            $.ajax({
            url:"   filter_subjects.php?id="+user_id+"",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#subjects_sem1').html(data);
            }
            });
        }

        load_sem_two();
        function load_sem_two(query){
            $.ajax({
            url:"   filter_subjects_two.php?id="+user_id+"",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#subjects_sem2').html(data);
            }
            });
        }
        $("#year_lvl").change(function(){
            var search = $(this).children("option:selected").val();
            if(search != '')
            {
            load_sem_one(search);
            load_sem_two(search);
            }
            else
            {
            load_sem_one();
            load_sem_one();
            }
        });

    })
    </script>
  </body>
  </html>
