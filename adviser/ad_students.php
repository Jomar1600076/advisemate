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
                <div class="col-md-1">
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#StudentAddModal">
                        <i class="far fa-file-alt mt-0"></i>
                    </button>
                </div>
                <div class="col-md-2">    
                  <input type="text" class="form-control mt-2" placeholder="Student Info" name="student_search_id" id="student_search_id" autocomplete="off">
                </div>
                <div class="col"></div>
            </div>  
        </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>College</th>
                            <th>Yr Lvl</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $con = mysqli_connect("localhost", "root", "", "advisemate");
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 6;  
                        $offset = ($pageno-1) * $no_of_records_per_page;
                        $total_pages_sql = "SELECT COUNT(*) FROM students";
                        $result = mysqli_query($con,$total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $yr_lvl = $_SESSION["ad_yrlvl"];
                        $sql = "SELECT student_id, concat(fname,' ',mname, ' ',lname) Fullname, course_desc, college_desc, year_lvl
                                FROM
                                students, college, course 
                                WHERE
                                students.student_college =  college.college_id AND
                                students.student_course = course.course_id AND 
                                year_lvl = '$yr_lvl' LIMIT $offset, $no_of_records_per_page
                                ";
                        $run_query = mysqli_query($con,$sql);
                        if (!$run_query) 
                        {
                        printf("Error: %s\n", mysqli_error($con));
                        exit();
                    } 
                          while($row = mysqli_fetch_array($run_query)){
                              $fullname = $row['Fullname'];
                              $stud_id = $row['student_id'];
                              $course = $row['course_desc'];
                              $college = $row['college_desc'];
                              $yr_lvl = $row['year_lvl'];
                            ?>
                              <tr>
                                  <td><a href="studentProfile.php?id=<?php echo $stud_id ?>" class="text-primary"><?php echo $stud_id ?></td>
                                  <td><?php echo $fullname ?></td>
                                  <td><?php echo $course ?></td>
                                  <td><?php echo $college ?></td>
                                  <td><?php echo $yr_lvl ?></td>
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
      $('li').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
      });
  </script>
</body>

</html>