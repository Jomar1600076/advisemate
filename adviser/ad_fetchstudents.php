<?php 
    //all students
    if(isset($_POST["getStudents"])){

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

        $yr_lvl = $_GET["yr_lvl"];
        $sql = "SELECT student_id, concat(fname,' ',mname, ' ',lname) Fullname, course_desc, college_desc, year_lvl
                FROM
                students, college, course 
                WHERE
                students.student_college =  college.college_id AND
                students.student_course = course.course_id AND 
                year_lvl = $yr_lvl LIMIT $offset, $no_of_records_per_page
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

    //good students
    if(isset($_POST["goodStudents"])){
        $yr_lvl = $_GET["yr_lvl"];
        $con = mysqli_connect("localhost", "root", "", "advisemate");
        $sql = "SELECT
        DISTINCT 
        students.student_id,
        grades.student_id,    
        subjects.sub_unit,
        subjects.sub_code,
        subjects.sub_desc,
        subjects.sub_prereq,
        grades.grade, 
        grades.grade_status
        FROM subjects
        LEFT JOIN grades ON subjects.sub_code = grades.sub_code 
        LEFT JOIN students ON (grades.student_id = students.student_id)
        WHERE grades.grade <> 'DRP' AND grades.grade <> '5.0' 
            AND grades.grade <> 'INCOMPLETE' 
            AND grades.grade <> 'INC' 
            AND grades.grade <> '' 
            AND grades.grade <> '4.0' 
            AND grades.grade <> 'DROP'
            AND year_lvl = $yr_lvl
        ORDER BY students.student_id ASC";
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