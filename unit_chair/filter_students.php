<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$con = mysqli_connect("localhost", "root", "", "advisemate");
if(isset($_POST["query"])){

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


    $search = $_POST["query"];
    $query = "
    SELECT student_id, concat(fname,' ',mname, ' ',lname) Fullname, course_desc, college_desc, year_lvl
    FROM
    students, college, course 
    WHERE
    students.student_college =  college.college_id AND
    students.student_course = course.course_id AND 
    year_lvl LIKE '%".$search."%' LIMIT $offset, $no_of_records_per_page
    ";
    }else{
        $query = "  
        SELECT student_id, concat(fname,' ',mname, ' ',lname) Fullname, course_desc, college_desc, year_lvl
        FROM
        students, college, course 
        WHERE
        students.student_college =  college.college_id AND
        students.student_course = course.course_id ";
    }
    $result = mysqli_query($con,$query);
        if (!$result) 
        {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result)){
        $fullname = $row['Fullname'];
            $stud_id = $row['student_id'];
            $course = $row['course_desc'];
            $college = $row['college_desc'];
            $yr_lvl = $row['year_lvl'];
            echo "
            <tr>
                <td><a href=chair_studentProfile.php?id=$stud_id class=text-primary>$stud_id</td>
                <td>$fullname</td>
                <td>$course</td>
                <td>$college</td>
                <td>$yr_lvl</td>
            </tr>
            ";  
        }
    }
    else
    {
    echo 'Data Not Found';
    }

?>