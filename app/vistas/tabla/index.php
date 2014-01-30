
<h3>Listado de juegos</h3>

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
                <td>{$fila['fecha_de_lanzamiento']}</td>
                <td>{$fila['precio']}</td>
                <td>
                    <a href='?menu=tablas&submenu=form_modificar&id={$fila['id']}'><button>Modificar</button></a>
                    <a href='?menu=tablas&submenu=form_borrar&id={$fila['id']}'><button>Borrar</button></a>
                </td>
            </tr>";
        }
    
    ?>
</table>