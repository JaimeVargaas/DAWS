<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación II: String" => "./index.php",
    "Ejercicio 1" => "ejercicio1.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

// Controlador

// crear variables
$c1 = "\"\'";
$c2 = "á";
$c3 = "é";
$c4 = "ñ";


// Crear frases con heredoc, y luego crear array para luego mostrarlo en el cuerpo
$textoHER1 = <<<fin
    $c1
fin;

$textoHER2 = <<< fin
    $c2
fin;

$textoHER3 = <<< fin
    $c3
fin;

$textoHER4 = <<< fin
    $c4
fin;

$arrayHER = [
    "comillas" => $textoHER1,
    "a" => $textoHER2,
    "e" => $textoHER3,
    "ñ" => $textoHER4
];

// Crear frases con nowdoc, y luego crear otro array para luego mostrarlo en el cuerpo
$textoNOW1 = <<<'fin'
    $c1
fin;

$textoNOW2 = <<< 'fin'
    $c2
fin;

$textoNOW3 = <<< 'fin'
    $c3
fin;

$textoNOW4 = <<< 'fin'
    $c4
fin;

$arrayNOW = [
    "comillas" => $textoNOW1,
    "a" => $textoNOW2,
    "e" => $textoNOW3,
    "ñ" => $textoNOW4
];


//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 1");
cuerpo($arrayHER, $arrayNOW);
finCuerpo();


//vista
function cuerpo($arrayHER, $arrayNOW)
{


?>
    <p>Texto con HEREDOC: </p>
    <p>Comillas y coma: <?= $arrayHER["comillas"] ?> </p>
    <p>á: <?= $arrayHER["a"] ?></p>
    <p>é: <?= $arrayHER["e"] ?></p>
    <p>ñ: <?= $arrayHER["ñ"] ?></p> <br>

    <p>Texto cono NOWDOC:</p>
    <p>Comillas y coma: <?= $arrayNOW["comillas"] ?> </p>
    <p>á: <?= $arrayNOW["a"] ?></p>
    <p>é: <?= $arrayNOW["e"] ?></p>
    <p>ñ: <?= $arrayNOW["ñ"] ?></p> <br>

    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
