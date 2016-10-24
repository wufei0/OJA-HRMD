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
include("../../essential/audit.php");
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

	mysqli_autocommit($con, FALSE);
	$transaction=true;
	$errMsg=null;
	$derived_key="APL".date("Y").date("m").makeKey('application');

	if(checkIfAppliedAlready($_POST['jobId'],$_SESSION['username']))
	{
		echo('You had already applied for this position.');
		die();
	}
	$transactionNo=makeTransactionNo();
	$sql="INSERT INTO application(application_pk,jobopening_fk,securityuser_fk,dateapplied) VALUES (?,?,?,'".date("Y-m-d")."')";
   
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) 
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
		insertToErrLog($transactionNo,$sql,"apply",$_SESSION['username'],$errMsg);
	}
	mysqli_stmt_bind_param($stmt, "sss", $derived_key, $_POST['jobId'], $_SESSION['username']);
	if ( !mysqli_stmt_execute($stmt) )
	{
		$transaction=false;
		$errMsg='stmt error: '.mysqli_stmt_error($stmt);
		insertToErrLog($transactionNo,$sql,"apply",$_SESSION['username'],$errMsg);
	}
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	$appDetail_key="APL".date("Y").date("m").makeKey('appDetail');
	$sql="INSERT INTO applicationdetail(applicationdetail_pk,detail,update_by,application_fk) VALUES('".$appDetail_key."','APPLICATION SUBMISSION','".$_SESSION['username']."','".$derived_key."') ";
	if(!mysqli_query($con,$sql))
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);	
		insertToErrLog($transactionNo,$sql,"apply",$_SESSION['username'],$errMsg);
	}

if ($transaction)
	{
		mysqli_commit($con);
		echo 'success';
	}
	else
	{
		mysqli_rollback($con);
		echo $errMsg."<br> Application Failed.";
	}

	mysqli_close($con);
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
