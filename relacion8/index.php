<?php
include_once(dirname(__FILE__) . "/cabecera.php");

$ubicacion = [
    "Index Principal" => "/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

// Dibuja la plantilla de la vista
inicioCabecera("Relación 8");
cabecera();
finCabecera();

inicioCuerpo("2 DAW - Relación 8");
cuerpo();
finCuerpo();



// **********************************************************

function cabecera() {}
//vista
function cuerpo()
{
?>  
    <h2>Pruebas y Ejercicios</h2>

<?php

}
