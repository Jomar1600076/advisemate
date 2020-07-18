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
            <div class="card-body">
                <h3>Grade Audit Logs</h3>
                </hr>
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction</th>
                            <th>Created By</th>
                            <th>Info</th>
                        </tr>
                        </thead>
                        <tbody id="">
                        <?php

                        $con = mysqli_connect("localhost", "root", "", "advisemate");
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 6;  
                        $offset = ($pageno-1) * $no_of_records_per_page;
                        $total_pages_sql = "SELECT COUNT(*) FROM grades_log";
                        $result = mysqli_query($con,$total_pages_sql);
                        if (!$result) 
                        {
                          printf("Error: %s\n", mysqli_error($con));
                          exit();
                        }
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT concat(ad_fname,' ', ad_mname,' ', ad_lname) ad_name, trans_date, advisers.ad_id, trans_info, grade, grades.id, subjects.sub_code, concat(fname, ' ' ,lname) stud_name
                                    FROM grades_log 
                                    LEFT JOIN advisers on advisers.ad_id = grades_log.createdby
                                    LEFT JOIN grades on grades.id = grades_log.grade_id
                                    LEFT JOIN subjects on subjects.sub_code = grades.sub_code
                                    LEFT JOIN students on students.student_id = grades.student_id
                                    GROUP BY grades.id LIMIT $offset, $no_of_records_per_page
                                ";
                        $run_query = mysqli_query($con,$sql);
                        if (!$run_query) 
                        {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                    } 
                          while($row = mysqli_fetch_array($run_query)){
                            ?>
                              <tr>
                                  <td><?php echo $row['trans_date'] ?></td>
                                  <td><?php echo $row['trans_info'] ?></td>
                                  <td><?php echo $row['ad_name'] ?></td>
                                  <td><?php echo $row['stud_name'] ?></td>
                              </tr>
                              <?php
                          }
                      ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pg-blue">
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
