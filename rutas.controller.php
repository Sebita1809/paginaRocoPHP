<?php

class RutasController{
    static public function cargarVista(){
        //crear un array con las rutas
        $rutas = [
            "inicio"    => "inicio.php",
            /*Rutas de productos*/
            "home"    => "home.php",
            "403"     => "403.php",
            "registro"     => "registro.php",
            "listadoUsuario"   => "listadoUsuario.php",
            "editarUsuario"    => "editarUsuario.php",
            "eliminarUsuario"  => "eliminarUsuario.php",
            "logout"     => "logout.php",
            "login"     => "login.php",
            "ia"     => "ia.php",
            "excercise"     => "excercise.php",
            "macro_cal"     => "macro_cal.php",
            "prueba"     => "prueba.php",
            "dashboard"     => "dashboard.php"
        ];

        if (isset($_GET['ruta']) && array_key_exists($_GET['ruta'],$rutas)) {
    $archivo = $rutas[$_GET['ruta']];
    include(file_exists($archivo) ? $archivo : "404.php");
} else {
    include("inicio.php");
}
    }
}

?>