<?php

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
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-table.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.feedBackBox.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

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
				BreportListOfAppplicant();
			?>
		</div>
		<!-- end breadcrumb -->
		<!-- end col-md-12 -->
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="bg-main">

				<form class="form-inline" style="padding-bottom: 20px;">
					<div class="form-group col-md-5">
						<div class="row">
		  					<div class="col-md-2">
		  						<label>Department:</label>
		  					</div>
		  					<div class="col-md-10">
		  						<select id="selDepartment" class="form-control selectpicker" data-live-search="true">
	  								<?php 
	  									LoadDepartmentList();
	  								 ?>
								</select>
		  					</div>
		  				</div>
	  				</div>

  					<div class="form-group col-md-7">
  						<!--<button type="submit" class="btn btn-default">Filter</button>-->
  					</div>
  				</form>

  				<div class="table" style="margin-top: 20px;">
					<table id="tblJobOpening"
						data-toggle="table"
						data-height="420"
						data-sort-name="price"
						data-sort-order="desc"
	  					data-pagination="true"
	  					style="width:1500px;">
						<thead>
							<tr>
								<th  data-visible="true" data-checkbox="true"></th>
								<th data-field="ApplicationNo" data-visible="true">Application No</th>
								<th data-field="Applicant" data-sortable="true" data-sorter="true">Applicant</th>
								<th data-field="position" data-sortable="true" data-sorter="true">Position</th>
								<th data-field="itemNo" data-sortable="true" data-sorter="true">Item No</th>
								<th data-field="department" data-sortable="true" data-sorter="true">Department</th>
								<th data-width="120" data-field="dateApply" data-sortable="true" data-sorter="true">Date Applied</th>
								<th data-field="remark" data-sortable="true" data-sorter="true">Remark</th>
								<th  data-field="dateUpdated" data-sortable="true" data-sorter="true">Date Updated</th>
							</tr>
						</thead>
					</table>
					<button type="button" class="btn btn-primary pull-right" style="margin-top:10px;">
				      <span class="glyphicon glyphicon-print"></span> Print
				    </button>
					<div class="tclear"></div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- end content -->
</body>
</html>

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.growl.js"></script>
<script type="text/javascript" src="js/bootstrap-table.min.js"></script>
<script type="text/javascript" src="js/jquery.feedBackBox.js"></script>
<script type="text/javascript" src="js/blockUI.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="script/loginScript.js"></script>


<script type="text/javascript">


// $(document).ready(function(){
// 	$('#feedbackDiv').feedBackBox();
// 	loadApplications();

// });


// function loadApplications()
// {
// 	$.blockUI();
// 	var mod="jobOpeningList";
// 	var department;
// 	if ($('#selDepartment').val('All')) 
// 	{
// 		department='All';
// 	}
// 	else
// 	{
// 		department=$('#selDepartment').val();
// 	}

// console.log(department);

// 	jQuery.ajax({
// 	type: "POST",
// 	url:"lib/getData/rptListofOpenPosition.php",
// 	dataType:"json", // Data type, HTML, json etc.
// 	data:{module:mod,department:department},
// 	beforeSend: function() {

// 		$('#tblJobOpening').bootstrapTable("showLoading");
// 	},
// 	success:function(response){
// 		$('#tblJobOpening').bootstrapTable("hideLoading");
// 		$('#tblJobOpening').bootstrapTable("load",response);

// 		$.unblockUI();
// 	},
// 	error:function (xhr, ajaxOptions, thrownError){
// 		$.growl.error({ message: thrownError });
// 		$.unblockUI();
// 	}
// 	});
// }






</script>
<!--  -->




<?php
function LoadDepartmentList()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT department_pk, description FROM m_department ORDER BY description ASC";

	$query=$con->query($sql);
	while ($result=$query->fetch_array(MYSQLI_ASSOC))
	{
		echo "<option value='".$result['department_pk']."' >".$result['description']."</option>";
	}
	echo "<option value='ALL' selected>Select All</option>";
	$query->close();
	$con->close();
}

// function LoadJobList()
// {
// 	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
// 	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
// 	$sql="SELECT jobopening_pk, position, salarygrade FROM jobopening ORDER BY position ASC";

// 	$query=$con->query($sql);
// 	while ($result=$query->fetch_array(MYSQLI_ASSOC))
// 	{
// 		echo "<option data-subtext='SG".$result['salarygrade']."' value='".$result['jobopening_pk']."' >".$result['position']."</option>";
// 	}
// 	$query->close();
// 	$con->close();
// }

?> 