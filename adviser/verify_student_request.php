    
<?php
    $stid = $_GET['id'];
    $connect = mysqli_connect("localhost", "root", "", "advisemate");
    $query = $query = "SELECT grades.sub_code, grades.id, subjects.sub_code, subjects.sub_desc, grade FROM 
        grades, subjects 
        WHERE grades.grade_status = '1'  
        AND grades.sub_code= subjects.sub_code
        AND grades.student_id = '$stid'";

    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result))  
        {
        $id = $row['id'];
        $grade = $row['grade'];
        $sub_code = $row['sub_code'];
        $sub_desc = $row['sub_desc'];                   
        ?>
        <tr class="row">
            <td class="col-md-2"><input type="checkbox" class="ml-5" id="veri_grades" name='update[]' value='<?= $id ?>' ></td>
            <td class="col-md-1"><?php echo $grade; ?></td>
            <td class="col-md-2"><?php echo $sub_code; ?></td>
            <td class="col-md-5"><?php echo $sub_desc; ?></td>
            <td class="col-md-1"><a href="verify_student.php?id='<?php echo $row['id']; ?>'" class="btn btn-info btn-sm"><i class="fas fa-check-circle mr-2"></i></a></td>
        <?php
    }

    if(isset($_POST['verify'])){
        if(isset($_POST['update'])){
          foreach($_POST['update'] as $updateid){
            $status = 0;
            $sql = "UPDATE grades SET grade_status = '".$status."' WHERE id = '$updateid'";
            $run_query = mysqli_query($connect,$sql);
          }
          if (!$run_query) 
            {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
            } 
        }
      }
?>