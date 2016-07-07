

// what:	Event function for login button from modal.php(modalLogin)
// return: 	true: reload page
// 			false: growl error message
function  logIn(e)
{
	var modName = "logMeIn";
	var userName=$("#loginTxtUsername").val();
	var userPassword=$("#loginTxtPassword").val();
	e.preventDefault();
  	jQuery.ajax({
        type: "POST",
        url:"login/login.php",
        dataType:'html',
        data:{module:modName,userName:userName,userPassword:userPassword},
        beforeSend: function()
        {
    	 	$("#modal-footer").html("please wait..");
        },
        success:function(response)
        {
    		// alert (response);
          // $('#model-content').html(response);
          // $('#myModalLabel').html("Login");
          // $("#modal-footer").html("<a href='#'>Create Account</a>");
          if (response == "true")
          {
          	$("#modal-footer").html("");

          	renderBreadcrumb("Home");
          	$('#myModal').modal('hide');
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

        	window.location.href = 'index.php';

        },

        error:function (xhr, ajaxOptions, thrownError)
        {
             $.growl.error({ message: thrownError });
        }
        });
}
