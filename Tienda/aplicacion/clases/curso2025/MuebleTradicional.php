<?php

final class MuebleTradicional extends MuebleBase {
    private float $Peso = 15;
    private string $Serie = "S01";

    public function __construct(string $nombre, string $fabricante, string $pais, int $anio, string $fechaIni, string $fechaFin, int $material, float $precio, float $peso,Caracteristicas $carac ,string $serie){
        parent::__construct($nombre,$fabricante,$pais,$anio,$fechaIni,$fechaFin,$material,$precio,$carac);
        $this->setPeso($peso);
        $this->setSerie($serie);
    }

    // tostring
    public function __toString(){
        return parent::__toString() . "Peso " . $this->getPeso() . ", Serie " . $this->getSerie(); 
    }

    // metodo damelistapropiedades
    public function dameListaPropiedades(): array{
        $array = parent::dameListaPropiedades();
        array_push($array,"Peso");
        array_push($array,"Serie");

        return $array;
    }

    // metodo dameProp
    public function damePropiedad(string $cadena, int $modo, &$res): bool{
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

    // get y set
    public function getPeso():float{
        return $this->Peso;
    }

    public function getSerie():string{
        return $this->Serie;
    }

    public function setPeso(float $num):bool {
        if($num<15 || $num>300) return false;
        else {
            $this->Peso=$num;
            return true;
        }
    }

        public function setSerie(string $cad):void {
        $this->Serie=$cad;
    }
}