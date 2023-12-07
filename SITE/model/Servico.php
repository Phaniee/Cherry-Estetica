<?php 
    class Servico{
        public $cod, $nome, $valor, $duracao, $descricao, $imagem, $token;

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
        public function getValor(){
            return $this->valor;
        }
        public function setValor($valor){
            $this-> valor = $valor;
        }
        public function getDuracao(){
            return $this->duracao;
        }
        public function setDuracao($duracao){
            $this-> duracao = $duracao;
        }
        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this-> descricao = $descricao;
        }
        public function getImagem(){
            return $this->imagem;
        }
        public function setImagem($imagem){
            $this-> imagem = $imagem;
        }

        public function getToken(){
            return $this->token;
        }
        public function setToken($token){
            $this-> token = $token;
        }

        public function generateToken(){
            return bin2hex((random_bytes(16)));
        }

        public function salvarImagem($novo_nome){
            if(empty($_FILES['foto']['size']) != 1){
                if($novo_nome == ""){
                    $novo_nome = md5(time()). ".jpg";
                }
                $diretorio = "../../img/tratamentos/";
                $nomeCompleto = $diretorio.$novo_nome;
                move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
                return $novo_nome;
            }
            else{
                return $novo_nome;
            }
        }
    }




?>