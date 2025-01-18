<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_registro.css">
    <title>EDITAR PRODUCTO</title>
</head>
<body>
    <?php
    $update=mysqli_connect("localhost","root","","respaldo_sistema") or die("problemas en la conexion");

    $seleccionar=mysqli_query($update,"select * from producto where id_producto=".$_GET['ID']) or die
    ("Problemas en el select:" . mysqli_error($update));

    if($modificar=mysqli_fetch_array($seleccionar)){
        ?>
        <form action="update_terminado.php" id="form_mod">
                <h3>MODIFICAR ARTICULO</h3>
                Modificar Articulo
                <br><input type="text" name="nuevo_nombre" required value="<?php echo $modificar['nombre_producto']?>"><br><br>
                Modificar Precio
                <br><input type="number" name="nuevo_precio" required value="<?php echo $modificar['precio_unitario']?>"><br><br>
                <!-- Talle
                <input type="radio" name="nuevo_id_talle" value= 1 required <?php if($modificar['id_talle']=='1') echo 'checked';?>>S
                <input type="radio" name="nuevo_id_talle" value= 2 required <?php if($modificar['id_talle']=='2') echo 'checked';?>>M
                <input type="radio" name="nuevo_id_talle" value= 3 required <?php if($modificar['id_talle']=='3') echo 'checked';?>>X
                <input type="radio" name="nuevo_id_talle" value= 4 required <?php if($modificar['id_talle']=='4') echo 'checked';?>>L
                <input type="radio" name="nuevo_id_talle" value= 5 required <?php if($modificar['id_talle']=='5') echo 'checked';?>>XL
                <input type="radio" name="nuevo_id_talle" value= 6 required <?php if($modificar['id_talle']=='6') echo 'checked';?>>XXL -->
                <!--para mandar el id del producto a la siguiente pagina-->
                <input type="hidden" name="ID" value="<?php echo $_GET['ID']?>">
                <br><br><input type="submit" value="TERMINAR MODIFICACIONES">
        </form><br><br>
        <a href="../registro_total_prod.php"><h2>VOLVER A PRODUCTOS</h2></a>
    <?php
    }
    ?>
</body>
</html>