<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$con = mysqli_connect("localhost", "root", "", "advisemate");

if(isset($_POST["query"])){
    $search = $_POST["query"];
    $cur_id = $_GET["id"];
    $query = "
    SELECT sub_code, sub_desc, sub_prereq, sub_unit, sub_year, sub_sem, sub_cur
    FROM subjects
    WHERE       
    sub_year LIKE '%".$search."%' AND
    sub_cur = $cur_id ORDER BY sub_sem ASC
    ";
    }else{
        $query = "  
        SELECT sub_code, sub_desc, sub_prereq, sub_unit, sub_year, sub_sem, sub_cur
            FROM subjects
            WHERE
            sub_cur = '$cur_id' AND
            sub_year = 1 AND
            sub_sem = 1
            ";
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
        $sub_code = $row['sub_code'];
        $sub_desc = $row['sub_desc'];
        $sub_prereq = $row['sub_prereq'];
        $sub_unit = $row['sub_unit'];
        $sub_year = $row['sub_year'];
        $sub_sem = $row['sub_sem'];
        echo "
        <tr>
            <td>$sub_code</td>
            <td>$sub_desc</td>
            <td>$sub_prereq</td>
            <td>$sub_unit</td>
            <td>$sub_year</td>
            <td>$sub_sem</td>
        </tr>
        ";
        }
    }
    else
    {
    echo 'Data Not Found';
    }
?>