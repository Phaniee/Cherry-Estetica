<?php
require_once("../../componentes/modal.php");
require_once '../../dao/ClienteDao.php';
if (!empty($_POST)) {
  $cod_Cliente = $clienteDao['codCliente'];
  $nome_Cliente =  $clienteDao['nomeCliente'];
  $tel_Cliente = $clienteDao['telCliente'];
  $cpf_Cliente = $clienteDao['cpfCliente'];
  $data_Nascimento_Cliente = $clienteDao['dataNascimentoCliente'];
  $sexo_Cliente = $clienteDao['sexoCliente'];
  $logradouro_Cliente = $clienteDao['logradouroCliente'];
  $num_Log_Cliente = $clienteDao['numLogCliente'];
  $bairro_Cliente = $clienteDao['bairroCliente'];
  $cidade_Cliente = $clienteDao['cidadeCliente'];
  $uf_Cliente = $clienteDao['ufCliente'];
  $cep_Cliente = $clienteDao['cepCliente'];
  $email_Cliente = $clienteDao['emailCliente'];
  $senha_Email_Cliente = $clienteDao['senhaEmailCliente'];
} else {
  $cod_Cliente = '';
  $nome_Cliente =  '';
  $tel_Cliente = '';
  $cpf_Cliente = '';
  $data_Nascimento_Cliente = '';
  $sexo_Cliente = '';
  $logradouro_Cliente = '';
  $num_Log_Cliente = '';
  $bairro_Cliente = '';
  $cidade_Cliente = '';
  $uf_Cliente = '';
  $cep_Cliente = '';
  $email_Cliente = '';
  $senha_Email_Cliente = '';
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cherry Estética - Adm</title>
  <link rel="short icon" href="./../../img/site/logo.png" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="justify-content: center; align-items: center; height: 100vh ">
<?php
 
 $authUser = $_SESSION['userAdm'];
 ?>
  <?php
  include('./../../componentes/navbar-adm.php');
  ?>
  <div class="container-fluid" style="height: 90vh">
    <div class="row h-100">
      <?php
      include('./../../componentes/menu-adm.php');
      ?>
      <div class="col-md-10  p-4 borber">
        <div class="card">
          <form method="post" action="process.php" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="card-header">
              <strong>VISUALIZAR CLIENTES</strong>
              <input type="hidden" value="<?= $cod_Cliente ? 'ATUALIZAR' : 'SALVAR' ?>" name="acao">
              <input type="hidden" name="codCliente" id="codCliente" placeholder="id" value="<?= $cod_Cliente ?>">
            </div>
            <div class="card-body row justify-content-center align-items-center">
              <div class="row g-3">
                <div class="form-group col-md-4">
                  <label>Nome</label>
                  <input name="nomeCliente" type="text" class="form-control" placeholder="Nome" value="<?= $nome_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label>Telefone</label>
                  <input name="telCliente" type="text" class="form-control" placeholder="Telefone" value="<?= $tel_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label>CPF</label>
                  <input name="cpfCliente" type="text" class="form-control" placeholder="CPF" value="<?= $cpf_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-2">
                  <label>Data de Nascimento</label>
                  <input name="dataNascimentoCliente" type="text" class="form-control" placeholder="Data de Nascimento" value="<?= $data_Nascimento_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-2">
                  <label>Sexo</label>
                  <select name="sexoCliente" class="form-control" disabled>
                    <option value="M" <?= $sexo_Cliente == 'M' ? 'selected' : '' ?>>Masculino</option>
                    <option value="F" <?= $sexo_Cliente == 'F' ? 'selected' : '' ?>>Feminino</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Logradouro</label>
                  <input name="logradouroCliente" type="text" class="form-control" placeholder="Logradouro" value="<?= $logradouro_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-2">
                  <label>Número</label>
                  <input name="numLogCliente" type="text" class="form-control" placeholder="Número" value="<?= $num_Log_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-2">
                  <label>Bairro</label>
                  <input name="bairroCliente" type="text" class="form-control" placeholder="Bairro" value="<?= $bairro_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label>Cidade</label>
                  <input name="cidadeCliente" type="text" class="form-control" placeholder="Cidade" value="<?= $cidade_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label>UF</label>
                  <input name="ufCliente" type="text" class="form-control" placeholder="UF" value="<?= $uf_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label>CEP</label>
                  <input name="cepCliente" type="text" class="form-control" placeholder="CEP" value="<?= $cep_Cliente ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input name="emailCliente" type="text" class="form-control" placeholder="Email" value="<?= $email_Cliente ?>">
                </div>
                <div class="form-group col-md-4">
                  <label>Senha Email</label>
                  <input name="senhaEmailCliente" type="password" class="form-control" placeholder="Senha Email" value="<?= $senha_Email_Cliente ?>" id="password">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()">
                    <label class="form-check-label" for="gridCheck">
                      Mostrar senha
                    </label>
                  </div>
                </div>

                <script>
                  function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>

              </div>
              <div class=" text-end p-3">
                <a class=" btn btn-primary px-3" role="button" aria-disabled="true" href="index.php">Voltar</i></a>
                <input type="submit" class=" btn btn-success" value="SALVAR">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <?= require '../../componentes/modal.php'?>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
  </script>
  <!-- Para usar Mascara  -->
  <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../../js/personalizar.js"></script>
</body>

</html>