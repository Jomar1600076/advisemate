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
        $cur = $_POST["cur"];
        $yr_started = date("Y-m-d");
        
        $sql = "INSERT INTO students (student_id, fname, mname, lname, bday, sex, address, pword, student_course, student_college, year_lvl, year_started, stud_cur)
                VALUES
                ('$user_id', '$fname', '$mname', '$lname', '$bday', '$sex', '$add', '$user_id', '$course', '$college', '$yr_lvl', '$yr_started', '$cur')";
        if(mysqli_query($con, $sql)){
          $cur = $_POST["cur"];
          $user_id = $_POST["student_id"];
            if ($cur == 1){
              $query="INSERT INTO grades (student_id, sub_code, grade, grade_status) 
            VALUES 
              ('$user_id', 'ENG_101', '', '2'),
              ('$user_id', 'ENG_103', '', '2'),
              ('$user_id', 'ENG_108', '', '2'),
              ('$user_id', 'ENG_112', '', '2'),
              ('$user_id', 'ENG_113', '', '2'),
              ('$user_id', 'FIL_101', '', '2'),
              ('$user_id', 'FIL_102', '', '2'),
              ('$user_id', 'HUM_103', '', '2'),
              ('$user_id', 'HUM_104', '', '2'),
              ('$user_id', 'HUM_106', '', '2'),
              ('$user_id', 'IT_101', '', '2'),
              ('$user_id', 'IT_102', '', '2'),
              ('$user_id', 'IT_103', '', '2'),
              ('$user_id', 'IT_104', '', '2'),
              ('$user_id', 'IT_105', '', '2'),
              ('$user_id', 'IT_201', '', '2'),
              ('$user_id', 'IT_202', '', '2'),
              ('$user_id', 'IT_203', '', '2'),
              ('$user_id', 'IT_204', '', '2'),
              ('$user_id', 'IT_205', '', '2'),
              ('$user_id', 'IT_206', '', '2'),
              ('$user_id', 'IT_207', '', '2'),
              ('$user_id', 'IT_208', '', '2'),
              ('$user_id', 'IT_301', '', '2'),
              ('$user_id', 'IT_302', '', '2'),
              ('$user_id', 'IT_303', '', '2'),
              ('$user_id', 'IT_304', '', '2'),
              ('$user_id', 'IT_305', '', '2'),
              ('$user_id', 'IT_306', '', '2'),
              ('$user_id', 'IT_307', '', '2'),
              ('$user_id', 'IT_308', '', '2'),
              ('$user_id', 'IT_309', '', '2'),
              ('$user_id', 'IT_310', '', '2'),
              ('$user_id', 'IT_311', '', '2'),
              ('$user_id', 'IT_401', '', '2'),
              ('$user_id', 'IT_402', '', '2'),
              ('$user_id', 'IT_403', '', '2'),
              ('$user_id', 'IT_404', '', '2'),
              ('$user_id', 'IT_405', '', '2'),
              ('$user_id', 'IT_406', '', '2'),
              ('$user_id', 'IT_407', '', '2'),
              ('$user_id', 'IT_408', '', '2'),
              ('$user_id', 'IT_409', '', '2'),
              ('$user_id', 'MATH_106', '', '2'),
              ('$user_id', 'MATH_108', '', '2'),
              ('$user_id', 'MATH_112', '', '2'),
              ('$user_id', 'MATH_121', '', '2'),
              ('$user_id', 'NSTP_101', '', '2'),
              ('$user_id', 'NSTP_102', '', '2'),
              ('$user_id', 'PE_101', '', '2'),
              ('$user_id', 'PE_102', '', '2'),
              ('$user_id', 'PE_103', '', '2'),
              ('$user_id', 'PE_104', '', '2'),
              ('$user_id', 'SCI_101', '', '2'),
              ('$user_id', 'SCI_102A', '', '2'),
              ('$user_id', 'SCI_117', '', '2'),
              ('$user_id', 'SCI_135L-1', '', '2'),
              ('$user_id', 'SOCSCI_101', '', '2'),
              ('$user_id', 'SOCSCI_103', '', '2'),
              ('$user_id', 'SOCSCI_104', '', '2'),
              ('$user_id', 'SOCSCI_105', '', '2'),
              ('$user_id', 'SOCSCI_106', '', '2'),
              ('$user_id', 'SOCSCI_115', '', '2')
              ";
            }elseif($cur==2){
              $query="INSERT INTO grades(student_id, sub_code, grade, grade_status) 
              VALUES 
                ('$user_id', 'GE 101', '', '2'),
                ('$user_id', 'GE 105', '', '2'),
                ('$user_id', 'NSTP 102', '', '2'),
                ('$user_id', 'PE 102', '', '2'),
                ('$user_id', 'IT 105', '', '2'),
                ('$user_id', 'IT 105 L', '', '2'),
                ('$user_id', 'IT 106', '', '2'),
                ('$user_id', 'IT 107', '', '2'),
                ('$user_id', 'IT 107 L', '', '2'),
                ('$user_id', 'IT 108', '', '2'),
                ('$user_id', 'IT 108 L', '', '2'),
                ('$user_id', 'GE 104', '', '2'),
                ('$user_id', 'GE 103', '', '2'),
                ('$user_id', 'GE 102', '', '2'),
                ('$user_id', 'GE 122', '', '2'),
                ('$user_id', 'NSTP 101', '', '2'),
                ('$user_id', 'PE 101', '', '2'),
                ('$user_id', 'IT 101', '', '2'),
                ('$user_id', 'IT 201 L', '', '2'),
                ('$user_id', 'IT 102', '', '2'),
                ('$user_id', 'IT 103', '', '2'),
                ('$user_id', 'IT 103 L', '', '2'),
                ('$user_id', 'IT 104', '', '2'),
                ('$user_id', 'IT 114', '', '2'),
                ('$user_id', 'PE 104', '', '2'),
                ('$user_id', 'GE 125', '', '2'),
                ('$user_id', 'GE 106', '', '2'),
                ('$user_id', 'IT 114 L', '', '2'),
                ('$user_id', 'IT 115', '', '2'),
                ('$user_id', 'IT 116', '', '2'),
                ('$user_id', 'IT 116 L', '', '2'),
                ('$user_id', 'IT 117', '', '2'),
                ('$user_id', 'IT 117 L', '', '2'),
                ('$user_id', 'GE 107', '', '2'),
                ('$user_id', 'IT 113 L', '', '2'),
                ('$user_id', 'GE 113', '', '2'),
                ('$user_id', 'PE 103', '', '2'),
                ('$user_id', 'IT 109', '', '2'),
                ('$user_id', 'IT 109 L', '', '2'),
                ('$user_id', 'IT 110', '', '2'),
                ('$user_id', 'IT 111', '', '2'),
                ('$user_id', 'IT 111 L', '', '2'),
                ('$user_id', 'IT 112', '', '2'),
                ('$user_id', 'IT 112 L', '', '2'),
                ('$user_id', 'IT 113', '', '2'),
                ('$user_id', 'IT 126', '', '2'),
                ('$user_id', 'IT 125 L', '', '2'),
                ('$user_id', 'IT 125', '', '2'),
                ('$user_id', 'IT 124 L', '', '2'),
                ('$user_id', 'IT 124', '', '2'),
                ('$user_id', 'IT 127', '', '2'),
                ('$user_id', 'IT 127 L', '', '2'),
                ('$user_id', 'IT 128', '', '2'),
                ('$user_id', 'IT 128 L', '', '2'),
                ('$user_id', 'IT 129', '', '2'),
                ('$user_id', 'IT 129 L', '', '2'),
                ('$user_id', 'IT 123 L', '', '2'),
                ('$user_id', 'IT 123', '', '2'),
                ('$user_id', 'GE 108', '', '2'),
                ('$user_id', 'GE 117', '', '2'),
                ('$user_id', 'GE 126', '', '2'),
                ('$user_id', 'IT 118', '', '2'),
                ('$user_id', 'IT 118 L', '', '2'),
                ('$user_id', 'IT 119', '', '2'),
                ('$user_id', 'IT 119 L', '', '2'),
                ('$user_id', 'IT 120', '', '2'),
                ('$user_id', 'IT 120 L', '', '2'),
                ('$user_id', 'IT 121', '', '2'),
                ('$user_id', 'IT 121 L', '', '2'),
                ('$user_id', 'IT 122', '', '2'),
                ('$user_id', 'IT 122 L', '', '2'),
                ('$user_id', 'IT 113 L', '', '2'),
                ('$user_id', 'IT 113', '', '2'),
                ('$user_id', 'IT 132 L', '', '2'),
                ('$user_id', 'IT 132', '', '2'),
                ('$user_id', 'IT 131', '', '2'),
                ('$user_id', 'IT 130 L', '', '2'),
                ('$user_id', 'IT 130', '', '2'),
                ('$user_id', 'IT 134', '', '2')
                ";
            }
            if(mysqli_query($con, $query))
                {
                    echo '<script>
                    alert("Student Successfully Added")
                    window.location.href = "javascript:history.go(-1)"
                </script>';
                  $createdby = $_SESSION["ad_id"];
                  $date_now = date("Y-m-d H:i:s");
                  $info = "Added Student";
                  $log_query = "INSERT INTO student_logs(student_id, trans_info, trans_date, createdby) VALUES($user_id, '$info', '$date_now', '$createdby')";
                  if(mysqli_query($con, $log_query)){
        
                  }else{
                    echo "Error" .mysqli_error($con);
                  }
                }
            else
                {
                  echo "Error" .mysqli_error($con);
                }
        }else{
            echo "Error" .mysqli_error($con);
        }
    }
?>
<!-- Central Modal Small -->
<?php include("college_course.php")?>
<?php include("fetch_yrlvl.php")?>
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
            <form class="text-center" action="" method="post" autocomplete="off">
              <input type="text" id="defaultRegisterFormUserID" class="form-control mb-2" placeholder="Student ID" name="student_id" required>
              <input type="text" id="defaultRegisterFormFname" class="form-control mb-2" placeholder="First Name" name="fname" required>
              <input type="text" id="defaultRegisterPhoneLname" class="form-control mb-2" placeholder="Last Name" name="lname" required>
              <input type="text" id="defaultRegisterPhoneMname" class="form-control mb-2" placeholder="MIddle Name" name="mname" required>
              <input type="date" id="defaultRegisterFormBday" class="form-control mb-2" placeholder="Birthday" name="bday" required>
              <select class="browser-default custom-select mb-2" name="sex">
                <option selected>Sex</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <input type="hidden" id="defaultRegisterFormYr_Lvl" class="form-control mb-2" value="<?php echo $_SESSION["ad_yrlvl"]; ?>" name="yr_lvl" required>
              <input type="text" id="defaultRegisterFormAddress" class="form-control mb-2" placeholder="Address" name="add" required>
              <select class="browser-default custom-select mb-2" name="cur">
                  <option value = ""selected>Select Curriculum</option>
                  <?php echo $cur;?>
              </select>
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
