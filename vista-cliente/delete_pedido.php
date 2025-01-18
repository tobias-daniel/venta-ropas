<?php

$eliminar=mysqli_connect("localhost","root","","respaldo_sistema") or die ("problemas en la conexion");
$ver=mysqli_query($eliminar,"select id_estado_pedido from pedido where pedido.id_pedido='$_REQUEST[id_pedido]'");
$convertir=mysqli_fetch_array($ver);
if($convertir['id_estado_pedido']==1){
    //DELETE detalle_pedido,pedido FROM detalle_pedido INNER JOIN pedido WHERE detalle_pedido.id_pedido=$_REQUEST[id_pedido];
    mysqli_query($eliminar,"delete from detalle_pedido where detalle_pedido.id_pedido='$_REQUEST[id_pedido]'");
    mysqli_query($eliminar,"delete from pedido where pedido.id_pedido='$_REQUEST[id_pedido]'");
    
    header("location: pagina_pedido.php?eliminado");
    exit;
}else{
    header("location:pagina_pedido.php?no se puede eliminar ya");
    exit;
}
?>