<?php
    $con = mysqli_connect("localhost", "root", "", "advisemate");
    if(isset($_POST["addAdviser"])){
        $user_id = $_POST["ad_id"];
        $fname = $_POST["ad_fname"];
        $lname = $_POST["ad_lname"];
        $mname = $_POST["ad_mname"];
        $bday = $_POST["ad_bday"];
        $sex = $_POST["ad_sex"];
        $add = $_POST["ad_address"];
        $college = $_POST["ad_college"];
        $course = $_POST["ad_course"];
        $yr_lvl = $_POST["ad_yr_lvl"];

        $sql = "INSERT INTO advisers(ad_id, ad_fname, ad_mname, ad_lname, ad_sex, ad_address, ad_bday, ad_yrlvl, ad_pword, ad_uname, ad_college, ad_course)
                VALUES
                ('$user_id', '$fname', '$mname', '$lname', '$sex', '$add', '$bday', '$yr_lvl' ,'$user_id', '$user_id', '$college', '$course')";
        if(mysqli_query($con, $sql)){
            echo '<script>
                    alert("Adviser Successfully Added")
                    location.reload();
                </script>';
        }else{
            echo "Error" .mysqli_error($con);
        }
    }
    if(isset($_POST["editStudent"])){
        error_reporting(E_ERROR | E_PARSE);
        $user_id = false;
        if(isset($_POST['user_id'])){
            $user_id = $_POST['user_id'];
        }
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $bday = $_POST["bday"];
        $sex = $_POST["sex"];
        $add = $_POST["add"];

        $sql = "UPDATE students set fname='$fname', lname='$lname', bday='$bday', sex='$sex', address='$add'
                WHERE student_id = '$user_id'";
        echo $sql;
        $run_query = mysqli_query($con, $sql);
            if(mysqli_num_rows($run_query) < 0){
                    echo '<script>
                            alert("Student Successfully Added")
                            window.location.href = "javascript:history.go(-1)"
                        </script>';
                }else{
                    echo '<script>
                            alert("Student Successfully Added")
                            window.location.href = "javascript:history.go(-1)"
                        </script>';
                }
    }
?>
<!-- Central Modal Small -->
<?php include("college_course.php")?>
<div class="modal fade" id="AdviserAddModal" tabindex="-1" role="dialog" aria-labelledby="AdviserAddModal"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md modal-center modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Adviser</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Default form register -->
            <form class="text-center" action="" method="post">
              <input type="text" id="defaultRegisterFormUserID" class="form-control mb-2" placeholder="Employee ID" name="ad_id" required>
              <input type="text" id="defaultRegisterFormFname" class="form-control mb-2" placeholder="First Name" name="ad_fname" required>
              <input type="text" id="defaultRegisterPhoneLname" class="form-control mb-2" placeholder="Last Name" name="ad_lname" required>
              <input type="text" id="defaultRegisterPhoneMname" class="form-control mb-2" placeholder="MIddle Name" name="ad_mname" required>
              <input type="date" id="defaultRegisterFormBday" class="form-control mb-2" placeholder="Birthday" name="ad_bday" required>
              <input type="text" id="defaultRegisterFormSex" class="form-control mb-2" placeholder="Sex" name="ad_sex" required>
              <input type="text" id="defaultRegisterFormYr_Lvl" class="form-control mb-2" placeholder="Year Level" name="ad_yr_lvl" required>
              <input type="text" id="defaultRegisterFormAddress" class="form-control mb-2" placeholder="Address" name="ad_address" required>
              <select class="browser-default custom-select mb-2" name="ad_college">
                  <?php echo $options;?>
              </select>
              <select class="browser-default custom-select mb-2" name="ad_course">
                  <?php echo $opts;?>
              </select>
              <button type="submit" class="btn btn-primary btn-sm" name="addAdviser">Save</button>

            </form>
            <!-- Default form register -->
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->
