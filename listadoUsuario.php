<?php
$db = new Conexion;
$sql = "SELECT * FROM usuarios";
$usuarios = $db->consulta($sql);
if (isset($_SESSION['Rol']) && $_SESSION['Rol'] == "CLIENTE" ||!isset($_SESSION['Nombre'])) {
  header('location:index.php?ruta=403');
}
?>
<!--<h1>Hola SOY un LISTADO</h1>-->
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id Usuario</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Celular</th>
        <th scope="col">Rol</th>
        <th scope="col">Activo</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $usuario) : ?>
        <tr>
          <th><?php echo $usuario['idUsuario'] ?></th>
          <td><?php echo $usuario['Nombre'] ?></td>
          <td><?php echo $usuario['Apellido'] ?></td>
          <td><?php echo $usuario['Email'] ?></td>
          <td><?php echo $usuario['Celular'] ?></td>
          <td><?php echo $usuario['Rol'] ?></td>
          <td><?php echo $usuario['Activo'] ?></td>
          <td>
            <a href="index.php?ruta=editarUsuario&id=<?php echo $usuario['idUsuario'] ?>" class="btn btn-success">EDITAR</a>
            <a href="index.php?ruta=eliminarUsuario&id=<?php echo $usuario['idUsuario'] ?>" class="btn btn-danger">ELIMINAR</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>