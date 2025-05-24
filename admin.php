<?php
class ModeloAdmin extends ModeloUsuario
{
    public $fecha;
    public $hora;
    public $ocupado;


    public function __construct($fecha, $hora, $ocupado)
    {
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ocupado = $ocupado;
    }
    static public function validarDatosTurno($datos)
    {
        $fecha = $datos['fecha'];
        $hora = $datos['hora'];
        $errores = [];

        if (empty($fecha)) {
            $errores[] = "Debe completar el nombre <br>";
        }
        if (empty($hora)) {
            $errores[] = "Debe completar el apellido <br>";
        }

        return $errores;
    }
    static public function mdlEditarUsuarioAdmin($datos)
    {
        //ejecutar la query en la BD
        $registro = Conexion::conectar()->prepare('UPDATE usuarios SET Nombre= :Nombre, Apellido=:Apellido, Email=:Email, Celular= :Celular, Rol=:Rol, Activo=:Activo WHERE idUsuario = :idUsuario');
        $registro->bindParam(":idUsuario", $datos['idUsuario'], PDO::PARAM_INT);
        $registro->bindParam(":Nombre", $datos['Nombre'], PDO::PARAM_STR);
        $registro->bindParam(":Apellido", $datos['Apellido'], PDO::PARAM_STR);
        $registro->bindParam(":Email", $datos['Email'], PDO::PARAM_STR);
        $registro->bindParam(":Celular", $datos['Celular'], PDO::PARAM_STR);
        $registro->bindParam(":Rol", $datos['Rol'], PDO::PARAM_STR);
        $registro->bindParam(":Activo", $datos['Activo'], PDO::PARAM_STR);
        if ($registro->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $registro->closeCursor();
        $registro = NULL;
    }
    static public function mdlEliminarUsuario($datos){
        $registro = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE idUsuario = :idUsuario");

        $registro->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);


        if ($registro->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $registro->closeCursor();
        $registro = null;
     }
}

?>