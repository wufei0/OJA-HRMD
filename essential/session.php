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





?>