<?php

final class MuebleReciclado extends MuebleBase {
    private int $PorcentajeReciclado = 10;

    public function __construct(string $nombre, string $fabricante, string $pais, int $anio, string $fechaIni, string $fechaFin, int $material, float $precio, int $por){
        parent::__construct($nombre,$fabricante,$pais,$anio,$fechaIni,$fechaFin,$material,$precio);
        $this->setPorcentajeReciclado($por);
    }

    // tostring
    public function __toString(){
        return parent::__toString() . ", porcentaje de reciclado " . $this->PorcentajeReciclado;
    }

    // metodo dameListaPropiedades
    public function dameListaPropiedades(): array{
        $array = parent::dameListaPropiedades();
        $array["PorcentajeReciclado"] = $this->getPorcentajeReciclado();
        
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
    public function getPorcentajeReciclado():int{
        return $this->PorcentajeReciclado;
    }

    public function setPorcentajeReciclado(int $por):bool {
        if($por<0 || $por>100) return false;
        else {
            $this->PorcentajeReciclado=$por;
            return true;
        }
    }
}