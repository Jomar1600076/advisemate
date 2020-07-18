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
    <?php include("AddProspectus.php"); ?>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
          <div class="card">
             <div class="card-header unique-color">
                <div class="row">
                  <div class="col-md-1">
                      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#AddProspectus">
                          <i class="far fa-file-alt mt-0"></i>
                      </button>
                  </div>
                  <div class="col"></div>
                </div>
             </div>
             <div class="card-body">
               <div class="row">
                  <?php 
                    $con = mysqli_connect("localhost", "root", "", "advisemate");
                    if($result = $con->query("SELECT * FROM curriculum")){
                      if($count = $result->num_rows){
                        while($row = $result->fetch_object()){
                            ?>
                              <div class="col-md-3">
                                <div class="card">
                                  <div class="card-body secondary-color">
                                    <?php echo $row->cur_desc; ?><br><br>
                                  </div>
                                  <div class="card-footer">
                                      <a href="subject.php?id=<?php echo $row->cu_id?>">
                                        <i class="fas fa-external-link-alt"></i>Go To
                                      </a>
                                  </div>
                                </div>
                              </div>
                        <?php
                        }
                        $result->free();
                        }
                      }
                    ?>
                </div>
              </div>
          </div>
    </div>
  </main>
  </body>
  </html>
