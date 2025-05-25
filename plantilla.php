<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Styles.css">
    <link>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jersey+10&family=Keania+One&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="icon" href="imagenes/HH.ico">
</head>

<body>

    <?php 
            // Cargar la vista y obtener la ruta
            $currentRoute = isset($_GET['ruta']) ? $_GET['ruta'] : 'inicio';


            // Verificar si la ruta actual es 'login' o 'home'
            if ($currentRoute !== 'login' && $currentRoute !== 'inicio' && $currentRoute != 'registro' && $currentRoute !== 'login.php' && $currentRoute !== 'inicio.php' && $currentRoute != 'registro.php') { ?>
        <header class="headerHome">
    <?php 
                include('navar.php'); 
            ?>

        </header>
    <?php } ?>

        <!-- ACA VAN TODAS LAS VISTAS -->
        <?php
            RutasController::cargarVista();
        ?>
        


        <script type="importmap">
            {
            "imports": {
                "@google/generative-ai": "https://esm.run/@google/generative-ai"
            }
            }
        </script>
        <script type="module" src="javaScript/Js.js"></script>
        <script src="javaScript/dropdown.js"></script>
</body>

</html>
