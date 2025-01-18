<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_registro.css">
    <title>EDITAR PROVEEDOR</title>
</head>
<body>
    <?php
    $update=mysqli_connect("localhost","root","","respaldo_sistema") or die("problemas en la conexion");

    $seleccionar=mysqli_query($update,"select * from persona where id_persona=".$_GET['id']) or die
    ("Problemas en el select:" . mysqli_error($update));

    if($modificar=mysqli_fetch_array($seleccionar)){
        ?>
        <form action="update_prov.php" id="form_mod">
                <h3>MODIFICAR Datos</h3>
                Nombre
                <br><input type="text" name="nombre" value="<?php echo $modificar['nombre']?>"><br><br>
                Telefono
                <br><input type="number" name="telefono" value="<?php echo $modificar['telefono']?>"><br><br>
                Email
                <br><input type="text" name="email" value="<?php echo $modificar['email']?>"><br><br>
                Direccion
                <br><input type="text" name="direccion" value="<?php echo $modificar['direccion']?>">
                <input type="hidden" name="ID" value="<?php echo $_GET['id']?>">
                <br><br><input type="submit" value="TERMINAR MODIFICACIONES">
        </form><br><br>
        <a href="../proveedores.php"><h2>VOLVER A PROVEEDORES</h2></a>
    <?php
    }
    ?>
</body>
</html>