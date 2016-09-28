<?php 
	require_once('essential/session.php');
	require_once('essential/connection.php');
	require_once('essential/errorDescription.php');
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
	
    <!-- Latest compiled and minified CSS -->
	<link href="css/bootstrap.css" rel="stylesheet"/>

	
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-table.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.feedBackBox.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />
	
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.css" /> -->

	<!-- Optional theme -->
	
	
	<!-- edit style css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />

	<!-- Latest compiled and minified JavaScript -->

 </head>
<body>
<!------------------------------------------------------------- header ------------------------------------------------------------>
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

				<div id="navHeader" class="collapse navbar-collapse">
					<?php
						require_once('essential/navigation.php');
					?>
				</div>
			</div>
		  </div>
	  </div>
    </div>
    
</header>
<!------------------------------------------------------------- end header ------------------------------------------------------------>


<!------------------------------------------------------------- content ------------------------------------------------------------>
<div class="container content">
	<div class="row">
	<!-- col-md-12 -->
	<!-- breadcrumb -->
			<div id="div-breadcrumb" class="col-md-12">
				<?php
					require_once('essential/breadcrumb.php');
					Bpds();
				?>
			</div>
	<!-- end breadcrumb -->
	<!-- end col-md-12 -->
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card bg-main">

				<ul class="nav nav-tabs" role="tablist" style="font-size:11px;">
					<li id="personalInfo" class="active" role="presentation"><a href="#personalinfos" aria-controls="profile" role="tab" data-toggle="tab">I. Personal Information</a></li>
					<li id="familyBackground" role="presentation"><a href="#familybg" aria-controls="home" role="tab" data-toggle="tab">II. Family Background</a></li>
					<li id="educBackground" role="presentation"><a href="#educationalbg" aria-controls="EDhome" role="tab" data-toggle="tab">III. Educational Background</a></li>
					<li id="csctab"  role="presentation"><a href="#csc" aria-controls="messages" role="tab" data-toggle="tab">IV. Civil Service</a></li>
					<li id="workExperTab" role="presentation"><a href="#workexper" aria-controls="messages" role="tab" data-toggle="tab">V. Work Experience</a></li>
					<li id="voluntaryTab" role="presentation"><a href="#voluntary" aria-controls="messages" role="tab" data-toggle="tab">VI. Voluntary Work</a></li>
					<li id="trainingTab" role="presentation"><a href="#training" aria-controls="messages" role="tab" data-toggle="tab">VII. Training</a></li>
					<li id="panelotherTab" role="presentation"><a href="#panelOthers" aria-controls="messages" role="tab" data-toggle="tab">VIII. Others</a></li>
				</ul>

				<div class="tab-content">
							<div id="personalinfos" class="tab-pane fade in active">

								<div class="row">
									
									<div class="col-sm-12">
										
										<div class="row">
											<div class="col-sm-12">
												<h4>I. Personal Information</h4>
												<hr>
											</div>

											<div class="col-sm-3 form-group">
												<label>Surename</label>
												<input id="EmpLName" type="text" placeholder="Surename" class="form-control" required>
											</div>
											
											<div class="col-sm-3 form-group">
												<label>Firstname</label>
												<input id="EmpFName" type="text" placeholder="Firstname" class="form-control" required>
											</div>
											
											<div class="col-sm-3 form-group">
												<label>Middlename</label>
												<input id="EmpMName" type="text" placeholder="Middlename" class="form-control" required>
											</div>
											
											<div class="col-sm-3 form-group">
												<label>Name Extension (e.g. Jr., Sr.)</label>
												<input id="EmpExtName" type="text" placeholder="(e.g. Jr., Sr.)" class="form-control" required>
											</div>
				 
										</div>
								
								
										<div class="row">
											<div class="col-sm-3 form-group">
												<label>Date of Birth (mm/dd/yyyy)</label>
												<div id="datetimepicker4" class="input-append">
													<input id="EmpBday" class="form-control" data-format="MM/dd/yyyy" type="date" required>
													<span class="add-on">
													  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
													  </i>
													</span>
												</div>
											</div>	
											<div class="col-sm-3 form-group">
												<label>Place of Birth</label>
												<input id = "EmpBirthPlace"  type="text" placeholder="Place of Birth" class="form-control" required>
												
											</div>	
											<div class="col-sm-2 form-group">
												<label>Sex</label>
												<select id="EmpSex" class="selectpicker form-control" required>
		                                              <option value="MALE" required>MALE</option>
		                                              <option value="FEMALE" required>FEMALE</option>
												</select>
											</div>	
											<div class="col-sm-2 form-group">
												<label>Civil Status</label>
												<select id="EmpCivilStatus" class="selectpicker form-control" required>
												  <option value="SINGLE" required>SINGLE</option>
	                                              <option value="MARROED" required>MARRIED</option>
	                                              <option value="ANNULED" required>ANNULED</option>
	                                               <option value="WIDOWED" required>WIDOWED</option>
	                                                <option value="SEPARATED" required>SEPARATED</option>
												</select>
											</div>
											<div class="col-sm-2 form-group">
												<label>Citizenship</label>											
												<input id="EmpCitizenship" type="text" placeholder="Citizenship" class="form-control" required>
											</div>
										</div>
										
										<div class="row">	
											<div class="col-sm-1 form-group">
												<label>Height <small>(m)</small></label>
												<input id="EmpHeight" type="text" placeholder="Height (m)" class="form-control" required>
												
											</div>	
											<div class="col-sm-1 form-group">
												<label>Weight <small>(kg)</small></label>
												<input id="EmpWeight" type="text" placeholder="Weight (kg)" class="form-control" required>
											</div>	
											<div class="col-sm-2 form-group">
												<label>Blood Type</label>
												<input id="EmpBloodType" type="text" placeholder="Blood Type" class="form-control" maxlength="2" required>
											</div>
											<div class="col-sm-2 form-group">
												<label>GSIS ID No.</label>
												<input id="EmpGSIS" type="text" placeholder="ID No." class="form-control" required>
											</div>
											<div class="col-sm-2 form-group">
												<label>PAG-IBIG ID No.</label>
												<input id="EmpHDMF" type="text" placeholder="ID No." class="form-control" required>
											</div>
											<div class="col-sm-2 form-group">
												<label>PhilHealth No.</label>
												<input id="EmpPH" type="text" placeholder="PhilHealth No." class="form-control" required>
											</div>
											<div class="col-sm-2 form-group">
												<label>SSS No.</label>
												<input id="EmpSSS" type="text" placeholder="SSS No." class="form-control" required>
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-3 form-group">
												<label><strong style="color:#940101;">Residential Address</strong> Province</label>
												<select id='EmpResAddProv' class="selectpicker form-control" data-live-search="true" required>
                                                <?php
                                                    $sql="SELECT province_pk, province from m_province order by province";
                                                    $myQuery=mysqli_query($con,$sql);
                                                    while($myResult = mysqli_fetch_array($myQuery))
                                                    {
                                                        echo "<option value='".$myResult['province_pk']."' required>".strtoupper($myResult['province'])."</option>";
                                                    }
                                                ?>
												</select>
											</div>	
											<div class="col-sm-3 form-group">
												<label>Municipality</label>
												<select id='EmpResAddMun' class="selectpicker form-control" data-live-search="true" required>
												  
												</select>
											</div>	
											<div class="col-sm-3 form-group">
												<label>Barangay</label>
												<select id='EmpResAddBrgy' class="selectpicker form-control" data-live-search="true" required>
												  
												</select>
											</div>
											<div class="col-sm-1 form-group">
												<label>ZIP Code</label>
												<input id='EmpResZipCode' type="number" placeholder="Code" class="form-control" required>
											</div>
											<div class="col-sm-2 form-group">
												<label>Telephone No.</label>
												<input id='EmpResTel' type="text" placeholder="Tel. No." class="form-control" required>
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-3 form-group">
												<label><strong style="color:#940101;">Permanent Address</strong> Province</label>
												<select id='EmpPerAddProv' class="selectpicker form-control" data-live-search="true" required>
												  <?php
                                                    $sql="SELECT province_pk, province from m_province order by province";
                                                    $myQuery=mysqli_query($con,$sql);
                                                    while($myResult = mysqli_fetch_array($myQuery))
                                                    {
                                                        echo "<option value='".$myResult['province_pk']."' >".$myResult['province']."</option>";
                                                    }
                                                ?>
												</select>
											</div>	
											<div class="col-sm-3 form-group">
												<label>Municipality</label>
												<select id='EmpPerAddMun' class="selectpicker form-control" data-live-search="true" required>
							
												</select>
											</div>	
											<div class="col-sm-3 form-group">
												<label>Barangay</label>
												<select id='EmpPerAddBrgy' class="selectpicker form-control" data-live-search="true" required>
									
												</select>
											</div>
											<div class="col-sm-1 form-group">
												<label>ZIP Code</label>
												<input id='EmpPerZipCode' type="number" placeholder="Code" class="form-control" required>
											</div>
											<div class="col-sm-2 form-group">
												<label>Telephone No.</label>
												<input id='EmpPerTel' type="text" placeholder="Tel. No." class="form-control" required>
											</div>
										</div>
										
										<div class="row">
											
											<div class="col-sm-3 form-group">
												<label>Email Address</label>
												<input id='EmpEMail' type="email" id="loginTxtUsername" placeholder="Email Address Here.." class="form-control" required>

											</div>
											
											<div class="col-sm-3 form-group">
												<label>Cellphone No.</label>
												<input id='EmpMobile' type="text" placeholder="Phone Number Here.." class="form-control" required>
											</div>
											<div class="col-sm-3 form-group">
												<label>Agency Employee No.</label>
												<input id='EmpAgencyNo' type="text" placeholder="Employee No. Here.." class="form-control" required>
											</div>
											<div class="col-sm-3 form-group">
												<label>TIN</label>
												<input id='EmpTIN' type="text" placeholder="TIN Here.." class="form-control" required>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6 form-group">
												
											</div>
											<div class="col-sm-6 form-group">
												<!--<button class="btn btn-primary pull-right tblBottom" onClick="save();">Saves</button>-->
												<a href="#familybg" class="pull-right btn btn-primary" aria-controls="home" role="tab" data-toggle="tab" onclick="save();">Next</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>

							<div id="familybg" class="tab-pane fade">
								
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-12 form-group">
												<h4>II. Family Background</h4>
												<hr>
											</div>

										</div>
										<!-- group family -->
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>Spouse's Lastname</label>
												<input id="EmpSpsLName" type="text" placeholder="Lastname..." class="form-control" required>
											</div>
											<div class="col-sm-4 form-group">
												<label>Firstname</label>
												<input id="EmpSpsFName" type="text" placeholder="Firstname..." class="form-control" required>
											</div>
											<div class="col-sm-4 form-group">
												<label>Middlename</label>
												<input id="EmpSpsMName" type="text" placeholder="Middlename..." class="form-control" required>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-3 form-group">
												<label>Occupation</label>
												<input id="EmpSpsJob" type="text" placeholder="Occupation..." class="form-control" required>
											</div>
											<div class="col-sm-3 form-group">
												<label>Employer/Bus. Name</label>
												<input id="EmpSpsBusDesc" type="text" placeholder="Employer/Bus. Name..." class="form-control" required>
											</div>
											<div class="col-sm-3 form-group">
												<label>Business Address</label>
												<input id="EmpBusAdd" type="text" placeholder="Business Address..." class="form-control" required>
											</div>
											<div class="col-sm-3 form-group">
												<label>Telephone No.</label>
												<input id="EmpSpsBusTel" type="text" placeholder="Tel. No..." class="form-control" required>
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-12">
												<div class="tableBG">
													<table id="fbtblChild" data-toggle="table"
												   	data-sort-name="no" class="table table-bordered">
														<thead>
															<tr>
																<th  data-visible="true" data-checkbox="true"></th>
																<th data-field="child_PK" data-visible="false">child_PK</th>
																<th class="text-center form-group" data-field="childFname" data-sortable="true"> Firstname </th>
																<th class="text-center form-group" data-field="childMname" data-sortable="true"> Middlename </th>
																<th class="text-center form-group" data-field="childLname" data-sortable="true"> Lastname </th>
																<th class="text-center  form-group" data-field="childBirth" data-sortable="true">Date of Birth (mm/dd/yyyy)</th>
															</tr>
														</thead>
													</table>
													<div class="row">
														<div class="col-sm-3 form-group">
															<label>First Name</label>
															<input id="DpntFName" data-ignore=1 type="text" placeholder="First Name..." class="form-control child-dependent" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Middle Name</label>
															<input id="DpntMName" data-ignore=1 type="text" placeholder="Middle Name..." class="form-control child-dependent" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Last Name</label>
															<input id="DpntLName" data-ignore=1 type="text" placeholder="Last Name..." class="form-control child-dependent" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Birth Date</label>
															<input id="DpntBDay" data-ignore=1 type="date" placeholder="Birth Date..." class="form-control child-dependent" required>
														</div>
													</div>

													<button id="fbbtnDelChild" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
													<button id="fbbtnAddChild" class="btn btn-success pull-right tblBottom">Add</button>
													<div class="tclear"></div>

												</div>
											</div>
										</div>

									<!-- 	<div class="row">
											<div class="col-sm-12 form-group">
												<label><font style="color:#940101;">(Continue on separate sheet if necessary)</font></label>
											</div>
										</div> -->
										
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>Father's Lastname</label>
												<input id="EmpFatherLName" type="text" placeholder="Father's Surename..." class="form-control" required>
											</div>
											<div class="col-sm-4 form-group">
												<label>Firstname</label>
												<input id="EmpFatherFName" type="text" placeholder="Firstname..." class="form-control" required>
											</div>
											<div class="col-sm-4 form-group">
												<label>Middlename</label>
												<input id="EmpFatherMName" type="text" placeholder="Middlename..." class="form-control" required>
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>Mother's Maidenname</label>
												<input id="EmpMotherLName" type="text" placeholder="Mother's Maidenname..." class="form-control" required>
											</div>
											<div class="col-sm-4 form-group">
												<label>Firstname</label>
												<input id="EmpMotherFName" type="text" placeholder="Firstname..." class="form-control" required>
											</div>
											<div class="col-sm-4 form-group">
												<label>Middlename</label>
												<input id="EmpMotherMName" type="text" placeholder="Middlename..." class="form-control" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												
											</div>
											<div class="col-md-6 form-group">
												<!--<button class="btn btn-primary pull-right tblBottom" onClick="saveFamB();">Saves</button>-->
												<a href="#educationalbg" class="pull-right btn btn-primary" aria-controls="educationBg" role="tab" data-toggle="tab" onclick="saveFamB();">Next</a>
										
											</div>
										</div>
									</div>
								</div>

									
							</div>

							<div id="educationalbg" class="tab-pane fade">
								<div class="row">
								
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-12 form-group">
												<h4>III. Educational Background</h4>
												<hr>
											</div>

										</div>
										<!-- group Educational -->
										<div class="row">
											<div class="col-sm-12">
												<div class="tableBG">
													<table id="tblEducation" data-toggle="table"
												   	data-sort-name="no" class="table table-bordered">
														<thead>
															<tr>
																<th  data-visible="true" data-checkbox="true"></th>
																<th class="text-center col-sm-1 form-group" data-field="EducLvlID" data-visible="false" data-sortable="false">Level</th>
																<th class="text-center col-sm-1 form-group" data-field="No" data-visible="false">No</th>
																<th class="text-center col-sm-3 form-group" data-field="EducLevel" data-sortable="true">Level</th>
																<th class="text-center col-sm-3 form-group" data-field="EducSchoolName" data-sortable="true">Name of School</th>
																<th class="text-center col-sm-2 form-group" data-field="EducCourse" data-sortable="true">Degree Course</th>
																<th class="text-center col-sm-1 form-group" data-field="EducYrGrad" data-sortable="true">Year Graduated</th>
																<th class="text-center col-sm-1 form-group" data-field="EducGradeLvlUnits" data-sortable="true">Highest Grade</th>
																<th class="text-center col-sm-1 form-group" data-field="EducIncAttDateFromDate" data-sortable="true">Inclusive Dates of Attendance From</th>
																<th class="text-center col-sm-1 form-group" data-field="EducIncAttDateToDate" data-sortable="true">Inclusive Dates of Attendance To</th>
																<th class="text-center col-sm-2 form-group" data-field="EducAwards" data-sortable="true">Scholarship</th>
															</tr>
														</thead>
														
														<!-- group elementary -->
														
													</table>

													<div class="row">
													
														<div class="col-sm-2 form-group">
															<label>Level</label>
															<select id="EducLvlID" class="selectpicker form-control" required>
															<?php
			                                                    $sql="SELECT EducLvlDesc, EducLvlID from m_educlevels order by EducLvlDesc";
			                                                    $myQuery=mysqli_query($con,$sql);
			                                                    while($myResult = mysqli_fetch_array($myQuery))
			                                                    {
			                                                        echo "<option value='".$myResult['EducLvlID']."' required>".$myResult['EducLvlDesc']."</option>";
			                                                    }
			                                                ?>
																
															</select>
															
														</div>

														<div class="col-sm-3 form-group">
															<label>Name of School</label>
															<input id="EducSchoolName" type="text" placeholder="School..." class="form-control educInput" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Degree Course</label>
															<input id="EducCourse" type="text" placeholder="Course..." class="form-control educInput" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Year Graduated</label>
															<input id="EducYrGrad" type="number" placeholder="Year..." class="form-control educInput" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Highest Grd/Lvl Units Earned</label>
															<input id="EducGradeLvlUnits"  placeholder="Grade..." class="form-control educInput" required>
														</div>
														
													</div>
													<div class="row">

														<div class="col-sm-3 form-group">
															<label>Inclusive Dates of Attendance (From)</label>
															<input id="EducIncAttDateFromDate" type="date" placeholder="From..." class="form-control educInput" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Inclusive Dates of Attendance (To)</label>
															<input id="EducIncAttDateToDate" type="date" placeholder="To..." class="form-control educInput" required>
														</div>
														<div class="col-sm-6 form-group">
															<label>Scholarship/Academic Honors Received</label>
															<input id="EducAwards" type="text" placeholder="Scholarship..." class="form-control educInput" required>
														</div>
													</div>

													<button id="btnDelEducBackground" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
													<button id="btnAddEducBackground" class="btn btn-success pull-right tblBottom">Add</button>
													<div class="tclear"></div>
												</div>
												<div class="row" style="margin-top:8px;">
													<div class="col-md-6 form-group">
														
													</div>
													<div class="col-md-6 form-group">
														<!--<button class="btn btn-primary pull-right tblBottom" onClick="updateEduc();">Saves</button>
														<div class="tclear"></div>-->
														<a href="#csc" class="pull-right btn btn-primary" aria-controls="cscbg" role="tab" data-toggle="tab" onclick="updateEduc();">Next</a>
													</div>
												</div>
											</div>
										</div>
										
										
									</div>

								</div>
							</div>

							<div id="csc" class="tab-pane fade">
					
								<div class="row">
									
									<div class="col-sm-12">
										<div class="row">
											
											<div class="col-sm-12 form-group">
												<h4>IV. Civil Service Eligibility</h4>
												<hr>
											</div>
				 
										</div>
										
										<div class="row">
											<div class="col-sm-12">
												<div class="tableBG">
													<table id="tblEligibility" data-toggle="table"
												   	data-sort-name="no" class="table table-bordered">
														<thead>
															<tr>
																<th  data-visible="true" data-checkbox="true"></th>
																<th class="text-center col-sm-1 form-group" data-field="No" data-visible="false">No</th>
																<th class="text-center col-sm-3 form-group" data-field="CSEDesc" data-sortable="false">Career Service / RA 1080</th>
																<th class="text-center col-sm-1 form-group" data-field="CSERating" data-sortable="true">Rating</th>
																<th class="text-center col-sm-1 form-group" data-field="CSEExamDate" data-sortable="true">Date of Examination</th>
																<th class="text-center col-sm-3 form-group" data-field="CSEExamPlace" data-sortable="true">Place of Examination</th>
																<th class="text-center col-sm-2 form-group" data-field="CSELicNum" data-sortable="true">License Number</th>
																<th class="text-center col-sm-2 form-group" data-field="CSELicReleaseDate" data-sortable="true">Date of Release</th>
															</tr>
														</thead>
															
															<!-- group csc -->
													</table>

													<div class="row">
														<div class="col-sm-3 form-group">
															<label>Career Service / RA 1080</label>
															<input id="CSEDesc" type="text" placeholder="Career Service..." class="form-control eligibilityInput" required>
														</div>
														<div class="col-sm-1 form-group">
															<label>Rating</label>
															<input id="CSERating" type="text" placeholder="Rating..." class="form-control eligibilityInput" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Date of Examination</label>
															<input id="CSEExamDate" type="date" placeholder="Date..." class="form-control eligibilityInput" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Place of Examination</label>
															<input id="CSEExamPlace" type="text" placeholder="Place..." class="form-control eligibilityInput" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>License Number</label>
															<input id="CSELicNum" type="text" placeholder="Number..." class="form-control eligibilityInput" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Date of Release</label>
															<input id="CSELicReleaseDate" type="date" placeholder="Release..." class="form-control eligibilityInput" required>
														</div>
													</div>

														<button id="btnDelCsc" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
														<button id="btnAddCsc" class="btn btn-success pull-right tblBottom">Add</button>
														<div class="tclear"></div>
												</div>
												<div class="row" style="margin-top: 8px;">
													<div class="col-md-6 form-group">
														
													</div>
													<div class="col-md-6 form-group">
														<!--<button onclick="updateEligibility();" class="btn btn-primary pull-right tblBottom">Add</button>
														<div class="tclear"></div>-->
														<a href="#workexper" class="pull-right btn btn-primary" aria-controls="workexperbg" role="tab" data-toggle="tab" onclick="updateEligibility();">Next</a>
													</div>
												</div>
											</div>
										</div>
											
									</div>

								</div>
							</div>
							
							<div id="workexper" class="tab-pane fade">
								
								<div class="row">
									
									<div class="col-sm-12">
										<div class="row">
											
											<div class="col-sm-12 form-group">
												<h4>V. Work Experience</h4>
												<hr>
											</div>
										
										</div>

										<!-- group Work Experience -->
										<div class="row">
											<div class="col-sm-12">
												<div class="tableBG">
													<table id="tblWorkExp" data-toggle="table"
												   	data-sort-name="no" class="table table-bordered">
														<thead>
															<tr>
																<th  data-visible="true" data-checkbox="true"></th>
																<th class="text-center col-sm-1 form-group" data-field="No" data-visible="false">No</th>
																<th class="text-center col-sm-1 form-group" data-field="WExpFromDate" data-sortable="false">Inclusive Dates (mm/dd/yyyy) From</th>
																<th class="text-center col-sm-1 form-group" data-field="WExpToDate" data-sortable="true">Inclusive Dates (mm/dd/yyyy) To</th>
																<th class="text-center col-sm-2 form-group" data-field="WExpPosition" data-sortable="true">Position Title</th>
																<th class="text-center col-sm-3 form-group" data-field="WExpEmployer" data-sortable="true">Department / Agency / Office / Company</th>
																<th class="text-center col-sm-1 form-group" data-field="WExpSalary" data-sortable="true">Monthly Salary</th>
																<th class="text-center col-sm-1 form-group" data-field="SalGrdID" data-sortable="true">Salary Grade</th>
																<th class="text-center col-sm-2 form-group" data-field="AppStID" data-sortable="true">Status of Appointment</th>
																<th class="text-center col-sm-1 form-group" data-field="WExpIsGov" data-sortable="true">Gov't Service</th>
																<th class="text-center col-sm-1 form-group" data-field="ApptStDesc" data-sortable="true">ApptStDesc</th>
															</tr>
														</thead>
														<!-- group work experience -->
																											
													</table>

													<div class="row">
														<div class="col-sm-3 form-group">
															<label>Inclusive Dates From</label>
															<input id="WExpFromDate" type="date" placeholder="From..." class="form-control inputExperience" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Inclusive Dates To</label>
															<input id="WExpToDate" type="date" placeholder="To..." class="form-control inputExperience" required>
														</div>
														<div class="col-sm-6 form-group">
															<label>Position Title</label>
															<input id="WExpPosition" type="text" placeholder="Title..." class="form-control inputExperience" required>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-4 form-group">
															<label>Department / Agency / Office / Company</label>
															<input id="WExpEmployer" type="text" placeholder="Department..." class="form-control inputExperience" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Monthly Salary</label>
															<input id="WExpSalary" type="text" placeholder="Salary..." class="form-control inputExperience" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Salary Grade</label>
															<input id="SalGrdID" type="text" placeholder="Salary Grade..." class="form-control inputExperience" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Status of Appointment</label>
															<select id="AppStID" class="selectpicker form-control" required>
															<?php
			                                                    $sql="SELECT ApptStID, ApptStDesc from m_apptstatus order by ApptStDesc";
			                                                    $myQuery=mysqli_query($con,$sql);
			                                                    while($myResult = mysqli_fetch_array($myQuery))
			                                                    {
			                                                        echo "<option value='".$myResult['ApptStID']."' >".$myResult['ApptStDesc']."</option>";
			                                                    }
			                                                ?>
																
															</select>
														</div>
														<div class="col-sm-2 form-group">
															<label>Gov't Service</label>
															<select id="WExpIsGov" class="selectpicker form-control" required>
																<option value='YES' >YES</option>
																<option value='NO' >NO</option>
															</select>
														</div>
													</div>

													<button id="btnDelWorkExp" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
													<button id="btnAddWorkExp" class="btn btn-success pull-right tblBottom">Add</button>
													<div class="tclear"></div>
												</div>
												<div class="row" style="margin-top:8px;">
													<div class="col-md-6 form-group">
														
													</div>
													<div class="col-md-6 form-group">
														<!--<button onclick="updateWorkExp();" class="btn btn-primary pull-right tblBottom">Add</button>
														<div class="tclear"></div>-->
														<a href="#voluntary" class="pull-right btn btn-primary" aria-controls="voluntarybg" role="tab" data-toggle="tab" onclick="updateWorkExp();">Next</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>

								</div>
								
							</div>
							
							<div id="voluntary" class="tab-pane fade">
								
								<div class="row">
									
									<div class="col-sm-12">
										<div class="row">
											
											<div class="col-sm-12 form-group">
												<h4>VI. Voluntary Work</h4>
												<hr>
											</div>
										
										</div>

										<!-- group Voluntary Work -->
										<div class="row">
											<div class="col-sm-12">
												<div class="tableBG">
													<table id="tblVolWork" data-toggle="table"
												   	data-sort-name="no" class="table table-bordered">
														<thead>
															<tr>
																<th  data-visible="true" data-checkbox="true"></th>
																<th class="text-center col-sm-1 form-group" data-field="No" data-visible="false">No</th>
																<th class="text-center col-sm-3 form-group" data-field="VolOrgName" data-sortable="false">Name of Organization</th>
																<th class="text-center col-sm-3 form-group" data-field="VolOrgAddSt" data-sortable="false">Address of Organization</th>
																<th class="text-center col-sm-1 form-group" data-field="VolOrgFromDate" data-sortable="true">Inclusive Date From</th>
																<th class="text-center col-sm-1 form-group" data-field="VolOrgToDate" data-sortable="true">Inclusive Date To</th>
																<th class="text-center col-sm-2 form-group" data-field="VolOrgHours" data-sortable="true">Number of Hours</th>
																<th class="text-center col-sm-2 form-group" data-field="VolOrgDetails" data-sortable="true">Position / Nature of Work</th>
															</tr>
														</thead>
														<!-- group work voluntary -->
														
													</table>

													<div class="row">
														<div class="col-sm-6 form-group">
															<label>Name of Organization</label>
															<input id="VolOrgName" type="text" placeholder="Name..." class="form-control inputVolOrg" required>
														</div>
														<div class="col-sm-6 form-group">
															<label>Address of Organization</label>
															<input id="VolOrgAddSt" type="text" placeholder="Address..." class="form-control inputVolOrg" required>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-2 form-group">
															<label>Inclusive Dates From</label>
															<input id="VolOrgFromDate" type="date" placeholder="From..." class="form-control inputVolOrg" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Inclusive Dates To</label>
															<input id="VolOrgToDate" type="date" placeholder="To..." class="form-control inputVolOrg" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Number of Hours</label>
															<input id="VolOrgHours" type="number" placeholder="Hours..." class="form-control inputVolOrg" required>
														</div>
														<div class="col-sm-5 form-group">
															<label>Position / Nature of Work</label>
															<input id="VolOrgDetails" type="text" placeholder="Position..." class="form-control inputVolOrg" required>
														</div>
													</div>

													<button id="btnDelVolOrg" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
													<button id="btnAddVolOrg" class="btn btn-success pull-right tblBottom">Add</button>
													<div class="tclear"></div>
												</div>
												<div class="row" style="margin-top:8px;">
													<div class="col-md-6 form-group">
														
													</div>
													<div class="col-md-6 form-group">
														<!--<button onclick="updateVolOrg();" class="btn btn-primary pull-right tblBottom">Add</button>
														<div class="tclear"></div>-->
														<a href="#training" class="pull-right btn btn-primary" aria-controls="volorgbg" role="tab" data-toggle="tab" onclick="updateVolOrg();">Next</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
									
								</div>

							</div>
							
							<div id="training" class="tab-pane fade">
								
								<div class="row">
									
									<div class="col-sm-12">
										<div class="row">
											
											<div class="col-sm-12 form-group">
												<h4>VII. Training Programs</h4>
												<hr>
											</div>
										
										</div>

										<!-- group Voluntary Work -->
										<div class="row">
											<div class="col-sm-12">
												<div class="tableBG">
													<table id="tblSeminar" data-toggle="table"
												   	data-sort-name="no" class="table table-bordered">
														<thead>
															<tr>
																<th  data-visible="true" data-checkbox="true"></th>
																<th class="text-center col-sm-1 form-group" data-field="No" data-visible="false">No</th>
																<th class="text-center col-sm
																<th class="text-center col-sm-5 form-group" data-field="TrainDesc" data-sortable="false">Title of Seminar</th>
																<th class="text-center col-sm-1 form-group" data-field="TrainFromDate" data-sortable="true">Inclusive Date of Attendance From</th>
																<th class="text-center col-sm-1 form-group" data-field="TrainToDate" data-sortable="true">Inclusive Date of Attendance To</th>
																<th class="text-center col-sm-2 form-group" data-field="TrainHours" data-sortable="true">Number of Hours</th>
																<th class="text-center col-sm-3 form-group" data-field="TrainSponsor" data-sortable="true">Conducted / Sponsored By</th>
															</tr>
														</thead>
														<!-- group work voluntary -->
														
													</table>

													<div class="row">
														<div class="col-sm-3 form-group">
															<label>Title of Seminar</label>
															<input id="TrainDesc" type="text" placeholder="Seminar..." class="form-control inputTraining" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Inclusive Dates From</label>
															<input  id="TrainFromDate" type="date" placeholder="From..." class="form-control inputTraining" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Inclusive Dates To</label>
															<input id="TrainToDate" type="date" placeholder="To..." class="form-control inputTraining" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Number of Hours</label>
															<input id="TrainHours" type="number" placeholder="Hours..." class="form-control inputTraining" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Conducted / Sponsored By</label>
															<input id="TrainSponsor" type="text" placeholder="Sponsored..." class="form-control inputTraining" required>
														</div>
													</div>

													<button id="btnDelTraining" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
													<button id="btnAddTraining" class="btn btn-success pull-right tblBottom">Add</button>
													<div class="tclear"></div>
												</div>
												<div class="row" style="margin-top: 8px;">
													<div class="col-md-6 form-group">
														
													</div>
													<div class="col-md-6 form-group">
														<!--<button onclick="updateTraining();" class="btn btn-primary pull-right tblBottom">Add</button>
														<div class="tclear"></div>-->
														<a href="#panelOthers" class="pull-right btn btn-primary" aria-controls="trainingbg" role="tab" data-toggle="tab" onclick="updateTraining();">Next</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>

								</div>
								
							</div>
							
							<div id="panelOthers" class="tab-pane fade">
								
								<div class="row">
									
									<div class="col-sm-12">
										<div class="row">
											
											<div class="col-sm-12 form-group">
												<h4>VIII. Other Information</h4>
												<hr>
											</div>
										
										</div>	

										<!-- group other -->
										<div id="others" class="row">
											<div class="col-sm-12">
												<div class="tableBG">
													<div class="row">
														<div class="col-md-4 form-group">
															<label>33. Special Skills / Hobbies</label>
															<table id="tblSkill" data-toggle="table" data-height="150"
														   	data-sort-name="no" class="table table-bordered">
																<thead>
																	<tr>

																<th  data-visible="true" data-checkbox="true"></th>
																		<th class="text-center" data-field="SkillDesc" data-sortable="false">Special Skills / Hobbies</th>
																		
																	</tr>
																</thead>
																<!-- group work voluntary -->
															</table>

															<div class="row">
																<div class="col-md-12 form-group">
																	<label></label>
																	<input id="SkillDesc" data-ignore=1 type="text" placeholder="Special Skills / Hobbies..." class="form-control" required>
																</div>
															</div>
															<button id="btnDelSkill" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
															<button id="btnAddSkill" class="btn btn-success pull-right tblBottom">Add</button>
															<div class="tclear"></div>
														</div>

														<div class="col-md-4 form-group">
															<label>34. Non-Academic Distinctions / Recognition</label>
															<table id="tblRecognition" data-toggle="table" data-height="150"
														   	data-sort-name="no" class="table table-bordered">
																<thead>
																	<tr>
																		<th  data-visible="true" data-checkbox="true"></th>
																		<th class="text-center" data-field="NonAcadRecDetails" data-sortable="true">Non-Academic Distinctions / Recognition</th>
																		
																	</tr>
																</thead>
																<!-- group work voluntary -->
															</table>

															<div class="row">
																<div class="col-sm-12 form-group">
																	<label></label>
																	<input id="NonAcadRecDetails" data-ignore=1 type="text" placeholder="Non-Academic Distinctions / Recognition..." class="form-control" required>
																</div>
															</div>
															<button id="btnDelRecognition" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
															<button id="btnAddRecognition" class="btn btn-success pull-right tblBottom">Add</button>
															<div class="tclear"></div>
														</div>

														<div class="col-md-4 form-group">
															<label>35. Membership in Association / Organization</label>
															<table id="tblMembership" data-toggle="table" data-height="150"
														   	data-sort-name="no" class="table table-bordered">
																<thead>
																	<tr>
																		<th data-visible="true" data-checkbox="true"></th>
																		<th class="text-center" data-field="MemAssOrgDesc" data-sortable="true">Membership in Association / Organization</th>
																		
																	</tr>
																</thead>
																<!-- group work voluntary -->
															</table>

															<div class="row">
																<div class="col-sm-12 form-group">
																	<label></label>
																	<input id="MemAssOrgDesc" data-ignore=1 type="text" placeholder="Membership in Association / Organization..." class="form-control" required>
																</div>
															</div>
															<button id="btnDelMembership" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
															<button id="btnAddMembership" class="btn btn-success pull-right tblBottom">Add</button>
															<div class="tclear"></div>
														</div>
													</div>

												</div>
											</div>
										</div>
										
										<div class="row">
											
											<div class="col-sm-12 form-group">
												<label>36. Are you related by consanguinity or affinity to any of the following:</label>
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-6 form-group">
												<label>a. Within the third degree (for National Government Employees): appointing authority, 
													recommending authority, chief of office/bureau/department or person who has immediate 
													supervision over you in the Office, Bureau or Department where you will be appointed?</label>
												
												<label class="radio-inline">
												  <input id="Q361" type="radio" name="thirddegree" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q361N" type="radio" name="thirddegree" value="NO" class="noAns"> No
												</label>
												
												<input id="A361" type="text" placeholder="If YES, give details:" class="form-control ans" >
											</div>
											
											<div class="col-sm-6 form-group">
												<label>b. Within the fourth degree (for Local Government Employees): apoointing authority or 
												recommending authority where you will be appointed</label>
												
												<label class="radio-inline">
												  <input id="Q362" type="radio" name="fourthdegree" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q362N" type="radio" name="fourthdegree" value="NO" class="noAns"> No
												</label>
												
												<input id="A362" type="text" placeholder="If YES, give details:" class="form-control ans" >
											</div>
											
										</div>
										
										<div class="row">
											<div class="col-sm-6 form-group">
												<label>37. a. Have you ever been formally charged?</label>
												
												<label class="radio-inline">
												  <input id="Q371" type="radio" name="formally" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q371N" type="radio" name="formally" value="NO" class="noAns"> No
												</label>
												
												<input id="A371" type="text" placeholder="If YES, give details:" class="form-control ans" >
											</div>
											
											<div class="col-sm-6 form-group">
												<label>b. Have you ever been guilty of any administrative offense?</label>
												
												<label class="radio-inline">
												  <input id="Q372" type="radio" name="guilty" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q372N" type="radio" name="guilty" value="NO" class="noAns"> No
												</label>
												
												<input id="A372" type="text" placeholder="If YES, give details:" class="form-control ans">
											</div>
											
										</div>
										
										<div class="row">
											<div class="col-sm-12 form-group">
												<label>38. Have you ever been convicted of any crime or vioiation of any law, decree, ordinance or regulation
												by any court or tribunal?</label>
												
												<label class="radio-inline">
												  <input id="Q380" type="radio" name="vioiation" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q380N" type="radio" name="vioiation" value="NO" class="noAns"> No
												</label>
												
												<input id="A380" type="text" placeholder="If YES, give details:" class="form-control ans">
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-12 form-group">
												<label>39. Have you ever been separated from the service in any of the following modes: resignation, 
												retirement, dropped from the rolls, disissal, termination, end of term, finished contract, AWOL or 
												phased out, in the public or private sector?</label>
												
												<label class="radio-inline">
												  <input id="Q390" type="radio" name="separated" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q390N" type="radio" name="separated" value="NO" class="noAns"> No
												</label>
												
												<input id="A390" type="text" placeholder="If YES, give details:" class="form-control ans">
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-12 form-group">
												<label>40. Have you ever been a candidate in a national or local election (except Barangay election)?</label>
												
												<label class="radio-inline">
												  <input id="Q400" type="radio" name="national" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q400N" type="radio" name="national" value="NO" class="noAns"> No
												</label>
												
												<input id="A400" type="text" placeholder="If YES, give details:" class="form-control ans">
											</div>
										</div>
										
										<div class="row">
											
											<div class="col-sm-12 form-group">
												<label>41. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 
												7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</label>
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>a. Are you a member of any indigenous group?</label>
												
												<label class="radio-inline">
												  <input id="Q411" type="radio" name="indigenous" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q411N" type="radio" name="indigenous" value="NO" class="noAns"> No
												</label>
												
												<input id="A411" type="text" placeholder="If YES, please specify:" class="form-control ans">
											</div>
											
											<div class="col-sm-4 form-group">
												<label>b. Are you differently abled?</label>
												
												<label class="radio-inline">
												  <input id="Q412" type="radio" name="differently" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q412N" type="radio" name="differently" value="NO" class="noAns"> No
												</label>
												
												<input id="A412" type="text" placeholder="If YES, please specify:" class="form-control ans">
											</div>
											
											<div class="col-sm-4 form-group">
												<label>c. Are you a solo parent?</label>
												
												<label class="radio-inline">
												  <input id="Q413" type="radio" name="soloparent" value="YES" checked class="questionRadio"> Yes
												</label>
												<label class="radio-inline">
												  <input id="Q413N" type="radio" name="soloparent" value="NO" class="noAns"> No
												</label>
												
												<input id="A413" type="text" placeholder="If YES, please specify:" class="form-control ans">
											</div>
											
										</div>
										
									</div>
									
									
									<div class="col-md-12">
										<div class="row">
											<div class="col-sm-12 form-group">
												<label>42. References</label>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="tableBG" style="margin-bottom: 8px;">
													<table id="tblReference" data-toggle="table"
												   	data-sort-name="no" class="table table-bordered" data-height="150">
														<thead>
															<tr>
																<th  data-visible="true" data-checkbox="true"></th>
																<th class="text-center col-sm-1 form-group" data-field="referencenNumber" data-visible="false">No</th>
																<th class="text-center col-sm-1 form-group" data-field="RefLName" data-sortable="false">Last Name</th>
																<th class="text-center col-sm-1 form-group" data-field="RefFName" data-sortable="false">First Name</th>
																<th class="text-center col-sm-1 form-group" data-field="RefMName" data-sortable="false">Middle Name</th>
																<th class="text-center col-sm-1 form-group" data-field="RefExtName" data-sortable="false">Name Extension</th>
																<th class="text-center col-sm-1 form-group" data-field="RefAddSt" data-sortable="true">Street</th>
																<th class="text-center col-sm-1 form-group" data-field="RefAddBrgy" data-sortable="true">Barangay</th>
																<th class="text-center col-sm-2 form-group" data-field="RefAddMun" data-sortable="true">Municipality</th>
																<th class="text-center col-sm-2 form-group" data-field="RefAddProv" data-sortable="true">Province</th>
																<th class="text-center col-sm-1 form-group" data-field="RefZipCode" data-sortable="true">Zip Code</th>
																<th class="text-center col-sm-1 form-group" data-field="RefTel" data-sortable="true">Contact Number</th>
															</tr>
														</thead>
														<!-- group References -->
													</table>

													<div class="row">
														<div class="col-sm-2 form-group">
															<label>Last Name</label>
															<input id="RefLName" data-ignore=1 type="text" placeholder="Last Name..." class="form-control inputReference" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>First Name</label>
															<input id="RefFName" data-ignore=1 type="text" placeholder="First Name..." class="form-control inputReference" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Middle Name</label>
															<input id="RefMName" data-ignore=1 type="text" placeholder="Middle Name..." class="form-control inputReference" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Name Extension</label>
															<input id="RefExtName" data-ignore=1 type="text" placeholder="Name Extension..." class="form-control inputReference" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Address Street</label>
															<input id="RefAddSt" data-ignore=1 type="text" placeholder="Street..." class="form-control inputReference" required>
														</div>
														<div class="col-sm-2 form-group">
															<label>Barangay</label>
															<input id="RefAddBrgy" data-ignore=1 type="text" placeholder="Barangay..." class="form-control inputReference" required>
														</div>
													</div>

													<div class="row">
														<div class="col-sm-3 form-group">
															<label>Municipality</label>
															<input id="RefAddMun" data-ignore=1 type="text" placeholder="Municipality..." class="form-control inputReference" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Province</label>
															<input id="RefAddProv" data-ignore=1 type="text" placeholder="Province..." class="form-control inputReference" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Zip Code</label>
															<input id="RefZipCode" data-ignore=1 type="text" placeholder="Zip Code..." class="form-control inputReference" required>
														</div>
														<div class="col-sm-3 form-group">
															<label>Contact Number</label>
															<input id="RefTel" data-ignore=1 type="text" placeholder="Contact Number...." class="form-control inputReference" required>
														</div>
													</div>

													<button id="btnDelReference" class="btn btn-danger pull-right tblBottom" style="margin-left: 4px;">Del</button>
													<button id="btnAddReference" class="btn btn-success pull-right tblBottom">Add</button>
													<div class="tclear"></div>
												</div>
											</div>
										</div>
										<button onclick="updateOthers();" class="btn btn-primary pull-right tblBottom">Finish</button>
													<div class="tclear"></div>
									</div>
								</div>
								
							</div>
							<!--<button class="btn btn-primary btn-md btn-block" name="login">Sign In</button>
						</form>-->
				  
				</div>
			</div>
			
		</div>
	</div>
</div>
		<!--------- end col-md-12 ----------->
	</div>

</div>
<!--- end content ------->


<!------------------------------------------------------------- footer ------------------------------------------------------------>
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
<!------------------------------------------------------------- end footer ------------------------------------------------------------>

<?php
	// includes modal
	include('essential/modal.php');
?>

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.growl.js"></script>
<script type="text/javascript" src="js/bootstrap-table.min.js"></script>
<script type="text/javascript" src="js/jquery.feedBackBox.js"></script>
<script type="text/javascript" src="js/blockUI.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="script/loginScript.js"></script>
<script type="text/javascript" src="js/bootstrap-submenu.min.js"></script>

<!-- <script type="text/javascript" src="js/bootstrap-submenu.js"></script> -->


<script type="text/javascript">
var educationNumber=1; //COUNTER FOR EDUCATIONAL BACKGROUND FOR BOOTSTRAP-TABLE
var eligibilityNumber=1; //COUNTER FOR ELIGIBILITY FOR BOOTSTRAP-TABLE
var workExperienceNumber=1; //COUNTER FOR WORK EXPERIENCE FOR BOOTSTRAP-TABLE
var volOrgNumber=1; //COUNTER FOR VOLUNTEER ORG FOR BOOTSTRAP-TABLE
var trainNumber=1; //COUNTER FOR TRAININGS FOR BOOTSTRAP-TABLE
var referencenNumber=1; //COUNTER FOR reference FOR BOOTSTRAP-TABLE

$(document).ready(function(){
	$('#feedbackDiv').feedBackBox();
	// $('#personalInfo').focus();
	initPage();
});


//ADD DEPENDENTS
	$('#fbbtnAddChild').click(function(e){
		$.blockUI();
		e.preventDefault();
		// var dependentbday=$('#DpntBDay').val();
		var rowDpntBDay = $('#DpntBDay').val().split('-');
		// console.log(dateAr[0]);
		if ($('#DpntFName').val()=='')
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		var rows = [];
	  	rows.push({
                childFname: '<span class="DpntFName">'+$('#DpntFName').val()+'</span>',
                childMname: '<span class="DpntMName">'+$('#DpntMName').val()+'</span>',
                childLname: '<span class="DpntLName">'+$('#DpntLName').val()+'</span>',
                childBirth: '<span class="DpntBDay">'+rowDpntBDay[1]+'/'+rowDpntBDay[2]+'/'+rowDpntBDay[0]+'</span>'
            });
		$('#fbtblChild').bootstrapTable('append', rows);
		$('#fbtblChild').bootstrapTable('scrollTo', 'bottom');
		$('.child-dependent').val('');
		$.unblockUI();
	});

//DELETE DEPENDENTS
$('#fbbtnDelChild').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#fbtblChild').bootstrapTable('getSelections'), function (row) {
            	return row.childFname;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#fbtblChild').bootstrapTable('remove', {
                field: 'childFname',
                values: ids
            });
        });

//ADD EDUCATIONAL BACKGROUND
	$('#btnAddEducBackground').click(function(e){
		$.blockUI();
		e.preventDefault();
		var rowEducIncAttDateFromDate = $('#EducIncAttDateFromDate').val().split('-');
		var rowEducIncAttDateToDate = $('#EducIncAttDateToDate').val().split('-');
		// console.log($('#EducLvlID').val());
		if (($('#EducSchoolName').val()=='') || ($('#EducCourse').val()==''))
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		educationNumber++;
		var rows = [];
	  	rows.push({
  			    No: '<span class="No">'+educationNumber+'</span>',
                EducLvlID: '<span class="EducLvlID">'+$('#EducLvlID').val()+'</span>',
                EducLevel:  '<span class="EducLevel">'+$('#EducLvlID').find(":selected").text()+'</span>',
                EducSchoolName: '<span class="EducSchoolName">'+$('#EducSchoolName').val()+'</span>',
                EducCourse: '<span class="EducCourse">'+$('#EducCourse').val()+'</span>',
                EducYrGrad: '<span class="EducYrGrad">'+$('#EducYrGrad').val()+'</span>',
                EducGradeLvlUnits: '<span class="EducGradeLvlUnits">'+$('#EducGradeLvlUnits').val()+'</span>',
                EducIncAttDateFromDate: '<span class="EducIncAttDateFromDate">'+rowEducIncAttDateFromDate[1]+'/'+rowEducIncAttDateFromDate[2]+'/'+rowEducIncAttDateFromDate[0]+'</span>',
                EducIncAttDateToDate: '<span class="EducIncAttDateToDate">'+rowEducIncAttDateToDate[1]+'/'+rowEducIncAttDateToDate[2]+'/'+rowEducIncAttDateToDate[0]+'</span>',
                EducAwards: '<span class="EducAwards">'+$('#EducAwards').val()+'</span>'
            });
		$('#tblEducation').bootstrapTable('append', rows);
		$('#tblEducation').bootstrapTable('scrollTo', 'bottom');
		$('.educInput').val('');
		$.unblockUI();
	});

//DELETE EDUCATIONAL BACKGROUND
$('#btnDelEducBackground').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblEducation').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.No;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblEducation').bootstrapTable('remove', {
                field: 'No',
                values: ids
            });
        });



//ADD CSC ELIGIBILITY
	$('#btnAddCsc').click(function(e){
		$.blockUI();
		e.preventDefault();
		var rowCSEExamDate = $('#CSEExamDate').val().split('-');
		var rowCSELicReleaseDate = $('#CSELicReleaseDate').val().split('-');
		// console.log($('#EducLvlID').val());
		if (($('#CSEDesc').val()=='') || ($('#CSERating').val()==''))
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		eligibilityNumber++;
		var rows = [];
	  	rows.push({
  			    No: '<span class="No">'+eligibilityNumber+'</span>',
                CSEDesc: '<span class="CSEDesc">'+$('#CSEDesc').val()+'</span>',
                CSERating:  '<span class="CSERating">'+$('#CSERating').val()+'</span>',
                CSEExamDate: '<span class="CSEExamDate">'+rowCSEExamDate[1]+'/'+rowCSEExamDate[2]+'/'+rowCSEExamDate[0]+'</span>',
                CSEExamPlace: '<span class="CSEExamPlace">'+$('#CSEExamPlace').val()+'</span>',
                CSELicNum: '<span class="CSELicNum">'+$('#CSELicNum').val()+'</span>',
                CSELicReleaseDate: '<span class="CSELicReleaseDate">'+rowCSELicReleaseDate[1]+'/'+rowCSELicReleaseDate[2]+'/'+rowCSELicReleaseDate[0]+'</span>'
                
            });
		$('#tblEligibility').bootstrapTable('append', rows);
		$('#tblEligibility').bootstrapTable('scrollTo', 'bottom');
		$('.eligibilityInput').val('');
		$.unblockUI();
	});

//DELETE EDUCATIONAL BACKGROUND
$('#btnDelCsc').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblEligibility').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.No;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblEligibility').bootstrapTable('remove', {
                field: 'No',
                values: ids
            });
        });


// function changeProvince(addType)
// {
// 	if (addtype == '')
// 	{
		
// 	}
// }

// function changeProvince(addType)
// {
// 	if (addtype == '')
// 	{
		
// 	}
// }


//ADD WORK EXPERIENCE
	$('#btnAddWorkExp').click(function(e){
		$.blockUI();
		e.preventDefault();
		// console.log($('#EducLvlID').val());
		var rowWExpFromDate = $('#WExpFromDate').val().split('-');
		var rowWExpToDate = $('#WExpToDate').val().split('-');
		if (($('#WExpFromDate').val()=='') || ($('#WExpToDate').val()==''))
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		workExperienceNumber++;
		var rows = [];
	  	rows.push({
  			    No: '<span class="No">'+workExperienceNumber+'</span>',
                WExpFromDate: '<span class="WExpFromDate">'+rowWExpFromDate[1]+'/'+rowWExpFromDate[2]+'/'+rowWExpFromDate[0]+'</span>',
                WExpToDate:  '<span class="WExpToDate">'+rowWExpToDate[1]+'/'+rowWExpToDate[2]+'/'+rowWExpToDate[0]+'</span>',
                WExpPosition: '<span class="WExpPosition">'+$('#WExpPosition').val()+'</span>',
                WExpEmployer: '<span class="WExpEmployer">'+$('#WExpEmployer').val()+'</span>',
                WExpSalary: '<span class="WExpSalary">'+$('#WExpSalary').val()+'</span>',
                SalGrdID: '<span class="SalGrdID">'+$('#SalGrdID').val()+'</span>',
                AppStID: '<span class="AppStID">'+$('#AppStID').find(":selected").text()+'</span>',
                WExpIsGov: '<span class="WExpIsGov">'+$('#WExpIsGov').val()+'</span>',
                ApptStDesc: '<span class="ApptStDesc">'+$('#AppStID').val()+'</span>'
                // AppStID: '<span class="ApptStDesc">'+value['ApptStDesc']+'</span>',
            });
		$('#tblWorkExp').bootstrapTable('append', rows);
		$('#tblWorkExp').bootstrapTable('scrollTo', 'bottom');
		$('.inputExperience').val('');
		$.unblockUI();
	});

//DELETE WORK EXPERIENCE
$('#btnDelWorkExp').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblWorkExp').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.No;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblWorkExp').bootstrapTable('remove', {
                field: 'No',
                values: ids
            });
        });

//ADD VOLUNTARY WORK
	$('#btnAddVolOrg').click(function(e){
		$.blockUI();
		e.preventDefault();
		var rowVolOrgFromDate = $('#VolOrgFromDate').val().split('-');
		var rowVolOrgToDate = $('#VolOrgToDate').val().split('-');
		// console.log($('#EducLvlID').val());
		if (($('#VolOrgName').val()=='') || ($('#VolOrgAddSt').val()==''))
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		volOrgNumber++;
		var rows = [];
	  	rows.push({
  			    No: '<span class="No">'+volOrgNumber+'</span>',
                VolOrgName: '<span class="VolOrgName">'+$('#VolOrgName').val()+'</span>',
                VolOrgAddSt:  '<span class="VolOrgAddSt">'+$('#VolOrgAddSt').val()+'</span>',
                VolOrgFromDate: '<span class="VolOrgFromDate">'+rowVolOrgFromDate[1]+'/'+rowVolOrgFromDate[2]+'/'+rowVolOrgFromDate[0]+'</span>',
                VolOrgToDate: '<span class="VolOrgToDate">'+rowVolOrgToDate[1]+'/'+rowVolOrgToDate[2]+'/'+rowVolOrgToDate[0]+'</span>',
                VolOrgHours: '<span class="VolOrgHours">'+$('#VolOrgHours').val()+'</span>',
                VolOrgDetails: '<span class="VolOrgDetails">'+$('#VolOrgDetails').val()+'</span>'
                
            });
		$('#tblVolWork').bootstrapTable('append', rows);
		$('#tblVolWork').bootstrapTable('scrollTo', 'bottom');
		$('.inputVolOrg').val('');
		$.unblockUI();
	});

//DELETE VOLUNTARY WORK
$('#btnDelVolOrg').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblVolWork').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.No;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblVolWork').bootstrapTable('remove', {
                field: 'No',
                values: ids
            });
        });

//ADD TRAININGS
	$('#btnAddTraining').click(function(e){
		$.blockUI();
		e.preventDefault();
		var rowTrainFromDate = $('#TrainFromDate').val().split('-');
		var rowTrainToDate = $('#TrainToDate').val().split('-');
		// console.log($('#EducLvlID').val());
		if (($('#TrainDesc').val()=='') || ($('#TrainSponsor').val()==''))
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		trainNumber++;
		var rows = [];
	  	rows.push({
  			    No: '<span class="No">'+trainNumber+'</span>',
                TrainDesc: '<span class="TrainDesc">'+$('#TrainDesc').val()+'</span>',
                TrainFromDate:  '<span class="TrainFromDate">'+rowTrainFromDate[1]+'/'+rowTrainFromDate[2]+'/'+rowTrainFromDate[0]+'</span>',
                TrainToDate: '<span class="TrainToDate">'+rowTrainToDate[1]+'/'+rowTrainToDate[2]+'/'+rowTrainToDate[0]+'</span>',
                TrainHours: '<span class="TrainHours">'+$('#TrainHours').val()+'</span>',
                TrainSponsor: '<span class="TrainSponsor">'+$('#TrainSponsor').val()+'</span>'
            });
		$('#tblSeminar').bootstrapTable('append', rows);
		$('#tblSeminar').bootstrapTable('scrollTo', 'bottom');
		$('.inputTraining').val('');
		$.unblockUI();
	});

//DELETE TRAININGS
$('#btnDelTraining').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblSeminar').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.No;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblSeminar').bootstrapTable('remove', {
                field: 'No',
                values: ids
            });
        });






//ADD SKILL
	$('#btnAddSkill').click(function(e){
		$.blockUI();
		e.preventDefault();
		// console.log($('#EducLvlID').val());
		if ($('#SkillDesc').val()=='') 
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		var rows = [];
	  	rows.push({
                SkillDesc: '<span class="SkillDesc">'+$('#SkillDesc').val()+'</span>'
            });
		$('#tblSkill').bootstrapTable('append', rows);
		$('#tblSkill').bootstrapTable('scrollTo', 'bottom');
		$('#SkillDesc').val('');
		$.unblockUI();
	});

//DELETE SKILL
$('#btnDelSkill').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblSkill').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.SkillDesc;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblSkill').bootstrapTable('remove', {
                field: 'SkillDesc',
                values: ids
            });
        });




//ADD RECOGNITION
	$('#btnAddRecognition').click(function(e){
		$.blockUI();
		e.preventDefault();
		// console.log($('#EducLvlID').val());
		if ($('#NonAcadRecDetails').val()=='') 
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		var rows = [];
	  	rows.push({
                NonAcadRecDetails: '<span class="NonAcadRecDetails">'+$('#NonAcadRecDetails').val()+'</span>'
            });
		$('#tblRecognition').bootstrapTable('append', rows);
		$('#tblRecognition').bootstrapTable('scrollTo', 'bottom');
		$('#NonAcadRecDetails').val('');
		$.unblockUI();
	});

//DELETE RECOGNITION
$('#btnDelRecognition').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblRecognition').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.NonAcadRecDetails;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblRecognition').bootstrapTable('remove', {
                field: 'NonAcadRecDetails',
                values: ids
            });
        });




//ADD MEMBERSHIP
	$('#btnAddMembership').click(function(e){
		$.blockUI();
		e.preventDefault();
		// console.log($('#EducLvlID').val());
		if ($('#MemAssOrgDesc').val()=='') 
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		var rows = [];
	  	rows.push({
                MemAssOrgDesc: '<span class="MemAssOrgDesc">'+$('#MemAssOrgDesc').val()+'</span>'
            });
		$('#tblMembership').bootstrapTable('append', rows);
		$('#tblMembership').bootstrapTable('scrollTo', 'bottom');
		$('#MemAssOrgDesc').val('');
		$.unblockUI();
	});

//DELETE MEMBERSHIP
$('#btnDelMembership').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblMembership').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.MemAssOrgDesc;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblMembership').bootstrapTable('remove', {
                field: 'MemAssOrgDesc',
                values: ids
            });
        });



//ADD Reference 
	$('#btnAddReference').click(function(e){
		$.blockUI();
		e.preventDefault();
		// console.log($('#EducLvlID').val());
		if (($('#RefLName').val()=='')||($('#RefFName').val()==''))
		{
			$.growl.error({ message: "Fill up all Details." });
			$.unblockUI();
			return;
		}
		referencenNumber++;
		var rows = [];
	  	rows.push({
	  			referencenNumber: '<span class="referencenNumber">'+referencenNumber+'</span>',
                RefLName: '<span class="RefLName">'+$('#RefLName').val()+'</span>',
                RefFName: '<span class="RefFName">'+$('#RefFName').val()+'</span>',
                RefMName: '<span class="RefMName">'+$('#RefMName').val()+'</span>',
                RefExtName: '<span class="RefExtName">'+$('#RefExtName').val()+'</span>',
                RefAddSt: '<span class="RefAddSt">'+$('#RefAddSt').val()+'</span>',
                RefAddBrgy: '<span class="RefAddBrgy">'+$('#RefAddBrgy').val()+'</span>',
                RefAddMun: '<span class="RefAddMun">'+$('#RefAddMun').val()+'</span>',
                RefAddProv: '<span class="RefAddProv">'+$('#RefAddProv').val()+'</span>',
                RefZipCode: '<span class="RefZipCode">'+$('#RefZipCode').val()+'</span>',
                RefTel: '<span class="RefTel">'+$('#RefTel').val()+'</span>'
            });
		$('#tblReference').bootstrapTable('append', rows);
		$('#tblReference').bootstrapTable('scrollTo', 'bottom');
		$('.inputReference').val('');
		$.unblockUI();
	});

//DELETE Reference
$('#btnDelReference').click(function (e) {
	e.preventDefault();
            var ids = $.map($('#tblReference').bootstrapTable('getSelections'), function (row) {
            	// alert(row.Qualifications);
            	// console.log(row.childFname +"a");
                return row.referencenNumber;
            });
            if (ids=='')
            {
            	$.growl.error({ message: "Select on the table what to delete." });
            	$.unblockUI();
            	return;
            }
            // alert($('#lstRequirement').bootstrapTable('getSelections'));
            $('#tblReference').bootstrapTable('remove', {
                field: 'referencenNumber',
                values: ids
            });
        });








$('#EmpResAddProv').change(function(e)
{
$.blockUI();
$('#EmpResAddMun').empty();
e.preventDefault();
    var moduleName = 'registerMunicipality';
    var provinceName = this.value;
     // console.log($('#EmpResAddProv').val());
    jQuery.ajax({
        type: "POST",
        url:"lib/getData/dropdown.php",
        dataType:'html',
        data:{module:moduleName,provinceName:provinceName},
        success:function(response)
        {
            $('#EmpResAddMun').empty();
            $('#EmpResAddMun').append(response);
            $('#EmpResAddMun').selectpicker('refresh');
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
    $.unblockUI();
});


$('#EmpResAddMun').change(function(e){
$.blockUI();
	$('#EmpResAddBrgy').empty();
	e.preventDefault();
    var moduleName = 'registerBarangay';
    var municipalityName = this.value;
    jQuery.ajax({
        type: "POST",
        url:"lib/getData/dropdown.php",
        dataType:'html',
        data:{module:moduleName,municipalityName:municipalityName},
        success:function(response)
        {
            $('#EmpResAddBrgy').empty();
            $('#EmpResAddBrgy').append(response);
            $('#EmpResAddBrgy').selectpicker('refresh');
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
    $.unblockUI();
});



$('#EmpPerAddProv').change(function(e){
$.blockUI();
$('#EmpPerAddMun').empty();
e.preventDefault();
    var moduleName = 'registerMunicipality';
    var provinceName = this.value;

    jQuery.ajax({
        type: "POST",
        url:"lib/getData/dropdown.php",
        dataType:'html',
        data:{module:moduleName,provinceName:provinceName},
        success:function(response)
        {
            $('#EmpPerAddMun').empty();
            $('#EmpPerAddMun').append(response);
            $('#EmpPerAddMun').selectpicker('refresh');
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
    $.unblockUI();
});


$('#EmpPerAddMun').change(function(e){
$.blockUI();
	$('#EmpPerAddBrgy').empty();
	e.preventDefault();
    var moduleName = 'registerBarangay';
    var municipalityName = this.value;
    jQuery.ajax({
        type: "POST",
        url:"lib/getData/dropdown.php",
        dataType:'html',
        data:{module:moduleName,municipalityName:municipalityName},
        success:function(response)
        {
            $('#EmpPerAddBrgy').empty();
            $('#EmpPerAddBrgy').append(response);
            $('#EmpPerAddBrgy').selectpicker('refresh');
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
    $.unblockUI();
});


$('li').focusout(function(e){
	// console.log(this.id);
	// if (this.id=="personalInfo")
	// {
	// 	console.log(this.id);
	// }
	// else if (this.id=="familyBackground")
	// {
	// 	console.log(this.id);
	// }
});







// function saveFam() {
// 	var data = '{';
// 	// collect one to one properties
// 	$('input', $('#familybg')).each(function(i, o) { // loop within Family Background
// 		if (o.nodeName == 'INPUT') {
// 			if ((o.dataset['ignore'] == undefined) ) { // skip input elem with ignore dataset
// 				if (o.type == 'checkbox') return; // skip select btSelectAll checkbox
// 				data += '"'+o.id+'":"' + o.value + '",';
// 			}
// 		}

// 	});
// 	// collect many to one properties
// 	if ($($('#fbtblChild tbody tr')[0]).hasClass('no-records-found')) {
// 	} else {
// 		data += '"child": [';
// 		$('#fbtblChild tbody tr').each(function(i, o) {
// 			// console.log(o);
// 			data += '{';
// 			$('span', $(o)).each(function(i, o) {
// 				data += '"'+o.className+'":"'+o.innerHTML+'",';
// 			});
// 			data = data.substring(0,data.length-1);
// 			data += '},';
// 		});
// 		data = data.substring(0,data.length-1);
// 		data += ']'
// 	}
// 	data += '}';
// 	data = JSON.parse(data);
// 	console.log(data);
// 	return data;

// }
function save() {




	var data = '{';
	// collect one to one properties
	$('input,select', $('#personalinfos')).each(function(i, o) { // loop within Family Background
		if (o.nodeName == 'INPUT') 
		{
			// console.log(o.id);
			if ((o.dataset['ignore'] == undefined) ) 
			{ // skip input elem with ignore dataset
				if (o.type == 'checkbox') return; // skip select btSelectAll checkbox
				data += '"'+o.id+'":"' + o.value + '",';
			}
		}
		else if (o.nodeName == 'SELECT') 
		{
			data += '"'+o.id+'":"' + $(this).find(":selected").text() + '",';
			// alert(data);
		}
	});

	// // collect many to one properties
	// if ($($('#fbtblChild tbody tr')[0]).hasClass('no-records-found')) {
	// } else {
	// 	data += '"child": [';
	// 	$('#fbtblChild tbody tr').each(function(i, o) {
	// 		// console.log(o);
	// 		data += '{';
	// 		$('span', $(o)).each(function(i, o) {
	// 			data += '"'+o.className+'":"'+o.innerHTML+'",';
	// 		});
	// 		data = data.substring(0,data.length-1);
	// 		data += '},';
	// 	});
		data = data.substring(0,data.length-1);
		// data += ']'
	// }
	data += '}';
	data = JSON.parse(data);
	console.log(data);

if ($.isEmptyObject( data )) return;
	var moduleName = 'updatePerInfo';
   $.blockUI();
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/pds.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
			if  (response['message']=='Update Successful')
        	{
        		$.growl.notice({ message: response['message'] });
        		$('#personalInfo').removeClass();
				$('#familyBackground').addClass('active');
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
}


function saveFamB()
{
$('#familyBackground').removeClass();
$('#educBackground').addClass('active');
	var data = '{';
	// collect one to one properties
	$('table, input', $('#familybg')).each(function(i, o) { // loop within Family Background
		if (o.nodeName == 'INPUT') {
			if ((o.dataset['ignore'] == undefined) ) { // skip input elem with ignore dataset
				if (o.type == 'checkbox') return; // skip select btSelectAll checkbox
				data += '"'+o.id+'": "' + o.value + '",';
			}
		}
	});	
	// collect many to one properties		
	if ($($('#fbtblChild tbody tr')[0]).hasClass('no-records-found')) {
		data = data.substring(0,data.length-1);		
	} else {	
		data += '"child": [';
		$('#fbtblChild tbody tr').each(function(i, o) {

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
	return;
if ($.isEmptyObject( data )) return;
$.blockUI();
	var moduleName = 'updateFamBackground';
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/pds.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
    		if  (response['message']=='Update Successful')
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

}



function updateEduc()
{
	$('#educBackground').removeClass();
$('#csctab').addClass('active');
var data = '{';
	// collect one to one properties
	// $('table, input', $('#educationalbg')).each(function(i, o) { // loop within Family Background
	// 	if (o.nodeName == 'INPUT') {
	// 		if ((o.dataset['ignore'] == undefined) ) { // skip input elem with ignore dataset
	// 			if (o.type == 'checkbox') return; // skip select btSelectAll checkbox
	// 			data += '"'+o.id+'": "' + o.value + '",';
	// 		}
	// 	}
	// });	
	// collect many to one properties
	if ($($('#tblEducation tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);
	} else {
		data += '"educ": [';
		$('#tblEducation tbody tr').each(function(i, o) {

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
	// return;
if ($.isEmptyObject( data )) return;
$.blockUI();
	var moduleName = 'updateEducBackground';
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/pds.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
    		if  (response['message']=='Update Successful')
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
}

function updateEligibility()
{
	$('#csctab').removeClass();
$('#workExperTab').addClass('active');
	var data = '{';

	// collect many to one properties
	if ($($('#tblEligibility tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);
	} else {
		data += '"CSC": [';
		$('#tblEligibility tbody tr').each(function(i, o) {

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
	// return;
if ($.isEmptyObject( data )) return;
$.blockUI();
	var moduleName = 'updateEligibility';
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/pds.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
    		if  (response['message']=='Update Successful')
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
}




function updateWorkExp()
{
	$('#workExperTab').removeClass();
$('#voluntaryTab').addClass('active');
	var data = '{';
	// collect many to one properties
	if ($($('#tblWorkExp tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);
	} else {
		data += '"WExp": [';
		$('#tblWorkExp tbody tr').each(function(i, o) {

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
	// return;
	if ($.isEmptyObject( data )) return;
	$.blockUI();
	var moduleName = 'updateWorkExp';
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/pds.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
    		if  (response['message']=='Update Successful')
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
}

function updateVolOrg()
{
	$('#voluntaryTab').removeClass();
$('#trainingTab').addClass('active');
	var data = '{';
	// collect many to one properties
	if ($($('#tblVolWork tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);
	} else {
		data += '"vWork": [';
		$('#tblVolWork tbody tr').each(function(i, o) {

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
	// return;
	if ($.isEmptyObject( data )) return;
	$.blockUI();
	var moduleName = 'updateVolOrg';
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/pds.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
    		if  (response['message']=='Update Successful')
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
}

function updateTraining()
{
	$('#trainingTab').removeClass();
$('#panelotherTab').addClass('active');
	var data = '{';
	// collect many to one properties
	if ($($('#tblSeminar tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);
	} else {
		data += '"Train": [';
		$('#tblSeminar tbody tr').each(function(i, o) {

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
	// return;
if ($.isEmptyObject( data )) return;
$.blockUI();

	var moduleName = 'updateTraining';
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/pds.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
    		if  (response['message']=='Update Successful')
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
}

function updateOthers()
{
	var data = '{';
	// collect one to one properties
	$('table, input',$('#panelOthers')).each(function(i, o) { // loop within Family Background
		if (o.nodeName == 'INPUT') {
			if ((o.dataset['ignore'] == undefined) ) { // skip input elem with ignore dataset
				if (o.type == 'checkbox') return; // skip select btSelectAll checkbox
				if (o.type == 'radio')
				{
					if(this.id)
					{
						if (o.checked==true)
						{
							data += '"'+o.id+'": "' + o.value + '",';
						}
					}
				}
				else if (o.type == 'text')
				{
					data += '"'+o.id+'": "' + o.value + '",';
				}
			}
		}
		// console.log(data);
	});
	// collect many to one properties		
	if ($($('#tblReference tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);		
	} else {
		data += '"CharReference": [';
		$('#tblReference tbody tr').each(function(i, o) {

			data += '{';
			$('span', $(o)).each(function(i, o) {
				data += '"'+o.className+'":"'+o.innerHTML+'",';
			});
			data = data.substring(0,data.length-1);		
			data += '},';
		});		
		data = data.substring(0,data.length-1);
		data += '],';
	}

	if ($($('#tblSkill tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);		
	} else {	
		data += '"skill": [';
		$('#tblSkill tbody tr').each(function(i, o) {

			data += '{';
			$('span', $(o)).each(function(i, o) {
				data += '"'+o.className+'":"'+o.innerHTML+'",';
			});
			data = data.substring(0,data.length-1);		
			data += '},';
		});		
		data = data.substring(0,data.length-1);
		data += '],';
	}

	if ($($('#tblRecognition tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);		
	} else {	
		data += '"recognition": [';
		$('#tblRecognition tbody tr').each(function(i, o) {

			data += '{';
			$('span', $(o)).each(function(i, o) {
				data += '"'+o.className+'":"'+o.innerHTML+'",';
			});
			data = data.substring(0,data.length-1);		
			data += '},';
		});		
		data = data.substring(0,data.length-1);
		data += '],';
	}


if ($($('#tblMembership tbody tr')[0]).hasClass('no-records-found')) {
		data = data.substring(0,data.length-1);		
	} else {	
		data += '"membership": [';
		$('#tblMembership tbody tr').each(function(i, o) {

			data += '{';
			$('span', $(o)).each(function(i, o) {
				data += '"'+o.className+'":"'+o.innerHTML+'",';
			});
			data = data.substring(0,data.length-1);		
			data += '},';
		});		
		data = data.substring(0,data.length-1);
		data += ']';
	}



	data += '}';
	data = JSON.parse(data);
	if ($.isEmptyObject( data )) return;
	$.blockUI();
	var moduleName = 'updateOtherInfo';
    jQuery.ajax({
        type: "POST",
        url:"lib/postData/pds.php",
        dataType:'json',
        data:{module:moduleName,jsonData:data},
        success:function(response)
        {
        	// var obj = $.parseJSON(response);
        	if  (response['message']=='Update Successful')
        	{
        		$.growl.notice({ message: response['message'] });
        	}
        	else
        	{
        		$.growl.error({ message: response['message'] });
        	}
        	
        	// console.log(response['message']);
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
 $.unblockUI();
}



function initPage()
{

$.blockUI();
	var moduleName = 'initPage';
    jQuery.ajax({
        type: "POST",
        url:"lib/getData/pds.php",
        dataType:'json',
        data:{module:moduleName},
        success:function(response)
        {
        	//personal info
        	$('#EmpLName').val(response['EmpLName']);
        	$('#EmpFName').val(response['EmpFName']);
        	$('#EmpMName').val(response['EmpMName']);
        	$('#EmpExtName').val(response['EmpExtName']);
        	$('#EmpBday').val(response['EmpBirthDate']);
        	$('#EmpBirthPlace').val(response['EmpBirthPlace']);
        	$('#EmpCitizenship').val(response['EmpCitizenship']);
        	$('#EmpHeight').val(response['EmpHeight']);
        	$('#EmpWeight').val(response['EmpWeight']);
        	$('#EmpBloodType').val(response['EmpBloodType']);
        	$('#EmpSex').val(response['EmpSex']);
        	$('#EmpSex').selectpicker('refresh');
        	$('#EmpCivilStatus').val(response['EmpCivilStatus']);
        	$('#EmpCivilStatus').selectpicker('refresh');

			$("#EmpResAddProv option").filter(function(){
			    return $.trim($(this).text()) ==  response['EmpResAddProv'];
			}).prop('selected', true);
			$('#EmpResAddProv').selectpicker('refresh');

			$("#EmpPerAddProv option").filter(function(){
			    return $.trim($(this).text()) ==  response['EmpPerAddProv'];
			}).prop('selected', true);
			$('#EmpPerAddProv').selectpicker('refresh');


			$("#EmpPerAddProv").trigger("change");
			$("#EmpResAddProv").trigger("change");

var delay=10;
			setTimeout(function() 
			{
				
				$("#EmpResAddMun option").filter(function() {
			    	return $(this).text() == response['EmpResAddMun']; 
				}).prop('selected', true);
				$('#EmpResAddMun').selectpicker('refresh');

				$("#EmpPerAddMun option").filter(function() {
			    	return $(this).text() == response['EmpPerAddMun']; 
				}).prop('selected', true);
				$('#EmpPerAddMun').selectpicker('refresh');

				$("#EmpPerAddMun").trigger("change");
				$("#EmpResAddMun").trigger("change");



			}, delay);

		
			setTimeout(function() 
			{
				$("#EmpPerAddBrgy option").filter(function() {
			    	return $(this).text() == response['EmpPerAddBrgy']; 
				}).prop('selected', true);
				$('#EmpPerAddBrgy').selectpicker('refresh');

				$("#EmpResAddBrgy option").filter(function() {
			    	return $(this).text() == response['EmpResAddBrgy']; 
				}).prop('selected', true);
				$('#EmpResAddBrgy').selectpicker('refresh');
			}, 1000);



        	$('#EmpGSIS').val(response['EmpGSIS']);
        	$('#EmpHDMF').val(response['EmpHDMF']);
        	$('#EmpPH').val(response['EmpPH']);
        	$('#EmpSSS').val(response['EmpSSS']);
        	$('#EmpPerZipCode').val(response['EmpPerZipCode']);
        	$('#EmpPerTel').val(response['EmpPerTel']);
        	$('#EmpResZipCode').val(response['EmpResZipCode']);
        	$('#EmpResTel').val(response['EmpResTel']);
        	$('#EmpEMail').val(response['EmpEMail']);
        	$('#EmpMobile').val(response['EmpMobile']);
        	$('#EmpAgencyNo').val(response['EmpAgencyNo']);
        	$('#EmpTIN').val(response['EmpTIN']);
        	$('#EmpGSIS').val(response['EmpGSIS']);

        	//family background
        	$('#EmpSpsLName').val(response['EmpSpsLName']);
        	$('#EmpSpsFName').val(response['EmpSpsFName']);
        	$('#EmpSpsMName').val(response['EmpSpsMName']);
        	$('#EmpSpsJob').val(response['EmpSpsJob']);
        	$('#EmpSpsBusDesc').val(response['EmpSpsBusDesc']);
        	$('#EmpBusAdd').val(response['EmpSpsBusAddSt']);
        	$('#EmpSpsBusTel').val(response['EmpSpsBusTel']);
        	$('#EmpFatherFName').val(response['EmpSpsLName']);
        	$('#EmpFatherLName').val(response['EmpFatherLName']);
        	$('#EmpFatherMName').val(response['EmpFatherMName']);
        	$('#EmpMotherFName').val(response['EmpMotherFName']);
        	$('#EmpMotherLName').val(response['EmpMotherLName']);
        	$('#EmpMotherMName').val(response['EmpMotherMName']);
//dependents
        	$('#fbtblChild').bootstrapTable('removeAll');
        	$.each(response[0],function( key, value )
		{
			$('#fbtblChild').bootstrapTable('insertRow', {index: 1, row: {  childFname:'<span class="DpntFName">'+value['DpntFName']+'</span>',childMname:'<span class="DpntMName">'+value['DpntMName']+'</span>',childLname:'<span class="DpntLName">'+value['DpntLName']+'</span>',childBirth:'<span class="DpntBDay">'+value['DpntBirthDate']+'</span>'} });
		});
//educational background
 		$('#tblEducation').bootstrapTable('removeAll');
        $.each(response[1],function( key, value )
		{
			educationNumber++;
			$('#tblEducation').bootstrapTable('insertRow', {index: 1, row: {  No: '<span class="No">'+educationNumber+'</span>',
                EducLvlID: '<span class="EducLvlID">'+value['EducLvlID']+'</span>',
                EducLevel:  '<span class="EducLevel">'+value['EducLevel']+'</span>',
                EducSchoolName: '<span class="EducSchoolName">'+value['EducSchoolName']+'</span>',
                EducCourse: '<span class="EducCourse">'+value['EducCourse']+'</span>',
                EducYrGrad: '<span class="EducYrGrad">'+value['EducYrGrad']+'</span>',
                EducGradeLvlUnits: '<span class="EducGradeLvlUnits">'+value['EducGradeLvlUnits']+'</span>',
                EducIncAttDateFromDate: '<span class="EducIncAttDateFromDate">'+value['EducIncAttDateFromDate']+'</span>',
                EducIncAttDateToDate: '<span class="EducIncAttDateToDate">'+value['EducIncAttDateToDate']+'</span>',
                EducAwards: '<span class="EducAwards">'+value['EducAwards']+'</span>'
            }});
		});

//CSC
 		$('#tblEligibility').bootstrapTable('removeAll');
        $.each(response[2],function( key, value )
		{
			eligibilityNumber++;
			// console.log(('#CSEDesc').val());
			$('#tblEligibility').bootstrapTable('insertRow', {index: 1, row: {  No: '<span class="No">'+eligibilityNumber+'</span>',
                CSEDesc: '<span class="CSEDesc">'+value['CSEDesc']+'</span>',
                CSERating:  '<span class="CSERating">'+value['CSERating']+'</span>',
                CSEExamDate: '<span class="CSEExamDate">'+value['CSEExamDate']+'</span>',
                CSEExamPlace: '<span class="CSEExamPlace">'+value['CSEExamPlace']+'</span>',
                CSELicNum: '<span class="CSELicNum">'+value['CSELicNum']+'</span>',
                CSELicReleaseDate: '<span class="CSELicReleaseDate">'+value['CSELicReleaseDate']+'</span>'
            }});
		});

//WORK EXPERIENCE
 		$('#tblWorkExp').bootstrapTable('removeAll');
        $.each(response[3],function( key, value )
		{
			workExperienceNumber++;
			// console.log(('#CSEDesc').val());
			$('#tblWorkExp').bootstrapTable('insertRow', {index: 1, row: {   No: '<span class="No">'+workExperienceNumber+'</span>',
                WExpFromDate: '<span class="WExpFromDate">'+value['WExpFromDate']+'</span>',
                WExpToDate:  '<span class="WExpToDate">'+value['WExpToDate']+'</span>',
                WExpPosition: '<span class="WExpPosition">'+value['WExpPosition']+'</span>',
                WExpEmployer: '<span class="WExpEmployer">'+value['WExpEmployer']+'</span>',
                WExpSalary: '<span class="WExpSalary">'+value['WExpSalary']+'</span>',
                SalGrdID: '<span class="SalGrdID">'+value['SalGrdID']+'</span>',
              AppStID: '<span class="AppStID">'+value['ApptStDesc']+'</span>',
                WExpIsGov: '<span class="WExpIsGov">'+value['WExpIsGov']+'</span>',
                  ApptStDesc: '<span class="ApptStDesc">'+value['ApptStID']+'</span>'
            }});
		});





// VOLUNTARY WORK
$('#tblVolWork').bootstrapTable('removeAll');
        $.each(response[4],function( key, value )
		{
			volOrgNumber++;
			// console.log(('#CSEDesc').val());
			$('#tblVolWork').bootstrapTable('insertRow', {index: 1, row: {    No: '<span class="No">'+volOrgNumber+'</span>',
                VolOrgName: '<span class="VolOrgName">'+value['VolOrgName']+'</span>',
                VolOrgAddSt:  '<span class="VolOrgAddSt">'+value['VolOrgAddSt']+'</span>',
                VolOrgFromDate: '<span class="VolOrgFromDate">'+value['VolOrgFromDate']+'</span>',
                VolOrgToDate: '<span class="VolOrgToDate">'+value['VolOrgToDate']+'</span>',
                VolOrgHours: '<span class="VolOrgHours">'+value['VolOrgHours']+'</span>',
                VolOrgDetails: '<span class="VolOrgDetails">'+value['VolOrgDetails']+'</span>'
            }});
		});



// trainings
$('#tblSeminar').bootstrapTable('removeAll');
        $.each(response[5],function( key, value )
		{
			trainNumber++;
			// console.log(('#CSEDesc').val());
			$('#tblSeminar').bootstrapTable('insertRow', {index: 1, row: {     No: '<span class="No">'+trainNumber+'</span>',
                TrainDesc: '<span class="TrainDesc">'+value['TrainDesc']+'</span>',
                TrainFromDate:  '<span class="TrainFromDate">'+value['TrainFromDate']+'</span>',
                TrainToDate: '<span class="TrainToDate">'+value['TrainToDate']+'</span>',
                TrainHours: '<span class="TrainHours">'+value['TrainHours']+'</span>',
                TrainSponsor: '<span class="TrainSponsor">'+value['TrainSponsor']+'</span>'
            }});
		});



// hobby
$('#tblSkill').bootstrapTable('removeAll');
        $.each(response[6],function( key, value )
		{
			$('#tblSkill').bootstrapTable('insertRow', {index: 1, row: {    SkillDesc: '<span class="SkillDesc">'+value['SkillDesc']+'</span>'
            }});
		});

// recognitions
$('#tblRecognition').bootstrapTable('removeAll');
        $.each(response[7],function( key, value )
		{
			$('#tblRecognition').bootstrapTable('insertRow', {index: 1, row: {    NonAcadRecDetails: '<span class="NonAcadRecDetails">'+value['NonAcadRecDetails']+'</span>'
            }});
		});

// membership
$('#tblMembership').bootstrapTable('removeAll');
        $.each(response[8],function( key, value )
		{
			$('#tblMembership').bootstrapTable('insertRow', {index: 1, row: {    MemAssOrgDesc: '<span class="MemAssOrgDesc">'+value['MemAssOrgDesc']+'</span>'
            }});
		});


// reference
$('#tblReference').bootstrapTable('removeAll');
        $.each(response[9],function( key, value )
		{
			referencenNumber++;
			$('#tblReference').bootstrapTable('insertRow', {index: 1, row: {   referencenNumber: '<span class="referencenNumber">'+referencenNumber+'</span>',
                RefLName: '<span class="RefLName">'+value['RefLName']+'</span>',
                RefFName: '<span class="RefFName">'+value['RefFName']+'</span>',
                RefMName: '<span class="RefMName">'+value['RefMName']+'</span>',
                RefExtName: '<span class="RefExtName">'+value['RefExtName']+'</span>',
                RefAddSt: '<span class="RefAddSt">'+value['RefAddSt']+'</span>',
                RefAddBrgy: '<span class="RefAddBrgy">'+value['RefAddBrgy']+'</span>',
                RefAddMun: '<span class="RefAddMun">'+value['RefAddMun']+'</span>',
                RefAddProv: '<span class="RefAddProv">'+value['RefAddProv']+'</span>',
                RefZipCode: '<span class="RefZipCode">'+value['RefZipCode']+'</span>',
                RefTel: '<span class="RefTel">'+value['RefTel']+'</span>'
            }});
		});

$('.ans').val('');
$('.noAns').prop('checked', true);

 $.each(response[10],function( key, value )
		{
			if (value['QuesID']=='Q361')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q361').prop('checked', true);
					$('#A361').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q362')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q362').prop('checked', true);
					$('#A362').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q371')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q371').prop('checked', true);
					$('#A371').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q372')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q372').prop('checked', true);
					$('#A372').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q380')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q380').prop('checked', true);
					$('#A380').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q390')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q390').prop('checked', true);
					$('#A390').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q400')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q400').prop('checked', true);
					$('#A400').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q411')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q411').prop('checked', true);
					$('#A411').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q412')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q412').prop('checked', true);
					$('#A412').val(value['AnsDetails']);
				}
			}
			if (value['QuesID']=='Q413')
			{
				if (value['AnsIsYes']=='1')
				{
					$('#Q413').prop('checked', true);
					$('#A413').val(value['AnsDetails']);
				}
			}
		});




        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });



 $.unblockUI();



}



</script>
<!-- Steps Progress and Details - END -->





</body>
</html>