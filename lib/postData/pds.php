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
include("../makeKey/key.php");

switch ($_POST['module']) 
{

	case 'updatePerInfo':
		updatePerInfo();
		break;
	case 'updateFamBackground':
		updateFamBackground();
		break;

	case 'updateEducBackground':
		updateEducBackground();
		break;

	case 'updateEligibility':
		updateEligibility();
		break;

	case 'updateWorkExp':
		updateWorkExp();
		break;

	case 'updateVolOrg':
		updateVolOrg();
		break;

	case 'updateTraining':
		updateTraining();
		break;
		
	case 'updateOtherInfo':
		updateOtherInfo();
		break;


	default:
		echo "Module is Null.";
		die();
		break;

}

function updatePerInfo()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	//explode birthdate (mm-dd-YY)
	$transaction=true;
	$returnMessage=array();
	$perInfo=array();
	$perInfo=$_POST['jsonData'];
	$perInfo=array_map("strtoupper", $perInfo);
	$perBday=explode("-",date("m-d-Y", strtotime($perInfo['EmpBday'])));


	$sql="UPDATE `emppersonalinfo` SET `EmpLName`=?, `EmpMName`=?, `EmpFName`=?, `EmpExtName`=?, `EmpBirthDay`=?, `EmpBirthMonth`=?, `EmpBirthYear`=?, `EmpBirthPlace`=?, `EmpSex`=?, `EmpCivilStatus`=?, `EmpCitizenship`=?, `EmpHeight`=?, `EmpWeight`=?, `EmpBloodType`=?, `EmpGSIS`=?, `EmpHDMF`=?, `EmpPH`=?, `EmpSSS`=?, `EmpResAddBrgy`=?, `EmpResAddMun`=?,	`EmpResAddProv`=?, `EmpResZipCode`=?, `EmpResTel`=?, `EmpPerAddBrgy`=?,	`EmpPerAddMun`=?,	`EmpPerAddProv`=?, `EmpPerZipCode`=?, `EmpPerTel`=?, `EmpEMail`=?, `EmpMobile`=?, `EmpAgencyNo`=?, `EmpTIN`=? WHERE EmpID = '".$_SESSION['username']."' ";
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) {
		$transaction=false;
	  // die('mysqli error: '.mysqli_error($con));
	  $errMsg='mysqli error: '.mysqli_error($con);
	}


	mysqli_stmt_bind_param($stmt, "ssssiiisssssssssssssssssssssssss",  $perInfo['EmpLName'], $perInfo['EmpMName'], $perInfo['EmpFName'], $perInfo['EmpExtName'], $perBday[1], $perBday[0], $perBday[2], $perInfo['EmpBirthPlace'], $perInfo['EmpSex'], $perInfo['EmpCivilStatus'], $perInfo['EmpCitizenship'], $perInfo['EmpHeight'], $perInfo['EmpWeight'], $perInfo['EmpBloodType'], $perInfo['EmpGSIS'], $perInfo['EmpHDMF'], $perInfo['EmpPH'], $perInfo['EmpSSS'], $perInfo['EmpResAddBrgy'], $perInfo['EmpResAddMun'], $perInfo['EmpResAddProv'], $perInfo['EmpResZipCode'], $perInfo['EmpResTel'], $perInfo['EmpPerAddBrgy'], $perInfo['EmpPerAddMun'], $perInfo['EmpPerAddProv'], $perInfo['EmpPerZipCode'], $perInfo['EmpPerTel'],$perInfo['EmpMobile'],  $perInfo['EmpEMail'],$perInfo['EmpAgencyNo'],$perInfo['EmpTIN']);


		// mysqli_stmt_execute($stmt);

		if ( !mysqli_stmt_execute($stmt) ) 
		{
			$transaction=false;
  			// die( 'stmt error: '.mysqli_stmt_error($stmt) );
  			$errMsg='stmt error: '.mysqli_stmt_error($stmt);
		}
	mysqli_stmt_close($stmt);
	mysqli_close($con);

	if ($transaction)
	{
		// echo "Transaction Successful";
		$returnMessage['message']="Update Successful";
	}
	else
	{
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	// mysqli_close($con);
	echo json_encode($returnMessage);
	die();

}

function updateFamBackground()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

		/* check connection */
	if (mysqli_connect_errno()) 
	{
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	mysqli_autocommit($con, FALSE);
	$transaction=true;
	$returnMessage=array();
	$perFamBknd=array();
	$perFamBknd=$_POST['jsonData'];
	// $perFamBknd=array_map("strtoupper", $_POST['jsonData']);
// print_r($perFamBknd);
// print_r($perFamBknd);

	$sql="UPDATE `oja`.`emppersonalinfo` SET `EmpSpsLName` = ?, `EmpSpsMName` = ?,`EmpSpsFName` = ?,`EmpSpsJob` = ?,`EmpSpsBusDesc` = ?,`EmpSpsBusAddSt` = ?,`EmpSpsBusTel` = ?,`EmpFatherLName` = ?,`EmpFatherMName` = ?,`EmpFatherFName` = ?,`EmpMotherLName` = ?,`EmpMotherMName`= ?,`EmpMotherFName` = ? WHERE `EmpID` ='".$_SESSION['username']."' ";

	$stmt = mysqli_prepare($con,$sql);

	if ( !$stmt ) 
	{
		$transaction=false;
	  // die('mysqli error: '.mysqli_error($con));
		$errMsg='mysqli error: '.mysqli_error($con);	
	}
	$EmpSpsLName=strtoupper($perFamBknd['EmpSpsLName']);
	$EmpSpsMName=strtoupper($perFamBknd['EmpSpsMName']);
	$EmpSpsFName=strtoupper($perFamBknd['EmpSpsFName']);
	$EmpSpsJob=strtoupper($perFamBknd['EmpSpsJob']);
	$EmpSpsBusDesc=strtoupper($perFamBknd['EmpSpsBusDesc']);
	$EmpBusAdd=strtoupper($perFamBknd['EmpBusAdd']);
	$EmpFatherLName=strtoupper($perFamBknd['EmpFatherLName']);
	$EmpFatherMName=strtoupper($perFamBknd['EmpFatherMName']);
	$EmpFatherFName=strtoupper($perFamBknd['EmpFatherFName']);
	$EmpMotherLName=strtoupper($perFamBknd['EmpMotherLName']);
	$EmpMotherMName=strtoupper($perFamBknd['EmpMotherMName']);
	$EmpMotherFName=strtoupper($perFamBknd['EmpMotherFName']);
	mysqli_stmt_bind_param($stmt, "sssssssssssss", $EmpSpsLName, $EmpSpsMName,$EmpSpsFName,  $EmpSpsJob, $EmpSpsBusDesc, $EmpBusAdd, $perFamBknd['EmpSpsBusTel'], $EmpFatherLName, $EmpFatherMName, $EmpFatherFName, $EmpMotherLName, $EmpMotherMName, $EmpMotherFName);

	// mysqli_stmt_execute($stmt);
	
	if ( !mysqli_stmt_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg='stmt error: '.mysqli_stmt_error($stmt);	
	}
	mysqli_stmt_close($stmt);
	$sql="DELETE FROM empdependents WHERE `EmpID` ='".$_SESSION['username']."'";
	mysqli_query($con,$sql);

	$perFamBknd=$_POST['jsonData'];
	if (isset($perFamBknd['child']))
	{
		// $dependentList=array();
		// $dependentList = $perFamBknd['child'];
		// $dependentList=array_map("strtoupper", $perFamBknd['child']);
		// // print_r($perFamBknd['child']);
		// print_r($dependentList);
		// die();
		foreach($perFamBknd['child'] as $dependent)
		{
			$perDepBday=explode("-",date("m-d-Y", strtotime($dependent['DpntBDay'])));
			$sql="INSERT INTO empdependents(DpntID, EmpID, DpntLName, DpntMName, DpntFName, DpntBirthDay, DpntBirthMonth, DpntBirthYear) VALUES ('DPN".date('Y').date('m').makeKey('empdependents')."', '".$_SESSION['username']."',?,?,?,?,?,?)";
			$stmt = mysqli_prepare($con,$sql);
			if ( !$stmt ) 
			{
				$transaction=false;
			  	// die('mysqli error: '.mysqli_error($con));
			  	$errMsg='mysqli error: '.mysqli_error($con);
			}
			$DpntLName=strtoupper($dependent['DpntLName']);
			$DpntMName=strtoupper($dependent['DpntMName']);
			$DpntFName=strtoupper($dependent['DpntFName']);
			
			mysqli_stmt_bind_param($stmt, "sssiii",$DpntLName, $DpntMName, $DpntFName,$perDepBday[1],$perDepBday[0],$perDepBday[2]);
				if ( !mysqli_execute($stmt) )
				{
					$transaction=false;
					// die( 'stmt error: '.mysqli_stmt_error($stmt) );
					$errMsg='stmt error: '.mysqli_stmt_error($stmt);
				}
			mysqli_stmt_close($stmt);
		}

	}

	if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Update Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);
	die();
}

function updateEducBackground()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMessage=array();
	//explode birthdate (mm-dd-YY)
	$educBackground=array();
	$educBackground=$_POST['jsonData'];
	mysqli_autocommit($con, FALSE);
	$transaction=true;

	$sql="DELETE FROM empeducbg WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);	
	}

	foreach($educBackground['educ'] as $educValues)
	{
		// echo strtoupper($educValues['EducLvlID'])."<br>";
		$educDateFrom=explode("-",date("m-d-Y", strtotime($educValues['EducIncAttDateFromDate'])));
		$educDateTo=explode("-",date("m-d-Y", strtotime($educValues['EducIncAttDateToDate'])));

		$sql="INSERT INTO `empeducbg`(`EducBgID`, `EmpID`, `EducLvlID`, `EducSchoolName`, `EducCourse`, `EducYrGrad`, `EducGradeLvlUnits`, `EducIncAttDateFromDay`, `EducIncAttDateFromMonth`, `EducIncAttDateFromYear`, `EducIncAttDateToDay`, `EducIncAttDateToMonth`, `EducIncAttDateToYear`, `EducAwards`) VALUES ('EDU".date('Y').date('m').makeKey('educBackground')."','".$_SESSION['username']."',?,?,?,?,?,?,?,?,?,?,?,?)";

		$stmt = mysqli_prepare($con,$sql);
		if (!$stmt)
		{
			$transaction=false;
		  	// die('mysqli error: '.mysqli_error($con));
  			$errMsg='mysqli error: '.mysqli_error($con);	
		}
		$EducSchoolName=strtoupper($educValues['EducSchoolName']);
		$EducCourse=strtoupper($educValues['EducCourse']);
		$EducGradeLvlUnits=strtoupper($educValues['EducGradeLvlUnits']);
		$EducAwards=strtoupper($educValues['EducAwards']);
		mysqli_stmt_bind_param($stmt, "sssisiiiiiis",$educValues['EducLvlID'],$EducSchoolName, $EducCourse, $educValues['EducYrGrad'], $EducGradeLvlUnits,$educDateFrom[1],$educDateFrom[0],$educDateFrom[2],$educDateTo[1],$educDateTo[0],$educDateTo[2], $EducAwards);
		if ( !mysqli_execute($stmt) )
		{
			$transaction=false;
			// die( 'stmt error: '.mysqli_stmt_error($stmt) );
			$errMsg='stmt error: '.mysqli_stmt_error($stmt);	
		}
		mysqli_stmt_close($stmt);

	}


	if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Update Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);
	die();
}

function updateEligibility()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMessage=array();
	$CSCEligibility=array();
	$CSCEligibility=$_POST['jsonData'];
	mysqli_autocommit($con, FALSE);
	$transaction=true;

	$sql="DELETE FROM empcse WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);	
	}

	foreach($CSCEligibility['CSC'] as $eligibilityValues)
	{
		// echo strtoupper($educValues['EducLvlID'])."<br>";
		$CSCExamDate=explode("-",date("m-d-Y", strtotime($eligibilityValues['CSEExamDate'])));
		$CSCLicReleaseDate=explode("-",date("m-d-Y", strtotime($eligibilityValues['CSELicReleaseDate'])));

		$sql="INSERT INTO `empcse`(`CSEID`,`EmpID`,`CSEDesc`,`CSERating`,`CSEExamDay`,`CSEExamMonth`,`CSEExamYear`,`CSEExamPlace`,`CSELicNum`,`CSELicReleaseDay`,`CSELicReleaseMonth`,`CSELicReleaseYear`) VALUES ('CSE".date('Y').date('m').makeKey('cscEligibility')."','".$_SESSION['username']."',?,?,?,?,?,?,?,?,?,?)";

		$stmt = mysqli_prepare($con,$sql);
		if (!$stmt)
		{
			$transaction=false;
		  	// die('mysqli error: '.mysqli_error($con));
		  	$errMsg='mysqli error: '.mysqli_error($con);
		}

		$CSEDesc=strtoupper($eligibilityValues['CSEDesc']);
		$CSERating=strtoupper($eligibilityValues['CSERating']);
		$CSEExamPlace=strtoupper($eligibilityValues['CSEExamPlace']);
		$CSELicNum=strtoupper($eligibilityValues['CSELicNum']);
		mysqli_stmt_bind_param($stmt, "ssiiissiii",$CSEDesc, $CSERating, $CSCExamDate[1],$CSCExamDate[0],$CSCExamDate[2], $CSEExamPlace, $CSELicNum, $CSCLicReleaseDate[1],$CSCLicReleaseDate[0],$CSCLicReleaseDate[2]);
		if ( !mysqli_execute($stmt) )
		{
			$transaction=false;
			// die( 'stmt error: '.mysqli_stmt_error($stmt) );
			$errMsg='stmt error: '.mysqli_stmt_error($stmt);
		}
		mysqli_stmt_close($stmt);
		// echo $CSCLicReleaseDate[2]."<br>";
	}


	if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Update Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);
	die();

}
// function checkIfExisting()
// {
// 	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
// 	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

// 	$sql="SELECT ";
// }
// function changeToUpper(&$arrayValue)
// {
// $arrayValue=strtoupper($arrayValue);

// }



function  updateWorkExp()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMessage=array();
	$WorkExp=array();
	$WorkExp=$_POST['jsonData'];
	mysqli_autocommit($con, FALSE);
	$transaction=true;

	$sql="DELETE FROM empworkexp WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

	foreach($WorkExp['WExp'] as $workExpValues)
	{
		// echo strtoupper($educValues['EducLvlID'])."<br>";
		$workExpFromDate=explode("-",date("m-d-Y", strtotime($workExpValues['WExpFromDate'])));
		$workExpToDate=explode("-",date("m-d-Y", strtotime($workExpValues['WExpToDate'])));

		$sql="INSERT INTO `empworkexp`(`WExpID`,`EmpID`,`WExpFromDay`,`WExpFromMonth`,`WExpFromYear`,`WExpToDay`,`WExpToMonth`,`WExpToYear`,`WExpPosition`,`WExpEmployer`,`SalGrdID`,`WExpSalary`,`ApptStID`,`WExpIsGov`) VALUES ('WEXP".date('Y').date('m').makeKey('workExperience')."','".$_SESSION['username']."',?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($con,$sql);
		if (!$stmt)
		{
			$transaction=false;
		  	// die('mysqli error: '.mysqli_error($con));
		  	$errMsg='mysqli error: '.mysqli_error($con);
		}
		$WExpPosition=strtoupper($workExpValues['WExpPosition']);
		$WExpEmployer=strtoupper($workExpValues['WExpEmployer']);
		$WExpSalary=strtoupper($workExpValues['WExpSalary']);
		$WExpIsGov=strtoupper($workExpValues['WExpIsGov']);
		mysqli_stmt_bind_param($stmt, "iiiiiissssss", $workExpFromDate[1], $workExpFromDate[0], $workExpFromDate[2], $workExpToDate[1], $workExpToDate[0], $workExpToDate[2], $WExpPosition, $WExpEmployer, $workExpValues['SalGrdID'], $WExpSalary, $workExpValues['ApptStDesc'], $WExpIsGov);
		if ( !mysqli_execute($stmt) )
		{
			$transaction=false;
			// die( 'stmt error: '.mysqli_stmt_error($stmt) );
			$errMsg='stmt error: '.mysqli_stmt_error($stmt);
		}
		mysqli_stmt_close($stmt);
		// echo $CSCLicReleaseDate[2]."<br>";
	}


	if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Update Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);
	die();
}



function updateVolOrg()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMessage=array();
	$volOrg=array();
	$volOrg=$_POST['jsonData'];
	mysqli_autocommit($con, FALSE);
	$transaction=true;

	$sql="DELETE FROM empvoluntaryorg WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

	foreach($volOrg['vWork'] as $volOrgExpValues)
	{
		// echo strtoupper($educValues['EducLvlID'])."<br>";
		$volOrgFromDate=explode("-",date("m-d-Y", strtotime($volOrgExpValues['VolOrgFromDate'])));
		$volOrgToDate=explode("-",date("m-d-Y", strtotime($volOrgExpValues['VolOrgToDate'])));


		$sql="INSERT INTO `empvoluntaryorg` (`VolOrgID`,`EmpID`,`VolOrgName`,`VolOrgAddSt`,`VolOrgFromDay`,`VolOrgFromMonth`,
`VolOrgFromYear`,`VolOrgToDay`,`VolOrgToMonth`,`VolOrgToYear`,`VolOrgHours`,`VolOrgDetails`) VALUES ('VORG".date('Y').date('m').makeKey('volOrganization')."','".$_SESSION['username']."',?,?,?,?,?,?,?,?,?,?)";


		$stmt = mysqli_prepare($con,$sql);
		if (!$stmt)
		{
			$transaction=false;
		  	// die('mysqli error: '.mysqli_error($con));
  			$errMsg='mysqli error: '.mysqli_error($con);
		}
		$VolOrgName=strtoupper($volOrgExpValues['VolOrgName']);
		$VolOrgAddSt=strtoupper($volOrgExpValues['VolOrgAddSt']);
		$VolOrgDetails=strtoupper($volOrgExpValues['VolOrgDetails']);
		mysqli_stmt_bind_param($stmt, "ssiiiiiiss", $VolOrgName, $VolOrgAddSt, $volOrgFromDate[1], $volOrgFromDate[0], $volOrgFromDate[2], $volOrgToDate[1], $volOrgToDate[0], $volOrgToDate[2], $volOrgExpValues['VolOrgHours'], $VolOrgDetails );
		if ( !mysqli_execute($stmt) )
		{
			$transaction=false;
			// die( 'stmt error: '.mysqli_stmt_error($stmt) );
			$errMsg='stmt error: '.mysqli_stmt_error($stmt);
		}
		mysqli_stmt_close($stmt);
		// echo $CSCLicReleaseDate[2]."<br>";
	}


	if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Update Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);
	die();

}

function updateTraining()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$training=array();
	$returnMessage=array();
	// if(isset($_POST['jsonData'])){ die(); }
	$training=$_POST['jsonData'];
	mysqli_autocommit($con, FALSE);
	$transaction=true;

	$sql="DELETE FROM emptrainings WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

	foreach($training['Train'] as $trainingValues)
	{
		// echo strtoupper($educValues['EducLvlID'])."<br>";
		$trainingFromDate=explode("-",date("m-d-Y", strtotime($trainingValues['TrainFromDate'])));
		$trainingToDate=explode("-",date("m-d-Y", strtotime($trainingValues['TrainToDate'])));


	$sql="INSERT INTO `emptrainings`(`TrainID`,`EmpID`,`TrainDesc`,`TrainFromDay`,`TrainFromMonth`,`TrainFromYear`,`TrainToDay`,
`TrainToMonth`,`TrainToYear`,`TrainHours`,`TrainSponsor`) VALUES ('TRN".date('Y').date('m').makeKey('trainings')."','".$_SESSION['username']."',?,?,?,?,?,?,?,?,?)";

		$stmt = mysqli_prepare($con,$sql);
		if (!$stmt)
		{
			$transaction=false;
		  	// die('mysqli error: '.mysqli_error($con));
		  	$errMsg='mysqli error: '.mysqli_error($con);
		}
		$TrainDesc=strtoupper($trainingValues['TrainDesc']);
		$TrainHours=strtoupper($trainingValues['TrainHours']);
		$TrainSponsor=strtoupper($trainingValues['TrainSponsor']);

		mysqli_stmt_bind_param($stmt, "siiiiiiss", $TrainDesc, $trainingFromDate[1], $trainingFromDate[0], $trainingFromDate[2], $trainingToDate[1], $trainingToDate[0], $trainingToDate[2], $TrainHours, $TrainSponsor);
		if ( !mysqli_execute($stmt) )
		{
			$transaction=false;
			// die( 'stmt error: '.mysqli_stmt_error($stmt) );
			$errMsg='stmt error: '.mysqli_stmt_error($stmt);
		}
		mysqli_stmt_close($stmt);
		// echo $CSCLicReleaseDate[2]."<br>";
	}


	if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Update Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);
	die();

}


function updateOtherInfo()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMessage=array();
	// array_push($returnMessage,"first","second");
	// array_push($returnMessage,"a"=>"second");
	// print_r($returnMessage);
	// die();
	$info=array();
	// $return=array();
	$info=$_POST['jsonData'];
	mysqli_autocommit($con, FALSE);
	$transaction=true;
//SKILLS
	$sql="DELETE FROM empskills WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		// die(array_push($returnMessage,$returnMessage['Delete Employee Skills']='mysqli error: '.mysqli_error($con)));
		$errMsg='mysqli error: '.mysqli_error($con);
	}
	if(isset($info['skill']))
	{
		foreach($info['skill'] as $skillValues)
		{
			$sql="INSERT INTO empskills(SkillID,EmpID,SkillDesc) VALUES ('SKIL".date('Y').date('m').makeKey('SkillHobbies')."','".$_SESSION['username']."',?)";
			$stmt = mysqli_prepare($con,$sql);
			if (!$stmt)
			{
				$transaction=false;
			  	// die('mysqli error: '.mysqli_error($con));
			  	$errMsg+='mysqli error: '.mysqli_error($con);
			}
			$skillDescription=strtoupper($skillValues['SkillDesc']);
			mysqli_stmt_bind_param($stmt, "s", $skillDescription);
			if ( !mysqli_execute($stmt) )
			{
				$transaction=false;
				// die( 'stmt error: '.mysqli_stmt_error($stmt) );
				$errMsg+='stmt error: '.mysqli_stmt_error($stmt);
				// die(array_push($returnMessage,$returnMessage['Insert Skill fail']='mysqli error: '.mysqli_error($con)));
			}
			mysqli_stmt_close($stmt);
		}
	}

//Non-Academic Distinctions / Recognition
	$sql="DELETE FROM empnonacadrecognitions WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
	}
	if(isset($info['recognition']))
	{
		foreach($info['recognition'] as $recogValues)
		{
			$sql="INSERT INTO empnonacadrecognitions(NonAcadRecID,EmpID,NonAcadRecDetails) VALUES ('RECOG".date('Y').date('m').makeKey('nonAcadDes')."','".$_SESSION['username']."',?)";
			$stmt = mysqli_prepare($con,$sql);
			if (!$stmt)
			{
				$transaction=false;
			  	// die('mysqli error: '.mysqli_error($con));
			  	$errMsg+='mysqli error: '.mysqli_error($con);
			}
			$nonAcademecDetails=strtoupper($recogValues['NonAcadRecDetails']);
			mysqli_stmt_bind_param($stmt, "s", $nonAcademecDetails);
			if ( !mysqli_execute($stmt) )
			{
				$transaction=false;
				// die( 'stmt error: '.mysqli_stmt_error($stmt) );
				// die(array_push($returnMessage,$returnMessage['Insert Recognition fail']='mysqli error: '.mysqli_error($con)));
				$errMsg+='stmt error: '.mysqli_stmt_error($stmt);
			}
			mysqli_stmt_close($stmt);
		}
	}

//Membership in Association / Organization
	$sql="DELETE FROM empassorgmembership WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
	}
	if(isset($info['membership']))
	{
		foreach($info['membership'] as $memberValues)
		{
			$sql="INSERT INTO empassorgmembership(MemAssOrgID,EmpID,MemAssOrgDesc) VALUES ('MEMB".date('Y').date('m').makeKey('memAssocOrg')."','".$_SESSION['username']."',?)";
			$stmt = mysqli_prepare($con,$sql);
			if (!$stmt)
			{
				$transaction=false;
			  	// die('mysqli error: '.mysqli_error($con));
			  	$errMsg+='mysqli error: '.mysqli_error($con);
			}
			$memberAssoc=strtoupper($memberValues['MemAssOrgDesc']);
			mysqli_stmt_bind_param($stmt, "s",$memberAssoc );
			if ( !mysqli_execute($stmt) )
			{
				$transaction=false;
				// die( 'stmt error: '.mysqli_stmt_error($stmt) );
				// die(array_push($returnMessage,$returnMessage['Insert Membership fail']='mysqli error: '.mysqli_error($con)));
				$errMsg+='stmt error: '.mysqli_stmt_error($stmt);

			}
			mysqli_stmt_close($stmt);
		}
	}


//CHARACTER REFERENCE
	$sql="DELETE FROM empreferences WHERE EmpID = '".$_SESSION['username']."' ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
	}
	if(isset($info['CharReference']))
	{
		foreach($info['CharReference'] as $referenceValues)
		{
			
		$sql="INSERT INTO `empreferences`(`RefID`,`EmpID`,`RefLName`,`RefMName`,`RefFName`,`RefExtName`,`RefAddSt`,`RefAddBrgy`,
	`RefAddMun`,`RefAddProv`,`RefZipCode`,`RefTel`) VALUES ('REF".date('Y').date('m').makeKey('empReference')."','".$_SESSION['username']."',?,?,?,?,?,?,?,?,?,?)";

			$stmt = mysqli_prepare($con,$sql);

			if (!$stmt)
			{
				$transaction=false;
			  	// die('mysqli error: '.mysqli_error($con));

			}
			$RefLName=strtoupper($referenceValues['RefLName']);
			$RefMName=strtoupper($referenceValues['RefMName']);
			$RefFName=strtoupper($referenceValues['RefFName']);
			$RefExtName=strtoupper($referenceValues['RefExtName']);
			$RefAddSt=strtoupper($referenceValues['RefAddSt']);
			$RefAddBrgy=strtoupper($referenceValues['RefAddBrgy']);
			$RefAddMun=strtoupper($referenceValues['RefAddMun']);
			$RefAddProv=strtoupper($referenceValues['RefAddProv']);
			$RefZipCode=strtoupper($referenceValues['RefZipCode']);
			$RefTel=strtoupper($referenceValues['RefTel']);
			mysqli_stmt_bind_param($stmt, "ssssssssss", $RefLName, $RefMName,$RefFName,$RefExtName,$RefAddSt , $RefAddBrgy,$RefAddMun ,$RefAddProv ,$RefZipCode ,$RefTel  );
			if ( !mysqli_execute($stmt) )
			{
				$transaction=false;
				// die( 'stmt error: '.mysqli_stmt_error($stmt) );
				// die(array_push($returnMessage,$returnMessage['Insert Reference fail']='mysqli error: '.mysqli_error($con)));
				$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
			}
			mysqli_stmt_close($stmt);
		}
	
	}
//QUESTIONS
$sql="DELETE FROM empanswers WHERE EmpID = '".$_SESSION['username']."' ";
if(!mysqli_query($con,$sql))
{
	$transaction=false;
}

//QUESTION Q361
if (isset($info['Q361']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q361',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A361=strtoupper($info['A361']);
	mysqli_stmt_bind_param($stmt, "s", $A361 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( $errMsg='stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q361',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}

//QUESTION Q362
if (isset($info['Q362']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q362',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A362=strtoupper($info['A362']);
	mysqli_stmt_bind_param($stmt, "s", $A362 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q362',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}

//QUESTION Q371
if (isset($info['Q371']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q371',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A371=strtoupper($info['A371']);
	mysqli_stmt_bind_param($stmt, "s", $A371 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q371',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}
}

//QUESTION Q372
if (isset($info['Q372']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q372',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A372=strtoupper($info['A372']);
	mysqli_stmt_bind_param($stmt, "s", $A372 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q372',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}


//QUESTION Q380
if (isset($info['Q380']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q380',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A380=strtoupper($info['A380']);
	mysqli_stmt_bind_param($stmt, "s", $A380 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q380',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}

//QUESTION Q390
if (isset($info['Q390']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q390',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A390=strtoupper($info['A390']);
	mysqli_stmt_bind_param($stmt, "s",$A390 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q390',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}


//QUESTION Q400
if (isset($info['Q400']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q400',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A400=strtoupper($info['A400']);
	mysqli_stmt_bind_param($stmt, "s", $A400 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q400',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}


//QUESTION Q411
if (isset($info['Q411']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q411',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A411=strtoupper($info['A411']);
	mysqli_stmt_bind_param($stmt, "s", $A411 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q411',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}

//QUESTION Q412
if (isset($info['Q412']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q412',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A412=strtoupper($info['A412']);
	mysqli_stmt_bind_param($stmt, "s", $A412 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q412',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}

//QUESTION Q413
if (isset($info['Q413']))
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`,`AnsDetails`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q413',1,?)";
	$stmt = mysqli_prepare($con,$sql);

	if (!$stmt)
	{
		$transaction=false;
	  	// die('mysqli error: '.mysqli_error($con));
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	$A413=strtoupper($info['A413']);
	mysqli_stmt_bind_param($stmt, "s", $A413 );
	if ( !mysqli_execute($stmt) )
	{
		$transaction=false;
		// die( 'stmt error: '.mysqli_stmt_error($stmt) );
		$errMsg+='mysqli error: '.mysqli_stmt_error($stmt);
	}
	mysqli_stmt_close($stmt);
}
else
{
	$sql="INSERT INTO `empanswers`(`AnsID`,`EmpID`,`QuesID`,`AnsIsYes`) VALUES ('ANS".date('Y').date('m').makeKey('empAns')."','".$_SESSION['username']."','Q413',0)";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

}


	if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Update Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);
	die();


}





function checkmydate($date) {
  $tempDate = explode('-', $date);
  if (checkdate($tempDate[1], $tempDate[2], $tempDate[0])) {//checkdate(month, day, year)
    return true;
  } else {
     return false;
  }
}



?>