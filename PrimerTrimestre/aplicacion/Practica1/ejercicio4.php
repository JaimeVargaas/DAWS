<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación I: arrays, fechas, librería math" => "./index.php",
    "Ejercicio 4" => "ejercicio4.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 4");


$array = [];
for ($i = 1; $i <= 5; $i++) {
    $filas = [];
    for ($j = 1; $j <= $i; $j++) {
        $filas[] = $i;
    }
    $array[] = $filas;
}


//dibuja la plantilla de la vista

cuerpo($array);
finCuerpo();

//vista
function cuerpo($array)
{
   echo "<pre>"; 
    foreach ($array as $filas) {
        foreach ($filas as $j) {
            echo "{$j} ";
        }
        echo "\n";
    }
    echo "</pre>";
?>
    <!-- Ahora hacer html para que salga en la vista -->

<?php

}
