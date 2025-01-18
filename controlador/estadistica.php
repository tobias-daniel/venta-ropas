<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
    <style>
        #total>td{
            color: red;
        }
        #titulos>th{
            color: blue;
        }
        body{
            font-family:'Arial';
        }
    </style>
</head>
<body>
    <div class="conatiner-fluid d-flex p-4" style="background-color:cornflowerblue; color:blanchedalmond">
        <h3 class="col-2" style="padding-top: 15px;"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <h1 class="col-8 pt-4"><b>ESTADISTICA ANUAL DE VENTAS</b></h1>
        <div class="col"><img src="https://cdn-icons-png.flaticon.com/512/2965/2965293.png" alt="logo" width="120px" height="120px"></div>
    </div>
    <div class="container-fluid">
        <div><form action="estadistica.php"><h4>Ingrese el Año</h4><input name="years" type="number"><input type="submit" value="Consultar"></form></div>
        <table class="table table-light table-striped">
            <thead class="text-center">
                <tr id="titulos">
                    <th>Numero</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Talle</th>
                    <th>Enero</th>
                    <th>Febrero</th>
                    <th>Marzo</th>
                    <th>Abril</th>
                    <th>Mayo</th>
                    <th>Junio</th>
                    <th>Julio</th>
                    <th>Agosto</th>
                    <th>Septiembre</th>
                    <th>Octubre</th>
                    <th>Noviembre</th>
                    <th>Diciembre</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
            
            $PHP=mysqli_connect("localhost","root","","respaldo_sistema") or die("error de conexion");
            $total[0]=0;$total[1]=0;$total[2]=0;$total[3]=0;$total[4]=0;$total[5]=0;$total[6]=0;$total[7]=0;$total[8]=0;$total[9]=0;$total[10]=0;$total[11]=0;
            
            if(isset($_REQUEST['years'])){
                $año=strval($_REQUEST['years']);
                $productos=mysqli_query($PHP,"SELECT detalle_factura.id_producto,detalle_factura.detalle_producto_f,categoria.nombre_categoria,talles.talle from detalle_factura 
                join cabecera_factura on cabecera_factura.id_cabecera=detalle_factura.id_cabecera 
                join producto on producto.id_producto=detalle_factura.id_producto 
                join categoria on categoria.id_categoria=producto.id_categoria 
                join talles on talles.id_talle=producto.id_talle where cabecera_factura.fecha_factura LIKE '%$año%' and cabecera_factura.id_tipo_factura=2 group by detalle_factura.id_producto") 
                or die(mysqli_error($PHP));
                // $productos=mysqli_query($PHP,"call select_estadistica($año)") or die(mysqli_error($PHP));
                
            while($mostrar=mysqli_fetch_array($productos)){
                $datos=mysqli_query($PHP,"SELECT fecha_factura,cantidad_fac FROM cabecera_factura INNER JOIN detalle_factura 
                ON detalle_factura.id_cabecera=cabecera_factura.id_cabecera WHERE cabecera_factura.fecha_factura LIKE '%$año%' AND detalle_factura.id_producto=$mostrar[id_producto] AND cabecera_factura.id_tipo_factura=2");?>
                <tbody class="text-center">
                    <tr>
                        <td><b><?php echo $mostrar['id_producto']?></b></td>
                        <td><b><?php echo $mostrar['detalle_producto_f']?></b></td>
                        <td><b><?php echo $mostrar['nombre_categoria']?></b></td>
                        <td><b><?php echo $mostrar['talle']?></b></td>        
                <?php
                $suma_mes[0]=0;$suma_mes[1]=0;$suma_mes[2]=0;$suma_mes[3]=0;$suma_mes[4]=0;$suma_mes[5]=0;$suma_mes[6]=0;$suma_mes[7]=0;$suma_mes[8]=0;$suma_mes[9]=0;$suma_mes[10]=0;$suma_mes[11]=0;$suma_mes[12]=0;

                while($recorrer=mysqli_fetch_array($datos)){
                    $mes = date("m", strtotime($recorrer['fecha_factura']));
                    if($mes=='01'){
                        $suma_mes[0]=$suma_mes[0]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[0]=$total[0]+$recorrer['cantidad_fac'];
                    }elseif($mes=='02'){
                        $suma_mes[1]=$suma_mes[1]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[1]=$total[1]+$recorrer['cantidad_fac'];
                    }elseif($mes=='03'){
                        $suma_mes[2]=$suma_mes[2]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[2]=$total[2]+$recorrer['cantidad_fac'];
                    }elseif($mes=='04'){
                        $suma_mes[3]=$suma_mes[3]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[3]=$total[3]+$recorrer['cantidad_fac'];
                    }elseif($mes=='05'){
                        $suma_mes[4]=$suma_mes[4]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[4]=$total[4]+$recorrer['cantidad_fac'];
                    }elseif($mes=='06'){
                        $suma_mes[5]=$suma_mes[5]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[5]=$total[5]+$recorrer['cantidad_fac'];
                    }elseif($mes=='07'){
                        $suma_mes[6]=$suma_mes[6]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[11]=$total[11]+$recorrer['cantidad_fac'];
                    }elseif($mes=='08'){
                        $suma_mes[7]=$suma_mes[7]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[7]=$total[7]+$recorrer['cantidad_fac'];
                    }elseif($mes=='09'){
                        $suma_mes[8]=$suma_mes[8]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[8]=$total[8]+$recorrer['cantidad_fac'];
                    }elseif($mes=='10'){
                        $suma_mes[9]=$suma_mes[9]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[9]=$total[9]+$recorrer['cantidad_fac'];
                    }elseif($mes=='11'){
                        $suma_mes[10]=$suma_mes[10]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[10]=$total[10]+$recorrer['cantidad_fac'];
                    }elseif($mes=='12'){
                        $suma_mes[11]=$suma_mes[11]+$recorrer['cantidad_fac'];
                        $suma_mes[12]=$suma_mes[12]+$recorrer['cantidad_fac'];
                        $total[11]=$total[11]+$recorrer['cantidad_fac'];
                    }
                    }?>
                        <td><b><?php echo $suma_mes[0];?></b></td><td><b><?php echo $suma_mes[1];?></b></td><td><b><?php echo $suma_mes[2];?></b></td>
                        <td><b><?php echo $suma_mes[3];?></b></td><td><b><?php echo $suma_mes[4];?></b></td><td><b><?php echo $suma_mes[5];?></b></td>
                        <td><b><?php echo $suma_mes[6];?></b></td><td><b><?php echo $suma_mes[7];?></b></td><td><b><?php echo $suma_mes[8];?></b></td>
                        <td><b><?php echo $suma_mes[9];?></b></td><td><b><?php echo $suma_mes[10];?></b></td><td><b><?php echo $suma_mes[11];?></b></td>
                        <td style="color: red;"><b><?php echo $suma_mes[12];?></b></td>
                    </tr>
                </tbody>
                <?php
                }
            }
            ?>
            <tr class="text-center" id="total"><td></td><td></td><td></td><td></td>
            <td><b><?php echo $total[0];?></b></td><td><b><?php echo $total[1];?></b></td><td><b><?php echo $total[2];?></b></td>
            <td><b><?php echo $total[3];?></b></td><td><b><?php echo $total[4];?></b></td><td><b><?php echo $total[5];?></b></td>
            <td><b><?php echo $total[6];?></b></td><td><b><?php echo $total[7];?></b></td><td><b><?php echo $total[8];?></b></td>
            <td><b><?php echo $total[9];?></b></td><td><b><?php echo $total[10];?></b></td><td><b><?php echo $total[11];?></b></td><td></td></tr>
        </table>
    </div>
</body>
</html>