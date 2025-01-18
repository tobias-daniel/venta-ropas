<?php
$mi_base=mysqli_connect("localhost","root","","respaldo_sistema");
$variable=$_POST['palabra'];
$guardar=mysqli_query($mi_base,"select * from producto inner join categoria on categoria.id_categoria=producto.id_categoria 
inner join talles on talles.id_talle=producto.id_talle where nombre_producto like '%$variable%'");

while($mirar=mysqli_fetch_array($guardar)){
    echo '<tr>
            <td>' .$mirar['id_producto'].'</td>
            <td>' .$mirar['nombre_producto'].'</td>
            <td>' .$mirar['nombre_categoria'].'</td>
            <td>' .$mirar['talle']. '</td>
            <td>' ."$".$mirar['precio_unitario'].'</td>
            <td>' .$mirar['cantidad_producto'].'</td>
            <td><a href="venta_manual.php?id_producto='.$mirar['id_producto'].'">SELECCIONAR</a></td> 
        </tr>';
}
?>