<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once "../../scripts/clases/Punto.php";
include_once "./almacenaPuntos.php";
require_once "../../scripts/librerias/validacion.php";

//controlador
$ubicacion = [
    "Index Principal" => "/index.php",
    "Relación VII: Ficheros" => "/aplicacion/practica7/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

// -----------------------------------------
// EJERCICIO 1
// -----------------------------------------
$datos = [
    "x" => "",
    "y" => "",
    "color" => "",
    "grosor" => ""
];

$errores = [];

if (isset($_POST["guardar"])) {
    // x
    $x = "";
    if (isset($_POST["x"])) {
        $x = trim($_POST["x"]);
    }

    $xInt = (int)$x;

    if ($x === "") $errores["x"][] = "EL parámetro X no debe estar vacío";
    else if (!is_int(filter_var($x, FILTER_VALIDATE_INT))) $errores["x"][] = "EL parámetro X debe ser un número entero";
    else if (!\VALFILTER\validaEntero($xInt, 0, 500, 0)) $errores["x"][] = "EL parámetro X debe estar entre 0 y 500";
    $datos["x"] = (int)$x;

    // y
    $y = "";
    if (isset($_POST["y"])) {
        $y = (int)trim($_POST["y"]);
    }

    $yInt = (int)$y;
    if ($y === "") $errores["y"][] = "EL parámetro Y no debe estar vacío";
    else if (!is_int(filter_var($y, FILTER_VALIDATE_INT))) $errores["y"][] = "EL parámetro Y debe ser un número entero";
    else if (!\VALFILTER\validaEntero($yInt, 0, 500, 0)) $errores["y"][] = "EL parámetro Y debe estar entre 0 y 500";
    $datos["y"] = (int)$y;

    // color
    $color = "";
    if (isset($_POST["combo"])) {
        $color = trim($_POST["combo"]);
    }
    if ($color === "") $errores["color"][] = "El color no puede estar sin seleccionar";
    $datos["color"] = $color;

    // grosor
    $grosor = "";
    if (isset($_POST["grosor"])) {
        $grosor = (int)trim($_POST["grosor"]);
    }
    if ($grosor === "") $errores["grosor"][] = "El grosor no puede estar sin seleccionar";
    $datos["grosor"] = (int)$grosor;

}


//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
cabecera();
inicioCuerpo("Practica 7");
cuerpo($puntos,$datos, $errores);  //llamo a la vista
finCuerpo();
// **

//vista
function cabecera() {}

// -----------------------------------------
// EJERCICIO 1
// -----------------------------------------
function formulario($datos, $errores)
{
?>

    <form action="" method="post">
        <label for="x">Coordenadas X</label>
        <input type="text" name="x" value="<?=$datos["x"] ?>">
        <?php if (!empty($errores["x"])) { ?>
            <?php foreach ($errores["x"] as $mensaje){ ?>
                <p style="color: red;"><?= $mensaje ?></p>
            <?php } ?>
        <?php } ?>
        <br>

        <label for="y">Coordenadas Y</label>
        <input type="text" name="y" value="<?=$datos["y"] ?>"> 
        <?php if (!empty($errores["y"])) { ?>
            <?php foreach ($errores["y"] as $mensaje){ ?>
                <p style="color: red;"><?= $mensaje ?></p>
            <?php } ?>
        <?php } ?>
        <br>

        <label for="combo">Selecciona el color: </label>
        <select name="combo" id="combo">
            <?php
            foreach (Punto::COLORES as $clave => $valor) {
                echo "<option value=\"$clave\">";
                foreach ($valor as $clave2 => $valor2) {
                    if ($clave2 === "nombre") {
                        echo $valor2;
                    }
                }
                echo "</option>";
            }
            ?>
        </select>
        <?php if (!empty($errores["combo"])) { ?>
            <?php foreach ($errores["combo"] as $mensaje){ ?>
                <p style="color: red;"><?= $mensaje ?></p>
            <?php } ?>
        <?php } ?>
        <br>
        <label for="">Fino
            <input type="radio" name="grosor" value="1">
        </label>
        <label for="">medio
            <input type="radio" name="grosor" value="2">
        </label>
        <label for="">Grueso
            <input type="radio" name="grosor" value="3">
        </label><br>
        <?php if (!empty($errores["grosor"])) { ?>
            <?php foreach ($errores["grosor"] as $mensaje){ ?>
                <p style="color: red;"><?= $mensaje ?></p>
            <?php } ?>
        <?php } ?>

        <input type="submit" value="Guardar Punto" name="guardar">
    </form>
<?php
}
?>

<?php
//vista
function cuerpo($puntos,$datos, $errores)
{
    if (empty($errores) && isset($_POST["guardar"])) {
        echo "<h2>Punto creado correctamente </h2>";
            $punto = new Punto((int)$datos["x"],$datos["y"],$datos["color"],$datos["grosor"]);
            array_push($puntos,$punto);
            formulario($datos, $errores);
            print_r($puntos);
    } else {
        formulario($datos, $errores);
    }

?>
<?php
}
