
<?php
require_once '../../model/Cliente.php';
require_once '../../dao/ClienteDao.php';
require_once '../../model/Mensagem.php';

$cliente = new CLiente();
$msg = new Mensagem();

switch ($_POST["acao"]) {
    case 'DELETE':
     try {
          $clienteDao = ClienteDao::delete($_POST['id']);
          header("Location: index.php");
      } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
    case 'SALVAR':
        //pode validar as informações 
       
        $cliente->setEmail($_POST['emailCliente']);
        $cliente->setSenha($_POST['senhaEmailCliente']);
        try {
            $clienteDao = ClienteDao::insert($cliente);
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
             
                $cliente->setEmail($_POST['emailCliente']);
                $cliente->setSenha($_POST['senhaEmailCliente']);
              try {
                $clienteDao = ClienteDao::updateParcial($_POST["codCliente"], $cliente);
                $msg->setMensagem("Usuário Atualizado com sucesso.", "bg-success");
                header("Location: index.php");
                //echo "<pre>" ."chegamos aqui";
                // var_dump($cliente);
              } catch (Exception $e) {
               echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      
              } 
          break; 
      
    case 'SELECTID':
      
          try {
              $clienteDao = ClienteDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }


        
?>