<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación IV: Clases, Objetos y Enumeraciones" => "./index.php",
    "Ejercicio 1" => "ejercicio1.php"
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
    <h2>Prueba de la clase InstrumentoBase</h2>
    <?php
        // $obj = new InstrumentoBase();
        // $obj2 = new InstrumentoBase("Guitarra flamenca",5);
        // echo "<p>$obj</p>";
        // echo "<p>$obj2</p>";

        // echo "<h3>Prueba métodos sonido, envejecer y afinar</h3>";
        // $obj2->envejecer();
        // echo "<p>$obj2</p>";
        // echo "<p>".$obj2->sonido()."</p>";
        // echo "<p>".$obj2->afinar()."</p>";
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
