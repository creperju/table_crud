
<h3>Listado de juegos<h4><a href="form_insertar">A&ntilde;adir juego</a></h4></h3>

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
                    <a href='".\core\URL::generar('tabla/form_modificar/'.$fila['id'])."'><button>Modificar</button></a>
                    <a href='".\core\URL::generar('tabla/form_borrar/'.$fila['id'])."'><button>Borrar</button></a>
                </td>
            </tr>";
        }
    
    ?>
    <tr>
        <td colspan="6"><a href="form_insertar"><button>A&ntilde;adir juego</button></a></td>
    </tr>
</table>