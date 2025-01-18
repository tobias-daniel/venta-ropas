<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <title>Ver pedido</title>
    <style>
        body{
            background-color:wheat ;
            text-align: center;
        }
        form{
            font-size: xx-large;
        }
        #etiqueta{
            height: 30px;
            width: 150px;
            background-color:aquamarine;
            
        }
    </style>
</head>
<body>
    <?php
    if(isset($_REQUEST['id_pedido'])){
        ?>
        <div id="etiqueta">
        <a href="pagina_pedido.php"><h3>Volver A Pedidos</h3></a>
        </div>
        <?php
        $visualizar=mysqli_connect("localhost","root","","respaldo_sistema") or die ("problemas en la conexion");

        $registro=mysqli_query($visualizar,"call ver_pedido('$_REQUEST[id_pedido]')");
        /*
        DELIMITER //
        CREATE PROCEDURE ver_pedido(IN _id_pedido int(11))
        BEGIN
        select * from detalle_pedido inner join pedido on detalle_pedido.id_pedido=pedido.id_pedido 
        inner join estado_pedido on pedido.id_estado_pedido=estado_pedido.id_estado_pedido inner join producto 
        on detalle_pedido.id_producto=producto.id_producto inner join imagen on producto.id_imagen=imagen.id_imagen 
        where detalle_pedido.id_pedido=_id_pedido
        END
        // DELIMITER ;
        */

        // $registro=mysqli_query($visualizar,"select * from detalle_pedido inner join pedido on detalle_pedido.id_pedido=pedido.id_pedido 
        // inner join estado_pedido on pedido.id_estado_pedido=estado_pedido.id_estado_pedido inner join producto 
        // on detalle_pedido.id_producto=producto.id_producto inner join imagen on producto.id_imagen=imagen.id_imagen 
        // where detalle_pedido.id_pedido='$_REQUEST[id_pedido]'") 
        // or die ("error en el inner join: ".mysqli_error($visualizar));

        while($reg=mysqli_fetch_array($registro)){
        ?>
            <br><table>
                <thead>
                    <th><img src="<?php echo $reg['descripcion_imagen'];?>"  width="180px" height="180px" alt="imagen no cargada"></th>
                    <th><h3><?php echo "Producto Encargado: ".$reg['nombre_producto'];?></h3></th>
                    <th><h3><?php echo "Precio Unitario: ".$reg['precio_unitario'];?></h3></th>
                    <th><h3><?php echo "Cantidad: ".$reg['cantidad'];?></h3></th>
                    <th><h3><?php echo "Estado del pedido: ".$reg['estado_actual'];?></h3></th>
                </thead>
            </table>
        <?php
        }
    }else{
        header("location:pagina_pedido.php");
        exit;
    }
    ?>
</body>
</html>