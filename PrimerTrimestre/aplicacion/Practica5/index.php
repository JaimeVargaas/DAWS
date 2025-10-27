<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once "../../scripts/librerias/validacion.php";

//controlador
$ubicacion = [
    "Index Principal" => "/index.php",
    "Relación V: Introducción de información" => "/aplicacion/practica5/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
cabecera();
inicioCuerpo("Practica 5");
cuerpo();  //llamo a la vista
finCuerpo();
// **

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <h2>Relacion 5: </h2>
    <?php
    echo "<h3>Prueba de metodo validaEntero de filter</h3>";
    $var = 25;
    if (\VALFILTER\validaEntero($var, 1, 24, 1)) {
        echo "<p>Número válido: $var</p>";
    } else {
        echo "<p>Número fuera de rango, corregido a: $var</p>";
    }

    echo "<h3>Prueba de metodo validaReal de filter</h3>"
    ?>
<?php
}
