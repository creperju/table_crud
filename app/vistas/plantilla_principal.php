<!DOCTYPE HTML>
<html lang="es">
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
		<script type='text/javascript' src="<?php echo URL_ROOT."recursos/js/jquery/jquery-1.10.2.min.js"; ?>" ></script>
                
		<script type="text/javascript">
		
		    function cambiar_btn_menu(menu,tipo){
                            var enlace = "<?php echo URL_ROOT; ?>recursos/imagenes/btn_"+menu;

                            switch(tipo){
                                case 'in':
                                    document.getElementById("btn_"+menu).style.backgroundColor = "#188DB8";			
                                    document.getElementById("img_"+menu).src = enlace+"_activo.gif";
                                    break;
                                case 'out':
                                    document.getElementById("btn_"+menu).style.backgroundColor = '#3299BB';			
                                    document.getElementById("img_"+menu).src = enlace+"_inactivo.gif";
                                    break;
                            }
	
		    }
		
                    
                    function submit_post_request_form(action, id) {
                        
                            $("#post_request_form").attr("action",action);
                            $("#id").attr("value", id);
                            $("#post_request_form").submit();
					
                    }
                
                
		</script>
		
	</head>

	<body>
	
	    <div id="encabezado">
                <h1>Table CRUD Emilio Crespo Perán</h1>		
		    
		<a href="<?php echo \core\URL::generar("inicio"); ?>">
		    <div class="btn_menu" id="btn_inicio"
			 onmouseover="cambiar_btn_menu('inicio','in');"
			 onmouseout="cambiar_btn_menu('inicio','out');">
			<img class="img_btn_menu" id="img_inicio" src="<?php echo URL_ROOT; ?>recursos/imagenes/btn_inicio_inactivo.gif"/>
			<span>Inicio</span>
		    </div>
		</a>        
		
		<a href="<?php echo \core\URL::generar("tabla"); ?>">
		    <div class="btn_menu" id="btn_tabla"
			 onmouseover="cambiar_btn_menu('tabla','in');"
			 onmouseout="cambiar_btn_menu('tabla','out');">
			<img class="img_btn_menu" id="img_tabla" src="<?php echo URL_ROOT; ?>recursos/imagenes/btn_tabla_inactivo.gif"/>
			<span>Tabla</span>
		    </div>
		</a>   
		
	    </div>
	    
	    <div id="cuerpo">
		<div id="contenido">
		    <?php 
			echo $datos['view_content'];
		    ?>
		</div>
	    </div>
	    
	    <div id="pie">
		
		Sitio Web desarrollado por Emilio Crespo Perán &copy;</br>
		Última modificación: 06/02/2014</br>
                <a class="contacto" href="mailto:emilio_nfs@hotmail.es">Contacto</a>
		
	    </div>
	    
	</body>

</html>