<?php

$con = mysqli_connect("localhost", "root", "", "advisemate");
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 6;  
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM students WHERE status = 1";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$yr_lvl = $_SESSION["ad_yrlvl"];
$sql = "SELECT student_id, concat(fname,' ',mname, ' ',lname) Fullname, course_desc, college_desc, year_lvl
        FROM
        students, college, course 
        WHERE
        students.status = 1 AND
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
            $yr_lvl = $row['year_lvl'];
            ?>
            <tr class="row">
                <td class="col-sm-2"><input type="checkbox" class="ml-5" id="accept_stud" name='update[]' value='<?= $stud_id ?>' ></td>
                <td class="col-sm-2"><a href="studentProfile.php?id=<?php echo $stud_id ?>" class="text-primary"><?php echo $stud_id ?></td>
                <td class="col-sm-4"><?php echo $fullname ?></td>
                <td class="col-sm-2"><?php echo $yr_lvl ?></td>
            </tr>
            <?php
        }

        if(isset($_POST['add'])){
            if(isset($_POST['update'])){
              foreach($_POST['update'] as $updateid){
                $status = 0;
                $sql = "UPDATE students SET status = '".$status."' WHERE student_id = '$updateid'";
                $run_query = mysqli_query($con,$sql);
              }
              if (!$run_query) 
                {
                printf("Error: %s\n", mysqli_error($con));
                exit();
                } 
            }
          }

          if(isset($_POST['delete'])){
            if(isset($_POST['update'])){
              foreach($_POST['update'] as $updateid){
                $sql = "DELETE FROM students WHERE student_id = $updateid";
                $run_query = mysqli_query($con,$sql);
              }
              if (!$run_query) 
                {
                printf("Error: %s\n", mysqli_error($con));
                exit();
                }
            }
          }
?>