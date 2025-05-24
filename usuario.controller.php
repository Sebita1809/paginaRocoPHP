<?php

require('usuario.php');
class UsuarioController
{


    static public function crtRegistroUsuario() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datos = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'email' => $_POST['email'],
                'celular' => $_POST['celular'],
                'pass' => $_POST['pass'],
                'rol' => 'CLIENTE',
                'activo' => 'ACTIVO'
            ];
        
            $resultado = ModeloUsuario::mdlRegistroUsuario($datos);
        
            if (is_array($resultado)) {
                foreach ($resultado as $error) {
                    echo $error;
                }
            } elseif ($resultado === "ok") {
                // Redirige al inicio
                header('Location: index.php?ruta=inicio'); // Cambia 'inicio' por la ruta que desees
                exit(); // Asegúrate de detener la ejecución del script
            } else {
                // Manejar el error si es necesario
                echo "Error en el registro: ";
            }
        }
    }

    static public function crtLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datos = [
                'email' => $_POST['email'],
                'Pass' => $_POST['Pass']
            ];
        
            $resultado = ModeloUsuario::mdlLogin($datos);

            // Manejo de errores (mostrar errores si existen)
            if (!empty($resultado)) {
                foreach ($resultado as $error) {
                    echo $error;
                }
            }
        }
    }
    
}
