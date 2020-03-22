<?php 
    if(isset($_POST["sa_getStudents"])){
        $con = mysqli_connect("localhost", "root", "", "advisemate");
        $sql = "SELECT student_id, concat(fname,' ',mname, ' ',lname) Fullname, course_desc, college_desc, year_lvl
                FROM
                students, college, course 
                WHERE
                students.student_college =  college.college_id AND
                students.student_course = course.course_id
                ";
        $run_query = mysqli_query($con,$sql);
        if (!$run_query) 
        {
         printf("Error: %s\n", mysqli_error($con));
         exit();
     }
        if(mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_array($run_query)){
                $fullname = $row['Fullname'];
                $stud_id = $row['student_id'];
                $course = $row['course_desc'];
                $college = $row['college_desc'];
                $yr_lvl = $row['year_lvl'];
                echo "
                <tr>
                    <td><a href=studentProfile.php?id=$stud_id class=text-primary>$stud_id</td>
                    <td>$fullname</td>
                    <td>$course</td>
                    <td>$college</td>
                    <td>$yr_lvl</td>
                </tr>
                ";
            }
        }
    }

?>