<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación II: String" => "./index.php",
    "Ejercicio 2" => "ejercicio2.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

// Controlador


$texto = "Está la niña en casa";





//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 1");
cuerpo($texto);
finCuerpo();


//vista 
function cuerpo($texto)
{


?>
    <h2>Prueba Mb_str_split</h2>
    <?php foreach (mb_str_split($texto) as $i => $valor) { ?>
    <p>
        <?=str_repeat("&nbsp", $i) . $valor . "<br>";?>
    </p>
    <?php } ?>

    <!-- substr coge el texto que quieras e imprime los caracteres que tu le digas -->
    <h2>Prueba substr</h2>
    <?php for ($i = 0; $i<=strlen($texto);$i++) { ?>
    <p>
        <?=str_repeat("&nbsp", $i) . substr($texto, $i,1) . "<br>";?>
    </p>
    <?php } ?>

    <h2>Prueba mb_substr</h2>
    <?php for ($i = 0;$i<= strlen($texto);$i++) { ?>
    <p>
        <?=str_repeat("&nbsp", $i) . mb_substr($texto, $i,1) . "<br>";?>
    </p>
    <?php } ?>

    <h2>Prueba cadena en orden inverso</h2>
    <?php for ($i = strlen($texto);$i>= 0;$i--) { ?>
    <p>
        <?=str_repeat("&nbsp", $i) . mb_substr($texto, $i,1) . "<br>";?>
    </p>
    <?php } ?>
<?php

}
