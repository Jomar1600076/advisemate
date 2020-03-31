<?php
    $con = mysqli_connect("localhost", "root", "", "advisemate");


    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 5;  
    $offset = ($pageno-1) * $no_of_records_per_page;
    $total_pages_sql = "SELECT COUNT(*) FROM students";
    $result = mysqli_query($con,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $yr_lvl = $_SESSION["ad_yrlvl"];
    $query = "SELECT grades.student_id, fname, lname, AVG(grade) as avegrade
                FROM grades, students 
                    WHERE students.student_id = grades.student_id 
                        AND students.year_lvl = '$yr_lvl' 
                            GROUP BY grades.student_id
                            LIMIT $offset, $no_of_records_per_page";

        $run_query = mysqli_query($con,$query);
        if (!$run_query) 
            {
            printf("Error: %s\n", mysqli_error($con));
            exit();
            }
        if(mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_array($run_query))
                {                   
                    ?>
                    <tr class="row">
                        <td class="col"><?php echo $row['student_id']; ?></td>
                        <td class="col"><?php echo $row['fname']; ?></td>
                        <td class="col"><?php echo $row['lname']; ?></td>
                        <td class="col"><?php echo $row['avegrade']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
                <ul class="pagination pg-blue">
                    <li class="page-item">
                      <a href="?pageno=1" class="page-link">First</a>
                    </li>
                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                    </li>
                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
                    </li>
                    <li class ="page-item">
                      <a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a>
                    </li>
                </ul>
            </nav>