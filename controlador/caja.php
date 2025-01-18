<?php
session_start();
$conectar=mysqli_connect("localhost","root","","respaldo_sistema");
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
    <div class="container-fluid bg-primary d-flex p-5">
        <h3 class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <h1 class="col-8 text-light">REGISTRO DE CAJA</h1>
    </div>
    <div>
        <div class="text-center">
            <form action="consultas/filtro_fecha_caja.php" method="POST">
            Desde el dia <input type="date" name="desde" required>
            Hasta <input type="date" name="hasta" required>
            <input type="submit" value="BUSCAR">
            </form>
        </div>
        <?php
        if(!isset($_SESSION['fechas'])){?>                                      <!--SINO SE HIZO ALGUNA BUSQUEDA ENTRA EN ESTA CONDICION-->
            <table class="table">
                <thead>
                    <tr><th>FECHA Y HORA</th><th>ID FACTURA</th><th>COMPROBANTE</th><th>INGRESO</th><th>EGRESO</th><th>SALDO ACTUAL</th></tr>
                </thead>
                <?php
                $select=mysqli_query($conectar,"select * from cabecera_factura order by fecha_factura ASC");
                $total=0;
                $f_compra=0;
                $f_venta=0;
                $acum_v=0;
                $acum_c=0;
                while($imprimir=mysqli_fetch_array($select)){
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $imprimir['fecha_factura']?></td>
                        <td><?php echo $imprimir['id_cabecera']?></td>
                        <td>
                            <?php if($imprimir['id_tipo_factura']==1){
                                    echo "Factura de Compra";
                                }elseif($imprimir['id_tipo_factura']==2){
                                    echo "Factura de Venta";
                            }?>
                        </td>
                        <?php if($imprimir['id_tipo_factura']==1){
                            ?> <td></td><td><?php echo $imprimir['precio_final']?></td><?php
                            $f_compra=$imprimir['precio_final'];
                            $total=($total - $f_compra);
                            $acum_c+=$imprimir['precio_final']; //para sacar el total de compra

                        } elseif($imprimir['id_tipo_factura']==2){
                            ?> <td><?php echo $imprimir['precio_final']?></td><td></td><?php
                            $f_venta=$imprimir['precio_final'];
                            $total=($total + $f_venta);
                            $acum_v+=$imprimir['precio_final']; //para sacar el total de venta
                        }
                        ?>
                        <td><?php echo $total?></td>
                    </tr>
                </tbody>
                <?php
                }
                ?>
                <tr><td><b>SALDOS ACTUALES</b></td><td></td><td></td><td><b><?php echo $acum_v?></b></td><td><b><?php echo $acum_c?></b></td><td><b><?php echo ($acum_v-$acum_c);?></b></td></tr>
            </table>
        <?php
        $_SESSION['redondo']=($acum_v-$acum_c);
        }
        if(isset($_SESSION['fechas'])){?>                 <!--SI SE HIZO ALGUNA BUSQUEDA ENTRA EN ESTA CONDICION-->
            <table class="table">
                <thead>
                    <tr><th>FECHA Y HORA</th><th>ID FACTURA</th><th>COMPROBANTE</th><th>INGRESO</th><th>EGRESO</th><th>SALDO ACTUAL</th></tr>
                </thead>
                <?php
                $total=0;
                $f_compra=0;
                $f_venta=0;
                $acum_v=0;
                $acum_c=0;
                foreach($_SESSION['fechas'] as $valor){
                    $select=mysqli_query($conectar,"select * from cabecera_factura where fecha_factura='$valor[old]'");
                    
                    if($imprimir=mysqli_fetch_array($select)){
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $imprimir['fecha_factura']?></td>
                            <td><?php echo $imprimir['id_cabecera']?></td>
                            <td>
                                <?php if($imprimir['id_tipo_factura']==1){
                                        echo "Factura de Compra";
                                    }elseif($imprimir['id_tipo_factura']==2){
                                        echo "Factura de Venta";
                                }?>
                            </td>
                            <?php if($imprimir['id_tipo_factura']==1){
                                ?> <td></td><td><?php echo $imprimir['precio_final']?></td><?php
                                $f_compra=$imprimir['precio_final'];
                                $total=($total - $f_compra);
                                $acum_c+=$imprimir['precio_final']; //para sacar el total de compra

                            } elseif($imprimir['id_tipo_factura']==2){
                                ?> <td><?php echo $imprimir['precio_final']?></td><td></td><?php
                                $f_venta=$imprimir['precio_final'];
                                $total=($total + $f_venta);
                                $acum_v+=$imprimir['precio_final']; //para sacar el total de venta
                            }
                            ?>
                            <td><?php echo $total?></td>
                        </tr>
                    </tbody>
                <?php
                    }
                }
                $totales=0;
                $acum_compra=0;
                $acum_venta=0;
                
                if(isset($_SESSION['total'])){
                    foreach($_SESSION['total'] as $value){
                        $resto=mysqli_query($conectar,"select * from cabecera_factura where fecha_factura='$value[anterior]'");
                        $b=mysqli_fetch_array($resto);
                        
                        if($b['id_tipo_factura']==1){
                            $acum_compra=$b['precio_final'];     
                            $totales=($totales-$acum_compra);
                        }elseif($b['id_tipo_factura']==2){
                            $acum_venta=$b['precio_final'];  
                            $totales=($totales+$acum_venta);
                        }
                    }
                }
                ?>
                <tr><td><b>SALDOS DE BUSQUEDA</b></td><td></td><td></td><td><b><?php echo $acum_v?></b></td><td><b><?php echo $acum_c?></b></td><td><b><?php echo ($acum_v-$acum_c);?></b></td></tr>
                <tr><th>SALDO ANTERIOR</th><th></th><th></th><th></th><th></th><th style="color: red;"><?php echo $totales;?></th></tr>
                <tr><th>SALDO TOTAL</th><th></th><th></th><th></th><th></th><th style="color: blue;"><?php echo $_SESSION['redondo']?></th></tr>
                <?php
                    unset($_SESSION['fechas']);  
                    unset($_SESSION['total']);   
                ?>
            </table>
            <?php
        }
        ?>
    </div>
</body>
</html>