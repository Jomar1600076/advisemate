<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$con = mysqli_connect("localhost", "root", "", "advisemate");
if(isset($_POST["query"])){
    $search = $_POST["query"];
    $query = "
    SELECT ad_id, concat(ad_fname,' ',ad_mname,' ', ad_lname) Fullname, course_desc, college_desc, yrlvl_name, ad_yrlvl
    FROM advisers, course, college, year_lvl
    WHERE 
    advisers.ad_college = college.college_id AND
    advisers.ad_course = course.course_id AND
    advisers.ad_yrlvl = year_lvl.yr_lvl AND            
    ad_yrlvl LIKE '%".$search."%'
    ";
    }else{
        $query = "  
        SELECT ad_id, concat(ad_fname,' ',ad_mname,' ', ad_lname) Fullname, course_desc, college_desc, yrlvl_name
        FROM advisers, course, college, year_lvl
        WHERE 
        advisers.ad_college = college.college_id AND
        advisers.ad_course = course.course_id AND
        advisers.ad_yrlvl = year_lvl.yr_lvl";
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
        $ad_id = $row['ad_id'];
        $course = $row['course_desc'];
        $college = $row['college_desc'];
        $yr_lvl = $row['yrlvl_name'];
        echo "
        <tr>
            <td>$ad_id</td>
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