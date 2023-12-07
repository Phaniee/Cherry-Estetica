
<?php
require_once '../model/Cliente.php';
require_once '../dao/ClienteDao.php';
require_once '../model/Mensagem.php';

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
        $cliente->setCod($_POST['codCliente']);
        $cliente->setNome($_POST['nomeCliente']);
        $cliente->setTel($_POST['telCliente']);
        $cliente->setCpf($_POST['cpfCliente']);
        $cliente->setNasc($_POST['dataNascimentoCliente']);
        $cliente->setSexo($_POST['sexoCliente']);
        $cliente->setLogradouro($_POST['logradouroCliente']);
        $cliente->setNumLog($_POST['numLogCliente']);
        $cliente->setBairro($_POST['bairroCliente']);
        $cliente->setCidade($_POST['cidadeCliente']);
        $cliente->setUf($_POST['ufCliente']);
        $cliente->setCep($_POST['cepCliente']);
        $cliente->setEmail($_POST['emailCliente']);
        $cliente->setSenha($_POST['senhaEmailCliente']);
        try {
            $clienteDao = ClienteDao::insert($cliente);
            $msg->setMensagem("Usuário Salvo com sucesso.", "bg-success");
            header("Location: login.php");
          } catch (Exception $e) {
           // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            $msg->setMensagem("Verifique os dados Digitados.", "bg-danger");
            header("Location: cadastro.php");
          } 
          break;
    case 'ATUALIZAR':
              //pode validar as informações
                $cliente->setNome($_POST['nomeCliente']);
                $cliente->setTel($_POST['telCliente']);
                $cliente->setCpf($_POST['cpfCliente']);
                $cliente->setNasc($_POST['dataNascimentoCliente']);
                $cliente->setSexo($_POST['sexoCliente']);
                $cliente->setLogradouro($_POST['logradouroCliente']);
                $cliente->setNumLog($_POST['numLogCliente']);
                $cliente->setBairro($_POST['bairroCliente']);
                $cliente->setCidade($_POST['cidadeCliente']);
                $cliente->setUf($_POST['ufCliente']);
                $cliente->setCep($_POST['cepCliente']);
                $cliente->setEmail($_POST['emailCliente']);
                $cliente->setSenha($_POST['senhaEmailCliente']);
              try {
                $clienteDao = ClienteDao::update($_POST["codCliente"], $cliente);
                //$msg->setMensagem("Usuário Atualizado com sucesso.", "bg-success");
                header("Location: index.php");
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