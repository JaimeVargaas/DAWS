<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 3");

// Crear y rellenar array usando varias sentencias
$array = [];

$array[1] = 2;
$array[16] = "Pepe";
$array[54] = "hola";
$array[count($array)] = 34;
$array["uno"] = "cadena";
$array["dos"] = true;
$array["tres"] = 1345;

$array2 = [1,34,"nueva"];
$array["ultima"] = $array2;

echo "Crear y rellenar array usando varias sentencias<br>";
echo "<br>Array 1: ";
foreach($array as $array) {
    if(is_array($array)) {
        echo"<br>Array dentro de la última posición de array1: ";
        foreach($array2 as $array2) {
            echo $array2 . " - ";
        }
    }
    else
        echo $array . " - ";
}


echo "<br><br>Crear y rellenar array usando una sentencia<br>";
$array3 = [
    1 => 1,
    16 => 16,
    54 => 54,
    55 => 34,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => $array2
];

echo "Array 2: ";
foreach($array3 as $array) {
    if(is_array($array)) {
        foreach($array2 as $array2) {
            echo $array2 . " - ";
        }
    }
    else
        echo $array . " - ";
}






//dibuja la plantilla de la vista

cuerpo();  
finCuerpo();

//vista
function cuerpo()
{



?>
<!-- Ahora hacer html para que salga en la vista -->

<?php

}