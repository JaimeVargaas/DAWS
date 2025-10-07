<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación II: String" => "./index.php",
    "Ejercicio 3" => "ejercicio3.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 3");
cuerpo();  
finCuerpo();


//vista
function cuerpo()
{


?>
<!-- Ahora hacer html para que salga en la vista -->
<?php

}