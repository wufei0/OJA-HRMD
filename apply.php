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
	<title><?php echo $SESSION_['sysVer']; ?></title>
    <link rel="icon" href="images/logo/icon_oja.gif" type="image/x-icon">
    <!-- Latest compiled and minified CSS -->
	<link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-table.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.feedBackBox.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
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
				Bapply();
			?>
		</div>
<!-- end breadcrumb -->
<!-- end col-md-12 -->
	</div>

	<div class="row">
<div class="col-md-12">
			<div class="bg-main">
				<div class="row">
					<div class="col-md-4">
						<div id="imaginary_container"> 
							<div class="input-group stylish-input-group">
								<input id="txtSearch" type="text" class="form-control"  placeholder="Search" >
								<span class="input-group-addon">
									<button id="searchJob" type="submit">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								</span>
							</div>
<!-- data-height="420" -->
							<div id="tableList" class="table">
								<table id="jobList"
								   data-toggle="table"
								   data-sort-name="price"
								   data-height="420"
								   data-sort-order="desc">
									<thead>
										<tr>
											<th data-field="jobApplivationNo" data-visible="false">jobopening_pk</th>
											<th data-field="position" data-sortable="true" data-sorter="true">Position</th>
											<th data-field="department" data-sortable="true" data-sorter="true">Department</th>
											<th data-field="salaryGrade" data-sortable="true" data-sorter="true">SG</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<div  class="col-md-8">
						<div id="jobMain" class="bg" style="height:448px; overflow:auto;">
							<div class="row">
								<div class="col-md-6 pull-left">
									<h4 style="color: #4c758a; font-size:28px; margin-top: 0px; margin-bottom: 0px;"><strong id="txtPosition">Position</strong></h4>
								</div>
								<div class="col-md-6 pull-right">
									<button id="btnApply" type="button" class="btn btn-primary pull-right" >Apply</button>
								</div>
								<div class="tclear"></div>
								<hr style="margin-left: 20px; margin-right: 20px; padding-bottom: 10px;">
							</div>
								<span id="txtJobId" style="display:none;"></span>
								<i class="glyphicon glyphicon-map-marker spacetxt"></i><span id="txtDepartment">Department</span><br>
								<i class="glyphicon glyphicon-check spacetxt"></i><span id="txtItem">Item No</span><br>
								<i class="fa fa-rub spacetxt"></i><span id="txtSg">Salary Grade</span><br>
								<i class="fa fa-calendar spacetxt"></i><span id="txtDate">Post Date</span><br>
						<!-- </div> -->
						<!-- <div class="bg1 panel panel-primary"> -->
							  <!-- <div class="panel-heading"> -->
							    <!-- <h3 class="panel-title"><i class="glyphicon glyphicon-edit" style="color:#fff;"></i><strong>Qualifications<strong></h3> -->
							    <i class="glyphicon glyphicon-edit spacetxt" ></i>Qualifications
							  <!-- </div> -->
							  <div class="panel-body">
							    <ul id="txtQualification">
							    </ul>
							  </div>
						<!-- </div> -->
						<!-- <div class="bg1 panel panel-primary"> -->
							  <!-- <div class="panel-heading"> -->
							    <!-- <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt" style="color:#fff;"></i><strong>Job Description<strong></h3> -->
							    <i class="glyphicon glyphicon-list-alt spacetxt"></i>Job Description
							  <!-- </div> -->
							  <div class="panel-body">
							    <ul id="txtJobDesc">
							    </ul>
							  </div>
							 
							  <div class="tclear"></div>
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

<script type="text/javascript">



function clickSearch()
{
	var mod="joblist";
	var strSearch = $('#txtSearch').val();
	jQuery.ajax({
	type: "POST",
	url:"lib/getData/retrievedata.php",
	dataType:"json", // Data type, HTML, json etc.
	data:{module:mod,strFilter:strSearch},
	beforeSend: function() {
		$('#jobList').bootstrapTable("showLoading");
		$.blockUI();
	},
	success:function(response){
		$('#jobList').bootstrapTable("hideLoading");
		$('#jobList').bootstrapTable("load",response);
		$.unblockUI();
	},
	error:function (xhr, ajaxOptions, thrownError){
		$.growl.error({ message: thrownError });
		$.unblockUI();
	}
	});
}

function btnApplyClick()
{
	var mod="applyJob";
	var jobId=$('#txtJobId').text();
	jQuery.ajax({
	type: "POST",
	url:"lib/postData/apply.php",
	dataType:"text", // Data type, HTML, json etc.
	data:{module:mod,jobId:jobId},
	beforeSend: function() {
		$.blockUI();
	},
	success:function(response){
		$.unblockUI();
		if(response=='success')
		{
			$.growl.notice({ message: "Job Application Success" });
		}
		else
		{
			$.growl.error({ message: response });
		}
	},
	error:function (xhr, ajaxOptions, thrownError){
		$.growl.error({ message: thrownError });
		$.unblockUI();
	}
	});
}

///////////////////////////
//////////EVENTS
///////////////////////////
$('#searchJob').click(function(){
	clickSearch();
});

$('#btnApply').click(function(){
	if(confirm("Apply this position?"))
	{
		btnApplyClick();
	}
	
});


$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();
	clickSearch();
	$('#btnApply').hide();
	// setTimeout($('#jobMain').height($('.fixed-table-body').height()+13),500);
});

$('#jobList').on('click-row.bs.table', function (e, row, $element) {

    // alert(row['jobApplivationNo']);
    // alert($('#jobMain').height());
    console.log($('.fixed-table-body').height());

   	var mod="selectedJob";
	jQuery.ajax({
	type: "POST",
	url:"lib/getData/apply.php",
	dataType:"json", // Data type, HTML, json etc.
	data:{module:mod,jobPK:row['jobApplivationNo']},
	beforeSend: function() {
		$('#btnApply').hide();
		$.blockUI();
	},
	success:function(response){
		// alert(response[0]['jobApplivationNo']);
		$('#txtJobId').text(response[0]['jobApplivationNo']);
		$('#txtPosition').text(response[0]['position']);
		$('#txtDepartment').text(response[0]['department']);
		$('#txtItem').text('Item No. '+response[0]['itemNo']);
		$('#txtSg').text('SG'+response[0]['salaryGrade']);
		$('#txtDate').text(response[0]['datePost']);
 		$('#txtJobDesc').text("");
 		$('#txtQualification').text("");
 		$.each(response[0]['requirement'],function( key, value )
		{
			$('#txtQualification').append(value['jobRequire']);
		});
		$.each(response[0]['responsibility'],function( key, value )
		{
			$('#txtJobDesc').append(value['jobRespon']);
		});
		$('#btnApply').show();
		// setTimeout($('.fixed-table-body').height($('#jobMain').height()-13),500);
		
	},
	error:function (xhr, ajaxOptions, thrownError){
		$.growl.error({ message: thrownError });
	}
	});
$.unblockUI();
});

</script>




</body>
</html>