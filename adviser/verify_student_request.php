    
<?php
    $id = $_GET['id'];
    $connect = mysqli_connect("localhost", "root", "", "advisemate");
    $query = $query = "SELECT grades.sub_code, grades.id, subjects.sub_code, subjects.sub_desc, grade FROM 
        grades, subjects 
        WHERE grades.grade_status = '1'  
        AND grades.sub_code= subjects.sub_code
        AND grades.student_id = '$id'";

    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result))  
        {                   
        ?>
        <tr>
        <td><?php echo $row['grade']; ?></td>
            <td><?php echo $row['sub_code']; ?></td>
            <td><?php echo $row['sub_desc']; ?></td>
            <td><a href="verify_student.php?id='<?php echo $row['id']; ?>'" class="btn btn-info btn-sm"><i class="fas fa-check-circle mr-2"></i>Confirm</a></td>
        <?php
    }
?>