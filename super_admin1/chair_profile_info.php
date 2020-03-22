<?php
    $chair_id = $_GET['id'];
    $connect = mysqli_connect("localhost", "root", "", "advisemate");
    $sql = "SELECT * FROM chair WHERE chair_id = '$chair_id'";
    $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result))
    {
        $chair_id = $row['chair_id'];
        $fname = $row['chair_fname'];
        $mname = $row['chair_mname'];
        $lname = $row['chair_lname'];
        $bday = $row['chair_bday'];
        $sex = $row['chair_sex'];
        $add = $row['chair_add'];
    }
?>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 border border-success">
                    <button type="button" class="btn btn-outline-blue btn-rounded btn-sm px-2 float-right" id="editProfile">
                    <i class="fas fa-edit"></i>
                    </button>
                    <p class="font-weight-bold bottom"><?php echo $chair_id ?></p>
                <div class="container mt-5 ">
                    <div class="row border border-top-2 border-dark">
                        <div class="col">
                        <form class="text-center p-2" action="#!">
                            <input type="hidden" id="user_id" class="form-control white" value="<?php echo $chair_id ?>" disabled>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="text" id="fname" class="form-control white" value="<?php echo $fname ?>" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" id="lname" class="form-control white" value="<?php echo $lname ?>" disabled>
                                </div>
                            </div>
                            <input type="text" id="bday" class="form-control mb-3 white" value="<?php echo $bday ?>" disabled>
                            <input type="text" id="sex" class="form-control mb-3 white" value="<?php echo $sex ?>" disabled>
                            <input type="text" id="add" class="form-control mb-3 white" value="<?php echo $add ?>" disabled>
                            <!-- Phone number -->
                            <input type="text" id="" class="form-control" value="Phone number">
                            <button type="submit" class="btn btn-blue float-right" id="saveProfile">Save</button>
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
    </div>
    <script>
            $(document).ready(function() {
            $("#saveProfile").hide();
        });
        $("#editProfile").click(function(event) { 
            $('#fname').prop('disabled', false);
            $('#lname').prop('disabled', false);
            $('#bday').prop('disabled', false);
            $('#sex').prop('disabled', false);
            $('#add').prop('disabled', false);
            $("#saveProfile").show();
            $('#editProfile').prop('disabled', true);
        });
    </script>