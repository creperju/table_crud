
<?php 
    
    $metodo = isset($_GET['p2'])?$_GET['p2']:$_GET['submenu'];
    
    if(preg_match("/^form_modificar$/i", $metodo) || preg_match("/^form_borrar$/i", $metodo)){
            $id_fila = isset($_POST['id'])?$_POST['id']: \core\Distribuidor::cargar_controlador("errores", "index");
            $obj = new \modelos\Datos_SQL();
            $obj::table('juegos');
            $clausulas['where'] = $id_fila;
	
            $fila = $obj->select($clausulas);
           
    }
    


?>

<?php if(preg_match("/^form_insertar$/i", $metodo)): ?>
        <form method='post' name='<?php echo $datos['form_name']; ?>' action="form_validado_insertar"  >
<?php endif; ?>

<?php if(preg_match("/^form_modificar$/i", $metodo)): ?>
        <form method='post' name='<?php echo $datos['form_name']; ?>' action="form_validado_modificar"  >
<?php endif; ?>
            
<?php if(preg_match("/^form_borrar$/i", $metodo)): ?>
        <form method='post' name='<?php echo $datos['form_name']; ?>' action="form_validado_borrar" >
<?php endif; ?>
	
    
	<?php echo \core\HTML_Tag::form_registrar("formulario", "post"); ?>
	 
	<input id='id' name='id' type='hidden' value='<?php echo \core\Array_Datos::values('id', $datos); ?>' />
	
	
	<br />
        
        T&iacute;tulo: <input id='titulo' name='titulo' type='text' size='20'  maxlength='30' value='<?php echo isset($fila[0]['titulo'])?$fila[0]['titulo']:""; ?>' onblur="v_vacio('titulo');"/>
        
        <span id="error_titulo"></span>
        
        
        <br/>
        Plataforma:<input id='plataforma' name='plataforma' type='text' size='20'  maxlength='20' value='<?php echo isset($fila[0]['plataforma'])?$fila[0]['plataforma']:""; ?>' onblur="v_vacio('plataforma');"/>
        
        <span id="error_plataforma"></span>
        
        <br/>
        Fabricante:<input id='fabricante' name='fabricante' type='text' size='20'  maxlength='20' value='<?php echo isset($fila[0]['fabricante'])?$fila[0]['fabricante']:""; ?>' onblur="v_vacio('fabricante');"/>
        
        
        <span id="error_fabricante"></span>
        
        <br/>
        Fecha de lanzamiento:<input id='fecha' name='fecha' type='text' size='10'  maxlength='10' value='<?php echo isset($fila[0]['fecha_de_lanzamiento'])?$fila[0]['fecha_de_lanzamiento']:""; ?>'/>
        
        <span id="error_fecha"></span>
        
        
        <br/>
        Precio:<input id='precio' name='precio' type='text' size='10'  maxlength='10' value='<?php echo isset($fila[0]['precio'])?$fila[0]['precio']:""; ?>'/>&euro;
        
        <span id="error_precio"></span>
        
        
        
        <p>  
	
            
            <input type='submit' value='Enviar' />
            <?php if(preg_match("/^form_insertar$/i", $metodo)): ?>
                <input type='reset' value='Reiniciar' />
            <?php endif; ?>
            <input type="button" value="Cancelar" onclick='window.location.assign("<?php echo \core\URL::generar("tabla"); ?>");' />
            
            
        </p>
</form>
<?php if ($_GET['p2'] == ("form_insertar" || "form_modificar")): ?>
    <script type="text/javascript">
	
        var titulo, plataforma, fabricante, fecha, precio;
        
	function validar(){
            if( titulo && plataforma && fabricante && fecha && precio)
                return true;
            else{
                return false;            
                alert("Corrige los errores");
            }
        }
        
        
        
        function v_vacio(dato){
            
            document.getElementById("error_"+dato).innerHTML = "";
            
            titulo = document.getElementById(dato).value;
            patron = /^\w$/;
            
            if(patron.test(titulo)){
                titulo = true;
               
            }
            else{
                titulo = false;
                document.getElementById("error_"+dato).innerHTML = "El "+dato+" no debe estar vac&iacute;o.";
            }
                
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
	
    </script>	
<?php endif; ?>