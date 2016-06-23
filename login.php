<?php session_start(); ?>
<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
	
    <!-- Latest compiled and minified CSS -->
	<link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-table.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

	<!-- Optional theme -->
	
	
	<!-- edit style css -->
	<link rel="stylesheet" href="style/style.css" type="text/css" />

	<!-- Latest compiled and minified JavaScript -->
	
	<script src="js/jquery.growl.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script src="js/bootstrap-select.js"></script>
	
	
	

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

  </head>
  <body>
	<!------------------------------------------------------------- header ------------------------------------------------------------>
	<header class="navbar navbar-fixed-top ">
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-md-6">
					<div class="pull-left">
						<img src="images/logo/pglu.png" width="40" height="35" alt="PGLU" title="PGLU" class="img-circle" />
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="pull-right">
						<button class="btn btn-link" ng-disabled="subcategory.required2 == subcategory.completed2" ng-click="open(subcategory)">
							<span class="glyphicon glyphicon-user"></span> Register
						</button>
					</div>
				</div>
				
			</div>
		</div>
	</header>
	<!------------------------------------------------------------- end header ------------------------------------------------------------>
	
	
	
	<!------------------------------------------------------------- content ------------------------------------------------------------>
	<div class="content">
		<div class="container">
			
			<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            
						<div class="blur"></div>
						<div class="header-text">
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
								   <!--  <div class="form-group">
										<input type="submit" class="btn-danger btn-block input-md" title="Log In" name="login" value="Log in"></input>

									</div>
	 -->
								</form>
								 <!-- this is for log-in validation -->
								
									<form action="index.php" onsubmit="return valid();">        
									 <div class="form-group">
										<button class="btn btn-success btn-md btn-block">Register</button>
									</div>
									
									</form>
								   <!--  <form action="index.php" onsubmit="return valid();">
										<input type="submit" value="Forget Password?" class="btn btn-link" style="float: left;">
									</form> -->
								</div>
							</div>
						</div>
						
						<p class="bg-success text-center" style="padding:10px 10px;">
							Welcome to the HRMD Online Application.
							
							<br> Don't have an account yet? Click 
							<font style="font-weight:bold; color:red;">Register</font>.
						</p>

					</div>
			</div>
		</div>
	</div>
	<!------------------------------------------------------------- end content ------------------------------------------------------------>
	
	
	
	<!------------------------------------------------------------- footer ------------------------------------------------------------>
	<footer>
	
	</footer>
	<!------------------------------------------------------------- end footer ------------------------------------------------------------>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </body>
</html>