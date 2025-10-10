<?php

use BcMath\Number;

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación II: String" => "./index.php",
    "Ejercicio 4" => "ejercicio4.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

$var1 = number_format(17.5, 2, ",", ".");
$var2 = number_format(379987.24,2,",",".");



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 4");
cuerpo($var1, $var2);  
finCuerpo();


//vista
function cuerpo($var1, $var2)
{


?>

<h2>Primer Valor</h2>
<pre>
    <?php echo str_pad($var1,15,'0',STR_PAD_LEFT)?>
</pre>

<h2>Segundo Valor</h2>
<pre>
    <?php echo str_pad($var2,15,' ',STR_PAD_RIGHT)?>
</pre>

<?php

}