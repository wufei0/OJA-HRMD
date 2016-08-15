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
	echo "<form>
		<div class='row'>
			<div class='col-md-12'>
			</div>
		</div>
		<input id='childPK' type='text'> Name: <input type='text' id='childName' placeholder='Name' class='form-control' required> <br>";
	echo "Birthdate: <input type='date' id='childbdate' p class='form-control' required> <br>";
	echo "<button class='btn btn-primary pull-right' type='button'>Add</button></form>";
	echo "<div class='tclear'></div>";
}

function makeKey($tablename)
{

	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT department_pk, description FROM m_department ORDER BY description ASC";

	$query=$con->query($sql);
	while ($result=$query->fetch_array(MYSQLI_ASSOC))
	{
		echo "<option value='".$result['department_pk']."' >".$result['description']."</option>";
	}
	$query->close();
	$con->close();
}