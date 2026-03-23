$(document).ready(function(){
	$('.addpago').on('change', function(event){
		$.ajax({
			type: "POST",
			url: basePath+"clientes-discos/formapago",
			data:{
				id:$(this).attr("id"),
				fpago:$(this).val()
			},
			dataType: "html",
			success: function(data){
				$('#msg').html('<div class="alert-box success radius flash-msg">Finalizando compra</div>');
				$('.flash-msg').delay(2000).fadeOut('slow');
				window.location.replace(basePath+"clientes-discos/muestracompra");
			},
			error: function(){
			 	alert('Tenemos problemas!!');
			}
		});
			
		return false;
	});

	$('.addpagocdvar').on('change', function(event){
		if($(this).val()=="paypal"){
			$.ajax({
				type: "POST",
				url: basePath+"cdvarios-clientes/formapago",
				data:{
					id:$(this).attr("id"),
					fpago:$(this).val()
				},
				dataType: "html",
				success: function(data){
					$('#msg').html('<div class="alert-box success radius flash-msg">Finalizando compra</div>');
					$('.flash-msg').delay(2000).fadeOut('slow');
					window.location.replace(basePath+"cdvarios-clientes/finalizacompra");
				},
				error: function(){
				 	alert('Tenemos problemas!!');
				}
			});
		}else{
			$.ajax({
				type: "POST",
				url: basePath+"cdvarios-clientes/formapago",
				data:{
					id:$(this).attr("id"),
					fpago:$(this).val()
				},
				dataType: "html",
				success: function(data){
					$('#msg').html('<div class="alert-box success radius flash-msg">Finalizando compra</div>');
					$('.flash-msg').delay(2000).fadeOut('slow');
					window.location.replace(basePath+"cdvarios-clientes/avisacompra");
					//window.location.replace(basePath+"pages/compracontrarremb");
				},
				error: function(){
				 	alert('Tenemos problemas!!');
				}
			});
		}
		
		return false;
	});
});
