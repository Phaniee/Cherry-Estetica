<?php

    class Agendamento{
        public $cod, $data, $hora, $codServico,$codCliente,$codPagamento;

        public function getCod(){
            return $this->cod;
        }
        public function setCod($cod){
            $this->cod = $cod;
        }

        public function getData(){
            return $this->data;
        }
        public function setData($data){
            $this->data = $data;
        }

        public function getHora(){
            return $this->hora;
        }
        public function setHora($hora){
            $this->hora = $hora;
        }

        public function getCodServico(){
            return $this->codServico;
        }
        public function setCodServico($codServico){
            $this->codServico = $codServico;
        }

        public function getCodCliente(){
            return $this->codCliente;
        }
        public function setCodCliente($codCliente){
            $this->codCliente = $codCliente;
        }


    }
?>