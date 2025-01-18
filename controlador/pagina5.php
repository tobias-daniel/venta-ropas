<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosN5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>ADMINISTRADOR</title>
</head>

<body>
    <header class="container-fluid d-flex p-5" style="background-color: teal;">
        <h3 class="col-4"><a href="../index.php"><img class="img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/61/61449.png" alt="logo" width="50px" height="50px"></a></h3>
        <h1 class="col-8 text-light">ADMINISTRACION GENERAL</h1>
    </header>
    <main class="container">
        <div style="display: grid; grid-template-columns: 2fr 2fr; justify-content: center;">
            <div class="text-center">
                <a href="compra_manual.php" style="text-decoration: none;">
                <img src="https://i.pinimg.com/550x/bf/19/90/bf1990e247292b756ca7926443f00ab6.jpg" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>COMPRAR</h3>
            </div>
            <div class="text-center">
                <a href="venta_manual.php" style="text-decoration: none;">
                <img src="https://e7.pngegg.com/pngimages/671/893/png-clipart-product-design-technology-cash-register-logo-monochrome.png" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>VENDER</h3>
            </div>
            <div class="text-center">
                <a href="registro_compras.php" style="text-decoration: none;">
                <img src="https://img.freepik.com/vector-premium/icono-carpeta-carpeta-abierta-documentos-diseno-su-sitio-web-aplicacion-logotipo-interfaz-usuario_435184-341.jpg" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>COMPRAS</h3>
            </div>
            <div class="text-center">
                <a href="registro_ventas.php" style="text-decoration: none;">
                <img src="https://thumbs.dreamstime.com/b/icono-de-carpeta-y-lista-ilustraci%C3%B3n-una-eventos-cat%C3%A1logo-registro-asuntos-inventario-bienes-precios-declaraci%C3%B3n-los-260576640.jpg" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>VENTAS</h3>
            </div>
            <div class="text-center">
                <a href="registro_pedidos.php" style="text-decoration: none;">
                <img src="https://w7.pngwing.com/pngs/49/117/png-transparent-computer-icons-order-picking-text-task-symbol.png" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>PEDIDOS</h3>
            </div>
            <div class="text-center">
                <a href="registro_total_prod.php" style="text-decoration: none;">
                <img src="https://cdn-icons-png.flaticon.com/512/5759/5759258.png" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>INVENTARIO</h3>
            </div>
            <div class="text-center">
                <a href="proveedores.php" style="text-decoration: none;">
                <img src="https://w7.pngwing.com/pngs/698/880/png-transparent-computer-icons-vendor-delivery-miscellaneous-blue-data-thumbnail.png" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>PROVEEDORES</h3>
            </div>
            <div class="text-center">
                <a href="caja.php" style="text-decoration: none;">
                <img src="https://e7.pngegg.com/pngimages/983/354/png-clipart-cash-register-computer-icons-money-payment-point-of-sale-bank-text-drawer.png" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>CAJA</h3>
            </div>    
            <div class="text-center">
                <a href="busqueda_detallada.php" style="text-decoration: none;">
                <img src="https://images.vexels.com/media/users/3/153786/isolated/preview/a70457c54c3233000897c57a44464761-icono-de-trazo-de-color-de-fecha-marcada.png" width="140px" height="90px" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>FILTRO</h3>
            </div>    
            <div class="text-center">
                <a href="estadistica.php" style="text-decoration: none;">
                <img src="https://c1.klipartz.com/pngpicture/991/237/sticker-png-calendar-logo-symbol-agenda-silhouette-text-line-number.png" width="140" height="90" onmouseover="ampliar(this)" onmouseout="minimizar(this)">
                </a>
                <h3>ESTADISTICA</h3>
            </div>
        </div>
    </main>
</body>
<script>
    function ampliar(elem){
        elem.style.width='150px';
        elem.style.height='100px';
    }
    function minimizar(elem){
        elem.style.width='140px';
        elem.style.height='90px';
    }
</script>
</html>