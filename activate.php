<?php
// echo getenv('HTTP_HOST');
// die();
require_once('essential/connection.php');
include("essential/audit.php");
if (!isset($_GET['activateUrl']))
{
	echo 'Activation failed. Invalid activation url.';
	die();
}
$transactionNo=makeTransactionNo();
$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
$sql="SELECT email FROM security_user WHERE activation_url = '".$_GET['activateUrl']."' ";
// echo $sql;
$query=$con->query($sql);
if($query->num_rows==1)
{
	$transactionNo=makeTransactionNo();
	$result=$query->fetch_array(MYSQLI_ASSOC);
	$sql="UPDATE security_user SET activate=1 WHERE email = '".$result['email']."' ";
	$query=$con->query($sql);

	insertToAudit($transactionNo,$sql,'activate',null);

	header('Refresh:3; url=home.php');
	echo 'Account activated. You can now log in using your email.<br>';
	echo 'Auto redirecting in 3 sec.';
}
else
{
	// header('Refresh:3; url=home.php');
	echo 'Activation failed. Invalid activation url.';
	insertToErrLog($transactionNo,$sql,"activate",null,'Activation failed. Invalid activation url.');
	// echo 'Auto redirecting in 3 sec.';
	// exit();
}

	// $query->close();
	$con->close();
?>