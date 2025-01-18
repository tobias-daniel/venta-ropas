<?php
session_start();
$BD=mysqli_connect("localhost","root","","respaldo_sistema") or die ("error en la base de datos");
//INSERCION EN TABLA PERSONA
mysqli_query($BD,"insert into persona (nombre,apellido,DNI,telefono,email,direccion,id_tipo_persona) 
values ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[dni]','$_REQUEST[telefono]',
'$_REQUEST[email]','$_REQUEST[direccion]','2')") or die (mysqli_error($BD));

$total=0;
foreach($_SESSION['venta'] as $rec){
    $total+=$rec['total'];
}

//SACAR EL ID_PERSONA
$id=mysqli_query($BD,"select id_persona from persona order by id_persona desc limit 1;");
$id_persona=mysqli_fetch_array($id);
$num_factura=($id_persona['id_persona']+1);

//INSERCCION EN TABLA CABECERA_FACTURA
mysqli_query($BD,"insert into cabecera_factura (n_factura,precio_final,id_pago,id_tipo_factura,id_persona) 
values ('$num_factura','$total','$_REQUEST[id_pago]',2,'$id_persona[id_persona]')");

//SACAR EL ID_CABECERA
$identificador=mysqli_query($BD,"select id_cabecera from cabecera_factura order by id_cabecera desc limit 1;");
$id_cabecera=mysqli_fetch_array($identificador);

//INSERCION EN TABLA DETALLE_FACTURA
foreach($_SESSION['venta'] as $valor){
    
    //INSERCION EN DETALLE DE FACTURA
    mysqli_query($BD,"insert into detalle_factura(detalle_producto_f,precio_uni,cantidad_fac,precio_total,id_cabecera,id_producto) 
    values ('$valor[producto]','$valor[precio]','$valor[cantidad]','$valor[total]',$id_cabecera[id_cabecera],'$valor[id_producto]')") 
    or die(mysqli_error($BD));

    //ACTUALIZA LA CANTIDAD DE PRODUCTO
    mysqli_query($BD,"update producto set cantidad_producto=(cantidad_producto-$valor[cantidad]) where id_producto=$valor[id_producto]") 
    or die (mysqli_error($BD));
}
session_destroy();
header("location: ../registro_ventas.php");
exit;
?>