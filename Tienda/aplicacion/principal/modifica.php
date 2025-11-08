<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once "./almacenaDatos.php";

$ubicacion = [
    "Index Principal" => "/index.php",
    "Relación VI: Resumen" => "/aplicacion/principal/modifica.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

$datos = [
    "nombre" => "",
    "fabricante" => "",
    "pais"=> "",
    "anio"=> "",
    "fechaIni"=> "",
    "fechaFin"=> "",
    "precio"=> "",
    "material"=> ""
];

$errores = [];
$objMueble;

global $muebles;
if (isset($_GET["mueble"])) {
    $mueble = (int)$_GET["mueble"];
    if (array_key_exists($mueble, $muebles)) {
        $objMueble = $muebles[$mueble];
    }
}

// Dibuja la plantilla de la vista
inicioCabecera("2DAW TIENDA");
cabecera();
finCabecera();

inicioCuerpo("2DAW MODIFICA");
cuerpo($objMueble,$datos, $errores);
finCuerpo();



function formulario($objMueble,$datos, $errores)
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
<?php if(get_class($objMueble)==="MuebleReciclado") {?>
    <br>
    <form action="" method="post">
        <label for="nombre1">Nombre: </label>
        <input type="text" name="nombre1" id="nombre1">
        <br>
        <label for="fabricante1">Fabricante: </label>
        <input type="text" name="fabricante1" id="fabricante1">
        <br>
        <label for="pais1">Pais: </label>
        <input type="text" name="pais1" id="pais1">
        <br>
        <label for="anio1">Año: </label>
        <input type="text" name="anio1" id="anio1">
        <br>
        <label for="fechaIni1">Fecha Inicio Venta: </label>
        <input type="text" name="fechaIni1" id="fechaIni1">
        <br>
        <label for="fechaFin1">Fecha fin Venta: </label>
        <input type="text" name="fechaFin1" id="fechaFin1">
        <br>
        <label for="precio1">Precio: </label>
        <input type="text" name="precio1" id="precio1">
        <br>
        <label for="material1">Material: </label>
        <input type="text" name="material1" id="material1">
        <br>
        <label for="porRec">Porcentaje Reciclado: </label>
        <input type="text" name="porRec" id="porRec">
        <br>
        <input type="submit" name="modificar" value="Modificar Mueble">

    <?php } else {?>
        <label for="nombre2">Nombre: </label>
        <input type="text" name="nombre2" id="nombre2">
        <br>
        <label for="fabricante2">Fabricante: </label>
        <input type="text" name="fabricante2" id="fabricante2">
        <br>
        <label for="pais2">Pais: </label>
        <input type="text" name="pais2" id="pais2">
        <br>
        <label for="anio2">Año: </label>
        <input type="text" name="anio2" id="anio2">
        <br>
        <label for="fechaIni2">Fecha Inicio Venta: </label>
        <input type="text" name="fechaIni2" id="fechaIni2">
        <br>
        <label for="fechaFin2">Fecha fin Venta: </label>
        <input type="text" name="fechaFin2" id="fechaFin2">
        <br>
        <label for="precio2">Precio: </label>
        <input type="text" name="precio2" id="precio2">
        <br>
        <label for="material2">Material: </label>
        <input type="text" name="material2" id="material2">
        <br>
        <label for="peso">Peso: </label>
        <input type="text" name="peso" id="peso">
        <br>
        <label for="serie">Serie: </label>
        <input type="text" name="serie" id="serie">
        <br>
        <input type="submit" name="modificar" value="Modificar Mueble">
    </form>

<?php
    }
}

// **********************************************************

function cabecera() {}
//vista
function cuerpo($objMueble,$datos, $errores)
{
    if (empty($errores) && isset($_POST["mostrar"])) {
        // mostrarMueble($muebles[$datos["mueble"]]);
    } else {
        formulario($objMueble,$datos, $errores);
    }
?> 



<?php

}