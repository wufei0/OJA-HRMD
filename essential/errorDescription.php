<?php

	function errorDescription($errorString)
	{
		//$errorString=strpos($mystring, $findme);
		if (strpos($errorString, "PRIMARY") !== false) 
		{
			return "Email already in use. Please check if you are already registered";
		}
	}

?>