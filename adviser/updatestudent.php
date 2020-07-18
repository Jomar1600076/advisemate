<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    $con = mysqli_connect("localhost", "root", "", "advisemate");
    $user_id = $_POST['user_id'];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $bday = $_POST["bday"];
    $sex = $_POST["sex"];
    $add = $_POST["add"];

    $sql = "UPDATE students set fname='$fname', lname='$lname', bday='$bday', sex='$sex', address='$add'
            WHERE student_id = '$user_id'";
    
    if(mysqli_query($con, $sql)){
                echo '<script>
                        alert("Student Information Updated")
                        window.location.href = "javascript:history.go(-1)"
                    </script>';
                    $createdby = $_SESSION["ad_id"];
                    $date_now = date("Y-m-d H:i:s");
                    $info = "Updated Student Info";
                    $log_query = "INSERT INTO student_logs(student_id, trans_info, trans_date, createdby) VALUES($user_id, '$info', '$date_now', '$createdby')";
                    if(mysqli_query($con, $log_query)){
            
                    }else{
                        echo "Error" .mysqli_error($con);
                    }
            }else{
                echo "Error" .mysqli_error($con);
                /* echo '<script>
                        alert("Info Update Failed")
                        window.location.href = "javascript:history.go(-1)"
                    </script>'; */
            }
?>