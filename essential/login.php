<?php

if (!isset($_POST['module']))
{
	echo 'Dont link on this url directly.';
	die();
}

switch ($_POST['module']) 
{
case 'renderLogin':
	renderLogin();
	break;

case 'logMeIn':
	Register();
	break;

default:
	echo "Module is Null.";
	die();
	break;

}


// what:    Print Login GUI render for Modal
// 			Called by modal.php(modalLogin)
// return:  Login design
function renderLogin()
{
	echo '
			
			<div class="panel panel-primary" style="height:320px;">
								<div class="panel-heading">
									<h4 style="color:white; padding:0px; text-align:center;">
									   <!--  <i class="fa fa-arrows-v"></i>  -->    HRMD Online Application</h4>
								</div>
								<div class="panel-body">
									<form role="form" action="formvalidation.php" method="post">
										<div class="form-group">
											<input type="text" name="user" class="form-control input-md" placeholder="Username" required>
										</div>
										<div class="form-group">
											<input type="password" name="pass" class="form-control input-md" placeholder="Password" required>
											<br>
										</div>                                
										<div class="form-group">
											<button class="btn btn-primary btn-md btn-block" name="login">Sign In</button>

										</div>
									</form>
								 	<!-- this is for log-in validation -->
								
									<form action="index.php" onsubmit="return valid();">        
									 	<div class="form-group">
											<button class="btn btn-success btn-md btn-block">Register</button>
										</div>
									
									</form>

								</div>
							</div>

		';

}








 ?>