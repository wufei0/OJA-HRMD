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

case 'logMeIn':
	logMeIn();
	break;

case 'logMeOut':
	logMeOut();
	break;

default:
	echo "Module is Null.";
	die();
	break;

}

// what:    Check if username and password exist
// 			Called by loginScript.js(logIn)
// return:  Redirect to home.php if valid usename and password
// 			growl if not valid user
function logMeIn()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$username = stripslashes($_POST['uname']);
	$password = stripslashes($_POST['pword']);
	$username = mysqli_real_escape_string($con,$username);
	$password = mysqli_real_escape_string($con,$password);

	$sql="SELECT username, fname, mname, lname, email FROM security_user WHERE username='".$username."'  AND password= '".$password."' ";
	$query = mysqli_query($con,$sql);
	//$rows = mysqli_num_rows($query);
	if (mysqli_num_rows($query)>0)
	{
		$result=mysqli_fetch_array($query);
		$_SESSION['username']=$username;
		$_SESSION['name']=$result['fname'] ." ". substr($result['mname'],0) .". ".$result['lname'];
		$_SESSION['email']=$result['email'];
		mysqli_close($con);
		exit();
	}
	else
	{
		echo "Invalid username or password.";
	}
		mysqli_close($con);
	}





// what:    Logout current logged user
// 			Called by loginScript.js(logOut)
// return:
function logMeOut()
{
	session_destroy();
}




 ?>