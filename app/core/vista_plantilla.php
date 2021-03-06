<?php
namespace core;

class Vista_Plantilla extends \core\Clase_Base
{
	/**
	 * Genera el código html y si buffer es true lo captura y lo devuelve por el return.
	 * 
	 * @param string $nombre Nombre del fichero que contiene la plantilla en la carpeta .../vistas/
	 * @param array $datos
	 * @param boolean $buffer Opcional. Por defecto es true, que activa la captura del buffer
	 * @return string Código <html>
	 * @throws \Exception
	 */
	public static function generar($nombre , array $datos = array(), $buffer = true) {
		$fichero_vista = strtolower(PATH_APP."vistas/$nombre.php");
		if ( ! file_exists($fichero_vista))
			throw new \Exception(__METHOD__." Error: no existe el fichero $fichero_vista .");
		if ($buffer) { 
			ob_start ();
		}
		
		include $fichero_vista; // Script cuya salida se va a bufferear
		
		if ($buffer) {
			return(ob_get_clean());
		}
	}
	
	
			
}