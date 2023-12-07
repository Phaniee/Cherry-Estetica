<?php
require_once '../../model/User.php';
require_once '../../dao/UserDao.php';
require_once '../../model/Mensagem.php';

$user = new User();
$msg = new Mensagem();

switch ($_POST["acao"]) {
    case 'DELETE':
     try {
          $userDao = UserDao::delete($_POST['id']);
          header("Location: index.php");
      } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
      case 'SALVAR':
        //pode validar as informações 
        $user->setCod($_POST['codUser']);
        $user->setNome($_POST['nomeUser']);
        $user->setSobrenome($_POST['sobrenomeUser']);
        $user->setCpf($_POST['cpfUser']);
        $user->setNasc($_POST['nascUser']);
        $user->setEmail($_POST['emailUser']);
        $user->setPassword($_POST['passwordUser']);

        $user->setImagem($user->salvarImagem(($_POST['imagemUser'])));
        $user->setToken($user->generateToken());
        try {
            $userDao = UserDao::insert($user);
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
              $user->setNome($_POST['nomeUser']);
              $user->setSobrenome($_POST['sobrenomeUser']);
              $user->setCpf($_POST['cpfUser']);
              $user->setNasc($_POST['nascUser']);
              $user->setEmail($_POST['emailUser']);
              $user->setPassword($_POST['passwordUser']);
              $user->setImagem($user->salvarImagem($_POST['imagemUser'])); 
              $user->setToken($user->generateToken());
              try {
                $userDao = UserDao::update($_POST["codUser"], $user);
                $msg->setMensagem("Usuário Atualizado com sucesso.", "bg-success");
                header("Location: index.php");
              } catch (Exception $e) {
               echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      
              } 
          break;
      
        case 'SELECTID':
      
          try {
              $userDao = UserDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }
?>