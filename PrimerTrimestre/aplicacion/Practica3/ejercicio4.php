<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include 'libreria.php';

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: Funciones" => "./index.php",
    "Ejercicio 4" => "ejercicio4.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 1");
cuerpo();
finCuerpo();


//vista
function cuerpo()
{


?>
    <h2>Ejemplo función devuelve:</h2>
    <?php
    $valor=7;
    echo "<p>Valor antes de la función: $valor</p>";
    $resultado = devuelve($valor,4);
    echo "<h3>Poniendo dos valores</h3>";
    echo "<p>El valor después de la función es: $valor y su resultado es: $resultado <br></p>";

    $resultado = devuelve($valor,4,7);
    echo "<h3>Poniendo tres valores</h3>";
    echo "<p>El valor después de la función es: $valor y su resultado es: $resultado <br></p>";

    $resultado = devuelve($valor, c: 9);
    echo "<h3>Poniendo el valor 1 y 3</h3>";
    echo "<p>El valor después de la función es: $valor y su resultado es: $resultado <br></p>";
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
