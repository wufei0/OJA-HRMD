<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div id="model-content">

        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<script language="JavaScript" type="text/javascript">

// what:    Ajax that will call PHP function to render Login inside Modal
//          Login Event Handler
// return:  Login GUI
function modalLogin()
{
  var modName = "renderLogin";
  jQuery.ajax({
        type: "POST",
        url:"essential/login.php",
        dataType:'text',
        data:{module:modName},
        beforeSend: function() 
        {
          $('#myModalLabel').html("Login"); 
          $('#model-content').html("");
        },
        success:function(response)
        {
          $('#model-content').html(response);
          $('#myModalLabel').html("Login");
        },
        error:function (xhr, ajaxOptions, thrownError){
             $.growl.error({ message: thrownError });
        }
        });
  $('#myModal').modal('show');

}



</script>