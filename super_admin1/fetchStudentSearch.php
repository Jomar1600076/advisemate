<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$con = mysqli_connect("localhost", "root", "", "advisemate");
if(isset($_POST["query"])){
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
    SELECT student_id, concat(fname,' ',mname, ' ',lname) Fullname, course_desc, college_desc, year_lvl
    FROM
    students, college, course 
    WHERE
    students.student_college =  college.college_id AND
    students.student_course = course.course_id AND            
    (student_id LIKE '%".$search."%'
    OR fname LIKE '%".$search."%' 
    OR lname LIKE '%".$search."%'
    OR mname LIKE '%".$search."%')
    ";
    }else{
        $query = "  
            SELECT student_id, concat(fname,' ',mname, ' ',lname) Fullname, course_desc, college_desc, year_lvl
            FROM
            students, college, course 
            WHERE
            students.student_college =  college.college_id AND
            students.student_course = course.course_id";
    }
    $result = mysqli_query($con, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result)){
        $fullname = $row['Fullname'];
        $student_id = $row['student_id'];
        $course = $row['course_desc'];
        $college = $row['college_desc'];
        $yr_lvl = $row['year_lvl'];
        echo "
        <tr>
            <td><a href=studentProfile.php?id=$student_id class=text-primary>$student_id</td>
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