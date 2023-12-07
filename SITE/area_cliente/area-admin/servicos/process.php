<?php
require_once '../../model/Servico.php';
require_once '../../model/Mensagem.php';
require_once '../../dao/ServicoDao.php';

$servico = new Servico();
$msg = new Mensagem();

switch ($_POST["acao"]) {
    case 'DELETE':
     try {
          $servicoDao = ServicoDao::delete($_POST['id']);
          header("Location: index.php");
      } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
    case 'SALVAR':
        //pode validar as informações 
        $servico->setCod($_POST['codServico']);
        $servico->setNome($_POST['nomeServico']);
        $servico->setValor($_POST['valorServico']);
        $servico->setDuracao($_POST['duracaoServico']);
        $servico->setDescricao($_POST['descricaoServico']);
        $servico->setImagem($servico->salvarImagem(($_POST['imagemServico'])));
        $servico->setToken( $servico->generateToken());
        try {
            $servicoDao = ServicoDao::insert($servico);
            $msg->setMensagem("Serviço Salvo com sucesso.", "bg-success");
            header("Location: index.php");
          } catch (Exception $e) {
           // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            $msg->setMensagem("Verifique os dados Digitados.", "bg-danger");
            header("Location: register.php");
          } 
          break;
    case 'ATUALIZAR':
              //pode validar as informações
            $servico->setNome($_POST['nomeServico']);
            $servico->setValor($_POST['valorServico']);
            $servico->setDuracao($_POST['duracaoServico']);
            $servico->setDescricao($_POST['descricaoServico']);
            $servico->setImagem($servico->salvarImagem(($_POST['imagemServico'])));
            $servico->setToken( $servico->generateToken());
              try {
                $servicoDao = ServicoDao::update($_POST["codServico"], $servico);
                $msg->setMensagem("Serviço Atualizado com sucesso.", "bg-success");
                header("Location: index.php");
              } catch (Exception $e) {
               echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      
              } 
          break; 
      
    case 'SELECTID':
      
          try {
              $servicoDao = ServicoDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }
?>