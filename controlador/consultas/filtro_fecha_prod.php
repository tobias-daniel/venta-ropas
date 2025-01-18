<?php
session_start();
$mi_base=mysqli_connect("localhost","root","","respaldo_sistema");
$desde=$_REQUEST['desde'];
$hasta=$_REQUEST['hasta'];
$id=$_REQUEST['id_producto'];

if($_REQUEST['desde']<=$_REQUEST['hasta'] and $_REQUEST['id_producto']){

    $seleccion=mysqli_query($mi_base,"select * from detalle_factura inner join cabecera_factura 
    on detalle_factura.id_cabecera=cabecera_factura.id_cabecera inner join tipo_factura on tipo_factura.id_tipo_factura=cabecera_factura.id_tipo_factura 
    where detalle_factura.id_producto='$id' order by fecha_factura ASC") or die ("error en el select ");

    while($a=mysqli_fetch_array($seleccion)){
        $recorte=substr($a['fecha_factura'],0,10);  //recorta la fecha y hora de la base de datos
        if($recorte>=$desde and $recorte<=$hasta){
            $_SESSION['todo'][]=array(
                "fecha"=>$a['fecha_factura'],
                "descripcion"=>$a['descripcion_tipo'],
                "id_factura"=>$a['id_cabecera'],
                "cantidad"=>$a['cantidad_fac'],
                "precio"=>$a['precio_total'],
                "id_producto"=>$a['id_producto']
            );
            
        }
    }
    header("location:../busqueda_detallada.php?listo");
    exit;
}else{
    header("location:../busqueda_detallada.php?error");
    // array(
    //     "fecha"=>$fecha['fecha_factura'],
    //     "tipo"=>$fecha['descripcion_tipo'],
    //     "id_factura"=>$fecha['id_cabecera'],
    //     "cantidad"=>$fecha['cantidad_fac'],
    //     "precio"=>$fecha['precio_total'],
    //     "id_producto"=>$fecha['id_producto']
    // );
}

?>