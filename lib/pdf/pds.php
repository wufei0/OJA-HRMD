<?php

require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
// initialize DB connection
require_once('../../essential/session.php');
include("../../essential/connection.php");
// global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
// $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
// require_once('../getData/pds.php');


$employeeInfo=employeeData();
// print_r($employeeInfo);
// die();

// initiate FPDI
$pdf = new FPDI();
// add a page

// set the source file
$pdf->setSourceFile("format/pds.pdf");
// import page 1
$tplIdx = $pdf->importPage(1);
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak('off');
//$size = $pdf->getTemplateSize($tplIdx);
$pdf->AddPage();

// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, null, null, 0, 0, true);

// now write some text above the imported page
$fontUsed='Helvetica';
$pdf->SetFont($fontUsed);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFontSize(12);

//LASTNAME
	$empName=str_split($employeeInfo['EmpLName']);
	$xCoord=34.5;
	$nameBoxXaxis=0;
	foreach ($empName as $empNameArr)
	{
		$pdf->SetXY($xCoord, 44.8);
		/* $pdf->Write(0, substr($employeeInfo['EmpLName'],$nameBoxXaxis,1)); */
		$pdf->MultiCell(4.5, 2.8, substr($employeeInfo['EmpLName'],$nameBoxXaxis,1),0,'L');
		$xCoord=$xCoord+5.7;
		$nameBoxXaxis++;
	}

//FIRSTNAME
	$empName=str_split($employeeInfo['EmpFName']);
	$xCoord=34;
	$nameBoxXaxis=0;
	foreach ($empName as $empNameArr)
	{
		$pdf->SetXY($xCoord, 50.8);
		$pdf->MultiCell(4.5, 2.8, substr($employeeInfo['EmpFName'],$nameBoxXaxis,1),0,'L');
		/* $pdf->Write(0, $empNameArr[0]); */
		/* $xCoord=$pdf->GetX()+3.1; */
		$xCoord=$xCoord+5.7;
		$nameBoxXaxis++;
	}

//MIDDLENAME
	$empName=str_split($employeeInfo['EmpMName']);
	$xCoord=34;
	$nameBoxXaxis=0;
	foreach ($empName as $empNameArr)
	{
		$pdf->SetXY($xCoord, 56);
		$pdf->MultiCell(4.5, 2.8, substr($employeeInfo['EmpMName'],$nameBoxXaxis,1),0,'L');
		/* $pdf->Write(0, $empNameArr[0]);
		$xCoord=$pdf->GetX()+3.1; */
		$xCoord=$xCoord+5.7;
		$nameBoxXaxis++;
	}

//NAME EXT
	$pdf->SetXY(189, 58);
	$pdf->Write(0, $employeeInfo['EmpExtName']);

$pdf->SetFontSize(10);

//DATE OF BIRTH
	$pdf->SetXY(62.5, 61.5);
	$pdf->MultiCell(31.5, 2.8, $employeeInfo['EmpBirthMonth'].'/'.$employeeInfo['EmpBirthDay'].'/'.$employeeInfo['EmpBirthYear'],0,'L');
	// $pdf->MultiCell(19, 3, $employeeInfo['EmpBirthMonth'].'/'.$employeeInfo['EmpBirthDay'].'/'.$employeeInfo['EmpBirthYear'],0,'L');
	/* $pdf->SetXY(75, 61.5);
	$pdf->MultiCell(8, 3, $employeeInfo['EmpBirthDay'],0,'C');	
	$pdf->SetXY(84, 61.5);
	$pdf->MultiCell(10, 3, $employeeInfo['EmpBirthYear'],0,'L'); */

//PLACE OF BIRTH
	$pdf->SetXY(34, 68);
	if(strlen($employeeInfo['EmpBirthPlace'])>27) 
	{
		$pdf->SetFontSize(7);
		$pdf->SetXY(34, 66.7);
	}
	$pdf->MultiCell(60, 2.7, $employeeInfo['EmpBirthPlace'],0,'L');
	
	if(strlen($employeeInfo['EmpBirthPlace'])>27) $pdf->SetFontSize(9);
	
//RESIDENTIAL ADDRESS
	$pdf->SetXY(130, 61);	
	if(strlen($employeeInfo['EmpResAddBrgy'].", ".$employeeInfo['EmpResAddMun'].", ".$employeeInfo['EmpResAddProv'])>51)
	{
		$pdf->SetFontSize(8);
		$pdf->SetXY(130, 61);
	}
	//$pdf->MultiCell(83.5, 3, $employeeInfo['EmpResAddBrgy'].", ".$employeeInfo['EmpResAddMun'].", ".$employeeInfo['EmpResAddProv'],0,'L');
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpResAddBrgy'].", ".$employeeInfo['EmpResAddMun'].", ".$employeeInfo['EmpResAddProv'],0,'L');
	
	if(strlen($employeeInfo['EmpResAddBrgy'].", ".$employeeInfo['EmpResAddMun'].", ".$employeeInfo['EmpResAddProv'])>51) $pdf->SetFontSize(10);

//RESIDENTIAL ZIPCODE
	$pdf->SetXY(130, 78.5);
	if(strlen($employeeInfo['EmpResZipCode'])>34)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpResZipCode'],0,'L');
	$pdf->SetFontSize(10);

//RESIDENTIAL TEL NO
	$pdf->SetXY(130, 84);
	if(strlen($employeeInfo['EmpResTel'])>34)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpResTel'],0,'L');
	$pdf->SetFontSize(10);

//PERMANENT ADDRESS
	$pdf->SetXY(130, 90);
	if(strlen($employeeInfo['EmpPerAddBrgy'].", ".$employeeInfo['EmpPerAddMun'].", ".$employeeInfo['EmpPerAddProv'])>51)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpPerAddBrgy'].", ".$employeeInfo['EmpPerAddMun'].", ".$employeeInfo['EmpPerAddProv'],0,'L');
	if(strlen($employeeInfo['EmpPerAddBrgy'].", ".$employeeInfo['EmpPerAddMun'].", ".$employeeInfo['EmpPerAddProv'])>51) $pdf->SetFontSize(10);

//PERMANENT ZIPCODE
	$pdf->SetXY(130, 107);
	if(strlen($employeeInfo['EmpResZipCode'])>34)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpResZipCode'],0,'L');
	$pdf->SetFontSize(10);

//PERMANENT TEL NO
	$pdf->SetXY(130, 113);
	if(strlen($employeeInfo['EmpResTel'])>34)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpResTel'],0,'L');
	$pdf->SetFontSize(10);

//EMAIL
	$pdf->SetXY(130, 124.5);
	if(strlen($employeeInfo['EmpEMail'])>34)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpEMail'],0,'L');
	if(strlen($employeeInfo['EmpEMail'])>34) $pdf->SetFontSize(10);

//CELLPHONE
	$pdf->SetXY(130, 119);
	if(strlen($employeeInfo['EmpMobile'])>34)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpMobile'],0,'L');
	$pdf->SetFontSize(10);

//EMPLOYEE AGENCY NO
	$pdf->SetXY(130, 130);
	if(strlen($employeeInfo['EmpAgencyNo'])>34)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpAgencyNo'],0,'L');
	$pdf->SetFontSize(10);

//TIN NO
	$pdf->SetXY(130, 136);
	if(strlen($employeeInfo['EmpTIN'])>34)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(83.5, 2.8, $employeeInfo['EmpTIN'],0,'L');
	if(strlen($employeeInfo['EmpTIN'])>34) $pdf->SetFontSize(10);

//GENDER
	switch ($employeeInfo['EmpSex'])
	{
		case "MALE":
		$pdf->SetXY(35,74);
		break;
		case "FEMALE":
		$pdf->SetXY(51,74);
		break;
	}
	$pdf->SetFont('ZapfDingbats','', 10);
	$pdf->Write(0, "4");

//CIVIL STATUS
	switch ($employeeInfo['EmpCivilStatus'])
	{
		case "SINGLE":
		$pdf->SetXY(35,81);
		break;
		case "MARRIED":
		$pdf->SetXY(35,86);
		break;	
		case "ANNULED":
		$pdf->SetXY(35,91);
		break;	
		case "WIDOWED":
		$pdf->SetXY(53,81);
		break;	
		case "SEPARATED":
		$pdf->SetXY(53,86);
		break;	
	}
	$pdf->Write(0, "4");

$pdf->SetFont($fontUsed);

//CITIZENSHIP
	$pdf->SetXY(34, 96);
	if(strlen($employeeInfo['EmpCitizenship'])>24)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(60, 2.8, $employeeInfo['EmpCitizenship'],0,'L');
	$pdf->SetFontSize(10);

//HEIGHT
	$pdf->SetXY(34, 102.5);
	if(strlen($employeeInfo['EmpHeight'])>24)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(60, 2.8, $employeeInfo['EmpHeight'],0,'L');
	$pdf->SetFontSize(10);

//WEIGHT
	$pdf->SetXY(34, 108);
	if(strlen($employeeInfo['EmpWeight'])>24)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(60, 2.8, $employeeInfo['EmpWeight'],0,'L');
	$pdf->SetFontSize(10);

//BLOODTYPE
	$pdf->SetXY(34, 113.5);
	if(strlen($employeeInfo['EmpBloodType'])>24)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(60, 2.8, $employeeInfo['EmpBloodType'],0,'L');
	$pdf->SetFontSize(10);

//GSIS
	$pdf->SetXY(34, 119.5);
	if(strlen($employeeInfo['EmpGSIS'])>24)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(60, 2.8, $employeeInfo['EmpGSIS'],0,'L');
	$pdf->SetFontSize(10);

//PAGIBIG
	$pdf->SetXY(34, 125.5);
	if(strlen($employeeInfo['EmpHDMF'])>24)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(60, 2.8, $employeeInfo['EmpHDMF'],0,'L');
	$pdf->SetFontSize(10);

//PHILHEALTH
	$pdf->SetXY(34, 131);
	if(strlen($employeeInfo['EmpPH'])>24)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(60, 2.8, $employeeInfo['EmpPH'],0,'L');
	$pdf->SetFontSize(10);

//SSS
	$pdf->SetXY(34, 136.5);
	if(strlen($employeeInfo['EmpSSS'])>24)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(60, 2.8, $employeeInfo['EmpSSS'],0,'L');
	$pdf->SetFontSize(10);

//SPS LASTNAME	
	$pdf->SetXY(34, 148);
	if(strlen($employeeInfo['EmpSpsLName'])>33)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(80, 2.8, $employeeInfo['EmpSpsLName'],0,'L');	
	$pdf->SetFontSize(10);
	
//SPS MIDDLENAME	
	$pdf->SetXY(34, 153.5);
	if(strlen($employeeInfo['EmpSpsMName'])>33)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(80, 2.8, $employeeInfo['EmpSpsMName'],0,'L');	
	$pdf->SetFontSize(10);
	
// SPS FIRSTNAME
	$pdf->SetXY(34, 159.5);
	if(strlen($employeeInfo['EmpSpsFName'])>33)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(80, 2.8, $employeeInfo['EmpSpsFName'],0,'L');
	$pdf->SetFontSize(10);

// SPS OCCUPATION 
	$pdf->SetXY(34, 165.5);
	if(strlen($employeeInfo['EmpSpsJob'])>33)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(80, 2.8, $employeeInfo['EmpSpsJob'],0,'L');
	$pdf->SetFontSize(10);
	
// SPS BUSINESS NAME	
	$pdf->SetXY(34, 171);
	if(strlen($employeeInfo['EmpSpsBusDesc'])>33)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(80, 2.8, $employeeInfo['EmpSpsBusDesc'],0,'L');
	$pdf->SetFontSize(10);
	
// SPS BUSINESS ADDRESS	
	$pdf->SetXY(34, 176.5);
	if(strlen($employeeInfo['EmpSpsBusAddSt'])>33)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(80, 2.8, $employeeInfo['EmpSpsBusAddSt'],0,'L');
	$pdf->SetFontSize(10);
	
// SPS BUSINESS TEL NO	
	$pdf->SetXY(34, 182);
	if(strlen($employeeInfo['EmpSpsBusTel'])>33)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(80, 2.8, $employeeInfo['EmpSpsBusTel'],0,'L');
	$pdf->SetFontSize(10);
	
// FATHER LASTNAME	
	$pdf->SetXY(37.5, 194);
	if(strlen($employeeInfo['EmpFatherLName'])>31)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(76.5, 2.8, $employeeInfo['EmpFatherLName'],0,'L');
	$pdf->SetFontSize(10);
	
// FATHER MIDDLENAME
	$pdf->SetXY(37.5, 199.5);
	if(strlen($employeeInfo['EmpFatherFName'])>31)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(76.5, 2.8, $employeeInfo['EmpFatherFName'],0,'L');
	$pdf->SetFontSize(10);
	
// FATHER FIRSTNAME
	$pdf->SetXY(37.5, 205);
	if(strlen($employeeInfo['EmpFatherMName'])>31)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(76.5, 2.8, $employeeInfo['EmpFatherMName'],0,'L');
	$pdf->SetFontSize(10);
	
// MOTHER LASTNAME	
	$pdf->SetXY(37.5, 217);
	if(strlen($employeeInfo['EmpMotherLName'])>31)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(76.5, 2.8, $employeeInfo['EmpMotherLName'],0,'L');
	$pdf->SetFontSize(10);
	
// MOTHER FIRSTNAME	
	$pdf->SetXY(37.5, 222.5);
	if(strlen($employeeInfo['EmpMotherFName'])>31)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(76.5, 2.8, $employeeInfo['EmpMotherFName'],0,'L');
	$pdf->SetFontSize(10);
	
// MOTHER MIDDLENAME	
	$pdf->SetXY(37.5, 228.5);
	if(strlen($employeeInfo['EmpMotherMName'])>31)
	{
		$pdf->SetFontSize(8);
	}
	$pdf->MultiCell(76.5, 2.8, $employeeInfo['EmpMotherMName'],0,'L');
	$pdf->SetFontSize(10);
	
//DEPENDENTS
	$yCoordName=153.5;
	$yCoordBmonth=153.5;
	$yCoordBdate=154;
	$yCoordByear=152.9;
	foreach($employeeInfo['0'] as $dependetArr)
	{
		$pdf->SetXY(114, $yCoordName);
		if(strlen($dependetArr['DpntFName']." ".$dependetArr['DpntMName']." ".$dependetArr['DpntLName'])>24)
		{
			$pdf->SetFontSize(8);
		}
		$pdf->MultiCell(58.5, 2.8, $dependetArr['DpntFName']." ".$dependetArr['DpntMName']." ".$dependetArr['DpntLName'],0,'L');
		$pdf->SetFontSize(10);
		
		
		$pdf->SetXY(172.5, $yCoordBmonth);
		if(strlen($dependetArr['DpntBirthMonth']."/".$dependetArr['DpntBirthDate']."/".$dependetArr['DpntBirthYear'])>16)
		{
			$pdf->SetFontSize(8);
		}
		$pdf->MultiCell(41.5, 2.8, $dependetArr['DpntBirthMonth']."/".$dependetArr['DpntBirthDate']."/".$dependetArr['DpntBirthYear'],0,'C');
		$pdf->SetFontSize(10);
		
		//$pdf->SetXY(182, $yCoordBmonth);
		//$pdf->Write(0, $dependetArr['DpntBirthMonth']);
//		$pdf->MultiCell(3, 20, $dependetArr['DpntBirthMonth'],0,'R');

		//$pdf->SetXY(191, $yCoordBdate);
		//$pdf->Write(0, $dependetArr['DpntBirthDate']);
		
		//$pdf->SetXY(199, $yCoordByear);
		//$pdf->MultiCell(10.1, 3.8, $dependetArr['DpntBirthYear'],1,'L');
		//$pdf->Write(0, $dependetArr['DpntBirthYear']);
		
		$yCoordName=$yCoordName+6;
		$yCoordBmonth=$yCoordBmonth+6;
		//$yCoordBdate=$yCoordBdate+6;
		//$yCoordByear=$yCoordByear+6;
		
	}
	

// EDUCATIONAL BACKGROUND	
//ELEMENTARY
	$elemItem=1;
	$highschoolItem=1;
	$vocationalItem=1;
	$collegeItem=1;
	$masteralItem=1;
	
	foreach($employeeInfo['1'] as $educDetail)
	{
		if (($educDetail['EducLvlID']=='L01')AND($elemItem==1))
		{
			
			$pdf->SetXY(34, 254);
			if(strlen($educDetail['EducSchoolName'])>44) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(34, 254);
			}
			$pdf->MultiCell(55, 3, $educDetail['EducSchoolName'],0,'L');
			if(strlen($educDetail['EducSchoolName'])>44) $pdf->SetFontSize(9);
			
			
			$pdf->SetXY(89, 254);	
			if(strlen($educDetail['EducCourse'])>9) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(89, 253.8);
			}
			$pdf->MultiCell(25, 2.6, $educDetail['EducCourse'],0,'C');
			if(strlen($educDetail['EducCourse'])>9) $pdf->SetFontSize(10);
			
			$pdf->SetXY(114, 256);
			if(strlen($educDetail['EducYrGrad'])>5) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16, 2.8, $educDetail['EducYrGrad'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(130, 254.5);
			if(strlen($educDetail['EducGradeLvlUnits'])>8) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(130, 254.5);
			}
			$pdf->MultiCell(22.5, 2.6, $educDetail['EducGradeLvlUnits'],0,'C');
			if(strlen($educDetail['EducGradeLvlUnits'])>8) $pdf->SetFontSize(10);
			
			$pdf->SetXY(153, 256);	
			if(strlen($educDetail['EducIncAttDateFromDate'])>8) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(19.5, 2.8, $educDetail['EducIncAttDateFromDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(172, 256);	
			if(strlen($educDetail['EducIncAttDateToDate'])>7) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16.3, 2.8, $educDetail['EducIncAttDateToDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetFontSize(10);
			$pdf->SetXY(188, 254);	
			if(strlen($educDetail['EducAwards'])>12) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(188, 254);
			}
			$pdf->MultiCell(26, 2.6, $educDetail['EducAwards'],0,'C');
			if(strlen($educDetail['EducAwards'])>12) $pdf->SetFontSize(10);
			$elemItem++;
		}
//HIGH SCHOOL
		if (($educDetail['EducLvlID']=='L02')AND($highschoolItem==1))
		{
			
			$pdf->SetXY(34, 263);
			if(strlen($educDetail['EducSchoolName'])>44) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(34, 263);
			}
			$pdf->MultiCell(55, 3, $educDetail['EducSchoolName'],0,'L');
			if(strlen($educDetail['EducSchoolName'])>44) $pdf->SetFontSize(10);
			
			$pdf->SetXY(89, 263.5);
			if(strlen($educDetail['EducCourse'])>9) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(89, 262.5);
			}
			$pdf->MultiCell(25, 2.6, $educDetail['EducCourse'],0,'C');
			if(strlen($educDetail['EducCourse'])>9) $pdf->SetFontSize(10);
			
			$pdf->SetXY(114, 265);
			if(strlen($educDetail['EducYrGrad'])>5) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16, 2.8, $educDetail['EducYrGrad'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(130, 263);	
			if(strlen($educDetail['EducGradeLvlUnits'])>8) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(130, 263);
			}
			$pdf->MultiCell(22.5, 3, $educDetail['EducGradeLvlUnits'],0,'C');
			if(strlen($educDetail['EducGradeLvlUnits'])>8) $pdf->SetFontSize(10);
			
			$pdf->SetXY(153, 265);	
			if(strlen($educDetail['EducIncAttDateFromDate'])>8) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(19.5, 2.8, $educDetail['EducIncAttDateFromDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(172, 265);	
			if(strlen($educDetail['EducIncAttDateToDate'])>7) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16.3, 2.8, $educDetail['EducIncAttDateToDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetFontSize(10);
			$pdf->SetXY(188, 263);
			if(strlen($educDetail['EducAwards'])>12) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(188, 263);
			}
			$pdf->MultiCell(26, 2.6, $educDetail['EducAwards'],0,'L');
			if(strlen($educDetail['EducAwards'])>12) $pdf->SetFontSize(10);
			$highschoolItem++;
		}	
//VOCATIONAL
		if (($educDetail['EducLvlID']=='L07')AND($vocationalItem==1))
		{
			$pdf->SetXY(34, 272.3);
			if(strlen($educDetail['EducSchoolName'])>44) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(34, 272.3);
			}
			$pdf->MultiCell(55, 3, $educDetail['EducSchoolName'],0,'L');
			if(strlen($educDetail['EducSchoolName'])>44) $pdf->SetFontSize(10);
			
			$pdf->SetXY(89, 272.3);
			if(strlen($educDetail['EducCourse'])>9) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(89, 272.3);
			}
			$pdf->MultiCell(25, 3, $educDetail['EducCourse'],0,'C');
			if(strlen($educDetail['EducCourse'])>9) $pdf->SetFontSize(10);
			
			$pdf->SetXY(114, 275);
			if(strlen($educDetail['EducYrGrad'])>5) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16, 2.8, $educDetail['EducYrGrad'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(130, 273);	
			if(strlen($educDetail['EducGradeLvlUnits'])>8) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(130, 273);
			}
			$pdf->MultiCell(22.5, 3, $educDetail['EducGradeLvlUnits'],0,'C');
			if(strlen($educDetail['EducGradeLvlUnits'])>8) $pdf->SetFontSize(10);
			
			$pdf->SetXY(153, 275);
			if(strlen($educDetail['EducIncAttDateFromDate'])>8) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(19.5, 2.8, $educDetail['EducIncAttDateFromDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(172, 275);	
			if(strlen($educDetail['EducIncAttDateToDate'])>7) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16.3, 2.8, $educDetail['EducIncAttDateToDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetFontSize(10);
			$pdf->SetXY(188, 273);
			if(strlen($educDetail['EducAwards'])>12) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(188, 273);
			}
			$pdf->MultiCell(26, 2.6, $educDetail['EducAwards'],0,'L');
			if(strlen($educDetail['EducAwards'])>12) $pdf->SetFontSize(10);
			$vocationalItem++;
		}
//COLLEGE 
		if (($educDetail['EducLvlID']=='L03')AND($collegeItem==1))
		{
			$pdf->SetXY(34, 281.5);
			if(strlen($educDetail['EducSchoolName'])>44) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(34, 281.5);
			}
			$pdf->MultiCell(55, 3, $educDetail['EducSchoolName'],0,'L');
			if(strlen($educDetail['EducSchoolName'])>44) $pdf->SetFontSize(10);
			
			$pdf->SetXY(89, 281.5);
			if(strlen($educDetail['EducCourse'])>9) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(89, 281.5);
			}
			$pdf->MultiCell(25, 3, $educDetail['EducCourse'],0,'C');
			if(strlen($educDetail['EducCourse'])>9) $pdf->SetFontSize(10);
			
			$pdf->SetXY(114, 284);
			if(strlen($educDetail['EducYrGrad'])>5) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16, 2.8, $educDetail['EducYrGrad'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(130, 282);	
			if(strlen($educDetail['EducGradeLvlUnits'])>8) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(130, 282);
			}
			$pdf->MultiCell(22.5, 3, $educDetail['EducGradeLvlUnits'],0,'C');
			if(strlen($educDetail['EducGradeLvlUnits'])>8) $pdf->SetFontSize(10);
			
			$pdf->SetXY(153, 284);
			if(strlen($educDetail['EducIncAttDateFromDate'])>8) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(19.5, 2.8, $educDetail['EducIncAttDateFromDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(172, 284);	
			if(strlen($educDetail['EducIncAttDateToDate'])>7) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16.3, 2.8, $educDetail['EducIncAttDateToDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetFontSize(10);
			$pdf->SetXY(188, 282);	
			if(strlen($educDetail['EducAwards'])>12) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(188, 282);
			}
			$pdf->MultiCell(26, 2.6, $educDetail['EducAwards'],0,'L');
			if(strlen($educDetail['EducAwards'])>12) $pdf->SetFontSize(10);
			$collegeItem++;
		}
		elseif(($educDetail['EducLvlID']=='L03')AND($collegeItem==2))	
		{
			$pdf->SetXY(34, 290.5);
			if(strlen($educDetail['EducSchoolName'])>44) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(34, 290.5);
			}
			$pdf->MultiCell(55, 3, $educDetail['EducSchoolName'],0,'L');
			if(strlen($educDetail['EducSchoolName'])>44) $pdf->SetFontSize(10);
			
			$pdf->SetXY(89, 290.5);
			if(strlen($educDetail['EducCourse'])>9) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(89, 290.5);
			}
			$pdf->MultiCell(25, 3, $educDetail['EducCourse'],0,'C');
			if(strlen($educDetail['EducCourse'])>9) $pdf->SetFontSize(10);
			
			$pdf->SetXY(114, 293);
			if(strlen($educDetail['EducYrGrad'])>5) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16, 2.8, $educDetail['EducYrGrad'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(130, 291);	
			if(strlen($educDetail['EducGradeLvlUnits'])>8) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(130, 291);
			}
			$pdf->MultiCell(22.5, 3, $educDetail['EducGradeLvlUnits'],0,'C');
			if(strlen($educDetail['EducGradeLvlUnits'])>8) $pdf->SetFontSize(10);
			
			$pdf->SetXY(153, 293);
			if(strlen($educDetail['EducIncAttDateFromDate'])>8) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(19.5, 2.8, $educDetail['EducIncAttDateFromDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(172, 293);	
			if(strlen($educDetail['EducIncAttDateToDate'])>7) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16.3, 2.8, $educDetail['EducIncAttDateToDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetFontSize(10);
			$pdf->SetXY(188, 291);	
			if(strlen($educDetail['EducAwards'])>12) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(188, 291);
			}
			$pdf->MultiCell(26, 2.6, $educDetail['EducAwards'],0,'L');
			if(strlen($educDetail['EducAwards'])>12) $pdf->SetFontSize(10);
			$collegeItem++;
		}
// MASTERAL 
		if (($educDetail['EducLvlID']=='L06')AND($masteralItem==1))
		{
			$pdf->SetXY(34, 299.5);
			if(strlen($educDetail['EducSchoolName'])>44) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(34, 299.5);
			}
			$pdf->MultiCell(55, 3, $educDetail['EducSchoolName'],0,'L');
			if(strlen($educDetail['EducSchoolName'])>44) $pdf->SetFontSize(10);
			
			$pdf->SetXY(89, 299.5);
			if(strlen($educDetail['EducCourse'])>9) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(89, 299.5);
			}
			$pdf->MultiCell(25, 3, $educDetail['EducCourse'],0,'C');
			if(strlen($educDetail['EducCourse'])>9) $pdf->SetFontSize(10);
			
			$pdf->SetXY(114, 302);
			if(strlen($educDetail['EducYrGrad'])>5) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16, 2.8, $educDetail['EducYrGrad'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(130, 300);	
			if(strlen($educDetail['EducGradeLvlUnits'])>8) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(130, 300);
			}
			$pdf->MultiCell(22.5, 3, $educDetail['EducGradeLvlUnits'],0,'C');
			if(strlen($educDetail['EducGradeLvlUnits'])>8) $pdf->SetFontSize(10);
			
			$pdf->SetXY(153, 302);	
			if(strlen($educDetail['EducIncAttDateFromDate'])>8) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(19.5, 2.8, $educDetail['EducIncAttDateFromDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(172, 302);
			if(strlen($educDetail['EducIncAttDateToDate'])>7) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16.3, 2.8, $educDetail['EducIncAttDateToDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetFontSize(10);
			$pdf->SetXY(188, 300);
			if(strlen($educDetail['EducAwards'])>12) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(188, 299.5);
			}
			$pdf->MultiCell(26, 2.6, $educDetail['EducAwards'],0,'C');
			if(strlen($educDetail['EducAwards'])>12) $pdf->SetFontSize(10);
			$masteralItem++;
		}
		elseif(($educDetail['EducLvlID']=='L06')AND($masteralItem==2))	
		{
			$pdf->SetXY(34, 308.5);
			if(strlen($educDetail['EducSchoolName'])>44) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(34, 308.5);
			}
			$pdf->MultiCell(55, 3, $educDetail['EducSchoolName'],0,'L');
			if(strlen($educDetail['EducSchoolName'])>44) $pdf->SetFontSize(10);
			
			$pdf->SetXY(89, 308.5);
			if (strlen($educDetail['EducCourse'])>9) $pdf->SetFontSize(8);
			$pdf->MultiCell(25, 3, $educDetail['EducCourse'],0,'C');
			
			$pdf->SetXY(114, 310);
			if(strlen($educDetail['EducYrGrad'])>5) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16, 2.8, $educDetail['EducYrGrad'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(130, 309);	
			if(strlen($educDetail['EducGradeLvlUnits'])>8) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(130, 309);
			}
			$pdf->MultiCell(22.5, 3, $educDetail['EducGradeLvlUnits'],0,'C');
			if(strlen($educDetail['EducGradeLvlUnits'])>8) $pdf->SetFontSize(10);
			
			$pdf->SetXY(153, 310);
			if(strlen($educDetail['EducIncAttDateFromDate'])>8) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(19.5, 2.8, $educDetail['EducIncAttDateFromDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(172, 310);	
			if(strlen($educDetail['EducIncAttDateToDate'])>7) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(16.3, 2.8, $educDetail['EducIncAttDateToDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetFontSize(10);
			$pdf->SetXY(188, 308.5);
			if(strlen($educDetail['EducAwards'])>12) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(188, 308.5);
			}
			$pdf->MultiCell(26, 2.6, $educDetail['EducAwards'],0,'L');
			if(strlen($educDetail['EducAwards'])>12) $pdf->SetFontSize(10);
			$masteralItem++;
		}
	}
	

$pdf->AddPage();
$page2 = $pdf->importPage(2);
$pdf->useTemplate($page2, null, null, 0, 0, true);


// CIVIL SERVICE
$cscYcoord=29;
$cscYcoordPlace=28.5;
	foreach($employeeInfo['2'] as $cseDetail)
	{
		$pdf->SetFontSize(10);
			$pdf->SetXY(7, $cscYcoord);
			if(strlen($cseDetail['CSEDesc'])>25) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(7, $cscYcoord);
			}
			$pdf->MultiCell(62.3, 2.8, $cseDetail['CSEDesc'],0,'L');
			if(strlen($cseDetail['CSEDesc'])>25) $pdf->SetFontSize(10);
			
			$pdf->SetXY(69.5, $cscYcoord);	
			if(strlen($cseDetail['CSERating'])>7) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(19, 2.8, $cseDetail['CSERating'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(88.8, $cscYcoord);
			if(strlen($cseDetail['CSEExamDate'])>8) 
			{
				$pdf->SetFontSize(8);
			}
			$pdf->MultiCell(20.3, 2.8, $cseDetail['CSEExamDate'],0,'C');
			$pdf->SetFontSize(10);
			
			$pdf->SetXY(109.4, $cscYcoordPlace);
			if(strlen($cseDetail['CSEExamPlace'])>27) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(109.4, $cscYcoordPlace);
			}
			$pdf->MultiCell(66, 2.8, $cseDetail['CSEExamPlace'],0,'L');
			if(strlen($cseDetail['CSEExamPlace'])>27) $pdf->SetFontSize(10);
			
			$pdf->SetXY(175.5, $cscYcoord);	
			if(strlen($cseDetail['CSELicNum'])>7) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(175.5, $cscYcoord);
			}
			$pdf->MultiCell(17.8, 3, $cseDetail['CSELicNum'],0,'C');
			if(strlen($cseDetail['CSELicNum'])>7) $pdf->SetFontSize(10);
			
		$pdf->SetFontSize(8);
			$pdf->SetXY(193.3, $cscYcoord);	
			$pdf->MultiCell(16.2, 2.8, $cseDetail['CSELicReleaseDate'],0,'C');
			$cscYcoord=$cscYcoord+9.5;
			$cscYcoordPlace=$cscYcoordPlace+9.5;
	}

// WORK EXPERIENCE
	$wExpYcoordFrom=124;
	$wExpYcoordTo=124;
	$wExpYcoordPosition=122.7;
	$wExpYcoordEmployee=122.7;
	$wExpYcoordMsalary=123;
	$wExpYcoordGsalary=123;
	$wExpYcoordApp=122.7;
	$wExpYcoordGov=124;
	foreach($employeeInfo['3'] as $workExpDetail)
	{

		$pdf->SetXY(7, $wExpYcoordFrom);
		if(strlen($workExpDetail['WExpFromMonth']."/".$workExpDetail['WExpFromDay']."/".$workExpDetail['WExpFromYear'])>7) 
			{
				$pdf->SetFontSize(9);
				$pdf->SetXY(7, $wExpYcoordFrom);
			}
		$pdf->MultiCell(18.5, 2.8, $workExpDetail['WExpFromMonth']."/".$workExpDetail['WExpFromDay']."/".$workExpDetail['WExpFromYear'],0,'C');

//		$pdf->SetXY(13, $wExpYcoordFrom);
//		$pdf->MultiCell(6, 3.8, $workExpDetail['WExpFromDay'],0,'C');		
		
//		$pdf->SetXY(19.5, $wExpYcoordFrom);
//		$pdf->MultiCell(6, 3.8, $workExpDetail['WExpFromYear'],0,'L');
		$wExpYcoordFrom=$wExpYcoordFrom+9.5;
		if(strlen($workExpDetail['WExpFromMonth']."/".$workExpDetail['WExpFromDay']."/".$workExpDetail['WExpFromYear'])>7) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(25.5, $wExpYcoordTo);
		if(strlen($workExpDetail['WExpToMonth']."/".$workExpDetail['WExpToDay']."/".$workExpDetail['WExpToYear'])>7) 
			{
				$pdf->SetFontSize(9);
				$pdf->SetXY(25.5, $wExpYcoordTo);
			}
		$pdf->MultiCell(19, 2.8, $workExpDetail['WExpToMonth']."/".$workExpDetail['WExpToDay']."/".$workExpDetail['WExpToYear'],0,'C');
		//$pdf->SetXY(33, $wExpYcoordTo);
		//$pdf->MultiCell(6, 3.8, $workExpDetail['WExpToDay'],0,'L');		
		
		//$pdf->SetXY(38, $wExpYcoordTo);
		//$pdf->MultiCell(6, 3.8, $workExpDetail['WExpToYear'],0,'L');
		$wExpYcoordTo=$wExpYcoordTo+9.5;
		if(strlen($workExpDetail['WExpToMonth']."/".$workExpDetail['WExpToDay']."/".$workExpDetail['WExpToYear'])>7) $pdf->SetFontSize(10);
		
		
		$pdf->SetFontSize(10);
		$pdf->SetXY(44.5, $wExpYcoordPosition);
		if(strlen($workExpDetail['WExpPosition'])>17) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(44.5, $wExpYcoordPosition);
			}
		$pdf->MultiCell(44, 2.8, $workExpDetail['WExpPosition'],0,'L');
		$wExpYcoordPosition=$wExpYcoordPosition+9.5;
		if(strlen($workExpDetail['WExpPosition'])>17) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(88.5, $wExpYcoordEmployee);
		if(strlen($workExpDetail['WExpEmployer'])>22) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(88.5, $wExpYcoordEmployee);
			}
		$pdf->MultiCell(55, 2.8, $workExpDetail['WExpEmployer'],0,'L');
		$wExpYcoordEmployee=$wExpYcoordEmployee+9.5;
		if(strlen($workExpDetail['WExpEmployer'])>22) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(143.5, $wExpYcoordMsalary);
		if(strlen($workExpDetail['WExpSalary'])>6) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(143.5, $wExpYcoordMsalary);
			}
		$pdf->MultiCell(16.5, 2.8, $workExpDetail['WExpSalary'],0,'C');
		$wExpYcoordMsalary=$wExpYcoordMsalary+9.5;
		if(strlen($workExpDetail['WExpSalary'])>6) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(160, $wExpYcoordGsalary);
		if(strlen($workExpDetail['SalGrdID'])>6) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(160, $wExpYcoordGsalary);
			}
		$pdf->MultiCell(15.5, 2.8, $workExpDetail['SalGrdID'],0,'C');
		$wExpYcoordGsalary=$wExpYcoordGsalary+9.5;
		if(strlen($workExpDetail['SalGrdID'])>6) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(175.5, $wExpYcoordApp);
		if(strlen($workExpDetail['ApptStID'])>8) 
			{
				$pdf->SetFontSize(7.6);
				$pdf->SetXY(175.5, $wExpYcoordApp);
			}
		$pdf->MultiCell(17.8, 2.8, $workExpDetail['ApptStID'],0,'C');
		$wExpYcoordApp=$wExpYcoordApp+9.5;
		if(strlen($workExpDetail['ApptStID'])>8) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(193.5, $wExpYcoordGov);
		$pdf->MultiCell(15.5, 3.8, $workExpDetail['WExpIsGov'],0,'C');
		$wExpYcoordGov=$wExpYcoordGov+9.5;

		
	}




$pdf->AddPage();
$page3 = $pdf->importPage(3);
$pdf->useTemplate($page3, null, null, 0, 0, true);

// VOLUNTARY WORK
$volYcoordname=30.5;
$volYcoordFrom=32;
$volYcoordTo=32;
$volYcoordHour=32;
$volYcoordPosition=31;
	foreach($employeeInfo['4'] as $VolDetail)
	{
		$pdf->SetXY(7.5, $volYcoordname);
		if(strlen($VolDetail['VolOrgName']." - ".$VolDetail['VolOrgAddSt'])>37) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(7.5, $volYcoordname);
			}
		$pdf->MultiCell(88.5, 2.8, $VolDetail['VolOrgName']." - ".$VolDetail['VolOrgAddSt'],0,'L');
		$volYcoordname=$volYcoordname+9.5;
		if(strlen($VolDetail['VolOrgName']." - ".$VolDetail['VolOrgAddSt'])>37) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(95.5, $volYcoordFrom);
		if(strlen($VolDetail['VolOrgFromMonth'].'/'.$VolDetail['VolOrgFromDay'].'/'.$VolDetail['VolOrgFromYear'])>10) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(95.5, $volYcoordFrom);
			}
		$pdf->MultiCell(22.7, 2.8, $VolDetail['VolOrgFromMonth'].'/'.$VolDetail['VolOrgFromDay'].'/'.$VolDetail['VolOrgFromYear'],0,'C');

/* 		$pdf->SetXY(103, $volYcoordFrom);
		$pdf->MultiCell(6.5, 3.8, $VolDetail['VolOrgFromDay'],0,'C');		
		
		$pdf->SetXY(110, $volYcoordFrom);
		$pdf->MultiCell(6.5, 3.8, $VolDetail['VolOrgFromYear'],0,'L'); */
		$volYcoordFrom=$volYcoordFrom+9.5;
		if(strlen($VolDetail['VolOrgFromMonth'].'/'.$VolDetail['VolOrgFromDay'].'/'.$VolDetail['VolOrgFromYear'])>10) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(118.2, $volYcoordTo);
		if(strlen($VolDetail['VolOrgToMonth'].'/'.$VolDetail['VolOrgToDay'].'/'.$VolDetail['VolOrgToYear'])>10) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(118.2, $volYcoordTo);
			}
		$pdf->MultiCell(22, 2.8, $VolDetail['VolOrgToMonth'].'/'.$VolDetail['VolOrgToDay'].'/'.$VolDetail['VolOrgToYear'],0,'C');

		/* $pdf->SetXY(126, $volYcoordTo);
		$pdf->MultiCell(6.5, 3.8, $VolDetail['VolOrgToDay'],0,'C');		
		
		$pdf->SetXY(133, $volYcoordTo);
		$pdf->MultiCell(6.5, 3.8, $VolDetail['VolOrgToYear'],0,'L'); */
		$volYcoordTo=$volYcoordTo+9.5;
		if(strlen($VolDetail['VolOrgToMonth'].'/'.$VolDetail['VolOrgToDay'].'/'.$VolDetail['VolOrgToYear'])>10) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(140.2, $volYcoordHour);
		if(strlen($VolDetail['VolOrgHours'])>6) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(140.2, $volYcoordHour);
			}
		$pdf->MultiCell(17.7, 2.8, $VolDetail['VolOrgHours'],0,'C');
		$volYcoordHour=$volYcoordHour+9.5;
		if(strlen($VolDetail['VolOrgHours'])>6) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(158, $volYcoordPosition);
		if(strlen($VolDetail['VolOrgDetails'])>20) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(158, $volYcoordPosition);
			}
		$pdf->MultiCell(50.5, 2.8, $VolDetail['VolOrgDetails'],0,'C');
		$volYcoordPosition=$volYcoordPosition+9.5;
		if(strlen($VolDetail['VolOrgDetails'])>20) $pdf->SetFontSize(10);
		
	}
	

// TRAINING PROGRAMS
	$TrainDetailYcoord=104.8;
	$TrainDetailYcoordFrom=106;
	$TrainDetailYcoordTo=106;
	$TrainDetailYcoordHour=106;
	$TrainDetailYcoordSponsor=105;
	foreach($employeeInfo['5'] as $TrainDetail)
	{
		$pdf->SetXY(7.5, $TrainDetailYcoord);
		if(strlen($TrainDetail['TrainDesc'])>36) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(7.5, $TrainDetailYcoord);
			}
		$pdf->MultiCell(88, 2.8, $TrainDetail['TrainDesc'],0,'L');
		$TrainDetailYcoord=$TrainDetailYcoord+9.5;
		if(strlen($TrainDetail['TrainDesc'])>36) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(95.5, $TrainDetailYcoordFrom);
		if(strlen($TrainDetail['TrainFromMonth'].'/'.$TrainDetail['TrainFromDay'].'/'.$TrainDetail['TrainFromYear'])>10) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(95.5, $TrainDetailYcoordFrom);
			}
		$pdf->MultiCell(22.7, 2.8, $TrainDetail['TrainFromMonth'].'/'.$TrainDetail['TrainFromDay'].'/'.$TrainDetail['TrainFromYear'],0,'C');
		/* $pdf->SetXY(104, $TrainDetailYcoordFrom);
		$pdf->MultiCell(6.5, 3.8, $TrainDetail['TrainFromDay'],0,'C');		
		$pdf->SetXY(111, $TrainDetailYcoordFrom);
		$pdf->MultiCell(6.5, 3.8, $TrainDetail['TrainFromYear'],0,'L'); */
		$TrainDetailYcoordFrom=$TrainDetailYcoordFrom+9.5;
		if(strlen($TrainDetail['TrainFromMonth'].'/'.$TrainDetail['TrainFromDay'].'/'.$TrainDetail['TrainFromYear'])>10) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(118.5, $TrainDetailYcoordTo);
		if(strlen($TrainDetail['TrainToMonth'].'/'.$TrainDetail['TrainToDay'].'/'.$TrainDetail['TrainToYear'])>10) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(118.5, $TrainDetailYcoordTo);
			}
		$pdf->MultiCell(21.5, 2.8, $TrainDetail['TrainToMonth'].'/'.$TrainDetail['TrainToDay'].'/'.$TrainDetail['TrainToYear'],0,'C');
		/* $pdf->SetXY(126, $TrainDetailYcoordTo);
		$pdf->MultiCell(6.5, 3.8, $TrainDetail['TrainToDay'],0,'C');		
		$pdf->SetXY(133, $TrainDetailYcoordTo);
		$pdf->MultiCell(6.5, 3.8, $TrainDetail['TrainToYear'],0,'L'); */
		$TrainDetailYcoordTo=$TrainDetailYcoordTo+9.5;
		if(strlen($TrainDetail['TrainToMonth'].'/'.$TrainDetail['TrainToDay'].'/'.$TrainDetail['TrainToYear'])>10) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(140.2, $TrainDetailYcoordHour);
		if(strlen($TrainDetail['TrainHours'])>7) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(140.2, $TrainDetailYcoordHour);
			}
		$pdf->MultiCell(17.7, 2.8, $TrainDetail['TrainHours'],0,'C');
		$TrainDetailYcoordHour=$TrainDetailYcoordHour+9.5;
		if(strlen($TrainDetail['TrainHours'])>7) $pdf->SetFontSize(10);
		
		
		$pdf->SetXY(158, $TrainDetailYcoordSponsor);
		if(strlen($TrainDetail['TrainSponsor'])>20) 
			{
				$pdf->SetFontSize(8);
				$pdf->SetXY(158, $TrainDetailYcoordSponsor);
			}
		$pdf->MultiCell(50.5, 2.8, $TrainDetail['TrainSponsor'],0,'C');
		$TrainDetailYcoordSponsor=$TrainDetailYcoordSponsor+9.5;
		if(strlen($TrainDetail['TrainSponsor'])>20) $pdf->SetFontSize(10);
	}
	

// OTHER INFORMATION
	// Skills and Hobbies
	$SkillsDetailYcoord=269.5;
	foreach($employeeInfo['6'] as $SkillsDetail)
	{
		$pdf->SetXY(7.5, $SkillsDetailYcoord);
		if(strlen($SkillsDetail['SkillDesc'])>28) 
			{
				$pdf->SetFontSize(8);
			}
		$pdf->MultiCell(68, 2.8, $SkillsDetail['SkillDesc'],0,'L');
		$SkillsDetailYcoord=$SkillsDetailYcoord+9.5;
		$pdf->SetFontSize(10);
	}
	
	// NON-ACADEMIC
	$NonAcadRecDetailYcoord=269.5;
	foreach($employeeInfo['7'] as $NonAcadDetail)
	{
		$pdf->SetXY(75.5, $NonAcadRecDetailYcoord);
		if(strlen($NonAcadDetail['NonAcadRecDetails'])>34) 
			{
				$pdf->SetFontSize(8);
			}
		$pdf->MultiCell(82.5, 3, $NonAcadDetail['NonAcadRecDetails'],0,'L');
		$NonAcadRecDetailYcoord=$NonAcadRecDetailYcoord+9.5;
		$pdf->SetFontSize(10);
	}
	
	// MEMBERSHIP ASSOCIATION
	$MemAssOrgDetailYcoord=269.5;
	foreach($employeeInfo['8'] as $MemAssOrgDetail)
	{
		$pdf->SetXY(158, $MemAssOrgDetailYcoord);
		if(strlen($MemAssOrgDetail['MemAssOrgDesc'])>20) 
			{
				$pdf->SetFontSize(8);
			}
		$pdf->MultiCell(50.5, 3, $MemAssOrgDetail['MemAssOrgDesc'],0,'L');
		$MemAssOrgDetailYcoord=$MemAssOrgDetailYcoord+9.5;
		$pdf->SetFontSize(10);
	}


$pdf->AddPage();
$page4 = $pdf->importPage(4);
$pdf->useTemplate($page4, null, null, 0, 0, true);


foreach($employeeInfo['10'] as $questions)
{
	switch ($questions['QuesID'])
	{
		// 36. Are you related by consanguinity or affinity to any of the following::
		// a. Within the third degree (for National Government Employees): etc...
		case "Q361":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(142,17.8);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
				$pdf->SetXY(141.5,25);
				$pdf->SetFont($fontUsed);
				if (strlen($questions['AnsDetails'])>26)
				{
					$pdf->MultiCell(59, 3, substr($questions['AnsDetails'],0,29),0,'L');
					$pdf->SetXY(141.5,29.5);
					$pdf->MultiCell(59, 3, substr($questions['AnsDetails'],29,29),0,'L');
					$pdf->SetXY(141.5,34);
					$pdf->MultiCell(59, 3, substr($questions['AnsDetails'],58,29),0,'L');
				}
				else
				{
					$pdf->MultiCell(59, 3, $questions['AnsDetails'],0,'L');
				}
		
			}
			
			else
			{
				$pdf->SetXY(155,17.8);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
			break;
		// b. Within the fourth degree (for Local Government Employees): etc...
		case "Q362":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141.7,44);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
				$pdf->SetXY(141.5,52);
				$pdf->SetFont($fontUsed);
				if (strlen($questions['AnsDetails'])>26)
				{
					$pdf->MultiCell(60, 3, substr($questions['AnsDetails'],0,29),0,'L');
					$pdf->SetXY(141.5,56.5);
					$pdf->MultiCell(60, 3, substr($questions['AnsDetails'],29,29),0,'L');
					$pdf->SetXY(141.5,61);
					$pdf->MultiCell(60, 3, substr($questions['AnsDetails'],58,29),0,'L');
				}
				else
				{
					$pdf->MultiCell(59, 3, $questions['AnsDetails'],0,'L');
				}
				
			}
			
			else
			{
				$pdf->SetXY(154.6,44);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
		break;
		
		// 37.
		// a. Have you ever been formally charged?
		case "Q371":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141.7,67.8);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
				$pdf->SetXY(141.5,76);
				$pdf->SetFont($fontUsed);
				if (strlen($questions['AnsDetails'])>24)
				{
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],0,24),0,'L');
					$pdf->SetXY(141.5,80.5);
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],24,24),0,'L');
					$pdf->SetXY(141.5,85.5);
				}
				else
				{
					$pdf->MultiCell(51, 3, $questions['AnsDetails'],0,'L');
				}
				
			}
			
			else
			{
				$pdf->SetXY(154.6,67.8);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
		break;
		// b. Have you ever been quilty of any administrative offense?
		case "Q372":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141.7,87.5);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
				$pdf->SetXY(141.5,95.8);
				$pdf->SetFont($fontUsed);
				if (strlen($questions['AnsDetails'])>24)
				{
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],0,24),0,'L');
					$pdf->SetXY(141.5,100.5);
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],24,24),0,'L');
					$pdf->SetXY(141.5,104);
				}
				else
				{
					$pdf->MultiCell(51, 3, $questions['AnsDetails'],0,'L');
				}
				
			}
			
			else
			{
				$pdf->SetXY(154.6,87.5);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
		break;
		
		// 38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
		case "Q380":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141,107.3);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
				$pdf->SetXY(141.5,114.8);
				$pdf->SetFont($fontUsed);
				if (strlen($questions['AnsDetails'])>24)
				{
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],0,24),0,'L');
					$pdf->SetXY(141.5,119.3);
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],24,24),0,'L');
					$pdf->SetXY(141.5,123);
				}
				else
				{
					$pdf->MultiCell(51, 3, $questions['AnsDetails'],0,'L');
				}
				
			}
			
			else
			{
				$pdf->SetXY(153.6,107.3);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
		break;
		
		// 39. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal etc...
		case "Q390":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141,126.5);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
				$pdf->SetXY(141.5,138);
				$pdf->SetFont($fontUsed);
				if (strlen($questions['AnsDetails'])>24)
				{
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],0,24),0,'L');
					$pdf->SetXY(141.5,142.5);
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],24,24),0,'L');
					$pdf->SetXY(141.5,145);
				}
				else
				{
					$pdf->MultiCell(51, 3, $questions['AnsDetails'],0,'L');
				}
				
			}
			
			else
			{
				$pdf->SetXY(154,126.5);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
		break;
		
		// 40. Have you ever been a candidate in a national or local election (except Barangay election)?
		case "Q400":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141.8,152.5);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
				$pdf->SetXY(141.5,161);
				$pdf->SetFont($fontUsed);
				if (strlen($questions['AnsDetails'])>24)
				{
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],0,24),0,'L');
					$pdf->SetXY(141.5,165.5);
					$pdf->MultiCell(53, 3, substr($questions['AnsDetails'],24,24),0,'L');
					$pdf->SetXY(141.5,169);
				}
				else
				{
					$pdf->MultiCell(51, 3, $questions['AnsDetails'],0,'L');
				}
				
			}
			
			else
			{
				$pdf->SetXY(154.5,152.5);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
		break;
		
		// 41. Pursuant to: etc...
		// a. Are you a member of any indigenous group?
		case "Q411":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141.5,186.8);
				$pdf->SetFont('ZapfDingbats','', 8);
				$pdf->Write(0, "4");
				$pdf->SetXY(172,190);
				$pdf->SetFont($fontUsed);
				
				$pdf->MultiCell(32, 2.8, substr($questions['AnsDetails'],0,14),0,'L');
				
			}
			
			else
			{
				$pdf->SetXY(154.5,186.8);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
		break;
		// b. Are you differently abled?
		case "Q412":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141.5,196.3);
				$pdf->SetFont('ZapfDingbats','', 8);
				$pdf->Write(0, "4");
				$pdf->SetXY(172,199.5);
				$pdf->SetFont($fontUsed);
				
				$pdf->MultiCell(32, 3, substr($questions['AnsDetails'],0,14),0,'L');
			}
			
			else
			{
				$pdf->SetXY(154.5,196.3);
				$pdf->SetFont('ZapfDingbats','', 9);
				$pdf->Write(0, "4");
			}
		break;
		// c. Are you a solo parent?
		case "Q413":
			if ($questions['AnsIsYes']=='1')
			{
				$pdf->SetXY(141.5,205.8);
				$pdf->SetFont('ZapfDingbats','', 8);
				$pdf->Write(0, "4");
				$pdf->SetXY(172,209);
				$pdf->SetFont($fontUsed);
				
				$pdf->MultiCell(32, 3, substr($questions['AnsDetails'],0,14),0,'L');
			}
			
			else
			{
				$pdf->SetXY(154.5,205.8);
				$pdf->SetFont('ZapfDingbats','', 10);
				$pdf->Write(0, "4");
			}
		break;
	}
}

$pdf->SetFont($fontUsed);

	$RefNameDetailYcoord=228;
	foreach($employeeInfo['9'] as $RefDetail)
	{
		$pdf->SetXY(8, $RefNameDetailYcoord);
		if(strlen($RefDetail['RefName'])>30) 
			{
				$pdf->SetFontSize(8);
			}
		$pdf->MultiCell(73.8, 2.8, $RefDetail['RefName'],0,'L');
		$RefNameDetailYcoord=$RefNameDetailYcoord+6.8;
		$pdf->SetFontSize(10);
	}
	
	$RefAddDetailYcoord=228;
	foreach($employeeInfo['9'] as $RefAddDetail)
	{
		$pdf->SetXY(81.8, $RefAddDetailYcoord);
		if(strlen($RefAddDetail['RefAddress'])>24) 
			{
				$pdf->SetFontSize(8);
			}
		$pdf->MultiCell(57.5, 2.8, $RefAddDetail['RefAddress'],0,'L');
		$RefAddDetailYcoord=$RefAddDetailYcoord+6.8;
		$pdf->SetFontSize(10);
	}
	
	$RefTelDetailYcoord=228;
	foreach($employeeInfo['9'] as $RefTelDetail)
	{
		$pdf->SetXY(139, $RefTelDetailYcoord);
		if(strlen($RefTelDetail['RefTel'])>10) 
			{
				$pdf->SetFontSize(8);
			}
		$pdf->MultiCell(24.5, 2.8, $RefTelDetail['RefTel'],0,'L');
		$RefTelDetailYcoord=$RefTelDetailYcoord+6.8;
		$pdf->SetFontSize(10);
	}

$pdf->Output();




function employeeData()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$empInfo = array();
	//emppersonalinfo
	$sql="SELECT * FROM emppersonalinfo WHERE EmpID ='".$_SESSION['username']."'";
	$myQuery=mysqli_query($con,$sql);
	while($myResult=mysqli_fetch_array($myQuery))
	{
		// $tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
		// echo now();
		// echo date("m-d-Y",strtotime($myResult['EmpBirthYear'].'.'.$myResult['EmpBirthMonth'].'.'.$myResult['EmpBirthDay']));
// 		// echo strtotime($tomorrow)."<br>";
// 		// echo date("m-d-Y", strtotime($tomorrow));
// 		// echo date_format("jS F, Y",$myResult['EmpBirthMonth'].'-'.$myResult['EmpBirthDay'].'-'.$myResult['EmpBirthYear']);
// die();
		$empInfo=array("EmpLName"=>$myResult['EmpLName'], "EmpMName"=>$myResult['EmpMName'], "EmpFName"=>$myResult['EmpFName'], "EmpExtName"=>$myResult['EmpExtName'], "EmpBirthDay"=>$myResult['EmpBirthDay'],"EmpBirthMonth"=>$myResult['EmpBirthMonth'],"EmpBirthYear"=>$myResult['EmpBirthYear'], "EmpBirthPlace"=>$myResult['EmpBirthPlace'], "EmpSex"=>$myResult['EmpSex'], "EmpCivilStatus"=>$myResult['EmpCivilStatus'], "EmpCitizenship"=>$myResult['EmpCitizenship'], "EmpHeight"=>$myResult['EmpHeight'], "EmpWeight"=>$myResult['EmpWeight'], "EmpBloodType"=>$myResult['EmpBloodType'], "EmpGSIS"=>$myResult['EmpGSIS'], "EmpHDMF"=>$myResult['EmpHDMF'], "EmpPH"=>$myResult['EmpPH'], "EmpSSS"=>$myResult['EmpSSS'], "EmpResAddBrgy"=>$myResult['EmpResAddBrgy'], "EmpResAddMun"=>$myResult['EmpResAddMun'], "EmpResAddProv"=>$myResult['EmpResAddProv'], "EmpResZipCode"=>$myResult['EmpResZipCode'], "EmpResTel"=>$myResult['EmpResTel'], "EmpPerAddBrgy"=>$myResult['EmpPerAddBrgy'], "EmpPerAddMun"=>$myResult['EmpPerAddMun'], "EmpPerAddProv"=>$myResult['EmpPerAddProv'], "EmpPerZipCode"=>$myResult['EmpPerZipCode'], "EmpPerTel"=>$myResult['EmpPerTel'], "EmpEMail"=>$myResult['EmpEMail'], "EmpMobile"=>$myResult['EmpMobile'], "EmpAgencyNo"=>$myResult['EmpAgencyNo'], "EmpTIN"=>$myResult['EmpTIN'], "EmpSpsLName"=>$myResult['EmpSpsLName'], "EmpSpsMName"=>$myResult['EmpSpsMName'], "EmpSpsFName"=>$myResult['EmpSpsFName'], "EmpSpsJob"=>$myResult['EmpSpsJob'], "EmpSpsBusDesc"=>$myResult['EmpSpsBusDesc'], "EmpSpsBusAddSt"=>$myResult['EmpSpsBusAddSt'], "EmpSpsBusTel"=>$myResult['EmpSpsBusTel'], "EmpFatherLName"=>$myResult['EmpFatherLName'], "EmpFatherMName"=>$myResult['EmpFatherMName'], "EmpFatherFName"=>$myResult['EmpFatherFName'], "EmpMotherLName"=>$myResult['EmpMotherLName'], "EmpMotherMName"=>$myResult['EmpMotherMName'], "EmpMotherFName"=>$myResult['EmpMotherFName'], "EmpSpsMName"=>$myResult['EmpSpsMName'], "EmpSpsMName"=>$myResult['EmpSpsMName']);
	}

	// mysqli_free_result($myResult);
	$sql="SELECT DpntLName,DpntMName,DpntFName,DpntBirthDay,DpntBirthMonth,DpntBirthYear FROM empdependents WHERE EmpID ='".$_SESSION['username']."'";
	$myQuery=mysqli_query($con,$sql);
	$dependentList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($dependentList,array("DpntLName"=>$myResult['DpntLName'], "DpntMName"=>$myResult['DpntMName'], "DpntFName"=>$myResult['DpntFName'], "DpntBirthMonth"=>$myResult['DpntBirthMonth'], "DpntBirthDate"=>$myResult['DpntBirthDay'], "DpntBirthYear"=>$myResult['DpntBirthYear']));
	}
	array_push($empInfo,$dependentList);


	$sql="SELECT `EducLvlDesc`,`empeducbg`.`EducLvlID`,`EducSchoolName`,`EducCourse`,`EducYrGrad`,`EducGradeLvlUnits`,`EducIncAttDateFromDay`,`EducIncAttDateFromMonth`, `EducIncAttDateFromYear`,`EducIncAttDateToDay`, `EducIncAttDateToMonth`,`EducIncAttDateToYear`,`EducAwards` FROM `empeducbg` join m_educlevels on `empeducbg`.`EducLvlID` = `m_educlevels`.`EducLvlID`  WHERE EmpID ='".$_SESSION['username']."' ";
	$myQuery=mysqli_query($con,$sql);
	$educbgList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($educbgList,array("EducLevel"=>$myResult['EducLvlDesc'],"EducLvlID"=>$myResult['EducLvlID'], "EducSchoolName"=>$myResult['EducSchoolName'], "EducCourse"=>$myResult['EducCourse'], "EducYrGrad"=>$myResult['EducYrGrad'], "EducGradeLvlUnits"=>$myResult['EducGradeLvlUnits'], "EducIncAttDateFromDate"=>$myResult['EducIncAttDateFromMonth']."/".$myResult['EducIncAttDateFromDay']."/".$myResult['EducIncAttDateFromYear'], "EducIncAttDateToDate"=>$myResult['EducIncAttDateToMonth']."/".$myResult['EducIncAttDateToDay']."/".$myResult['EducIncAttDateToYear'], "EducAwards"=>$myResult['EducAwards']));
	}
	array_push($empInfo,$educbgList);


	$sql="SELECT     `CSEDesc`,`CSERating`,`CSEExamDay`,`CSEExamMonth`,`CSEExamYear`,`CSEExamPlace`,
    `CSELicNum`,`CSELicReleaseDay`,`CSELicReleaseMonth`,`CSELicReleaseYear`,`CSEHighest` FROM `empcse` WHERE EmpID ='".$_SESSION['username']."'";
	$myQuery=mysqli_query($con,$sql);
	$eligibilityList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($eligibilityList,array("CSEDesc"=>$myResult['CSEDesc'], "CSERating"=>$myResult['CSERating'], "CSEExamDate"=>$myResult['CSEExamMonth']."/".$myResult['CSEExamDay']."/".$myResult['CSEExamYear'], "CSEExamPlace"=>$myResult['CSEExamPlace'], "CSELicNum"=>$myResult['CSELicNum'], "CSELicReleaseDate"=>$myResult['CSELicReleaseMonth']."/".$myResult['CSELicReleaseDay']."/".$myResult['CSELicReleaseYear']));
	}
	array_push($empInfo,$eligibilityList);


	$sql="SELECT `ApptStDesc`,`WExpFromDay`, `WExpFromMonth`, `WExpFromYear`,`WExpToDay`,`WExpToMonth`,`WExpToYear`,`WExpPosition`,`WExpEmployer`,`SalGrdID`,`WExpSalary`, `empworkexp`.`ApptStID`,`WExpIsGov`,`ApptStDesc` FROM `empworkexp` join `m_apptstatus` on `empworkexp`.`ApptStID` = `m_apptstatus`.`ApptStID` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$workExpList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($workExpList,array("WExpFromDay"=>$myResult['WExpFromDay'],"WExpFromMonth"=>$myResult['WExpFromMonth'],"WExpFromYear"=>$myResult['WExpFromYear'], "WExpToMonth"=>$myResult['WExpToMonth'],"WExpToDay"=>$myResult['WExpToDay'],"WExpToYear"=>$myResult['WExpToYear'], "WExpPosition"=>$myResult['WExpPosition'], "WExpEmployer"=>$myResult['WExpEmployer'], "SalGrdID"=>$myResult['SalGrdID'], "WExpSalary"=>$myResult['WExpSalary'], "ApptStID"=>$myResult['ApptStDesc'], "WExpIsGov"=>$myResult['WExpIsGov'], "ApptStDesc"=>$myResult['ApptStDesc']));
	}
	array_push($empInfo,$workExpList);

	$sql="SELECT `VolOrgName`,`VolOrgAddSt`,`VolOrgFromDay`,`VolOrgFromMonth`,`VolOrgFromYear`,`VolOrgToDay`,`VolOrgToMonth`,`VolOrgToYear`,`VolOrgHours`,`VolOrgDetails` FROM `empvoluntaryorg` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$workExpList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($workExpList,array("VolOrgName"=>$myResult['VolOrgName'], "VolOrgFromMonth"=>$myResult['VolOrgFromMonth'], "VolOrgFromDay"=>$myResult['VolOrgFromDay'], "VolOrgFromYear"=>$myResult['VolOrgFromYear'], "VolOrgAddSt"=>$myResult['VolOrgAddSt'], "VolOrgToMonth"=>$myResult['VolOrgToMonth'], "VolOrgToDay"=>$myResult['VolOrgToDay'], "VolOrgToYear"=>$myResult['VolOrgToYear'], "VolOrgHours"=>$myResult['VolOrgHours'], "VolOrgDetails"=>$myResult['VolOrgDetails']));
	}
	array_push($empInfo,$workExpList);


$sql="SELECT `TrainDesc`, `TrainFromDay`,`TrainFromMonth`, `TrainFromYear`,`TrainToDay`,  `TrainToMonth`, `TrainToYear`,
 `TrainHours`,`TrainSponsor` FROM `emptrainings` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$trainingList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($trainingList,array("TrainDesc"=>$myResult['TrainDesc'], "TrainFromMonth"=>$myResult['TrainFromMonth'], "TrainFromDay"=>$myResult['TrainFromDay'], "TrainFromYear"=>$myResult['TrainFromYear'],  "TrainToMonth"=>$myResult['TrainToMonth'],  "TrainToDay"=>$myResult['TrainToDay'],  "TrainToYear"=>$myResult['TrainToYear'], "TrainHours"=>$myResult['TrainHours'], "TrainSponsor"=>$myResult['TrainSponsor']));
	}
	array_push($empInfo,$trainingList);


$sql="SELECT `SkillDesc` FROM `empskills` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$skillList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($skillList,array("SkillDesc"=>$myResult['SkillDesc']));
	}
	array_push($empInfo,$skillList);

$sql="SELECT `NonAcadRecDetails` FROM `empnonacadrecognitions` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$acadDetList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($acadDetList,array("NonAcadRecDetails"=>$myResult['NonAcadRecDetails']));
	}
	array_push($empInfo,$acadDetList);


$sql="SELECT `MemAssOrgDesc` FROM `empassorgmembership` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$assocMemList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($assocMemList,array("MemAssOrgDesc"=>$myResult['MemAssOrgDesc']));
	}
	array_push($empInfo,$assocMemList);


$sql="SELECT `RefLName`,`RefMName`,`RefFName`,`RefExtName`,`RefAddSt`,`RefAddBrgy`,
 `RefAddMun`,`RefAddProv`, `RefZipCode`,`RefTel` FROM `empreferences` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$reftList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($reftList,array("RefName"=>$myResult['RefFName']." ".$myResult['RefLName']." ".$myResult['RefExtName'], "RefAddress"=>$myResult['RefAddBrgy']." ".$myResult['RefAddMun']." ".$myResult['RefAddProv'],"RefZipCode"=>$myResult['RefZipCode'],"RefTel"=>$myResult['RefTel'],"RefAddSt"=>$myResult['RefAddSt'] ));
	}
	array_push($empInfo,$reftList);




	$sql="SELECT `QuesID`,`AnsIsYes`,`AnsDetails` FROM `empanswers` WHERE EmpID ='".$_SESSION['username']."'";



	$myQuery=mysqli_query($con,$sql);
	$reftList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($reftList,array("QuesID"=>$myResult['QuesID'], "AnsIsYes"=>$myResult['AnsIsYes'], "AnsDetails"=>$myResult['AnsDetails'] ));
	}
	array_push($empInfo,$reftList);

// $sql="SELECT QuesID, AnsIsYes, AnsDetails FROM `empanswers` WHERE EmpID ='".$_SESSION['username']."'";

// 	$myQuery=mysqli_query($con,$sql);
// 	$ansList=array();
// 	while($myResult=mysqli_fetch_array($myQuery))
// 	{
// 		array_push($ansList,array("QuesID"=>$myResult['QuesID'], "AnsIsYes"=>$myResult['AnsIsYes'], "AnsDetails"=>$myResult['AnsDetails'] ));
// 	}
// 	array_push($empInfo,$ansList);


// $sql="SELECT `VolOrgName`,`VolOrgAddSt`,`VolOrgFromDay`,`VolOrgFromMonth`,`VolOrgFromYear`,
// `VolOrgToDay`,`VolOrgToMonth`,`VolOrgToYear`,`VolOrgHours`,`VolOrgDetails` FROM `empvoluntaryorg` WHERE EmpID ='".$_SESSION['username']."'";

// 	$myQuery=mysqli_query($con,$sql);
// 	$ansList=array();
// 	while($myResult=mysqli_fetch_array($myQuery))
// 	{
// 		array_push($ansList,array("VolOrgName"=>$myResult['VolOrgName'], "VolOrgAddSt"=>$myResult['VolOrgAddSt'], "VolOrgFromDate"=>$myResult['VolOrgFromMonth']."/".$myResult['VolOrgFromDay']."/".$myResult['VolOrgFromYear'], "VolOrgToDate"=>$myResult['VolOrgToMonth']."/".$myResult['VolOrgToDay']."/".$myResult['VolOrgToYear'], "VolOrgHours"=>$myResult['VolOrgHours']));
// 	}
// 	array_push($empInfo,$ansList);


// $sql="SELECT `TrainDesc`,`TrainFromDay`,`TrainFromMonth`,`TrainFromYear`,`TrainToDay`,
// `TrainToMonth`, `TrainToYear`,`TrainHours`,`TrainSponsor` FROM `emptrainings` WHERE EmpID ='".$_SESSION['username']."'";

// 	$myQuery=mysqli_query($con,$sql);
// 	$ansList=array();
// 	while($myResult=mysqli_fetch_array($myQuery))
// 	{
// 		array_push($ansList,array("TrainDesc"=>$myResult['TrainDesc'], "TrainFromDate"=>$myResult['TrainFromYear']."/".$myResult['TrainFromDay']."/".$myResult['TrainFromYear'], "TrainToDate"=>$myResult['TrainToMonth']."/".$myResult['TrainToDay']."/".$myResult['TrainToYear'], "TrainHours"=>$myResult['TrainHours'], "TrainSponsor"=>$myResult['TrainSponsor']));
// 	}
	// array_push($empInfo,$ansList);





	return $empInfo;
}

?>