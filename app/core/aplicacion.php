<?php

/**
 * aplicacion.php
 * 
 * Aplicación principal
 *
 * @author Emilio Crespo Perán
 * @since 28/01/2014
 */

namespace core;

class Aplicacion extends \core\Clase_Base {

    /**
     * Almacenará el objeto resultado de instanciar la clase Controlador que se encargará
     * de atender la petición HTTP recibida.
     * 
     * @var \core\Controlador 
     */
    public static $controlador;

    public function __construct() {

        // Interpretar url amigable, pasa parmametros /dato1/dato2/dato3/ 
        // a parámetros $_GET[p1]=dato1 $_GET[p2]=dato2  $_GET[p3]=dato3 ....
        \core\Rutas::interpretar_url_amigable();

        // Se conecta a la base de datos
        \core\sgbd\bd::connect();

        // Distribuidor
        \core\Distribuidor::estudiar_query_string();

        // Cerrar conexión a la base de datos
        \core\sgbd\bd::disconnect();
    
        
    }// Fin del método iniciar

}// Fin de la clase