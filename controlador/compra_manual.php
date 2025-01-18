<?php
$base=mysqli_connect("localhost","root","","respaldo_sistema");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosN5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<header class="container-fluid d-flex p-5" style="background-color:darkkhaki;">
    <h3 class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
    <h1 class="col-8 text-light">REGISTRO MANUAL DE COMPRA</h1>
</header>
<main class="container-fluid">
    <div class="container d-flex">
        <div id="contenido" class="col-6">
            <!-- BUSCAR PRODUCTO EN LA BASE DE DATOS -->
            <h5><b>SELECCIONAR PRODUCTO</b></h5><input type="text" id="buscar" placeholder="ingrese el producto"><br>
            <br>
            <div class="row"> <!--row: para hacer una fila-->
                <div id="resultado">
                    <!-- RESULTADO DE PRODUCTO -->
                </div>
            </div>
            <form action="consultas/insertar_compra.php" method="POST">
                <h4><b>DATOS DE COMPRA</b></h4>
                N° de Factura
                <br><input type="number" name="n_factura" placeholder="ingrese el numero" required><br><br>
                Proveedor
                <br><select name="id_proveedor" required>
                    <option value="">Seleccionar</option>
                    <?php
                    $select=mysqli_query($base,"select * from persona inner join tipo_persona on 
                    persona.id_tipo_persona=tipo_persona.id_tipo_persona where persona.id_tipo_persona=3");
                    while($conver=mysqli_fetch_array($select)){
                        echo "<option value='".$conver['id_persona']."'>".$conver['nombre']."</option>";
                    }
                    ?>
                </select><br><br>
                Tipo de Pago
                <br><select name="id_pago" required>
                    <option value="">Seleccionar</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Tranferncias</option>
                    <option value="3">Tarjeta de Credito</option>
                </select><br><br>
                <input type="submit" value="TERMINAR COMPRA">
            </form>
        </div>
        <div class="col-6">
            <?php
            if(isset($_GET['id'])){
                $mostrar=mysqli_query($base,"select * from producto inner join categoria on categoria.id_categoria=producto.id_categoria 
                inner join talles on talles.id_talle=producto.id_talle where id_producto=$_GET[id]") or die (mysqli_error($base));
                    
                if($rec=mysqli_fetch_array($mostrar)){
                ?>
                <form action="carga_producto.php" method="POST">
                    <h4><b>PRODUCTO SELECCIONADO</b></h4>
                    Articulo
                    <br><input type="text" disabled required value="<?php echo $rec['nombre_producto'] ?>">
                    <input type="hidden" name="nombre_producto" value="<?php echo $rec['nombre_producto']?>"><br><br>
                    Categoria
                    <br><input type="text" disabled  value="<?php echo $rec['nombre_categoria'] ?>"><br><br>
                    <input type="hidden" name="id_categoria" value="<?php echo $rec['id_categoria'] ?>">
                    Precio de Compra
                    <br><input type="number" name="precio_unitario" placeholder="$" required><br><br>
                    Cantidad comprada
                    <br><input type="number" name="cantidad" placeholder="cantidad ingresada" required><br><br>
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
                    <br><br><input style="background-color:aquamarine;" type="submit" value="AGREGAR A LISTA DE COMPRA">
                    <!-- <?php if(isset($_GET['id_prov'])){?> -->
                        <!-- <br><br><button><a href="insertar_compra.php?prov=<?php echo "";?>">TERMINAR COMPRA</a></button> -->
                    <!-- <?php }?> -->
                </form>
                <?php
                }
            }else{
                ?>
                <form  method="POST">
                <h4><b>PRODUCTO SELECCIONADO</b></h4>
                Articulo
                <br><input type="text" disabled required placeholder="falta el articulo"><br>
                Categoria
                <br><input type="text" disabled required placeholder="falta categoria"><br>
                Precio de Compra
                <br><input type="number" disabled placeholder="$" required><br>
                Cantidad comprada
                <br><input type="number" disabled placeholder="cantidad" required><br>
                Talle
                <br><input type="text" disabled value="ninguno"><br>
                <button style="background-color: red; color:bisque; padding:4px;">SELECCIONAR UN ARTICULO</button>
                <!-- <br><br><input type="submit" value="AGREGAR"> -->
            </form>
            <?php
            }
            ?>
        </div>
        </div>
        <div class="container-fluid">
        <?php
            if (isset($_SESSION['factura'])) {
            ?>
            <div>
                <table class="table table-success table-striped">  <!---table-striped: le da un tono oscuro el success-->
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
                    foreach ($_SESSION['factura'] as $value) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $value['producto'] ?></td>
                                <td><?php echo $value['id_talle'] ?></td>
                                <td><?php echo $value['precio'] ?></td>
                                <td><?php echo $value['cantidad'] ?></td>
                                <td><?php echo $value['total'] ?></td>
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
</main>
<script>
    //ESTA FUNCION ES PARA BUSCAR EL PRODUCTO EN LA BASE DE DATOS
    $(function() {
        $('#buscar').keyup(function() {
            if ($('#buscar').val()) {
                var palabra = $('#buscar').val();
                console.log(palabra);
                $.ajax({
                    url: 'consultas/buscar_prod_bd.php',
                    type: 'POST',
                    data: {
                        palabra
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