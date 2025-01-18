<?php
session_start();
$base=mysqli_connect("localhost","root","","respaldo_sistema");

if($_REQUEST['desde']<=$_REQUEST['hasta']){
    // $inicio= strtotime($_REQUEST['desde']);
    // $fin= strtotime($_REQUEST['hasta']);
    $inicio=$_REQUEST['desde'];
    $fin=$_REQUEST['hasta'];
    
    $select=mysqli_query($base,"select fecha_factura from cabecera_factura");
    while($a=mysqli_fetch_array($select)){
        
        $new=substr($a['fecha_factura'],0,10);//recortando la fecha en la variable: $new
        if($new>=$inicio && $new<=$fin){
            
            $_SESSION['fechas'][]=array(
                "date"=>$new,
                "old"=>$a['fecha_factura']
            );
        }
        if($new<$inicio){
            $_SESSION['total'][]=array(
                "anterior"=>$a['fecha_factura']
            );
        }
    }
    header("location: ../caja.php?buscado");
    exit;
}else{
    header("location: ../caja.php");
}
?>