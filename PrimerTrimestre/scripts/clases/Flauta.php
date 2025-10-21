<?php

final class Flauta extends InstrumentoViento implements IFabricable {
    private function __construct($edad=10,$material="madera"){
         parent::__construct($edad,$material);
    }

    public static function CrearDesdeArray(array $array):static {

        // Esta forma esta bien pero es muy larga mejor usar la de abajo
        // if(!array_key_exists("edad",$array) && !array_key_exists("material",$array)) {
        //     // llama al constructor de esta clase
        //    return new static();
        // }
        // else if(array_key_exists("material",$array) && !array_key_exists("edad",$array)){
        //    return new static(material: $array["material"]);
        // }
        // else if(array_key_exists("edad",$array) && !array_key_exists("material",$array)) {
        //     return new static(edad:$array["edad"]);
        // }
        // else return new static($array["edad"],$array["material"]);

        $material = $array['material'] ?? 'madera';
        $edad = $array["edad"] ?? 10;
        return new static($edad, $material);

    }

    public function metodoFabricacion(): string{return "";}
    public function metodoReciclado(): string{return " ";}

    public function __clone(){
        $this->_edad=0;
        self::$contador++;
        $this -> setOrdenCreacion(self::$contador);
    }
}
?>