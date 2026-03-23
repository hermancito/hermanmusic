$(document).ready(function(){
	$('.adclientecdvar').on('click', function(event){
		$.ajax({
			type: "POST",
			url: basePath+"clientes/grabaSesionIdCdvar",
			data:{
				id:$(this).attr("id"),
			},
			dataType: "html",
			success: function(data){
				$('#msg').html('<div class="alert-box success radius flash-msg">Grabe sus datos de cliente</div>');
				$('.flash-msg').delay(2000).fadeOut('slow');
				window.location.replace(basePath+"clientes/adclientecdvar");
			},
			error: function(){
			 	alert('Tenemos problemas!!');
			}
		});
		return false;
	});
});