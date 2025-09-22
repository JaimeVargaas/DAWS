<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");



// dibuja la plantilla de la vista
inicioCabecera("APLICACION PRUEBA");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACION");
cuerpo(); // llamo a la vista
finCuerpo();

$var = 12;
if(isset($Var))
    $Var++;

unset($var);


// **********************************************************

function cabecera() {}

//vista
function cuerpo()
{
?>
<?php  
    //br para salto de linea visual
    echo "<br>escrito desde php".PHP_EOL; // php_eol es para un salto de linea en el código
    echo "<br>otra linea".PHP_EOL;
    echo "<br>el host de llamada ".$_SERVER["HTTP_HOST"]."usando el navegador " . $_SERVER["HTTP_USER_AGENT"]."<br>".PHP_EOL;
}
