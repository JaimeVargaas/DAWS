<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 5");

// controlador
$vector = [];
$vector [1] = "Esto es una cadena";
$vector["posi1"] = 25.67;
$vector[] = false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;



//dibuja la plantilla de la vista

cuerpo($vector);
finCuerpo();

//vista
function cuerpo($vector)
{
    echo "<h2>Posición y tipo de cada elemento del array:</h2>"; 
    foreach ($vector as $i => $valor) {
        echo "<br>Posición $i y tipo " ;
        switch(gettype($valor)) {
            case "integer":
                echo " Integer: Valor: $valor, en binario: " . decbin($valor) ."<br>";
                break;
            case "string":
                echo "String: Cadena $valor";
                break;
            case "boolean":
                echo "Boolean: ".($valor ? "true" : "false") . " y su opuesto " . (!$valor ? "true" : "false");
                break;
            case "array":
                echo "array: ";
                foreach ($valor as $clave => $v) {
                    echo $v . "-";
                }
                break;
            case "double":
                echo "double: $valor, que al cuadrado es " . pow($valor,2);
                break;
        }
        
    }

    
?>

<?php

}