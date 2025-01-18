<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Detalle factura</title>
</head>
<body>
    <div class="container-fluid p-5 d-flex bg-secondary text-light">
        <?php
        $inicio=mysqli_connect("localhost","root","","respaldo_sistema");
        $id=mysqli_query($inicio,"select id_tipo_factura from cabecera_factura where id_cabecera=$_GET[id]");
        $tipo=mysqli_fetch_array($id);
        if($tipo['id_tipo_factura']==1){
        ?><h3 class="col-4"><a href="registro_compras.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <?php
        }elseif($tipo['id_tipo_factura']==2){
        ?><h3 class="col-4"><a href="registro_ventas.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <?php
        }?>
        <h1 class="col-8">Detalle De la Factura</h1>
    </div>
    <div class="container">
        <table class="table"> <!--table: genera una tabla-->
            <thead>
                <tr>
                    <th>N° PRODUCTO</th>
                    <th>DETALLE PRODUCTO</th>
                    <th>PRECIO UNITARIO</th>
                    <th>CANTIDAD</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $levantar=mysqli_query($inicio,"select * from detalle_factura where id_cabecera=$_REQUEST[id]");

            while($r=mysqli_fetch_array($levantar)){
                ?>
                <tr>
                    <td><?php echo $r['id_producto']?></td>
                    <td><?php echo $r['detalle_producto_f']?></td>
                    <td><?php echo "$".$r['precio_uni']?></td>
                    <td><?php echo $r['cantidad_fac']?></td>
                    <td><?php echo "$".$r['precio_total']?></td>
                </tr>
            <?php
            }
            $m=mysqli_query($inicio,"select precio_final from cabecera_factura where id_cabecera=$_REQUEST[id]");
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