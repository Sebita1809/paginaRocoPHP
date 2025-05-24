<?php

require_once('plantilla.controller.php');
require_once('usuario.controller.php');
require_once('admin.controller.php');
require_once('rutas.controller.php');
require_once('conexion.php');

$plantilla = new PlantillaController();

$plantilla ->crtGetPlantilla();

?>