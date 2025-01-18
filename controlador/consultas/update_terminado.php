<?php
$conectar=mysqli_connect("localhost","root","","respaldo_sistema") or die ("problema en la conexion");

mysqli_query($conectar,"update producto set nombre_producto='$_REQUEST[nuevo_nombre]'
, precio_unitario='$_REQUEST[nuevo_precio]' where id_producto='$_REQUEST[ID]'")
or die ("Problemas en el select:" . mysqli_error($conectar));

header("Location: ../registro_total_prod.php");
exit;
?>