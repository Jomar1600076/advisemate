<?php
    $con = mysqli_connect("localhost", "root", "", "advisemate");
    if(isset($_POST["addSubject"])){
        $sub_cur = $_GET["id"];
        $sub_code = $_POST["sub_code"];
        $sub_desc = $_POST["sub_desc"];
        $sub_prereq = $_POST["sub_prereq"];
        $sub_unit = $_POST["sub_unit"];
        $sub_sem = $_POST["sub_sem"];
        $sub_year = $_POST["sub_year"];

        $sql = "INSERT INTO subjects (sub_code, sub_desc, sub_prereq, sub_unit, sub_year, sub_sem, sub_cur)
                VALUES
                ('$sub_code', '$sub_desc', '$sub_prereq', '$sub_unit', '$sub_year', '$sub_sem', '$sub_cur')";
                if(mysqli_query($con, $sql)){
                      echo '<script>
                              alert("Subject Successfully Added")
                              javascript:history.go(-1);
                          </script>';   
                }else{
                  echo "Error" .mysqli_error($con);
                }
    }
?>
<!-- Central Modal Small -->
<div class="modal fade" id="SubjectAddModal" tabindex="-1" role="dialog" aria-labelledby="SubjectAddModal"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md modal-center modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Subject</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container">
        <!-- Default form register -->
            <form class="text-center" action="" method="post">
              <div class="form-row mb-4">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Subject Code" name="sub_code" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" value="<?php $_GET["id"]; ?>" name="sub_cur" required>
                </div>
              </div>
              <input type="text"  class="form-control mb-4" placeholder="Subject Description" name="sub_desc" required>
              <input type="text"  class="form-control mb-4" placeholder="Subject Prerequisite" name="sub_prereq" required>
              <div class="form-row mb-4">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Subject Unit" name="sub_unit" required>
                </div>
                <div class="col">
                  <select class="browser-default custom-select mb-2" name="sub_sem" id="sub_sem">
                      <option value = ""selected>Select Sem</option>
                      <option value = "1">First Sem</option>
                      <option value = "2">Second Sem</option>
                      <option value = "3">Summer</option>
                  </select>
                </div>
                <div class="col">
                  <select class="browser-default custom-select mb-2" name="sub_year" id="sub_year">
                      <option value = ""selected>Select Year</option>
                      <option value = "1">First Year</option>
                      <option value = "2">Second Year</option>
                      <option value = "3">Third Year</option>
                      <option value = "4">Fourth Year</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-sm" name="addSubject">Save</button>

            </form>
            <!-- Default form register -->
          </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->
