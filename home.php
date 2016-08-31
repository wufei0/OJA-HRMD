<?php

	require_once('essential/session.php');
	require_once('essential/connection.php');
	require_once('essential/errorDescription.php');
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);


// 	$headers   = array();
// $headers[] = "MIME-Version: 1.0";
// $headers[] = "Content-type: text/plain; charset=iso-8859-1";
// $headers[] = "From: Sender Name <jerome.marzan88@gmail.com>";
// $headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
// $headers[] = "Reply-To: Recipient Name <jerome.marzan88@gmail.com>";
// $headers[] = "Subject: {$subject}";
// $headers[] = "X-Mailer: PHP/".phpversion();

// // mail($to, $subject, $email, implode("\r\n", $headers));


// 	if(!mail('terryjohnapigo@gmail.com', 'subject', 'email content', implode("\r\n", $headers)))
// 	{
// 		echo "fail";
// 		die();
// 	}
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
				Bhome();
			?>
		</div>
<!-- end breadcrumb -->
<!-- end col-md-12 -->
	</div>

<!-- gallery -->
<div class="row">
	<div class="col-md-12">
		<div id="homebanner" class="hero">
			<div class="container">
				<div class="row">
						<div class="col-md-12">
							
							<p>PGLU Online Job Application</p>
							<img src="images/textonline.gif" width="750" height="60" />
						<div class="button-text">
							<a href="#" onclick="logInModal();"> SIGN IN </a>&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="#" onclick="registerInModal();"> SIGN UP </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="video">
			<img src="images/video/final_OJA.gif" alt="video" height="200" class="center-block" />
		</div>
	</div>
</div>
<!-- end gallery -->

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				 <div class="panel-heading">
				 	<i class="fa fa-bar-chart-o fa-fw"></i> List of Open Positions
				 	<table id="tblPositionList"  data-toggle="table" data-search="true" data-pagination="true"
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
				 </div>
			</div>
		</div>
	</div>
	<!-- div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				 <div class="panel-heading">
				 	<i class="fa fa-bar-chart-o fa-fw"></i> Current Applied Positions
				 	<table id="1"  data-toggle="table" data-search="true" data-pagination="true"
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
				 </div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				 <div class="panel-heading">
				 	<i class="fa fa-bar-chart-o fa-fw"></i> Applied Positions List
				 	<table id="2"  data-toggle="table" data-search="true" data-pagination="true"
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
				 </div>
			</div>
		</div>
	</div> -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				 <div class="panel-heading">
					<div id="chart_div"></div>
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
<script type="text/javascript" src="js/linechart.js"></script>

<script type="text/javascript" src="script/staticDesign.js"></script>
<script type="text/javascript" src="script/loginScript.js"></script>
<script type="text/javascript">


$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();
	loadPositionList();
	<?php
		if (isset($_SESSION['username']))
		{
			echo "$('#homebanner').remove();";
		}

	  ?>

});



function loadPositionList()
{
	$.blockUI();
	var mod="joblist";
	jQuery.ajax({
	type: "POST",
	url:"lib/getData/retrievedata.php",
	dataType:"json", // Data type, HTML, json etc.
	data:{module:mod},
	beforeSend: function() {

		$('#tblPositionList').bootstrapTable("showLoading");
	},
	success:function(response){
		$('#tblPositionList').bootstrapTable("hideLoading");
		$('#tblPositionList').bootstrapTable("load",response);
		// $('#1').bootstrapTable("load",response);
		// $('#2').bootstrapTable("load",response);

		$.unblockUI();
	},
	error:function (xhr, ajaxOptions, thrownError){
		$.growl.error({ message: thrownError });
		$.unblockUI();
	}
	});

}























	// ///////////////////////GOOOOOGLE

	// google.charts.load('current', {'packages':['line', 'corechart']});
	//       google.charts.setOnLoadCallback(drawChart);

	//     function drawChart() {

	//       var button = document.getElementById('change-chart');
	//       var chartDiv = document.getElementById('chart_div');

	//       var data = new google.visualization.DataTable();
	//       data.addColumn('date', 'Month');
	//       data.addColumn('number', "Average Temperature");
	//       data.addColumn('number', "Average Hours of Daylight");

	//       data.addRows([
	//         [new Date(2014, 0),  -.5,  5.7],
	//         [new Date(2014, 1),   .4,  8.7],
	//         [new Date(2014, 2),   .5,   12],
	//         [new Date(2014, 3),  2.9, 15.3],
	//         [new Date(2014, 4),  6.3, 18.6],
	//         [new Date(2014, 5),    9, 20.9],
	//         [new Date(2014, 6), 10.6, 19.8],
	//         [new Date(2014, 7), 10.3, 16.6],
	//         [new Date(2014, 8),  7.4, 13.3],
	//         [new Date(2014, 9),  4.4,  9.9],
	//         [new Date(2014, 10), 1.1,  6.6],
	//         [new Date(2014, 11), -.2,  4.5]
	//       ]);

	//       var materialOptions = {
	//         chart: {
	//           title: 'Applicants Monthly Trend'
	//         },
	//         width: 1000,
	//         height: 1000,
	//         series: {
	//           // Gives each series an axis name that matches the Y-axis below.
	//           0: {axis: 'count'},
	//           1: {axis: 'Month'}
	//         },
	//         axes: {
	//           // Adds labels to each axis; they don't have to match the axis names.
	//           y: {
	//             Temps: {label: 'Temps (Celsius)'},
	//             Daylight: {label: 'Daylight'}
	//           }
	//         }
	//       };

	//       var classicOptions = {
	//         title: 'Average Temperatures and Daylight in Iceland Throughout the Year',
	//         width: 900,
	//         height: 500,
	//         // Gives each series an axis that matches the vAxes number below.
	//         series: {
	//           0: {targetAxisIndex: 0},
	//           1: {targetAxisIndex: 1}
	//         },
	//         vAxes: {
	//           // Adds titles to each axis.
	//           0: {title: 'Temps (Celsius)'},
	//           1: {title: 'Daylight'}
	//         },
	//         hAxis: {
	//           ticks: [new Date(2014, 0), new Date(2014, 1), new Date(2014, 2), new Date(2014, 3),
	//                   new Date(2014, 4),  new Date(2014, 5), new Date(2014, 6), new Date(2014, 7),
	//                   new Date(2014, 8), new Date(2014, 9), new Date(2014, 10), new Date(2014, 11)
	//                  ]
	//         },
	//         vAxis: {
	//           viewWindow: {
	//             max: 30
	//           }
	//         }
	//       };

	//       function drawMaterialChart() {
	//         var materialChart = new google.charts.Line(chartDiv);
	//         materialChart.draw(data, materialOptions);
	//         button.innerText = 'Change to Classic';
	//         button.onclick = drawClassicChart;
	//       }

	//       function drawClassicChart() {
	//         var classicChart = new google.visualization.LineChart(chartDiv);
	//         classicChart.draw(data, classicOptions);
	//         button.innerText = 'Change to Material';
	//         button.onclick = drawMaterialChart;
	//       }

	//       drawMaterialChart();

	//     }
</script>




</body>
</html>