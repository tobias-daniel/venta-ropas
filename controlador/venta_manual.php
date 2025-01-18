<?php
session_start();
$conec=mysqli_connect("localhost","root","","respaldo_sistema");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
    <style>
        #resultado.desactivar {
            display: none;
        }
        table,th,td{
            padding: 5px;
            background-color:azure;
        }
    </style>
</head>
<body>
    <header class="container-fluid d-flex p-5" style="background-color:coral;">
        <h3 class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <h1 class="col-8 text-light">REGISTRO MANUAL DE VENTA</h1>
    </header>
    <div class="container-fluid">
        <div><b>BUSCAR PRODUCTO</b><input type="text" id="buscar" placeholder="ingrese el producto"><br></div>
        <div id="resultado">
            <!-- RESULTADO DE PRODUCTO -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
        <form action="consultas/registrar_venta_manual.php" method="post" class="col-4">
            <b>DATOS DEL CLIENTE</b><br>
            Nombre
            <br><input type="text" name="nombre" required><br>
            Apellido
            <br><input type="text" name="apellido" required><br>
            DNI
            <br><input type="number" name="dni" required><br>
            Telefono
            <br><input type="number" name="telefono" required><br>
            G-mail
            <br><input type="email" name="email" required><br>
            Direccion
            <br><input type="text" name="direccion" required><br>
            Pago:
            <br><select name="id_pago">
                <option value="">SELECCIONAR</option>
                <option value="1">Efectivo</option>
                <option value="3">Tarjeta de Credito</option>
                <option value="2">Transferencia</option>
            </select><br><br>
            <input type="submit" value="REGISTRAR">
        </form>
        <?php
        if(isset($_GET['id_producto'])){
            $mostrar=mysqli_query($conec,"select * from producto inner join categoria on categoria.id_categoria=producto.id_categoria 
            inner join talles on talles.id_talle=producto.id_talle where id_producto=$_GET[id_producto]") or die (mysqli_error($conec));
                
            if($rec=mysqli_fetch_array($mostrar)){
            ?>
            <form action="consultas/cargar_producto2.php" method="POST" class="col-8">
                <h4>DETALLES</h4>
                Articulo
                <br><input type="text" disabled required value="<?php echo $rec['nombre_producto'] ?>">
                <input type="hidden" name="nombre_producto" value="<?php echo $rec['nombre_producto']?>"><br><br>
                Categoria
                <br><input type="text" disabled  value="<?php echo $rec['nombre_categoria'] ?>"><br><br>
                <input type="hidden" name="id_categoria" value="<?php echo $rec['id_categoria'] ?>">
                Precio Unitario
                <br><input type="text" disabled  value="$<?php echo $rec['precio_unitario'] ?>"><br><br>
                <input type="hidden" name="precio_unitario" value="<?php echo $rec['precio_unitario'] ?>">
                Cantidad
                <br><input type="number" name="cantidad" placeholder="cantidad a llevar" required><br><br>
                Talle
                <br><input type="text" name="." disabled value="<?php
                switch ($rec['id_talle']) {
                    case '1':
                        echo $rec['talle'];
                        break;
                    case '2':
                        echo $rec['talle'];
                        break;
                    case '3':
                        echo $rec['talle'];
                        break;
                    case '4':
                        echo $rec['talle'];
                        break;
                }?>
                ">
                <input type="hidden" name="id_talle" value="<?php echo $rec['id_talle']?>">

                <input type="hidden" name="id_producto" value="<?php echo $rec['id_producto'] ?>">
                <br><br><input type="submit" value="AGREGAR A LA VENTA">
            </form>
            <?php
            }
        }
        ?>
    </div>
        <?php
        if(isset($_SESSION['venta'])){?>
        <div class="container">
            <table class="table table-success table-striped"><!---table-striped: le da un tono oscuro el success-->
                <thead>
                    <tr>
                        <th>Articulo</th>
                        <th>Talle</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <?php
                foreach ($_SESSION['venta'] as $v) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $v['producto'] ?></td>
                            <td><?php echo $v['id_talle'] ?></td>
                            <td><?php echo $v['precio'] ?></td>
                            <td><?php echo $v['cantidad'] ?></td>
                            <td><?php echo $v['total'] ?></td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
            </div>
        <?php
        }
        ?>
        </div>
    <script>
        //ESTA FUNCION ES PARA BUSCAR EL PRODUCTO EN LA BASE DE DATOS
        $(function() {
            $('#buscar').keyup(function() {
                if ($('#buscar').val()) {
                    var palabra = $('#buscar').val();
                    console.log(palabra);
                    $.ajax({
                        url: 'consultas/buscar_prod_bd2.php',
                        type: 'POST',
                        data: {
                            palabra  //manda la letra a 'buscar_prod_db.php'
                        },
                        success: function(response) {
                            if((response)){
                                //remueve la clase desactivar
                                $('#resultado').removeClass("desactivar");
                            }
                            //resultado de lo traido
                            $('#resultado').html(response);
                        }
                    });
                }else{
                    // desactivar agrega a la clase desactivar
                    $('#resultado').addClass("desactivar");
                }
            });
        });
    </script>
</body>
</html>