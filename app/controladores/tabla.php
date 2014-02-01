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
        
	
	$clausulas['order_by'] = 'precio desc';
	
        $datos["filas"] = $obj->select($clausulas);
        
        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos, true);
        
        $html = \core\Vista_Plantilla::generar("plantilla_principal", $datos);
        \core\HTTP_Respuesta::enviar($html);
        
    }
    
    function form_insertar(array $datos = array()){
	$datos['form_name'] = __FUNCTION__;
	$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
    }
	    
    
    function form_modificar(array $datos = array()){
        
        /*
       $datos['view_content'] = "El id de la fila a modificar es -> ".$_GET['p3'];
        
	//$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
	//	print("<pre>");var_dump($_GET);print("</pre>");
	$controlador =	isset($_GET['menu'])?	$_GET['menu']:	    $_GET['p1'];
	$metodo =	isset($_GET['submenu'])?$_GET['submenu']:   $_GET['p2'];
	$id =		isset($_GET['id'])?	$_GET['id']:	    $_GET['p3'];
	
	$_GET['p3'] = "";
	
        $contenido = \core\Vista_Plantilla::generar("plantilla_principal",$datos);
        \core\HTTP_Respuesta::enviar($contenido);*/
        
	$datos['form_name'] = __FUNCTION__;
	$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
	
	
    }
    
    
    function form_borrar(array $datos = array()){
        /*
        
        $datos['view_content'] = var_dump($_POST);
        
        $contenido = \core\Vista_Plantilla::generar("plantilla_principal",$datos);
        \core\HTTP_Respuesta::enviar($contenido);*/
	
	
	$datos['form_name'] = __FUNCTION__;
	$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
        
    }
    
    
    
}