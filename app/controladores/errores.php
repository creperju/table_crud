<?php

/**
 * errores.php
 * 
 * Clase usada para mostrar cualquier error ocasionado en la aplicación.
 * 
 * @author Emilio Crespo Perán
 * @since 28/01/2014
 */

namespace controladores;

class errores extends \core\Controlador {
    
    
    /**
     * Su único contenido es el que se genera y muestra el texto 'Documento no encontrado'
     * 
     * @param array $datos
     */
    public function index(array $datos = array()){
	
	$datos['view_content'] = "Documento no encontrado.";
	
	$http_enviar_error = \core\Vista_Plantilla::generar("plantilla_principal", $datos, true);
	\core\HTTP_Respuesta::set_http_header_status("404");
	\core\HTTP_Respuesta::enviar($http_enviar_error);
	
    }
    
}