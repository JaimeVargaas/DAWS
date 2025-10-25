<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación IV: Clases, Objetos y Enumeraciones" => "./index.php",
    "Ejercicio 7" => "ejercicio7.php"
];
$GLOBALS['ubicacion'] = $ubicacion;



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 7");
cuerpo();
finCuerpo();


//vista
function cuerpo()
{
?>
<h2>Prueba de ClaseMisPropiedades</h1>
<?php
    $Objeto= new ClaseMisPropiedades();
    $Objeto->propPublica="publica";

    // $Objeto->_propPrivada="privada"; //no es valida al ser privada
    $Objeto->propiedad1=25;
    $Objeto->propiedad2="cadena de texto";
    echo "la propiedad 1 vale ".$Objeto->propiedad1."<br>";

    // echo $Objeto->propiedad3; // esto debería dar un error al no haber asignado previamente la propiedad

    foreach($Objeto as $clave=>$valor) {
        echo $clave . ": $valor<br>";
    }
    ?>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
