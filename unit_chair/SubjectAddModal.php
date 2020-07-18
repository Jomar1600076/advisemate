<?php
    $con = mysqli_connect("localhost", "root", "", "advisemate");
    if(isset($_POST["addSubject"])){
        $sub_cur = $_POST["sub_cur"];
        $sub_code = $_POST["sub_code"];
        $sub_desc = $_POST["sub_desc"];
        $sub_prereq = $_POST["sub_prereq"];
        $sub_unit = $_POST["sub_unit"];
        $sub_sem = $_POST["sub_sem"];
        $sub_year = $_POST["sub_year"];

        $totalSubcode = sizeof($sub_code);

        for($i=0;$i<$totalSubcode;$i++) {

        $insub_cur = $sub_cur[$i];
        $insub_code = $sub_code[$i];  
        $insub_desc = $sub_desc[$i];
        $insub_prereq = $sub_prereq[$i];
        $insub_unit = $sub_unit[$i];
        $insub_sem = $sub_sem[$i];
        $insub_year = $sub_year[$i];
        $sql = "INSERT INTO subjects (sub_code, sub_desc, sub_prereq, sub_unit, sub_year, sub_sem, sub_cur)
                VALUES
                ('$insub_code', '$insub_desc', '$insub_prereq', '$insub_unit', '$insub_year', '$insub_sem', '$insub_cur')";
        $res=mysqli_query($con, $sql);

        $createdby = $_SESSION["chair_id"];
        $date_now = date("Y-m-d H:i:s");
        $info = "Subject Added";
        $log_query = "INSERT INTO subject_logs (trans_info, trans_date, createdby, sub_id) VALUES('$info', '$date_now', '$createdby', '$insub_code')";
        $result = mysqli_query($con, $log_query);
        }
        if(!$result)
          {
            printf("Error: %s\n", mysqli_error($con));
          exit();
          }
        if(!$res)                   {
          printf("Error: %s\n", mysqli_error($con));
          exit();
        } 
    }
?>
<!-- Central Modal Small -->
<div class="modal fade" id="SubjectAddModal" tabindex="-1" role="dialog" aria-labelledby="SubjectAddModal"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg modal-full-height modal-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Subject</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container">
          <div class="row mb-2">
            <button id="Add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></button>
            <button id="Remove" class="btn btn-danger btn-sm "><i class="fas fa-minus"></i></button>
          </div>
          
          
        <!-- Default form register -->
            <form class="text-center" action="" method="post" autocomplete="off">
              <div class="form-row mb-2" id="textboxDiv">
                <input type="hidden" value="<?php echo $_GET["id"]?>" name="sub_cur[]">
                <div class="form-row mb-1">
                  <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Subject Code" name="sub_code[]" required>
                  </div>
                  <div class="col ">
                    <input type="text"  class="form-control mb-4" placeholder="Subject Description" name="sub_desc[]" required>
                  </div>
                  <div class="col-md-2">
                    <input type="text"  class="form-control mb-4" placeholder="Subject Prerequisite" name="sub_prereq[]" required>
                  </div>
                  <div class="col-md-1">
                    <input type="text" class="form-control" placeholder="Units" name="sub_unit[]" required>
                  </div>
                  <div class="col-md-2">
                    <select class="browser-default custom-select mb-2" name="sub_sem[]" id="sub_sem">
                        <option value = ""selected>Select Sem</option>
                        <option value = "1">First Sem</option>
                        <option value = "2">Second Sem</option>
                        <option value = "3">Summer</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <select class="browser-default custom-select mb-2" name="sub_year[]" id="sub_year">
                        <option value = ""selected>Select Year</option>
                        <option value = "1">First Year</option>
                        <option value = "2">Second Year</option>
                        <option value = "3">Third Year</option>
                        <option value = "4">Fourth Year</option>
                    </select>
                  </div>
                </div>
              </div> 

            <!-- Default form register -->
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm" name="addSubject">Save</button>

      </form>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->

<script>  
        $(document).ready(function() {  

          const queryString = window.location.search;
          const urlParams = new URLSearchParams(queryString);
          const cur_id = urlParams.get('id');
          console.log(cur_id);
            $("#Add").on("click", function() {  
                $("#textboxDiv").append("<input type='hidden' value='+cur_id+' name='sub_cur[]'><div class=form-row mb-1'><div class=col-md-2><input type='text' class='form-control' placeholder='Subject Code' name='sub_code[]' required></div><div class=col><input type='text'  class='form-control mb-4' placeholder='Subject Description' name='sub_desc[]' required></div><div class='col-md-2'><input type='text'  class='form-control mb-4' placeholder='Subject Prerequisite' name='sub_prereq[]' required></div><div class='col-md-1'><input type='text' class='form-control' placeholder='Units' name='sub_unit[]' required></div><div class='col-md-2'><select class='browser-default custom-select mb-2' name='sub_sem[]' id='sub_sem'><option value = ''selected>Select Sem</option><option value = '1'>First Sem</option><option value = '2'>Second Sem</option><option value = '3'>Summer</option></select> </div><div class='col-md-2'><select class='browser-default custom-select mb-2' name='sub_year[]' id='sub_year'><option value = ''selected>Select Year</option><option value='1'>First Year</option><option value='2'>Second Year</option><option value = '3'>Third Year</option><option value = '4'>Fourth Year</option></select></div></div></div>");  
               
            });  
            $("#Remove").on("click", function() {  
                $("#textboxDiv").children().last().remove();  
            });  
        });  
    </script>