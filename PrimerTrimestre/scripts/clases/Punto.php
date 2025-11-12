<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once(__DIR__ . "/../librerias/validacion.php");

class Punto
{
    public const COLORES = [
        "black" => ["nombre" => "negro", "rgb" => [0, 0, 0]],
        "white" => ["nombre" => "blanco", "rgb" => [255, 255, 255]],
        "red"   => ["nombre" => "rojo", "rgb" => [255, 0, 0]],
        "blue"  => ["nombre" => "azul", "rgb" => [0, 0, 255]]
    ];

    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso"
    ];

    private int $x;
    private int $y;
    private string $color;
    private int $grosor;

    public function __construct($x, $y, $cadena, $grosor) {
        if(!$this->setX($x)) throw new Exception("Valor X mal introducido");
        if(!$this->setY($y)) throw new Exception("Valor Y mal introducido");
        if(!$this->setColor($cadena)) throw new Exception("Valor cadena mal introducido");
        if(!$this->setGrosor($grosor)) throw new Exception("Valor grosor mal introducido");
    }

    // GETTER
    public function getX(): int
    {
        return $this->x;
    }
    public function getY(): int
    {
        return $this->y;
    }
    public function getColor(): string
    {
        return $this->color;
    }
    public function getGrosor(): int
    {
        return $this->grosor;
    }

    // SETTER
    public function setX(int $num): bool
    {
        if (\VALFILTER\validaEntero($num, 0, 20000, 0)) {
            $this->x = $num;
            return true;
        } else return false;
    }
    public function setY(int $num): bool
    {
        if (\VALFILTER\validaEntero($num, 0, 20000, 0)) {
            $this->y = $num;
            return true;
        } else return false;
    }
    public function setColor(String $cad): bool
    {
        if (array_key_exists($cad, self::COLORES)) {
            $this->color = $cad;
            return true;
        } else return false;
    }

    public function setGrosor(int $num)
    {
        if (array_key_exists($num, self::GROSORES)) {
            $this->grosor = $num;
            return true;
        } else return false;
    }

    // para que no se puedan crear propiedades dinamicas
    public function __set($name, $value)
    {
        throw new Exception("No se pueden crear propiedades dinámicas: $name");
    }
}
