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
        
        
        
	$datos['form_name'] = __FUNCTION__;
	$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
	
	
    }
    
    
    function form_borrar(array $datos = array()){
       
	
	
	$datos['form_name'] = __FUNCTION__;
	$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
        
    }
    
    
    function form_validado_insertar(array $datos = array()){
        
        $datos_insert = array(
            "titulo" =>                 $_POST['titulo'],
            "plataforma" =>             $_POST['plataforma'],
            "fabricante" =>             $_POST['fabricante'],
            "fecha_de_lanzamiento" =>   $_POST['fecha'],
            "precio" =>                 $_POST['precio']
        );
        
        //print("<pre>");var_dump($datos_insert);print("</pre>");exit;
        
        if(! \modelos\Datos_SQL::table("juegos")->insert($datos_insert) ){
            $datos = array("alerta" => "Error al grabar los datos");
			// Definir el controlador que responderá después de la inserción
			return $this->cargar_controlador('tabla', 'form_insertar',$datos);
        }
        else{
            
            $datos = array("alerta" => "Éxito al grabar los datos.");
			// Definir el controlador que responderá después de la inserción
			return $this->cargar_controlador('tabla', 'index',$datos);	
            
        }
        
        
    }
    
    function form_validado_modificar(array $datos = array()){
        
        $datos_update = array(
            "id" =>                     $_POST['id'],
            "titulo" =>                 $_POST['titulo'],
            "plataforma" =>             $_POST['plataforma'],
            "fabricante" =>             $_POST['fabricante'],
            "fecha_de_lanzamiento" =>   $_POST['fecha'],
            "precio" =>                 $_POST['precio']
        );
        print($datos_update['id']);exit;
        if(! \modelos\Datos_SQL::table("tabla")->update($datos_update) ){
            $datos = array("alerta" => "Error al grabar los datos");
			// Definir el controlador que responderá después de la inserción
			return $this->cargar_controlador('tabla', 'form_insertar',$datos_update);
        }
        else{
            
            $datos = array("alerta" => "Éxito al grabar los datos.");
			// Definir el controlador que responderá después de la inserción
			return $this->cargar_controlador('tabla', 'index',$datos);	
            
        }
        
        
    }
    
    function form_validado_borrar(array $datos = array()){
        
        $datos_delete = array(
            "titulo" =>                 $_POST['titulo'],
            "plataforma" =>             $_POST['plataforma'],
            "fabricante" =>             $_POST['fabricante'],
            "fecha_de_lanzamiento" =>   $_POST['fecha'],
            "precio" =>                 $_POST['precio']
        );
        
        if(! \modelos\Datos_SQL::delete($datos_delete, 'tabla') )
                $datos = array("alerta" => "Error al borrar los datos");
        
        else            
                $datos = array("alerta" => "Éxito al borrar los datos.");
        
        
        return $this->cargar_controlador('tabla', 'index',$datos);	
        
    }
    
}