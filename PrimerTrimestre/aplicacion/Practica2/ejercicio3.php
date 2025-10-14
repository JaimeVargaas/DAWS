<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación II: String" => "./index.php",
    "Ejercicio 3" => "ejercicio3.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

// hace un rango de 0 a 9 de a a z y de A a Z y el merge lo junta para meterlos en el array
$array = array_merge(range('0', '9'), range('A', 'Z'), range('a', 'z'));

//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 3");
cuerpo($array);  
finCuerpo();


//vista
function cuerpo($array)
{

?>
<h2>Cadena aleatoria generada</h2>
<?php 
$resultado='';
for($i=0;$i<20;$i++) {
    $num = mt_rand(1,count($array)-1);
    $resultado.=$array[$num];
}
    echo "<p>$resultado</p>";

    $resultado2='';
for($i=0;$i<20;$i++) {
    $resultado2.=chr(mt_rand(48,112));
}
    echo "<p>$resultado2</p>";
?>
<?php

}