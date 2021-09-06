function loading(){
$(".loading").fadeOut(200);
}
function login()
{
	var err=null;
	var user=$("#user").val();
	var passwordd = $("#password").val();
	if(user==""||user==null)
	{
		err=-1;
		alertify.error("Invalid User");
	}
	if(err==null)
	$.ajax({
		url:"controller/loginController.php",
		type:"POST",
		data:{op:"checkLogin",user:user,passwordd:passwordd},
		beforeSend: function() {
			
			$("#submitLogin").attr("disabled","true").html('<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>');
			
		},
		success:function(data){
			
			if(data.data==0||data.data=="0"||data.data=="null"||data.data==null)
				{alertify.error("Login details are incorrect");
				$("#submitLogin").removeAttr("disabled").html('Login');}
			else
				window.location.href ="dashboard";
				
		},
		error:function(xhr,error,message)
		{
			console.log(xht.responseText);
		}
	});
}
$(document).ready(function(){
	$("#submitLogin").click(function(){login();});
	$(document).on('keypress',function(e) {
		if(e.which == 13) {
			login();
		}
	});
});