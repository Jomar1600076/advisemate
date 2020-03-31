<?php

session_start();

unset($_SESSION["sAdmin_id"]);

unset($_SESSION["sAdmin_name"]);

header("location:login.php");

?>