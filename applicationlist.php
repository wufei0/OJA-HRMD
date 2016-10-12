<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
    	session_start();
	}
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

    <!-- Latest compiled and minified CSS -->
	<link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />
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
				BmaintenanceApplication();
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
								<table id="tblapplications"
									data-toggle="table"
									data-height="420"
									data-sort-name="price"
									data-sort-order="desc"
									data-search="true"
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
						<button id="btnDrop" type="button" class="btn btn-danger pull-right" style="margin-left:4px;">Drop Application</button>
						<button type="button" id="schedInterview" class="btn btn-primary pull-right">Schedule Interview</button>
					</div>
					
			</div>
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
				<img src="images/logo/iluvlaunion.gif" width="46" height="35" alt="I Love La Union" title="I Love La Union" class="img-circle" />&nbsp;
				<img src="images/logo/pglu.png" width="40" height="35" alt="PGLU" title="PGLU" class="img-circle" />&nbsp;
				<img src="images/logo/hr_logo.gif" width="40" height="35" alt="HR" title="HR" class="img-circle" />
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
<script type="text/javascript" src="js/blockUI.js"></script>
<script type="text/javascript" src="script/loginScript.js"></script>
<script type="text/javascript" src="script/staticDesign.js"></script>

<script type="text/javascript">
var selectedApplicants;
$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();
	loadApplications();

	$(document).on( 'click', '#btnSchedule', function() {
   // alert(selectedApplicants);
// console.log(selectedApplicants);

sendMail($('#dateOfInterview').val(),$('#timeOfInterview').val(),selectedApplicants);

});

});

function sendMail(dateOfInterview,timeOfInterview,applicants)
{
	console.log(applicants);

	if (($('#dateOfInterview').val()=='') ||($('#timeOfInterview').val()==''))
	{
		$.growl.error({ message: "Blank date or time." });
		return;
	}
		// $("#modal-footer").html("Sending mail. Please wait.");
		$.blockUI();
		var mod="applicationList";
		jQuery.ajax({
		type: "POST",
		url:"lib/postData/applicationlist.php",
		dataType:"json", // Data type, HTML, json etc.
		data:{module:mod,jsonData:applicants,dateOfInterview:dateOfInterview,timeOfInterview:timeOfInterview},
		beforeSend: function() {
			$('#btnSchedule').text("sending..");
			$("#modal-footer").html("Sending mail. Please wait.");
		},
		success:function(response){
			if  (response['message']=='success')
        	{
        		$.growl.notice({ message: "Schedule Success." });
        		$("#modal-footer").html("Send mail success.");
        	}
        	else
        	{
        		$.growl.error({ message: "Check selected applicants remarks." + response['message'] });
        		$("#modal-footer").html("Send mail fail.");
        	}
        	$('#btnSchedule').text("Schedule");
			
			$.unblockUI();
		},
		error:function (xhr, ajaxOptions, thrownError){
			$.growl.error({ message: thrownError });
			$('#btnSchedule').text("Schedule");
			// $("#modal-footer").html("");
		$.unblockUI();
		}
		});

		
		// $("#modal-footer").html("");
	
}



function loadApplications()
{
	$.blockUI();
	var mod="applicationList";
	jQuery.ajax({
	type: "POST",
	url:"lib/getData/applicationlist.php",
	dataType:"json", // Data type, HTML, json etc.
	data:{module:mod},
	beforeSend: function() {

		$('#tblapplications').bootstrapTable("showLoading");
	},
	success:function(response){
		$('#tblapplications').bootstrapTable("hideLoading");
		$('#tblapplications').bootstrapTable("load",response);

		$.unblockUI();
	},
	error:function (xhr, ajaxOptions, thrownError){
		$.growl.error({ message: thrownError });
		$.unblockUI();
	}
	});
}

$('#schedInterview').click(function(){
if ($('#tblapplications').bootstrapTable('getSelections')=='')
{
	$.growl.error({ message: "Select application to schedule." });
	return;
}

	$.blockUI();
		var mod="RenderschedInterview";
		jQuery.ajax({
		type: "POST",
		url:"lib/getData/applicationlist.php",
		dataType:"text", // Data type, HTML, json etc.
		data:{module:mod},
		beforeSend: function() {
			$('#myModalLabel').html("");
			$('#model-content').html("");
			$("#modal-footer").html("");
		},
		success:function(response){
			// $.growl.notice({ message: response['message'] });
			$('#myModalLabel').html("Schedule Interview/Exam");
			$('#model-content').html(response);
		},
		error:function (xhr, ajaxOptions, thrownError){
			// $.growl.error({ message: thrownError });
		}
		});

		// $('#schedInterview').text("Schedule Interview");
		$.unblockUI();



// $('#myModal').modal('show');




	// return;

 selectedApplicants=JSON.parse(JSON.stringify($('#tblapplications').bootstrapTable('getSelections')));
// console.log(selectedApplicants);

// $('#dateOfInterview').val(<?php //echo "'".date("Y-m-j")."'" ?>);
// document.getElementById('dateOfInterview').valueAsDate = new Date();
$('#myModal').modal('show');
// // return;
// $.blockUI();
// 	var mod="applicationList";
// 	jQuery.ajax({
// 	type: "POST",
// 	url:"lib/postData/applicationlist.php",
// 	dataType:"json", // Data type, HTML, json etc.
// 	data:{module:mod,jsonData:data},
// 	beforeSend: function() {
// 		$('#schedInterview').text("sending..");
// 	},
// 	success:function(response){
// 		$.growl.notice({ message: response['message'] });
// 	},
// 	error:function (xhr, ajaxOptions, thrownError){
// 		$.growl.error({ message: thrownError });
// 	}
// 	});

// 	$('#schedInterview').text("Schedule Interview");
// 	$.unblockUI();
// });



// $('#btnSchedule').click(function(e){
// e.preventDefault();
// 	alert("asdasd");
});


$('#btnDrop').click(function(e){
if ($('#tblapplications').bootstrapTable('getSelections')=='')
{
	$.growl.error({ message: "Select application to delete." });
	return;
}
if(!confirm("Are you sure you want to drop this application?")) return;

data=JSON.parse(JSON.stringify($('#tblapplications').bootstrapTable('getSelections')));
console.log(data);
$.blockUI();
		var mod="dropApplication";
		jQuery.ajax({
		type: "POST",
		url:"lib/postData/applicationlist.php",
		dataType:"json", // Data type, HTML, json etc.
		data:{module:mod,jsonData:data},
		beforeSend: function() {
			$('#btnDrop').text("dropping application....");
		},
		success:function(response){
			if  (response['message']=='success')
        	{
        		$.growl.notice({ message: "Schedule Success." });
	            var ids = $.map($('#tblapplications').bootstrapTable('getSelections'), function (row) {
                	return row.ApplicationNo;
        		});
            	$('#tblapplications').bootstrapTable('remove', {
                field: 'ApplicationNo',
                values: ids
            	});
        	}
        	else
        	{
        		$.growl.error({ message: "Drop application failed." + response['message'] });
        	}
        	$.unblockUI();
        	$('#btnDrop').text("Drop Application");



       

		},
		error:function (xhr, ajaxOptions, thrownError){
			$.growl.error({ message: thrownError });
			$.unblockUI();
			$('#btnDrop').text("Drop Application");
		}
		});

		
		




});

</script>




</body>
</html>