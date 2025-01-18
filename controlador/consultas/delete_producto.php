<?php
$eliminar=mysqli_connect("localhost","root","","respaldo_sistema") or die ("error en la conexion");

$comprobar=mysqli_query($eliminar,"select id_producto from detalle_factura");
while($a=mysqli_fetch_array($comprobar)){
    if($_GET['ID']==$a['id_producto']){
        header("location:registro_total_prod.php?ERROR");
        exit;
    }
}

mysqli_query($eliminar,"delete from producto where id_producto='$_GET[ID]'") or die 
("problemas de la query".mysqli_error($eliminar));

header("location: ../registro_total_prod.php");
exit;
?>
