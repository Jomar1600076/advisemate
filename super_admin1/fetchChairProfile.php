<?php
    $chair_id = $_GET['id'];
    $connect = mysqli_connect("localhost", "root", "", "advisemate");
    $sql = "SELECT * FROM chair WHERE chair_id = '$chair_id'";
    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result))
    {
        $chair_id = $row['chair_id'];
        $fname = $row['chair_fname'];
        $mname = $row['chair_mname'];
        $lname = $row['chair_lname'];
        $bday = $row['chair_bday'];
        $sex = $row['chair_sex'];
        $add = $row['chair_add'];
    }
?>