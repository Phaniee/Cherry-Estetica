<?php

require_once '../../model/Agendamento.php';
require_once '../../dao/AgendamentoDao.php';
require_once '../../model/Mensagem.php';

$agendamento = new Agendamento();
$msg = new Mensagem();

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
            $agendamento->setData($_POST['dataAgendamento']);
            $agendamento->setHora($_POST['horaAgendamento']);
            $agendamento->setCodServico($_POST['codServico']);
            $agendamento->setCodCliente($_POST['codCliente']);

            AgendamentoDao::insert($agendamento);
            $msg->setMensagem("Agendamento realizado com sucesso.", "bg-success");
            break;

        case 'ATUALIZAR':
            $agendamento->setData($_POST['dataAgendamento']);
            $agendamento->setHora($_POST['horaAgendamento']);
            $agendamento->setCodServico($_POST['codServico']);
            $agendamento->setCodCliente($_POST['codCliente']);

            try {
                $agendamentooDao = AgendamentoDao::update($_POST["codAgendamento"], $agendamento);
                $msg->setMensagem("Agendamento Atualizado com sucesso.", "bg-success");
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