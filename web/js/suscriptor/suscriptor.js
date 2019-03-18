$(document).ready(function () {
	$('#id_estado').change(function() {
		//token para acceder al controlador de YII
		token=$("input[name='_csrf']").val();
		$.ajax({
			url    : url_base + 'suscriptor/obtener-municipios',
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

    //Lanza modal para cargar cfdi
    $('#modal_btn').click(function(){
        $('#modal').find('.modal-header h5').text('Horarios de Atención');
        $('#modal').modal('show').find('#modal_content').load(
            $(this).attr('value')
        );
    });

    $("body").on("beforeSubmit", "form#form_suscriptor_horario", function (){
	    var form = $(this);
	    if (form.find(".has-error").length) {
		    return false;
	    }

	    $.ajax({
	      url    : form.attr("action"),
	      type   : "POST",
	      data   : form.serialize(),
	      dataType: "json",
	      success: function (response) {
	        /*if(response.error_sesion_ajax){
	          retornarLogin(response.error_sesion_ajax);
	        }*/
	        if(response.resultado){
	        	$('#des_lun_t_a').val(response.des_lun_t_a);
	        	$('#has_lun_t_a').val(response.has_lun_t_a);
	        	$('#des_mar_t_a').val(response.des_mar_t_a);
	        	$('#has_mar_t_a').val(response.has_mar_t_a);
	        	$('#des_mie_t_a').val(response.des_mie_t_a);
	        	$('#has_mie_t_a').val(response.has_mie_t_a);
	        	$('#des_jue_t_a').val(response.des_jue_t_a);
	        	$('#has_jue_t_a').val(response.has_jue_t_a);
	        	$('#des_vie_t_a').val(response.des_vie_t_a);
	        	$('#has_vie_t_a').val(response.has_vie_t_a);
	        	$('#des_sab_t_a').val(response.des_sab_t_a);
	        	$('#has_sab_t_a').val(response.has_sab_t_a);
	        	$('#des_dom_t_a').val(response.des_dom_t_a);
	        	$('#has_dom_t_a').val(response.has_dom_t_a);
	        	$('#labora_festivo').val(response.labora_festivo);
	        	$("#modal").modal("toggle");

		        console.log('éxito');
	        	
	        }
	      },
	      error: function (event, jqxhr, exception) {
	        //retornarLogin(jqxhr.status);
	      }
	    });
	    return false;
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