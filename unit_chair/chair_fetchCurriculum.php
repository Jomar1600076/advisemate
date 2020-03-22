<?php 
    if(isset($_POST["cur"])){
        $con = mysqli_connect("localhost", "root", "", "advisemate");
        $sql = "SELECT *
                FROM curriculum";
        $run_query = mysqli_query($con,$sql);
        if (!$run_query) 
        {
         printf("Error: %s\n", mysqli_error($con));
         exit();
     }
        if(mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_array($run_query)){
                $cur_id = $row['cu_id'];
                $cur_year = $row['cur_year'];
                $cur_desc = $row['cur_desc'];
                echo "
                    <div class= col-md-3 info-color>
                        $cur_desc
                    <div>
                ";
            }
        }
    }

?>