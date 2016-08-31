<?php
if (session_status() == PHP_SESSION_NONE) 
{
	session_start();
}


function makeKey($tablename)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT counter FROM m_counter WHERE tablename = '".$tablename."' ";
	$myQuery=mysqli_query($con,$sql);
	while($returnValue=mysqli_fetch_array($myQuery))
	{
		$last_value=$returnValue['counter']+1;
		
	}

	$sql="UPDATE m_counter SET counter = ".$last_value." WHERE tablename = '" .$tablename. "' ";
	$myQuery=mysqli_query($con,$sql);
	return $last_value;

}