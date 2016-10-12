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

switch ($_POST['module']) 
{
	case 'jobApplications':
		jobApplications();
		break;

	case  'loadPositions':
		loadPositions();
		break;

	default:
		echo "Module is Null.";
		die();
		break;

}

function jobApplications()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMessage=array();

	$sql="SELECT `jobopening`.`position` AS position, `jobopening`.`itemno` AS itemNo, `jobopening`.`salarygrade` AS salaryGrade, `m_department`.`description` AS department, `security_user`.`lname` AS lName, `security_user`.`fname` AS fName, `application`.`dateapplied` AS dateApplied FROM application JOIN jobopening ON application.jobopening_fk = jobopening.jobopening_pk JOIN security_user ON application.securityuser_fk = security_user.email JOIN m_department ON jobopening.department_fk = m_department.department_pk WHERE `application`.`status` = 'P' AND department_pk like '".$_POST['department']."' AND jobopening_pk LIKE '".$_POST['position']."' ";
	$myQuery=mysqli_query($con,$sql);
	$resultArray=array();
	while ($resultSet=mysqli_fetch_array($myQuery))
	{
		array_push($resultArray, array("applicant"=>$resultSet['lName'].", ".$resultSet['fName'],"position"=>$resultSet['position'],"itemNo"=>$resultSet['itemNo'],"salaryGrade"=>$resultSet['salaryGrade'],"department"=>$resultSet['department'],"dateApply"=>date_format(date_create($resultSet['dateApplied']), 'F d, Y')));
	}
	echo json_encode($resultArray);
	mysqli_close($con);
}


function loadPositions()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMessage=array();

	$department=$_POST['department'];
	$sql="SELECT jobopening_pk, position, `m_department`.`description` FROM jobopening JOIN m_department ON jobopening.department_fk = m_department.department_pk WHERE department_fk LIKE '".$department."'";
	 // AND postexpire > CURDATE() AND poststart < CURDATE()";

	$myQuery=mysqli_query($con,$sql);
	while ($resultSet=mysqli_fetch_array($myQuery))
	{
		echo '<option data-subtext="'.$resultSet["description"].'" value="'.$resultSet["jobopening_pk"].'" >'.$resultSet["position"].'</option>';
	}

	echo '<option value="%" selected>Select All</option>';
}