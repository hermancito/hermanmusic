$(document).ready(function(){
	$('.numeric').on('change', function(event){
		var cantidad=Math.round($(this).val());
		if(cantidad<=0 || isNaN(cantidad)){
			cantidad=1;
			$(this).val(1);
		}
		ajaxupdate($(this).attr("data-id"), cantidad);
	});

	function ajaxupdate(id, cantidad){
		$.ajax({
			type: "POST",
			url: basePath+"carritos/itemupdate",
			data: {
				id: id,
				cantidad: cantidad
			},
			dataType: "json",
			success: function(data){
				if($('#subtotal_'+data.mostrar_pedido.id).html() != data.mostrar_pedido.subtotal){
					$('#subtotal_'+data.mostrar_pedido.id).html(data.mostrar_pedido.subtotal+' €').animate({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);
				}
				$('#total').html(data.mostrar_pedido.total+' €').animate({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);
			}
		});
	}

	$(".remove").click(function(){
		//creamos una función ajaxcart con parámetros; el id y la cantidad que ponemos a cero
		ajaxcart($(this).attr("id"), 0);
		return false;
	});

	function ajaxcart(id, cantidad){
		//al clickar sobre la papelera estamos poniendo la cantidad en cero
		if(cantidad === 0){
			$("#row-"+id).fadeOut(1000, function(){$("#row-"+id).remove();});
		}

		$.ajax({
			type: "POST",
			url: basePath + "carritos/remove",
			data: {
				id: id
			},
			dataType: "json",
			success: function(data){

				$('#msg').html('<div class="alert-box alert">Disco eliminado del carrito</div>');
				$('.flash-msg').delay(2000).fadeOut('slow');

				$("#total").html(data.mostrar_pedido.total).animate({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);
			
				if(data.pedidos==""){
					window.location.replace(basePath+"discos/tienda");
				}
			},
			error: function(){
				alert("Tenemos problemas");
			}
		});
	}

});