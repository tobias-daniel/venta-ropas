<?php
$base_datos=mysqli_connect("localhost","root","","respaldo_sistema");
$nombre=$_FILES['imagen']['name'];
$ruta_temporal=$_FILES['imagen']['tmp_name'];
$direccion="imagenes/".$nombre;
move_uploaded_file($ruta_temporal,$direccion);
// copy($_FILES['imagen']['tmp_name'], $_FILES['imagen']['name']);
// $nombre_img=$_FILES['imagen']['name'];
echo $direccion;
mysqli_query($base_datos,"insert into producto (nombre_producto,precio_unitario,cantidad_producto,id_categoria,id_talle,imagen) 
values ('$_REQUEST[nombre_producto]','$_REQUEST[precio_unitario]','$_REQUEST[cantidad]',
'$_REQUEST[id_categoria]','$_REQUEST[id_talle]','$direccion')") or die (mysqli_error($base_datos));

header("location: ../registro_total_prod.php");
exit;
?>