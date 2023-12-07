<?php
require_once '../../model/Contato.php';
require_once '../../dao/ContatoDao.php';
require_once '../../model/Mensagem.php';

$contato = new Contato();
$msg = new Mensagem();

switch ($_POST["acao"]) {
    case 'DELETE':
     try {
          $contatoDao = ContatoDao::delete($_POST['id']);
          header("Location: index.php");
      } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
    case 'SALVAR':
        //pode validar as informações 
        $contato->setCod($_POST['codContato']);
        $contato->setNome($_POST['nomeContato']);
        $contato->setEmail($_POST['emailContato']);
        $contato->setCategoria($_POST['categoriaContato']);
        $contato->setComentario($_POST['comentarioContato']);
        try {
            $contatoDao = ContatoDao::insert($contato);
            $msg->setMensagem("Usuário Salvo com sucesso.", "bg-success");
            header("Location: index.php");
          } catch (Exception $e) {
           // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            $msg->setMensagem("Verifique os dados Digitados.", "bg-danger");
            header("Location: register.php");
          } 
          break;
    case 'ATUALIZAR':
      //var_dump($contato);
              //pode validar as informações
              $contato->setNome($_POST['nomeContato']);
              $contato->setEmail($_POST['emailContato']);
              $contato->setCategoria($_POST['categoriaContato']);
              $contato->setComentario($_POST['comentarioContato']);
              try {
                $contatoDao = ContatoDao::update($_POST["codContato"], $contato);
                $msg->setMensagem("Usuário Atualizado com sucesso.", "bg-success");
                header("Location: index.php");
              } catch (Exception $e) {
               echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      
              } 
          break; 
      
    case 'SELECTID':
      
          try {
            $contatoDao = ContatoDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }
?>