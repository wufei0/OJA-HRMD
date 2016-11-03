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

switch ($_POST['module']) 
{

	case 'changeUserInfo':
		changeUserInfo();
		break;

	case 'changePassword':
		changePassword();
		break;
	default:
		echo "Module is Null.";
		die();
		break;
}


function changeUserInfo()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	// $transactionNo=makeTransactionNo();
	$returnMessage=array();
	$errMsg=null;
	$transaction=true;
	$sql="UPDATE security_user SET fname=?, lname=?, mname=? WHERE email = '".$_SESSION['username']."' ";
	$userInfo=$_POST['userInfo'];
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) 
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}

	mysqli_stmt_bind_param($stmt, "sss", $userInfo['fname'], $userInfo['lname'], $userInfo['mname']);
	if ( !mysqli_stmt_execute($stmt) ) 
	{
		$transaction=false;
		$errMsg='stmt error: '.mysqli_stmt_error($stmt);
	}

	if($transaction)
	{
		$returnMessage['message']="User Information update success.";
		$returnMessage['status']=true;
		$_SESSION['name']=$userInfo['fname'] ." ".$userInfo['lname'];
	}
	else
	{
		$returnMessage['message']=$errMsg;
		$returnMessage['status']=false;
	}

	echo json_encode($returnMessage);
	mysqli_stmt_close($stmt);
	mysqli_close($con);
	// insertToAudit($transactionNo,"send mail to:".$applicantEmail,'schedule interview',$_SESSION['username']);
}



function changePassword()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	// $transactionNo=makeTransactionNo();
	$returnMessage=array();
	$errMsg=null;
	$transaction=true;
	$userPass=$_POST['userPass'];
	if(!checkPassword($_SESSION['username'],$userPass['currentPass']))
	{
		$returnMessage['message']="Old password isn't valid";
		$returnMessage['status']=false;
		echo json_encode($returnMessage);
		die();
	}
	// else
	// {
	// 		$returnMessage['message']="Old password is valid";
	// 	$returnMessage['status']=true;
	// 	echo json_encode($returnMessage);
	// 	die();
	// }
$newHashPass=sha1($userPass['password'] . getSalt($_SESSION['username']));
	$sql="UPDATE security_user SET password=? WHERE email = '".$_SESSION['username']."' ";
	
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) 
	{
		$transaction=false;
		$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "s", $newHashPass);
	if ( !mysqli_stmt_execute($stmt) ) 
	{
		$transaction=false;
		$errMsg='stmt error: '.mysqli_stmt_error($stmt);
	}


	if($transaction)
	{
		$returnMessage['message']="Password changed successfully";
		$returnMessage['status']=true;
	}
	else
	{
		$returnMessage['message']=$errMsg;
		$returnMessage['status']=false;
	}

	echo json_encode($returnMessage);
	mysqli_stmt_close($stmt);
	mysqli_close($con);
}


function checkPassword($username,$password)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT password FROM security_user WHERE email = '".$username."' AND password = '".sha1($password . getSalt($username))."' ";
	$query=mysqli_query($con,$sql);
	if (mysqli_num_rows($query)>0)
	{
		mysqli_close($con);
		return true;
	}
	else
	{
		mysqli_close($con);
		return false;
	}

}

function getSalt($username)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT salt_key FROM security_user WHERE email='".$username."'  ";
	$query = mysqli_query($con,$sql);
	if (mysqli_num_rows($query)>0)
	{
		$result=mysqli_fetch_array($query);
		$return= $result['salt_key'];
	}
	else
	{
		$return= "error";
	}
	mysqli_close($con);
	return $return;
}

?>