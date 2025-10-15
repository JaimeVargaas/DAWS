<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include 'libreria.php';

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: Funciones" => "./index.php",
    "Ejercicio 2" => "ejercicio2.php"
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
    <h2>Cadena generada de 8 caracteres:</h2>
    <?php 
    $cadena = generarCadena(8);
    echo "<p>$cadena</p>"
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
