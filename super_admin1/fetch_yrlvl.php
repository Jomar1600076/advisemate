<?php
  $connect = mysqli_connect("localhost", "root", "", "advisemate");
  $query = "SELECT * FROM year_lvl";
  $result2 = mysqli_query($connect, $query);

  $yr_lvl = "";
  while($row2 = mysqli_fetch_array($result2))
  {
      $yr_lvl = $yr_lvl."<option value=$row2[0]>$row2[1]</option>";
  }

/* curriculum*/
  $sqlcur = "SELECT * FROM curriculum";
  $curres = mysqli_query($connect, $sqlcur);

  $cur = "";
  while($row2 = mysqli_fetch_array($curres))
  {
      $cur = $cur."<option value=$row2[0]>$row2[2]</option>";
  }
/* semester */
  $sqlsem = "SELECT * FROM sem";
  $cursem = mysqli_query($connect, $sqlsem);
  $sem = "";
  while($row2 = mysqli_fetch_array($cursem)){
      $sem = $sem."<option value=$row2[0]>$row2[1]</option>";
  }
  /* adviser */
  $sqlcur = "SELECT * FROM curriculum";
  $curcur = mysqli_query($connect, $sqlcur);
  $cur = "";
  while($row = mysqli_fetch_array($curcur)){
      $cur = $cur."<option value=$row[0]>$row[2]</option>";
  }
?>