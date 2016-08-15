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
	case 'modalAddChild':
		modalAddChild();
		break;

	default:
		echo "Module is Null.";
		die();
		break;

}

function modalAddChild()
{
	echo "<form><input id='childPK' type='text'> Name: <input type='text' id='childName' placeholder='Name' class='form-control' required> <br>";
	echo "Birthdate: <input type='date' id='childbdate' p class='form-control' required> <br>";
	echo "<button class='btn btn-primary pull-right' type='button'>Add</button></form>";
	echo "<div class='tclear'></div>";
}

function makeKey()
{
	
}