<?php
if(isset($_POST['usuario']) and isset($_POST['contraseña'])){
    $iniciar=mysqli_connect("localhost","root","","respaldo_sistema") or die ("error en la conexion");

    $usuario=mysqli_query($iniciar,"select * from persona inner join tipo_persona 
    on persona.id_tipo_persona=tipo_persona.id_tipo_persona where persona.id_tipo_persona=1 or persona.id_tipo_persona=4");
    $valor=true;
    while($recorrer=mysqli_fetch_array($usuario)){
        if($recorrer['nombre']==$_POST['usuario'] && $recorrer['contraseña']==$_POST['contraseña']){
            header("location:pagina5.php?id_persona=$recorrer[id_persona]");
            $valor=false;
        }
    }
    if($valor==true){
        header("location:../index.php");
    }
}else{
    header("location:../index.php");
}
?>