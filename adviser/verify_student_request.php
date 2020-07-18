    
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
        </tr>
        <?php
    }

    if(isset($_POST['verify'])){
        if(isset($_POST['update'])){
          foreach($_POST['update'] as $updateid){
            $status = 0;
            $createdby = $_SESSION['ad_id'];
            $sql = "UPDATE grades SET grade_status = '".$status."' WHERE id = '$updateid'";
            $run_query = mysqli_query($connect,$sql);
            $id = $_GET['id'];
            $date_now = date("Y-m-d H:i:s");
            $info = "Grade Accepted";
            $log_query = "INSERT INTO grades_log(grade_id, trans_info, trans_date, createdby) VALUES($updateid, '$info', '$date_now', '$createdby')";
            $run_log_query = mysqli_query($connect, $log_query);
          }
          if (!$run_log_query)
          {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
          }else{
            echo '<script>
                    alert("Grade Verified")
                    window.location.href = "javascript:history.go(-1)"
                  </script>';
          }
          if (!$run_query) 
          {
          printf("Error: %s\n", mysqli_error($connect));
          exit();
          }else{
            echo '<script>
              alert("Grade Verified")
              window.location.href = "javascript:history.go(-1)"
            </script>';
          }

        }
      }
?>