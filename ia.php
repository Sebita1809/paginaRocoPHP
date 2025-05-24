<?php
$db = new Conexion;
$sql = "SELECT * FROM usuarios";
$usuarios = $db->consulta($sql);
if (!isset($_SESSION['Nombre'])) {
  header('location:index.php?ruta=403');
}
?>
    
    <h1 class="tituloSmartChef">Welcome to SmartChef</h1>
    <div class="cocina">
        <div id="cortina" class="cortina"></div>
        <img src="imagenes/chef_trabado.png" class="fotoChef"
        id="fotoChef">
        <div class="explicacionChef">
            <p>Here you can ask for any recipies that you want. Just write all the ingredients you have down below AND START COOKING!!</p>
        </div>
        <div class="consultaChef">
            <input type="text" id="inputText" class="inputChef" placeholder="type your ingredients...">
            <button id="botonChef" class="botonChef">Let's cook! <img src="https://cdn-icons-png.flaticon.com/512/3063/3063509.png" alt=""></button>
        </div>
        <div class="respuestaChef">
            <p id="responseText" class="responseText"></p>
        </div>
    </div>