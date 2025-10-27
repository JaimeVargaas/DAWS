<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$ubicacion = [
    "Index Principal" => "/index.php",
    "Relación IV: Clases, Objetos y Enumeraciones" => "/aplicacion/practica4/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
cabecera();
inicioCuerpo("Practica 4");
cuerpo();  //llamo a la vista
finCuerpo();
// **

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
?>
    <h2>Relacion 4: </h2>
    <ul>
        <a class="e1" href="./ejercicio1.php">Ejercicio 1</a><br>
        <a class="e1" href="./ejercicio2.php">Ejercicio 2</a><br>
        <a class="e1" href="./ejercicio3.php">Ejercicio 3</a><br>
        <a class="e1" href="./ejercicio4.php">Ejercicio 4</a><br>
        <a class="e1" href="./ejercicio5.php">Ejercicio 5</a><br>
        <a class="e1" href="./ejercicio6.php">Ejercicio 6</a><br>
        <a class="e1" href="./ejercicio7.php">Ejercicio 7</a><br>
   </ul>

<?php
}