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
    <title>OJA v1.0</title>
    <link rel="icon" href="images/logo/icon_oja.gif" type="image/x-icon">
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
   <?php include("essential/header.php"); ?>
</header>
<!-- end header -->
<!-- content -->
<div class="container content">

	<?php include("essential/leftmenu.php"); ?>

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

					<div class="col-md-12">
					

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
											<th data-field="ApplivationNo" data-visible="false">application_pk</th>
											<th data-field="position" data-sortable="true" data-sorter="true">Position</th>
											<th data-field="department" data-sortable="true" data-sorter="true">Department</th>
											<th data-field="itemNo" data-sortable="true" data-sorter="true">Item No</th>
											<th data-field="dateApply" data-sortable="true" data-sorter="true">Date Applied</th>
											<th data-field="status" data-sortable="true" data-sorter="true">Status</th>
											<th data-field="remark" data-sortable="true" data-sorter="true">Remarks</th>
											<th data-field="dateUpdated" data-sortable="true" data-sorter="true">Date Updated</th>
										</tr>
									</thead>
								</table>
				
					</div>
					
			</div>
		</div>
	</div>
</div>
</div> 
</div>
<!-- end content -->
<!-- footer -->
<?php include("essential/footer.php"); ?>
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
<script type="text/javascript" src="js/blockUI.js"></script>
<script type="text/javascript" src="script/loginScript.js"></script>
<script type="text/javascript" src="script/staticDesign.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();
	loadMyApplications();
});

function loadMyApplications()
{
	$.blockUI();
	var mod="loadMyApplications";
	jQuery.ajax({
	type: "POST",
	url:"lib/getData/applications.php",
	dataType:"json", // Data type, HTML, json etc.
	data:{module:mod},
	beforeSend: function() {

		$('#applications').bootstrapTable("showLoading");
	},
	success:function(response){
		$('#applications').bootstrapTable("hideLoading");
		$('#applications').bootstrapTable("load",response);

		$.unblockUI();
	},
	error:function (xhr, ajaxOptions, thrownError){
		$.growl.error({ message: thrownError });
		$.unblockUI();
	}
	});

}

</script>




</body>
</html>