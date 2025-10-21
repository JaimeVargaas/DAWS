<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación IV: Clases, Objetos y Enumeraciones" => "./index.php",
    "Ejercicio 4" => "ejercicio4.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 4");
cuerpo();
finCuerpo();


//vista
function cuerpo()
{


?>

<h1>Prueba de clase flauta</h1>
<?php
    $array = ["edad"=>15,"material"=>"plastico"];
    $obj = Flauta::CrearDesdeArray($array);
    $obj3 = clone $obj;

    echo "<p>$obj</p>";
    echo "<p>$obj3</p>";
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
