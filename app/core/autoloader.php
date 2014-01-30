<?php

/** 
 * autoloader.php
 * 
 * Esta clase define un autocargador que cargará correctamente clases que se
 * instancien así new \nombre_namespace\nombre_clase(), donde nombre_namespace
 * será el nombre del namespace del fichero que contiene la clase, y también
 * será el nombre de la carpeta contenida en ...\app y que contiene el fichero
 * php con la clase (...\app\nombre_namespace\nombre_clase.php)
 * 
 * @author Emilio Crespo Perán
 * @since 28/01/2014
 */

namespace core;

class Autoloader {

    /**
     * Función con la que se inicia la autocarga de clases.
     */
    function __construct() {
        
	spl_autoload_register(array($this, 'autoload'));
    }
    
    
    /**
     * Carga las clases que no hayan sido ejecutadas en el hilo de ejecución de la aplicación. 
     * @param string $clase_nombre Nombre de la clase para cargar.
     * @return boolean Si la clase ya ha sido cargada, no devuelve nada.
     * @throws \Exception Si no existe la clase.
     */
    function autoload($clase_nombre) {

	// Si la clase existe es que ya está cargada y no hace falta incluirla
	if (class_exists($clase_nombre)) {
            print("ya esta cargada la clase ".$clase_nombre."<br/>");
	    return;
	}

	// Sustituir las \ que separan el namespaces del nombre de la clase por DS que separa carpetas
	$clase_nombre = str_replace(array("\\"), array(DS), $clase_nombre);
         //  print("nombre de la clase ".$clase_nombre."<br/>");
	$fichero_clase = strtolower(PATH_APP . $clase_nombre . ".php");
         // print("fichero de la clase ".$fichero_clase."<br/>");
	if (!file_exists($fichero_clase)) {
	    
	    $clase_nombre = str_replace(
		    array("controlador"), array("controladores"), $clase_nombre
	    );
	    $fichero_clase = PATH_APP . $clase_nombre . ".php";
	}

	        
        // Si existe el fichero, lo incluye una vez y si no lanza una excepción.
	if (file_exists($fichero_clase)) {  
            require_once $fichero_clase;             
        }
	else { 
            throw new \Exception(__METHOD__ . ": NO EXISTE \$fichero_clase= $fichero_clase");             
        }
    
    } // Fin de la función autoload

}// Fin de la clase autoloader.php