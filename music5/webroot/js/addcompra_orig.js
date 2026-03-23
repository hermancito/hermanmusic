$(document).ready(function(){
	$('.addcompra').on('click', function(event){
		$('#conf').val(1);
	});
	$('.grabacompra').on('click', function(event){
		$('#conf').val(0);
	});
});