<?php
$inicio=mysqli_connect("localhost","root","","respaldo_sistema");

$mi_busqueda=$_POST['buscar'];

$resultados=mysqli_query($inicio,"select * from producto inner join categoria on categoria.id_categoria=producto.id_categoria inner join talles on talles.id_talle=producto.id_talle
where nombre_producto like '%$mi_busqueda%'") 
or die (mysqli_error($inicio));

while($mirar=mysqli_fetch_array($resultados)){
    echo '<tr>
            <td>' .$mirar['id_producto'].'</td>
            <td>' .$mirar['nombre_producto'].'</td>
            <td>' .$mirar['nombre_categoria'].'</td>
            <td>' .$mirar['talle'].'</td>
            <td>' ."$".$mirar['precio_unitario'].'</td>
            <td>' .$mirar['cantidad_producto'].'</td>
            <td>
                <a href="update_producto.php?ID=' .$mirar['id_producto'].'"><img src="https://cdn-icons-png.flaticon.com/512/126/126794.png" alt="editar" width="18px" height="18px"></a>
                <a href="delete_producto.php?ID=' .$mirar['id_producto'].'"><img src="https://cdn-icons-png.flaticon.com/512/121/121113.png" alt="eliminar" width="18px" height="18px"></a>
            </td>
        </tr>';
}
?>