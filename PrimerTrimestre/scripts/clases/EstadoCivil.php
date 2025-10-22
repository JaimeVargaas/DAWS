<?php
enum EstadoCivil:int {
    case soltero = 10;
    case casado = 20;
    case pareja = 30;
    case viudo = 40;


function descripcion():string {
    return $this->name;
}

function valor():int{
    return $this->value;
}
static function casos():array {
    return self::cases();
}

}
?>