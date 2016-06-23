<?php 
	include('connection.php');
	include('session.php'); 

	$result=mysqli_query($con, "select * from users where id='$session_id'")or die('Error In Session');
	$row=mysqli_fetch_array($result);
?>
 
<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

	<!-- Optional theme -->
	
	
	<!-- edit style css -->
	<link rel="stylesheet" href="style/style.css" type="text/css" />

	<!-- Latest compiled and minified JavaScript -->
	
	
	
	

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

 </head>
<body>
<!------------------------------------------------------------- header ------------------------------------------------------------>
<header class="navbar navbar-fixed-top "> 
	<!--<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-right" style="background-color:#969696;">
				
			</div>
		</div>
	</div>-->
	<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
		  <div class="row">
			<div class="col-md-12">
				
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">PGLU OJA </a>	
						</div>
						
	
						
			
			
			
				<div class="navbar-collapse collapse">
				  <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#">Home</a></li>       
					<li><a href="#about">About</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Themes <b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li class="dropdown-header">Admin & Dashboard</li>
						<li><a href="#">Admin 1</a></li>
						<li><a href="#">Admin 2</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Portfolio</li>
						<li><a href="#">Portfolio 1</a></li>
						<li><a href="#">Portfolio 2</a></li>
					  </ul>
					</li>            
					<li><a href="#">Contact</a></li>
				  </ul>
				</div><!--/.nav-collapse -->

			</div>
		  </div>
	  </div>
    </div>
</header>
<!------------------------------------------------------------- end header ------------------------------------------------------------>


<!------------------------------------------------------------- content ------------------------------------------------------------>
<div class="container content">
	<div class="row">
		<!--------- col-md-12 ----------->
		<div class="col-md-12">
			<!--------- breadcrumb ----------->
			<ol class="breadcrumb">
				
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Library</a></li>
				  <li class="active">Data</li>
				  <font class="text-right" style="float:right; font-size:11px; color:#000;">Welcome, <?php echo $row['Name']; ?> | <a href="logout.php">Log Out</a></font>
				  <div class="tclear"></div>
			</ol>
			<!--------- end breadcrumb ----------->
		</div>
		<!--------- end col-md-12 ----------->
	</div>
</div>
<!------------------------------------------------------------- end content ------------------------------------------------------------>


<!------------------------------------------------------------- footer ------------------------------------------------------------>
<footer class="">
	<div class="container">
		<div class="row">
		
			<div class="col-md-6 pull-left">
				<p style="color:#fff;">Copyright &copy; 2016 HRMD</p>
			</div>
			<div class="col-md-6 pull-right text-right">
				<img src="images/logo/hr_logo.png" width="40" height="35" alt="PGLU" title="PGLU" class="img-circle" />&nbsp;
				<img src="images/logo/pglu.png" width="40" height="35" alt="PGLU" title="PGLU" class="img-circle" />
			</div>
			
		</div>
	</div>
</footer>
<!------------------------------------------------------------- end footer ------------------------------------------------------------>

<style>

</style>


<!-- Steps Progress and Details - END -->



</body>
</html>