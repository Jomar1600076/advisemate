<?php 
  error_reporting(E_ERROR | E_WARNING | E_PARSE);


  if(isset($_POST["student_prospectus"]))

                $id = $_GET['id'];
                $connect = mysqli_connect("localhost", "root", "", "advisemate");
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
                WHERE (grades.student_id = '$id') AND subjects.sub_year = '1'
              
                ORDER BY subjects.sub_year ASC ,subjects.sub_sem ASC
                ";
    
                $result = mysqli_query($connect, $query);
                if (!$result) {
                    printf("Error: %s\n", mysqli_error($connect));
                    exit();
                }
                while($row = mysqli_fetch_array($result))  
                               {
                  ?>
                <tr>
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



?>