<?php
class Persona
{
    private String $_nombre;
    private String $_fec_nac;
    private String $_domicilio;
    private String $_localidad;
    private EstadoCivil $_estado;

    // Constructor
    private function __construct()
    {
        $this->_nombre="Prueba";
        $this->_fec_nac="01/01/2000";
        $this->_domicilio="Carrera 12";
        $this->_localidad="antequera";
        $this->_estado=EstadoCivil::soltero;
    }

    // constructor statico
    static public function registrarPersona(String $nombre,String $fecNac,String $domicilio,String $localidad, EstadoCivil $estado) {
        // esta funcion cuando se llama, accede a su propio constructor para crear el objeto ya que el constructor es privado
        return new Persona($nombre,$fecNac,$domicilio,$localidad,$estado);
    }

    public function __toString()
    {
        return $this->_nombre . " es una persona ".  $this->_estado->descripcion() . 
        " nacida en " . $this->_fec_nac . " y que vive en " . $this->_localidad;
    }

    // Get y Set
    public function get_nombre()
    {
        return $this->_nombre;
    }

    public function set_nombre($_nombre)
    {
        $this->_nombre = $_nombre;
        return $this;
    }

    public function get_fec_nac()
    {
        return $this->_fec_nac;
    }

    public function set_fec_nac($_fec_nac)
    {
        $this->_fec_nac = $_fec_nac;
        return $this;
    }

    public function get_domicilio()
    {
        return $this->_domicilio;
    }

    public function set_domicilio($_domicilio)
    {
        $this->_domicilio = $_domicilio;
        return $this;
    }

    public function get_localidad()
    {
        return $this->_localidad;
    }
    public function set_localidad($_localidad)
    {
        $this->_localidad = $_localidad;

        return $this;
    }

    public function get_estado():string
    {
        return $this->_estado->descripcion();
    }
    public function set_estado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }

}
