<?php


if (session_status() == PHP_SESSION_NONE) 
{
	session_start();
}

if (!isset($_POST['module']))
{
	echo 'Dont link on this url directly.';
	die();
}




// initialize DB connection
include("../../essential/connection.php");

switch ($_POST['module']) 
{


	case 'initPage':
		initPage();
		break;


	default:
		echo "Module is Null.";
		die();
		break;

}




function initPage()
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
		$empInfo=array("EmpLName"=>$myResult['EmpLName'], "EmpMName"=>$myResult['EmpMName'], "EmpFName"=>$myResult['EmpFName'], "EmpExtName"=>$myResult['EmpExtName'], "EmpBirthDate"=>date("Y-m-d",strtotime($myResult['EmpBirthDay'].'.'.$myResult['EmpBirthMonth'].'.'.$myResult['EmpBirthYear'])), "EmpBirthPlace"=>$myResult['EmpBirthPlace'], "EmpSex"=>$myResult['EmpSex'], "EmpCivilStatus"=>$myResult['EmpCivilStatus'], "EmpCitizenship"=>$myResult['EmpCitizenship'], "EmpHeight"=>$myResult['EmpHeight'], "EmpWeight"=>$myResult['EmpWeight'], "EmpBloodType"=>$myResult['EmpBloodType'], "EmpGSIS"=>$myResult['EmpGSIS'], "EmpHDMF"=>$myResult['EmpHDMF'], "EmpPH"=>$myResult['EmpPH'], "EmpSSS"=>$myResult['EmpSSS'], "EmpResAddBrgy"=>$myResult['EmpResAddBrgy'], "EmpResAddMun"=>$myResult['EmpResAddMun'], "EmpResAddProv"=>$myResult['EmpResAddProv'], "EmpResZipCode"=>$myResult['EmpResZipCode'], "EmpResTel"=>$myResult['EmpResTel'], "EmpPerAddBrgy"=>$myResult['EmpPerAddBrgy'], "EmpPerAddMun"=>$myResult['EmpPerAddMun'], "EmpPerAddProv"=>$myResult['EmpPerAddProv'], "EmpPerZipCode"=>$myResult['EmpPerZipCode'], "EmpPerTel"=>$myResult['EmpPerTel'], "EmpEMail"=>$myResult['EmpEMail'], "EmpMobile"=>$myResult['EmpMobile'], "EmpAgencyNo"=>$myResult['EmpAgencyNo'], "EmpTIN"=>$myResult['EmpTIN'], "EmpSpsLName"=>$myResult['EmpSpsLName'], "EmpSpsMName"=>$myResult['EmpSpsMName'], "EmpSpsFName"=>$myResult['EmpSpsFName'], "EmpSpsJob"=>$myResult['EmpSpsJob'], "EmpSpsBusDesc"=>$myResult['EmpSpsBusDesc'], "EmpSpsBusAddSt"=>$myResult['EmpSpsBusAddSt'], "EmpSpsBusTel"=>$myResult['EmpSpsBusTel'], "EmpFatherLName"=>$myResult['EmpFatherLName'], "EmpFatherMName"=>$myResult['EmpFatherMName'], "EmpFatherFName"=>$myResult['EmpFatherFName'], "EmpMotherLName"=>$myResult['EmpMotherLName'], "EmpMotherMName"=>$myResult['EmpMotherMName'], "EmpMotherFName"=>$myResult['EmpMotherFName'], "EmpSpsMName"=>$myResult['EmpSpsMName'], "EmpSpsMName"=>$myResult['EmpSpsMName']);
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





	echo json_encode($empInfo);
}



    
 

?>