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
    <?php include("StudentAddModal.php"); ?>
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
            </div>  
        </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <form method="POST" action="">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="row">
                                <th class="col-sm-2"><input type="checkbox" class="ml-5 mr-2" id="checkAll">Check</th>
                                <th class="col-sm-2">Student ID</th>
                                <th class="col-sm-4">Name</th>
                                <th class="col-sm-2">Yr Lvl</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php include("accept_stud.php") ?>
                            </tbody>
                        </table>
                        <button name="add" class="btn btn-primary btn-sm p-2 m-0"><i class="fas fa-plus"></i></button>
                        <button name="delete" class="btn btn-danger btn-sm p-2 m-0"><i class="fas fa-minus"></i></button>
                    </form>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pg-blue float-right">
                            <li class="page-item">
                              <a href="?pageno=1" class="page-link">First</a>
                            </li>
                            <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                            </li>
                            <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
                            </li>
                            <li class ="page-item">
                              <a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a>
                            </li>
                        </ul>
                    </nav>
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