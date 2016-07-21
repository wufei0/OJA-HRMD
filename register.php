<?php


if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

require_once('essential/connection.php');
//global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

 ?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>OJA</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    

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

                
            </div>
          </div>
      </div>
    </div>
</header>
<!-- end header -->


    <!---------------------------------------------- content ------------------------------------------------------------>
    <div class="content">
        <div class="container">
            <div class="row">
                <h3 class="well">Registration Form</h3>
                <form >
                    <!---- Group Personal Information ---->
                    <div class="col-lg-12 well">
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <h4>I. Personal Information</h4>
                                            <hr>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Surename</label>
                                            <input id="regSurename" type="text" placeholder="Surename" class="form-control" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>First Name</label>
                                            <input id="regFirstName" type="text" placeholder="Firstname" class="form-control" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Middle Name</label>
                                            <input id="regMiddleName" type="text" placeholder="Middle Name" class="form-control" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Name Extension (e.g. Jr., Sr.)</label>
                                            <input id="regNameExt" type="text" placeholder="Name Extension (e.g. Jr., Sr.)" class="form-control" >
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 form-group">
                                            <label>Date of Birth (mm/dd/yyyy)</label>
                                            <div id="datetimepicker4" class="input-append">
                                                <input id="regDateOfBirth" class="form-control" data-format="yyyy/MM/dd" type="date" required></input>
                                                <span class="add-on">
                                                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                  </i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Place of Birth</label>
                                            <input id="regPlaceOfBirth" type="text" placeholder="Birthplace" class="form-control" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Sex</label>
                                            <select class="selectpicker form-control" >
                                              <option id="regSex" value="male">Male</option>
                                              <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Civil Status</label>
                                            <select id="regCivilStatis" class="selectpicker form-control" >
                                              <option value="single">Single</option>
                                              <option value="married">Married</option>
                                              <option value="divorced">Divorced</option>
                                               <option value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label>Province</label>
                                            <select id="regProvince" class="selectpicker form-control" data-live-search="true" required>
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
                                        <div class="col-sm-4 form-group">
                                            <label>Municipality</label>
                                            <select id="regMunicipality" class="selectpicker form-control" data-live-search="true" required>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Barangay</label>
                                            <select id="regBarangay" class="selectpicker form-control" data-live-search="true" required>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Email Address</label>
                                            <input id="Email" type="text" placeholder="Enter Email Address Here.." class="form-control" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Cellphone No.</label>
                                            <input id="CpNumber" type="text" placeholder="Enter Phone Number Here.." class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                        </div>
                    </div>
                    <!---- end Group Personal Information ---->

                    <!---- Group Educational Background ---->
                    <div class="col-lg-12 well">
                        <div class="row">

                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <h4>II. Educational Background</h4>
                                            <hr>
                                        </div>

                                    </div>  

                                    <div class="row">
                                        <div class="col-sm-1 form-group">
                                            <label>Level</label>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Name of School</label>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Degree Course</label>
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <label>Year Graduated</label>
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <label>Highest Level</label>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Inclusive Dates of Attendance</label>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Scholarship</label>
                                        </div>
                                    </div>

                                    <!-- group Elementary -->
                                    <div class="row">
                                        <div class="col-sm-1 form-group">
                                            <label>Elementary</label>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <input id="elemSchoolName" type="text" placeholder="Name of School" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="elemDegree" type="text" placeholder="Degree Course" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="elemYearGraduated" type="text" placeholder="Year Graduated" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="elemHighestLevel" type="text" placeholder="Highest Level" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-right:5px;">
                                            <input id="elemFrom" type="text" placeholder="From" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-left:5px;">
                                            <input id="elemTo" type="text" placeholder="To" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="elemScholarship" type="text" placeholder="Scholarship" class="form-control" >
                                        </div>
                                    </div>

                                    <!-- group Secondary -->
                                    <div class="row">
                                        <div class="col-sm-1 form-group">
                                            <label>Secondary</label>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <input id="hsSchoolName" type="text" placeholder="Name of School" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="hsDegree" type="text" placeholder="Degree Course" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="hsYearGraduated" type="text" placeholder="Year Graduated" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="hsHighestLevel" type="text" placeholder="Highest Level" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-right:5px;">
                                            <input id="hsFrom" type="text" placeholder="From" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-left:5px;">
                                            <input id="hsTo" type="text" placeholder="To" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="hsScholarship" type="text" placeholder="Scholarship" class="form-control" >
                                        </div>
                                    </div>

                                    <!-- group Vocational -->
                                    <div class="row">
                                        <div class="col-sm-1 form-group">
                                            <label>Vocational / Trade Course</label>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <input id="vocSchoolName" type="text" placeholder="Name of School" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="vocDegree" type="text" placeholder="Degree Course" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="vocYearGraduated" type="text" placeholder="Year Graduated" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="vocHighestLevel" type="text" placeholder="Highest Level" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-right:5px;">
                                            <input id="vocFrom" type="text" placeholder="From" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-left:5px;">
                                            <input id="vocTo" type="text" placeholder="To" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="vocScholarship" type="text" placeholder="Scholarship" class="form-control" >
                                        </div>
                                    </div>

                                    <!-- group College -->
                                    <div class="row">
                                        <div class="col-sm-1 form-group">
                                            <label>College</label>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <input id="colSchoolName" type="text" placeholder="Name of School" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="colDegree" type="text" placeholder="Degree Course" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="colYearGraduated" type="text" placeholder="Year Graduated" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="colHighestLevel" type="text" placeholder="Highest Level" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-right:5px;">
                                            <input id="colFrom" type="text" placeholder="From" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-left:5px;">
                                            <input id="colTo" type="text" placeholder="To" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="colScholarship" type="text" placeholder="Scholarship" class="form-control" >
                                        </div>
                                    </div>

                                    <!-- group graduate studies -->
                                    <div class="row">
                                        <div class="col-sm-1 form-group">
                                            <label>Graduate Studies</label>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <input id="grdSchoolName" type="text" placeholder="Name of School" class="form-control" >
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="grdDegree" type="text" placeholder="Degree Course" class="form-control" >
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="grdYearGraduated" type="text" placeholder="Year Graduated" class="form-control" required>
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <input id="grdHighestLevel" type="text" placeholder="Highest Level" class="form-control" required>
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-right:5px;">
                                            <input id="grdFrom" type="text" placeholder="From" class="form-control" required>
                                        </div>
                                        <div class="col-sm-1 form-group" style="padding-left:5px;">
                                            <input id="grdTo" type="text" placeholder="To" class="form-control" required>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <input id="grdScholarship" type="text" placeholder="Scholarship" class="form-control" required>
                                        </div>
                                    </div>
                                    <label style="font-size: 10px;">*Input latest on every Education Level</label>
                                </div>
                        </div>
                    </div>
                    <!---- end Group Educational Background ---->

                    <!---- Group Civil Service Eligibility ---->
                    <div class="col-lg-12 well">
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <h4>III. Civil Service Eligibility</h4>
                                            <hr>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label>Career Service / RA 1080 (Board/Bar) Under Special Laws / CES / CSEE</label>
                                            <input id="eliEligibility" type="text" placeholder="Career Service..." class="form-control" >
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label>Rating</label>
                                            <input id="eliRating" type="text" placeholder="Rating" class="form-control">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label>Date of Examination / Conferment</label>
                                            <input id="eliDateExam" type="text" placeholder="Date of Examination" class="form-control">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label>Place of Examination / Conferment</label>
                                            <input id="eliPlaceExam"  type="text" placeholder="Highest Grade / Level / Units Earned" class="form-control">
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>License (Number)</label>
                                                <input id="eliLicenseNumber" type="text" placeholder="License Number" class="form-control">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>License (Date of Release)</label>
                                                <input id="eliDateLicense" type="date" placeholder="License Date of Release" class="form-control">
                                            </div>
                                        </div>
                                </div>

                        </div>
                    </div>
                    <!---- end Group Civil Service Eligibility ---->

                    <!---- Group Skills ---->
                    <div class="col-lg-12 well">
                        <div class="row">

                                <div class="col-sm-12">
                                    <div class="row">

                                        <div class="col-sm-12 form-group">
                                            <h4>IV. Skills</h4>
                                            <hr>
                                        </div>

                                        <div class="col-sm-12 form-group">
                                            <label>Special Skills / Hobbies</label>
                                            <input id="sklSkill" type="text" placeholder="Special Skills / Hobbies" class="form-control" required>
                                        </div>

                                        <div class="col-sm-12 form-group">
                                            <label>Non-Academic Distinctions / Recognition</label>
                                            <input id="sklRecognition" type="text" placeholder="Non-Academic Distinctions / Recognition" class="form-control">
                                        </div>

                                        <div class="col-sm-12 form-group">
                                            <label>Memebership in Association / Organization</label>
                                            <input id="sklOrganization" type="text" placeholder="Memebership in Association / Organization" class="form-control">
                                        </div>

                                    </div>

                                </div>
                            
                        </div>
                    </div>
                    <!---- end Group Skills ---->
                    
                    <!---- Group Others ---->
                    <div class="col-lg-12 well">
                        <div class="row">
                            
                                <div class="col-sm-12">
                                    <div class="row">
                                        
                                        <div class="col-sm-12 form-group">
                                            <h4>V. Others</h4>
                                            <hr>
                                        </div>
                                        
                                        <div class="col-sm-12 form-group">
                                            <label>Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</label>
                                        </div>
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label>a. Are you a memeber of any indigenous group?</label>
                                            
                                            <label class="radio-inline">
                                              <input type="radio" name="indigenous" id="inlineRadio1" value="option1" > Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="indigenous" id="inlineRadio2" value="option2" checked> No
                                            </label>
                                            
                                            <input type="text" placeholder="If YES, please specify:" class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group">
                                            <label>b. Are you differently abled?</label>
                                            
                                            <label class="radio-inline">
                                              <input type="radio" name="abled" id="inlineRadio1" value="option1"> Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="abled" id="inlineRadio2" value="option2" checked> No
                                            </label>
                                            
                                            <input type="text" placeholder="If YES, please specify:" class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group">
                                            <label>c. Are you a solo parent?</label>
                                            
                                            <label class="radio-inline">
                                              <input type="radio" name="soloparent" id="inlineRadio1" value="option1"> Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="soloparent" id="inlineRadio2" value="option2" checked> No
                                            </label>
                                            
                                            <input type="text" placeholder="If YES, please specify:" class="form-control">
                                        </div>
                                    </div>
                                                                
                                </div>
                            
                        </div>
                    </div>
                    <!---- end Group Others ---->
                    
                    <!---- Group References ---->
                    <div class="col-lg-12 well">
                        <div class="row">
                            
                                <div class="col-sm-12">
                                    <div class="row">
                                        
                                        <div class="col-sm-12 form-group">
                                            <h4>VI. References (Person not related by consanguinity or affinity to applicant / appointee)</h4>
                                            <hr>
                                        </div>
                                        
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label>Name</label>
                                            <input type="text" placeholder="Name..." class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group">
                                            <label>Address</label>
                                            <input type="text" placeholder="Address..." class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group">
                                            <label>Tel. No.</label>
                                            <input type="text" placeholder="Tel. No..." class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label>Name</label>
                                            <input type="text" placeholder="Name..." class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group">
                                            <label>Address</label>
                                            <input type="text" placeholder="Address..." class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group">
                                            <label>Tel. No.</label>
                                            <input type="text" placeholder="Tel. No..." class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label>Name</label>
                                            <input type="text" placeholder="Name..." class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group">
                                            <label>Address</label>
                                            <input type="text" placeholder="Address..." class="form-control">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group">
                                            <label>Tel. No.</label>
                                            <input type="text" placeholder="Tel. No..." class="form-control">
                                        </div>
                                    </div>
                                                                
                                </div>
                            
                        </div>
                    </div>
                    <!---- end Group References ---->

                    <!-- button -->
                    <div style="margin-bottom: 60px;">
                        <div class="row">
                                <div class="col-sm-12">

                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                                                
                                </div>
                        </div>
                    </div>
                    <!-- end button -->
                    
                </form>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------- end content ------------------------------------------------------------>

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


<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.growl.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>

<script  type="text/javascript">

// change province event
// reload municipality
$('#regProvince').change(function(e){

$('#regMunicipality').empty();
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
            $('#regMunicipality').empty();
            // var municipalityList = response;
            $('#regMunicipality').append(response);
            // $('#regMunicipality').trigger("chosen:updated");
            $('#regMunicipality').selectpicker('refresh');

        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
});

// change municipality event
// reload barangar
$('#regMunicipality').change(function(e){

$('#regBarangay').empty();
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
            $('#regBarangay').empty();
            // var municipalityList = response;
            $('#regBarangay').append(response);
            // $('#regMunicipality').trigger("chosen:updated");
            $('#regBarangay').selectpicker('refresh');

        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            $.growl.error({ message: thrownError });
        }
        });
});


</script>



</body>
</html>