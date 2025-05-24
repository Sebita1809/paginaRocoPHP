<?php
$db = new Conexion;
$sql = "SELECT * FROM usuarios";
$usuarios = $db->consulta($sql);
if (!isset($_SESSION['Nombre'])) {
  header('location:index.php?ruta=403');
}
?>
    <div class="itemsHome">
        <div class="smartChefAccessHome">
            <img src="imagenes/logoChef2.png">
            <p>SmartChef is an AI focus on your alimentation, it will show you 5 healthy recipes and you only have to tell him what ingredients you have in your fridge. It's so easy, let's try it!!</p>
            <a href="index.php?ruta=ia"><button>COOK</button></a>
        </div>
        <div class="exercisessAccesHome">
            <img src="imagenes/logoExercises.png">
            <p>SmartTrainer is an AI focus on you exercises and sport life, it will show you exercises based on the zone and muscle you want to work on. You only have to tell him what you want to do and how many times at week.</p>
            <a href="index.php?ruta=excercise"><button>TRAINING</button></a>
        </div>
        <div class="calculatorAccessHome">
            <img src="imagenes/logoCalculadora.png">
            <p>SmartMacro is an AI calculator that you apply in your meals during the week. This way you can track your MACROS ingest and be consistent during the time.</p>
            <a href="index.php?ruta=excercise"><button>CALCULATE</button></a>
        </div>
    </div>