<?php
require('admin.php');
class AdminController{
    static public function crtEditarUsuarioAdmin()
    {
        if (isset($_POST['nombre'])) {
            $datos = array(
                'idUsuario' => $_POST['idUsuario'],
                'Nombre' => $_POST['nombre'],
                'Apellido' => $_POST['apellido'],
                'Email' => $_POST['email'],
                'Celular' => $_POST['celular'],
                'Rol' => $_POST['rol'],
                'Activo' => $_POST['activo'],
            );

            $resultado = ModeloAdmin::mdlEditarUsuarioAdmin($datos);
            if ($resultado === "ok") {
                // Redirige al inicio
                header('Location: index.php?ruta=listadoUsuario'); // Cambia 'inicio' por la ruta que desees
                exit(); // Asegúrate de detener la ejecución del script
            } else {
                // Manejar el error si es necesario
                echo "Error al modificar el usuario.";
            }
        }
    }
    static public function crtEliminarUsuario(){
 
        $datos = array("idUsuario" => $_GET['id']);
        $resultado = ModeloAdmin::mdlEliminarUsuario($datos);

        $_SESSION['mensaje'] = 'Usuario eliminado exitosamente';
        if (is_array($resultado)) {
            foreach ($resultado as $error) {
                echo $error;
            }
        } else {
            echo $resultado === "ok" ? "Eliminar completado.<br>" : "Error en el registro: " . $resultado;
        }
    }
}
?>