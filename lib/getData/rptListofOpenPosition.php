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
	case 'jobOpeningList':
		jobOpeningList();
		break;



	default:
		echo "Module is Null.";
		die();
		break;

}

function jobOpeningList()
{
global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMessage=array();
	
		// $sqlCondition=" WHERE (position LIKE '%".$_POST['strFilter']."%' OR `m_department`.`description` LIKE '%".$_POST['strFilter']."%') AND (postexpire > CURDATE() AND poststart < CURDATE())";
	


	$sql="SELECT jobopening_pk, itemno, position, salarygrade, poststart, m_department.description AS departmentName, m_department.department_pk as department_pk, postexpire FROM jobopening JOIN m_department on jobopening.department_fk = m_department.department_pk  WHERE department_pk like '".$_POST['department']."' AND postexpire >= CURDATE() AND poststart <= CURDATE() ORDER BY departmentName";
	$myQuery=mysqli_query($con,$sql);
	$resultArray=array();
	while ($resultSet=mysqli_fetch_array($myQuery))
	{
		array_push($resultArray, array("jobApplivationNo"=>$resultSet['jobopening_pk'],"department"=>$resultSet['departmentName'], "department_pk"=>$resultSet['department_pk'], "itemNo"=>$resultSet['itemno'], "position"=>$resultSet['position'], "salaryGrade"=>$resultSet['salarygrade'], "datePost"=>date_format(date_create($resultSet['poststart']), 'F d, Y'), "dateExpire"=>date_format(date_create($resultSet['postexpire']), 'F d, Y'),"qualification"=>getRequirements($resultSet['jobopening_pk'])));
		// "qualification"=>getRequirements($resultSet['jobopening_pk']));
	}
	echo json_encode($resultArray);
	mysqli_close($con);
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

	// mysqli_free_result($myQuery);
	mysqli_close($con);
	return $requirements;
}