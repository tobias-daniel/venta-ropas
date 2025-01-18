<?php
$mi_base=mysqli_connect("localhost","root","","respaldo_sistema");
$variable=$_POST['palabra'];
$guardar=mysqli_query($mi_base,"select * from producto inner join categoria on categoria.id_categoria=producto.id_categoria 
inner join talles on talles.id_talle=producto.id_talle where nombre_producto like '%$variable%'");

while($mirar=mysqli_fetch_array($guardar)){
    echo '<tr style="background-color:aquamarine;">
            <td><b>' .$mirar['id_producto'].'</b></td> 
            <td><b>' .$mirar['nombre_producto'].'</b></td> 
            <td><b>' .$mirar['nombre_categoria'].'</b></td> 
            <td><b>' .$mirar['talle']. '</b></td> 
            <td><b>' ."$".$mirar['precio_unitario'].'</b></td> 
            <td><b>' .$mirar['cantidad_producto'].'</b></td> 
            <td><b><a href="compra_manual.php?id='.$mirar['id_producto'].'">SELECCIONAR</a></b></td> 
        </tr>';
}
?>