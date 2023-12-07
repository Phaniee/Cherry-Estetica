<?php
require_once '../../model/Depoimento.php';
require_once '../../dao/DepoimentoDao.php';
require_once '../../model/Mensagem.php';

$depoimento = new Depoimento();
$msg = new Mensagem();

switch ($_POST["acao"]) {
    case 'DELETE':
     try {
          $depoimentoDao = DepoimentoDao::delete($_POST['id']);
          header("Location: index.php");
      } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
    case 'SALVAR':
        //pode validar as informações 
        $depoimento->setCod($_POST['codDepoimentoCliente']);
        $depoimento->setTitulo($_POST['tituloDepoimentoCliente']);
        $depoimento->setTexto($_POST['textoDepoimentoCliente']);
        $depoimento->setCategoria($_POST['categoriaDepoimentoCliente']);
        $depoimento->setCliente($_POST['nomeCliente']);
        try {
            $depoimentoDao = DepoimentoDao::insert($depoimento);
            $msg->setMensagem("Usuário Salvo com sucesso.", "bg-success");
            header("Location: index.php");
          } catch (Exception $e) {
           // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            $msg->setMensagem("Verifique os dados Digitados.", "bg-danger");
            header("Location: register.php");
          } 
          break;
    case 'ATUALIZAR':
              //pode validar as informações
           $depoimento->setTitulo($_POST['tituloDepoimentoCliente']);
              $depoimento->setTexto($_POST['textoDepoimentoCliente']);
              $depoimento->setCategoria($_POST['categoriaDepoimentoCliente']);
              $depoimento->setCliente($_POST['nomeCliente']);
              try {
                $depoimentoDao = DepoimentoDao::update($_POST["codDepoimentoCliente"], $depoimento);
                $msg->setMensagem("Usuário Atualizado com sucesso.", "bg-success");
                header("Location: index.php");
              } catch (Exception $e) {
               echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      
              } 
          break; 
      
    case 'SELECTID':
      
          try {
              $depoimentoDao = DepoimentoDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }
?>