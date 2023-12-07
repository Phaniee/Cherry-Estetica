<?php 
    class Cliente{
        public $cod, $nome, $tel, $cpf, $nasc, $sexo, $logradouro, $numLog, $bairro, $cidade, $uf, $cep, $email, $senha;
        
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

        public function getTel(){
            return $this->tel;
        }
        public function setTel($tel){
            $this-> tel = $tel;
        }

        public function getCpf(){
            return $this->cpf;
        }
        public function setCpf($cpf){
            $this-> cpf = $cpf;
        }

        public function getNasc(){
            return $this->nasc;
        }
        public function setNasc($nasc){
            $this-> nasc = $nasc;
        }

        public function getSexo(){
            return $this->sexo;
        }
        public function setSexo($sexo){
            $this-> sexo = $sexo;
        }

        public function getlogradouro(){
            return $this->logradouro;
        }
        public function setLogradouro($logradouro){
            $this-> logradouro = $logradouro;
        }

        public function getNumLog(){
            return $this->numLog;
        }
        public function setNumLog($numLog){
            $this-> numLog = $numLog;
        }

        public function getBairro(){
            return $this->bairro;
        }
        public function setBairro($bairro){
            $this-> bairro = $bairro;
        }

        public function getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidade){
            $this-> cidade = $cidade;
        }

        public function getUf(){
            return $this->uf;
        }
        public function setUf($uf){
            $this-> uf = $uf;
        }

        public function getCep(){
            return $this->cep;
        }
        public function setCep($cep){
            $this-> cep = $cep;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this-> email = $email;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this-> senha = $senha;
        }

        /*public function salvarImagem($novo_nome){
            if(empty($_FILES['foto']['size']) != 1){
                if($novo_nome == ""){
                    $novo_nome = md5(time()). ".jpg";
                }
                $diretorio = "../../img/user/";
                $nomeCompleto = $diretorio.$novo_nome;
                move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
                return $novo_nome;
            }
            else{
                return $novo_nome;
            }
        }*/
    }




?>