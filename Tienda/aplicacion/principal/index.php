<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once "./almacenaDatos.php";


$ubicacion = [
    "Index Principal" => "/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

global $muebles;

$datos = ["mueble" => null];
$errores = [];

$mueble = 0;
$objMueble;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["mostrar"])) {
        $mueble = (int)trim($_POST["mueble"]);
        if (!array_key_exists($mueble, $muebles)) {
            $errores["mueble"][] = "Mueble no encontrado";
        } else {
            $datos["mueble"] = $mueble;
            $objMueble = $muebles[$datos["mueble"]];
        }
    } elseif (isset($_POST["modificar"])) {
        $mueble = (int)trim($_POST["mueble"]);
        if (!array_key_exists($mueble, $muebles)) {
            $errores["mueble"][] = "Mueble no encontrado";
        }
        else {
            $datos["mueble"] = $mueble;
            $objMueble = $muebles[$datos["mueble"]];
            header("Location: /aplicacion/principal/modifica.php?mueble=" . urlencode($mueble));
            exit;
        }
    }
}

function mostrarMueble($objMueble)
{
    $array = $objMueble->dameListaPropiedades();
    $var = null;

    echo "<h2>Mostrar Mueble seleccionado</h2>";
    echo "<p>$objMueble</p>";
}


// Dibuja la plantilla de la vista
inicioCabecera("2DAW TIENDA");
cabecera();
finCabecera();

inicioCuerpo("2DAW TIENDA");
cuerpo($muebles, $datos, $errores);
finCuerpo();


function formulario($datos, $errores)
{
    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }

?>
    <br>
    <form action="" method="post">
        <label for="mueble">Introduce el mueble que quieras</label>
        <input type="text" name="mueble" id="mueble">
        <br>
        <input type="submit" name="mostrar" value="Mostrar Mueble">
        <input type="submit" name="modificar" value="Modificar Mueble">
    </form>

<?php
}


// **********************************************************

function cabecera() {}
//vista
function cuerpo($muebles, $datos, $errores)
{
?>
    <table>
        <tr>
            <th>Índice</th>
            <th>Tipo de mueble</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Material</th>
            <th>Fabricante</th>
        </tr>
        <?php
        foreach ($muebles as $clave => $valor) {
            echo "<tr>";
            echo "<td>$clave</td>";
            echo "<td>" . get_class($valor) . "</td>";
            echo "<td>" . $valor->getNombre() . "</td>";
            echo "<td>" . $valor->getPrecio() . "</td>";
            echo "<td>" . $valor->getMaterialDescripcion() . "</td>";
            echo "<td>" . $valor->getFabricante() . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
        <?php
        if (empty($errores) && isset($_POST["mostrar"])) {
            mostrarMueble($muebles[$datos["mueble"]]);
        } else {
            formulario($datos, $errores);
        }
        ?>

    <?php

}
