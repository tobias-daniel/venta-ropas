<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Pedidos-clientes</title>
</head>
<body style="font-family: 'Lucida Sans';">
    <header class="container-fluid bg-secondary p-5 text-light">
        <nav class="row">
            <div class="col-lg-4 col-sm-1">
                <a id="inicio" href="../index.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a>
            </div>
            <h1 class="col-lg-8 col-sm-10">Violeta Indumentaria</h1>
        </nav>
    </header>
    <main class="container d-flex" style="background-image: url(https://album.es/fotos/uploads/imagenes/thumbs/fondo-primavera-album-classic-flores-lilas-y-rosas_primavera-14-classic_1200px.jpg); background-repeat: no-repeat; background-size: cover;">
        <form action="registrar_pedido.php" method="$_POST" class="col-lg-6 col-sm-9" style="width: 400px;">
            <h3>RELLENE CON SUS DATOS</h3>
                <b>Nombre</b>
            <br><input type="text" name="nombre" placeholder="ingrese nombre" required class="form-control">
            <br><b>Apellido</b>
            <br><input type="text" name="apellido" placeholder="ingrese apellido" required class="form-control">
            <br><b>DNI</b>
            <br><input type="number" name="DNI" placeholder="N°-------" required class="form-control">
            <br><b>Telefono</b>
            <br><input type="number" name="telefono" placeholder="numero de telefono" required class="form-control">
            <br><b>E-mail</b>
            <br><input type="email" name="email" placeholder="ingrese e-mail" required class="form-control">
            <br><b>Dirección</b>
            <br><input type="text" name="direccion" placeholder="su dirección" required class="form-control">
            <br><b>Tipo de Pago</b>
            <br><select name="id_pago_pedido" class="form-select">
                <option value="1">Efectivo</option>
                <option value="3">Tarjeta de credito</option>
                <option value="2">Transferencia</option>
            </select>
            <br><br><input type="submit" value="ENVIAR" class="btn btn-primary">
        </form>
        <div style="margin-left: 10%;" class="col-lg-6 col-sm-3 p-5">
            <h3>* Rellene con sus datos personales para terminar su pedido</h3><br>
            <h3>* Si desea Cancelarlo o Ver puede en el apartado de MI PEDIDO</h3><br>
            <h3>* Su pedido se registrara y se le informará cuando esté</h3>
        </div>
    </main>
</body>
</html>