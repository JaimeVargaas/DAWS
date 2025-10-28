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

    $var = 25.2;
    echo "<h3>Prueba de metodo validaReal de filter</h3>";
    \VALFILTER\validaReal($var,1,26,1);
    echo "<p>$var</p>";

    $var = "jaime@2daw.com";
    echo "<h3>Prueba de metodo validaEmail de filter</h3>";
    \VALFILTER\validaEmail($var,"aaa@gg.es");
    echo "<p>$var</p>";

    $var = "666778890";
    echo "<h3>Prueba de metodo validaExpresion de filter</h3>";
    \VALFILTER\validaExpresion($var,"/^[0-9]{9}$/","Número mal escrito");
    echo "<p>$var</p>";

    $var = "1/8/2006";
    echo "<h3>Prueba de metodo validaFecha de filter</h3>";
    \VALFILTER\validaFecha($var,"fecha no valida");
    echo "<p>$var</p>";

    $var = "21:32:18";
    echo "<h3>Prueba de metodo validaHora de filter</h3>";
    \VALFILTER\validaHora($var,"Hora no válida");
    echo "<p>$var</p>";

    $var = "hola";
    $opciones = ["hola"=>1,"adios"=>2];
    echo "<h3>Prueba de metodo validaRango de filter</h3>";
    \VALFILTER\validaRango($var,$opciones,1);
    echo "<p>$var</p>";

    $var = "holaholahola";
    echo "<h3>Prueba de metodo validaCadena de filter</h3>";
    \VALFILTER\validaCadena($var,25,"Cadena demasiado larga");
    echo "<p>$var</p>";
    ?>
<?php
}
