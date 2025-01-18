<?php
session_start();
$conexion=mysqli_connect("localhost","root","","respaldo_sistema") or die ("error en la conexion");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid d-flex p-5 bg-primary">
        <div class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></div>
        <h2 class="col-8 text-light">MOVIMIENTOS DE PRODUCTOS</h2>
    </div>
    <div class="container-fluid d-flex" style="margin-top: 7px;">
        <form action="consultas/filtro_fecha_prod.php" method="post" class="p-4 col-2" style="background-color:cornflowerblue; border-radius: 10px; color:white; text-align: center">
            Numero de Producto
            <br><input type="number" name="id_producto" placeholder="ingrese el id_producto" required><br><br>
            Fecha Desde:
            <br><input type="date" name="desde" required><br><br>
            Fecha Hasta:
            <br><input type="date" name="hasta" required><br>
            <br><input type="submit" value="ENVIAR">
        </form><br>
        <?php
        if(isset($_SESSION['todo'])){
        ?>
        <div class="col-10">
            <table class="table p-3">
                <thead>
                    <tr><th>Fecha</th><th>Comprobante</th><th>ID Factura</th><th>Ingresó</th><th>Salió</th><th>C</th><th>V</th><th>Actual</th></tr>
                </thead>
                <?php
                $compra=0;
                $venta=0;
                $acumulador_compra=0;
                $acumulador_venta=0;
                $actual_stock=0;
                foreach($_SESSION['todo'] as $valor){
                ?>
                <tbody>
                    <tr><td><?php echo $valor['fecha']?></td><td><?php echo $valor['descripcion']?></td><td><?php echo $valor['id_factura']?></td>
                    <?php 
                        if($valor['descripcion']=="factura_venta"){
                            ?><td><?php echo $valor['precio']?></td><td></td><?php
                            $venta=$valor['precio'];
                            $acumulador_venta+=$valor['precio'];
                        }else{
                            ?><td></td><td><?php echo $valor['precio']?></td><?php
                            $compra=$valor['precio'];
                            $acumulador_compra+=$valor['precio'];
                        }
                    ?></td><?php
                                if($valor['descripcion']=="factura_compra"){?>
                                    <td><?php echo $valor['cantidad']?></td><td></td>
                                <?php
                                }elseif($valor['descripcion']=="factura_venta"){?>
                                    <td></td><td><?php echo $valor['cantidad']?></td>
                                <?php
                                }
                    ?><td><?php echo $actual_stock=($valor['descripcion']=="factura_compra")? $actual_stock+$valor['cantidad'] : $actual_stock-$valor['cantidad']?></td></tr>
                <?php
                }
                ?>
                <tr><td></td><td></td><td></td><th><?php echo $acumulador_venta?></th><th><?php echo $acumulador_compra?></th><td><td></td></td><th><?php echo $actual_stock?></th></tr>
                <tr><td></td><td></td><td></td><th></th><th></th><td><td></td></td><th style="color: red;"><?php echo $actual_stock?></th></tr>
                <?php
                session_destroy();
                ?>
            </table>
        </div>
        <?php
        }else{
            ?>
            <div class='col-10 p-4'>
            <?php
                echo "<h2 style='border-radius: 6px; padding: 6px; background-color:darkgray; color: white'>Haga su busqueda ingresando el ID PRODUCTO y fechas</h2>";
            ?>
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>