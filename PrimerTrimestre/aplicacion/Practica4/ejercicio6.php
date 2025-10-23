<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación IV: Clases, Objetos y Enumeraciones" => "./index.php",
    "Ejercicio 6" => "ejercicio6.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 6");
cuerpo();
finCuerpo();


//vista
function cuerpo()
{


?>
    <h2>Prueba fibonacci usando clase</h2>
    <?php

    foreach (new SerieFibonacci(10) as $valor) {
        echo "$valor &nbsp;";
    }

    ?>

    <h2>Prueba fibonacci usando método</h2>

    <?php 
        foreach (SerieFibonacci::fFibonacci(10) as $valor) {
        echo "$valor &nbsp;";
    }
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
