<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos personales</title>
</head>
<body>
    <?php
    session_start();
    $conection=mysqli_connect("localhost","root","","respaldo_sistema") or die ("error de conexion");
    //si encuentra la persona entra en el if
    $traer=mysqli_query($conection,"select * from persona where DNI=$_REQUEST[DNI]");
    $ver=mysqli_fetch_array($traer);
    if(isset($ver['id_persona'])){
        //INSERTAR en la tabla PEDIDO
        $totall=0;
        foreach ($_SESSION['carrito'] as $v) {
            $guardar=mysqli_query($conection,"select * from producto where id_producto=$v[id]");
            $conv=mysqli_fetch_array($guardar);
            $totall+=$v['cant']*$conv['precio_unitario'];
        }
        mysqli_query($conection,"insert into pedido (id_persona,final_pedido,id_estado_pedido,id_pago_pedido) 
        values ($ver[id_persona],$totall,1,$_REQUEST[id_pago_pedido])") or die ("problemas en el segundo select: ". mysqli_error($conection));
        
        //INSERTAR EN LA TABLA DETALLE_PEDIDO
        foreach($_SESSION['carrito'] as $valor){
            $seleccion2=mysqli_query($conection,"select id_pedido from pedido order by id_pedido desc limit 1") 
            or die("Problemas en el select: " . mysqli_error($conection));

            $levantar=mysqli_query($conection,"select * from producto where id_producto=$valor[id]") 
            or die(mysqli_error($conection));
            $vector=mysqli_fetch_array($levantar);//transformo lo de producto en un array
            if($resul=mysqli_fetch_array($seleccion2)){
                mysqli_query($conection,"insert into detalle_pedido (precio,cantidad,precio_total,id_producto,id_pedido)  
                values ('$vector[precio_unitario]','$valor[cant]',($vector[precio_unitario]*$valor[cant]),'$vector[id_producto]','$resul[id_pedido]')") 
                or die ("problemas en el tercer select: ".mysqli_error($conection));
            }
        }
    }else{
        //INSERCION EN LA TABLA CLIENTE
        mysqli_query($conection,"insert into persona(nombre,apellido,DNI,telefono,email,direccion,id_tipo_persona) 
        values ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[DNI]','$_REQUEST[telefono]',
        '$_REQUEST[email]','$_REQUEST[direccion]',2)") 
        or die("Problemas en el primer insert: " . mysqli_error($conection));
        //TRAE EL ID_CLIENTE
        $seleccion=mysqli_query($conection,"select id_persona from persona where DNI='$_REQUEST[DNI]'") 
        or die("Problemas en el select: " . mysqli_error($conection));
        
        //INSERCION EN LA TABLA PEDIDO
        $cont=0;
        if($id=mysqli_fetch_array($seleccion)){
            foreach($_SESSION['carrito'] as $value){
                $most=mysqli_query($conection,"select * from producto where id_producto=$value[id]");
                $conver=mysqli_fetch_array($most);
                $cont+=($value['cant']*$conver['precio_unitario']);
            }
            mysqli_query($conection,"insert into pedido (id_persona,final_pedido,id_estado_pedido,id_pago_pedido) 
            values ('$id[id_persona]',$cont,1,$_REQUEST[id_pago_pedido])") or die ("problemas en el segundo select: ". mysqli_error($conection));
            
            //INSERTAR EN LA TABLA DETALLE_PEDIDO
            foreach($_SESSION['carrito'] as $valor){
                $seleccion2=mysqli_query($conection,"select id_pedido from pedido order by id_pedido desc limit 1") 
                or die("Problemas en el select: " . mysqli_error($conection));

                $levantar=mysqli_query($conection,"select * from producto where id_producto=$valor[id]") 
                or die(mysqli_error($conection));
                $vector=mysqli_fetch_array($levantar);//transformo lo de producto en un array
                if($resul=mysqli_fetch_array($seleccion2)){
                    mysqli_query($conection,"insert into detalle_pedido (precio,cantidad,precio_total,id_producto,id_pedido)  
                    values ('$vector[precio_unitario]','$valor[cant]',($vector[precio_unitario]*$valor[cant]),'$vector[id_producto]','$resul[id_pedido]')") 
                    or die ("problemas en el tercer select: ".mysqli_error($conection));
                }
            }
        }
    }
    
    //crear la session usuario
    $_SESSION['usuario'] = "guardado";
    session_destroy();
    header("location: ../index.php");
    exit;
    ?>
</body>
</html>