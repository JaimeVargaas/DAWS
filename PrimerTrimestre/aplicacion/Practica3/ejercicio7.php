<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once 'libreria.php';

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: Funciones" => "./index.php",
    "Ejercicio 7" => "ejercicio7.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 7");
cuerpo();
finCuerpo();


//vista
function cuerpo()
{


?>
    <h2>Prueba de función ordenar:</h2>
    <?php 
        $array = ["hola", "adiooooooss","jaiime","vicente"];
        foreach(ordenar($array) as $valor) {
            echo "<p>".$valor ."</p>";
        }
    ?>

    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
