<?php

function makeTransactionNo()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT counter FROM m_counter WHERE tablename = 'audit' ";
	$query=$con->query($sql);
	$result=$query->fetch_array(MYSQLI_ASSOC);
	$counter=$result['counter']+1;
	$sql="UPDATE m_counter SET counter = ".$counter." WHERE tablename = 'audit' ";
	$query=$con->query($sql);
	$con->close();
	return $counter;
}

function insertToAudit($transaction_no,$sqlQuery,$module,$user)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="INSERT INTO security_audit(transaction_no,sqlquery,module,sourcecomp,user) VALUES(".$transaction_no.",'".addslashes($sqlQuery)."','".$module."','".$_SERVER['REMOTE_ADDR']."','".$user."')";
	// echo $sql;
	$query=$con->query($sql);
	// $query=$con->query($sql);
	$con->close();
}

function insertToErrLog($transaction_no,$sqlQuery,$module,$user,$errmsg)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="INSERT INTO security_errlog(transaction_no,sqlquery,module,user,sourcecomp,errmsg) VALUES (".$transaction_no.",'".addslashes($sqlQuery)."','".$module."','".$user."','".$_SERVER['REMOTE_ADDR']."','".addslashes($errmsg)."')";
	$query=$con->query($sql);
	$con->close();
}

?>