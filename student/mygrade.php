<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$con = mysqli_connect("localhost", "root", "", "advisemate");
session_start();
if(isset($_POST["query"])){
    $user_id = $_SESSION["uid"];
    $query = "SELECT DISTINCT
            subjects.sub_unit,
            subjects.sub_code,
            subjects.sub_desc,
            subjects.sub_prereq,
            grades.grade,
            students.student_id
            FROM subjects
            LEFT JOIN grades ON subjects.sub_code = grades.sub_code 
            LEFT JOIN students ON (grades.student_id = students.student_id)
            WHERE (grades.student_id = '$user_id')
        
            ORDER BY subjects.sub_year ASC ,subjects.sub_sem ASC
            ";
        echo $query;
        $result = mysqli_query($con,$query);
        if (!$result) 
        {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
                $grade = $row['grade'];
                $sub_code = $row['sub_code'];
                $sub_desc = $row['sub_desc'];
                $sub_prereq = $row['sub_prereq'];
                $sub_unit = $row['sub_unit'];
                
            echo "
            <tr>
                <td>$grade</td>
                <td>$sub_code</td>
                <td>$sub_desc</td>
                <td>$sub_prereq</td>
                <td>$sub_unit</td>
            </tr>
            ";  
        }
    }
}
if(isset($_POST["second_sem"])){
    $user_id = $_SESSION["uid"];
    $query = "SELECT DISTINCT
            subjects.sub_unit,
            subjects.sub_code,
            subjects.sub_desc,
            subjects.sub_prereq,
            grades.grade,
            students.student_id
            FROM subjects
            LEFT JOIN grades ON subjects.sub_code = grades.sub_code 
            LEFT JOIN students ON (grades.student_id = students.student_id)
            WHERE (grades.student_id = '$user_id') AND subjects.sub_year = '1'
            AND subjects.sub_sem = '2'
        
            ORDER BY subjects.sub_year ASC ,subjects.sub_sem ASC
            ";
        echo $query;
        $result = mysqli_query($con,$query);
        if (!$result) 
        {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
                $grade = $row['grade'];
                $sub_code = $row['sub_code'];
                $sub_desc = $row['sub_desc'];
                $sub_prereq = $row['sub_prereq'];
                $sub_unit = $row['sub_unit'];
                
            echo "
            <tr>
                <td>$grade</td>
                <td>$sub_code</td>
                <td>$sub_desc</td>
                <td>$sub_prereq</td>
                <td>$sub_unit</td>
            </tr>
            ";  
        }
    }
}
?>