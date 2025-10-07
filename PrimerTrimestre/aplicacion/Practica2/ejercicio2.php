<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación II: String" => "./index.php",
    "Ejercicio 2" => "ejercicio2.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

// Controlador
$texto = "Está la niña en casa";
$array = str_split($texto);

foreach ($array as $valor) {
    echo $valor . "<br>";
}


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