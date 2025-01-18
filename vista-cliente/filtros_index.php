<!-------------- CONTENIDO DEL CUERPO DEL INDEX -------------->
<?php
    //SI SE BUSCÓ POR PRECIO DE PRODUCTO
    if (isset($_SESSION['precio_producto'])) { ?>
        <section class="container" style="display: grid; grid-template-columns: 2fr 2fr 2fr; gap: 1.5rem; justify-content: center;align-items: flex-start;">
            <?php
            $conectar = mysqli_connect("localhost", "root", "", "respaldo_sistema") or die("problemas de error");

            foreach ($_SESSION['precio_producto'] as $valor) {
                $registro = mysqli_query($conectar, "select * from producto  
                inner join talles on talles.id_talle=producto.id_talle where producto.id_producto=$valor[id_producto]")
                or die(mysqli_error($conectar));
                $comparar = [];

                while ($reg = mysqli_fetch_array($registro)) {
                    $comparar[] = $reg;
                    ?>
                    <div class="container">
                        <div class="row"><!--row: es una fila-->
                            <form action="vista-cliente/carrito.php" method="POST" class="col" style="background-color: rgba(255, 255, 255, 0.6);">
                                <h4 class="ropas"><?php echo $reg['nombre_producto']; ?></h4>
                                <a href="vista-cliente/detalle_producto.php?id=<?php echo $reg['id_producto']; ?>"><img src="<?php echo $reg['imagen']; ?>" width="300" height="300" alt="imagen"></a>
                                <h4 class="ropas"><?php echo "Cantidad disponible: " . $reg['cantidad_producto'] ?></h4>
                                <h4 class="ropas"><?php echo "Talle: " . $reg['talle']; ?></h4>
                                <h4 class="ropas"><?php echo "Precio: $" . $reg['precio_unitario']; ?></h4>
                                <h4 class="ropas"><input class="col-8" type="number" name="pedido_cantidad" min="1" max="<?php echo $reg['cantidad_producto'] ?>" placeholder="Cantidad" required></h4>
                                <!-- ENVIO EL ID_PRODUCTO A CARRITO.PHP-->
                                <input type="hidden" name="id_producto" value="<?php echo $reg['id_producto']; ?>">
                                <input class="pedido" type="submit" name="agregar" value="AGREGAR">
                            </form>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </section>
    <?php session_destroy();
    //SI SE BUSCÓ POR NOMBRE DEL PRODUCTO
    } elseif (isset($_SESSION['descripcion_producto'])) { ?>
        <section class="container" style="display: grid; grid-template-columns: 2fr 2fr 2fr; gap: 1.5rem; justify-content: center;align-items: flex-start;">
            <?php
            $conectar = mysqli_connect("localhost", "root", "", "respaldo_sistema") or die("problemas de error");

            foreach ($_SESSION['descripcion_producto'] as $valor1) {
                $registro = mysqli_query($conectar, "select * from producto  
                inner join talles on talles.id_talle=producto.id_talle where producto.id_producto=$valor1[id_producto]")
                or die(mysqli_error($conectar));
                $comparar = [];

                while ($reg = mysqli_fetch_array($registro)) {
                    $comparar[] = $reg;
                ?>
                <div class="container">
                    <div class="row"><!--row: es una fila-->
                        <form action="vista-cliente/carrito.php" method="POST" class="col" style="background-color: rgba(255, 255, 255, 0.6);">
                            <h4 class="ropas"><?php echo $reg['nombre_producto']; ?></h4>
                            <a href="vista-cliente/detalle_producto.php?id=<?php echo $reg['id_producto']; ?>"><img src="<?php echo $reg['imagen']; ?>" width="300" height="300" alt="imagen"></a>
                            <h4 class="ropas"><?php echo "Cantidad disponible: " . $reg['cantidad_producto'] ?></h4>
                            <h4 class="ropas"><?php echo "Talle: " . $reg['talle']; ?></h4>
                            <h4 class="ropas"><?php echo "Precio: $" . $reg['precio_unitario']; ?></h4>
                            <h4 class="ropas"><input class="col-8" type="number" name="pedido_cantidad" min="1" max="<?php echo $reg['cantidad_producto']; ?>" placeholder="Cantidad" required></h4>
                            <!-- ENVIO EL ID_PRODUCTO A CARRITO.PHP-->
                            <input type="hidden" name="id_producto" value="<?php echo $reg['id_producto']; ?>">
                            <input class="pedido" type="submit" name="agregar" value="AGREGAR">
                        </form>
                    </div>
                </div>
            <?php
                }
            }
            ?>
        </section>
    <?php session_destroy();
    //CONTENIDO DE LA PAGINA NORMAL
    } else { ?>
        <section class="container inicio">
            <?php
            if (isset($_SESSION['usuario'])) {
                echo "<h2>Su pedido se guardó CORRECTAMENTE!! ver el pedido en REGISTRO COMPLETO DE PEDIDOS</h2>";
                //borra su contenido de session
                unset($_SESSION['usuario']);
            }
            $conectar = mysqli_connect("localhost", "root", "", "respaldo_sistema") or die("problemas de error");

            $registro = mysqli_query($conectar, "select * from producto  
            inner join talles on talles.id_talle=producto.id_talle where cantidad_producto>=1") or die(mysqli_error($conectar));
            $comparar = [];

            while ($reg = mysqli_fetch_array($registro)) {
                $comparar[] = $reg;
                ?>
                <div class="container">
                    <div class="row"><!--row: es una fila-->
                        <form action="vista-cliente/carrito.php" method="POST" class="col" style="background-color: rgba(255, 255, 255, 0.6);">
                            <h4 class="ropas"><?php echo $reg['nombre_producto']; ?></h4>
                            <a href="vista-cliente/detalle_producto.php?id=<?php echo $reg['id_producto']; ?>"><img src="<?php echo $reg['imagen']; ?>" width="300" height="300" alt="imagen"></a>
                            <h4 class="ropas"><?php echo "Cantidad disponible: " . $reg['cantidad_producto'] ?></h4>
                            <h4 class="ropas"><?php echo "Talle: " . $reg['talle']; ?></h4>
                            <h4 class="ropas"><?php echo "Precio: $" . $reg['precio_unitario']; ?></h4>
                            <h4 class="ropas"><input class="col-8" type="number" name="pedido_cantidad" placeholder="Cantidad" min="1" max="<?php echo $reg['cantidad_producto'] ?>" required></h4>
                            <!-- ENVIO EL ID_PRODUCTO A CARRITO.PHP-->
                            <input type="hidden" name="id_producto" value="<?php echo $reg['id_producto']; ?>">
                            <input class="pedido" type="submit" name="agregar" value="AGREGAR">
                        </form>
                    </div>
                </div>
            <?php
            }
            //empty determina si esta vacio el elemento
            if (empty($comparar)) {
                echo '<h3 id="informacion">No hay productos a la venta, por favor intente mas tarde. GRACIAS</h3>';
            }
            ?>
        </section>
    <?php
    }
    ?>