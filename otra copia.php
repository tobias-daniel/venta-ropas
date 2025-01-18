<table>   <!--esto es si no existe la session-->
            <thead>
                <tr>
                    <th>PRODUCTO</th>
                    <th></th>
                    <th>GENERO</th>
                    <th></th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                </tr>
            </thead>
            <?php
            foreach($_SESSION['carrito'] as $valor){
                $guardar=mysqli_query($conec,"select * from producto inner join categoria 
                on categoria.id_categoria=producto.id_categoria where id_producto=$valor[id]");
                
                while($recorrer=mysqli_fetch_array($guardar)){
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $recorrer['nombre_producto']?><td>
                        <td><?php echo $recorrer['nombre_categoria']?><td>
                        <td><?php echo $_REQUEST['pedido_cantidad']?></td>
                        <td><?php echo $recorrer['precio_unitario']?></td>
                    </tr>
                </tbody>
                <?php
                }
            }
        ?>
        </table>


        <!-- esto es si ya existe la session -->
        <table>
            <thead>
                <tr>
                    <th>PRODUCTO</th>
                    <th></th>
                    <th>GENERO</th>
                    <th></th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <?php
            foreach($_SESSION['carrito'] as $valor){
                $guardar=mysqli_query($conec,"select * from producto inner join categoria 
                on categoria.id_categoria=producto.id_categoria where id_producto=$valor[id]");
                
                while($recorrer=mysqli_fetch_array($guardar)){
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $recorrer['nombre_producto']?><td>
                        <td><?php echo $recorrer['nombre_categoria']?><td>
                        <td><?php echo $valor['cant']?></td>
                        <td><?php echo $recorrer['precio_unitario']?></td>
                        <td><?php echo ($recorrer['precio_unitario']*$valor['cant'])?></td>
                    </tr>
                </tbody>
                <?php
                }
            }
        ?>
        </table>
        <?php
        
        ?>
        <h3><a href="pagina3.php">Cargar mas productos</a></h3>
        <h3><a href="pagina2.php">RELLENAR DATOS</a></h3>