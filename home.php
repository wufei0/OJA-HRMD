<?php

	require_once('essential/session.php');
	require_once('essential/connection.php');
	require_once('essential/errorDescription.php');
	

	
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
	<title><?php echo $SESSION_['sysVer']; ?></title>
    <link rel="icon" href="images/logo/icon_oja.gif" type="image/x-icon">
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
				Bhome();
			?>
		</div>
<!-- end breadcrumb -->
<!-- end col-md-12 -->
	</div>

<!-- gallery -->
<?php
if (!isset($_SESSION['username']) )
{
echo '
<div class="row">
	<div class="col-md-12">
		<div id="homebanner" class="hero">
			
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
</div>'; }
?>

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
<script type="text/javascript" src="js/linechart.js"></script>

<script type="text/javascript" src="script/staticDesign.js"></script>
<script type="text/javascript" src="script/loginScript.js"></script>
<script type="text/javascript">


$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();
	loadPositionList();
	<?php
		if ((isset($_GET['passRenew'])) && (isset($_GET['email'])))
		{
			if (!isPasswordRecoUrlValid()) exit;
			renderRecoverPassword();
			changeRecoveryPassword();
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

// <?php
// if (isset($_GET['passRenew']))
// 		{
// 			if (!isPasswordRecoUrlValid()) exit;
// 			renderRecoverPassword();
// 		}





// ?>
<?php 
function changeRecoveryPassword()
{
echo "
function changeRecoveryPassword()
{

	
	if ($('#recoverPassword').val()!=$('#recoverPasswordConfirm').val())
	{
		$.growl.error({ message: 'Password dont match.' });
		return;
	}
	else if ($('#recoverPassword').val()=='')
	{
		$.growl.error({ message: 'Blank password' });
		return;
	}

	$.blockUI();
	var mod='changeRecoverPassword';
	var passRenew='"; echo $_GET['passRenew'];
	echo "';
	var email='"; echo $_GET['email']; 
	echo "';
	var pass=$('#recoverPassword').val();

	jQuery.ajax({
	type: 'POST',
	url:'lib/authenticate/login.php',
	dataType:'text', 
	data:{module:mod,passRenew:passRenew,email:email,pass:pass},
	beforeSend: function() {
		$('#modal-footer').html('please wait...');
	},
	success:function(response){
		if (response==true)
		{
			$('#modal-footer').html('Use your new password to Login. Page will reload.');
			window.location.reload();
		}
		else
		{
			$('#modal-footer').html('Change Password failed. Try Again.');
		}
	},
	error:function (xhr, ajaxOptions, thrownError){
		$.growl.error({ message: thrownError });
		$('#modal-footer').html(thrownError);
	}
	
	});
$.unblockUI();
}
";
}
?>
</script>




</body>
</html>




<?php  


function renderRecoverPassword()
{
	echo "
	      $('#myModalLabel').html('Password Recovery'); 
	      $('#model-content').html('');
	      $('#modal-footer').html('');
	      $('#myModal').modal('show');
	      $('#model-content').html(\"<form role='form' id='fromChangePasswword'><div class='form-group'><div class='icon-addon addon-md'><input type='password' placeholder='password' class='form-control' id='recoverPassword' required><label for='email' class='fa fa-lock' rel='tooltip' title='email'></label></div></div><div class='form-group'><div class='icon-addon addon-md'><input id='recoverPasswordConfirm' type='password' name='pass' class='form-control input-md' placeholder='Confirm password' required><label for='email' class='fa fa-lock' rel='tooltip' title='email'></label>&nbsp<button id='btnChangePassword'  class='btn btn-primary btn-md btn-block pull-right' name='login' style='width:120px;' >Change Password</button></div></div></form>\");
		";
echo "

  $(document).on('submit','#fromChangePasswword',function(e){
    e.preventDefault();
    changeRecoveryPassword();
  });


";
// echo "


// $('#btnChangePassword').submit(function (event){

// 	event.preventDefault();
// 	if ($('#recoverPassword').val()!=$('#recoverPasswordConfirm').val())
// 	{
// 		$.growl.error({ message: 'Password dont match.' });
// 		return;
// 	}
// 	else if ($('#recoverPassword').val()=='')
// 	{
// 		$.growl.error({ message: 'Blank password' });
// 		return;
// 	}

// 	$.blockUI();
// 	var mod='changeRecoverPassword';
// 	jQuery.ajax({
// 	type: 'POST',
// 	url:'lib/authenticate/login.php',
// 	dataType:'text', // Data type, HTML, json etc.
// 	data:{module:mod},
// 	beforeSend: function() {
// 		$('#modal-footer').html('');
// 	},
// 	success:function(response){
// 		if (response==true)
// 		{
// 			$('#modal-footer').html('Use your new password to Login.');
// 		}
// 		else
// 		{
// 			$('#modal-footer').html('Change Password failed. Try Again.');
// 		}
// 	},
// 	error:function (xhr, ajaxOptions, thrownError){
// 		$.growl.error({ message: thrownError });
// 	}
	
// 	});
// $.unblockUI();
// });


// ";

}

function isPasswordRecoUrlValid()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT count(email) FROM security_user  WHERE activation_url = ? AND email = ? ";
	$stmt = $con->prepare($sql);
	$stmt->bind_param("ss", $_GET['passRenew'],$_GET['email']);
	$stmt->execute();
	$stmt->bind_result($email);
	$stmt->fetch();
	$stmt->close();
	
	if ($email!=1)
	{
		return false;
	}
	else
	{
		return true;
	}
	$con->close();
}

?>