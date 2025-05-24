<?php
$db = new Conexion;
$sql = "SELECT * FROM usuarios WHERE idUsuario = ".$_GET['id'];
$usuario = $db->consulta($sql);
?>

<div class="loginEdit">
<?php if (isset($_SESSION['Rol']) && $_SESSION['Rol'] == "CLIENTE" ||!isset($_SESSION['Nombre'])) {
        header('location:index.php?ruta=403');
    } ?>
    <form method="POST">
        <div class="datosLogin">
            <div class="mb-3">
                <input type="text" class="form-control" name="idUsuario" value="<?php echo $usuario['0']['idUsuario'] ?>" hidden>
                <p for="exampleInputEmail1" class="emailPassword">Nombre</p>
                <input type="text" class="form-control" name="nombre" value="<?php echo $usuario['0']['Nombre'] ?>">
            </div>
            <div class="mb-3">
                <p for="exampleInputPassword1" class="emailPassword">Apellido</p>
                <input type="text" class="form-control" name="apellido" value="<?php echo $usuario['0']['Apellido'] ?>">
            </div>
            <div class="mb-3">
                <p for="exampleInputPassword1" class="emailPassword">Email</p>
                <input type="email" class="form-control" name="email" value="<?php echo $usuario['0']['Email'] ?>">
            </div>
            <div class="mb-3">
                <p for="exampleInputPassword1" class="emailPassword">Celular</p>
                <input type="number" class="form-control" name="celular" value="<?php echo $usuario['0']['Celular'] ?>">
            </div>
            <select class="emailPasswordSelect" name="rol" value="<?php echo $usuario['0']['Rol'] ?>">
                <option value="CLIENTE">CLIENTE</option>
                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
            </select>
            <select class="emailPasswordSelect" name="activo" value="<?php echo $usuario['0']['Activo'] ?>">
                <option value="ACTIVO">ACTIVO</option>
                <option value="INACTIVO">INACTIVO</option>
                <option value="PENDIENTE">PENDIENTE</option>
            </select>
            <button type="submit" class="botonEditarUsuario">Modificar</button>
            <?php
            // $usuario = AdminController::crtGuardarUsuario();
            $registro = AdminController::crtEditarUsuarioAdmin();
            ?>
        </div>
    </form>
</div>