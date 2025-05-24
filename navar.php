<div class="home">
            <img src="imagenes/HH.ico" class="logoHHHome">
            <button onclick="toggleDropdown()">
                <img id="flechaDropdown" src="imagenes/barras.png" alt="">
            </button>
            <div id="myDropdown" class="dropdown-content">
                <a href="index.php?ruta=home">Home</a>
                <a href="index.php?ruta=login">Sign Out</a>
                <a href="index.php">Exit</a>
            <?php session_start(); 
              if (isset($_SESSION['Rol']) && $_SESSION['Rol'] == "ADMINISTRADOR") {?>
                <a href="index.php?ruta=listadoUsuario">Listado</a>
            <?php }?>
            </div>
        </div>
        <div class="dropDownPerfil">
          <?php if (isset($_SESSION['Nombre'])) { ?>
            <p><?php echo htmlspecialchars($_SESSION['Nombre']); ?></p> <!-- Muestra el nombre del usuario -->
            <img src="imagenes/FotoPerfilDefault.png">
    <?php } else {} ?>
</div>
