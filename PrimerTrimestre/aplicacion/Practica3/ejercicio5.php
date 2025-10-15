<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
include 'libreria.php';

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación III: Funciones" => "./index.php",
    "Ejercicio 5" => "ejercicio5.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 1");
cuerpo();
finCuerpo();


//vista
function cuerpo()
{


?>
    <h2>Ejemplo función hacerOperacion:</h2>
    <?php 
        $suma = hacerOperacion("suma",3,1);
        $resta = hacerOperacion("resta",3,1);
        $multiplica = hacerOperacion("multiplica",3,1);

        echo "<h3>Operaciones de los valores 3 y 1</h3>
        <p>Suma: $suma <br> Resta: $resta <br> Multiplica: $multiplica</p>";
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
