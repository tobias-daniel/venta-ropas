<?php
$update_t=mysqli_connect("localhost","root","","respaldo_sistema") or die ("error de conexion");
mysqli_query($update_t,"update persona set nombre='$_REQUEST[nombre]', telefono='$_REQUEST[telefono]', 
email='$_REQUEST[email]', direccion='$_REQUEST[direccion]' where id_persona='$_REQUEST[ID]'");

header("location:../proveedores.php?LISTO");
exit;
?>