<?php

/**
 * tabla.php
 * 
 * @author Emilio Crespo Perán
 * @since 28/01/2014
 */

namespace controladores;

class tabla extends \core\Controlador {

    function index(array $datos = array()) {

        $obj = new \modelos\Datos_SQL();
        $obj::table('juegos');


        $clausulas['order_by'] = 'titulo';

        $datos["filas"] = $obj->select($clausulas);

        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos, true);

        $html = \core\Vista_Plantilla::generar("plantilla_principal", $datos);
        \core\HTTP_Respuesta::enviar($html);
    }

    function form_insertar(array $datos = array()) {

        $datos['form_name'] = __FUNCTION__;
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    function form_modificar(array $datos = array()) {

        $datos['form_name'] = __FUNCTION__;
        
        $datos['values']['id']=$_REQUEST['id'];
            
        $clausulas['where'] = $datos['values']['id'];
        if (!$filas = \modelos\Datos_SQL::select($clausulas, 'juegos')) {
            return \core\Distribuidor::cargar_controlador('errores', 'index', $datos);
        }
        else {
            // Los valores se guardan en el array $datos['values']
            $datos['values'] = $filas[0];
            
            // Cambio los formatos de fecha y precio
            $datos['values']['fecha_de_lanzamiento'] = \core\Conversiones::fecha_hora_mysql_a_es($datos['values']['fecha_de_lanzamiento']);
            $datos['values']['precio'] = \core\Conversiones::decimal_punto_a_coma($datos['values']['precio']);

            
            
        }
            
        
        
        
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
        
    }

    function form_borrar(array $datos = array()) {

        $datos['form_name'] = __FUNCTION__;
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
        
    }
    
    
    
    
    

    /**
     * 
     * @param array $datos Trae los datos insertados del formulario y los valida.
     */
    function form_insertar_validar(array $datos = array()) {



        $validaciones = array(
            "titulo" => "errores_requerido",
            "plataforma" => "errores_requerido",
            "fabricante" => "errores_requerido",
            "fecha_de_lanzamiento" => "errores_fecha_hora && errores_requerido",
            "precio" => "errores_precio && errores_requerido"
        );



        $validacion = !\core\Validaciones::errores_validacion_request($validaciones, $datos);

        if (!$validacion) {
            // print "-- Depuración: \$datos= "; print_r($datos);
            // Entra cuando hay errores y devuelve el formulario con los datos
            \core\Distribuidor::cargar_controlador("tabla", "form_insertar", $datos);
        } else {

            // Hacemos la conversión de la fecha a mysql y del precio
            $datos['values']['fecha_de_lanzamiento'] = \core\Conversiones::fecha_hora_es_a_mysql($datos['values']['fecha_de_lanzamiento']);
            $datos['values']['precio'] = \core\Conversiones::decimal_coma_a_punto($datos['values']['precio']);

            
            // Graba los datos en la tabla
            \modelos\Modelo_SQL::insert($datos["values"], 'juegos');


            \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("tabla"));
            \core\HTTP_Respuesta::enviar();
        }
    }

    function form_modificar_validar(array $datos = array()) {
        //print("entra");exit(0);
        $datos_update = array(
            //"id" =>                     $_POST['id'],
            "titulo" => $_POST['titulo'],
            "plataforma" => $_POST['plataforma'],
            "fabricante" => $_POST['fabricante'],
            "fecha_de_lanzamiento" => \core\Conversiones::fecha_hora_es_a_mysql($_POST['fecha']),
            "precio" => \core\Conversiones::decimal_coma_a_punto($_POST['precio'])
        );
        //print($datos_update['id']);exit;
        \modelos\Datos_SQL::update($datos_update, "juegos", $_POST['id']);

        // Redirige el formulario a la página tabla para evitar el reenvío del formulario
        \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("tabla"));
        \core\HTTP_Respuesta::enviar();
    }

    function form_borrar_validar(array $datos = array()) {

        $id_borrar = array("id" => $_POST['id']);
        //print("id a borrar: ".$_POST['id']);exit(0);

        \modelos\Datos_SQL::table("juegos")->delete($id_borrar);

        // Redirige el formulario a la página tabla para evitar el reenvío del formulario
        \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("tabla"));
        \core\HTTP_Respuesta::enviar();
    }

}
