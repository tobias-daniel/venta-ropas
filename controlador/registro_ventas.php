
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>registro de ventas</title>
</head>
<body>
    <div class="container-fluid bg-secondary p-5 d-flex text-light">
        <h3 class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <h1 class="col-8">Ventas Registradas</h1>
    </div>
    <?php
    $registro=mysqli_connect("localhost","root","","respaldo_sistema");
    ?>
    <div class="container"> <!--crear un contenedor-->
        <table class="table">
            <thead>
                <tr>
                    <th>Id Factura</th>
                    <th>N° Factura</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Tipo de Pago</th>
                    <th>Precio Total</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <?php
            $mostrar=mysqli_query($registro,"select * from cabecera_factura inner join pago on pago.id_pago=cabecera_factura.id_pago
            inner join persona on persona.id_persona=cabecera_factura.id_persona 
            inner join tipo_factura on tipo_factura.id_tipo_factura=cabecera_factura.id_tipo_factura where cabecera_factura.id_tipo_factura=2 order by id_cabecera desc") 
            or die ("problemas en la query ".mysqli_error($registro));
            
            while($recorrer=mysqli_fetch_array($mostrar)){
            ?>
            <tbody>
                <tr>
                    <td><?php echo $recorrer['id_cabecera']?></td>
                    <td><?php echo $recorrer['n_factura']?></td>
                    <td><?php echo $recorrer['fecha_factura']?></td>
                    <td><?php echo $recorrer['nombre']?></td>
                    <td><?php if($recorrer['id_pago']==1){
                            echo $recorrer['tipo_pago'];
                        }elseif($recorrer['id_pago']==2){
                            echo $recorrer['tipo_pago'];
                        } elseif($recorrer['id_pago']==3){
                            echo $recorrer['tipo_pago'];
                        }
                    ?></td>
                    <td><?php echo $recorrer['precio_final']?></td>
                    <td><a href="detalle_f.php?id=<?php echo $recorrer['id_cabecera'];?>">VER</a></td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>