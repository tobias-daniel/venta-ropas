<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURAR PEDIDO</title>
    <style>
        
    </style>
</head>
<body>
    <?php
    $base=mysqli_connect("localhost","root","","respaldo_sistema");
    $estado=mysqli_query($base,"select * from estado_pedido inner join pedido 
    on pedido.id_estado_pedido=estado_pedido.id_estado_pedido where pedido.id_pedido='$_GET[id_pedido]'");
    $comparar=mysqli_fetch_array($estado);
    if($comparar['id_estado_pedido']==2){
    
        $contador=0;
        $contador=($_GET['id_pedido']+1);
    
        // mysqli_query($base,"insert into cabecera_factura (n_factura,precio_final,id_pedido,id_pago,id_tipo_factura,id_persona) 
        // values ('$contador','$convertir[final_pedido]','$convertir[id_pedido]','$convertir[id_pago_pedido]','2','$convertir[id_persona]')") 
        // or die (mysqli_error($base));

        mysqli_query($base,"call insert_cabecera('$contador','$comparar[final_pedido]','$comparar[id_pedido]',
        '$comparar[id_pago_pedido]','2','$comparar[id_persona]')");

        $cabecera=mysqli_query($base,"select id_cabecera from cabecera_factura order by id_cabecera desc limit 1;") or die ("error en el primer select");
        $id=mysqli_fetch_array($cabecera);
        // $id = mysqli_insert_id($base);  //traer el id_cabecera
        
        $prod=mysqli_query($base,"select * from detalle_pedido inner join producto on detalle_pedido.id_producto=producto.id_producto 
        where detalle_pedido.id_pedido='$_GET[id_pedido]'") or die ("error en el segundo select");
        
        while($rec=mysqli_fetch_array($prod)){
            
            // mysqli_query($base,"insert into detalle_factura (detalle_producto_f,precio_uni,cantidad_fac,precio_total,id_cabecera,id_producto) 
            // values ('$rec[nombre_producto]','$rec[precio]','$rec[cantidad]','$rec[precio_total]',$id,'$rec[id_producto]')") or die ("error en el tercer select ".mysqli_error($base));
            mysqli_query($base,"call insert_detalle_fac('$rec[nombre_producto]','$rec[precio]','$rec[cantidad]','$rec[precio_total]','$id[id_cabecera]','$rec[id_producto]')");
    
            $numeroInt = intval($rec['cantidad']);
            $cant=intval($rec['cantidad_producto']);
            mysqli_query($base,"update producto set cantidad_producto=($cant - $numeroInt) where producto.id_producto='$rec[id_producto]'") 
            or die ("error en actualizar la cantidad ".mysqli_error($base));
        }
        header("location: ../registro_ventas.php");
        exit;
    }else{
        header("location:../registro_pedidos.php");
    }
    ?>
</body>
</html>