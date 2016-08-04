<?php


if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
if (isset($_SESSION['username']))
{
    header("location: home.php");
    exit();
}




 ?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>OJA</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    

</head>
<body>

<!-- <div class="container">

     <form id="logInForm" class="form-signin" >
        <h2 class="form-signin-heading">Please sign in</h2>
       <label for="username" class="sr-only">Username</label>
        <input  id="username" class="form-control" placeholder="Username" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" required="">
    <br>
        <button id="signIn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>


    


    </div> -->

<div class="modal-dialog">
    <div class="login-container">
        <h1>PGLU Online Application</h1>
        <form id="logInForm">
            <input id="username" class="form-control" type="text"  placeholder="Username" required>
            <input id="password" class="form-control" type="password"  placeholder="Password" required>
            <div class="form-group">
                <button id="signIn" class="btn btn-primary btn-md btn-block"  type="submit">Sign In</button>
            </div>

                <div id="logInMessage">
                </div>
        </form>
    </div>
</div>

<p style="text-align: center">
    <a href="register.php" target='_blank'>Register</a>
</p>


<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.growl.js"></script>
<script  type="text/javascript">


$("#logInForm").submit(function(e){
    e.preventDefault();
    var moduleName = 'logMeIn';
    var uname=$('#username').val();
    var pword=$('#password').val();

    jQuery.ajax({
        type: "POST",
        url:"lib/authenticate/login.php",
        dataType:'text',
        data:{module:moduleName,uname:uname,pword:pword},
        success:function(response)
        {
           if (response!="")
            {
                $("#logInMessage").html(response);
            }
            else
            {
                window.location.href = 'home.php';
            }

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