<?php 
    if(isset($_POST["getSubjects"])){
        $con = mysqli_connect("localhost", "root", "", "advisemate");
        $cur_id = $_GET["id"];
        $sql = "SELECT sub_code, sub_desc, sub_prereq, sub_unit, sub_year, sub_sem, sub_cur
                FROM
                subjects
                WHERE
                sub_cur = $cur_id AND
                sub_year = 1 AND
                sub_sem = 1
                ";
        $run_query = mysqli_query($con,$sql);
        if (!$run_query) 
        {
        printf("Error: %s\n", mysqli_error($con));
        exit();
        }
        if(mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_array($run_query)){
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
    }

?>