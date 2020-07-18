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
                            <th class="col-md-3">Year Level</th>
                        </tr>
                        </thead>
                        <tbody id="">
                        <?php
                          $con = mysqli_connect("localhost", "root", "", "advisemate");

                          $yr_lvl = $_SESSION["ad_yrlvl"];
                          $query = "SELECT 
                          subjects.sub_unit as unit,
                          subjects.sub_code as code,
                          subjects.sub_desc as S_desc,
                          subjects.sub_prereq as prereq,
                          subjects.sub_cur,
                          students.stud_cur,
                          grades.grade,
                          students.year_started,
                          students.year_lvl,
                          students.student_id
                          
                          FROM students
                          LEFT JOIN grades ON grades.student_id = students.student_id
                          LEFT JOIN subjects on subjects.sub_code = grades.sub_code
                          WHERE students.stud_cur = subjects.sub_cur
                          AND students.student_id = grades.student_id
                          GROUP BY grades.student_id";

                              $run_query = mysqli_query($con,$query);
                              if (!$run_query) 
                                  {
                                  printf("Error: %s\n", mysqli_error($con));
                                  exit();
                                  }
                              if(mysqli_num_rows($run_query) > 0){
                                  while($row = mysqli_fetch_array($run_query))
                                      {

                                          if (isset($_GET['pageno'])) {
                                              $pageno = $_GET['pageno'];
                                          } else {
                                              $pageno = 1;
                                          }
                                          $no_of_records_per_page = 5;  
                                          $offset = ($pageno-1) * $no_of_records_per_page;
                                          $total_pages_sql = "SELECT COUNT(*) FROM students";
                                          $result = mysqli_query($con,$total_pages_sql);
                                          $total_rows = mysqli_fetch_array($result)[0];
                                          $total_pages = ceil($total_rows / $no_of_records_per_page);
                                          

                                          $yr_lvl = $_SESSION["ad_yrlvl"];
                                              $query = "SELECT grades.student_id, CONCAT(fname,' ', mname,' ', lname) as fullname, grade, year_lvl, subjects.sub_year, subjects.sub_sem
                                                          FROM grades, students, subjects
                                                              WHERE (grades.grade = '4.0' OR grades.grade = '5.0' OR grades.grade = 'INCOMPLETE' OR grades.grade = 'INC') 
                                                                  AND students.student_id = grades.student_id
                                                              GROUP BY grades.student_id
                                                              LIMIT $offset, $no_of_records_per_page";
                                              $run_query = mysqli_query($con,$query);
                                              if (!$run_query) 
                                                  {
                                                  printf("Error: %s\n", mysqli_error($con));
                                                  exit();
                                                  }
                                              if(mysqli_num_rows($run_query) > 0){
                                                  while($row = mysqli_fetch_array($run_query))
                                                      {
                                              ?>
                                            <tr class="row">
                                                <td class="col-md-2"><?php echo $row['student_id']; ?></td>
                                                <td class="col"><?php echo $row['fullname']; ?></td>
                                                <td class="col-md-3"><?php echo $row['year_lvl']; ?></td>
                                            </tr>
                                              <?php
                                                  }
                                              }
                                      }
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
