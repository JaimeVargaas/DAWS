<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: " => "./index.php",
    "Ejercicio 1" => "ejercicio1.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 1");
cuerpo($arrayHER, $arrayNOW);
finCuerpo();


//vista
function cuerpo($arrayHER, $arrayNOW)
{


?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
