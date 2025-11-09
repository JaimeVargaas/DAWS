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
    "material"=> "",
    "porRec"=> "",
    "peso"=> "",
    "serie"=> ""
];

$errores = [];
$objMueble = null;

global $muebles;
$mueble = null;
if (isset($_GET["mueble"])) {
    $mueble = (int)$_GET["mueble"];
    if (array_key_exists($mueble, $muebles)) {
        $objMueble = $muebles[$mueble];
    }
}

// lista de materiales que serviran despues para hacer el select
$materiales = [
    "Madera",
    "Metal",
    "Plástico",
    "Vidrio",
    "Composite"
];

// si no se ha encontrado el mueble salta error
if (!$objMueble) {
    inicioCabecera("2DAW TIENDA");
    cabecera();
    finCabecera();
    inicioCuerpo("2DAW MODIFICA");
    echo "<p>Mueble no encontrado. <a href='/index.php'>Volver al índice</a></p>";
    finCuerpo();
    exit;
}

// guardar los datos del objeto para mostrarlos
$datos["nombre"] = method_exists($objMueble, "getNombre") ? $objMueble->getNombre() : "";
$datos["fabricante"] = method_exists($objMueble, "getFabricante") ? $objMueble->getFabricante() : "";
$datos["pais"] = method_exists($objMueble, "getPais") ? $objMueble->getPais() : "";
$datos["anio"] = method_exists($objMueble, "getAnio") ? $objMueble->getAnio() : "";
$datos["fechaIni"] = method_exists($objMueble, "getFechaIniVenta") ? $objMueble->getFechaIniVenta() : "";
$datos["fechaFin"] = method_exists($objMueble, "getFechaFinVenta") ? $objMueble->getFechaFinVenta() : "";
$datos["precio"] = method_exists($objMueble, "getPrecio") ? $objMueble->getPrecio() : "";
$datos["material"] = method_exists($objMueble, "getMaterialDescripcion") ? $objMueble->getMaterialDescripcion() : "";
$datos["porRec"] = method_exists($objMueble, "getPorcentajeReciclado") ? $objMueble->getPorcentajeReciclado() : "";
$datos["peso"] = method_exists($objMueble, "getPeso") ? $objMueble->getPeso() : "";
$datos["serie"] = method_exists($objMueble, "getSerie") ? $objMueble->getSerie() : "";


if (isset($_POST["modificar"])) {
    $datos["nombre"] = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : $datos["nombre"];
    $datos["fabricante"] = isset($_POST["fabricante"]) ? trim($_POST["fabricante"]) : $datos["fabricante"];
    $datos["pais"] = isset($_POST["pais"]) ? trim($_POST["pais"]) : $datos["pais"];
    $datos["anio"] = isset($_POST["anio"]) ? trim($_POST["anio"]) : $datos["anio"];
    $datos["fechaIni"] = isset($_POST["fechaIni"]) ? trim($_POST["fechaIni"]) : $datos["fechaIni"];
    $datos["fechaFin"] = isset($_POST["fechaFin"]) ? trim($_POST["fechaFin"]) : $datos["fechaFin"];
    $datos["precio"] = isset($_POST["precio"]) ? trim($_POST["precio"]) : $datos["precio"];
    $datos["material"] = isset($_POST["material"]) ? trim($_POST["material"]) : $datos["material"];
    $datos["porRec"] = isset($_POST["porRec"]) ? trim($_POST["porRec"]) : $datos["porRec"];
    $datos["peso"] = isset($_POST["peso"]) ? trim($_POST["peso"]) : $datos["peso"];
    $datos["serie"] = isset($_POST["serie"]) ? trim($_POST["serie"]) : $datos["serie"];

    // hago clone para que no afecte al mueble del array
    $aux = clone $objMueble;
    $hayErrorAux = false;

    if (method_exists($aux, "setNombre")) {
        if (!$aux->setNombre($datos["nombre"])) {
            $errores["nombre"][] = "Nombre inválido";
            $hayErrorAux = true;
        }
    } else {
        if ($datos["nombre"] === "") {
            $errores["nombre"][] = "Nombre no puede estar vacío";
            $hayErrorAux = true;
        }
    }

    if (method_exists($aux, "setFabricante")) {
        if (!$aux->setFabricante($datos["fabricante"])) {
            $errores["fabricante"][] = "Fabricante inválido";
            $hayErrorAux = true;
        }
    } else {
        if ($datos["fabricante"] === "") {
            $errores["fabricante"][] = "Fabricante no puede estar vacío";
            $hayErrorAux = true;
        }
    }

    if (method_exists($aux, "setPrecio")) {
        if (!$aux->setPrecio($datos["precio"])) {
            $errores["precio"][] = "Precio inválido";
            $hayErrorAux = true;
        }
    } else {
        if (!is_numeric($datos["precio"]) || floatval($datos["precio"]) <= 0) {
            $errores["precio"][] = "Precio debe ser número positivo";
            $hayErrorAux = true;
        }
    }

    if (get_class($objMueble) === "MuebleReciclado") {
        if (method_exists($aux, "setPorcentajeReciclado")) {
            if (!$aux->setPorcentajeReciclado($datos["porRec"])) {
                $errores["porRec"][] = "Porcentaje reciclado inválido";
                $hayErrorAux = true;
            }
        } else {
            if ($datos["porRec"] === "" || !is_numeric($datos["porRec"]) || intval($datos["porRec"]) < 0 || intval($datos["porRec"]) > 100) {
                $errores["porRec"][] = "Porcentaje reciclado debe ser 0-100";
                $hayErrorAux = true;
            }
        }
    }

    if ($datos["pais"] === "") {
        $errores["pais"][] = "País no puede estar vacío";
    }
    $anioInt = intval($datos["anio"]);
    $anioActual = (int)date("Y");
    if (!preg_match('/^\d{4}$/', $datos["anio"]) || $anioInt < 1800 || $anioInt > $anioActual) {
        $errores["anio"][] = "Año inválido";
    }

    $fi = strtotime($datos["fechaIni"]);
    $ff = strtotime($datos["fechaFin"]);
    if ($datos["fechaIni"] === "" || $fi === false) {
        $errores["fechaIni"][] = "Fecha inicio inválida (formato YYYY-MM-DD)";
    }
    if ($datos["fechaFin"] === "" || $ff === false) {
        $errores["fechaFin"][] = "Fecha fin inválida (formato YYYY-MM-DD)";
    }
    if ($fi !== false && $ff !== false && $fi > $ff) {
        $errores["fechaFin"][] = "Fecha fin debe ser posterior o igual a fecha inicio";
    }

    if (!in_array($datos["material"], $materiales, true)) {
        $errores["material"][] = "Material no válido";
    }

    if (get_class($objMueble) !== "MuebleReciclado") {
        if ($datos["peso"] === "" || !is_numeric($datos["peso"]) || floatval($datos["peso"]) <= 0) {
            $errores["peso"][] = "Peso inválido";
        }
        if ($datos["serie"] === "") {
            $errores["serie"][] = "Serie no puede estar vacía";
        }
    }

    if (count($errores) === 0) {

        if (method_exists($objMueble, "setNombre")) $objMueble->setNombre($datos["nombre"]);
        else $objMueble->nombre = $datos["nombre"];

        if (method_exists($objMueble, "setFabricante")) $objMueble->setFabricante($datos["fabricante"]);
        else $objMueble->fabricante = $datos["fabricante"];

        if (method_exists($objMueble, "setPais")) $objMueble->setPais($datos["pais"]);
        else $objMueble->pais = $datos["pais"];

        if (method_exists($objMueble, "setAnio")) $objMueble->setAnio($datos["anio"]);
        else $objMueble->anio = $datos["anio"];

        if (method_exists($objMueble, "setFechaIniVenta")) $objMueble->setFechaIniVenta($datos["fechaIni"]);
        else $objMueble->fechaIniVenta = $datos["fechaIni"];

        if (method_exists($objMueble, "setFechaFinVenta")) $objMueble->setFechaFinVenta($datos["fechaFin"]);
        else $objMueble->fechaFinVenta = $datos["fechaFin"];

        if (method_exists($objMueble, "setPrecio")) $objMueble->setPrecio($datos["precio"]);
        else $objMueble->precio = $datos["precio"];


        if (method_exists($objMueble, "setMaterial")) {
            $objMueble->setMaterial($datos["material"]);
        } elseif (method_exists($objMueble, "setMaterialDescripcion")) {
            $objMueble->setMaterialDescripcion($datos["material"]);
        } else {
            if (property_exists($objMueble, "materialDescripcion")) $objMueble->materialDescripcion = $datos["material"];
            elseif (property_exists($objMueble, "material")) $objMueble->material = $datos["material"];
        }

        if (get_class($objMueble) === "MuebleReciclado") {
            if (method_exists($objMueble, "setPorcentajeReciclado")) $objMueble->setPorcentajeReciclado($datos["porRec"]);
            else $objMueble->porcentajeReciclado = $datos["porRec"];
        } else {
            if (method_exists($objMueble, "setPeso")) $objMueble->setPeso($datos["peso"]);
            else $objMueble->peso = $datos["peso"];

            if (method_exists($objMueble, "setSerie")) $objMueble->setSerie($datos["serie"]);
            else $objMueble->serie = $datos["serie"];
        }

        $muebles[$mueble] = $objMueble;

        inicioCabecera("2DAW TIENDA");
        cabecera();
        finCabecera();

        inicioCuerpo("Resumen de modificación");
        echo "<h2>Resumen del mueble modificado</h2>";
        echo "<ul>";
        echo "<li>Índice: $mueble</li>";
        echo "<li>Tipo: " . get_class($objMueble) . "</li>";
        echo "<li>Nombre: " . htmlspecialchars($datos["nombre"]) . "</li>";
        echo "<li>Fabricante: " . htmlspecialchars($datos["fabricante"]) . "</li>";
        echo "<li>País: " . htmlspecialchars($datos["pais"]) . "</li>";
        echo "<li>Año: " . htmlspecialchars($datos["anio"]) . "</li>";
        echo "<li>Fecha inicio venta: " . htmlspecialchars($datos["fechaIni"]) . "</li>";
        echo "<li>Fecha fin venta: " . htmlspecialchars($datos["fechaFin"]) . "</li>";
        echo "<li>Precio: " . htmlspecialchars($datos["precio"]) . "</li>";
        echo "<li>Material: " . htmlspecialchars($datos["material"]) . "</li>";
        if (get_class($objMueble) === "MuebleReciclado") {
            echo "<li>Porcentaje reciclado: " . htmlspecialchars($datos["porRec"]) . "</li>";
        } else {
            echo "<li>Peso: " . htmlspecialchars($datos["peso"]) . "</li>";
            echo "<li>Serie: " . htmlspecialchars($datos["serie"]) . "</li>";
        }
        echo "</ul>";
        echo "<p><a href='/index.php'>Volver al índice</a></p>";
        finCuerpo();
        exit;
    }
}

// Dibuja la plantilla de la vista
inicioCabecera("2DAW TIENDA");
cabecera();
finCabecera();

inicioCuerpo("2DAW MODIFICA");
cuerpo($muebles,$objMueble,$datos, $errores,$materiales);
finCuerpo();

function formulario($objMueble,$datos, $errores,$materiales)
{
    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo htmlentities("$clave => $error") . "<br>" . PHP_EOL;
        }
        echo "</div>";
    }

    $esReciclado = get_class($objMueble) === "MuebleReciclado";
?>  
    <br>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($datos['nombre']); ?>">
        <br>
        <label for="fabricante">Fabricante: </label>
        <input type="text" name="fabricante" id="fabricante" value="<?php echo htmlspecialchars($datos['fabricante']); ?>">
        <br>
        <label for="pais">Pais: </label>
        <input type="text" name="pais" id="pais" value="<?php echo htmlspecialchars($datos['pais']); ?>">
        <br>
        <label for="anio">Año: </label>
        <input type="text" name="anio" id="anio" value="<?php echo htmlspecialchars($datos['anio']); ?>">
        <br>
        <label for="fechaIni">Fecha Inicio Venta (YYYY-MM-DD): </label>
        <input type="text" name="fechaIni" id="fechaIni" value="<?php echo htmlspecialchars($datos['fechaIni']); ?>">
        <br>
        <label for="fechaFin">Fecha fin Venta (YYYY-MM-DD): </label>
        <input type="text" name="fechaFin" id="fechaFin" value="<?php echo htmlspecialchars($datos['fechaFin']); ?>">
        <br>
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio" value="<?php echo htmlspecialchars($datos['precio']); ?>">
        <br>
        <label for="material">Material: </label>
        <select name="material" id="material">
            <?php
            foreach ($materiales as $mat) {
                $sel = ($mat === $datos['material']) ? "selected" : "";
                echo "<option value=\"" . htmlspecialchars($mat) . "\" $sel>" . htmlspecialchars($mat) . "</option>";
            }
            ?>
        </select>
        <br>

        <?php if ($esReciclado) { ?>
            <label for="porRec">Porcentaje Reciclado: </label>
            <input type="text" name="porRec" id="porRec" value="<?php echo htmlspecialchars($datos['porRec']); ?>">
            <br>
        <?php } else { ?>
            <label for="peso">Peso: </label>
            <input type="text" name="peso" id="peso" value="<?php echo htmlspecialchars($datos['peso']); ?>">
            <br>
            <label for="serie">Serie: </label>
            <input type="text" name="serie" id="serie" value="<?php echo htmlspecialchars($datos['serie']); ?>">
            <br>
        <?php } ?>

        <input type="submit" name="modificar" value="Modificar Mueble">
    </form>

<?php
}

// **********************************************************

function cabecera() {}
//vista
function cuerpo($muebles,$objMueble,$datos, $errores,$materiales)
{
    if (empty($errores) && isset($_POST["mostrar"])) {
        mostrarMueble($muebles[$datos["mueble"]]);
    } else {
        formulario($objMueble,$datos, $errores,$materiales);
    }
} 

function mostrarMueble($objMueble)
{
    if (!$objMueble) return;
    echo "<h2>Mostrar Mueble seleccionado</h2>";
    if (method_exists($objMueble, '__toString')) {
        echo "<p>$objMueble</p>";
    } else {
        echo "<pre>";
        print_r($objMueble);
        echo "</pre>";
    }
}
?>