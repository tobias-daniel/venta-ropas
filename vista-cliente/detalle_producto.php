<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <header class="container-fluid p-5" style="background-color:blueviolet; margin-bottom:13px">
        <nav class="row">
            <div class="col-4"><a id="inicio" href="../index.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></div>
            <h1 class="col-8 text-light">DETALLE DEL PRODUCTO</h1>
        </nav>
    </header>
    <?php
    $conectar=mysqli_connect("localhost","root","","respaldo_sistema") or die ("error de conexion");
    $traer=mysqli_query($conectar,"SELECT * from producto 
    inner join talles on talles.id_talle=producto.id_talle 
    inner join categoria on categoria.id_categoria=producto.id_categoria 
    where producto.id_producto=$_GET[id]") or die(mysqli_error($conectar));
    ?>
    <div class="container">
        <div class="container text-center">
            <?php
            $img=mysqli_query($conectar,"select imagen from producto where id_producto='$_GET[id]'");
            if($m=mysqli_fetch_array($img)){?>
                <img src="<?php echo "../".$m['imagen']; ?>" alt="imagen" width="300px" height="300px">
            <?php
            }
            ?>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>DESCRIPCION</th>
                    <th>PRECIO UNITARIO</th>
                    <th>CANTIDAD</th>
                    <th>CATEGORIA</th>
                    <th>TALLE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($mostrar=mysqli_fetch_array($traer)){
                    ?>
                    <tr>
                        <td><?php echo $mostrar['nombre_producto']?></td>
                        <td><?php echo $mostrar['precio_unitario']?></td>
                        <td><?php echo $mostrar['cantidad_producto']?></td>
                        <td><?php echo $mostrar['nombre_categoria']?></td>
                        <td><?php echo $mostrar['talle']?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>