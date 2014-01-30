<?php

/**
 * configuracion.php
 * 
 * Configuración de los parámetros por defecto de la aplicación.
 * 
 * @author Emilio Crespo Perán
 */

namespace core;

class Configuracion {
	
	public static $controlador_por_defecto = 'Inicio';
	
	public static $metodo_por_defecto = 'index';
	
	public static $plantilla_por_defecto = 'plantilla_principal';
	
	public static $sesion_minutos_inactividad = 20; // Minutos
	
	public static $sesion_minutos_maxima_duracion = 120;
	
	public static $url_amigable = true;
	
	public static $https_login = false;
	
	
	/**
	 *
	 * @var string Tipo MIME utilizado por defecto.
	 */
	public static $tipo_mime_por_defecto = 'text/html';
	
	/**
	 *
	 * @var array = Colección de tipos MIME soportados por esta aplicación. 
	 */
	public static $tipos_mime_reconocidos = array(
		'text/html', 'text/xml', 'text/json', 'application/excel', 
	);
	
	
	/**
         * Datos de configuración del servidor.
         * @var array = Colección de datos aportados para el servidor local o externo.
         */
	public static $db = array(
		'server'   => 'localhost',
		'user'     => 'daw2_user',
		'password' => 'daw2_user',
		'db_name'  => 'daw2',
		'prefix_'  => 'daw2_'
	);
	

	// hostinger
//	public static $db = array(
//		'server'   => 'mysql.hostinger.es',
//		'user'     => 'u452950836_daw2',
//		'password' => 'u452950836_daw2',
//		'db_name'   => 'u452950836_daw2',
//		'prefix_'  => 'daw2_'
//	);
	
	
} // Fin de la clase 
