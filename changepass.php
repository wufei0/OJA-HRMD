<?
	require_once('essential/connection.php');
	include("essential/audit.php");

	if (!isset($_GET['passKey']))
	{
		echo 'Activation failed. Invalid activation url.';
		die();
	}


$transactionNo=makeTransactionNo();
$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
$sql="SELECT email FROM security_user WHERE activation_url = '".$_GET['passKey']."' ";

?>