<?php 
    class SerieFibonacci implements Iterator{
        private int $_limite;
        private int $_claveActual;

        public function __construct($limite)
        {
            $this->_limite=$limite;
            $this->_claveActual=0;
        }

        // metodo que hace el fibonacci usando recursivo
        private function fibonacci($n): int {
            if ($n === 0) return 0;
            if ($n === 1) return 1;
            return $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
        }

        //para poder usar la funcion fibonacci desde fuera se tiene que crear primero un objeto seriefibonacci
        public static function fFibonacci($ultimo) {
            $f = new self(10);
            for($i=0;$i<=$ultimo;$i++) {
                yield $f->fibonacci($i) . " ";
            }
        }

        //Las funciones usadas, son propias de php
        //Como funciona: 
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
            $this->_claveActual=0;
        }
        //devuelve el contenido correspondiente a la posición actual
        public function current():mixed {
           return $this-> fibonacci($this->_claveActual);
            }

        public function key(): mixed
        {
            return $this->_claveActual;
        }
        public function next(): void
        {
            $this->_claveActual++;
        }
        public function valid():bool{
            if($this->_claveActual<=$this->_limite){ 
                return true;
            }else{
                return false;
        }
        }

    }
?>