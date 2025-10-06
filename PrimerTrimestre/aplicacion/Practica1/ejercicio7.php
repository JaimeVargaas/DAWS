<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principa" => "../../index.php",
    "Relación I: arrays, fechas, librería math" => "./index.php",
    "Ejercicio 7" => "ejercicio7.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 7");


//dibuja la plantilla de la vista

cuerpo();
finCuerpo();

//vista
function cuerpo()
{
    echo "<h2>Funcionamiento de fechas</h2>";
    echo "Fecha Actual: " . date("d/m/Y") . "<br>";
    echo "Fecha Actual: " . "Día " . date("d") . ", Mes " . date("m") . ", Año " . date("Y") . ", Día de la semana " . date("l") . "<br>";
    echo "Hora Actual: " . date("H:i:s") . "<br><br>";

    $fecha = mktime(12, 45, 0, 3, 29, 2024);
    echo "Fecha: " . date("d/m/Y", $fecha) . "<br>";
    echo "Fecha: " . "Día " . date("d", $fecha) . ", Mes " . date("m", $fecha) . ", Año " . date("Y", $fecha) . ", Día de la semana " . date("l", $fecha) . "<br>";
    echo "Hora : " . date("H:i:s", $fecha) . "<br><br>";

    $fecha = strtotime("-12 days -4 hours");
    echo "Fecha: " . date("d/m/Y", $fecha) . "<br>";
    echo "Fecha: " . "Día " . date("d", $fecha) . ", Mes " . date("m", $fecha) . ", Año " . date("Y", $fecha) . ", Día de la semana " . date("l", $fecha) . "<br>";
    echo "Hora : " . date("H:i:s", $fecha) . "<br>";

    echo "<h2>Funcionamiento de fechas con datetime</h2>";
    $fecha = new DateTime();
    echo $fecha->format("d/m/Y") . "<br>";
    $fecha = new DateTime();
    echo $fecha->format("l d, F Y") . "<br>";
    $fecha = new DateTime();
    echo $fecha->format("H:i:s") . "<br><br>";

    $fecha = new DateTime("2024-03-29 12:25:00");
    echo $fecha->format("d/m/Y") . "<br>";
    $fecha = new DateTime("2024-03-29 12:25:00");
    echo $fecha->format("l d, F Y") . "<br>";
    $fecha = new DateTime("2024-03-29 12:25:00");
    echo $fecha->format("H:i:s") . "<br><br>";

    $fecha = new DateTime();
    $fecha->modify("-12 days -4 hours");
    echo $fecha->format("d/m/Y") . "<br>";
    echo $fecha->format("l d, F Y") . "<br>";
    echo $fecha->format("H:i:s");

?>
    <!-- Ahora hacer html para que salga en la vista -->

<?php

}
