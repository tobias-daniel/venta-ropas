<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
    <title>Inicio</title>
    <style>
        body {
            font-family: 'Lucida Sans';
        }
        li {
            list-style: none;
            /**oculta los itemps */
        }
        #formulario {
            display: none;
            position: absolute;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-image: url(https://i.pinimg.com/originals/17/34/9f/17349fd4513492ef8a299cca275ff79a.jpg);
            color: black;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }
    </style>
</head>
<body>
    <!------------------- ENCABEZADO -------------------->
    <?php
    include("vista-cliente/header.php");
    ?>

    <!------------------- NAVEGADOR: LINKS Y BUSCADORES ---------------------->
    <?php
    include("vista-cliente/nav.php");
    ?>

    <!---------------- MAIN: CUERPO DE LA PAGINA --------------------->
    <main class="container-fluid" style="background-color: violet;">
        <div class="container" style="background-image: url(https://marketplace.canva.com/EAE9-TzndXg/1/0/900w/canva-fondo-de-pantalla-para-telefono-celular-lila-violeta-4IxRSSYyXFo.jpg); background-repeat: no-repeat; background-size: cover;">
            <?php
            include("vista-cliente/filtros_index.php");
            ?>
        </div>
    </main>

    <!----------------- FOOTER: REDES SOCIALES ----------------->
    <?php
    include("vista-cliente/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function imagen(){
            document.getElementById('imagen').style.opacity=0;
            document.getElementById('formulario').style.display='block';
        }
        document.getElementById('formulario').addEventListener('dblclick', ocultar);
        function ocultar(){
            document.getElementById('formulario').style.display='none';
            document.getElementById('imagen').style.opacity=10;
        }
    </script>
</body>
</html>