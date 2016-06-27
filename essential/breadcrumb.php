<?php

if (!isset($_POST['module']))
{
	echo "asdasd";
	// header("location: home.php");
	// die();
}

switch ($_POST['module']) 
{
	case 'Home':
		Bhome();
		break;

	case 'Register':
		Register();
		break;

}

// what:	Check if user is logged in. If not, create link for modal login
// return: 	Returns username if logged in or link to modal signin if not logged in
function linkToLogin()
{
	if(!isset($_SESSION['id']))
	{
		echo "<a href='#' onclick='modalLogin()' >Login</a>";
	}
	else
	{
		echo "Welcome, ". $_POST['module'];
		echo "| <a href='logout.php'>Log Out</a>";
	}
}

// what:	Renders Home breadcrumb
// return: 	Echo breadcrumb for Home
function Bhome()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="#" onclick="renderBreadcrumb(\'Register\')" class="active">Home</a></li>

			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

// what:	Renders Home breadcrumb
// return: 	Echo breadcrumb for Home
function Register()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="#" onclick="renderBreadcrumb(\'Home\')" class="active">Home</a></li>
				<li><a href="#" class="active">asdasdsad</a></li>


				<font class="text-right" style="float:right; font-size:11px; color:#000;">';
			   echo "Welcome, ". $_POST['module'];
	echo ' | <a href="logout.php">Log Out</a></font>
				  <div class="tclear"></div>
			</ol>';
}

?>