<?php
session_start();
$conectar=mysqli_connect("localhost","root","","respaldo_sistema") or die ("error de conexion");
$traer=mysqli_query($conectar,"select id_producto,nombre_producto from producto 
where cantidad_producto>0 and nombre_producto like '%$_REQUEST[articulo]%'");

while($recorrer=mysqli_fetch_array($traer)){
    // if($recorrer['nombre_producto']==$_REQUEST['articulo']){
    //     $_SESSION['descripcion_producto'][]=array(
    //         "id_producto"=>$recorrer['id_producto']
    //     );
    // }
    $_SESSION['descripcion_producto'][]=array(
        "id_producto"=>$recorrer['id_producto']
    );
}
header("location:../index.php");
exit;
?>