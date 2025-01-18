<?php
$base=mysqli_connect("localhost","root","","respaldo_sistema") or die('error de conexion');
$revisar=mysqli_query($base,"select id_persona from cabecera_factura") or die (mysqli_error($base));

while($rec=mysqli_fetch_array($revisar)){
    if($_GET['id']==$rec['id_persona']){
        header("location:proveedores.php?ERROR");
        exit;
    }
}

$eliminar=mysqli_query($base,"delete from persona where id_persona='$_GET[id]'") 
or die ("error en la eliminacion: ".mysqli_error($base));
header("location:../proveedores.php");
exit;
?>