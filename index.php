<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
   <title>Registration Forms</title>
   <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
     <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<!-- <div class="container"> -->

<div class="page-header">
    <center><h3>HRMD <small>Account Registration Form</small></h3></center>
</div>

<!-- Registration Form - START -->
 <div class="container" id="container1">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-primary">
                
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Please Register</h3>
                            </div>
                            <p style="text-align: center; color:#919191; margin-top: 20px;">
                                <!-- <i class="fa fa-gears" style="font-size:187px;"></i> -->
                               This will create your account to HRMD Online Application. Please Provide <strong>VALID </strong>and <strong>LEGAL </strong>information. Thank you.
                             </p>
                    
                   
                    <div class="panel-body">

                        <form role="form" action="#" method="post">
                           <font color="#919191">Personal Information</font>
                            <div class="form-group">
                                <!-- <p style="text-align: left; color:#919191; margin-top: 20px;">
                                <i class="fa fa-gears" style="font-size:187px;"></i>
                                Personal Information
                                </p> -->
                                <input type="text" name="surname" id="surname" class="form-control input-sm" placeholder="SurName">

                            </div>

                            <div class="form-group">
                                <input type="text" name="firstname" id="firstname" class="form-control input-sm" placeholder="First Name">
                            </div>
                           <!--  -->
                             <div class="form-group">
                                <input type="text" name="lastname" id="lastname" class="form-control input-sm" placeholder="Last Name">
                            </div>
                             <div class="form-group">
                                <input type="text" name="extension" id="extension" class="form-control input-sm" placeholder="Name Extension (e.g. Jr., Sr.)">
                            </div>

                            <div class="form-group">
                                    <form class="form-inline">
                                          <font color="#bfbfbf" size= "1.75px"><label>Date of Birth</label></font>
                                    <input type="date" name="bdate" id="bdate" class="form-control input-sm">
                                         
                                    </form>
                                 
                            </div>

                             

                            <div class="form-group">
                                <input type="text" name="pdate" id="pdate" class="form-control input-sm" placeholder="Place of Birth">
                            </div>
                             <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control input-sm" placeholder="Residential Address">
                            </div>
                            
                          
                            <ul class="list-group">
                                <li class="list-group-item">
                                 <font color="#bfbfbf" size= "1.5px">   Gender</font>
                                <div class="pull-right">
                                    <input id="gender" name="gender" type="checkbox"/>
                                </div>
                                 </li>
                            </ul>

                            <ul class="list-group">
                                    <li class="list-group-item"> 
                                        <font color="#bfbfbf" size= "1.5px"><label>Civil Status</label></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                       <select class="form-control pull right"  class="selectpicker" data-style="btn-primary" size="1px">
                                            <ul class="dropdown-menu">

                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Divorced</option>
                                                <option>Widowed</option>
                                            </ul>

                                        </select>
                                    </li>
                            </ul>
                          
                          <!--   <hr> -->
                         <!--  <p class="rounded">A rounded element</p> -->

                            <div class="form-group">
                                <font color="#919191">Account Information</font>
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                                <font color="#919191" size="1px">&nbsp;&nbsp;&nbsp;We'll never share your email with anyone else.</font>
                            </div>

                            <div class="form-group">
                                <input type="username" name="username" id="username" class="form-control input-sm" placeholder="Username">

                            </div>


                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">

                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                           

                            <input type="submit" value="Register" class="btn btn-success btn-block" >

                   
                         
                        </form>
                        <form action="login.php" onsubmit="return valid();" style="margin-top:10px;">
                         <input type="submit" value="Go back to log in" class="btn btn-link" style="float: left;">
                        <!--  <input type="submit" value="Forget Password?" class="btn btn-link" style="float: right;"> -->
                        </form>
                        <!-- <?php 

                        ?> -->
                    </div>

                </div>
                           <!--  <input type="submit" value="Sign in" class="btn btn-link" style="float: left;">
                            <input type="submit" value="Forget Password?" class="btn btn-link" style="float: right;" formaction="forget.php"> -->
              
            </div>
            </div>
        </div>

</div>

<!-- <div class="container">
                                     
  <div class="dropup">
    <button class="btn btn-primary dropup-toggle" type="button" data-toggle="dropup">Dropup Example
    <span class="caret"></span></button>
    <ul class="dropup-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div> -->


<!-- you need to include the shieldui css and js assets in order for the components to work (switch radio)-->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>


<style>
#container1 {
    background-color: #e2dada;
}

.centered-form {
    margin-top: 15px;
    margin-bottom: 15px;
}

.centered-form .panel {
    background: rgba(255, 255, 255, 0.8);
    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
.radio .cr {
    position: relative;
    display: inline-block;
    border: 2px solid green;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
    color: red;
}

.radio .cr {
    border-radius: 75%;
    border-color: green;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}
/*for radio button*/
.sui-switch-checked .sui-switch-inner {
        padding-left: .1em;
        padding-right: 1.2em;
        color: #fff;
        background-color: transparent;
    }   

    .sui-switch:focus .sui-switch-handle, .sui-switch:hover .sui-switch-handle, .sui-switch-handle:hover {
        background-color: #B9B9B9;
    }

    .default-switch {
        background-color: #777777;
    }

    .primary-switch {
        background-color: #337AB7;
    }


</style>

<script type="text/javascript">
    jQuery(function ($) {
        $("#gender").shieldSwitch({
            onText: "Fem",
            offText: "Male",
            cls: "primary-switch"
        });
       
    });
</script>



<!-- Registration Form - END -->

<!-- </div> -->
<!-- <div class="page-footer">
    <center><h7>© Copyright © 2014 Design by MISD</h7></center>
</div> -->
</body>
</html>
