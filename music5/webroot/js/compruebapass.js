//comprueba si al cambiar el password se ha escrito bien 2 veces
$(document).ready(function(){
	$('.compruebapass').on('click', function(event){
		var pass=$("#pass").val();
		var pass1=$("#pass1").val();
		if(pass=="" || pass1==""){
			$("#msg").html("<div class='alert-box alert radius flash-msg'>Las contraseñas no pueden estar en blanco</div>");
			return false;
		}else if (pass != pass1) {
			$("#msg").html("<div class='alert-box alert radius flash-msg'>Las contraseñas no coinciden</div>");
			return false;
		}else{
			return true;
		}
	});
	
});