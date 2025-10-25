<?php

class ClaseMisPropiedades implements Iterator
{
    private array $_propiedades = [];
    public mixed $propPublica;
    private mixed $_propPrivada;
    private int $pos = 0;
    private array $iterable;

    public function __construct(array $props = [], $propPri = 25, $proPu = null)
    {
        $this->_propPrivada = $propPri;
        $this->propPublica = $proPu;
        foreach ($props as $clave => $valor) {
            $this->_propiedades[$clave] = $valor;
        }

        $this->actualizarIterable();
    }

    public function __set($name, $value)
    {
        if ($name === "_propPrivada") throw new Exception("No se puede asignar dinámicamente a _propPrivada");
        $this->_propiedades[$name] = $value;

        $this->actualizarIterable();
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->_propiedades))
            return $this->_propiedades[$name];
        else
            throw new Exception("No existe la propiedad $name");
    }

    private function actualizarIterable(): void{
        $this->iterable = [];
        foreach ($this->_propiedades as $clave => $valor) {
            $this->iterable["oi_$clave"] = $valor;
        }
        $this->iterable["oi_propPublica"] = $this->propPublica;
        $this->iterable["oi__propPrivada"] = $this->_propPrivada;
    }

    /*
        * rewind(): inicia el bucle
        * valid(): comprueba si el elemento existe, si no se termina
        * key(): saca el valor en el key del foreach
        * current(): saca el valor en el value del foreach
        * next(): avanza en el bucle.
        */
    //pone el puntero al valor inicial
    public function rewind(): void
    {
        $this->pos = 0;
    }
    //devuelve el contenido correspondiente a la posición actual
    public function current(): mixed
    {
        return array_values($this->iterable)[$this->pos];
    }

    public function key(): mixed
    {
        return array_keys($this->iterable)[$this->pos];
    }
    public function next(): void
    {
        ++$this->pos;
    }
    public function valid(): bool
    {
        if ($this->pos <= (count($this->iterable) - 1)) return true;
        else return false;
    }
}
?>