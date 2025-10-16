<?php

/**
 * Undocumented function
 *
 * @param array $array
 * @param [type] $pos
 * @param [type] $valor
 * @param [type] $num
 * @return boolean
 */

// la & sirve para modificar la variable que metemos desde el archivo
function cuantasVeces(array &$array,$pos,$valor,&$num):bool{

    // se hace static para que no se borre cada vez que llamemos al metodo 
    static $cont =0;
    $cont++;
    $num= $cont;

    if($pos=="2daw" ||$pos =="primera") return false;
    else {
        $array[$pos]=$valor;
        return true;
    }
}

/**
 * Undocumented function
 *
 * @param [type] $num
 * @return string
 */
function generarCadena($num):string|false{
    $resultado = "";
    if ($num <= 0)
        $resultado = false;
    else {
        for ($i = 0; $i < $num; $i++) {
            // coge un caracter aleatorio del codigo ascii desde el numero 48 hasta el 112
            $resultado .= chr(mt_rand(48, 112));
        }
    }
    return $resultado;
}

/**
 * Undocumented function
 *
 * @param [type] ...$args
 * @return integer
 */
function Operaciones(...$args):int{
    $resultado = 0;
    // si son menos de 3 argumentos devuelve fallo
    if (count($args) < 3) return "Necesitas al menos 3 parámetros para que funcione esta función";

    // si es 1 suma todos los operandos
    else if ($args[0] == 1) {
        for ($i = 1; $i < count($args); $i++) {
            $resultado += $args[$i];
        }
        // si es 2 le resta al primer operando la suma de todos los demas
    } else if ($args[0] == 2) {
        $op = $args[1];
        for ($i = 2; $i < count($args); $i++) {
            $resultado += $args[$i];
        }
        $resultado = $op - $resultado;

        // si es 3 multiplica todos los operandos
    } else if ($args[0] == 3) {
        $resultado = 1;
        for ($i = 1; $i < count($args); $i++) {
            $resultado *= $args[$i];
        }
    }
    // Si es cualquier otro numero resta los indices pares a los impares
    else {
        $pares = 0;
        $impares = 0;
        for ($i = 1; $i < count($args); $i++) {
            if ($i % 2 == 0) {
                $pares += $args[$i];
            } else {
                $impares += $args[$i];
            }
        }
        $resultado = $pares - $impares;
    }

    return $resultado;
}

// lo que hace la & es que la variable que se meta ahi se cambia el valor totalmente en el archivo tambien
function devuelve(&$a, $b = 3, $c = 10):float{
    $resultado = $a * $b * $c;
    $a = $a + $b + $c;

    return $resultado;
}

function hacerOperacion($string, $a, $b):int|false{
    switch ($string) {
        case "suma":
            return suma($a, $b);
            break;
        case "resta":
            return resta($a, $b);
            break;
        case "multiplica":
            return multiplicacion($a, $b);
            break;
        default:
            return false;
    }
}

function suma($a, $b){
    return $a + $b;
}
function resta($a, $b){
    return $a - $b;
}
function multiplicacion($a, $b){
    return $a * $b;
}

/**
 * Undocumented function
 *
 * @param [type] $num1
 * @param [type] $num2
 * @param callable $funcion
 * @return integer
 */
// devuelve el resultado de los dos numeros y la funcion que se mete como parametro
// callable se le indica para que sepa que es una funcion
function llamadaAFuncion($num1,$num2,callable $funcion):int {
    return $funcion($num1,$num2);
}

/**
 * Undocumented function
 *
 * @param array $array
 * @return array
 */
function ordenar(array $array):array {
    // usa una funcion callback anonima para ordenarlo de forma descendente, usando la funcion usort
    usort($array,fn($a,$b)=>strlen($b)-strlen($a));

    return $array;
}

?>