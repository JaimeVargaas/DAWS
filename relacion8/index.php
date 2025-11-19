<?php
include_once(dirname(__FILE__) . "/cabecera.php");

$ubicacion = [
    "Index Principal" => "/index.php"
];


$contador = isset($_COOKIE["contador"]) ? $_COOKIE["contador"] : 0;
$contador++;
setcookie("contador",(string)$contador);

// Dibuja la plantilla de la vista
inicioCabecera("Relación 8");
cabecera();
finCabecera();

inicioCuerpo("2 DAW - Relación 8");
cuerpo($contador);
finCuerpo();



// **********************************************************



function cabecera() {}
//vista
function cuerpo($contador)
{
?>  
    <h2>Has accedido a esta página <?= $contador ?> veces</h2>

<?php

}
