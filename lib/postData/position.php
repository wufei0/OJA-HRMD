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

switch ($_POST['module']) 
{

	case "newPosition":
	newPosition();
	break;

	case "updatePosition":
	updatePosition();
	break;

	case "deletePosition":
	deletePosition();
	break;

	default:
	echo "Module is Null.";
	die();
	break;

}


function newPosition()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	mysqli_autocommit($con, FALSE);
	$transaction=true;
	$returnMessage=array();
	$position=array();
	$position=$_POST['jsonData'];


	$jobopening_fk="POS".date('Y').date('m').makeKey('position');
	$sql="INSERT INTO `jobopening` (`jobopening_pk`,`itemno`,`position`,`salarygrade`,`department_fk`,`postedby`,`poststart`,`postexpire`) VALUES ('".$jobopening_fk."',?,?,?,?,?,?,?)";
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) 
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "sssssss",$position['txtItem'], $position['txtPosition'], $position['txtSalaryGrade'], $position['selDepartment'],$_SESSION['username'], $position['txtDatePost'], $position['txtDateExpire'] );
				if ( !mysqli_execute($stmt) )
				{
					$transaction=false;
					$errMsg='line 60,stmt error: '.mysqli_stmt_error($stmt);
				}
	mysqli_stmt_close($stmt);

//JOB REQUIREMENTS
	if(isset($position['jobRequirement']))
	{
foreach($position['jobRequirement'] as $jobreq)
{
	$sql="INSERT INTO `jobrequirement`(`requirement_pk`,`description`,`jobopening_fk`)
		VALUES ('JREQ".date('Y').date('m').makeKey('jobRequirement')."',?,'".$jobopening_fk."')";
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt )
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "s",$jobreq['jobrequirement-description'] );
				if ( !mysqli_execute($stmt) )
				{
					$transaction=false;
					$errMsg='line 81,stmt error: '.mysqli_stmt_error($stmt);
				}
	mysqli_stmt_close($stmt);
}
}

//JOB RESPONSIBILITIES
	if(isset($position['jobDescription']))
	{
foreach($position['jobDescription'] as $jobres)
{
	$sql="INSERT INTO `jobresponsibility`(`responsibility_pk`,`description`,`jobopening_fk`)
		VALUES ('JRES".date('Y').date('m').makeKey('jobResponsibility')."',?,'".$jobopening_fk."')";
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt )
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "s",$jobres['jobrequirement-description'] );
				if ( !mysqli_execute($stmt) )
				{
					$transaction=false;
					$errMsg='line 104, stmt error: '.mysqli_stmt_error($stmt);
				}
	mysqli_stmt_close($stmt);
}
}

if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);

}

function updatePosition()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	mysqli_autocommit($con, FALSE);
	$transaction=true;
	$returnMessage=array();
	$position=array();
	$position=$_POST['jsonData'];

	$sql="UPDATE `jobopening` SET `itemno`=?, `position`=?, `salarygrade`=?, `department_fk`=?, `poststart`=?, `postexpire`=? WHERE `jobopening_pk`=?";

	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) 
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "sssssss",$position['txtItem'], $position['txtPosition'], $position['txtSalaryGrade'], $position['selDepartment'], $position['txtDatePost'], $position['txtDateExpire'], $position['txtId'] );
				if ( !mysqli_execute($stmt) )
				{
					$transaction=false;
					$errMsg='line 152,stmt error: '.mysqli_stmt_error($stmt);
				}
	mysqli_stmt_close($stmt);

//JOB REQUIREMENT
$sql="DELETE FROM jobrequirement where jobopening_fk=?";
$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) 
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "s", $position['txtId'] );
				if ( !mysqli_execute($stmt) )
				{
					$transaction=false;
					$errMsg='line 168,stmt error: '.mysqli_stmt_error($stmt);
				}
	mysqli_stmt_close($stmt);

if(isset($position['jobRequirement']))
{
foreach($position['jobRequirement'] as $jobreq)
{
	$sql="INSERT INTO `jobrequirement`(`requirement_pk`,`description`,`jobopening_fk`)
		VALUES ('JREQ".date('Y').date('m').makeKey('jobRequirement')."',?,?)";
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt )
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "ss",$jobreq['jobrequirement-description'],$position['txtId'] );
		if ( !mysqli_execute($stmt) )
		{
			$transaction=false;
			$errMsg='line 188,stmt error: '.mysqli_stmt_error($stmt);
		}
	mysqli_stmt_close($stmt);
}
}


//JOB RESPONSIBILITY
$sql="DELETE FROM jobresponsibility where jobopening_fk=?";
$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) 
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "s", $position['txtId'] );
				if ( !mysqli_execute($stmt) )
				{
					$transaction=false;
					$errMsg='line 207,stmt error: '.mysqli_stmt_error($stmt);
				}
	mysqli_stmt_close($stmt);

if(isset($position['jobDescription']))
{
foreach($position['jobDescription'] as $jobDesc)
{
	$sql="INSERT INTO `jobresponsibility`(`responsibility_pk`,`description`,`jobopening_fk`)
		VALUES ('JRES".date('Y').date('m').makeKey('jobResponsibility')."',?,?)";
	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt )
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "ss",$jobDesc['jobresponsibility-description'],$position['txtId'] );
		if ( !mysqli_execute($stmt) )
		{
			$transaction=false;
			$errMsg='line 188,stmt error: '.mysqli_stmt_error($stmt);
		}
	mysqli_stmt_close($stmt);
}
}

if ($transaction)
	{
		mysqli_commit($con);
		// echo "Transaction Successful";
		$returnMessage['message']="Successful";
	}
	else
	{
		mysqli_rollback($con);
		// echo "Transaction Failed";
		$returnMessage['message']=$errMsg;
	}

	mysqli_close($con);
	echo json_encode($returnMessage);

}



function deletePosition()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	// mysqli_autocommit($con, FALSE);
	$transaction=true;
	$errMsg="";
	$sql="DELETE FROM jobopening WHERE `jobopening_pk`=?";

	$stmt = mysqli_prepare($con,$sql);
	if ( !$stmt ) 
	{
		$transaction=false;
	  	$errMsg='mysqli error: '.mysqli_error($con);
	}
	mysqli_stmt_bind_param($stmt, "s", $_POST['data']);

		if ( !mysqli_execute($stmt) )
		{
			$transaction=false;
			$errMsg='stmt error: '.mysqli_stmt_error($stmt);
		}

	mysqli_stmt_close($stmt);

	if($transaction)
	{
		echo "Successful";
	}
	else
	{
		echo $errMsg;
	}

	mysqli_close($con);


}