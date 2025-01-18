<?php
session_start();
    
    $inicio=mysqli_connect("localhost","root","","respaldo_sistema") or die("error de conexion");

    $_SESSION['venta'][] = array(
        "id_producto"=>$_REQUEST['id_producto'],
        "producto"=>$_REQUEST['nombre_producto'],
        "categoria"=>$_REQUEST['id_categoria'],
        "precio"=>$_REQUEST['precio_unitario'],
        "cantidad"=>$_REQUEST['cantidad'],
        "id_talle"=>$_REQUEST['id_talle'],
        "total"=>$_REQUEST['cantidad']*$_REQUEST['precio_unitario']
    );

    header("Location: ../venta_manual.php");
    exit;
?>