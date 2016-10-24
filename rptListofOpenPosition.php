<?php

	require_once('essential/session.php');
	require_once('essential/connection.php');
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

if (!AmIAdmin($_SESSION['username']))  die();
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
<?php include("essential/header.php"); ?>
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
				BreportListOfOpenPosition();
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
					<table id="tblPositionList"  data-toggle="table"  data-pagination="true"
					class="display table table-bordered">
						<thead>
							<tr>
								<th data-field="jobApplivationNo" data-visible="false">JobAppId</th>
								<th data-field="department" data-sortable="true">Departnemt</th>
								<th data-field="itemNo" data-sortable="true">Item No</th>
								<th data-field="position" data-sortable="true">Position</th>
								<th data-field="salaryGrade" data-sortable="true">Salary Grade</th>
								<th data-field="datePost" data-sortable="true">Date Posted</th>
								<th data-field="qualification" data-sortable="true">Qualification</th>
							</tr>
						</thead>
					</table>
					<button id="btnPrint" type="button" class="btn btn-primary pull-right" style="margin-top:10px;">
				      <span class="glyphicon glyphicon-print"></span> Print
				    </button>
					<div class="tclear"></div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- end content -->
<!-- footer -->
<?php include("essential/footer.php"); ?>
<!-- end footer -->
</body>
</html>

<?php
	// includes modal
	include('essential/modal.php');
?>

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.growl.js"></script>
<script type="text/javascript" src="js/bootstrap-table.min.js"></script>
<script type="text/javascript" src="js/jquery.feedBackBox.js"></script>
<script type="text/javascript" src="js/blockUI.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="script/loginScript.js"></script>


<script type="text/javascript">


$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();
	loadOpenPosition();

});


function loadOpenPosition()
{
	$.blockUI();
	var mod="jobOpeningList";
	var department;
	if ($('#selDepartment').val()=='%') 
	{
		department='%';
	}
	else
	{
		department=$('#selDepartment').val();
	}

console.log(department);

	jQuery.ajax({
	type: "POST",
	url:"lib/getData/rptListofOpenPosition.php",
	dataType:"json", // Data type, HTML, json etc.
	data:{module:mod,department:department},
	beforeSend: function() {

		$('#tblPositionList').bootstrapTable("showLoading");
	},
	success:function(response){
		$('#tblPositionList').bootstrapTable("hideLoading");
		$('#tblPositionList').bootstrapTable("load",response);

		$.unblockUI();
	},
	error:function (xhr, ajaxOptions, thrownError){
		$.growl.error({ message: thrownError });
		$.unblockUI();
	}
	});
}

$('#selDepartment').change(function (e){
	loadOpenPosition();
});

$('#btnPrint').click(function (){

var win = window.open('lib/pdf/rptListofOpenPosition.php?department='+$('#selDepartment').val(), '_blank');
	if (win) 
	{
	    //Browser has allowed it to be opened
	    win.focus();
	} else {
	    //Browser has blocked it
	   $.growl.error({ message: "Please allows popups on this site" });
	}
}
);




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
	echo "<option value='%' selected>Select All</option>";
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