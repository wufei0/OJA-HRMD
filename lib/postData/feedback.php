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

	case 'feedback':
		feedback();
		break;

	default:
		echo "Module is Null.";
		die();
		break;

}


function feedback()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$feedbackMsg=mysqli_real_escape_string($con, $_POST['message']);
	$sql="insert into feedback(message,username_fk) values ('".$feedbackMsg."','".$_SESSION['username']."')";
	// mysqli_query($con,$sql);
	if(mysqli_query($con,$sql))
	{
		echo "Thank You for your feedback. We will try to take a look at it ASAP.";
		// $KEY=get_key();
		// log_audit($KEY,$sql,'Feedback',''.$_SESSION['username'].'');
	}
	else
	{
		echo "Error sending feedback. Please try again. If problem still persist, please contact MISD @ 607-0946.";
	}

	mysqli_close($con);
}


?>