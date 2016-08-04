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
	
}

?>