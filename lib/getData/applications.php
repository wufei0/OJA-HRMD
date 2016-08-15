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
	case 'showApplications':
		showApplications();
		break;

	default:
		echo "Module is Null.";
		die();
		break;

}


function showApplications()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT application_pk, position, m_department.description AS department, itemno, application.transdate AS dateApplied   FROM application JOIN jobopening ON application.jobopening_fk= jobopening.jobopening_pk join m_department on jobopening.department_fk = m_department.department_pk WHERE securityuser_fk = '".$_SESSION['username']."' ORDER BY dateApplied ASC";
	$query=$con->query($sql);
	$resultArray=array();
	while ($result=$query->fetch_array(MYSQLI_ASSOC))
	{
		array_push($resultArray,array("ApplicationNo"=>$result['application_pk'],"position"=>$result['position'],"department"=>$result['department'],"itemNo"=>$result['itemno'],"dateApply"=>$result['dateApplied']));
		// echo "<option value='".$result['department_pk']."' >".$result['description']."</option>";
	}
	$query->close();
	$con->close();
	echo json_encode($resultArray);
}





?>