
<button class="btn btn-primary btn-sm float-right" id="editgrade">Edit</button>
        <form method="POST" action="">
        
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Grade</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Description</th>
                <th scope="col">Subject Pre-requisite</th>
                <th scope="col">Subject Unit</th>
            </tr>
        </thead>
        <tbody>
<?php
    $stud_id = $_GET['id'];
    $connect = mysqli_connect("localhost", "root", "", "advisemate");
    $query = "SELECT *
    FROM subjects
    LEFT JOIN grades ON grades.sub_code = subjects.sub_code 
    LEFT JOIN students ON students.student_id = grades.student_id 
    WHERE students.student_id = '$stud_id' AND grades.student_id = $stud_id
    ORDER BY subjects.sub_year ASC ,subjects.sub_sem ASC
    ";

    $result = mysqli_query($connect, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($connect));
        exit();
    }
        $count = mysqli_num_rows($result);
        if(isset($_POST["submit"])){

        $count=count($_POST["grade_id"]);
        for($i=0;$i<$count;$i++){
            $sql="UPDATE grades SET grade='" . $_POST['grades'][$i] . "', grade_status='1' WHERE id='" . $_POST['grade_id'][$i] . "'";
            $res=mysqli_query($connect, $sql);
        }
            if(!$res){
                printf("Error: %s\n", mysqli_error($connect));
                exit();
            } 
        }
        mysqli_close($connect);
        echo $count;
        while($row = mysqli_fetch_array($result))  
            {
                $sub_code = $row['sub_code'];
        ?>
        <tr>
            <td>
                <div class="form-group w-50">
                    <input type="text" class="input_grade" name="grades[]" value="<?php echo $row['grade']; ?>" disabled>
                </div>
            </td>
            <td><?php echo $row['sub_code']; ?></td>
            <td><?php echo $row['sub_desc']; ?></td>
            <td><?php echo $row['sub_prereq']; ?></td>
            <td><?php echo $row['sub_unit']; ?></td>
            <td style="display:none;"><input type="hidden" name="grade_id[]" value="<?php echo $row['id']; ?>"> </td>
            <?php

            }
        ?>
        </tr>
        <button class="btn btn-primary btn-sm float-right" id="submit" type="submit" name="submit">Submit</button>
        </form>
        </tbody>
        </table>
        <script>
		$(document).ready(function(){
			$("#submit").prop('hidden', true);
        	$("#editgrade").click(function(event){ 
                $(".input_grade").prop('disabled', false);
                $("#editgrade").prop('hidden', true);
                $("#submit").prop('hidden', false);
        });
        })
        </script>