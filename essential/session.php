<?php

	//Check whether the session  is present or not
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}


	// if ((basename($_SERVER['PHP_SELF'])<>"home.php")AND(basename($_SERVER['PHP_SELF'])<>"register.php"))
	if (basename($_SERVER['PHP_SELF'])<>"home.php")
	{
		if (!isset($_SESSION['username']) )
		{
			header('Refresh:3; url=home.php');
			echo 'Please Login or register first.<br>';
			echo 'Auto redirecting in 3 sec.';
			exit();
		}
	}
	if (!isset($_SESSION['username']) )
	{
		$_SESSION['username']=null;
	}


function AmIAdmin($username)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT email FROM security_user JOIN security_group ON security_user.security_group_fk = security_group.securitygroup_pk WHERE email LIKE '".$username."'  AND securitygroup_description = 'Administrator' ";
	$query=mysqli_query($con,$sql);
	if(mysqli_num_rows($query)==1)
	{
		return true;
	}
	else
	{
		return false;
	}

}


?>