<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        .registro_total.desactivar {
            display: none;
        }

        #resultado.desactivar {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-primary d-flex p-5">
        <h3 class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <h1 class="col-8 text-light">TOTAL DE PRODUCTOS</h1>
    </div>
    <div class="container-fluid d-flex">
        <div class="col-2">
            <form action="consultas/alta_prod.php" method="POST" enctype="multipart/form-data">
                CREAR NUEVO PRODUCTO
                <br><input type="text" name="nombre_producto" placeholder="ingrese el articulo" required><br><br>
                Categoria
                <br><select name="id_categoria" required>
                    <option value="">Seleccione</option>
                    <option value="1">Hombres</option>
                    <option value="2">Mujeres</option>
                    <option value="3">Niños</option>
                </select><br><br>
                Precio de Venta
                <br><input type="number" name="precio_unitario" placeholder="$" required><br>
                <!-- Cantidad -->
                <br><input type="hidden" name="cantidad" value="0" placeholder="cantidad ingresada" required>
                Talle
                <input type="radio" name="id_talle" value=1 required>S
                <input type="radio" name="id_talle" value=2 required>M
                <input type="radio" name="id_talle" value=3 required>L
                <input type="radio" name="id_talle" value=4 required>X
                <!-- <input type="radio" name="id_talle" value=5 required>XL
                <input type="radio" name="id_talle" value=6 required>XXL -->
                <!-- <br><br>Imagen <select name="id_imagen" required>
                    <option value="">seleccionar</option>
                    <option value="1">pantalon de mujer</option>
                    <option value="2">pantalon de hombre</option>
                    <option value="3">remera de mujer</option>
                    <option value="4">remera de hombre</option>
                    <option value="5">short de mujer</option>
                    <option value="6">short de hombre</option>
                    <option value="7">abrigo de mujer</option>
                    <option value="8">abrigo de hombre</option>
                    <option value="9">remera de niño</option>
                    <option value="10">remera de niña</option>
                    <option value="11">pantalon de niño</option>
                    <option value="12">pantalon de niña</option>
                    <option value="13">camiseta de river</option>
                    <option value="14">camiseta de boca</option>
                </select><br> -->
                <br>imagen:
                <br><input type="file" name="imagen" required>
                <br><br><input type="submit" value="AGREGAR AL INVENTARIO">
            </form>
        </div>
        <div class="col-10">
            <!--------------- BUSCADOR ---------------->
            <br>Buscar: <input type="text" id="buscador" placeholder="buscar articulo">
            <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>ID PRODUCTO</th>
                    <th>DETALLE PRODUCTO</th>
                    <th>CATEGORIA</th>
                    <th>TALLE</th>
                    <th>PRECIO DE VENTA</th>
                    <th>STOCK</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>
            <?php
            $conec = mysqli_connect("localhost", "root", "", "respaldo_sistema") or die("error de conexion");
            $ver = mysqli_query($conec, "select * from producto inner join categoria on categoria.id_categoria=producto.id_categoria 
            inner join talles on talles.id_talle=producto.id_talle");

            while ($mostrar = mysqli_fetch_array($ver)) { ?>
                <tbody class="registro_total">
                    <tr><!--DEBERIA MOSTRAR EL RESULTADO-->
                        <td><?php echo $mostrar['id_producto'] ?></td>
                        <td><?php echo $mostrar['nombre_producto'] ?></td>
                        <td><?php echo $mostrar['nombre_categoria'] ?></td>
                        <td><?php echo $mostrar['talle'] ?></td>
                        <td><?php echo "$" . $mostrar['precio_unitario'] ?></td>
                        <td><?php echo $mostrar['cantidad_producto'] ?></td>
                        <td>
                            <a href="consultas/update_producto.php?ID=<?php echo $mostrar['id_producto']; ?>"><img src="https://cdn-icons-png.flaticon.com/512/126/126794.png" alt="editar" width="18px" height="18px"></a>
                            <a href="consultas/delete_producto.php?ID=<?php echo $mostrar['id_producto']; ?>"><img src="https://cdn-icons-png.flaticon.com/512/121/121113.png" alt="eliminar" width="18px" height="18px"></a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
            <tbody id="resultado" class="remove">

            </tbody>
            </table>
        </div>
    </div>

    <script>
        $(function() {
            $('#buscador').keyup(function() {
                //si buscador tiene algun valor dentro
                if ($('#buscador').val()) {
                    //guarda el valor que esta dentro
                    let buscar = $('#buscador').val();
                    console.log(buscar);

                    $.ajax({
                        url: 'consultas/buscador_prod.php',
                        type: 'POST',
                        data: {
                            buscar
                        },
                        //succes devuleve el valor de la otra pagina
                        success: function(response) {

                            // si tiene algo response que le ponga una clase a la tabla y le esconda

                            $('#resultado').removeClass("desactivar");
                            $('#resultado').html(response);

                            // desactivar tabla grande
                            $('.registro_total').addClass("desactivar");
                            // y mostrame la otra


                        }

                    });

                } else {

                    // mostrame la tabla grande
                    $('.registro_total').removeClass("desactivar");
                    // y desactivame la otra
                    $('#resultado').addClass("desactivar");
                }
            });
        });
    </script>
</body>
</html>