<?php
define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO", "desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO == "produccion")
    error_reporting(0);
else
    error_reporting(E_ALL);


spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/scripts/clases/";
    $fichero = $ruta . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    } else {
        throw new Exception("La clase $clase no se ha encontrado.");
    }
});

include(RUTABASE . "/aplicacion/plantilla/plantilla.php");
// include(RUTABASE . "/aplicacion/config/acceso_bd.php");

 //creo todos los objetos que necesita mi aplicación;
$punto1 = new Punto(10,10,"black",2);
$punto2 = new Punto(100,100,"red",3);
$punto3 = new Punto(200,200,"blue",1);

// $almacenaPuntos = [$punto1,$punto2,$punto3];
// escribirAFichero(nombreDat(),$almacenaPuntos);
$almacenaPuntos = [];
leerDeFichero(nombreDat(),$almacenaPuntos);

/**
 * funcion para escribir en un fichero
 * @param string $nombre nombre del fichero
 * @param mixed $datos valores
 * @return bool devuelve si ejecuta correctamente o hay algún error
 */
function escribirAFichero(string $nombre, array $datos): bool
{
    //ruta en la que se guardará el fichero
     $ruta = __DIR__ . "/aplicacion/Practica7/datos/";
    //si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);
    $ruta .= $nombre;
    //se abre el fichero para escritura
    //si existe se borra el contenido
    $fic = fopen($ruta, "w");
    if (!$fic)
        return false;
    //se recorre el array con los datos
    foreach ($datos as $fila) {
        $linea=$fila->getX() . "; " . $fila->getY() . "; " . $fila->getColor() . "; " . $fila->getGrosor();
        $linea .= "\r\n";
        //se escribe en el fichero una linea
        fputs($fic, $linea);
    }
    //se cierra el fichero
    fclose($fic);
    return true;
}

function anadirAFichero(string $nombre, array $datos): bool
{
    //ruta en la que se guardará el fichero
    $ruta = __DIR__ . "/aplicacion/Practica7/datos/";
    //si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);
    $ruta .= $nombre;
    //se abre el fichero para escritura
    //si existe se borra el contenido
    $fic = fopen($ruta, "a");
    if (!$fic)
        return false;
    //se recorre el array con los datos
    foreach ($datos as $fila) {
        $linea=$fila->getX() . "; " . $fila->getY() . "; " . $fila->getColor() . "; " . $fila->getGrosor();
        $linea .= "\r\n";
        //se escribe en el fichero una linea
        fputs($fic, $linea);
    }
    //se cierra el fichero
    fclose($fic);
    return true;
}

/**
 * funcion para leer de un fichero
 * @paramstring $nombre nombre del fichero
 * @parammixed $datos valores
 * @returnbool devuelve si ejecuta correctamente o hay algún error
 */
function leerDeFichero(string $nombre, array &$datos): bool
{
    //ruta en la que se guardará el fichero
    $ruta = __DIR__ . "/aplicacion/Practica7/datos/";
    //si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);
    $ruta .= $nombre;
    //se abre el fichero para lectura
    //debe existir
    $fic = fopen($ruta, "r");
    if (!$fic)
        return false;
    //borro el contenido del array
    foreach ($datos as $pos => $valor) {
        unset($datos[$pos]);
    }
    //leo el fichero linea a linea
    while ($linea = fgets($fic)) {
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);
        if ($linea != "") {
            $linea = explode(";", $linea);
            $datos[] = new Punto($linea[0],$linea[1], trim($linea[2]), $linea[3]);
        }
    }
    //se cierra el fichero
    fclose($fic);
    return true;
}

// funcion que saca el nombre deseado .dat
function nombreDat()
{
    $ip = $_SERVER['REMOTE_ADDR'];
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

    $nombreArch = "puntos_$ip" . "_$navegador.dat";

    return $nombreArch;
}

// funcion que saca el nombre deseado .txt
function nombreTxt()
{
    $ip = $_SERVER['REMOTE_ADDR'];
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

    $nombreArch = "puntos_$ip" . "_$navegador.txt";

    return $nombreArch;
}