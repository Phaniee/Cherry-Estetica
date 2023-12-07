<?php

require_once '../model/Agendamento.php';
require_once '../dao/AgendamentoDao.php';
require_once '../model/Mensagem.php';

$agendamento = new Agendamento();
$msg = new Mensagem();
//var_dump($_POST);

switch ($_POST["acao"]) {
    case 'DELETE':
     try {
          $agendamentoDao = AgendamentoDao::delete($_POST['id']);
          header("Location: index.php");
      } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
      case 'SALVAR':
        // Pode validar as informações
        $agendamento->setData($_POST['dataAgendamento']);
        $agendamento->setHora($_POST['horaAgendamento']);
        $agendamento->setCodServico($_POST['codServico']);
        $agendamento->setCodCliente($_POST['codCliente']);

        try {
            $agendamentoDao = AgendamentoDao::insert($agendamento);
            $msg->setMensagem("Agendamento realizado com sucesso.", "bg-success");
            header("Location: agendamento.php?codServico=" . $_POST['codServico']);
            exit(); // Importante sair após o redirecionamento
        } catch (Exception $e) {
            $msg->setMensagem("Erro ao agendar. Verifique os dados digitados.", "bg-danger");
            header("Location: agendamento.php?codServico=" . $_POST['codServico']);
            exit(); // Importante sair após o redirecionamento
        }
        break;
    case 'ATUALIZAR':
        //pode validar as informações
        $agendamento->setData($_POST['dataAgendamento']); // Seu formulário precisa ter um campo 'data'
        $agendamento->setHora($_POST['horaAgendamento']); // Seu formulário precisa ter um campo 'hora'
        $agendamento->setCodServico($_POST['codServico']);
        $agendamento->setCodCliente($_POST['codCliente']);
        try {
            $agendamentoDao = AgendamentoDao::update($_POST["codAgendamento"], $agendamento);
            //$msg->setMensagem("Usuário Atualizado com sucesso.", "bg-success");
            header("Location: index.php");
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        } 
          break; 
      
    case 'SELECTID':
      
          try {
              $agendamentoDao = AgendamentoDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }
?>