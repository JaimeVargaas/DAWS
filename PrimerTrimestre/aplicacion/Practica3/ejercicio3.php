<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once 'libreria.php';

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: Funciones" => "./index.php",
    "Ejercicio 2" => "ejercicio2.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 3");
cuerpo();
finCuerpo();


//vista
function cuerpo()
{


?>
    <h2>Probar función Operaciones:</h2>
    <?php 
        $resultado = Operaciones(1,2,5,7,3,4);
        echo "<p>$resultado</p>";

        $resultado = Operaciones(5,2,5,7,3,4);
        echo "<p>$resultado</p>";
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
