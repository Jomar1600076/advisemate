<?php
    if(isset($_POST["addChair"])){

        $user_id = $_POST["user_id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $mname = $_POST["mname"];
        $bday = $_POST["bday"];
        $sex = $_POST["sex"];
        $add = $_POST["add"];
        $college = $_POST["college"];
        $course = $_POST["course"];
        $pword = $_POST["pword"];

        $con = mysqli_connect("localhost", "root", "", "advisemate");
        $sql = "INSERT INTO chair (chair_id, chair_fname, chair_mname, chair_lname, chair_bday, chair_sex, chair_add, chair_uname, chair_pword, chair_course, chair_college)
                VALUES
                ('$user_id', '$fname', '$mname', '$lname', '$bday', '$sex', '$add', '$user_id', '$pword', '$course', '$college')";
        if(mysqli_query($con, $sql)){
            echo '<script>
            alert("Student Successfully Added")
            window.location.href = "saUnitChairs.php?"
        </script>';
        }else{
            echo "Error" .mysqli_error($con);
        }
    }
?>