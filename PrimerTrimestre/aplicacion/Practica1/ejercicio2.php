<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 2");

echo "Lanzamiento del dado 6 veces<br>";

// lanzar el dado 6 veces
$numDado = 0;
$resultados=[];
for($i=1;$i<=6;$i++) {
    $numDado = mt_rand(1,6);
    echo "·Lanzamiento " . $i .  " del dado: " . $numDado ."<br>";
    $resultados[$i]=$numDado;
}


// lanzar un dado un numero n de veces y contar caras
$contCaras = array_fill(0,6,0);


// calcula el numero de veces que se va a tirar el dado
$numVeces = mt_rand(1,1000);

echo "<br><br>El dado se ha lanzado $numVeces veces";

// conteo de cada cara
for($i=0;$i<=$numVeces;$i++) {
    $numDado = mt_rand(1,6);
    switch($numDado) {
        case 1:
            $contCaras[0]+=1;
            break;
        case 2:
            $contCaras[1]+=1;
            break;
        case 3:
            $contCaras[2]+=1;
            break;
        case 4: 
            $contCaras[3]+=1;
            break;
        case 5:
            $contCaras[4]+=1;
            break;
        case 6:
            $contCaras[5]+=1;
            break;
    }
}

echo "<br>El número 1 ha salido: $contCaras[0] veces";
echo "<br>El número 2 ha salido: $contCaras[1] veces";
echo "<br>El número 3 ha salido: $contCaras[2] veces";
echo "<br>El número 4 ha salido: $contCaras[3] veces";
echo "<br>El número 5 ha salido: $contCaras[4] veces";
echo "<br>El número 6 ha salido: $contCaras[5] veces";
//dibuja la plantilla de la vista

cuerpo();  
finCuerpo();

//vista
function cuerpo()
{



?>
<!-- Ahora hacer html para que salga en la vista -->

<?php

}