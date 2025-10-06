<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principa" => "../../index.php",
    "Relación I: arrays, fechas, librería math" => "./index.php",
    "Ejercicio 1" => "ejercicio1.php"
];

//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 1");
cuerpo();  
finCuerpo();

//vista
function cuerpo()
{

// Prueba Round
$num = 3.5;
$conRedondeo = round($num);

// Prueba Floor 
$conFloor = Floor($num);

//  Prueba pow 
$pruebaPow = pow($conFloor, $conRedondeo);

// Prueba de sqrt
$pruebaSqrt = sqrt($conRedondeo);

// Prueba de dechex
// $hex = dechex($num);

//Prueba de base_convert
$numBase4 = 321;
$numbase8 = base_convert($numBase4,4 ,8);

// Prueba de Max y Min de un array
$array = [2,4,6,1,6];
$minimo = min($array);
$maximo = max($array);

// Prueba de binarios, octal, y hexadecimal
$binario = 0b10101;
$octal = 012;


?>
<!-- Ahora hacer html para que salga en la vista -->
<h2>Funciones Matemáticas</h2>
<h3>Variables en binario, octal y hexadecimal</h3>
<ul>
    <li>Binario - <?= decbin($binario)?> - Decimal - <?=$binario?></li>
    <li>Octal -  <?= decoct($octal)?> - Decimal - <?= $octal ?></li>
</ul>

<h3>Resultados de las funciones</h3>
<ul>
    <li>Número sin redondear: <?= $num?> - Número redondeado: <?=$conRedondeo?></li>
    <li>Número sin redondeo hacia abajo: <?=$num?> - Número redondeado: <?=$conFloor?></li>
    <li>Resultado de <?=$conFloor?> elevado a <?=$conRedondeo?> = <?=$pruebaPow?></li>
    <li>Raíz cuadrada de <?=$conRedondeo?> = <?=$pruebaSqrt?></li>
    <li>Número en base 4: <?=$numBase4?> - Número en base 8: <?=$numbase8?></li>
    <li>Valores del array: 2,4,6,1,6
        <ul>
            <li>Valor Mínimo del array: <?=$minimo?></li>
            <li>Valor Máximo del array: <?=$maximo?></li>
        </ul>
    </li>
</ul>
<?php

}