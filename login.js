$(document).ready(function(){
	$("#alerta").hide();
	$("#login").on("click",function(){
		loginByAjax($("#user").val(), $("#password").val());
	});
});

function loginByAjax(user, pass){
	$.ajax(
		{
			method:"POST",
			url:"login.php",
			data:{usuario: user, password: pass}	
		}
		).done(function(response){
			if(response === "ok"){
				window.location.href="index.php";
			}
			else{
				$("#alerta").text("Error: Usuario o password invalido");
				$("#alerta").show();
			}
		}).fail(function(){

		});
}
