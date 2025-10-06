<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principa" => "../../index.php",
    "Relación I: arrays, fechas, librería math" => "./index.php",
    "Ejercicio 6" => "ejercicio6.php"
];
$GLOBALS['ubicacion'] = $ubicacion;


inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 6");


// Controlador
$vector = [];
$vector["primera"] = 12.56;
$vector[24] = true;
$vector[67] = 23.76;

//dibuja la plantilla de la vista

cuerpo($vector);
finCuerpo();

//vista
function cuerpo($vector)
{
    echo "<h2>Usando for each, con indice y valor:</h2>";
    foreach ($vector as $pos => $valor) {
        if(gettype($valor)=="boolean")
            echo ($valor ? "true":"false") . " - ";
        else
            echo $valor . " - ";
    }

    echo "<h2>Usando for each, con array_keys y array_values:</h2>";
    $claves = array_keys($vector);
    $valores = array_values($vector); 

    echo "Claves: ";
    print_r($claves);

    echo "<br>Valores: ";
    print_r($valores);


?>
    <!-- Ahora hacer html para que salga en la vista -->

<?php

}