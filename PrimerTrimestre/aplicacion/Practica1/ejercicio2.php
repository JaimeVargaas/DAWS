<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

// lanzar el dado 6 veces
$numDado = 0;
$resultados=[];
for($i=0;$i<=6;$i++) {
    $numDado = mt_rand(1,6);
    $resultados[$i]=$numDado;
}

// lanzar un dado un numero n de veces y contar caras
$contCaras = array_fill(0,6,0);

// calcula el numero de veces que se va a tirar el dado
$numVeces = mt_rand(1,1000);

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

//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 2");
cuerpo($resultados, $contCaras);  
finCuerpo();

//vista
function cuerpo($resultados,$contCaras)
{



?>
<!-- Ahora hacer html para que salga en la vista -->
<h1>Lanzamiento de un dado</h1>
<h2>Dado lanzado 6 veces</h2>
<ul>
    <li>Lanzamiento 1: <?= $resultados[0]?></li>
    <li>Lanzamiento 2: <?= $resultados[1]?></li>
    <li>Lanzamiento 3: <?= $resultados[2]?></li>
    <li>Lanzamiento 4: <?= $resultados[3]?></li>
    <li>Lanzamiento 5: <?= $resultados[4]?></li>
    <li>Lanzamiento 6: <?= $resultados[5]?></li>
</ul>
<?php

}