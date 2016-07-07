<?php
if (session_status() == PHP_SESSION_NONE) 
{
	session_start();
}
if (!isset($_POST['module']))
{
	echo 'Dont link on this url directly.';
	// header("location: home.php");
	die();
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
		echo "Welcome, ".$_SESSION['name'];
		echo ' | <a href="#" onclick="logOut(event)">Log Out</a></font>
		  <div class="tclear"></div>
			</ol>';
}

// what:	Renders Home breadcrumb
// return: 	Echo breadcrumb for Home
function Bhome()
{
	echo 	'<ol class="breadcrumb">
				<li><a href="#" onclick="renderBreadcrumb(\'Home\')" class="active">Home</a></li>

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