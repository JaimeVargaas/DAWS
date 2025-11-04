<?php

use function VALFILTER\validaRango;

require_once __DIR__ . '/../../../scripts/librerias/validacion.php';


abstract class MuebleBase {
    public const MATERIALES_POSIBLES = ["madera","metal","cemento","plastico"];
    const MAXIMO_MUEBLES = 10;
    private static int $mueblesCreados = 0;
    public string $Nombre;
    public string $Fabricante = "FMu";
    public string $pais = "ESPAÑA";
    public int $anio = 2020;
    public String $FechaIniVenta = "01/01/2020";
    public String $FechaFinVenta = "31/12/2040";
    public int $MaterialPrincipal;
    public float $Precio = 30;

    // Constructor
    public function __construct (string $nombre, string $fabricante, string $pais, int $anio, string $fechaIni, string $fechaFin, int $material, float $precio){
        



    }

    // GETTERS Y SETTERS
    // funcion que devuelve la descripcion segun el numero que se ha introducido
    public function getMaterialDescripcion() {
        if(\VALFILTER\validaRango($this->MaterialPrincipal, MuebleBase::MATERIALES_POSIBLES, 2))
            return MuebleBase::MATERIALES_POSIBLES[$this->MaterialPrincipal];
        else
            return "no existe material con ese numero";
    }

    public function getNombre(): string {
        return $this->Nombre;
    }

    public function setNombre(string $nombre): bool {
        if(\VALFILTER\validaCadena($nombre,40,"") && $nombre != "") {
            $this->Nombre=mb_strtoupper($nombre);
            return true;
        }
        else {
            return false;
        }
    }

    public function getFabricante(): string {
        return $this->Fabricante;
    }

    public function setFabricante(string $fabricante): bool {
        if(\VALFILTER\validaCadena($fabricante,30,"") && $fabricante!="") {
            if(str_starts_with($fabricante,"FMu:")) {
                $this->Fabricante=$fabricante;
                return true;
            }
            else {
                $this->Fabricante="FMu:" . $fabricante;
                return true;
            }
        }
        else return false;
    }

    public function getPais(): string {
        return $this->pais;
    }

    public function setPais(string $pais): void {
        $this->pais = $pais;
    }

    public function getAnio(): int {
        return $this->anio;
    }

    public function setAnio(string $anio): void {
 
    }

    public function getFechaIniVenta(): string {
        return $this->FechaIniVenta;
    }

    public function setFechaIniVenta(string $FechaIniVenta): void {
        $this->FechaIniVenta = $FechaIniVenta;
    }

    public function getFechaFinVenta(): string {
        return $this->FechaFinVenta;
    }

    public function setFechaFinVenta(string $FechaFinVenta): void {
        $this->FechaFinVenta = $FechaFinVenta;
    }

    public function getMaterialPrincipal(): int {
        return $this->MaterialPrincipal;
    }

    public function setMaterialPrincipal(int $MaterialPrincipal): void {
        $this->MaterialPrincipal = $MaterialPrincipal;
    }

    public function getPrecio(): float {
        return $this->Precio;
    }

    public function setPrecio(float $Precio): void {
        $this->Precio = $Precio;
    }

    public static function getMueblesCreados(): int {
        return self::$mueblesCreados;
    }
}



