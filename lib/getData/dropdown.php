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

	case 'registerMunicipality':
		registerMunicipality();
		break;

	case 'registerBarangay':
		registerBarangay();
		break;


	default:
		echo "Module is Null.";
		die();
		break;

}

//select municipality 
function registerMunicipality()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT municipality, municipality_pk FROM m_municipality WHERE province_fk = '".$_POST['provinceName']."' ORDER BY municipality";
	$myQuery=mysqli_query($con,$sql);
	while($myResult=mysqli_fetch_array($myQuery))
	{
		echo '<option value="'.$myResult["municipality_pk"].'" >'.$myResult["municipality"].'</option>';
	}
	mysqli_free_result($myQuery);
	mysqli_close($con);
}

//select barangay 
function registerBarangay()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT barangay_pk, barangay FROM m_barangay WHERE municipality_fk = '".$_POST['municipalityName']."' ORDER BY barangay";
	$myQuery=mysqli_query($con,$sql);
	while($myResult=mysqli_fetch_array($myQuery))
	{
		echo '<option value="'.$myResult["barangay_pk"].'" >'.$myResult["barangay"].'</option>';
	}
	mysqli_free_result($myQuery);
	mysqli_close($con);
}


?>