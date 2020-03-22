<?php

session_start();
if(isset($_POST["getGrades"])){

    $con = mysqli_connect("localhost", "root", "", "advisemate");
    $yr_lvl = $_SESSION["ad_yrlvl"];
    $query = "SELECT * FROM 
        grades, subjects, students WHERE grades.grade_status = 1 
        AND students.student_id = grades.student_id 
        AND students.year_lvl = $yr_lvl
        AND students.stud_cur = subjects.sub_cur GROUP BY grades.student_id";

    $run_query = mysqli_query($con,$query);
    if (!$run_query) 
    {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $std_id = $row["student_id"];
            $fname = $row["fname"];
            $lname = $row["lname"];
            echo "
            <tr>
                <td><a href=verify_student_grade.php?id=$std_id class=text-primary>$std_id</td></td>
                <td>$fname</td>
                <td>$lname</td>
            </tr>
            ";
        }
    }
    else{
        echo "No data"; 
    }
}?>