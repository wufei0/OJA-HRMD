<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
    	session_start();
	}
	require_once('essential/session.php');
	require_once('essential/connection.php');
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 	<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon"> -->

    <!-- Latest compiled and minified CSS -->
	<link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-table.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.feedBackBox.css" />
    <!-- <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" /> -->

	<!-- Optional theme -->
	<!-- edit style css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />




</head>
<body>
<!-- header -->
<header class="navbar">

<!-- Fixed navbar -->
    <div class="navbar navbar-default nav-bg navbar-fixed-top" role="navigation">
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
					<a class="navbar-brand" href="home.php" style="color: #e8e8e8;">PGLU OJA</a>
				</div>

				<div id="navHeader" class="navbar-collapse collapse">
					<?php
						require_once('essential/navigation.php');
					?>
				</div>
			</div>
		  </div>
	  </div>
    </div>
</header>
<!-- end header -->
<!-- content -->
<div class="container content">
	<div class="row">
<!-- col-md-12 -->
<!-- breadcrumb -->
		<div id="div-breadcrumb" class="col-md-12">
			<?php
				require_once('essential/breadcrumb.php');
				Bapplications();
			?>
		</div>
<!-- end breadcrumb -->
<!-- end col-md-12 -->
	</div>

	<div class="row">
<div class="col-md-12">
			<div class="bg-main">
				<div class="row">

					<div class="col-md-12" style="border-right:1.5px solid #d0d0d0;">
					

							<div class="table">
								<table id="applications"
									data-toggle="table"
									data-height="420"
									data-sort-name="price"
									data-sort-order="desc"
									data-search="true"
				  					data-pagination="true">
									<thead>
										<tr>
											<th data-field="jobApplivationNo" data-visible="false">application_pk</th>
											<th data-field="position" data-sortable="true" data-sorter="true">Position</th>
											<th data-field="department" data-sortable="true" data-sorter="true">Department</th>
											<th data-field="department" data-sortable="true" data-sorter="true">Item No</th>
											<th data-field="salaryGrade" data-sortable="true" data-sorter="true">Date Applied</th>
											<th data-field="department" data-sortable="true" data-sorter="true">Status</th>
											<th data-field="department" data-sortable="true" data-sorter="true">Remarks</th>
											<th data-field="department" data-sortable="true" data-sorter="true">Date Updated</th>
										</tr>
									</thead>
								</table>
				
					</div>
					
			</div>
		</div>
	</div>

</div>
<!-- end content -->
<!-- footer -->
<footer class="">
	<div class="container">
		<div class="row">
			<div class="col-md-6 pull-left">
				<p style="color:#fff; padding-top:5px;">Copyright &copy; 2016 HRMD</p>
			</div>
			<div class="col-md-6 pull-right text-right">
				<img src="images/logo/hr_logo.png" width="40" height="35" alt="PGLU" title="PGLU" class="img-circle" />&nbsp;
				<img src="images/logo/pglu.png" width="40" height="35" alt="PGLU" title="PGLU" class="img-circle" />
			</div>
		</div>
	</div>
</footer>
<!-- end footer -->


<!-- includes -->
<?php
	// includes modal
	include('essential/modal.php');
?>
<!-- end includes -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.growl.js"></script>
<script type="text/javascript" src="js/bootstrap-table.min.js"></script>
<script type="text/javascript" src="js/jquery.feedBackBox.js"></script>


<script type="text/javascript" src="script/staticDesign.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();

});





</script>




</body>
</html>