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


	case 'selectedJob':
		selectedJob();
		break;

	default:
		echo "Module is Null.";
		die();
		break;

}


function selectedJob()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	//JOB REQUIREMENT
	$REQUIREMENT="SELECT jobrequirement.description AS jobrequire FROM jobrequirement  JOIN jobopening ON jobrequirement.jobopening_fk = jobopening.jobopening_pk WHERE jobopening_fk = '".$_POST['jobPK']."' ";
	//JOB RESPONSIBILITIES
	$RESPONSIBILITIES="SELECT jobresponsibility.description AS jobrespon FROM jobresponsibility  JOIN jobopening ON jobresponsibility.jobopening_fk = jobopening.jobopening_pk WHERE jobopening_fk = '".$_POST['jobPK']."' ";
	//JOBOPNING
	$JOBOPNING="SELECT jobopening_pk,itemno, position, salarygrade, poststart, m_department.description AS department  FROM jobopening JOIN m_department ON jobopening.department_fk = m_department.department_pk WHERE jobopening_pk = '".$_POST['jobPK']."' ";

	$myQuery=mysqli_query($con,$REQUIREMENT);
	$requirementArray=array();
	while ($resultSet=mysqli_fetch_assoc($myQuery))
	{
		array_push($requirementArray, array("jobRequire"=>"<li>".$resultSet['jobrequire']."</li>"));
		// "qualification"=>getRequirements($resultSet['jobopening_pk']));
	}

	$myQuery=mysqli_query($con,$RESPONSIBILITIES);
	$responsibilityArray=array();
	while ($resultSet=mysqli_fetch_assoc($myQuery))
	{
		array_push($responsibilityArray, array("jobRespon"=>"<li>".$resultSet['jobrespon']."</li>"));
		// "qualification"=>getRequirements($resultSet['jobopening_pk']));
	}

	$myQuery=mysqli_query($con,$JOBOPNING);
	$jobOpenArray=array();
	while ($resultSet=mysqli_fetch_array($myQuery))
	{
		array_push($jobOpenArray, array("jobApplivationNo"=>$resultSet['jobopening_pk'],"department"=>$resultSet['department'], "itemNo"=>$resultSet['itemno'], "position"=>$resultSet['position'], "salaryGrade"=>$resultSet['salarygrade'], "datePost"=>date_format(date_create($resultSet['poststart']), 'F d, Y'),"requirement"=>$requirementArray,"responsibility"=>$responsibilityArray));
		// "qualification"=>getRequirements($resultSet['jobopening_pk']));
	}
	echo json_encode($jobOpenArray);
}







  ?>