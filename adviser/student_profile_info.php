<?php
    $stud_id = $_GET['id'];
    $connect = mysqli_connect("localhost", "root", "", "advisemate");
    $sql = "SELECT * FROM students WHERE student_id = '$stud_id'";
    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result))
    {
        $user_id = $row['student_id'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $bday = $row['bday'];
        $sex = $row['sex'];
        $add = $row['address'];
    }
?>
    <div class="row">
        <div class="col-md-6 border border-success">
                <button type="button" class="btn btn-outline-blue btn-rounded btn-sm px-2 float-right" id="editProfile">
                <i class="fas fa-edit"></i>
                </button>
                <p class="font-weight-bold bottom"><?php echo $user_id ?></p>
            <div class="container mt-5 ">
                <div class="row mb-5">
                    <div class="col"> 
                    <!-- Default form register -->
                            <form class="text-center p-2" action="addStudent.php" method="POST">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="text" id="fname" class="form-control white" name="fname" value="<?php echo $fname ?>" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" id="lname" class="form-control white" name="lname" value="<?php echo $lname ?>" disabled>
                                </div>
                            </div>
                            <input type="text" id="bday" class="form-control mb-3 white" name="bday" value="<?php echo $bday ?>" disabled>
                            <input type="text" id="sex" class="form-control mb-3 white" name="sex" value="<?php echo $sex ?>" disabled>
                            <input type="text" id="add" class="form-control mb-3 white" name="add" value="<?php echo $add ?>" disabled>
                            <input type="hidden" id="user_id" class="form-control white" name="user_id" value="<?php echo $user_id ?>">
                            <!-- Phone number -->
                            <button type="submit" class="btn btn-blue float-right" name="editStudent" id="saveProfile">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <img src="https://mdbootstrap.com/img/Others/documentation/img%20(75)-mini.jpg" alt="thumbnail" class="img-thumbnail"
        style="width: 200px">
        </div>
    </div>
<script>
    $(document).ready(function() {
        $("#saveProfile").hide();
        $("#editProfile").click(function(event) { 
            $('#fname').prop('disabled', false);
            $('#lname').prop('disabled', false);
            $('#bday').prop('disabled', false);
            $('#sex').prop('disabled', false);
            $('#add').prop('disabled', false);
            $("#saveProfile").show();
            $('#editProfile').prop('disabled', true);
        });
    });
</script>