<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");



// dibuja la plantilla de la vista
inicioCabecera("APLICACION PRUEBA");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACION");
cuerpo(); // llamo a la vista
finCuerpo();



// **********************************************************

function cabecera() {}

//vista
function cuerpo()
{
?>
    Estás en sintaxis básica
<?php

}
