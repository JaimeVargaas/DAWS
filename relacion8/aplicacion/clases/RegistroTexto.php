<?php 
class RegistroTexto {
    private string $_cadena;
    private DateTime $_fechaHora;

    public function __construct(string $cadena){
        $this->_cadena=$cadena;
        $this->_fechaHora = new DateTime();
    }

    public function getCadena():string {
        return $this->_cadena;
    }

    public function getFechaHora():string {
        return $this->_fechaHora->format("d-m-Y H:i:s");
    }
}