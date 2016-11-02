<?php

	require_once('essential/session.php');
	require_once('essential/connection.php');
	
	
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
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
    <title>OJA v1.0</title>
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

	<div class="row">
		<div class="col-md-12">
			<div class="card bg-main">
			
				<ul class="nav nav-tabs" role="tablist" style="font-size:11px;">
					<li id="profileInfo" class="active" role="presentation"><a href="#profileinfo" aria-controls="profile" role="tab" data-toggle="tab">Profile Info</a></li>
					<li id="editPassword" role="presentation"><a href="#editpass" aria-controls="home" role="tab" data-toggle="tab">Edit Password</a></li>
				</ul>
				
				<div class="tab-content">
					<div id="profileinfo" class="tab-pane fade in active">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
								
									<div class="col-sm-12">
										<h4>Profile Info</h4>
										<hr/>
									</div>
									
									<div class="col-sm-2">
									</div>
									
									<div class="col-sm-8">
										<?php
											
											if (isset($_POST['0'])) {
												/* echo 'asdasdsad';
												print_r($_POST); */
												$sql = "UPDATE security_user SET fname = '$_POST[fname]', lname = '$_POST[lname]', mobileno = '$_POST[mobileno]' WHERE email = '".$_SESSION['username']."'";
												$query=mysqli_query($con,$sql);
											}
											
											$sql="SELECT email, fname, lname, mobileno, password,salt_key FROM security_user WHERE email = '".$_SESSION['username']."'";
											$query=mysqli_query($con,$sql);
											$result=mysqli_fetch_array($query);
											$_SESSION['name'] = $result['fname']." ".$result['lname'];
			
											echo '
											<form id="frmUserInfo" class="form-horizontal" method="post">
												<div class="form-group">
													<label for="inputEmail" class="col-sm-2 control-label">Email Address:</label>
													<div class="col-sm-10">
													  <input type="type" id="email" name="email" class="form-control" placeholder="Email Address" value="'.$result['email'].'" readonly>
													</div>
												</div>
												<div class="form-group">
													<label for="inputFirstName" class="col-sm-2 control-label">First Name:</label>
													<div class="col-sm-10">
													  <input type="type" id="fname" name="fname" class="form-control" placeholder="First Name" value="'.$result['fname'].'">
													</div>
												</div>
												<div class="form-group">
													<label for="inputLastName" class="col-sm-2 control-label">Last Name:</label>
													<div class="col-sm-10">
													  <input type="type" id="lname" name="lname" class="form-control" placeholder="Last Name" value="'.$result['lname'].'">
													</div>
												</div>
												<div class="form-group">
													<label for="inputMobile" class="col-sm-2 control-label">Mobile No:</label>
													<div class="col-sm-10">
													  <input type="type" id="mobileno" name="mobileno" class="form-control" placeholder="Mobile No" value="'.$result['mobileno'].'">
													</div>
												</div>
												<input id="btnSaveUser" class="btn btn-primary pull-right" type="submit" value="Save">
											</form>';

										?>
									</div>
									
									<div class="col-sm-2">
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
					<div id="editpass" class="tab-pane fade">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
								
									<div class="col-sm-12">
										<h4>Edit Password</h4>
										<hr/>
									</div>
									
									<div class="col-sm-2">
									</div>
									
									<div class="col-sm-8">
										
												<form name="changePassword" class="form-horizontal" method="post">
													<div class="form-group">
														<label for="inputCurrentPass" class="col-sm-2 control-label">Current Password:</label>
														<div class="col-sm-10">
														  <input type="password" name="currentPass" class="form-control" placeholder="Current Password">
														</div>
													</div><br/>
													<div class="form-group">
														<label for="inputNewPass" class="col-sm-2 control-label">New Password:</label>
														<div class="col-sm-10">
														  <input type="password" name="newPass" class="form-control" placeholder="New Password">
														</div>
													</div>
													<div class="form-group">
														<label for="inputVerifyPass" class="col-sm-2 control-label">Verify Password:</label>
														<div class="col-sm-10">
														  <input type="password" name="verifyPass" class="form-control" placeholder="Verify Password">
														</div>
													</div>
													<input class="btn btn-primary pull-right" type="submit" value="Save">
												</form>
												
									</div>
									
									<div class="col-sm-2">
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
});

$( "#btnSaveUser" ).submit(function(event) {

	event.preventDefault();
	
	
});





</script>


</body>
</html>