<?php
//modifica el estado del pedido
$modificar=mysqli_connect("localhost","root","","respaldo_sistema");

mysqli_query($modificar,"update pedido set id_estado_pedido='2' where id_pedido='$_GET[id_pedido]'");

header("location: ../registro_pedidos.php");
exit;
?>