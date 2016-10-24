



// what:	Event function for login button from modal.php(modalLogin)
// return: 	true: reload page
// 			false: growl error message
function  logIn(e)
{
  $.blockUI();
	var modName = "logMeIn";
	var userName=$("#loginTxtUsername").val();
	var userPassword=$("#loginTxtPassword").val();
	e.preventDefault();
  	jQuery.ajax({
        type: "POST",
        url:"lib/authenticate/login.php",
        dataType:'html',
        data:{module:modName,userName:userName,userPassword:userPassword},
        beforeSend: function()
        {
    	 	$("#modal-footer").html("signing in...");
        },
        success:function(response)
        {
             console.log(response);
          if (response==true)
          {
          	// $("#modal-footer").html("");
            $("#modal-footer").html("log in success.");
            window.location.reload();
          	// // renderBreadcrumb("Home");
          	// $('#myModal').modal('hide');
          }
          else
          {
          	$("#modal-footer").html(response);
          }
        },

        error:function (xhr, ajaxOptions, thrownError)
        {
             $.growl.error({ message: thrownError });
        }
        });
    $.unblockUI();
}

// what:	Event function for logout href from breadcrumb.php(linkToLogin)
// return: 	true:
// 			false:
function logOut(e)
{
	var modName = "logMeOut";
	e.preventDefault();
  	jQuery.ajax({
        type: "POST",
        url:"lib/authenticate/login.php",
        dataType:'html',
        data:{module:modName},
        beforeSend: function()
        {
	 		if(!confirm("Are you sure you want to Logout?"))
	 		{
	 			return false;
	 		}
        },
        success:function(response)
        {

        	window.location.href = 'home.php';

        },

        error:function (xhr, ajaxOptions, thrownError)
        {
             $.growl.error({ message: thrownError });
        }
        });
}



// what:    Ajax that will call PHP function to render Login inside Modal
//          Login Event Handler
// return:  Login GUI
function logInModal()
{
  $.blockUI();
  var modName = "renderLogin";
  jQuery.ajax({
    type: "POST",
    url:"lib/authenticate/login.php", 
    dataType:'text',
    data:{module:modName},
    beforeSend: function() 
    {
      $('#myModalLabel').html("Login"); 
      $('#model-content').html("");
      $('#modal-footer').html("");
    },
    success:function(response)
    {
      $('#model-content').html(response);
      $('#myModalLabel').html("Login");
      $("#modal-footer").html(" <a href='#' onclick='registerInModal()'>Register</a> | <a href='#' onclick='renderForgotPassword()'>Forgot Password</a>");
    },

    error:function (xhr, ajaxOptions, thrownError){
         $.growl.error({ message: thrownError });
    }
    });
  $('#myModal').modal('show');
  $(document).on("click","#btnLogin",function(e){
    e.preventDefault();
    logIn(e);
  });
  $.unblockUI();
}

function registerInModal()
{
  $.blockUI();
  var modName = "renderRegister";
  jQuery.ajax({
    type: "POST",
    url:"lib/authenticate/login.php", 
    dataType:'text',
    data:{module:modName},
    beforeSend: function() 
    {
      $('#myModalLabel').html("Register"); 
      $('#model-content').html("");
      $('#modal-footer').html("");
      $('#myModal').modal('show');
    },
    success:function(response)
    {
      $('#model-content').html(response);
    },
    error:function (xhr, ajaxOptions, thrownError){
         $.growl.error({ message: thrownError });
    }
    });
  $(document).on("submit","#modalRegister",function(e){
    e.preventDefault();
    registerMe(e);
  });
  $.unblockUI();
}


function  registerMe(e)
{
  var modName = "registerMe";
  var emailAdd=$("#email").val();
  var fname=$("#first_name").val();
  var lname=$("#last_name").val();
  var mobileNo=$("#mobile").val();
  var password=$("#password").val();

   if($("#password").val() != $("#password_confirmation").val())
    {
      $("#modal-footer").html("Password dont match");
      return;
    }
    $.blockUI();
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url:"lib/authenticate/login.php",
        dataType:'html',
        data:{module:modName,emailAdd:emailAdd,fname:fname,lname:lname,mobileNo:mobileNo,password:password},
        beforeSend: function()
        {
          $("#modal-footer").html("Registration in progress. Please wait...");
        },
        success:function(response)
        {
           if (response==true)
          {
            // location.reload();
            $("#modal-footer").html("Registration complete. You can now login using your email and password");
            // $("#modal-footer").html(response);
          }
          else
          {

            $("#modal-footer").html(response);
            $("#modal-footer").append("<br> Registration Failed.");
          }
        },

        error:function (xhr, ajaxOptions, thrownError)
        {
             $.growl.error({ message: thrownError });
        }
        });
    $.unblockUI();
}


function renderForgotPassword()
{
  $.blockUI();
  var modName = "renderForgotPassword";
  jQuery.ajax({
    type: "POST",
    url:"lib/authenticate/login.php", 
    dataType:'text',
    data:{module:modName},
    beforeSend: function() 
    {
      $('#myModalLabel').html("Password Recovery"); 
      $('#model-content').html("");
      $('#modal-footer').html("");
      $('#myModal').modal('show');
    },
    success:function(response)
    {
      $('#model-content').html(response);
    },
    error:function (xhr, ajaxOptions, thrownError){
         $.growl.error({ message: thrownError });
    }
    });
  $(document).on("submit","#modalPasswordRecover",function(e){
    e.preventDefault();
    forgotPassword(e);
  });
  $.unblockUI();
}

function forgotPassword(e)
{
  var modName="forgotPassword";
  var emailAdd=$("#emailAddress").val();

 e.preventDefault;
 jQuery.ajax({
        type: "POST",
        url:"lib/authenticate/login.php",
        dataType:'html',
        data:{module:modName,emailAdd:emailAdd},
        beforeSend: function()
        {
          $("#modal-footer").html("Sending email. Please wait...");
        },
        success:function(response)
        {
           if (response==true)
          {
            // location.reload();
            $("#modal-footer").html("Send email complete. Follow instructions on email on how to recover account.");
            // $("#modal-footer").html(response);
          }
          else
          {
            $("#modal-footer").html(response);
            $("#modal-footer").append("<br> Send mail failed.");
          }
        },

        error:function (xhr, ajaxOptions, thrownError)
        {
             $.growl.error({ message: thrownError });
        }
        });
    $.unblockUI();
}
// $('#btnLogin').submit(function(e){
//   e.preventDefault;
// alert("as");
// });

// $( "#formLogin" ).submit(function( event ) {
//   alert( "Handler for .submit() called." );
//   event.preventDefault();
// });



