<?php

namespace app\utilidades;

use Yii;

/**
 * Clase que contiene expresiones regulares
 */
class UtilidadesExpReg
{
	#RFC válido ante el SAT
    const RFC = '/^([A-ZÑa-zÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Za-z\d]{3})?$/';
    
    #Carácteres que NO sean un dígito del 1 al 9
    const NO_NUMERICO = '/[^0-9]/';

    #Un sólo Carácter que comprenda del 1 al 9, ej válido: 1 - ej inválido: 23
    const CARACTER_NUMERICO = '/^[1-9]$/';

    #Un sólo Carácter que comprenda .,/- , ej válido: . - ej inválido: a
    const CARACTER_SIMBOLO = '/^[.,\/\-]$/';
    
    #Carácteres numéricos del 1 al 9 separados por una coma (Símbolo), ej válido: 9,9,9,9 - ej inválido: 9a
    const CARACTERES_NUMERICO_SIMBOLO = '/^([1-9],?)+$/';
    #
    const UUID = '/[a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12}$/';
    
    #Contraseña con mínimo de 8 caracteres, al menos una letra Minúscula, una letra Mayúscula, un Número y un Caracter especial
    const CLAVE = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d])[\s\S]{8,250}$/';
}