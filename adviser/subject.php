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
                    </div>
                    <div class="col"></div>
                    <div class="col-md-3">
                        <select class="browser-default custom-select mb-2" name="year_lvl" id="year_lvl">
                            <option value = ""selected>Select Year Level</option>
                            <?php echo $yr_lvl;?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="browser-default custom-select mb-2" name="sem" id="sem">
                            <option value = ""selected>Select Sem</option>
                            <?php echo $sem;?>
                        </select>
                    </div>                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Desc</th>
                            <th>Pre-req</th>
                            <th>Unit</th>
                            <th>Year</th>
                            <th>Sem</th>
                        </tr>
                        </thead>
                        <tbody id="subjects">
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
                    url: "ad_fetchSubjects.php?id="+user_id+"",
                    method: "POST",
                    data:  {getSubjects:1},
                    success : function(data){
                        $("#subjects").html(data);
                    } 
                })
            }
        load_subjects();
        function load_subjects(query){
            $.ajax({
            url:"ad_filter_subjects.php?id="+user_id+"",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#subjects').html(data);
            }
            });
        }
        $("#year_lvl").change(function(){
            var search = $(this).children("option:selected").val();
            if(search != '')
            {
            load_subjects(search);
            }
            else
            {
            load_subjects();
            }
        });
        $("#sem").change(function(){
            var search_sem = $(this).children("option:selected").val();
            if(search_sem != '')
            {
            load_subjects(search_sem);
            }
            else
            {
            load_subjects();
            }
        });

        })
    </script>
  </body>
  </html>
