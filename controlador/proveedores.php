<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Ver</title>
</head>
<body>
    <div class="container-fluid bg-secondary p-5">
        <div class="row">
            <div class="col-4"><a href="pagina5.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></div>
            <h1 class="col-8 text-light">Proveedores y Empleados</h1>
        </div>
    </div>
    <div class="container-fluid d-flex" style="margin-top: 4px;"> <!--d-flex: es un display flex-->
        <div class="col-3">
            <form action="consultas/registrar_prov.php" method="POST">  <!--form-control: le da un estilo a los input-->
                <h3>Agregar Nueva Persona</h3>
                    Nombre
                <br><input class="form-control w-sm-5" type="text" name="nombre" placeholder="ingrese nombre" required>
                <br>Apellido
                <br><input class="form-control w-sm-5" type="text" name="apellido" placeholder="ingrese apellido" required>
                <br>DNI
                <br><input class="form-control w-sm-5" type="number" name="DNI" placeholder="N°-------" required>
                <br>Telefono
                <br><input class="form-control w-sm-5" type="number" name="telefono" placeholder="numero de telefono" required>
                <br>E-mail
                <br><input class="form-control w-sm-5" type="email" name="email" placeholder="ingrese e-mail" required>
                <br>Dirección
                <br><input class="form-control w-sm-5" type="text" name="direccion" placeholder="su dirección" required>
                <br>Tipo de persona
                <br><select name="id_tipo_persona" class="form-select" required> <!--form-select: le da un estilo de seleccion-->
                    <option value="">SELECCIONAR</option>
                    <option value="4">EMPLEADO</option>
                    <option value="3">PROVEEDOR</option>
                </select>
                <input type="hidden" name="datos_proveedor" value="1">
                <br><input type="submit" name="formulario" value="REGISTRAR">
            </form>
        </div>
        <div class="col-9">
            <table class="table table-striped h-sm-10 h-md-20 h-lg-20 w-sm-10 w-md-10 w-lg-100 text-center table-hover"> <!--sh md lg son las dimensiones en distintas resoluciones-->
                <thead>
                    <tr>
                        <th>ID PERSONA</th>
                        <th>PROVEEDOR</th>
                        <th>DNI</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th>DIRECCION</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $star=mysqli_connect("localhost","root","","respaldo_sistema");
                    $proveedor=mysqli_query($star,"select * from persona where persona.id_tipo_persona=3") or die(mysqli_error($star));
                    while($mostrar=mysqli_fetch_row($proveedor)){
                    ?>
                        <tr>
                            <td><?php echo $mostrar[0]?></td>
                            <td><?php echo $mostrar[1]?></td>
                            <td><?php echo $mostrar[3]?></td>
                            <td><?php echo $mostrar[4]?></td>
                            <td><?php echo $mostrar[5]?></td>
                            <td><?php echo $mostrar[6]?></td>
                            <td><a href="consultas/delete_proveedor.php?id=<?php echo $mostrar[0]?>"><img src="https://cdn-icons-png.flaticon.com/512/121/121113.png" width="25px" height="25px"></a></td>
                            <td><a href="consultas/update_proveedor.php?id=<?php echo $mostrar[0]?>"><img src="https://cdn-icons-png.flaticon.com/512/126/126794.png" width="25px" height="25px"></a></td>
                        </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>