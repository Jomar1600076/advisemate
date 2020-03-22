<?php
$connect = mysqli_connect("localhost", "root", "", "advisemate");

if (isset($_POST['add_stud'])) {

	$student_id = $_POST['student_id'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$year_lvl = $_POST['year_level'];
	$date = '2016-0-5';
	
	$query = "INSERT INTO students (student_id, fname, mname, lname, year_started, pword, year_lvl) VALUES ('$student_id', '$fname', '$mname', '$lname', '$date', '$student_id', '$year_lvl')";
	if (mysqli_multi_query($connect, $query)){
		$sql="INSERT INTO grades (student_id, sub_code, grade, grade_status) 
		VALUES 
			('$student_id', 'ENG_101', '', ''),
			('$student_id', 'ENG_103', '', ''),
			('$student_id', 'ENG_108', '', ''),
			('$student_id', 'ENG_112', '', ''),
			('$student_id', 'ENG_113', '', ''),
			('$student_id', 'FIL_101', '', ''),
			('$student_id', 'FIL_102', '', ''),
			('$student_id', 'HUM_103', '', ''),
			('$student_id', 'HUM_104', '', ''),
			('$student_id', 'HUM_106', '', ''),
			('$student_id', 'IT_101', '', ''),
			('$student_id', 'IT_102', '', ''),
			('$student_id', 'IT_103', '', ''),
			('$student_id', 'IT_104', '', ''),
			('$student_id', 'IT_105', '', ''),
			('$student_id', 'IT_201', '', ''),
			('$student_id', 'IT_202', '', ''),
			('$student_id', 'IT_203', '', ''),
			('$student_id', 'IT_204', '', ''),
			('$student_id', 'IT_205', '', ''),
			('$student_id', 'IT_206', '', ''),
			('$student_id', 'IT_207', '', ''),
			('$student_id', 'IT_208', '', ''),
			('$student_id', 'IT_301', '', ''),
			('$student_id', 'IT_302', '', ''),
			('$student_id', 'IT_303', '', ''),
			('$student_id', 'IT_304', '', ''),
			('$student_id', 'IT_305', '', ''),
			('$student_id', 'IT_306', '', ''),
			('$student_id', 'IT_307', '', ''),
			('$student_id', 'IT_308', '', ''),
			('$student_id', 'IT_309', '', ''),
			('$student_id', 'IT_310', '', ''),
			('$student_id', 'IT_311', '', ''),
			('$student_id', 'IT_401', '', ''),
			('$student_id', 'IT_402', '', ''),
			('$student_id', 'IT_403', '', ''),
			('$student_id', 'IT_404', '', ''),
			('$student_id', 'IT_405', '', ''),
			('$student_id', 'IT_406', '', ''),
			('$student_id', 'IT_407', '', ''),
			('$student_id', 'IT_408', '', ''),
			('$student_id', 'IT_409', '', ''),
			('$student_id', 'MATH_106', '', ''),
			('$student_id', 'MATH_108', '', ''),
			('$student_id', 'MATH_112', '', ''),
			('$student_id', 'MATH_121', '', ''),
			('$student_id', 'NSTP_101', '', ''),
			('$student_id', 'NSTP_102', '', ''),
			('$student_id', 'PE_101', '', ''),
			('$student_id', 'PE_102', '', ''),
			('$student_id', 'PE_103', '', ''),
			('$student_id', 'PE_104', '', ''),
			('$student_id', 'SCI_101', '', ''),
			('$student_id', 'SCI_102A', '', ''),
			('$student_id', 'SCI_117', '', ''),
			('$student_id', 'SCI_135L-1', '', ''),
			('$student_id', 'SOCSCI_101', '', ''),
			('$student_id', 'SOCSCI_103', '', ''),
			('$student_id', 'SOCSCI_104', '', ''),
			('$student_id', 'SOCSCI_105', '', ''),
			('$student_id', 'SOCSCI_106', '', ''),
			('$student_id', 'SOCSCI_115', '', '')
			";

			echo $sql;
			if (mysqli_multi_query($connect, $sql))
			{
	        header('location:students.php');
	    	}else{
				echo "Error" .mysqli_error($connect);
				}

	}else{
		echo "Error" .mysqli_error($connect);
		}
}
?>