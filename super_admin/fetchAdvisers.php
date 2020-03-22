<?php 
    if(isset($_POST["getAdvisers"])){
        $con = mysqli_connect("localhost", "root", "", "advisemate");
        $sql = "SELECT chair_id, concat(chair_fname,' ',chair_mname, ' ', chair_lname) Fullname, course_desc, college_desc
                FROM
                chair, college, course 
                WHERE
                chair.chair_college =  college.college_id AND
                chair.chair_course = course.course_id
                ";
        $run_query = mysqli_query($con,$sql);
        if (!$run_query) 
        {
         printf("Error: %s\n", mysqli_error($con));
         exit();
     }
        if(mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_array($run_query)){
                $fullname = $row['Fullname'];
                $chair_id = $row['chair_id'];
                $course = $row['course_desc'];
                $college = $row['college_desc'];
                echo "
                <tr>
                    <td><a href=chairProfile.php?id=$chair_id class=text-primary>$chair_id</td>
                    <td>$fullname</td>
                    <td>$course</td>
                    <td>$college</td>
                </tr>
                ";
            }
        }
    }

?>