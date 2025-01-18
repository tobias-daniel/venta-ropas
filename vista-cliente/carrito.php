<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Carrito pedido</title>
</head>
<body style="font-family: 'Lucida Sans';">
<?php
session_start();
$conec=mysqli_connect("localhost","root","","respaldo_sistema");
if(isset($_GET['eliminar'])){
    session_destroy();
    header("location:../index.php");
    exit;
}
//------------SI SE LLEVA UN PRODUCTO ENTRA-------------------
if(isset($_REQUEST['agregar'])){
        //--------------------------SINO EXISTE EL CARRITO------------------------------
        if(!isset($_SESSION['carrito'])){
            // $vec=array($_REQUEST['id_producto']);
            $_SESSION['carrito'][]=array(
                "id"=> $_REQUEST['id_producto'],
                "cant"=> $_REQUEST['pedido_cantidad']
            );
            header("location:../index.php");
            exit;
            ?>
            <?php
        //----------------------------------SI EXISTE EL CARRITO----------------------------
        }elseif(isset($_SESSION['carrito'])){
            $cont=true;
            foreach($_SESSION['carrito'] as &$v){
                if($v['id']==$_REQUEST['id_producto']){
                    $cont=false;
                    $num=$_REQUEST['pedido_cantidad'];
                    $v['cant']+=$num;
                }
            }
            if($cont==true){
                $_SESSION['carrito'][]=array(
                    "id"=> $_REQUEST['id_producto'],
                    "cant"=> $_REQUEST['pedido_cantidad']
                );
            }
        }    
        header("location:../index.php");
            exit;
            ?>
        <?php
//-----------------SI SELECCIONO LA IMAGEN DEL CARRITO------------------
}elseif (isset($_GET['id'])) {
    //---------------------------SI EL CARRITO EXISTE MUESTRA------------------------
    if (isset($_SESSION['carrito'])) {
        ?><div class="container-fluid bg-secondary p-5 d-flex">
            <div class="row">
                <h1 class="text-light col-lg-11 col-md-11 col-sm-11">Carrito de productos</h1>
                <img class="col-lg-1 col-md-1 col-sm-1 img-thumbnail" src="https://img.freepik.com/vector-premium/icono-carrito-compras-rapido_414847-513.jpg?w=2000" alt="logo de carrito" width="50px" height="50px">
            </div>
        </div>
        <h3><a style="text-decoration: none; color:red;" href="carrito.php?eliminar">ELIMINAR CARRITO</a></h3>
        <div class="container d-flex">
        <table class="table table-striped table-responsive"> <!--table: te genera una tabla basica-->
            <thead>
                <tr>
                    <th>PRODUCTO</th>
                    <th></th>
                    <th>GENERO</th>
                    <th></th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
        <?php
            foreach($_SESSION['carrito'] as $valor){
                $guardar=mysqli_query($conec,"select * from producto inner join categoria 
                on producto.id_categoria=categoria.id_categoria where id_producto=$valor[id]");
                
                while($recorrer=mysqli_fetch_array($guardar)){
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $recorrer['nombre_producto']?><td>
                        <td><?php echo $recorrer['nombre_categoria']?><td>
                        <td><?php echo $valor['cant']?></td>
                        <td><?php echo $recorrer['precio_unitario']?></td>
                        <td><?php echo ($recorrer['precio_unitario']*$valor['cant'])?></td>
                    </tr>
                </tbody>
            <?php
            }
        }
        ?>
        </table>
        </div>
        <div class="container">
            <div class="row">   <!--btn-outline-secondary: cuando pasa el cursor se pone del color secundario-->
                <button class="btn btn-outline-secondary col-6"><a style="text-decoration:none;" href="../index.php"><h3>CARGAR MÁS</h3></a></button>
                <button class="btn btn-outline-secondary col-6"><a style="text-decoration:none;" href="pagina2.php"><h3>RELLENAR DATOS</h3></a></button>
            </div>
        </div>
    <?php
    //----------------------SI NO EXISTE EL CARRITO SALE---------------
    }else{
        header("location: ../index.php?error");
        exit;
    }
}
?>
</body>
</html>