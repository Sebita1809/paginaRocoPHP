<?php
require_once('conexion.php');

class ModeloUsuario
{
    public $nombre;
    public $apellido;
    private $email;
    private $celular;
    private $pass;
    private $rol;
    private $activo;

    public function __construct($nombre, $apellido, $email, $celular, $pass, $rol, $activo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->celular = $celular;
        $this->pass = $pass;
        $this->rol = $rol;
        $this->activo = $activo;
    }

    static public function validarDatos($datos)
    {
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $email = $datos['email'];
        $celular = $datos['celular'];
        $pass = $datos['pass'];
        $errores = [];

        if (empty($nombre)) {
            $errores[] = "Debe completar el nombre <br>";
        }
        if (empty($apellido)) {
            $errores[] = "Debe completar el apellido <br>";
        }
        if (empty($email)) {
            $errores[] = "Debe completar el email <br>";
        }
        if (empty($celular)) {
            $errores[] = "Debe completar el celular <br>";
        }
        if (empty($pass)) {
            $errores[] = "Debe completar el pass <br>";
        }

        if (strlen($pass) < 8) {
            $errores[] = "Debe tener más de 8 caracteres <br>";
        }

        if (!preg_match('`[a-z]`', $pass)) {
            $errores[] = "La clave debe tener al menos una letra minúscula<br>";
        }

        if (!preg_match('`[A-Z]`', $pass)) {
            $errores[] = "La clave debe tener al menos una letra mayúscula<br>";
        }

        if (!preg_match('`[0-9]`', $pass)) {
            $errores[] = "La clave debe tener al menos un caracter numérico<br>";
        }

        return $errores;
    }

    static public function mdlRegistroUsuario($datos)
    {
        $errores = ModeloUsuario::validarDatos($datos);

        if (empty($errores)) {
            $conexion = Conexion::conectar();
            $registro = $conexion->prepare('INSERT INTO usuarios (Nombre, Apellido, Email, Celular, Pass, Rol, Activo) VALUES(:nombre, :apellido, :email, :celular, :pass, :rol, :activo)');

            $registro->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
            $registro->bindParam(":apellido", $datos['apellido'], PDO::PARAM_STR);
            $registro->bindParam(":email", $datos['email'], PDO::PARAM_STR);
            $registro->bindParam(":celular", $datos['celular'], PDO::PARAM_STR);
            $registro->bindParam(":pass", $datos['pass'], PDO::PARAM_STR);
            $registro->bindParam(":rol", $datos['rol'], PDO::PARAM_STR);
            $registro->bindParam(":activo", $datos['activo'], PDO::PARAM_STR);

            if ($registro->execute()) {
                return "ok";
            } else {
                return $registro->errorInfo();
            }

            $registro->closeCursor();
            $registro = NULL;
        } else {
            return $errores;
        }
    }
    static public function mdlLogin($datos)
    {
        $email = $datos['email'];
        $pass = $datos['Pass'];
        $errores = [];

        
        if (empty($email)) {
            $errores[] = "Debe completar el email <br>";
        } else {
            try {
                $conexion = Conexion::conectar();
                $consulta = $conexion->prepare('SELECT * FROM usuarios WHERE Email = :email');
                $consulta->bindParam(':email', $email, PDO::PARAM_STR);
                $consulta->execute();
                $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
                if (!$usuario) {
                    $errores[] = "La contraseña o el email no coinciden <br>";
                } else {
                    if ($pass== $usuario['Pass']) {
                        // El email y la contraseña son correctos
                        session_start();
                        $_SESSION = $usuario;
                        header('Location:index.php?ruta=home');
                        exit();
                    } else {
                        $errores[] = "La contraseña o el email no coinciden <br>";
                    }
            } 
            }catch (PDOException $e) {
                    $errores[] = "Error en la conexión: " . $e->getMessage();
            }
        
            return $errores;
        }
}}

?>