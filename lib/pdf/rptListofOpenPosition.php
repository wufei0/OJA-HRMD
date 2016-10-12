<?php

require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
// initialize DB connection
require_once('../../essential/session.php');
include("../../essential/connection.php");


if (!AmIAdmin($_SESSION['username']))  die();

$textAlignment="C";
class PDF extends FPDF
{

	var $widths;
	var $aligns;

function Header()
{
	$this->AddFont('BOOKOS','','BOOKOS.php');
	$this->AddFont('BOOKOS','B','BOOKOSB.php');
	$this->AddFont('BOOKOS','BI','BOOKOSBI.php');
	$this->AddFont('BOOKOS','I','BOOKOSI.php');

    $this->SetFont('BOOKOS','',10);

 	$this->Image('fpdf/resources/pglu.gif',8,9,24,24);
 	$this->Image('fpdf/resources/iloveLU.gif',180,9,28);

    $this->Ln(8);
    $this->Cell(195.9,4,'Republic of the Philippines',0,1,'C');
    $this->Ln(1);
    $this->SetFont('BOOKOS','B',12);
    $this->Cell(195,4,'PROVINCE OF LA UNION',0,1,'C');
    $this->Ln(1);
    $this->SetFont('BOOKOS','',10);
    $this->Cell(195.9,4,'City of San Fernando',0,1,'C');
    $this->Ln(5);
    $this->SetFont('BOOKOS','B',14);
    $this->Cell(195.9,4,'OFFICE OF THE GOVERNOR',0,1,'C');
    $this->Ln(2);
    $this->SetFont('BOOKOS','I',14);
    $this->Cell(195.9,4,'HUMAN RESOURCE MANAGEMENT DIVISION',0,1,'C');

	$this->Ln(2);
    $this->SetLineWidth(.5);
    $this->SetDrawColor(1,162,255);
    $this->Line(10,$this->GetY(),205.9,$this->GetY());
    $this->Ln(1.1);
    $this->SetLineWidth(.7);
    $this->Line(10,$this->GetY(),205.9,$this->GetY());
    $this->Ln(5);


}

function Footer()
{
    // Position at 1.5 cm from bottom
    // $this->SetY(-15);
    // // Arial italic 8
    // $this->SetFont('Arial','I',8);
    // // Page number
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetXY(10,$this->GetPageHeight()-20);
	$this->SetLineWidth(.7);
	$this->SetDrawColor(1,162,255);
	$this->Line(6,$this->GetY(),209,$this->GetY());
	$this->Ln(1.1);
	$this->SetLineWidth(.5);
	$this->Line(5.8,$this->GetY(),209.2,$this->GetY());

	$this->Ln(2);
	$this->SetFont('Times','',10);

	$this->Cell(195.9,4,'Tel. No. (072) 242-5550 loc. 215, 223, 224, 225, 256',0,1,'C');
	$this->Cell(195.9,4,'Direct Line: (072) 607-4552',0,1,'C');

$this->SetXY(10,$this->GetPageHeight()-28);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
	global $textAlignment;
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$textAlignment);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
    {
        $this->AddPage($this->CurOrientation,$this->CurPageSize);

    $this->SetFont('Helvetica',"B");
	$contentY=$this->GetY()+5;
	$this->SetFontSize(10);
	$this->Line(10, $contentY, 205, $contentY);
	$this->Line(10, $contentY+5, 205, $contentY+5);


	$this->SetXY(10, $contentY);
	$this->MultiCell(40, 5, "Department",1,'C');

	// $pdf->Line(50, 70, 50, 75);
	$this->SetXY(50, $contentY);
	$this->MultiCell(20, 5, "Item No",1,'C');

	// $pdf->Line(70, 70, 70, 75);
	$this->SetXY(70, $contentY);
	$this->MultiCell(35, 5, "Position",1,'C');

	// $pdf->Line(105, 70, 105, 75);
	$this->SetXY(105, $contentY);
	$this->MultiCell(15, 5, "SG",1,'C');

	// $pdf->Line(120, 70, 120, 75);
	$this->SetXY(120, $contentY);
	$this->MultiCell(25, 5, "Date Posted",1,'C');

	// $pdf->Line(145, 70, 145, 75);
	$this->SetXY(145, $contentY);
	$this->MultiCell(25, 5, "Date Expire",1,'C');

	// $pdf->Line(170, 70, 170, 75);
	$this->SetXY(170, $contentY);
	$this->MultiCell(35, 5, "Qualification",1,'C');
	$this->SetFont('Helvetica',"");
	$this->SetFontSize(8);
    }
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}


}

// initiate FPDI
$pdf = new PDF();
// set the source file
// $pdf->setSourceFile("format/letterhead.pdf");

// import page 1
// $tplIdx = $pdf->importPage(1);
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak('on',25);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$fontUsed='Helvetica';
$pdf->SetFont($fontUsed,"B");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFontSize(12);
$pdf->AliasNbPages();
$pdf->AddPage("P","Letter");


// $pdf->useTemplate($tplIdx, null, null, 0, 0, true);

// $pdf->SetXY(54, $pdf->GetY());
if ($_GET['department']=='%')
{
	$pdf->MultiCell(195.9, 7, "List of Open Positions",0,'C');
}
else
{
	$pdf->MultiCell(195.9, 7, "List of Open Positions at ".getDepartmentName($_GET['department'])."",0,'C');
}


$pdf->SetFont($fontUsed);
$pdf->SetXY(54, $pdf->GetY());
$pdf->SetFontSize(10);
$pdf->MultiCell(110.9, 7, "as of ".date("F j, Y")."",0,'C');

$pdf->SetFont($fontUsed,"B");
$contentY=$pdf->GetY()+5;
$pdf->Line(10, $contentY, 205, $contentY);
$pdf->Line(10, $contentY+5, 205, $contentY+5);

// $pdf->Line(10, 70, 10, 75);
$pdf->SetXY(10, $contentY);
$pdf->MultiCell(40, 5, "Department",1,'C');

// $pdf->Line(50, 70, 50, 75);
$pdf->SetXY(50, $contentY);
$pdf->MultiCell(20, 5, "Item No",1,'C');

// $pdf->Line(70, 70, 70, 75);
$pdf->SetXY(70, $contentY);
$pdf->MultiCell(35, 5, "Position",1,'C');

// $pdf->Line(105, 70, 105, 75);
$pdf->SetXY(105, $contentY);
$pdf->MultiCell(15, 5, "SG",1,'C');

// $pdf->Line(120, 70, 120, 75);
$pdf->SetXY(120, $contentY);
$pdf->MultiCell(25, 5, "Date Posted",1,'C');

// $pdf->Line(145, 70, 145, 75);
$pdf->SetXY(145, $contentY);
$pdf->MultiCell(25, 5, "Date Expire",1,'C');

// $pdf->Line(170, 70, 170, 75);
$pdf->SetXY(170, $contentY);
$pdf->MultiCell(35, 5, "Qualification",1,'C');



// $pdf->Line(205, 70, 205, 75);
$pdf->SetFont($fontUsed);
$pdf->SetFontSize(8);
$Ycoord=$contentY+3;

	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$position = array();

	$sql="SELECT jobopening_pk, itemno, position, salarygrade, poststart, m_department.description AS departmentName, m_department.department_pk as department_pk, postexpire FROM jobopening JOIN m_department on jobopening.department_fk = m_department.department_pk  WHERE department_pk like '".$_GET['department']."' AND postexpire > CURDATE() AND poststart < CURDATE() ORDER BY departmentName";

	$myQuery=mysqli_query($con,$sql);
	// $resultArray=array();
	$pdf->SetWidths(array(40,20,35,15,25,25,35));
	srand(microtime()*1000000);
	while ($positionData=mysqli_fetch_array($myQuery))
	{
		// array_push($position, array("jobApplivationNo"=>$resultSet['jobopening_pk'],"department"=>$resultSet['departmentName'], "department_pk"=>$resultSet['department_pk'], "itemNo"=>$resultSet['itemno'], "position"=>$resultSet['position'], "salaryGrade"=>$resultSet['salarygrade'], "datePost"=>date_format(date_create($resultSet['poststart']), 'F d, Y'), "dateExpire"=>date_format(date_create($resultSet['postexpire']), 'F d, Y'),"qualification"=>getRequirements($resultSet['jobopening_pk'])));
		// "qualification"=>getRequirements($resultSet['jobopening_pk']));
	// }

		$sql="SELECT description FROM jobrequirement WHERE jobopening_fk = '".$positionData['jobopening_pk']."'";
		$queryjobRequirement=mysqli_query($con,$sql);
		$jobrequirementList=null;
		while ($jobrequirement=mysqli_fetch_array($queryjobRequirement))
		{
			// $pdf->MultiCell(35, 5, $jobrequirement['description'],0,'L');
			$jobrequirementList=$jobrequirementList . $jobrequirement['description'].", ";
		}

$pdf->Row(array($positionData['departmentName'],$positionData['itemno'],$positionData['position'],$positionData['salarygrade'],date_format(date_create($positionData['poststart']), 'F d, Y'),date_format(date_create($positionData['postexpire']), 'F d, Y'),$jobrequirementList));

	// 	foreach ($position as $positionData)
// 	// 	{
// 			$pdf->SetXY(10, $Ycoord);
// 			$pdf->MultiCell(40, 5,$positionData['departmentName'] ,0,'L');
// // $pdf->MultiCell(40, 5,"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" ,1,'L');
// 			$yPosition=$pdf->GetY();
// 			$pdf->SetXY(50, $Ycoord);
// 			$pdf->MultiCell(20, 5,$positionData['itemno'] ,0,'C');
// 			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

// 			$pdf->SetXY(70, $Ycoord);
// 			$pdf->MultiCell(35, 5, $positionData['position'],0,'C');
// 			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

// 			$pdf->SetXY(105, $Ycoord);
// 			$pdf->MultiCell(15, 5, $positionData['salarygrade'],0,'C');
// 			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

// 			$pdf->SetXY(120, $Ycoord);
// 			$pdf->MultiCell(25, 5, date_format(date_create($positionData['poststart']), 'F d, Y'),0,'C');
// 			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

// 			$pdf->SetXY(145, $Ycoord);
// 			$pdf->MultiCell(25, 5, date_format(date_create($positionData['postexpire']), 'F d, Y'),0,'C');
// 			if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

// 			$sql="SELECT description FROM jobrequirement WHERE jobopening_fk = '".$positionData['jobopening_pk']."'";
// 			$queryjobRequirement=mysqli_query($con,$sql);

// 			// if (mysqli_num_rows($queryjobRequirement)>0)
// 			// {
// 			// // $pdf->SetFontSize(9);
// 			// $YjobCoord=$Ycoord;
// 			// $pdf->SetXY(170, $Ycoord);
// 			while ($jobrequirement=mysqli_fetch_array($queryjobRequirement))
// 				{
// 					$pdf->SetXY(170,$pdf->GetY());
// 					$pdf->MultiCell(35, 5, $jobrequirement['description'],0,'L');
// 					// $pdf->Ln();
// 					$YjobCoord=$YjobCoord+5;
// 					if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();
// 				}
// 			// }

// 			$Ycoord=$yPosition;
// 			// $pdf->SetFontSize(10);

// 			// $pdf->SetXY(170, $pdf->GetY());
// 			// $pdf->MultiCell(35, 5, "xxxx",1,'C');

// 			$pdf->Line(10, $contentY, 10, $yPosition);
// 			$pdf->Line(50, $contentY, 50, $pdf->GetY());
// 			$pdf->Line(70, $contentY, 70, $pdf->GetY());
// 			$pdf->Line(105, $contentY, 105, $pdf->GetY());
// 			$pdf->Line(120, $contentY, 120, $pdf->GetY());
// 			$pdf->Line(145, $contentY, 145, $pdf->GetY());
// 			$pdf->Line(170, $contentY, 170, $pdf->GetY());
// 			$pdf->Line(205, $contentY, 205, $yPosition);

// 			$pdf->Line(10, $yPosition, 205, $yPosition);
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