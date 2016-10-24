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

	<?php include("essential/leftmenu.php"); ?>

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
					<div class="col-md-4">
						<div id="imaginary_container"> 
							<div class="input-group stylish-input-group">
							<!-- <form> -->
								<input id="txtSearch" type="text" class="form-control"  placeholder="Search" >
								<span class="input-group-addon">
									<button id="searchJob" type="submit">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								</span>
								<!-- </form> -->
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
											<input id="txtId" type="hidden" class="form-control"/>

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
											<label><i class="fa fa-rub spacetxt"></i>
												Salary Grade:</label>
											<input id="txtSalaryGrade" class="form-control" type="number" name="quantity" min="1" max="35"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label><i class="fa fa-calendar spacetxt"></i>
												Date Posting:</label>
											<input id="txtDatePost" class="form-control" data-format="yyyy/MM/dd" type="date" required />
										</div>
										<div class="col-md-6">
											<label><i class="fa fa-calendar spacetxt"></i>
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
														<th  data-visible="true" data-checkbox="true"></th>
														<th data-field="qualificationPk" data-visible="false" >qualificationPk</th>
														
														<th data-field="description"  >Qualification</th>
													</tr>
												</thead>
											</table>
											<div class="row" style="margin-top: 0px;">
												<div class="col-md-6">
													
												</div>

												<div class="col-md-6">

													<button id="DelQualification" class="pull-right btn btn-danger" style="margin-top: 6px;">Del</button>
													<button id="AddQualification" class="pull-right btn btn-primary" style="margin-top: 6px; margin-right: 4px;">Add</button>
													<input id="jobrequirement-description" class="form-control pull-right" data-ignore=1 style="width:60%; margin-top: 6px; margin-right:4px;" data-format="add" type="type" required />
												</div>
											</div>
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
														<th  data-visible="true" data-checkbox="true"></th>
														<th data-field="jobdescriptionPk" data-visible="false">jobdescriptionPk</th>
														<th data-field="description"  >Job Description</th>
													</tr>
												</thead>
											</table>
											<div class="row" style="margin-top: 0px;">
												<div class="col-md-6">
													
												</div>

												<div class="col-md-6">
													<button id="DelJobDesc" class="pull-right btn btn-danger" style="margin-top: 6px;">Del</button>
													<button id="AddjobDesc" class="pull-right btn btn-primary" style="margin-top: 6px; margin-right: 4px;">Add</button>
													<input id="jobresponsibility-description" class="form-control pull-right" data-ignore=1 style="width:60%; margin-top: 6px; margin-right:4px;" data-format="add" type="type" required />
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>

					</div>
						<button id="btnDelete" class="pull-right btn btn-danger" style="margin-right: 4px; width: 60px;">Delete</button>
						<button id="btnSave" class="pull-right btn btn-primary" style="margin-right: 4px; width: 60px;">Save</button>
						<button id="btnNew" class="pull-right btn btn-primary" style="margin-right: 4px; width: 60px;">New</button>
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
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="script/loginScript.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();
	$('#searchJob').trigger("click");
});

$('#searchJob').click(function(){


// function clickSearch()
// {
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
});

$('#jobList').on('click-row.bs.table', function (e, row, $element) {

		$.blockUI();
		$('#txtId').val(row['jobApplivationNo']);
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
	$.each(row['qualification'],function( key, value )
		{
			$('#lstRequirement').bootstrapTable('insertRow', {index: 1, row: {  qualificationPk:value['requirementPk'],description:'<span class="jobrequirement-description">'+value['requirementDesc']+'</span>' } });
		});

		$('#lstJobDescription').bootstrapTable('removeAll');
 		$.each(row['responsibility'],function( key, value )
		{
			$('#lstJobDescription').bootstrapTable('insertRow', {index: 1, row: {  jobdescriptionPk:value['responsibilityPk'], description:'<span class="jobresponsibility-description">'+value['responsibilityDesc']+'</span>' } });
		});

		$.unblockUI();


});

// function removeRow(rowToDelete)
// {
// 	// alert(rowToDelete);
//    var ids = $.map($('#lstRequirement').bootstrapTable('getSelections'), function (row) {
//     	// alert(row.Qualifications);
//         return row.Qualifications;
//     });
// 	$('#lstRequirement').bootstrapTable('remove', {
//                 field: 'qualificationPk',
//                 values: rowToDelete
//             });
//  }



//ADD SKILL
	$('#AddQualification').click(function(e){
		$.blockUI();
		e.preventDefault();
		// console.log($('#EducLvlID').val());
		if ($('#jobrequirement-description').val()=='') 
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		var rows = [];
	  	rows.push({
                description: '<span class="jobrequirement-description">'+$('#jobrequirement-description').val()+'</span>'
            });
		$('#lstRequirement').bootstrapTable('append', rows);
		$('#lstRequirement').bootstrapTable('scrollTo', 'bottom');
		$('#jobrequirement-description').val('');
		$.unblockUI();
	});

    $(function () {

        $('#DelQualification').click(function () {
            var ids = $.map($('#lstRequirement').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
                return row.description;
            });
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#lstRequirement').bootstrapTable('remove', {
                field: 'description',
                values: ids
            });
        });
    });



//ADD job desc
	$('#AddjobDesc').click(function(e){
		$.blockUI();
		e.preventDefault();
		// console.log($('#EducLvlID').val());
		if ($('#jobresponsibility-description').val()=='') 
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		var rows = [];
	  	rows.push({
                description: '<span class="jobresponsibility-description">'+$('#jobresponsibility-description').val()+'</span>'
            });
		$('#lstJobDescription').bootstrapTable('append', rows);
		$('#lstJobDescription').bootstrapTable('scrollTo', 'bottom');
		$('#jobresponsibility-description').val('');
		$.unblockUI();
	});

    $(function () {

        $('#DelJobDesc').click(function () {
            var ids = $.map($('#lstJobDescription').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
                return row.description;
            });
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#lstJobDescription').bootstrapTable('remove', {
                field: 'description',
                values: ids
            });
        });
    });

//NEW BUTTON
$('#btnNew').click(function (){

	$('input', $('#jobMain')).each(function(i, o) { // loop within Family Background
		if (o.nodeName == 'INPUT') 
		{
			// console.log(o.id);
			// if ((o.dataset['ignore'] == undefined) ) 
			// { // skip input elem with ignore dataset
				if (o.type == 'input') return; // skip select btSelectAll checkbox
				o.value = '';
		}
		// }
	
	});
	$('#lstJobDescription').bootstrapTable('removeAll');
	$('#lstRequirement').bootstrapTable('removeAll');

});

//SAVE BUTTON
$('#btnSave').click(function (){
var data = '{';
	// collect one to one properties
	$('input, select', $('#jobMain')).each(function(i, o) { // loop within Family Background
		if (o.nodeName == 'INPUT') 
		{
			if ((o.dataset['ignore'] == undefined) ) 
			{ // skip input elem with ignore dat
				if (o.type == 'checkbox') return; // skip select btSelectAll checkbox
				data += '"'+o.id+'": "' + o.value + '",';
			}

		}
		else if (o.nodeName == 'SELECT')
		{
			data += '"'+o.id+'":"' + o.value + '",';
		}

	});	
	// collect many to one properties
	if ($($('#lstRequirement tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);
	} else {
		data += '"jobRequirement": [';
		$('#lstRequirement tbody tr').each(function(i, o) {

			data += '{';
			$('span', $(o)).each(function(i, o) {
				data += '"'+o.className+'":"'+o.innerHTML+'",';
			});
			data = data.substring(0,data.length-1);
			data += '},';
		});
		data = data.substring(0,data.length-1);
		data += '],'
	}

	if ($($('#lstJobDescription tbody tr')[0]).hasClass('no-records-found')) {
		data = data.substring(0,data.length-1);
	} else {
		data += '"jobDescription": [';
		$('#lstJobDescription tbody tr').each(function(i, o) {

			data += '{';
			$('span', $(o)).each(function(i, o) {
				data += '"'+o.className+'":"'+o.innerHTML+'",';
			});
			data = data.substring(0,data.length-1);
			data += '},';
		});
		data = data.substring(0,data.length-1);
		data += ']'
	}




	data += '}';
	data = JSON.parse(data);
	console.log(data);
	
	if (!checkRequirement())
	{
		return;
	}
	var moduleName;
	if ($('#txtId').val()=='')
	{
		moduleName = 'newPosition';
	}
	else
	{
		moduleName = 'updatePosition';
	}
   $.blockUI();
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/position.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
			if  (response['message']=='Successful')
        	{
        		$.growl.notice({ message: response['message'] });
        	}
        	else
        	{
        		$.growl.error({ message: response['message'] });
        	}
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
 $.unblockUI();
});

//DELETE POSITION
$('#btnDelete').click(function(){

	if ($('#txtId').val()=='')	
	{
		$.growl.warning({ message: "Select Position to Delete." });
		return;
	}

	if(!confirm("Delete Position?"))
	{
		// alert("delete cancelled.");
		return;
	}


var moduleName='deletePosition';
$.blockUI();
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/position.php",
        dataType:'text',
        data:{module:moduleName,data:$('#txtId').val()},
        success:function(response)
        {
			if  (response =='Successful')
        	{
        		$.growl.notice({ message: "Delete Success" });
        		$('#btnNew').trigger("click");
        	}
        	else
        	{
        		$.growl.error({ message: response });
        	}
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
 $.unblockUI();

});


function checkRequirement()
{
	var returnValue;
	returnValue=true;
	if ($('#txtItem').val()=='')
	{
		returnValue=false;
	}
	if ($('#txtPosition').val()=='')
	{
		returnValue=false;
	}
	if ($('#txtDatePost').val()=='')
	{
		returnValue=false;
	}
	if ($('#txtDateExpire').val()=='')
	{
		returnValue=false;
	}
		if ($('#txtSalaryGrade').val()=='')
	{
		returnValue=false;
	}

	if (returnValue==false)
	{
		$.growl.warning({ message: 'Input all required fields.' });
		return false;
	}

	return true;

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