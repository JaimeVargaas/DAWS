<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
cabecera();
finCabecera();
inicioCuerpo("Practica 1");
cuerpo();  //llamo a la vista
finCuerpo();
// **

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
$hex = dechex($num);

//Prueba de base_convert
$numBase4 = 321;
$numbase8 = base_convert($numBase4,4 ,8);

// Prueba de Max y Min de un array
$array = [2,4,6,1,6];
$minimo = min($array);
$maximo = max($array);

?>
<!-- Ahora hacer html para que salga en la vista -->
<?php

}