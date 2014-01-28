<!DOCTYPE HTML>
<html>
	<head>
            <title><?php echo TITULO; ?></title>
		<meta name="Description" content="Explicaci�n de la p�gina" /> 
		<meta name="Keywords" content="palabras en castellano e ingles separadas por comas" /> 
		<meta name="Generator" content="con qu� se ha hecho" /> 
	 	<meta name="Origen" content="Qu�en lo ha hecho" /> 
		<meta name="Author" content="nombre del autor" /> 
		<meta name="Locality" content="Madrid, Espa�a" /> 
		<meta name="Viewport" content="maximum-scale=10.0" /> 
		<meta name="revisit-after" content="1 days" /> 
		<meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
		<meta http-equiv="Content-Type" content="text/html;charset=utf8" />
		
		<link href="<?php echo URL_ROOT; ?>favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link href="<?php echo URL_ROOT; ?>favicon.ico" rel="icon" type="image/x-icon" /> 
		
				
		<!-- Importo los CSS que tendrá la plantilla_principal y el que cargará con cada sección -->
		<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/principal.css" />
						
	</head>

	<body>
	
	    <div id="encabezado">
                <h1>Table CRUD Emilio Crespo Perán</h1>
		
		
		    <a href="<?php echo \core\URL::generar("inicio"); ?>"><div id="btn_menu"><img src="<?php echo URL_ROOT; ?>recursos/imagenes/btn_home2.jpg" />Inicio</div></a>                
		    <a href="<?php echo \core\URL::generar("tabla"); ?>"><div id="btn_menu">Tabla</div></a>
		                
		   		   
	    </div>
	    
	    <div id="cuerpo">
		<div id="contenido">
		    <?php 
			echo $datos['view_content'];
		    ?>
		</div>
	    </div>
	    
	    <div id="pie">
		
		Desarrollado por Emilio Crespo Perán &copy;</br>
		Última modificación: 27/11/2013</br>
                <a href="mailto:emilio_nfs@hotmail.es">Contacto</a>
		
	    </div>
	    
	</body>

</html>