<?php

namespace VALFILTER;

function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{
    $opciones = [
        'options' => [
            'min_range' => $min,
            'max_range' => $max
        ]
    ];
    if (filter_var($var, FILTER_VALIDATE_INT, $opciones)) {
        return true;
    } else {
        $var = $defecto;
        return false;
    }
}

function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    // si le pones otro nombre a las claves del array no lo detecta y da erorr  
    $opciones = array(
        'options' => [
            'min_range' => $min,
            'max_range' => $max,
        ]
    );

    if (filter_var($var, FILTER_VALIDATE_FLOAT, $opciones)) return true;
    else {
        $var = $defecto;
        return false;
    }
}

function validaEmail(string &$var, string $defecto): bool{
    if(filter_var($var,FILTER_VALIDATE_EMAIL)) return true;
    else {
        $var = $defecto;
        return false;
    }
}

function validaExpresion(string &$var, string $expresion, string $defecto):bool {
    $opciones = array(
        'options' => [
            'regexp' => $expresion
        ]
    );

    if(filter_var($var, FILTER_VALIDATE_REGEXP,$opciones)) return true;
    else {
        $var=$defecto;
        return false;
    }
}

// -----------------------------NO SE PUEDE HACER CON FILTER--------------------------------------
function validaFecha(string &$var, string $defecto): bool
{
    $fecha = mb_split("/", $var);

    if (count($fecha) == 3) {

        // Validar si tiene dos digitos en dia y mes
        if (strlen($fecha[0]) == 1) $fecha[0] = "0" . $fecha[0];
        if (strlen($fecha[1]) == 1) $fecha[1] = "0" . $fecha[1];

        if (checkdate($fecha[1], $fecha[0], $fecha[2])) {
            $var = $fecha[0] . "/" . $fecha[1] . "/" . $fecha[2];
            return true;
        } else {
            $var = $defecto;
            return false;
        }
    } else {
        $var = $defecto;
        return false;
    }
}

function validaHora(string &$var, string $defecto): bool
{
    $hora = mb_split(":", $var);

    if (count($hora) == 3) {
        //validar si todo tiene dos digitos 
        if (mb_strlen($hora[0]) == 1) $hora[0] = "0" . $hora[0];
        if (mb_strlen($hora[1]) == 1) $hora[1] = "0" . $hora[1];
        if (mb_strlen($hora[2]) == 1) $hora[2] = "0" . $hora[2];

        $h = (int)$hora[0];
        $m = (int)$hora[1];
        $s = (int)$hora[2];

        if ($h >= 0 && $h <= 23 && $m >= 0 && $m <= 59 && $s >= 0 && $s <= 59) {
            $var = $hora[0] . ":" . $hora[1] . ":" . $hora[2];
            return true;
        } else {
            $var = $defecto;
            return false;
        }
    } else {
        $var = $defecto;
        return false;
    }
}

function validaCadena(string &$var, int $longitud, string $defecto): bool
{
    if (mb_strlen($var) <= $longitud) {
        return true;
    } else {
        $var = $defecto;
        return false;
    }
}

function validaRango(mixed $var, array $posibles, int $tipo = 1): bool
{
    if ($tipo > 2 || $tipo < 1) return false;

    if ($tipo == 1) {
        // Busca en los valores del array
        return in_array($var, $posibles, true);
    } else {
        if (array_key_exists($var, $posibles)) return true;
        else return false;
    }
}
