<?php
$con = mysqli_connect("localhost", "root", "", "advisemate");
$month = date('m');
$month_now = '';
$sem_now = '';

//sem
if($month >= 8){
    $month_now = 2;
} elseif($month <= 7) {
    $month_now = 1;
}else{
        
}
//current sem
if($month <= 8){
    $sem_now = 2;
} elseif($month >= 7)   {
    $sem_now = 1;
}else{
        
}

$students[] = '';
$yr_lvl = $_SESSION["ad_yrlvl"];
$query = "SELECT student_id
FROM students";
$run_query = mysqli_query($con,$query);
if (!$run_query) 
    {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query))
        {
            $students[] = $row['student_id'];
        }
}

$def = array("4.0", "5.0", "DRP", "INC", "");
$op_stud[] = '';
$op_query = "SELECT grades.id, students.student_id, grades.grade, subjects.sub_code
from subjects
LEFT JOIN grades on grades.sub_code = subjects.sub_code
LEFT JOIN students on students.student_id = grades.student_id       
    WHERE subjects.sub_year = '1'
    AND subjects.sub_sem = '$sem_now'
    AND grades.student_id IN ( '" . implode( "', '" , $students ) . "')
    AND grades.grade IN ( '" . implode( "', '" , $def ) . "')
    ";

    $run_query = mysqli_query($con,$op_query);
    if (!$run_query) 
        {
        printf("Error: %s\n", mysqli_error($con));
        exit();
        }
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query))
            {
                $op_stud[] = $row['student_id'];
            }
    }


    //pagination
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
//get ave
$sql = "SELECT grades.id, students.student_id, AVG(grades.grade) as Avegrade, CONCAT(fname,' ', mname,' ', lname) as fullname, grades.grade, subjects.sub_code
from subjects
LEFT JOIN grades on grades.sub_code = subjects.sub_code
LEFT JOIN students on students.student_id = grades.student_id       
    WHERE subjects.sub_year = '1'
    AND subjects.sub_sem = '$sem_now'
    AND grades.student_id IN ( '" . implode( "', '" , $students ) . "')
    AND grades.student_id NOT IN ( '" . implode( "', '" , $op_stud ) . "')
    GROUP BY student_id
    HAVING AVG(grades.grade) <= 1.7
    LIMIT $offset, $no_of_records_per_page";

    $run_query = mysqli_query($con,$sql);
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
                        <td  class="col-md-2"><?php echo $row['student_id'] ?></td>
                        <td  class="col"><?php echo $row['fullname'] ?></td>
                        <td  class="col"><?php echo $row['Avegrade'] ?></td>
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