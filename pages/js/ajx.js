$(function(){
	$("#lin").click(function(){
		$("#lin").hide();

		var username=$("#username").val();
		var password=$("#userpassword").val();

	$.post("login.php",{username:username,password:password})
	.done(function(data){
		if (data=="success") {
			window.location = "index.html";
		}
		else
		{
			$("#inv").text("invalid userpassword or password");
		}
	});

	});
});