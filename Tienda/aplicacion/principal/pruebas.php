<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

// Dibuja la plantilla de la vista
inicioCabecera("2DAW TIENDA");
cabecera();
finCabecera();

inicioCuerpo("PRUEBAS MUEBLES");
cuerpo();
finCuerpo();



// **********************************************************

function cabecera() {}
//vista
function cuerpo()
{
?>
<h2>Creación de clase MuebleReciclado</h2> 
<?php 
    $carac = new Caracteristicas();
    $mueblebase = new MuebleReciclado("Jaime","AOC","Alemania",2025,"06/11/2025","09/12/2025",0,35.34,$carac,25.4);
    $mueblebase->anadir("Color","marron","estilo","gotico");
    echo "<p>$mueblebase</p>"
?>

<h2>Creación de clase MuebleTradicional</h2>
<?php
    $carac2 = new Caracteristicas();
    $muebletradicional = new MuebleTradicional("Jaime","AOC","Alemania",2025,"06/11/2025","09/12/2025",0,35.34,25.3,$carac2,"A30210");
    $muebletradicional->anadir("Color","Blanco","estilo","moderno","ancho",200,"largo",150,"alto",222,"ningunamas","si");
    echo "<p>$muebletradicional</p>"
?>


<?php

}