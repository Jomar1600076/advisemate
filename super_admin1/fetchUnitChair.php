<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$con = mysqli_connect("localhost", "root", "", "advisemate");
if(isset($_POST["query"])){
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
    SELECT chair_id, concat(chair_fname,' ',chair_mname, ' ', chair_lname) Fullname, course_desc, college_desc
    FROM chair, college, course
    WHERE
    (chair.chair_college =  college.college_id AND
    chair.chair_course = course.course_id) AND
    (chair_id LIKE '%".$search."%'
    OR chair_fname LIKE '%".$search."%' 
    OR chair_lname LIKE '%".$search."%')
    ";
    }else{
        $query = "
            SELECT chair_id, concat(chair_fname,' ',chair_mname, ' ', chair_lname) Fullname, course_desc, college_desc
            FROM chair, college, course
            WHERE
            (chair.chair_college =  college.college_id AND
            chair.chair_course = course.course_id)
        ";
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
        $chair_id = $row['chair_id'];
        $course = $row['course_desc'];
        $college = $row['college_desc'];
        echo "
        <tr>
            <td><a href=chairProfile.php?id=$chair_id class=text-primary>$chair_id</td>
            <td>$fullname</td>
            <td>$course</td>
            <td>$college</td>
        </tr>
        ";
        }
    }
    else
    {
    echo 'Data Not Found';
    }

?>