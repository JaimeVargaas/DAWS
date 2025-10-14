<?php
include_once(dirname(__FILE__) . "/cabecera.php");

$ubicacion = [
    "Index Principal" => "/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

// Dibuja la plantilla de la vista
inicioCabecera("2DAW APLICACIÓN");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACIÓN");
cuerpo();
finCuerpo();



// **********************************************************

function cabecera() {}
//vista
function cuerpo()
{
?>  
    <h2>Pruebas y Ejercicios</h2>
    <ul>
        <li><a href="./aplicacion/pruebas/">Pruebas</a></li>
        <li><a href="./aplicacion/Practica1/">Práctica 1</a></li>
        <li><a href="./aplicacion/Practica2/">Práctica 2</a></li>
        <li><a href="./aplicacion/Practica3/">Práctica 3</a></li>
    </ul>
<?php

}
