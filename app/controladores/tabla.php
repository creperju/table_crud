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
    
    
    function form_modificar(array $datos = array()){
        
        
        $datos['view_content'] = "El id de la fila a modificar es -> ".$datos['values']['id'];
        
        $contenido = \core\Vista_Plantilla::generar("plantilla_principal",$datos);
        \core\HTTP_Respuesta::enviar($contenido);
        
    }
    
    
    function form_borrar(array $datos = array()){
        
        $id = self::get_id();
        
        $datos['view_content'] = "El id de la fila a modificar es -> ".$id."<br/>
                     La URL es -> ".$_GET['p1']."/".$_GET['p2']."/".$_GET['p3'];
        
        $contenido = \core\Vista_Plantilla::generar("plantilla_principal",$datos);
        \core\HTTP_Respuesta::enviar($contenido);
        
    }
    
    
    
}