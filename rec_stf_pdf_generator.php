<?php
	include_once('libs/fpdf.php');

	require 'rec_stf_server.php';
	session_start();

	$firstname=$_SESSION['name'];
	$lastname=$_SESSION['lastname'];
	$department=$_SESSION['department'];
	$post=$_SESSION['post'];
	$img_url="images/".$_SESSION['id'].".jpg";
	if(!file_exists($img_url))
	{
	    $img_url = "images/generic.jpg";
	}
	if(isset($_GET['description']))
	{
	    $sql="DELETE FROM `add_details` WHERE id='".$_SESSION['id']."';";
	    $conn->query($sql);
	    $description = $_GET['description'];
	    $stmt = $conn->prepare("INSERT INTO add_details (id,description) VALUES (?,?)");
	    $stmt->bind_param("ss", $_SESSION['id'], $description);
	    $stmt->execute();
	}

class PDF extends FPDF
{
	public $txt;
	function Header()
	{
	    $this->Image("image.jpg",0,0,210,40);
	    $this->Ln(40);
	}
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	public function setText($txt){
	    $this->txt = $txt;
	}
	public function printText($height, $width, $border=1, $ln=0, $align="L"){
	    $this->Cell($height, $width, $this->txt, $border, $ln, $align);
	}	
}

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page


$pdf->SetFont('Arial','B',10);
$pdf->setText("Name of the Applied Post : ".$post);
$pdf->printText(100, 15, 0,1);

$pdf->Cell(10,10,"1.",1);
$pdf->Cell(50,10,"Name of the Applicant",1);
$pdf->setText($firstname." ".$lastname);
$pdf->printText(80, 10);
$pdf->Image($img_url, 150, 45, 40, 40);
$pdf->Ln();

$pdf->Cell(10,10,"2.",1);
$pdf->Cell(50,10,"Father/Husband's Name",1);
$sql1 ="SELECT fhname FROM `personaldetails` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->MultiCell(80,10,$column,1);
	}
}
$pdf->Cell(10,20,"3.",1);
$pdf->Cell(34,10,"Date of Birth",1);
$pdf->Cell(34,10,"Gender(M/F)",1);
$pdf->Cell(34,10,"Age",1);
$pdf->Cell(34,10,"Marital Status",1);
$pdf->Cell(34,10,"Nationality",1);
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,10,"",0);
$sql1 ="SELECT dob, gender FROM `details` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(34,10,$column,1);
	}
}

$sql1 ="SELECT dob FROM `details` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$txt = $column;
	}
}
$dateOfBirth = $txt;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
// date_format($diff,"d/m/Y")
$pdf->Cell(34,10, $diff->format('%y') , 1);

$sql1 ="SELECT marital_status, Nationality FROM `personaldetails` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(34,10,$column,1);
	}
}

$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Cell(10,10,"4.",1);
$pdf->Cell(34,10,"Category",1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT category FROM `details` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(34,10,$column,1);
	}
}


$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,40,"5.",1);
$pdf->Cell(68,20,"Address for Correspondence",1);
$pdf->SetFont('Arial','',10);

$sql1 ="SELECT address_line1 FROM `caddress` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
$txt1 = "";
foreach($result1 as $row) {
	foreach($row as $column){
		$txt1 = $column;
	}
}

$sql1 ="SELECT address_line2, city, district, state, pincode FROM `caddress` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		// $pdf->Cell(102,6,$column,1,2);
		$txt1 = $txt1.", ".$column;
	}
}
$pdf->MultiCell(102,10,$txt1,1);
$pdf->SetFont('Arial','B',10);	
$pdf->Cell(10,10,'',0);
$pdf->Cell(34,10,"Phone No.",1);
$sql1 ="SELECT phone FROM `details` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(34,10,$column,1);
	}
}
$pdf->Cell(50,10,"Emergency Phone No.",1);
$sql1 ="SELECT emergency_phone_number FROM `contact` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(52,10,$column,1);
	}
}
$pdf->Ln();
$pdf->Cell(10,10,'',0);
$pdf->Cell(34,10,"Email ID",1);
$sql1 ="SELECT email FROM `details` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(136,10,$column,1);
	}
}


$pdf->Ln();
$pdf->Cell(10,20,"6.",1);
$pdf->Cell(68,20,"Parmanent Address",1);
$pdf->SetFont('Arial','',10);

$sql1 ="SELECT address_line1 FROM `paddress` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
$txt1 = "";
foreach($result1 as $row) {
	foreach($row as $column){
		$txt1 = $column;
	}
}

$sql1 ="SELECT address_line2, city, district, state, pincode FROM `paddress` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		// $pdf->Cell(102,6,$column,1,2);
		$txt1 = $txt1.", ".$column;
	}
}

$pdf->MultiCell(102,10,$txt1,1);
$pdf->SetFont('Arial','B',10);


$pdf->Cell(10,70,"7.",1);
$pdf->Cell(25,10,"Qualification",1);
$pdf->Cell(25,10,"Degree",1);
$pdf->Cell(25,10,"Discipline",1);
$pdf->Cell(25,10,"Institute Name",1);
$pdf->Cell(25,10,"University",1);
$pdf->Cell(25,10,"Passing Year",1);
$pdf->Cell(25,10,"%enge/CGPA",1);

$pdf->Ln();
$pdf->Cell(10,10,"",0);
$pdf->Cell(25,10,"10th",1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT degree,discipline,institute,university,year_passed,marks FROM `secondary` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(25,10,$column,1);
	}
}

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,"",0);
$pdf->Cell(25,10,"12th",1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT degree,discipline,institute,university,year_passed,marks FROM `hsecondary` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(25,10,$column,1);
	}
}

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,"",0);
$pdf->Cell(25,10,"Graduation",1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT degree,discipline,institute,university,year_passed,marks FROM `bachelor` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(25,10,$column,1);
	}
}

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,"",0);
$pdf->Cell(25,10,"Masters",1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT degree,discipline,institute,university,year_passed,marks FROM `masters` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(25,10,$column,1);
	}
}

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,"",0);
$pdf->Cell(25,10,"PhD",1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT degree,discipline,institute,university,date_of_defense,marks FROM `phd` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(25,10,$column,1);
	}
}

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,"",0);
$pdf->Cell(25,10,"Others",1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT degree,discipline,institute,university,year_passed,marks FROM `other` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(25,10,$column,1);
	}
	$pdf->Ln();
	$pdf->Cell(35,10,"",0);
}


$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,40,"8.",1);
$pdf->Cell(58,10,"Work Experience Details",'TB');
$pdf->Cell(70,10,"Total Work Experience (in years)",'TB');
$sql1 =" SELECT sum(leaved - joind) FROM `workexperience` WHERE id='".$_SESSION['id']."';";
// $txt = 0;
$result1 = $conn->query($sql1);
// $sql2 ="SELECT leaved FROM `workexperience` WHERE id='".$_SESSION['id']."';";
// $result2 = $conn->query($sql2);

foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->Cell(42,10,$column,'TBR');
	}
}

$pdf->Ln();
$pdf->Cell(10,10,"",0);
$pdf->Cell(40,10,"Institute Name",1,0,'C');
$pdf->Cell(40,10,"Designation",1,0,'C');
$pdf->Cell(20,10,"From",1,0,'C');
$pdf->Cell(20,10,"To",1,0,'C');
$pdf->Cell(30,10,"Nature of Work",1,0,'C');
$pdf->Cell(20,10,"Total Salary",1,0,'C');
$heading = array(40,40,20,20,30,20);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT employer,designation,joind,leaved,nature,last_salary FROM `workexperience` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	$pdf->Ln();
	$pdf->Cell(10,10,"",0);
	$i = 0;
	foreach($row as $column){
		$pdf->Cell($heading[$i],10,$column,1);
		$i = $i+1;
	}
}


$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,20,"9.",1);
$pdf->Cell(60,20,"Description of Work Experience",1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT description FROM `expsummary` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->MultiCell(110,10,$column,1);
	}
}

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,20,"10.",1);
$txt = "Additional Details";
$pdf->Cell(50,20,$txt,1);
$pdf->SetFont('Arial','',8);
$sql1 ="SELECT description FROM `add_details` WHERE id='".$_SESSION['id']."';";
$result1 = $conn->query($sql1);
foreach($result1 as $row) {
	foreach($row as $column){
		$pdf->MultiCell(120,10,$column,1);
	}
}


$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180,10,"DECLARATION",'LTR',1,'C');
$pdf->SetFont('Arial','',8);
$txt = 'I hereby, solemnly declare that the information furnished in this application are true and correct to the best of my knowledge and belief. If at any time I am found to have concealed / suppressed any material / information or have given any false details, my candidature / appointment shall be liable to be summarily cancelled / terminated without any notice or compensation.';
$pdf->MultiCell(180,10,$txt,'LR',1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180,10,"",'LR',1);
$pdf->Cell(30,10,"Date",'LB',0);
$today = date("d-m-Y");
$pdf->Cell(100,10, $today,'B' . 0);
$pdf->Cell(50,10,"Signature of the Applicant",'BR',1,'C');
$pdf->Output();
?>