<?php
  $connect = mysqli_connect("localhost", "root", "", "advisemate");
  $query = "SELECT * FROM college";
  $result2 = mysqli_query($connect, $query);

  $options = "";
  while($row2 = mysqli_fetch_array($result2))
  {
      $options = $options."<option value=$row2[0]>$row2[1]</option>";
  }
  $sql = "SELECT * FROM course";
  $res2 = mysqli_query($connect, $sql);

  $opts = "";
  while($rows2 = mysqli_fetch_array($res2))
  {
      $opts = $opts."<option value=$rows2[0]>$rows2[2]</option>";
  }
?>