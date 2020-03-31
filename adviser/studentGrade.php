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
    <?php include("StudentAddModal.php"); ?>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row">   
                <div class="col">
                    <div class="card">
                        <div class="card-header primary-color-dark">
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:history.go(-1)" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                        <i class="fas fa-arrow-alt-circle-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <button class="btn btn-primary btn-sm float-right" id="editgrade">Edit</button>
                            <form method="POST" action="">
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Desc</th>
                                        <th scope="col">Pre-req</th>
                                        <th scope="col">Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $stud_id = $_GET['id'];
                                        $connect = mysqli_connect("localhost", "root", "", "advisemate");
                                        $query = "SELECT *
                                        FROM subjects
                                        LEFT JOIN grades ON grades.sub_code = subjects.sub_code 
                                        LEFT JOIN students ON students.student_id = grades.student_id 
                                        WHERE students.student_id = '$stud_id' AND grades.student_id = $stud_id
                                        ORDER BY subjects.sub_year ASC ,subjects.sub_sem ASC
                                        ";

                                        $result = mysqli_query($connect, $query);
                                        if (!$result) {
                                            printf("Error: %s\n", mysqli_error($connect));
                                            exit();
                                        }
                                            $count = mysqli_num_rows($result);
                                            if(isset($_POST["submit"])){

                                            $count=count($_POST["grade_id"]);
                                            for($i=0;$i<$count;$i++){
                                                $sql="UPDATE grades SET grade='" . $_POST['grades'][$i] . "', grade_status='1' WHERE id='" . $_POST['grade_id'][$i] . "'";
                                                $res=mysqli_query($connect, $sql);

                                                if(!$res){
                                                    printf("Error: %s\n", mysqli_error($connect));
                                                    exit();
                                                } 
                                             }
                                            }
                                            mysqli_close($connect);
                                            while($row = mysqli_fetch_array($result))  
                                                {
                                                    $sub_code = $row['sub_code'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row['sub_year']; ?></td>
                                            <td>
                                                <div class="form-group w-50">
                                                    <input type="text" class="input_grade" name="grades[]" value="<?php echo $row['grade']; ?>" disabled>
                                                </div>
                                            </td>

                                            <td><?php echo $row['sub_code']; ?></td>
                                            <td><?php echo $row['sub_desc']; ?></td>
                                            <td><?php echo $row['sub_prereq']; ?></td>
                                            <td><?php echo $row['sub_unit']; ?></td>
                                            <td style="display:none;"><input type="hidden" name="grade_id[]" value="<?php echo $row['id']; ?>"> </td>
                                            <?php

                                            }
                                        ?>
                                        </tr>
                                        <button class="btn btn-primary btn-sm float-right" id="submit" type="submit" name="submit">Submit</button>
                                    </form>
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
            $("#submit").prop('hidden', true);
            
            $("#editgrade").click(function(event){ 
                $(".input_grade").prop('disabled', false);
                $("#editgrade").prop('hidden', true);
                $("#submit").prop('hidden', false);
            });
        });
    </script> 
  </body>
  </html>
