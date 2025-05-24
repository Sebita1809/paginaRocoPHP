<?php
if (!isset($_SESSION['Nombre'])) {
    header('location:index.php?ruta=403');
}
?>
    <section class="container">
        <h1>BIENVENIDO AL SISTEMA</h1>
        <h2>Este es el panel de control</h2>
    </section>