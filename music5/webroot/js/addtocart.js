// $(document).ready(function(){
// 	$('.addtocart').on('click', function(event){
// 		$.ajax({
// 			type: "POST",
// 			url: basePath+"carritos/additem",
// 			data:{
// 				id:$(this).attr("id"),
// 				cantidad: 1
// 			},
// 			dataType: "html",
// 			success: function(data){
// 				$('#msg').html('<div class="alert-box success radius flash-msg">Disco agregado al carrito</div>');
// 				$('.flash-msg').delay(2000).fadeOut('slow');
// 			},
// 			error: function(){
// 			 	alert('Tenemos problemas!!');
// 			}
// 		});
// 		return false;
// 	});
// });

$(document).ready(function(){
	$('.addtocart').on('click', function(event){
		$.ajax({
			type: "POST",
			url: basePath+"discos/addisco",
			data:{
				id:$(this).attr("id"),
				cantidad: 1
			},
			dataType: "html",
			success: function(data){
				$('#msg').html('<div class="alert-box success radius flash-msg">Disco agregado al carrito</div>');
				$('.flash-msg').delay(2000).fadeOut('slow');
			},
			error: function(){
			 	alert('Tenemos problemas!!');
			}
		});
		return false;
	});

	
});