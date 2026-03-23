$(document).ready(function(){
	$('.confirmar').on('click', function(event){
		$.ajax({
			type: "POST",
			url: basePath+"cdvarios/confirma",
			data:{
				id:$(this).attr("id"),
				confirmado: 1
			},
			dataType: "html",
			success: function(data){
				$('#msg').html('<div class="alert-box success radius flash-msg">CD de varios confirmado</div>');
				$('.flash-msg').delay(2000).fadeOut('slow');
				window.location.reload(true);
			},
			error: function(){
			 	alert('Tenemos problemas!!');
			}
		});
		return false;
	});
});