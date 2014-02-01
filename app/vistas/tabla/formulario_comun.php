
<form method='post' name='<?php echo $datos['form_name']; ?>' action="<?php echo $_GET['p2']."_validar"; ?>" >
	
	<?php echo \core\HTML_Tag::form_registrar("formulario", "post"); ?>
	
	<input id='id' name='id' type='hidden' value='<?php echo \core\Array_Datos::values('id', $datos); ?>' />
	Nombre: <input id='nombre' name='nombre' type='text' size='100'  maxlength='100' value='<?php echo \core\Array_Datos::values('nombre', $datos); ?>'/>
	
	<br />
	Descripcion:<br />
	<textarea id='descripcion' name='descripcion' type='textarea' cols='100'  rows='10' ><?php echo \core\Array_Datos::values('descripcion', $datos); ?></textarea>
	<?php echo \core\HTML_Tag::span_error('descripcion', $datos); ?>

	<br />
	
	<input type='submit' value='Enviar'>
	<input type='reset' value='Limpiar'>
	<button type='button' onclick='location.assign("tabla");'>Cancelar</button>
</form>
<?php if ($_GET['p2'] == ("form_insertar" || "form_modificar")): ?>
    <script type="text/javascript">
	
	
	
    </script>	
<?php endif; ?>