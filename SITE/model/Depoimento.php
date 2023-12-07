<?php 
    class Depoimento{
        public $cod, $titulo, $texto, $categoria, $cliente;

        public function getCod(){
            return $this->cod;
        }
        public function setCod($cod){
            $this-> cod = $cod;
        }

        public function getTitulo(){
            return $this->titulo;
        }
        public function setTitulo($titulo){
            $this-> titulo = $titulo;
        }
        public function getTexto(){
            return $this->texto;
        }
        public function setTexto($texto){
            $this-> texto = $texto;
        }
        public function getCategoria(){
            return $this->categoria;
        }
        public function setCategoria($categoria){
            $this-> categoria = $categoria;
        }
        public function getCliente(){
            return $this->cliente;
        }
        public function setCliente($cliente){
            $this-> cliente = $cliente;
        }
      
    }




?>