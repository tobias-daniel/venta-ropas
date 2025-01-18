<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Mi pedido</title>
</head>
<body style="background-image: url(https://fondosmil.com/fondo/14256.jpg); background-repeat: no-repeat; background-size: cover; font-family: 'Lucida Sans';">
    <header class="container-fluid p-5" style="background-color:blueviolet;">
        <nav class="row">
            <div class="col-4"><a id="inicio" href="../index.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></div>
            <h1 class="col-8 text-light">MI PEDIDO</h1>
        </nav>
    </header>
    <div class="container-fluid" style="background-color:darkgrey;">
        <p class="row p-3">SI DESEA VER O QUIERE CANCELAR SU PEDIDO NECESITA USAR SU ID_PEDIDO, GRACIAS</p>
    </div>
    <main class="container-fluid text-center">
        <div class="row">
            <form action="ver_pedido.php" method="POST" class=" p-4 col-6" style="width: 300px; margin-left:15%; background-color: rgba(255, 255, 255, 0.6);">
                <h3>VER MI PEDIDO</h3>
                <br><br><b>ID DEL PEDIDO</b>
                <br><input type="number" name="id_pedido" placeholder="ingrese id_pedido" required class="form-control">
                <br><br><input type="submit" value="VER PEDIDO">
            </form>

            <form action="delete_pedido.php" method="POST" class=" p-4 col-6" style="width: 300px; margin-left:15%; background-color: rgba(255, 255, 255, 0.6);">
                <h3>CANCELAR MI PEDIDO</h3>
                <br><br><b>ID DEL PEDIDO</b>
                <br><input type="number" name="id_pedido" placeholder="ingrese el id_pedido" required class="form-control">
                <br><br><input type="submit" value="CANCELAR">
            </form>
        </div>
    </main>
</body>
</html>