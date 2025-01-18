<?php
session_start();
$minimo=$_POST['min'];
$maximo=$_POST['max'];
$min=(floatval($minimo));
$max=(floatval($maximo));

$conectar=mysqli_connect("localhost","root","","respaldo_sistema");
if($min<$max){
    $a=mysqli_query($conectar,"select id_producto,precio_unitario from producto where cantidad_producto>0");
    while($m=mysqli_fetch_array($a)){
        if($m['precio_unitario']>=$minimo and $m['precio_unitario']<=$maximo){
            $_SESSION['precio_producto'][]=array(
                "id_producto"=>$m['id_producto']
            );
        }
    }
    header("location:../index.php?listo");
    exit;
}else{
    header("location:../index.php");
    exit;
}
?>