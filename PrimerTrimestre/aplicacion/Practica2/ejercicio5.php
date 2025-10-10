<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "../../index.php",
    "Relación II: String" => "./index.php",
    "Ejercicio 5" => "ejercicio5.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

$cadena = <<<fin
    <h3>Hola estoy usando heredoc</h3>
    <p>Voy a intentar sacar un 10 en esta practica, mi correo es jvarbae782@g.educaand.es</p>
    <pre>123 123 213 321 532u849</pre>
fin;

$devuelto = [];



//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
inicioCuerpo("Ejercicio 5");
cuerpo($cadena, $devuelto);
finCuerpo();


//vista
function cuerpo($cadena, $devuelto)
{


?>

    <h2>Definiendo expresiones regulares</h2>
    <p>Texto: <?= $cadena ?></p><br>

    <p><strong>Mail Encontrados: </strong><br>
        <?php
        $patronCorreo = "/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,}/";

        // recorre la cadena y busca el patron, si lo encuentra lo mete en un array en la posicion 0 la cadena y 1 la pos
        $ret = preg_match_all($patronCorreo, $cadena, $devuelto, PREG_OFFSET_CAPTURE);

        foreach ($devuelto[0] as $mail) {
            echo $mail[0] . ", en la posición " . $mail[1] . "<br>";
        }

        $devuelto = [];
        ?>
    </p>

    <p><strong>Etiquetas encontradas: </strong><br>
        <?php
        $patronEtiquetas = "/<\/?[a-zA-Z0-9]+[^>]*>/";

        $ret = preg_match_all($patronEtiquetas, $cadena, $devuelto, PREG_OFFSET_CAPTURE);

        foreach ($devuelto[0] as $et) {
            echo htmlspecialchars( $et[0] . ", en la posición " . $et[1]) . "<br>";
        }

        $devuelto = [];
        ?>
    </p>

    <p><strong>Números encontrados: </strong><br>
        <?php
        $patronNumeros = "/[0-9]{1,}/";

        $ret = preg_match_all($patronNumeros, $cadena, $devuelto, PREG_OFFSET_CAPTURE);

        foreach ($devuelto[0] as $num) {
            echo htmlspecialchars( $num[0] . ", en la posición " . $num[1]) . "<br>";
        }

        $devuelto = [];
        ?>
    </p>
    <!-- Ahora hacer html para que salga en la vista -->
<?php

}
