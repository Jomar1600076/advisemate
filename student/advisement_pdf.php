<?php

// Include the main TCPDF library (search for installation path).
require "fpdf/fpdf.php";

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Times', 'B', 8);
        $this->Cell(500, 0, 'Advisement Form', 0, 0, 'C');
        $this->Ln();
        $this->Image('logo.png', 10, 7, -200);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(70, 10, 'Leyte Normal University', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(70, 3, 'ADVISEMENT FORM', 0, 0, 'C');
        $this->Ln(15);
    }
    function body(){
        $month = date('m');
        $month_now = '';

        //sem
        if($month >= 8){
            $month_now = 2;
        } elseif($month <= 5) {
            $month_now = 1;
        }else{
            $month_now = 'summer';
        }
        $user_id = $_GET["user_id"];
        $connect = mysqli_connect("localhost", "root", "", "advisemate");
        $query = "SELECT 
                    student_id, concat(fname,' ',mname, ' ',lname) fullname, course_desc, college_desc, year_lvl
                    FROM
                    students, college, course 
                    WHERE
                    students.student_college =  college.college_id AND
                    students.student_course = course.course_id AND
                    students.student_id = '$user_id'";
        $result = mysqli_query($connect, $query);
        if (!$result) 
            {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
        } 
        
        while($row = mysqli_fetch_array($result))
        {
        $this->SetFont('Arial','',12);
        $this->Cell(40 ,5,'Student Number:___________________',0,0);
        $this->Cell(40 ,5,$row['student_id'],0,0);
        $this->Cell(30 ,5,'Name:_____________________________',0,0);
        $this->Cell(50 ,5,$row['fullname'],0,0);
        $this->Cell(4 ,5,'SY:_____',0,1);

        $this->SetFont('Arial','',12);
        $this->Cell(10 ,15,'Sem:_______',0,0);
        $this->Cell(20 ,15,$month_now,0,0);
        $this->Cell(20 ,15,'Year Lvl:_____',0,0);
        $this->Cell(10 ,15,$row['year_lvl'],0,0);
        $this->Cell(20 ,15,'Program:_______________________________________',0,0);
        $this->Cell(90,15,$row['course_desc'],0,0);
        $this->Cell(60 ,15,'Major/Specialization:____________',0,1);
        $this->Cell(60 ,15,'Official Subjects to be Taken:',0,1);
        }
    }

    function tableHeader(){
        $this->SetMargins(30, 20, 30);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(10, 10, '', 1, 0, 'C');
        $this->Cell(30, 10, 'Class Code', 1, 0, 'C');
        $this->Cell(30, 10, 'Course Code', 1, 0, 'C');
        $this->Cell(110, 10, 'Description', 1, 0, 'C');
        $this->Cell(20, 10, 'Units', 1, 0, 'C');
        $this->Cell(20, 10, 'Major', 1, 0, 'C');
        $this->Cell(20, 10, 'Minor ', 1, 0, 'C');
        $this->Ln();
    }

    function tableData(){
        $this->SetFont('Times', '', 12);
        $user_id = $_GET["user_id"];
        $sub_cur = '';
        $year_started = '';
        $connect = mysqli_connect("localhost", "root", "", "advisemate");
        $query = "SELECT * from students where student_id = '$user_id'";
        $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($result))  
            {
                $sub_cur = $row['stud_cur'];
                $year_started = $row['year_lvl'];
            }


        $stud_start = $year_started + 1;

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
        } elseif($month >= 7) {
            $sem_now = 1;
        }else{
                
        }

        //next sem
        if($month >= 8){
            $next_sem = 2;
        }else {
            $next_sem = 1;
        } 
        $grades[] = '';
        $sql = "SELECT 
        subjects.sub_unit,
        subjects.sub_code,
        subjects.sub_desc,
        subjects.sub_prereq,
        subjects.sub_cur,
        students.stud_cur,
        grades.grade,
        students.year_started,
        students.year_lvl,
        students.student_id
        
        FROM students
            LEFT JOIN grades ON grades.student_id = students.student_id
            LEFT JOIN subjects on subjects.sub_code = grades.sub_code
            WHERE grades.student_id = $user_id 
            AND students.student_id = '$user_id'
            AND students.stud_cur = subjects.sub_cur
            AND sub_cur = '$sub_cur'
            AND sub_sem='$sem_now'
            AND sub_year = '$year_started'
            ";
        $res = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_assoc($res))  
            {
                $grades[] = $row['grade'];
            }

            if(in_array('4.0', $grades) || in_array('5.0', $grades) || in_array('INC', $grades) || in_array('DROP', $grades))
            {	
                $subs[] = '';
                $def_grade = "SELECT 
                    subjects.sub_unit,
                    subjects.sub_code,
                    subjects.sub_desc,
                    subjects.sub_prereq,
                    subjects.sub_cur,
                    students.stud_cur,
                    grades.grade,
                    students.year_started,
                    students.year_lvl,
                    students.student_id
                    
                    FROM students
                        LEFT JOIN grades ON grades.student_id = students.student_id
                        LEFT JOIN subjects on subjects.sub_code = grades.sub_code
                        WHERE grades.student_id = $user_id 
                        AND students.student_id = '$user_id'
                        AND students.stud_cur = subjects.sub_cur
                        AND sub_cur = '$sub_cur'
                        AND sub_sem ='$sem_now'	
                        AND sub_year = '$year_started'
                        AND (grade = '4.0' OR grade = '5.0' OR grade = 'INC' OR grade = 'DROP')";

                    $res = mysqli_query($connect, $def_grade);
                    if (!$res) 
                    {
                        printf("Error: %s\n", mysqli_error($connect));
                        exit();
                    }
                    while($row = mysqli_fetch_array($res))  
                        {
                            $subs[] = $row['sub_code'];
                        }
                
                $in = '(' . implode(',', $subs) .')';
                $sql = "SELECT sub_code, sub_desc, sub_year, sub_prereq, sub_sem, sub_unit FROM subjects WHERE sub_year = '$stud_start'
                            AND sub_cur = '$sub_cur'
                            AND sub_sem='$month_now'
                            AND sub_prereq NOT IN ( '" . implode( "', '" , $subs ) . "' )
                            ";
                $result = mysqli_query($connect, $sql);
                if (!$result) 
                {
                    printf("Error: %s\n", mysqli_error($connect));
                    exit();
                }
                while($row = mysqli_fetch_array($result))  
                    { 
                        $this->Cell(10, 10, '', 1, 0, 'C');
                        $this->Cell(30, 10, $row['sub_code'], 1, 0, 'C');
                        $this->Cell(30, 10, $row['sub_code'], 1, 0, 'C');
                        $this->Cell(110, 10, $row['sub_desc'], 1, 0, 'C');
                        $this->Cell(20, 10, $row['sub_unit'], 1, 0, 'C');
                        $this->Cell(20, 10, '', 1, 0, 'C');
                        $this->Cell(20, 10, '', 1, 0, 'C');
                        $this->Ln();
                    }

            }else{


                $query = "SELECT * FROM subjects WHERE sub_year = '$stud_start' AND sub_sem= '$month_now' AND sub_cur = '$sub_cur' GROUP BY sub_code";
                        $result = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_array($result))  
                            {
                                $this->Cell(10, 10, '', 1, 0, 'C');
                                $this->Cell(30, 10, $row['sub_code'], 1, 0, 'C');
                                $this->Cell(30, 10, $row['sub_code'], 1, 0, 'C');
                                $this->Cell(110, 10, $row['sub_desc'], 1, 0, 'C');
                                $this->Cell(20, 10, $row['sub_unit'], 1, 0, 'C');
                                $this->Cell(20, 10, '', 1, 0, 'C');
                                $this->Cell(20, 10, '', 1, 0, 'C');
                                $this->Ln();
                            }
            }
/*         $connect = mysqli_connect("localhost", "root", "", "advisemate");
        $query = "SELECT * from subjects where sub_cur = 1 AND sub_sem = 1 AND sub_sem =1 AND sub_year = 2";
        $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($result))  
            {
                $this->Cell(10, 10, '', 1, 0, 'C');
                $this->Cell(30, 10, $row['sub_code'], 1, 0, 'C');
                $this->Cell(30, 10, $row['sub_code'], 1, 0, 'C');
                $this->Cell(110, 10, $row['sub_desc'], 1, 0, 'C');
                $this->Cell(20, 10, $row['sub_unit'], 1, 0, 'C');
                $this->Cell(20, 10, '', 1, 0, 'C');
                $this->Cell(20, 10, '', 1, 0, 'C');
                $this->Ln();
            } */
    }

    function footer(){
        $this->SetFont('Arial','',12);
        $this->Cell(85 ,15,'Student Signature:____________________',0,0);
        $this->Cell(85 ,15,'Adviser/Unit Chair:_____________________',0,0);
        $this->Cell(59 ,15,'Date:_____________________',0,1);

        $this->SetFont('Arial','',12);

        $this->Cell(100 ,10,'4ps Beneficiary?____________________',0,0);
        $this->Cell(130 ,10,'If Yes, Pls. Indicate Household No.:___________________________',0,0);
    }
}

$pdf = new myPDF();
$pdf->SetMargins(30, 10, 30);
$pdf->AliasNbPages();
$pdf->AddPage('L'. 'A4', 0);
$pdf->body();
$pdf->tableHeader();
$pdf->tableData();
$pdf->Output();

