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
$pdf->AddPage();
// set the source file
$pdf->setSourceFile("format/pds.pdf");
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, null, null, 0, 0, true);

// now write some text above the imported page
$fontUsed='Helvetica';
$pdf->SetFont($fontUsed);
$pdf->SetTextColor(200, 0, 0);
$pdf->SetFontSize(12);

//LASTNAME
	$empName=str_split($employeeInfo['EmpLName']);
	$xCoord=34;
	foreach ($empName as $empNameArr)
	{
		$pdf->SetXY($xCoord, 46);
		$pdf->Write(0, $empNameArr[0]);
		$xCoord=$pdf->GetX()+3.1;
	}

//FIRSTNAME
	$empName=str_split($employeeInfo['EmpFName']);
	$xCoord=34;
	foreach ($empName as $empNameArr)
	{
		$pdf->SetXY($xCoord, 52);
		$pdf->Write(0, $empNameArr[0]);
		$xCoord=$pdf->GetX()+3.1;
	}

//MIDDLENAME
	$empName=str_split($employeeInfo['EmpMName']);
	$xCoord=34;
	foreach ($empName as $empNameArr)
	{
		$pdf->SetXY($xCoord, 58);
		$pdf->Write(0, $empNameArr[0]);
		$xCoord=$pdf->GetX()+3.1;
	}

//NAME EXT
	$pdf->SetXY(189, 58);
	$pdf->Write(0, $employeeInfo['EmpExtName']);

$pdf->SetFontSize(9);

//DATE OF BIRTH
	$pdf->SetXY(67, 63);
	$pdf->Write(0, $employeeInfo['EmpBirthMonth']);
	$pdf->SetXY(75, 63);
	$pdf->Write(0, $employeeInfo['EmpBirthDay']);	
	$pdf->SetXY(83, 63);
	$pdf->Write(0, $employeeInfo['EmpBirthYear']);

//PLACE OF BIRTH
	$pdf->SetXY(34, 66.7);
	$pdf->MultiCell(60, 2.7, $employeeInfo['EmpBirthPlace'],0,'L');

//RESIDENTIAL ADDRESS
	$pdf->SetXY(131, 61.5);	
	$pdf->MultiCell(81, 5, $employeeInfo['EmpResAddBrgy'].", ".$employeeInfo['EmpResAddMun'].", ".$employeeInfo['EmpResAddProv'],0,'L');

//RESIDENTIAL ZIPCODE
	$pdf->SetXY(131, 81);
	$pdf->Write(0, $employeeInfo['EmpResZipCode']);

//RESIDENTIAL TEL NO
	$pdf->SetXY(131, 87);
	$pdf->Write(0, $employeeInfo['EmpResTel']);

//PERMANENT ADDRESS
	$pdf->SetXY(131, 92);	
	$pdf->MultiCell(81, 5, $employeeInfo['EmpPerAddBrgy'].", ".$employeeInfo['EmpPerAddMun'].", ".$employeeInfo['EmpPerAddProv'],0,'L');

//PERMANENT ZIPCODE
	$pdf->SetXY(131, 110);
	$pdf->Write(0, $employeeInfo['EmpResZipCode']);

//PERMANENT TEL NO
	$pdf->SetXY(131, 116);
	$pdf->Write(0, $employeeInfo['EmpResTel']);

//EMAIL
	$pdf->SetXY(131, 127);
	$pdf->Write(0, $employeeInfo['EmpEMail']);

//CELLPHONE
	$pdf->SetXY(131, 122);
	$pdf->Write(0, $employeeInfo['EmpMobile']);

//EMPLOYEE AGENCY NO
	$pdf->SetXY(131, 133);
	$pdf->Write(0, $employeeInfo['EmpAgencyNo']);

//TIN NO
	$pdf->SetXY(131, 139);
	$pdf->Write(0, $employeeInfo['EmpTIN']);

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
	$pdf->SetXY(35, 98);
	$pdf->Write(0, $employeeInfo['EmpCitizenship']);

//HEIGHT
	$pdf->SetXY(35, 104);
	$pdf->Write(0, $employeeInfo['EmpHeight']);

//WEIGHT
	$pdf->SetXY(35, 110);
	$pdf->Write(0, $employeeInfo['EmpWeight']);

//BLOODTYPE
	$pdf->SetXY(35, 116);
	$pdf->Write(0, $employeeInfo['EmpBloodType']);

//GSIS
	$pdf->SetXY(35, 122);
	$pdf->Write(0, $employeeInfo['EmpGSIS']);

//PAGIBIG
	$pdf->SetXY(35, 127);
	$pdf->Write(0, $employeeInfo['EmpHDMF']);

//PHILHEALTH
	$pdf->SetXY(35, 133);
	$pdf->Write(0, $employeeInfo['EmpPH']);

//SSS
	$pdf->SetXY(35, 138);
	$pdf->Write(0, $employeeInfo['EmpSSS']);



$pdf->AddPage();
$page2 = $pdf->importPage(2);
$pdf->useTemplate($page2, null, null, 0, 0, true);

$pdf->AddPage();
$page3 = $pdf->importPage(3);
$pdf->useTemplate($page3, null, null, 0, 0, true);

$pdf->AddPage();
$page4 = $pdf->importPage(4);
$pdf->useTemplate($page4, null, null, 0, 0, true);

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
		array_push($dependentList,array("DpntLName"=>$myResult['DpntLName'], "DpntMName"=>$myResult['DpntMName'], "DpntFName"=>$myResult['DpntFName'], "DpntBirthDate"=>$myResult['DpntBirthMonth']."/".$myResult['DpntBirthDay']."/".$myResult['DpntBirthYear']));
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


	$sql="SELECT `ApptStDesc`,`WExpFromDay`, `WExpFromMonth`, `WExpFromYear`,`WExpToDay`,`WExpToMonth`,`WExpToYear`,`WExpPosition`,`WExpEmployer`,`SalGrdID`,`WExpSalary`, `empworkexp`.`ApptStID`,`WExpIsGov` FROM `empworkexp` join `m_apptstatus` on `empworkexp`.`ApptStID` = `m_apptstatus`.`ApptStID` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$workExpList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($workExpList,array("WExpFromDate"=>$myResult['WExpFromMonth']."/".$myResult['WExpFromDay']."/".$myResult['WExpFromYear'], "WExpToDate"=>$myResult['WExpToMonth']."/".$myResult['WExpToDay']."/".$myResult['WExpToYear'], "WExpPosition"=>$myResult['WExpPosition'], "WExpEmployer"=>$myResult['WExpEmployer'], "SalGrdID"=>$myResult['SalGrdID'], "WExpSalary"=>$myResult['WExpSalary'], "ApptStID"=>$myResult['ApptStID'], "WExpIsGov"=>$myResult['WExpIsGov'], "ApptStDesc"=>$myResult['ApptStDesc']));
	}
	array_push($empInfo,$workExpList);

	$sql="SELECT `VolOrgName`,`VolOrgAddSt`,`VolOrgFromDay`,`VolOrgFromMonth`,`VolOrgFromYear`,`VolOrgToDay`,`VolOrgToMonth`,`VolOrgToYear`,`VolOrgHours`,`VolOrgDetails` FROM `empvoluntaryorg` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$workExpList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($workExpList,array("VolOrgName"=>$myResult['VolOrgName'], "VolOrgFromDate"=>$myResult['VolOrgFromMonth']."/".$myResult['VolOrgFromDay']."/".$myResult['VolOrgFromYear'], "VolOrgAddSt"=>$myResult['VolOrgAddSt'], "VolOrgToDate"=>$myResult['VolOrgToMonth']."/".$myResult['VolOrgToDay']."/".$myResult['VolOrgToYear'], "VolOrgHours"=>$myResult['VolOrgHours'], "VolOrgDetails"=>$myResult['VolOrgDetails']));
	}
	array_push($empInfo,$workExpList);


$sql="SELECT `TrainDesc`, `TrainFromDay`,`TrainFromMonth`, `TrainFromYear`,`TrainToDay`,  `TrainToMonth`, `TrainToYear`,
 `TrainHours`,`TrainSponsor` FROM `emptrainings` WHERE EmpID ='".$_SESSION['username']."'";

	$myQuery=mysqli_query($con,$sql);
	$trainingList=array();
	while($myResult=mysqli_fetch_array($myQuery))
	{
		array_push($trainingList,array("TrainDesc"=>$myResult['TrainDesc'], "TrainFromDate"=>$myResult['TrainFromMonth']."/".$myResult['TrainFromDay']."/".$myResult['TrainFromYear'],  "TrainToDate"=>$myResult['TrainToMonth']."/".$myResult['TrainToDay']."/".$myResult['TrainToYear'], "TrainHours"=>$myResult['TrainHours'], "TrainSponsor"=>$myResult['TrainSponsor']));
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
		array_push($reftList,array("RefLName"=>$myResult['RefLName'], "RefMName"=>$myResult['RefMName'], "RefFName"=>$myResult['RefFName'], "RefExtName"=>$myResult['RefExtName'], "RefAddBrgy"=>$myResult['RefAddBrgy'], "RefAddMun"=>$myResult['RefAddMun'], "RefAddProv"=>$myResult['RefAddProv'],"RefZipCode"=>$myResult['RefZipCode'],"RefTel"=>$myResult['RefTel'],"RefAddSt"=>$myResult['RefAddSt'] ));
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