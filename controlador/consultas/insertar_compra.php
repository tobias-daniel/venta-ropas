<?php
session_start();
$basee=mysqli_connect("localhost","root","","respaldo_sistema") or die ("problemas en la conexion");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $_SESSION['numero']=$_REQUEST['n_factura'];
    if($_SESSION['factura']==true and isset($_SESSION['numero'])){
        $total=0;
        foreach($_SESSION['factura'] as $valor){
            $total+=$valor['total'];
        }
        //---------------------INSERCION EN CABECERA DE FACTURA-------------------------
        mysqli_query($basee,"insert into cabecera_factura(n_factura,precio_final,id_pago,id_tipo_factura,id_persona) 
        values ('$_SESSION[numero]',$total,'$_REQUEST[id_pago]','1','$_REQUEST[id_proveedor]')");

        //---------------------RECORRER LA VARIABLE DE SESSION--------------------------
        foreach($_SESSION['factura'] as $valor){
            // $consulta=mysqli_query($basee,"select * from producto where id_producto=$valor[id_producto]");
            mysqli_query($basee,"update producto set cantidad_producto=($valor[cantidad]+cantidad_producto) where id_producto=$valor[id_producto]") 
            or die (mysqli_error($basee));
            

            $id_cabec=mysqli_query($basee,"select id_cabecera from cabecera_factura order by id_cabecera desc limit 1;");
            $id_cabecera=mysqli_fetch_array($id_cabec);
        //--------------------INSERCION EN DETALLE DE FACTURA---------------------------
            mysqli_query($basee,"insert into detalle_factura(detalle_producto_f,precio_uni,cantidad_fac,precio_total,id_cabecera,id_producto) 
            values ('$valor[producto]','$valor[precio]','$valor[cantidad]','$valor[total]',$id_cabecera[0],'$valor[id_producto]')") 
            or die(mysqli_error($basee));
        }
        session_destroy();
        header("location: ../registro_compras.php");
        exit;
    }else{
        header("location: ../compra_manual.php");
        exit;
    }
    ?>
</body>
</html>