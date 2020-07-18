<?php
    $con = mysqli_connect("localhost", "root", "", "advisemate");
    if(isset($_POST["addCur"])){
        $cur_year = $_POST["cur_year"];
        $cur_desc = $_POST["cur_desc"];

        $sql = "INSERT INTO curriculum (cur_year, cur_desc)
                VALUES
                ('$cur_year', '$cur_desc')";
                if(mysqli_query($con, $sql)){
                      echo '<script>
                              alert("Curriculum Successfully Added")
                              javascript:history.go(-1);
                          </script>';   

                          $createdby = $_SESSION["chair_id"];
                          $date_now = date("Y-m-d H:i:s");
                          $info = "Added Adviser";
                          $log_query = "INSERT INTO chair_logs(chair_id, trans_info, trans_date, createdby) VALUES($user_id, '$info', '$date_now', '$createdby')";
                          if(mysqli_query($con, $log_query)){
                  
                          }else{
                              echo "Error" .mysqli_error($con);
                          }

                }else{
                  echo "Error" .mysqli_error($con);
                }
    }
?>
<div class="modal fade" id="AddProspectus" tabindex="-1" role="dialog" aria-labelledby="AddProspectus"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md modal-center modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Curriculum</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container">
        <!-- Default form register -->
            <form class="text-center" action="" method="post" autocomplete="off">
              <div class="form-row mb-4">
                <div class="col">
                  <input type="date" class="form-control mb-2" placeholder="Year" name="cur_year" required>
                  <textarea class="form-control"  placeholder="Curriculum Desc" name="cur_desc" required rows="3"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-sm" name="addCur">Save</button>

            </form>
            <!-- Default form register -->
          </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>