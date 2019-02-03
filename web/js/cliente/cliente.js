$(document).ready(function () {
	$('#id_estado').change(function() {
		//token para acceder al controlador de YII
		token=$("input[name='_csrf']").val();
		$.ajax({
			url    : url_base + 'cliente/obtener-municipios',
			type   : "POST",
			data   : {id_estado : $(this).val(), _csrf : token}, //Es enviada por default el tipo de codificación 1 (Compras)
			dataType: "json",
			success: function (response) {
				$('#id_municipio').empty();
				$('#id_municipio').html(llenarMunicipios(response));
			},
			error: function (event, jqxhr, exception) {
				retornarLogin(jqxhr.status);
			}
		});
	}); 
});

function llenarMunicipios(json){
  var html='';
  html+='<option value="">Seleccionar</option>'
  $.each( json , function(i, val) {
    html+='<option value="'+i+'">'+val+'</option>'
  });
  return html;
}