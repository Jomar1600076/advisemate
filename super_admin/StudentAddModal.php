<?php
    $con = mysqli_connect("localhost", "root", "", "advisemate");
    if(isset($_POST["addStudent"])){
        $user_id = $_POST["student_id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $mname = $_POST["mname"];
        $bday = $_POST["bday"];
        $sex = $_POST["sex"];
        $add = $_POST["add"];
        $college = $_POST["college"];
        $course = $_POST["course"];
        $yr_lvl = $_POST["yr_lvl"];
        $yr_started = date("Y-m-d");

        $sql = "INSERT INTO students (student_id, fname, mname, lname, bday, sex, address, pword, student_course, student_college, year_lvl, year_started)
                VALUES
                ('$user_id', '$fname', '$mname', '$lname', '$bday', '$sex', '$add', '$user_id', '$course', '$college', '$yr_lvl', '$yr_started')";
        if(mysqli_query($con, $sql)){
          $query="INSERT INTO grades (student_id, sub_code, grade, grade_status) 
		VALUES 
			('$user_id', 'ENG_101', '', ''),
			('$user_id', 'ENG_103', '', ''),
			('$user_id', 'ENG_108', '', ''),
			('$user_id', 'ENG_112', '', ''),
			('$user_id', 'ENG_113', '', ''),
			('$user_id', 'FIL_101', '', ''),
			('$user_id', 'FIL_102', '', ''),
			('$user_id', 'HUM_103', '', ''),
			('$user_id', 'HUM_104', '', ''),
			('$user_id', 'HUM_106', '', ''),
			('$user_id', 'IT_101', '', ''),
			('$user_id', 'IT_102', '', ''),
			('$user_id', 'IT_103', '', ''),
			('$user_id', 'IT_104', '', ''),
			('$user_id', 'IT_105', '', ''),
			('$user_id', 'IT_201', '', ''),
			('$user_id', 'IT_202', '', ''),
			('$user_id', 'IT_203', '', ''),
			('$user_id', 'IT_204', '', ''),
			('$user_id', 'IT_205', '', ''),
			('$user_id', 'IT_206', '', ''),
			('$user_id', 'IT_207', '', ''),
			('$user_id', 'IT_208', '', ''),
			('$user_id', 'IT_301', '', ''),
			('$user_id', 'IT_302', '', ''),
			('$user_id', 'IT_303', '', ''),
			('$user_id', 'IT_304', '', ''),
			('$user_id', 'IT_305', '', ''),
			('$user_id', 'IT_306', '', ''),
			('$user_id', 'IT_307', '', ''),
			('$user_id', 'IT_308', '', ''),
			('$user_id', 'IT_309', '', ''),
			('$user_id', 'IT_310', '', ''),
			('$user_id', 'IT_311', '', ''),
			('$user_id', 'IT_401', '', ''),
			('$user_id', 'IT_402', '', ''),
			('$user_id', 'IT_403', '', ''),
			('$user_id', 'IT_404', '', ''),
			('$user_id', 'IT_405', '', ''),
			('$user_id', 'IT_406', '', ''),
			('$user_id', 'IT_407', '', ''),
			('$user_id', 'IT_408', '', ''),
			('$user_id', 'IT_409', '', ''),
			('$user_id', 'MATH_106', '', ''),
			('$user_id', 'MATH_108', '', ''),
			('$user_id', 'MATH_112', '', ''),
			('$user_id', 'MATH_121', '', ''),
			('$user_id', 'NSTP_101', '', ''),
			('$user_id', 'NSTP_102', '', ''),
			('$user_id', 'PE_101', '', ''),
			('$user_id', 'PE_102', '', ''),
			('$user_id', 'PE_103', '', ''),
			('$user_id', 'PE_104', '', ''),
			('$user_id', 'SCI_101', '', ''),
			('$user_id', 'SCI_102A', '', ''),
			('$user_id', 'SCI_117', '', ''),
			('$user_id', 'SCI_135L-1', '', ''),
			('$user_id', 'SOCSCI_101', '', ''),
			('$user_id', 'SOCSCI_103', '', ''),
			('$user_id', 'SOCSCI_104', '', ''),
			('$user_id', 'SOCSCI_105', '', ''),
			('$user_id', 'SOCSCI_106', '', ''),
			('$user_id', 'SOCSCI_115', '', '')
      ";
        if(mysqli_query($con, $query)){
              echo '<script>
                      alert("Student Successfully Added")
                      location.reload();
                  </script>';
                }else{
                  echo "Error" .mysqli_error($con);
          }
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
<div class="modal fade" id="StudentAddModal" tabindex="-1" role="dialog" aria-labelledby="StudentAddModal"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md modal-center modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Student</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Default form register -->
            <form class="text-center" action="" method="post">
              <input type="text" id="defaultRegisterFormUserID" class="form-control mb-2" placeholder="Student ID" name="student_id" required>
              <input type="text" id="defaultRegisterFormFname" class="form-control mb-2" placeholder="First Name" name="fname" required>
              <input type="text" id="defaultRegisterPhoneLname" class="form-control mb-2" placeholder="Last Name" name="lname" required>
              <input type="text" id="defaultRegisterPhoneMname" class="form-control mb-2" placeholder="MIddle Name" name="mname" required>
              <input type="date" id="defaultRegisterFormBday" class="form-control mb-2" placeholder="Birthday" name="bday" required>
              <input type="text" id="defaultRegisterFormSex" class="form-control mb-2" placeholder="Sex" name="sex" required>
              <input type="text" id="defaultRegisterFormYr_Lvl" class="form-control mb-2" placeholder="Year Level" name="yr_lvl" required>
              <input type="text" id="defaultRegisterFormAddress" class="form-control mb-2" placeholder="Address" name="add" required>
              <select class="browser-default custom-select mb-2" name="college">
                  <?php echo $options;?>
              </select>
              <select class="browser-default custom-select mb-2" name="course">
                  <?php echo $opts;?>
              </select>
              <button type="submit" class="btn btn-primary btn-sm" name="addStudent">Save</button>

            </form>
            <!-- Default form register -->
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->
