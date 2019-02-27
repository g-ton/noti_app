/*Verifica el tipo de error ajax y manda mensaje de error ó retorna a pantalla de login*/
//400 es el código que da el navegador cuando el servidor contesta incorrectamente (Bad request)
//302 es el código que da el navegador cuando el servidor contesta correctamente (found)
var retornarLogin = function(estatus) {
	if(estatus== 400){	
    	window.location = url_base + "login"; 	
    } else{
    	if(estatus!= 302 && estatus!= null){
    		swal("¡Error!", "Ha ocurrido un error, intente de nuevo más tarde.", "error");
    	}
    }
}