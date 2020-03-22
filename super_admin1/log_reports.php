<?php
require('fpdf17/fpdf.php');

//db connection
$con = mysqli_connect("localhost", "root", "", "advisemate");


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'Advisemate',0,0);
$pdf->Cell(59	,5,'Login Reports',0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line


//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);

$pdf->Cell(10	,5,'',0,0);

$pdf->Cell(10	,5,'',0,0);

$pdf->Cell(10	,5,'',0,0);

$pdf->Cell(10	,5,'',0,0);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(100	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(30	,5,'User Id',1,0);
$pdf->Cell(25	,5,'First Name',1,0);
$pdf->Cell(25	,5,'Last Name',1,0);
$pdf->Cell(34	,5,'Ip Add',1,0);
$pdf->Cell(34	,5,'Action',1,0);
$pdf->Cell(34	,5,'Date',1,1);//end of line

$pdf->SetFont('Arial','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = "SELECT u_id, u_ip, chair_fname, chair_lname, date_login, u_act from chair, user_logs 
where user_logs.date_login between '2019/02/25' 
and '2020/02/25' AND user_logs.u_id = chair.chair_id";

$run_query = mysqli_query($con,$query);
        if (!$run_query) 
        {
         printf("Error: %s\n", mysqli_error($con));
         exit();
     }
     if(mysqli_num_rows($run_query) > 0){
        //display the items
        while($result = mysqli_fetch_array($run_query)){
            $pdf->Cell(30   ,5,$result['u_id'],1,0);
            $pdf->Cell(25	,5,$result['chair_fname'],1,0);
            $pdf->Cell(25	,5,$result['chair_lname'],1,0);
            $pdf->Cell(34	,5,$result['u_ip'],1,0);
            $pdf->Cell(34	,5,$result['u_act'],1,0);
            $pdf->Cell(34	,5,$result['date_login'],1,1, 'R');

            //add thousand separator using number_format function
            //accumulate tax and amount
        }
}






















$pdf->Output();
?>