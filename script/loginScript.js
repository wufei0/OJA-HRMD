



// what:	Event function for login button from modal.php(modalLogin)
// return: 	true: reload page
// 			false: growl error message
function  logIn(e)
{
	var modName = "logMeIn";
	var userName=$("#loginTxtUsername").val();
	var userPassword=$("#loginTxtPassword").val();
  // alert(userName);
  // return;
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
    		// alert (response);
          // $('#model-content').html(response);
          // $('#myModalLabel').html("Login");
          // $("#modal-footer").html("<a href='#'>Create Account</a>");
          if (response == 'null')
          {
          	// $("#modal-footer").html("");
            location.reload();
            $("#modal-footer").html("log in success.");
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
      $("#modal-footer").html("Not yet registered? Register <a href='#'>here</a>");

    },

    error:function (xhr, ajaxOptions, thrownError){
         $.growl.error({ message: thrownError });
    }
    });
  $('#myModal').modal('show');
  $(document).on("submit","#formLogin",function(e){
    e.preventDefault();
    logIn(e);
  });
}




// $('#btnLogin').submit(function(e){
//   e.preventDefault;
// alert("as");
// });

// $( "#formLogin" ).submit(function( event ) {
//   alert( "Handler for .submit() called." );
//   event.preventDefault();
// });



