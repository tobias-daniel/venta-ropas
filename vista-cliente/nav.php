<!------------------- ESTO VA EN EL INDEX -------------------------->
<div class="container-fluid text-center" style="background-color: #680463;">
    <div class="row">
        <ul class="row">
            <div class="col-lg-3 col-xl-3 col-sm-12">
                <li>
                    <h3 class="link"><a style="text-decoration: none;" href="vista-cliente/pagina_pedido.php">Mi pedido</a></h3>
                </li>
            </div>
            <div class="col-lg-3 col-xl-3 col-sm-12">
                <li>
                    <h3 class="link"><a style="text-decoration: none;" href="vista-cliente/pagina4.html">Nuestra Info</a></h3>
                </li>
            </div>
            <div class="col-lg-3 col-xl-3 col-sm-12">
                <form action="vista-cliente/filtro_precio_prod.php" method="post"><input style="width: 75px;" type="number" name="min" required placeholder="$0"><input style="width: 75px;" type="number" name="max" required placeholder="$99999"><input type="submit" value="BUSCAR"></form>
            </div>
            <div class="col-lg-3 col-xl-3 col-sm-12">
                <form action="vista-cliente/filtro_descripcion.php" method="post"><input type="text" name="articulo" placeholder="descripcion del articulo" required><input type="submit" value="BUSCAR"></form>
            </div>
        </ul>
    </div>
</div>