<?php
	
// include_once 'core/init.php';
// date_default_timezone_set('Asia/Manila');

include_once 'assets/fpdf/fpdf.php';
date_default_timezone_set('Asia/Manila');

//db connection
$con = mysqli_connect('localhost','admin','root','capstone2');
mysqli_select_db($con,'capstone2');

//get invoices data
$datetoday = date('j');			
$query = mysqli_query($con,"SELECT *from product_sales WHERE DATE_FORMAT(date_ordered, '%e')= '".$datetoday."'");

$invoice = mysqli_fetch_array($query);

// $date = ('F,j,Y');
// $date = date_create($date);
// $size = array(60,90);

$pdf = new FPDF ('l','mm','letter');
$pdf->AddPage();


	$pdf->Ln(3);
	$pdf->Image('assets/pahiram.png',40,8,30); // Logo

	$pdf->SetFont('Arial','B',12); // Arial bold 15
	$pdf->Cell(80); // Move to the right
	// Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link])
	$pdf->Cell(100,5,'PAHIRAM.PH',0,50,'C');
	$pdf->SetFont('Arial','I',10);
    $pdf->Cell(100,5, 'Studio Residence 2 , 2128, Nuestra Sra. De Guadalupe, City, Makati, 1212 Metro Manila',0,50,'C');
    $pdf->Cell(100,5, '(02) 954 1057',0,50,'C');

               
	$pdf->Ln(10); // Line break

	$pdf->SetFont('Times','B',13); //font
	$pdf->Cell(80); 
    $pdf->Cell(100,20,'Daily Sales Report',0,50,'C');
	$pdf->Ln(5); // Line break


$newtime = date('h:i a');
$newdate = date('F d,Y');

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(180);
	$pdf->Cell(30,5,'Date:',0,0);	

	$pdf->SetFont('Times','',11);
	$pdf->SetFillColor(224,235,255);
	$pdf->Cell(30,5,$newdate,0,0,'C');
	$pdf->Ln(5);

	$pdf->Cell(180);	
	$pdf->Cell(30,5,' ',0,0);	
	$pdf->Cell(30,5,$newtime,0,0,'C');
	$pdf->Ln(10);

// }

if($invoice) {	
	// Header
	// $width_cell = array(10,10);
	$pdf->SetFillColor(255,130,0);
	$pdf->Cell(15);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(35,5,'Transaction Number',1,0,'C',true);
	$pdf->Cell(35,5,'Product Code',1,0,'C',true);
    $pdf->Cell(35,5,'Product Name',1,0,'C',true);
	$pdf->Cell(20,5,'Product Qty',1,0,'C',true);
	$pdf->Cell(25,5,'Product Price',1,0,'C',true);
	$pdf->Cell(30,5,'Total Amoung',1,0,'C',true);
	$pdf->Cell(60,5,'Date Ordered',1,0,'C',true);	
	$pdf->Ln(5);

	
foreach ($query as $invoice) {

	

$logout = $invoice['date_ordered'];
$newtime = date('h:i a' , strtotime($logout));
$newdate = date('F d,Y' , strtotime($logout));		

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(15);
	$pdf->Cell(35,5,$invoice['transaction_number'],1,0,'C',true);
	$pdf->Cell(35,5,$invoice['product_number'],1,0,'C',true);
	$pdf->Cell(35,5,$invoice['product_name'],1,0,'C',true);
	$pdf->Cell(20,5,$invoice['product_qty'],1,0,'C',true);
	$pdf->Cell(25,5,'Php. '.$invoice['product_price'],1,0,'C',true);
	$pdf->Cell(30,5,'Php. '.$invoice['product_total_amount'],1,0,'C',true);
	$pdf->Cell(60,5,$newdate." ( ".$newtime." )",1,0,'C',true);
	$pdf->Ln(5);

}

} else {

	// $pdf->SetFillColor(255,130,0);
	$pdf->Cell(30);
	$pdf->SetFont('Arial','B',13);
	$pdf->Cell(200,5,'TOTAL SALES: Php. 0.00',0,0,'C');	
}

$pdf->Ln(20);

$pdf->Cell(10);
$pdf->SetFont('Arial','U',10);
$pdf->Cell(50,5,'                                                                                                   ');
$pdf->Ln(5);

$pdf->Cell(17);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,5,'Mary Jane Pasko (Sales Associate, Pahiram.ph)');
$pdf->Ln(5);

$pdf->Cell(45);
$pdf->SetFont('Arial','',10);
$pdf->Cell(55,5,'Prepared  by');



// Instanciation of inherited class

$pdf->AliasNbPages();
$pdf->SetFont('Times','',12);

// for($i=1;$i<=40;$i++)
// 	$pdf->Cell(0,10,'Printing line number '.$i,0,1);

?>




<?php $pdf->Output(); ?>