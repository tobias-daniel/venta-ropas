<!--------- ESTO PERTENECE AL INDEX ------------>
<header class="container-fluid encabezado p-5">
    <nav>
        <div class="row">
            <h1 class="col-lg-10 col-xl-10 col-md-6 col-sm-12">VIOLETA INDUMENTARIA</h1>
            <div class="col-lg-1 col-xl-1 col-md-3 col-sm-12"><a href="vista-cliente/carrito.php?id"><img src="https://e7.pngegg.com/pngimages/833/426/png-clipart-shopping-cart-shopping-cart.png" alt="logo carrito" width="30px" height="30px"></a></div>
            <div id="contenedor" class="col-lg-1 col-xl-1 col-md-3 col-sm-12">
                <a onclick="imagen()">
                    <img src="https://img.freepik.com/iconos-gratis/usuario_318-875902.jpg" alt="logo" width="30px" height="30px" id="imagen">
                </a>
                <form action="controlador/permiso.php" method="post" id="formulario">
                    <b>Usuario</b>
                    <br><input type="text" name="usuario" placeholder="eduardo" required style="width: 72px;"><br>
                    <b>Password</b>
                    <br><input type="password" name="contraseña" placeholder="67890" required style="width: 72px;"><br>
                    <br><input type="submit" value="Iniciar">
                </form>
            </div>
        </div>
    </nav>
</header>