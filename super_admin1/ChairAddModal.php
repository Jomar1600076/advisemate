<!-- Central Modal Small -->
<?php include("college_course.php")?>
<div class="modal fade" id="ChairAddModal" tabindex="-1" role="dialog" aria-labelledby="ChairAddModal"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md modal-center modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Unitchair</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Default form register -->
            <form class="text-center" action="addUnitChair.php" method="post" autocomplete="off">
              <input type="text" id="defaultRegisterFormUserID" class="form-control mb-2" placeholder="User ID" name="user_id" required>
              <input type="text" id="defaultRegisterFormPassword" class="form-control mb-2" placeholder="Password" name="pword" required>
              <input type="text" id="defaultRegisterFormFname" class="form-control mb-2" placeholder="First Name" name="fname" required>
              <input type="text" id="defaultRegisterPhoneLname" class="form-control mb-2" placeholder="Last Name" name="lname" required>
              <input type="text" id="defaultRegisterPhoneMname" class="form-control mb-2" placeholder="MIddle Name" name="mname" required>
              <input type="date" id="defaultRegisterFormBday" class="form-control mb-2" placeholder="Birthday" name="bday" required>
              <input type="text" id="defaultRegisterFormSex" class="form-control mb-2" placeholder="Sex" name="sex" required>
              <input type="text" id="defaultRegisterFormAddress" class="form-control mb-2" placeholder="Address" name="add" required>
              <select class="browser-default custom-select mb-2" name="college">
                  <?php echo $options;?>
              </select>
              <select class="browser-default custom-select mb-2" name="course">
                  <?php echo $opts;?>
              </select>
              <button type="submit" class="btn btn-primary btn-sm" name="addChair">Save</button>

            </form>
            <!-- Default form register -->
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->