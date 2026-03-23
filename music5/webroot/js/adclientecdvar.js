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

	var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
});