<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once "../../scripts/librerias/validacion.php";

//controlador
$ubicacion = [
    "Index Principal" => "/index.php",
    "Relación V: Introducción de información" => "/aplicacion/practica5/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

//controlador

//inicializar variables necesarias 
$datos = [
    "nombre" => "",
    "contraseña" => "",
    "FechaNacimiento" => "",
    "fechaCarnet" => [
        "dia" => "",
        "mes" => "",
        "anio" => ""
    ],
    "Hora" => " ",
    "Estado" => " ",

    "Estudios" => " ",
    // claves para los checkboxes de estudios
    "estados2" => [],
    "Hermanos" => 0,
    "Sueldo" => 1100

];
$errores = [];

//comprobar si se ha dado a insertar 
if (isset($_POST["crear"])) {
    //Nombre
    $nombre = "";
    $defectoNombre = "NOMBRE_INVALIDO";

    if (isset($_POST["nombre"])) {
        $nombre = strtoupper(trim($_POST["nombre"]));

        if (!\VALFILTER\validaCadena($nombre, 25, $defectoNombre)) {
            $errores["nombre"][] = "El nombre debe tener como maximo 25 caracteres";
        } elseif (!\VALFILTER\validaExpresion($nombre, '/^[^H]/', $defectoNombre)) {
            $errores["nombre"][] = "El nombre no puede emprezar por H";
        } elseif ($nombre === " ") {
            $errores["nombre"][] = "El nombre no puede estar vacio";
        }
    }
    $datos["nombre"] = $nombre;




    //CONTRASEÑA
    $contraseña = " ";
    $defectoContraseña = "CONTRASEÑA_INVALIDO";

    if (isset($_POST["contraseña"])) {
        $contraseña = trim($_POST["contraseña"]);

        // Validar longitud máxima y minima
        if (!\VALFILTER\validaCadena($contraseña, 15, $defectoContraseña)) {
            $errores["contraseña"][] = "La contraseña no puede tener más de 15 caracteres.";
        }

        // Validar expresión regular
        elseif (!\VALFILTER\validaExpresion($contraseña, '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\$_\-;<>@]).{8,}$/', $defectoContraseña)) {
            $errores["contraseña"][] = "La contraseña debe tener al menos 8 caracteres e incluir una mayúscula, una minúscula, una cifra y un carácter especial.";
        }
    }
    $datos["contraseña"] = $contraseña;


    //FECHA 
    $FechaNacimiento = " ";
    $defechoFecha = "FECHA_INVALIDAD";

    if (isset($_POST["FechaNacimiento"])) {
        $FechaNacimiento = trim($_POST["FechaNacimiento"]);


        //validar la fecha 
        if (!\VALFILTER\validaFecha($FechaNacimiento, $defechoFecha)) {
            $errores["FechaNacimiento"][] = "La fecha no cumple las normas cc/cc/cccc";
        }
    }
    $datos["FechaNacimiento"] = $FechaNacimiento;


    //FECHACARNET
    $fechaCarnet = "";

    // Recoger los tres campos
    $diaCarnet = $_POST["dia"] ?? "";
    $mesCarnet = $_POST["mes"] ?? "";
    $anioCarnet = $_POST["anio"] ?? "";

    if ($diaCarnet !== "" && $mesCarnet !== "" && $anioCarnet !== "") {
        // Validar que la fecha del carnet existe
        if (checkdate((int)$mesCarnet, (int)$diaCarnet, (int)$anioCarnet)) {
            $fechaCarnetObj = DateTime::createFromFormat("d/m/Y", "$diaCarnet/$mesCarnet/$anioCarnet");

            // Validar que la fecha de nacimiento existe y es válida
            if (isset($datos["FechaNacimiento"]) && $datos["FechaNacimiento"] !== "Error") {
                $FechaNacimientoobj = DateTime::createFromFormat("d/m/Y", $datos["FechaNacimiento"]);

                // Calcular fecha de mayoría de edad
                $mayoriaEdadObj = clone $FechaNacimientoobj;
                $mayoriaEdadObj->add(new DateInterval("P18Y"));

                // Comparar fechas
                if ($fechaCarnetObj < $mayoriaEdadObj) {
                    $errores["fechaCarnet"][] = "La fecha del carnet debe ser posterior a tu mayoría de edad.";
                } else {
                    // Fecha válida
                    $fechaCarnet = $fechaCarnetObj->format("d/m/Y");
                }
            } else {
                $errores["fechaCarnet"][] = "La fecha de nacimiento no es válida, no se puede comparar.";
            }
        } else {
            $errores["fechaCarnet"][] = "La fecha del carnet no es válida.";
        }
    } else {
        $errores["fechaCarnet"][] = "Debes completar día, mes y año del carnet.";
    }

    $datos["fechaCarnet"] = $fechaCarnet;



    //Hora
    $Hora = " ";
    $defectoHora = "HORA_INVALIDA";

    if (isset($_POST["Hora"])) {
        $Hora = trim($_POST["Hora"]);


        //validar hora 
        if (!\VALFILTER\validaHora($Hora, $defectoHora)) {
            $errores["Hora"][] = "La hora es correcta";
        }
    }
    $datos["Hora"] = $Hora;

    //ESTADO
    $estado = $_POST["estado"] ?? "";
    $defectoEstado = "ESTADO_INVALIDO";

    // Opciones válidas
    $estadosValidos = [
        "1" => "Estudiante",
        "2" => "En paro",
        "3" => "Trabajando",
        "4" => "Jubilado"
    ];

    // Validar que se ha escogido una opción válida
    if (!\VALFILTER\validaRango($estado, array_keys($estadosValidos), 2)) {
        $errores["estado"][] = "Debes seleccionar un estado válido.";
        $estadoTexto = $defectoEstado;
    } else {
        $estadoTexto = $estadosValidos[$estado];
    }

    $datos["estado"] = $estado; //guarda si es 1,2,3,4
    $datos["estadoTexto"] = $estadoTexto; //guarda estudiante,paro,trabajando,jubilado

    // estudios
    $estudio = $_POST["estados2"] ?? [];
    $defectoEstudio = "Estudio Invalido";

    $estudiosValidos = [
        "0" => "Sin estudios",
        "1" => "Primaria",
        "2" => "Secundaria",
        "3" => "Bachillerato",
        "4" => "Ciclo Formativo",
        "5" => "Universitario"
    ];

    if (empty($estudio))
        $errores["estudios"][] = "Debes seleccionar una opción al menos";
    else if (in_array("0", $estudio) && count($_POST["estados2"]) > 1) {
        $errores["estudios"][] = "Si marcas la opcion sin estudios no puedes marcar nada mas";
    }
    // Guardar la selección de estudios en la misma clave que usa el formulario
    $datos["estados2"] = $estudio;

    // Si todo es válido, puedes construir el texto de estudios seleccionados
    // $datos["estudiosTexto"] = array_map(function ($codigo) use ($estudiosValidos) {
    //     return $estudiosValidos[$codigo];
    // }, $estudios);

    // HERMANOS
    $hermanos = $_POST["Hermanos"] ?? 0;
    $defectoHermanos = 0;

    if (!\VALFILTER\validaRango($hermanos, range(0, 20), 2)) {
        $errores["Hermanos"][] = "El número de hermanos debe estar entre 0 y 20.";
    }
    $datos["Hermanos"] = $hermanos;

    // SUELDO
    $sueldo = isset($_POST["Sueldo"]) ? (float)$_POST["Sueldo"] : 1100;

    // Creamos un array con claves válidas para sueldo
    $sueldoValido = [];
    for ($i = 1000; $i <= 150000; $i += 1) {
        $sueldoValido[(string)$i] = true;
    }

    if (!\VALFILTER\validaRango((string)(int)$sueldo, $sueldoValido, 2)) {
        $errores["Sueldo"][] = "El sueldo debe estar entre 1000€ y 150000€.";
    }
    $datos["Sueldo"] = $sueldo;

}

function resumen($datos)
{
    $nombre = $datos["nombre"];
    $contraseña = $datos["contraseña"];
    $fechaNacimiento = $datos["FechaNacimiento"];
    $fechaCarnet = $datos["fechaCarnet"];
    $hora = $datos["Hora"];
    $estadoTexto = $datos["estadoTexto"] ?? "";
    $hermanos = $datos["Hermanos"];
    $sueldo = $datos["Sueldo"];

    echo "<h2>Resumen de datos introducidos</h2>";
    echo "<ul>";
    echo "<li><strong>Nombre:</strong> {$nombre}</li>";
    echo "<li><strong>Contraseña:</strong> {$contraseña}</li>";
    echo "<li><strong>Fecha de nacimiento:</strong> {$fechaNacimiento}</li>";
    echo "<li><strong>Fecha de carnet:</strong> {$fechaCarnet}</li>";
    echo "<li><strong>Hora de despertarse:</strong> {$hora}</li>";
    echo "<li><strong>Estado:</strong> {$estadoTexto}</li>";

    echo "<li><strong>Estudios:</strong> ";
    if (!empty($datos["estados2"])) {
        $estudiosValidos = [
            "0" => "Sin estudios",
            "1" => "Primaria",
            "2" => "Secundaria",
            "3" => "Bachillerato",
            "4" => "Ciclo formativo",
            "5" => "Universitarios"
        ];
        $estudiosTexto = array_map(function($codigo) use ($estudiosValidos) {
            return $estudiosValidos[$codigo] ?? "Desconocido";
        }, $datos["estados2"]);
        echo implode(", ", $estudiosTexto);
    } else {
        echo "No seleccionado";
    }
    echo "</li>";

    echo "<li><strong>Número de hermanos:</strong> {$hermanos}</li>";
    echo "<li><strong>Sueldo:</strong> {$sueldo} €</li>";
    echo "</ul>";
}

//dibuja la plantilla de la vista
inicioCabecera("Jaime Vargas Báez");
cabecera();
inicioCuerpo("Practica 5");
cuerpo($datos, $errores);  //llamo a la vista
finCuerpo();
// **

//vista
function cabecera() {}



//vista
function cuerpo($datos, $errores)
{

?>
    <br>
    <br>
    <br>

<?php
    if (empty($errores) && isset($_POST["crear"])) {
        resumen($datos);
    } else {
        formulario($datos, $errores);
}

}

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
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"
            value="<?php echo $datos["nombre"]; ?>" size=25><br>

        <label for="contraseña">Contraseña: </label>
        <input type="password" name="contraseña" id="contraseña"
            value="<?php echo $datos["contraseña"]; ?>" size=25><br>

        <label for="FechaNacimiento">Fecha: </label>
        <input type="text" name="FechaNacimiento" id="FechaNacimiento"
            value="<?php echo $datos["FechaNacimiento"]; ?>" size=10><br>

        <label for="fechaCarnet">Fecha de carnet: </label>
        <input type="text" name="dia" id="dia"
            value="<?php echo $datos["dia"] ?? ""; ?>" size=2 maxlength="2"> /
        <input type="text" name="mes" id="mes"
            value="<?php echo $datos["mes"] ?? ""; ?>" size=2 maxlength="2"> /
        <input type="text" name="anio" id="anio"
            value="<?php echo $datos["anio"] ?? ""; ?>" size=4 maxlength="4"><br>

        <label for="Hora">Hora de despertarse:</label>
        <input type="text" name="Hora" id="Hora"
            value="<?php echo $datos["Hora"]; ?>" size=5><br>


        <label>Estado: </label><br>

        <input type="radio" name="estado" id="estudiante" value="1"
            <?php if (($datos["estado"] ?? "") == "1") echo "checked"; ?>>
        <label for="estudiante">Estudiante</label><br>

        <input type="radio" name="estado" id="paro" value="2"
            <?php if (($datos["estado"] ?? "") == "2") echo "checked"; ?>>
        <label for="paro">En paro</label><br>

        <input type="radio" name="estado" id="trabajando" value="3"
            <?php if (($datos["estado"] ?? "") == "3") echo "checked"; ?>>
        <label for="trabajando">Trabajando</label><br>

        <input type="radio" name="estado" id="jubilado" value="4"
            <?php if (($datos["estado"] ?? "") == "4") echo "checked"; ?>>
        <label for="jubilado">Jubilado</label><br>

        <input type="radio" name="estado" id="incorrecto" value="5"
            <?php if (($datos["estado"] ?? "") == "5") echo "checked"; ?>>
        <label for="incorrecto">Incorrecta (para probar)</label><br>

        <!-- ----------------------------------- -->
        <input type="checkbox" name="estados2[]" id="sinEstudios" value="0"
            <?php if (in_array("0", $datos["estados2"] ?? [])) echo "checked"; ?>>
        <label for="incorrecto">Sin estudios</label><br>
        
        <input type="checkbox" name="estados2[]" id="primaria" value="1"
            <?php if (in_array("1", $datos["estados2"] ?? [])) echo "checked"; ?>>
        <label for="incorrecto">Primaria</label><br>

        <input type="checkbox" name="estados2[]" id="secundaria" value="2"
            <?php if (in_array("2", $datos["estados2"] ?? [])) echo "checked"; ?>>
        <label for="incorrecto">Secundaria</label><br>

        <input type="checkbox" name="estados2[]" id="bachillerato" value="3"
            <?php if (in_array("3", $datos["estados2"] ?? [])) echo "checked"; ?>>
        <label for="incorrecto">Bachillerato</label><br>

        <input type="checkbox" name="estados2[]" id="ciclo" value="4"
            <?php if (in_array("4", $datos["estados2"] ?? [])) echo "checked"; ?>>
        <label for="incorrecto">Ciclo formativo</label><br>

        <input type="checkbox" name="estados2[]" id="universitario" value="5"
            <?php if (in_array("5", $datos["estados2"] ?? [])) echo "checked"; ?>>
        <label for="incorrecto">Universitarios</label><br>
        <!-- ----------------------------------- -->
        <label for="Hermanos">Número de hermanos: </label>
        <input type="number" name="Hermanos" id="Hermanos"
            value="<?php echo $datos["Hermanos"]; ?>" min="0" max="20"><br>
        <!-- ----------------------------------- -->
        <label for="Sueldo">Sueldo (€): </label>
        <input type="number" name="Sueldo" id="Sueldo"
            value="<?php echo $datos["Sueldo"]; ?>" step="0.01" min="1000" max="150000"><br>
        <input type="submit" class="boton" name="crear" value="Crear">
    </form>

<?php



}
?>