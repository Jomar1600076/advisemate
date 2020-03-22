<?php
session_start();
if (!isset($_SESSION["sAdmin_id"])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Advisemate--Se]Uper Admin</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="others/css/bootstrap.min.css" rel="stylesheet">
  <link href="others/css/mdb.min.css" rel="stylesheet">
  <link href="others/css/style.min.css" rel="stylesheet">
  <script type="text/javascript" src="others/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="others/js/popper.min.js"></script>
  <script type="text/javascript" src="others/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="others/js/mdb.min.js"></script>
</head>
<body class="grey lighten-3">
    <header>
        <?php include("includes/navbar.php") ?>
        <?php include("includes/sidebar.php") ?>
        <?php include("StudentSearch.php") ?>
        <?php include("StudentAddModal.php") ?>
    </header>

    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <div class="col">
                <div class="card">
                <div class="card-header primary-color-dark">
                </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                Select Year: From
                                <form method='get' action='log_reports.php'>
                                    <select class="browser-default custom-select mb-2" name="start_year" id="start_year">
                                        <option value="2020/01/01">2020</option>
                                        <option value="2019/01/01">2019</option>
                                        <option value="2018/01/01">2018</option>
                                        <option value="2017/01/01">2017</option>
                                        <option value="2016/01/01">2016</option>
                                        <option value="2015/01/01">2015</option>
                                        <option value="2014/01/01">2014</option>
                                        <option value="2013/01/01">2013</option>
                                        <option value="2012/01/01">2012</option>
                                        <option value="2011/01/01">2011</option>
                                        <option value="2010/01/01">2010</option>
                                        <option value="2009/01/01">2009</option>
                                        <option value="2008/01/01">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    To
                                    <select class="browser-default custom-select mb-2" name="end_year" id="end_year">
                                        <option value="2020/01/01">2020</option>
                                        <option value="2019/01/01">2019</option>
                                        <option value="2018/01/01">2018</option>
                                        <option value="2017/01/01">2017</option>
                                        <option value="2016/01/01">2016</option>
                                        <option value="2015/01/01">2015</option>
                                        <option value="2014/01/01">2014</option>
                                        <option value="2013/01/01">2013</option>
                                        <option value="2012/01/01">2012</option>
                                        <option value="2011/01/01">2011</option>
                                        <option value="2010/01/01">2010</option>
                                        <option value="2009/01/01">2009</option>
                                        <option value="2008/01/01">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    <input type="submit" class="btn btn-primary btn-sm" value="Generate">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>