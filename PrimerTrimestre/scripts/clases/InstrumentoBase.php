<?php 

abstract class InstrumentoBase {
    private string $_descripcion;
    protected int $_edad;

    // Contador
    protected static int $contador = 0;
    private int $ordenCreacion=0;

    // Metodos get y set
    public function getDescripcion():string {
        return $this->_descripcion;
    }

    public function setDescripcion(string $cadena):void {
        $this->_descripcion=$cadena;
    }

    public function getEdad():string {
        return $this->_edad;
    }

    public function setEdad(int $edad):void {
        $this->_edad=$edad;
    }

    public function getOrdenCreacion():Int {
        return $this->ordenCreacion;
    }

    // Constructor
    public function __construct(string $_descripcion="", int $edad=10) {
        $this->_descripcion =$_descripcion;
        $this->_edad = $edad;
        self::$contador++;
        $this->ordenCreacion=self::$contador;
    }


    // metodos
    abstract function sonido():string;
    abstract function afinar():string;

    public function envejecer():void {
       $this->_edad ++;
    }

    // to string
    public function __toString(){
        return "Instrumento con descripción $this->_descripcion, instancia 
        $this->ordenCreacion de un total de " . self::$contador. " Tiene $this->_edad año(s). La clase es " . get_class($this);
    } 

}

?>