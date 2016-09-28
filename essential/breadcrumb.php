<?php

// if (!isset($_POST['module']))
// {
// 	//echo 'Dont link on this url directly.';
// 	// header("location: home.php");
	
// }

// switch ($_POST['module']) 
// {
// 	case 'Home':
// 		Bhome();
// 		break;

// 	case 'Apply':
// 		Bapply();
// 		break;

// }

// what:	Check if user is logged in. If not, create link for modal login
// return: 	Returns username if logged in or link to modal signin if not logged in
function linkToLogin()
{
	if (isLoggedIn())
	{
		echo "Welcome, <a href='#' >".$_SESSION['name']."</a>";
		echo ' | <a href="#" onclick="logOut(event)">Log Out</a></font>
	  <div class="tclear"></div>
		</ol>';
	}
	else
	{
		echo "Welcome, Guest";
		echo ' | <a href="#" onclick="logInModal()">Log In</a></font>
	  <div class="tclear"></div>
		</ol>';
	}

}

function isLoggedIn()
{
	if (!isset($_SESSION['username']) )
	{
		return false;
	}

	return true;
}

// what:	Renders Home breadcrumb
// return: 	Echo breadcrumb for Home
function Bhome()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="home.php"  class="active">Home</a></li>

			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

function Bapply()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="home.php" onclick="renderBreadcrumb(\'Home\')" >Home</a></li>
				<li><a href="#">Application</a></li>
				<li class="active">Apply</li>
			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

function Bpds()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="home.php" onclick="renderBreadcrumb(\'Home\')" >Home</a></li>
				<li><a href="#">Application</a></li>
				<li class="active">Personal Data Sheet</li>
			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

function Bapplications()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="home.php" onclick="renderBreadcrumb(\'Home\')" >Home</a></li>
				<li><a href="#">Application</a></li>
				<li class="active">My Application</li>
			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

function Bregister()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="home.php"  class="active">Register</a></li>

			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

function BmaintenancePosition()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="home.php" onclick="renderBreadcrumb(\'Home\')" >Home</a></li>
				<li><a href="#">Maintenance</a></li>
				<li class="active">Positions</li>
			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

function BmaintenanceApplication()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="home.php" onclick="renderBreadcrumb(\'Home\')" >Home</a></li>
				<li><a href="#">Maintenance</a></li>
				<li class="active">Applications</li>
			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

function BreportListOfOpenPosition()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="home.php" onclick="renderBreadcrumb(\'Home\')" >Home</a></li>
				<li><a href="#">Report</a></li>
				<li class="active">List of Open Position</li>
			  	<font class="text-right" style="float:right; font-size:11px; color:#000;">';
  	linkToLogin();
	echo 	'</font>
				  <div class="tclear"></div>
			</ol>';
}

// // what:	Renders Home breadcrumb
// // return: 	Echo breadcrumb for Home
// function Register()
// {
// 	echo 	'<ol class="breadcrumb">
// 				<li><a href="#" onclick="renderBreadcrumb(\'Home\')" class="active">Home</a></li>
// 				<li><a href="#" class="active">asdasdsad</a></li>


// 				<font class="text-right" style="float:right; font-size:11px; color:#000;">';

// }



?>