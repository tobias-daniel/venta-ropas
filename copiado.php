<?php
// //si se selecciono AGREGAR entra aca
// if(isset($_REQUEST['agregar'])){
//     //si EXISTE la variable $_SESSION['carrito'] entra aca
//     if (isset($_SESSION['carrito'])) {
//         $carrito = $_SESSION['carrito'];//se le asigna a $carrito el array $_SESSION['carrito']
//         $arrayNuevo=array(//se crea el array $arrayNuevo y se le da el valor del id_producto
//             "id"=>$_REQUEST["id_producto"]
//         );
//         //el array_push AGREGA al array $carrito lo que hay en el array $arrayNuevo (string="id")
//         array_push($carrito, $arrayNuevo);
//         //el Array $carrito lo agrega a la variable $_SESSION['carrito']
//         $_SESSION['carrito']=$carrito;
//         echo "<h1>se agregó nuevo producto al carrito</h1>";
//     }else {
//         //si NO existe la variable $_SESSION['carrito'] entra y CREA dos arreglos
//         $carrito = array();//se crea el array $carrito
//         $agregado=array(//se crea un array $agregado y se le da el valor del id_producto
//             "id"=>$_REQUEST['id_producto']
//         );
//         //array_push AGREGA al Array $carrito, lo que hay en el Array $agregado (string="id")
//         array_push($carrito, $agregado);
//         //el Array $carrito lo agrega a la variable $_SESSION['carrito']
//         $_SESSION['carrito'] = $carrito;
//         echo "<h1>se agregó al carrito</h1>";
//     }
//     ?>
//     <a href="pagina3.php"><h3>Cargar mas productos</h3></a>
//     <?php
//     // var_dump($_SESSION['carrito']);
// //si presiono la imagen del carrito entra aca
// }elseif(isset($_GET['id'])){
//     //si la $_SESSiON['carrito'] EXISTE entra aca y recorre
//     if(isset($_SESSION['carrito'])){
//         var_dump($_SESSION['carrito']);
//         ?><h1>Carrito de productos</h1>
//         <table>
//             <thead>
//                 <tr>
//                     <th>PRODUCTO</th>
//                     <th></th>
//                     <th>CANTIDAD</th>
//                     <th>PRECIO</th>
//                 </tr>
//             </thead>
//         <?php
//         foreach($_SESSION['carrito'] as $valor){
//         $guardar=mysqli_query($conec,"select * from productos where id_producto='$valor[id]'");
//             while($recorrer=mysqli_fetch_array($guardar)){
//             ?>
//             <tbody>
//                 <tr>
//                     <td><?php echo $recorrer['nombre_producto']?><td>
//                     <td><?php echo $recorrer['cantidad']?></td>
//                     <td><?php echo $recorrer['precio_unitario']?></td>
//                 </tr>
//             </tbody>
//             <?php
//             }
//         }
//         ?>
//         </table>
//     <a href="pagina3.php"><h3>Cargar mas productos</h3></a>
//     <a href="pagina2.php"><h3>RELLENAR DATOS</h3></a>
//     <?php
//     //si PRECIONÓ el carrito y no existe la $_Session['carrito'] te redirecciona
//     }else{
//         header("location: pagina3.php");
//         exit;
//     }
// }
//para borrar la session:
// unset($_SESSION['carrito']);
?>