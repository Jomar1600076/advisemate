<?php
    session_start();
    $user_id = $_SESSION["uid"];
    $connect = mysqli_connect("localhost", "root", "", "advisemate");
    $query = "SELECT * from students WHERE student_id = '$user_id'";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result))  
        {
            $year_lvl = $row['year_lvl'];
            $yearStarted = date("Y", strtotime($row['year_started']));
            $currentYear= date("Y");
            $yearDifference = $currentYear-$yearStarted;
            $year_lvl = $year_lvl+$yearDifference;
            echo $year_lvl;
        }
?>