<form id='post_request_form'
				action=''  
				method='post'
			><input name='id' id='id' type='hidden' />
</form>
<h3>Listado de juegos<h4><a onclick="">A&ntilde;adir juego</a></h4></h3>

<table border="1">
    <tr>
        <th>T&iacute;tulo</th>
        <th>Plataforma</th>
        <th>Fabricante</th>
        <th>Fecha de lanzamiento</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>
    <?php
    
        foreach($datos["filas"] as $fila){
            echo
            "<tr>
                <td>{$fila['titulo']}</td>
                <td>{$fila['plataforma']}</td>
                <td>{$fila['fabricante']}</td>
                <td>".\core\Conversiones::fecha_hora_mysql_a_es($fila['fecha_de_lanzamiento'])."</td>
                <td>€  ".\core\Conversiones::decimal_punto_a_coma($fila['precio'])."</td>
                <td>
                    ".\core\HTML_Tag::a_boton("boton", array("tabla", "form_modificar", $fila['id']), "Modificar")."<br/>"
                        .\core\HTML_Tag::a_boton("boton", array("tabla", "form_borrar", $fila['id']), "Borrar")."
                    
                </form></td>
            </tr>";
        }
        echo "<tr>
                <td colspan='6'>
                    <a href='".URL_ROOT."tabla/form_insertar'><button>A&ntilde;adir juego</button></a>
                </td>
            </tr>";
    ?>
    
</table>

