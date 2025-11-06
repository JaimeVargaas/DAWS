<?php

use function VALFILTER\validaRango;

include_once('../../scripts/librerias/validacion.php');


abstract class MuebleBase {
    public const MATERIALES_POSIBLES = ["madera","metal","cemento","plastico"];
    const MAXIMO_MUEBLES = 10;
    private static int $mueblesCreados = 0;
    private string $Nombre;
    private string $Fabricante = "FMu";
    private string $pais = "ESPAÑA";
    private int $anio = 2020;
    private String $FechaIniVenta = "01/01/2020";
    private String $FechaFinVenta = "31/12/2040";
    private int $MaterialPrincipal;
    private float $Precio = 30;
    private Caracteristicas $caracteristicas;

    // Constructor
    public function __construct (string $nombre, string $fabricante, string $pais, int $anio, string $fechaIni, string $fechaFin, int $material, float $precio, Caracteristicas $carac){
        // Sumar la instancia que hemos creado y compararla para ver si ha llegado al maximo
        if(self::$mueblesCreados>self::MAXIMO_MUEBLES) throw new Exception("Has creado más de los muebles permitidos");
        self::$mueblesCreados++;

        // Si nombre esta mal no se puede continuar creando el objeto
        if(!$this->setNombre($nombre)) throw new Exception("Nombre mal introducido");
        
        if(!$this->setFabricante($fabricante))$this->setFabricante("FMu:");
        if(!$this->setAnio($anio))$this->setAnio(2020);
        if(!$this->setPais($pais))$this->setPais("ESPAÑA");
        if(!$this->setMaterialPrincipal($material))$this->setMaterialPrincipal(0);
        if(!$this->setPrecio($precio))$this->setPrecio(30);
        if(!$this->setFechaIniVenta($fechaIni))$this->setFechaIniVenta("01/01/2020");
        if(!$this->setFechaFinVenta($fechaFin))$this->setFechaFinVenta("31/12/2040");
        $this->caracteristicas=$carac;

    }

    // Metodo que devuelve un array con el nombre de las propiedades que tiene
    public function dameListaPropiedades():array {
        $array = ["Nombre", "Fabricante", "Pais", "Anio", "FechaIniVenta",
        "FechaFinVenta", "MaterialPrincipal", "Precio"];

        return $array;
    }

    // Método que se le pasa una cadena, el modo y la variable $res y devuelve si tiene esa propiedad
    public function damePropiedad(string $cadena, int $modo, &$res):bool {
        $metodo = "get".$cadena;
        if(($modo !== 1 && $modo !== 2)||!property_exists($this,$cadena)) return false;
        else {
            if($modo==1) {
                if(method_exists($this,$metodo)){
                    $res=$this->$metodo();
                    return true;
                }
                else return false;
            }
            else {
                $res=$this->$cadena;
                return true;
            }

        }
    }

    // Metodo de clase que devuelve true si se pueden crear mas instancias de clase 
    public static function puedeCrear(&$num) {
        if(self::getMueblesCreados()>self::MAXIMO_MUEBLES) return false;
        else {
            $num = self::MAXIMO_MUEBLES-self::getMueblesCreados();
            return true;
        }
    }

    // toString
    public function __toString(){
        return "MUEBLE de clase " . get_class($this) . " con nombre " . $this->getNombre() . ", fabricante " . $this->getFabricante() .
        ", fabricado en " . $this->getPais() . " a partir del año " . $this->getAnio() . ", vendido desde " . $this->getFechaIniVenta() .
        " hasta " . $this->getFechaFinVenta() . ", precio de " . $this->getPrecio() . " de material " . $this->getMaterialDescripcion() .
        "<br>" . $this->caracteristicas; 
    }

    // Metodo para añadir una nueva caracteristica
    public function anadir(...$car):void {
        if(count($car)%2!=0) unset ($car[count($car)-1]);

        $array = $this->caracteristicas->getCaracteristicas();
        for($i=0;$i<count($car)-1;$i+=2) {
           $array[$car[$i]]=$car[$i+1];
        }

        $this->caracteristicas->setCaracteristicas($array);
    }

    // Metodo exportarCaracteristicas que devuelve una cadena con todas las caracteristicas
    public function exportarCaracteristicas():string {
        $cadena = "";
        foreach($this->caracteristicas as $clave => $valor) {
            $cadena.= $clave . ":$valor" . PHP_EOL;
        }
        return $cadena;
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

    public function getMueblesCreados(): int {
        return self::$mueblesCreados;
    }

}



