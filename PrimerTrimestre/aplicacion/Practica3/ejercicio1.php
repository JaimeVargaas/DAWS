<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include 'libreria.php';

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: Funciones" => "./index.php",
    "Ejercicio 1" => "ejercicio1.php"
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
<?php
    $array = [];
    $num2 = 0;

    // Veces que hemos llamado al método
    cuantasVeces($array, "clave1", 7, $num2);
    cuantasVeces($array, "daw", 12, $num2);
    cuantasVeces($array, "123adw", 73, $num2);
    cuantasVeces($array, "dwa", 4, $num2);
    cuantasVeces($array, "121", 123, $num2);

    // Muestras los resultados
    echo "<pre>";
    print_r($array);
    echo "Número de llamadas: $num2";
    echo "</pre>";
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
