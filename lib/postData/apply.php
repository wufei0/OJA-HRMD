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

	case 'applyJob':
		applyJob();
		break;


	default:
		echo "Module is Null.";
		die();
		break;

}

function applyJob()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$derived_key="APL".date("Y").date("m").makeKey('application');

	if(checkIfAppliedAlready($_POST['jobId'],$_SESSION['username']))
	{
		echo('You had already applied for this position.');
		die();
	}
	$sql="INSERT INTO application(application_pk,jobopening_fk,securityuser_fk) VALUES (?,?,?)";

	$stmt = mysqli_prepare($con,$sql);
	mysqli_stmt_bind_param($stmt, "sss", $derived_key, $_POST['jobId'], $_SESSION['username']);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($con);
	echo 'success';
}

function checkIfAppliedAlready($jobID,$securityuser_fk)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT jobopening_fk FROM application WHERE jobopening_fk = '".$jobID."' AND  securityuser_fk = '".$securityuser_fk."' ";
	$myQuery=mysqli_query($con,$sql);
	$row_cnt = mysqli_num_rows($myQuery);

	mysqli_free_result($myQuery);
	mysqli_close($con);

	if ($row_cnt==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

?>
