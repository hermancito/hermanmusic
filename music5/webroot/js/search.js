$(document).ready(function(){
	$("#s").autocomplete({
		minLength: 2,
		select: function(event, ui){
			$("#s").val(ui.item.label);
		},
		source: function(request, response){
			$.ajax({
				url: basePath + "discos/searchjson",
				data: {
					term: request.term
				},
				dataType: "json",
				success: function(data){
					//map() nos convierte un objeto (data) en datos independientes
					response($.map(data, function(el, index){
						return {
							value: el.banda,
							nombre: el.name,
							portada: el.portada,
							//portada_dir: el.portada_dir
						}
					}));
				}
			});
		}
	}).data("ui-autocomplete")._renderItem = function(ul, item){
		return $("<li></li>")
		.data("item.autocomplete", item)
		.append("<a><img width='40' src='"+basePath+"files/Discos/portada/"+item.portada+"'/>"+item.value+": "+item.nombre+"</a>")
		.appendTo(ul)
	}
});
