<?php

require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
// initialize DB connection
require_once('../../essential/session.php');
include("../../essential/connection.php");

// $position=listOfOpenPosition();

// initiate FPDI
$pdf = new FPDI();
// set the source file
$pdf->setSourceFile("format/letterhead.pdf");

// import page 1
$tplIdx = $pdf->importPage(1);
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak('off');

$fontUsed='Helvetica';
$pdf->SetFont($fontUsed,"B");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFontSize(12);
$pdf->AddPage();


$pdf->useTemplate($tplIdx, null, null, 0, 0, true);

$pdf->SetXY(0, 49);
if ($_GET['department']=='%')
{
	$pdf->MultiCell(215.9, 7, "List of Open Positions",0,'C');
}
else
{
	$pdf->MultiCell(180, 7, "List of Open Positions at ".getDepartmentName($_GET['department'])."",0,'C');
}


$pdf->SetFont($fontUsed);
$pdf->SetXY(0, $pdf->GetY());
$pdf->SetFontSize(10);
$pdf->MultiCell(215.9, 7, "as of ".date("F j, Y")."",0,'C');

$pdf->SetFont($fontUsed,"B");
$pdf->Line(10, 70, 205, 70);
$pdf->Line(10, 75, 205, 75);

// $pdf->Line(10, 70, 10, 75);
$pdf->SetXY(10, 70);
$pdf->MultiCell(40, 5, "Department",0,'C');

// $pdf->Line(50, 70, 50, 75);
$pdf->SetXY(50, 70);
$pdf->MultiCell(20, 5, "Item No",0,'C');

// $pdf->Line(70, 70, 70, 75);
$pdf->SetXY(70, 70);
$pdf->MultiCell(35, 5, "Position",0,'C');

// $pdf->Line(105, 70, 105, 75);
$pdf->SetXY(105, 70);
$pdf->MultiCell(15, 5, "SG",1,'C');

// $pdf->Line(120, 70, 120, 75);
$pdf->SetXY(120, 70);
$pdf->MultiCell(25, 5, "Date Posted",0,'C');

// $pdf->Line(145, 70, 145, 75);
$pdf->SetXY(145, 70);
$pdf->MultiCell(25, 5, "Date Expire",0,'C');

// $pdf->Line(170, 70, 170, 75);
$pdf->SetXY(170, 70);
$pdf->MultiCell(35, 5, "Qualification",0,'C');



// $pdf->Line(205, 70, 205, 75);
$pdf->SetFont($fontUsed);
$pdf->SetFontSize(8);
$Ycoord=75;

	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$position = array();

	$sql="SELECT jobopening_pk, itemno, position, salarygrade, poststart, m_department.description AS departmentName, m_department.department_pk as department_pk, postexpire FROM jobopening JOIN m_department on jobopening.department_fk = m_department.department_pk  WHERE department_pk like '".$_GET['department']."' AND postexpire > CURDATE() AND poststart < CURDATE() ORDER BY departmentName";

	$myQuery=mysqli_query($con,$sql);
	// $resultArray=array();
	while ($positionData=mysqli_fetch_array($myQuery))
	{
		// array_push($position, array("jobApplivationNo"=>$resultSet['jobopening_pk'],"department"=>$resultSet['departmentName'], "department_pk"=>$resultSet['department_pk'], "itemNo"=>$resultSet['itemno'], "position"=>$resultSet['position'], "salaryGrade"=>$resultSet['salarygrade'], "datePost"=>date_format(date_create($resultSet['poststart']), 'F d, Y'), "dateExpire"=>date_format(date_create($resultSet['postexpire']), 'F d, Y'),"qualification"=>getRequirements($resultSet['jobopening_pk'])));
		// "qualification"=>getRequirements($resultSet['jobopening_pk']));
	// }


	// 	foreach ($position as $positionData)
	// 	{
			$pdf->SetXY(10, $Ycoord);
			$pdf->MultiCell(40, 5,$positionData['departmentName'] ,0,'L');
// $pdf->MultiCell(40, 5,"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" ,1,'L');
			$yPosition=$pdf->GetY();
			$pdf->SetXY(50, $Ycoord);
			$pdf->MultiCell(20, 5,$positionData['itemno'] ,0,'C');
			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

			$pdf->SetXY(70, $Ycoord);
			$pdf->MultiCell(35, 5, $positionData['position'],0,'C');
			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

			$pdf->SetXY(105, $Ycoord);
			$pdf->MultiCell(15, 5, $positionData['salarygrade'],0,'C');
			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

			$pdf->SetXY(120, $Ycoord);
			$pdf->MultiCell(25, 5, date_format(date_create($positionData['poststart']), 'F d, Y'),0,'C');
			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

			$pdf->SetXY(145, $Ycoord);
			$pdf->MultiCell(25, 5, date_format(date_create($positionData['postexpire']), 'F d, Y'),0,'C');
			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

			$sql="SELECT description FROM jobrequirement WHERE jobopening_fk = '".$positionData['jobopening_pk']."'";
			$queryjobRequirement=mysqli_query($con,$sql);

			// if (mysqli_num_rows($queryjobRequirement)>0)
			// {
			// $pdf->SetFontSize(9);
			$YjobCoord=$Ycoord;
			$pdf->SetXY(170, $Ycoord);
			while ($jobrequirement=mysqli_fetch_array($queryjobRequirement))
				{
					$pdf->SetXY(170,$pdf->GetY());
					$pdf->MultiCell(35, 5, $jobrequirement['description'],0,'L');
					// $pdf->Ln();
					$YjobCoord=$YjobCoord+5;
					if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();
				}
			// }

			$Ycoord=$yPosition;
			// $pdf->SetFontSize(10);

			// $pdf->SetXY(170, $pdf->GetY());
			// $pdf->MultiCell(35, 5, "xxxx",1,'C');

			$pdf->Line(10, 70, 10, $yPosition);
			$pdf->Line(50, 70, 50, $pdf->GetY());
			$pdf->Line(70, 70, 70, $pdf->GetY());
			$pdf->Line(105, 70, 105, $pdf->GetY());
			$pdf->Line(120, 70, 120, $pdf->GetY());
			$pdf->Line(145, 70, 145, $pdf->GetY());
			$pdf->Line(170, 70, 170, $pdf->GetY());
			$pdf->Line(205, 70, 205, $yPosition);

			$pdf->Line(10, $yPosition, 205, $yPosition);
		}






$pdf->Output();





function listOfOpenPosition()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$position = array();

	$sql="SELECT jobopening_pk, itemno, position, salarygrade, poststart, m_department.description AS departmentName, m_department.department_pk as department_pk, postexpire FROM jobopening JOIN m_department on jobopening.department_fk = m_department.department_pk  WHERE department_pk like '".$_GET['department']."' AND postexpire > CURDATE() AND poststart < CURDATE() ORDER BY departmentName";

	$myQuery=mysqli_query($con,$sql);
	// $resultArray=array();
	while ($resultSet=mysqli_fetch_array($myQuery))
	{
		array_push($position, array("jobApplivationNo"=>$resultSet['jobopening_pk'],"department"=>$resultSet['departmentName'], "department_pk"=>$resultSet['department_pk'], "itemNo"=>$resultSet['itemno'], "position"=>$resultSet['position'], "salaryGrade"=>$resultSet['salarygrade'], "datePost"=>date_format(date_create($resultSet['poststart']), 'F d, Y'), "dateExpire"=>date_format(date_create($resultSet['postexpire']), 'F d, Y'),"qualification"=>getRequirements($resultSet['jobopening_pk'])));
		// "qualification"=>getRequirements($resultSet['jobopening_pk']));
	}

return $position;
}



function getRequirements($jobopening_pk)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT description FROM jobrequirement WHERE jobopening_fk = '".$jobopening_pk."' ";
	$myQuery=mysqli_query($con,$sql);
	$requirements="";
	while ($resultSet=mysqli_fetch_array($myQuery))
	{
		if ($requirements=='')
		{
			$requirements=$resultSet['description'] ."<br>";
		}
		else
		{
			$requirements=$requirements ." ". $resultSet['description'] ."<br>" ;
		}

	}
	return $requirements;
}



function getDepartmentName($department_pk)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT description FROM m_department WHERE department_pk = '".$department_pk."' ";
	$myQuery=mysqli_query($con,$sql);
	$result=mysqli_fetch_array($myQuery);
	mysqli_close($con);
	return $result['description'];

}