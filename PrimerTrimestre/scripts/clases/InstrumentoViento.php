<?php

class InstrumentoViento extends InstrumentoBase{

    protected String $_material;

    public function __construct($_edad=15,$material="madera"){
        parent::__construct("Instrumento de viento",$_edad);
        $this->_material=$material;
    }

    // funciones abstractas de la clase padre
    public function sonido(): string{
        return "Soplar";
    }

    public final function afinar(): string{
        return "Limpiar agujeros con esponja";
    }

    public function __toString(){
        return parent::__toString() . ", Instrumento de material $this->_material";
    }
}

?>
