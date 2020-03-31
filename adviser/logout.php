<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "advisemate";

$con = mysqli_connect($servername, $username, $password,$db);
$u_id = $_SESSION["ad_id"];
$uip = $_SERVER['REMOTE_ADDR'];
$action="Logout";
$date = date('Y-m-d H:i:s');
$query = "INSERT INTO user_logs (u_id, u_ip, u_action, date_login)VALUES('$u_id','$uip','$action','$date')";
$result = mysqli_query($con, $query);
if( !mysqli_num_rows($result) > 0){
    unset($_SESSION["ad_id"]);
    unset($_SESSION["ad_fname"]);
    header("location:login.php");
}else{
    echo "ERROR";
}
?>