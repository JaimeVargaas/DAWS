<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once 'libreria.php';

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: Funciones" => "./index.php",
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

    <h2>Prueba de callable y callback:</h2>
    <?php 
    // siempre se pone fn para decirle que es una funcion, no le puedes poner el nombre que tu quieras
    // se declaran las funciones anonimas
        echo "<p>Función de suma: " . llamadaAFuncion(5,4,fn($a,$b)=>$a+$b). "</p>";
        echo "<p>Función de multiplicación: " .llamadaAFuncion(5,4,fn($a,$b)=>$a*$b) . "</p>";
        echo "<p>Función de resta: " .llamadaAFuncion(5,4,fn($a,$b)=>$a-$b). "</p>";
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
