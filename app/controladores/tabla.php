<?php

/**
 * tabla.php
 * 
 * @author Emilio Crespo Perán
 * @since 28/01/2014
 */

namespace controladores;

class tabla extends \core\Controlador {
    
    
    function index(array $datos = array ()){
	
	$obj = new \modelos\Datos_SQL();
        $obj::table('juegos');
        
        $datos["filas"] = $obj->select();
        
        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos, true);
        
        $html = \core\Vista_Plantilla::generar("plantilla_principal", $datos);
        \core\HTTP_Respuesta::enviar($html);
        
    }
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

