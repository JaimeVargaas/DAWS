<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación IV: Clases, Objetos y Enumeraciones" => "./index.php",
    "Ejercicio 5" => "ejercicio5.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 5");
cuerpo();
finCuerpo();


//vista
function cuerpo()
{


?>

<h2>Prueba de clase Persona</h2>
<?php
    $estados = EstadoCivil::cases();
    $estadoAleatorio = $estados[array_rand($estados)];

    $obj = Persona::registrarPersona("Jaime","01/08/2006","carrera 12","Antequera",$estadoAleatorio);
    echo "<p>$obj</p>";
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
