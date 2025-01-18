<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>DETALLE PEDIDO</title>
</head>
<body>
    <div class="container-fluid bg-secondary p-5 d-flex">
        <div class="col-4"><a href="registro_pedidos.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></div>
        <h1 class="col-8 text-light">Detalle Del Pedido</h1>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>N° PRODUCTO</th>
                    <th>DETALLE DEL PRODUCTO</th>
                    <th>PRECIO UNITARIO</th>
                    <th>CANTIDAD</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $inicio=mysqli_connect("localhost","root","","respaldo_sistema");
            $levantar=mysqli_query($inicio,"select * from detalle_pedido where id_pedido=$_REQUEST[id]");

            while($r=mysqli_fetch_array($levantar)){
                $id=mysqli_query($inicio,"select * from producto where id_producto=$r[id_producto]");
                $cambiar=mysqli_fetch_row($id);
                ?>
                <tr>
                    <td><?php echo $r['id_producto']?></td>
                    <td><?php echo $cambiar[1]?></td>
                    <td><?php echo "$".$r['precio']?></td>
                    <td><?php echo $r['cantidad']?></td>
                    <td><?php echo "$".$r['precio_total']?></td>
                </tr>
            <?php
            }
            $m=mysqli_query($inicio,"select final_pedido from pedido where pedido.id_pedido=$_REQUEST[id]");
            $conv=mysqli_fetch_row($m);
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td><?php echo "$".$conv[0]?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>