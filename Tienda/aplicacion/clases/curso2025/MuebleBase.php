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
        // Sumar la instancia que hemos creado y compararla para ver si ha llegado al maximo
        if(self::$mueblesCreados>self::MAXIMO_MUEBLES) throw new Exception("Has creado más de los muebles permitidos");
        self::$mueblesCreados++;

        if(!$this->setNombre($nombre)) throw new Exception("Nombre mal introducido");

    }

    // GETTERS Y SETTERS
    // funcion que devuelve la descripcion segun el numero que se ha introducido
    public function getMaterialDescripcion() {
        // Busca en las claves del array si coincide alguna muestra su valor
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

    public function setPais(string $pais): bool {
        if(\VALFILTER\validaCadena($pais,20,"") && $pais != "") {
            $this->pais=$pais;
            return true;
        }
        else return false;
    }

    public function getAnio(): int {
        return $this->anio;
    }

    public function setAnio(int $anio): bool {
        if(\VALFILTER\validaEntero($anio,2020,2025,2020)) {
            $this->anio=$anio;
            return true;
        }
        else return false;
    }

    public function getFechaIniVenta(): string {
        return $this->FechaIniVenta;
    }

    public function setFechaIniVenta(string $FechaIniVenta): bool {
        // Mira si la fecha esta bien introducida
        if(\VALFILTER\validaFecha($FechaIniVenta,"01/01/2020")) {
            // se crean la fecha actual y la fecha limite para comparar luego
            $dateFecha = DateTime::createFromFormat('d/m/Y',$FechaIniVenta);
            $dateFechaLimite = DateTime::createFromFormat('d/m/Y','01/01/'.$this->anio);

            if($dateFecha>=$dateFechaLimite){
                $this->FechaIniVenta=$FechaIniVenta;
                return true;
            }
            else return false;
        }
        else return false; 
    }

    public function getFechaFinVenta(): string {
        return $this->FechaFinVenta;
    }

    public function setFechaFinVenta(string $FechaFinVenta): bool {
        // Mira si la fecha esta bien introducida
        if(\VALFILTER\validaFecha($FechaFinVenta,"31/12/2040")){
            // se crean la fecha actual y la fecha limite para comparar luego
            $dateFecha = DateTime::createFromFormat('d/m/Y',$FechaFinVenta);
            $dateFechaLimite = DateTime::createFromFormat('d/m/Y',$this->FechaIniVenta);

            if($dateFecha>=$dateFechaLimite) {
                $this->FechaFinVenta = $FechaFinVenta;
                return true;
            }
            else return false;
        }
        else return false;
    }

    public function getMaterialPrincipal(): int {
        return $this->MaterialPrincipal;
    }

    public function setMaterialPrincipal(int $MaterialPrincipal): bool {
        if($MaterialPrincipal>count(MuebleBase::MATERIALES_POSIBLES)-1) {
            return false;
        }
        else {
            $this->MaterialPrincipal = $MaterialPrincipal;
            return true;
        }
    }

    public function getPrecio(): float {
        return $this->Precio;
    }

    public function setPrecio(float $Precio): bool {
        if($Precio>=30) {
            $this->Precio = $Precio;
            return true;
        }

        else return false;
    }

    public static function getMueblesCreados(): int {
        return self::$mueblesCreados;
    }
}



