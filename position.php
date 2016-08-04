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
				BmaintenancePosition();
			?>
		</div>
<!-- end breadcrumb -->
<!-- end col-md-12 -->
	</div>

	<div class="row">
<div class="col-md-12">
			<div class="bg-main">
				<div class="row">
					<div class="col-md-4" style="border-right:1.5px solid #d0d0d0;">
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
								<div class="col-md-12">

									<div class="row">
										<div class="col-md-6">
											<!-- <label><i class="fa fa-ticket" aria-hidden="true"></i> ID:</label> -->
											<input id="txtId" type="text" class="form-control"/>

											<label><i class="fa fa-ticket" aria-hidden="true"></i> Position:</label>
											<input id="txtPosition" type="text" class="form-control"/>
										</div>
										<div class="col-md-6">
											<label><i class="glyphicon glyphicon-check spacetxt" aria-hidden="true"></i> Item #:</label>
											<input id="txtItem" type="text" class="form-control"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9">
											<label><i class="glyphicon glyphicon-map-marker spacetxt"></i>
												Office:</label>
											<select id="selDepartment" name="template" class="form-control selectpicker" data-live-search="true">
													<?php LoadDepartmentList(); ?>
											</select>
										</div>
										<div class="col-md-3">
											<label><i class="glyphicon glyphicon-usd spacetxt"></i>
												Salary Grade:</label>
											<input id="txtSalaryGrade" class="form-control" type="number" name="quantity" min="1" max="35"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label><i class="glyphicon glyphicon-time spacetxt"></i>
												Date Posting:</label>
											<input id="txtDatePost" class="form-control" data-format="yyyy/MM/dd" type="date" required />
										</div>
										<div class="col-md-6">
											<label><i class="glyphicon glyphicon-time spacetxt"></i>
												Date Expire:</label>
											<input id="txtDateExpire" class="form-control" data-format="yyyy/MM/dd" type="date" required />
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label><i class="glyphicon glyphicon-edit spacetxt" ></i>Qualifications:</label>
											<table id="lstRequirement" class="table-size"
											  	data-toggle="table"
											   	data-height="130"
											   	data-sort-name="no"
											   >
												<thead>
													<tr>
														<th data-field="qualificationPk" data-visible="true">qualificationPk</th>
														
														<th data-field="Qualifications"  >Qualification</th>
														<th data-field="action"  >action</th>
													</tr>
												</thead>
											</table>
											<button class="pull-right btn btn-primary" style="margin-top: 6px;">Add</button>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label><i class="glyphicon glyphicon-list-alt spacetxt"></i> Job Description:</label>
											<table id="lstJobDescription" class="table-size"
											   data-toggle="table"
											   data-height="130"
											   data-sort-name="no"
											   >
												<thead>
													<tr>
														<th data-field="jobdescriptionPk" data-visible="true">jobdescriptionPk</th>
														
														<th data-field="Description"  >Job Description</th>
														<th data-field="action"  >action</th>
													</tr>
												</thead>
											</table>
											<button class="pull-right btn btn-primary" style="margin-top: 6px;">Add</button>
										</div>
									</div>

								</div>
							</div>


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
				<img src="images/logo/hr_logo.png" width="40" height="35" alt="PGLU" title="PGLU" class="img-circle" />&nbsp;
				<img src="images/logo/pglu.png" width="40" height="35" alt="PGLU" title="PGLU" class="img-circle" />
			</div>
		</div>
	</div>
</footer>
<!-- end footer -->


<!-- includes -->

<!-- end includes -->
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
	clickSearch();
});


function clickSearch()
{
	var mod="joblist";
	var strSearch = $('#txtSearch').val();
	jQuery.ajax({
	type: "POST",
	url:"lib/getData/position.php",
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

$('#jobList').on('click-row.bs.table', function (e, row, $element) {

    // alert(row['jobApplivationNo']);
    // alert($('#jobMain').height());
 //    console.log($('.fixed-table-body').height());

 //   	var mod="selectedJob";
	// jQuery.ajax({
	// type: "POST",
	// url:"lib/getData/position.php",
	// dataType:"json", // Data type, HTML, json etc.
	// data:{module:mod,jobPK:row['jobApplivationNo']},
	// beforeSend: function() {
	// 	$.blockUI();
	// },
	// success:function(response){
		$.blockUI();
		// $('#txtId').val(row['jobApplivationNo']);
		$('#txtPosition').val(row['position']);
		$('#txtItem').val(row['itemNo']);
		$('#txtSalaryGrade').val(row['salaryGrade']);
		document.getElementById("txtDatePost").valueAsDate = row['datePost'];
		$('#txtDatePost').val(row['datePost']);
		$('#txtDateExpire').val(row['dateExpire']);
		$('#selDepartment').selectpicker('val',row['department_pk']);
		$('#selDepartment').selectpicker('refresh');
		$('#txtId').val(row['jobApplivationNo']);
		$('#lstRequirement').bootstrapTable('removeAll');
		// var counter =1;
 		$.each(row['qualification'],function( key, value )
		{
			// $('#txtQualification').append(value['jobRequire']);
			$('#lstRequirement').bootstrapTable('insertRow', {index: 1, row: {  qualificationPk:value['requirementPk'],Qualifications:value['requirementDesc'], action: "<a href='#' title='Delete' onclick='removeRow(\""+ value['requirementPk'] +"\");' ><i class='fa fa-trash' aria-hidden='true'></i></a>" } });
			// alert(value['requirementPk']);
			// counter++;
			// $table.bootstrapTable('insertRow', {index: , row: row});
		});
		$('#lstJobDescription').bootstrapTable('removeAll');
		// counter=1;
 		$.each(row['responsibility'],function( key, value )
		{
			// $('#txtQualification').append(value['jobRequire']);
			$('#lstJobDescription').bootstrapTable('insertRow', {index: 1, row: {  jobdescriptionPk:value['responsibilityPk'], Description:value['responsibilityDesc'], action: "<a href='#' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a>" } });
			// counter++;
			// alert(value);
			// $table.bootstrapTable('insertRow', {index: , row: row});
		});

		$.unblockUI();
	// },
	// error:function (xhr, ajaxOptions, thrownError){
	// 	$.growl.error({ message: thrownError });
	// 	$.unblockUI();
	// }
	// });

});

function removeRow(rowToDelete)
{
	// alert(rowToDelete);
	$('#lstRequirement').bootstrapTable('remove', {
                field: 'qualificationPk',
                values: rowToDelete
            });
 }

</script>




</body>
</html>


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
	$query->close();
	$con->close();
}

?>