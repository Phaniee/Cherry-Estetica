<?php 
    class Contato{
        public $cod, $nome, $email, $categoria, $comentario;

        public function getCod(){
            return $this->cod;
        }
        public function setCod($cod){
            $this-> cod = $cod;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this-> nome = $nome;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this-> email = $email;
        }
        public function getCategoria(){
            return $this->categoria;
        }
        public function setCategoria($categoria){
            $this-> categoria = $categoria;
        }
        public function getComentario(){
            return $this->comentario;
        }
        public function setComentario($comentario){
            $this-> comentario = $comentario;
        }
      
    }




?>