<?php

require_once '../model/Contato.php';
require_once '../dao/ContatoDao.php';
require_once '../model/Mensagem.php';

$contato = new Contato();
$msg = new Mensagem();

switch ($_POST["acao"]) {
    
    case 'SALVAR':
      
        //pode validar as informações 
        $contato->setCod($_POST['codContato']);
        $contato->setNome($_POST['nomeContato']);
        $contato->setEmail($_POST['emailContato']);
        $contato->setCategoria($_POST['categoriaContato']);
        $contato->setComentario($_POST['comentarioContato']);
        try {
            $contatoDao = ContatoDao::insert($contato);
            $msg->setMensagem("Contato enviado com sucesso.", "bg-success");
            header("Location: contato.php");
          } catch (Exception $e) {
           // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            $msg->setMensagem("Verifique os dados Digitados.", "bg-danger");
            header("Location: contato.php");
          } 
          break;
      
    case 'SELECTID':
      
          try {
              $contatoDao = ContatoDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('contato.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }
?>