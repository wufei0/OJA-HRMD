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

switch ($_POST['module']) 
{
	case 'applicationList':
		applicationList();
		break;

	case 'RenderschedInterview':
		RenderschedInterview();
		break;

	default:
		echo "Module is Null.";
		die();
		break;

}


function applicationList()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);
	$sql="SELECT application_pk, lname, fname, mname, position, itemno,`m_department`.`description` AS department,`application`.`dateapplied` AS appTransdate FROM jobopening JOIN application on jobopening.jobopening_pk = application.jobopening_fk JOIN security_user ON application.securityuser_fk = security_user.email JOIN m_department ON jobopening.department_fk = m_department.department_pk WHERE `application`.`status`='P'  ORDER BY position ASC";
	$query=$con->query($sql);
	$resultArray=array();
	while ($result=$query->fetch_array(MYSQLI_ASSOC))
	{
		$applicationdetail=getLastApplicationActivity($result['application_pk']);
		array_push($resultArray,array("ApplicationNo"=>$result['application_pk'],"position"=>$result['position'],"department"=>$result['department'],"dateApply"=>date("M d,Y",strtotime($result['appTransdate'])),"itemNo"=>$result['itemno'],"Applicant"=>$result['lname'].", ".$result['fname'],"dateUpdated"=>$applicationdetail['dateUpdated'],"remark"=>$applicationdetail['remark']));
		// echo "<option value='".$result['department_pk']."' >".$result['description']."</option>";
	}
	$query->close();
	$con->close();
	echo json_encode($resultArray);
}

function getLastApplicationActivity($application_id)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT detail, transdate FROM applicationdetail WHERE application_fk = '".$application_id."' ORDER BY transdate ASC";
	$query=$con->query($sql);
	$remark=null;
	$dateUpdated=null;
	while($result=$query->fetch_array(MYSQLI_ASSOC))
	{
	//$applicantDetail=array("dateUpdated"=>$result['transdate'],"remark"=>$result['detail']);
		$remark=$remark . $result['detail']."<br>";
		$dateUpdated=$dateUpdated . $result['transdate']."<br>";
	}
	$query->close();
	$con->close();
	$applicantDetail=array("dateUpdated"=>$dateUpdated,"remark"=>$remark);
	return $applicantDetail;
}

function RenderschedInterview()
{
	echo '

			<div class="row">
				<div class="form-group">
					<label class="col-sm-2 control-label align-right" style="top:5px; text-align:right;">Exam Date</label>
					<div class="icon-addon addon-md col-sm-10">
			            <input type="date" placeholder="interview date" class="form-control" id="dateOfInterview" required>
			            <label for="email" class="fa fa-calendar" rel="tooltip" title="email" style="left:22px;"></label>
			        </div>
				</div>
				<br/>
				<div class="form-group">
					<label class="col-sm-2 control-label" style="top:5px; text-align:right;">Time</label>
					<div class="icon-addon addon-md col-sm-10">
			            <input id="timeOfInterview" type="text" class="form-control input-md" placeholder="time" required>
						<label for="email" class="fa fa-clock-o" rel="tooltip" title="email" style="left:22px;"></label>
			        </div>
				</div>
				<br/>
				
			</div>
				<button id="btnSchedule" class="btn btn-primary btn-md btn-block pull-right" name="login" style="width:90px;" >Schedule</button>
				<div class="tclear"></div>
			
	

		


		';
}



?>