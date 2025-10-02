<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

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
return $array;










//dibuja la plantilla de la vista

cuerpo($array);
finCuerpo();

//vista
function cuerpo($array)
{

    foreach ($array as $i =>$filas) {
        foreach($filas as $j) {
            echo "{$j}";
        }
    }
?>
    <!-- Ahora hacer html para que salga en la vista -->

<?php

}
