<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include 'libreria.php';

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: Funciones" => "./index.php",
    "Ejercicio 6" => "ejercicio6.php"
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
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
