<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>TODOS LOS PEDIDOS</title>
</head>
<body>
    <div class="container-fluid p-5 bg-primary d-flex">
        <h3 class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <h1 class="col-8 text-light">Registro De Pedidos</h1>
    </div>
    <div class="row bg-secondary text-center text-light"><h5>SI EL PEDIDO ESTÁ EN VERDE ES QUE YA SE REGISTRO LA VENTA, SI ESTÁ EN AMARILLO HAY QUE CONFIRMAR Y REGISTRAR</h5></div>

    <table class="table table-striped table-hover text-center"> <!--table-hover: hace sombra en la fila donde esta el cursor-->
        <thead>
            <tr class="row">
                <th class="col-lg-1 col-md-1 col-sm-12">ID PEDIDO</th>
                <th class="col-lg-3 col-md-1 col-sm-12">FECHA DE PEDIDO</th>
                <th class="col-lg-1 col-md-2 col-sm-12">NOMBRE</th>
                <th class="col-lg-2 col-md-2 col-sm-12">APELLIDO</th>
                <th class="col-lg-2 col-md-1 col-sm-12">PRECIO TOTAL</th>
                <th class="col-lg-1 col-md-3 col-sm-12">DETALLE</th>
                <th class="col-lg-1 col-md-1 col-sm-12">CONFIRMAR</th>
                <th class="col-lg-1 col-md-1 col-sm-12">REGISTRAR</th>
            </tr>
        </thead>
        <?php
        $base_datos= mysqli_connect("localhost","root","","respaldo_sistema") or die("problemas en la conexion");
        $Mostrar=mysqli_query($base_datos,"select * from pedido inner join persona on persona.id_persona=pedido.id_persona  
        inner join estado_pedido on pedido.id_estado_pedido=estado_pedido.id_estado_pedido order by id_pedido DESC") or die("problemas en el select".mysqli_error($base_datos));
        while($imp=mysqli_fetch_array($Mostrar)){
            ?>
            <tbody>
                <tr class="row">
                    <td class="col-lg-1 col-md-1 col-sm-12"><?php echo $imp['id_pedido']?></td>
                    <td class="col-lg-3 col-md-1 col-sm-12"><?php echo $imp['fecha_pedido']?></td>
                    <td class="col-lg-1 col-md-2 col-sm-12"><?php echo $imp['nombre']?></td>
                    <td class="col-lg-2 col-md-2 col-sm-12"><?php echo $imp['apellido']?></td>
                    <td class="col-lg-2 col-md-1 col-sm-12"><?php echo "$".$imp['final_pedido']?></td>
                    <td class="col-lg-1 col-md-3 col-sm-12"><a href="detalle_p.php?id=<?php echo $imp['id_pedido']?>">VER</a></td>
                    <td class="col-lg-1 col-md-1 col-sm-12">
                        <a href="consultas/m_pedido.php?id_pedido=<?php echo $imp['id_pedido'];?>">
                        <?php
                        if($imp['id_estado_pedido']==1){
                            echo "<img src='https://img.freepik.com/foto-gratis/vista-superior-circulo-amarillo-sobre-fondo-blanco_23-2148209983.jpg?w=2000' width='24px' height='24px' alt='imagen en espera'>";
                        }elseif ($imp['id_estado_pedido']==2){
                            echo "<img src='https://e7.pngegg.com/pngimages/167/795/png-clipart-green-and-white-check-icon-check-mark-checkbox-computer-icons-checklist-miscellaneous-angle.png' alt='img_modificar' width='24px' height='24px'>";
                        }
                        ?>
                        </a>
                    </td>
                    <td class="col-lg-1 col-md-1 col-sm-12">    <!------------REGISTRAR VENTA------------->
                        <a href="consultas/datos_factura.php?id_pedido=<?php echo $imp['id_pedido'];?>">
                        <img src="https://cdn-icons-png.flaticon.com/512/550/550755.png" alt="img_facturar" width="24px" height="24px">
                        </a>
                    </td>
                </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</body>
</html>