<?php
$conex=mysqli_connect("localhost","root","","respaldo_sistema");

if(isset($_POST['datos_proveedor'])){
    mysqli_query($conex,"call insert_prov_empl('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[DNI]',
    '$_REQUEST[telefono]','$_REQUEST[email]','$_REQUEST[direccion]','$_REQUEST[id_tipo_persona]')");
    // mysqli_query($conex,"insert into persona (nombre,apellido,DNI,telefono,email,direccion,id_tipo_persona) 
    // values ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[DNI]','$_REQUEST[telefono]','$_REQUEST[email]','$_REQUEST[direccion]','$_REQUEST[id_tipo_persona]')") 
    // or die(mysqli_error($conex));

    header("location: ../proveedores.php?listo");
    exit;
    
}else{
    header("location: ../proveedores.php");
    exit;
}
/*
DELIMITER //
CREATE PROCEDURE insert_prov_empl(
    IN @nombre varchar(30), @apellido varchar(30), @DNI double, @telefono double,
    @email varchar(40), @direccion varchar(50), @id_tipo_persona int(11)
)BEGIN
	INSERT INTO persona (nombre,apellido,DNI,telefono,email,direccion,id_tipo_persona) 
    VALUES(@nombre,@apellido,@DNI,@telefono,@email,@direccion,@id_tipo_persona);
END
// DELIMITER ;*/
?>