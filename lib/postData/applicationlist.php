<?php

 
if (session_status() == PHP_SESSION_NONE) 
{
	session_start();
}

if (!isset($_POST['module']))
{
	echo 'Dont link on this url directly.';
	die();
}

// initialize DB connection
include("../../essential/connection.php");
include("../makeKey/key.php");
include("../../essential/audit.php");

switch ($_POST['module']) 
{
	case 'applicationList':
		applicationList();
		break;

	case "dropApplication":
		dropApplication();
		break;

	default:
		echo "Module is Null.";
		die();
		break;

}



function applicationList()
{
	// global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	// $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$returnMsg=array();
	$errMsg=null;
	$applicationArr=$_POST['jsonData'];
	$transactionNo=makeTransactionNo();

	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/html; charset=iso-8859-1";
	$headers[] = "From: hrmd <jerome.marzan88@gmail.com>";
	$headers[] = "Bcc: hrmd <jerome.marzan88@gmail.com>";
	$headers[] = "Reply-To: Recipient Name <jerome.marzan88@gmail.com>";
	$headers[] = "Subject: PGLU Online Application";
	$headers[] = "X-Mailer: PHP/".phpversion();
	$pointerCounter=0;
	foreach($applicationArr as $schedApplications)
	{
		// echo $_POST['dateOfInterview'];
		
		$applicantEmail=getEmail($schedApplications['ApplicationNo'],$transactionNo);

		if (mail($applicantEmail,"PGLU Online Application",emailSchedApplication(strtoupper($schedApplications['Applicant']),$_POST['dateOfInterview'],$_POST['timeOfInterview'],$schedApplications['position']),implode("\r\n", $headers)))
			{
				UpdateApplicationDetail($schedApplications['ApplicationNo'],$transactionNo);
				insertToAudit($transactionNo,"send mail to:".$applicantEmail,'schedule interview',$_SESSION['username']);
			}
			else
			{
				$errMsg=$errMsg."Error sending mail to ".$applicantEmail."<br>";
				insertToErrLog($transactionNo,null,"applicationlist",$_SESSION['username'],$errMsg);
			}
		$pointerCounter++;
	}
	if ($errMsg == null) $errMsg='success';
	$returnMsg['message']=$errMsg;
	echo json_encode($returnMsg);

}

function UpdateApplicationDetail($applicationNo,$transaction_no)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="INSERT INTO applicationdetail(applicationdetail_pk,detail,update_by,application_fk) VALUES('APL".date("Y").date("m").makeKey('appDetail')."','Applicant Scheduled for Interview', '".$_SESSION['username']."','".$applicationNo."')";
	if(!mysqli_query($con,$sql))
	{
		insertToErrLog($transaction_no,$sql,"applicationlist",$_SESSION['username'],mysqli_error($con));
	}

	mysqli_close($con);

}



function getEmail($applicationNo,$transaction_no)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT securityuser_fk FROM application WHERE application_pk = '".$applicationNo."' ";
	$query=mysqli_query($con,$sql);
	if(!mysqli_query($con,$sql))
	{
		insertToErrLog($transaction_no,$sql,"applicationlist",$_SESSION['username'],mysqli_error($con));
	}
	$result=mysqli_fetch_array($query);
	mysqli_close($con);
	// echo $result['securityuser_fk'];
	// die();
	return $result['securityuser_fk'];
}

function emailSchedApplication($Applicantname,$dateOfInterview,$timeOfInterview,$position)
{
	$date=date_create($dateOfInterview);
	
		
	return '<table border="0" style="margin:auto;
		width:500px; font-family:arial;">
		<tr>
			<th style="background-color:#054a75; margin:0;
		color:#fff;
		padding:16px 14px;
		letter-spacing:1.2px;"><h1 style="font-size:16px;
		font-family:arial;">PGLU Online Job Application</h1></th>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p>Dear <b>'.$Applicantname.'</b>,</p></td>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p>Good day. We had processed your application for <b>'.$position.'</b>. We had scheduled your interview and exam on</p></td>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 0px 30px 5px;
		color: #333;">Date: <b>'.date_format($date, 'F d, Y').'</b></td>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 0px 30px 5px;
		color: #333;">Time: <b>'.$timeOfInterview.'</b></td>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p style="margin:0;">Please bring also the following documents</p></td>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;">
			<b><p style="font-size:12px; margin:0;">	Application Letter<br>
				Endorsement Letter<br>
				Summary of Skills / Qualifications<br>
				CSC Formm 212 (3 copies)<br>
				Passport Size ID Picture (3 copies)<br>
				Original and Photocopy of the following documents:<br>
				<ul style="font-size:12px; list-style-type: lower-alpha; margin:0; padding-left:20px;">
					<li><b>Certificate of Grades</b></li>
					<li><b>High School Diploma (for High School graduates)</b></li>
					<li><b>Diploma for Vocational Graduates</b></li>
					<li><b>Transcript of Records & Diploma</b></li>
					<li><b>Civil Service Eligibility/Board Examination Certificate / PRC Rating</b></li>
					<li><b>License (PRC / Security Guard / Driver)</b></li>
					<li><b>Certificate of Training</b></li>
					<li><b>Certified Service Record from previous employer</b></li>
				</ul>
			</p></b>
			</td>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p>If you are unable on the following dates, please call HRMD @242-5550 local 256 three days before the said date. Thank you.</p></td>
		</tr>
		<tr>
			<td style="border-bottom:1px solid #e6e5e3; font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p style="padding-bottom:40px;"><b>Human Resource Mangement Division</b></p></td>
		</tr>
	</table>';
}


function dropApplication()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	mysqli_autocommit($con, FALSE);
	$transactionNo=makeTransactionNo();
	$transaction=true;
	$returnMsg=array();
	$errMsg=null;
	$applicationArr=$_POST['jsonData'];
	foreach($applicationArr as $applicationList)
	{
		$sql="UPDATE application SET status='D' WHERE application_pk = '".$applicationList['ApplicationNo']."' ";
		// echo $sql."<br>";
		if(!mysqli_query($con,$sql))
		{
			$transaction=false;
			$errMsg='mysqli error: '.mysqli_error($con);
		}
		$derived_key="APL".date("Y").date("m").makeKey('appDetail');
		$sql="INSERT INTO applicationdetail(applicationdetail_pk,detail,update_by,application_fk) VALUES ('".$derived_key."','Application Dropped','".$_SESSION['username']."','".$applicationList['ApplicationNo']."') ";
		if(!mysqli_query($con,$sql))
		{
			$transaction=false;
			$errMsg='mysqli error: '.mysqli_error($con);
			insertToErrLog($transactionNo,$sql,"applicationlist",$_SESSION['username'],mysqli_error($con));

		}
		else
		{

			$headers   = array();
			$headers[] = "MIME-Version: 1.0";
			$headers[] = "Content-type: text/html; charset=iso-8859-1";
			$headers[] = "From: hrmd <jerome.marzan88@gmail.com>";
			$headers[] = "Bcc: hrmd <jerome.marzan88@gmail.com>";
			$headers[] = "Reply-To: Recipient Name <jerome.marzan88@gmail.com>";
			$headers[] = "Subject: PGLU Online Application";
			$headers[] = "X-Mailer: PHP/".phpversion();
			$applicantEmail=getEmail($applicationList['ApplicationNo'],$transactionNo);
			insertToAudit($transactionNo,$sql,'drop application',$_SESSION['username']);
			if (!mail($applicantEmail,"PGLU Online Application",emailDropApplication(strtoupper($applicationList['Applicant']),$applicationList['position']),implode("\r\n", $headers)))
			{
				$errMsg="Send mail failed.";
				$transaction=false;
				insertToErrLog($transactionNo,null,"applicationlist",$_SESSION['username'],$errMsg);
			}

		}


	}

	if($transaction)
	{
		mysqli_commit($con);
		$returnMsg['message']="success";
	}
	else
	{
		mysqli_rollback($con);
		$returnMsg['message']=$errMsg;
	}

	echo json_encode($returnMsg);
	mysqli_close($con);

}

function emailDropApplication($Applicantname,$position)
{
	return '<table border="0" style="margin:auto;
		width:500px; font-family:arial;">
		<tr>
			<th style="background-color:#054a75; margin:0;
		color:#fff;
		padding:16px 14px;
		letter-spacing:1.2px;"><h1 style="font-size:16px;
		font-family:arial;">PGLU Online Job Application</h1></th>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p>Dear <b>'.$Applicantname.'</b>,</p></td>
		</tr>
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p>Good day. We had processed your application for the <b>'.$position.'</b> and we regret to inform you that you did not pass the qualifications needed.</p></td>
		</tr>

		
		<tr>
			<td style="font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p>If you have inquiries or questions regarding your application, please call HRMD @242-5550 local 256 and we are gladly to answer your inquiries. Thank you again for your intererst in applying in this position.</p></td>
		</tr>
		<tr>
			<td style="border-bottom:1px solid #e6e5e3; font-family:arial; border-left: 1px solid #e6e5e3;
		border-right: 1px solid #e6e5e3;
		border-top: none;
		padding: 10px 30px 5px;
		color: #333;"><p style="padding-bottom:40px;"><b>Human Resource Mangement Division</b></p></td>
		</tr>
	</table>';
}
