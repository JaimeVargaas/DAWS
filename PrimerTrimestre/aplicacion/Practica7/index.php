<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once "../../scripts/librerias/validacion.php";

//controlador
$ubicacion = [
    "Index Principal" => "/index.php",
    "Relación VII: Ficheros" => "/aplicacion/practica7/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

global $almacenaPuntos;

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
cuerpo($almacenaPuntos, $datos, $errores);  //llamo a la vista
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
    <h2>Ejercicio 1</h2>
    <form action="" method="post">
        <label for="x">Coordenadas X</label>
        <input type="text" name="x" value="<?= $datos["x"] ?>">
        <?php if (!empty($errores["x"])) { ?>
            <?php foreach ($errores["x"] as $mensaje) { ?>
                <p style="color: red;"><?= $mensaje ?></p>
            <?php } ?>
        <?php } ?>
        <br>

        <label for="y">Coordenadas Y</label>
        <input type="text" name="y" value="<?= $datos["y"] ?>">
        <?php if (!empty($errores["y"])) { ?>
            <?php foreach ($errores["y"] as $mensaje) { ?>
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
            <?php foreach ($errores["combo"] as $mensaje) { ?>
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
            <?php foreach ($errores["grosor"] as $mensaje) { ?>
                <p style="color: red;"><?= $mensaje ?></p>
            <?php } ?>
        <?php } ?>

        <input type="submit" value="Guardar Punto" name="guardar">
    </form>
<?php
}

// -----------------------------------------
// EJERCICIO 2
// -----------------------------------------
/**
* funcion para escribir en un fichero
* @param string $nombre nombre del fichero
* @param mixed $datos valores
* @return bool devuelve si ejecuta correctamente o hay algún error
*/
function escribirAfichero(string $nombre, array $datos):bool{
    // ruta absoluta correcta en el proyecto (directorio imagenes/puntos)
    $ruta = __DIR__ . "/../../imagenes/puntos/";

    // si no existe la ruta se crea (recursivo por si falta cualquier carpeta)
    if (!is_dir($ruta)) {
        if (!mkdir($ruta, 0777, true)) {
            return false; // no se pudo crear la carpeta
        }
    }

    // nombre completo del fichero
    $ficheroPath = $ruta . $nombre;

    // abrir el fichero para escritura (añadir al final)
    $fic = fopen($ficheroPath, "a");
    if(!$fic)
        return false;
    //se recorre el array con los datos
    foreach($datos as $fila)
    {
        $linea="";
        foreach($fila as $columna){
            $linea.=$columna.",";
    }
    $linea.="\r\n";
    //se escribe en el fichero una linea
        fputs($fic,$linea);
    }
    //se cierra el fichero
    fclose($fic);
    

    return true;
}

function nombreArch() {
    $ip = str_replace(".","_",$_SERVER['REMOTE_ADDR']);
    $agente = $_SERVER['HTTP_USER_AGENT'];
    $navegador = "";

    if (strpos($agente, 'Chrome') !== false && mb_strpos($agente, 'Edge') === false) {
        $navegador = "chrome";
    } elseif (mb_strpos($agente, 'Firefox') !== false) {
        $navegador = "firefox";
    } elseif (mb_strpos($agente, 'Safari') !== false && mb_strpos($agente, 'Chrome') === false) {
        $navegador = "safari";
    } elseif (mb_strpos($agente, 'Edge') !== false || mb_strpos($agente, 'Edg') !== false) {
        $navegador = "edge";
    } elseif (mb_strpos($agente, 'Opera') !== false || mb_strpos($agente, 'OPR') !== false) {
        $navegador = "opera";
    }

       $nombreArch = "imagen_$ip"."_$navegador.jpg";

    return $nombreArch;
}

function textArea($almacenaPuntos)
{
?>
    <h2>Ejercicio 2</h2>
    <textarea style="margin-left: 10px;width:60%;height:200px">
        <?php
        $grosor = "";
        foreach ($almacenaPuntos as $valor) {
            if ($valor->getGrosor() == 1) $grosor = "Fino";
            else if ($valor->getGrosor() == 2) $grosor = "Medio";
            else $grosor = "Grueso";
            echo "Punto: con valor X " . $valor->getX() . " con valor Y " . $valor->getY() .
                "de color " . $valor->getColor() . " con grosor " . $grosor . "\n";
        }
        ?>
    </textarea>
<?php
}

function crearImagen($almacenaPuntos){
    // crear la imagen con un ancho y alto de 200
    $ancho=200;
    $alto=200;
    $imagen = imagecreatetruecolor($ancho,$alto);

    // asignar colores, para reservar un color en la imagen
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro = imagecolorallocate($imagen, 0, 0, 0);

    // rellenar el fondo de blanco y dibjar un marco
    imagefilledrectangle($imagen, 0, 0, $ancho, $alto, $blanco);
    imagerectangle($imagen, 0, 0, $ancho - 1, $alto - 1, $negro);

    foreach($almacenaPuntos as $punto) {
        $color = imagecolorallocate($imagen, Punto::COLORES["rgb"][0],Punto::COLORES["rgb"][1],Punto::COLORES["rgb"][2]);
        $x = $punto->getX();
        $y = $punto->getY();
        $grosor = $punto->getGrosor() * 3; // escala visual

        imagefilledellipse($imagen, $x, $y, $grosor, $grosor, $color);
    }

    imagejpeg($imagen, __DIR__ . "/../../imagenes/puntos/" . nombreArch());
}
?>

<?php
//vista
function cuerpo($almacenaPuntos, $datos, $errores)
{
    $archivo = nombreArch();
    escribirAfichero($archivo,$almacenaPuntos);

    if (empty($errores) && isset($_POST["guardar"])) {
        echo "<h2>Punto creado correctamente </h2>";
        $punto = new Punto((int)$datos["x"], $datos["y"], $datos["color"], $datos["grosor"]);
        array_push($almacenaPuntos, $punto);
        formulario($datos, $errores);
    } else {
        formulario($datos, $errores);
    }
    textArea($almacenaPuntos);
?>
    <img src="../../imagenes/puntos/<?= $archivo ?>" alt="">

<?php
}
