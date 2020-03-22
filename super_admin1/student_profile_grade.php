<?php
    $id = $_GET['id'];
    $connect = mysqli_connect("localhost", "root", "", "advisemate");
    $query = "SELECT *
    FROM subjects
    LEFT JOIN grades ON grades.sub_code = subjects.sub_code 
    LEFT JOIN students ON students.student_id = grades.student_id 
    WHERE students.student_id = '$id' AND grades.student_id = $id
    ORDER BY subjects.sub_year ASC ,subjects.sub_sem ASC
    ";

    $result = mysqli_query($connect, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($connect));
        exit();
    }?>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Subject Year</th>
                <th scope="col">Grade</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Description</th>
                <th scope="col">Subject Pre-requisite</th>
                <th scope="col">Subject Unit</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($result))  
                    {
                    $sub_code = $row['sub_code'];
        ?>
        <tr>
            <td><?php echo $row['sub_year']; ?></td>
            <td><?php echo $row['grade']; ?></td>
            <td><?php echo $row['sub_code']; ?></td>
            <td><?php echo $row['sub_desc']; ?></td>
            <td><?php echo $row['sub_prereq']; ?></td>
            <td><?php echo $row['sub_unit']; ?></td>
            <?php

            }
        ?>
        </tr>
        </tbody>
        </table>