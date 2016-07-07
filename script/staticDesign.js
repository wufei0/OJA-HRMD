
/*onload script*/
$(document).ready(function()
{
	renderBreadcrumb('Home');
	renderNavigation();
	// alert("page reloaded");
});


/*render breadcrumb*/
function renderBreadcrumb(modName)
{
	var moduleName = modName;
 	jQuery.ajax({
        type: "POST",
        url:"essential/breadcrumb.php",
        dataType:'html',
        data:{module:moduleName},
        success:function(response)
        {
        	$('#div-breadcrumb').html(response);
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
             $.growl.error({ message: thrownError });
        }
        });
}

/*render Top Navigation*/
function renderNavigation()
{
	jQuery.ajax({
        type: "GET",
        url:"essential/navigation.php",
        dataType:'html',
        // data:{module:moduleName},
        success:function(response)
        {
        	$('#navHeader').html(response);
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
             $.growl.error({ message: thrownError });
        }
        });
}

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