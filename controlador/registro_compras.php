<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Ingresos</title>
</head>
<body>
    <div class="container-fluid d-flex p-5 bg-secondary text-light"> <!--text-light: es para el color de la letra-->
        <h3 class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <h1 class="col-8">Compras Registradas</h1>
    </div>
    <div class="container">  <!--container: para crear un contenedor pero no es de ancho completo-->
        <table class="table">  <!--para crear una tabla simple-->
            <thead>
            <tr>
            <th>Id factura</th>
            <th>N° Factura</th>
            <th>Fecha y Hora</th>
            <th>Proveedor</th>
            <th>Tipo de pago</th>
            <th>Precio Total</th>
            <th>DETALLE</th>
            <!-- <th>OPCIONES</th> -->
            </tr>
            </thead>
            <?php
            $base_datos= mysqli_connect("localhost","root","","respaldo_sistema") or die("problemas en la conexion");
            $Mostrar=mysqli_query($base_datos,"select * from cabecera_factura inner join persona on persona.id_persona=cabecera_factura.id_persona 
            inner join pago on pago.id_pago=cabecera_factura.id_pago where cabecera_factura.id_tipo_factura=1 order by id_cabecera desc") 
            or die ("problemas en el select".mysqli_error($base_datos));
            while($imp=mysqli_fetch_array($Mostrar)){
                ?>
                <tbody>
                <tr>
                    <td><?php echo $imp['id_cabecera']?></td>
                    <td><?php echo $imp['n_factura']?></td>
                    <td><?php echo $imp['fecha_factura']?></td>
                    <td><?php echo $imp['nombre']?></td>
                    <td><?php echo $imp['tipo_pago']?></td>
                    <td><?php echo "$" .$imp['precio_final']?></td>
                    <td><a href="detalle_f.php?id=<?php echo $imp['id_cabecera'];?>">VER</a></td>
                    <!-- <td>
                        <a href="update_producto.php?ID=<?php echo $imp['id_producto'];?>"><img src="https://cdn-icons-png.flaticon.com/512/126/126794.png" alt="editar" width="18px" height="18px"></a>
                        <a href="delete_producto.php?ID=<?php echo $imp['id_producto'];?>"><img src="https://cdn-icons-png.flaticon.com/512/121/121113.png" alt="eliminar" width="18px" height="18px"></a>
                    </td> -->
                </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>