<?php 
 require_once '../../dao/ClienteDao.php';
 require_once '../../dao/AgendamentoDao.php';
 require_once '../../dao/ServicoDao.php';
 $totalClientes = ClienteDao::getTotalClientes();
 $totalServicos = ServicoDao::getTotalServicos();
 $totalAgendamento = AgendamentoDao::getTotalAgendamentos();
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
  // Iniciar a sessão
  session_start();

  // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
  if (!isset($_SESSION['AutenticaoAdm']) || $_SESSION['AutenticaoAdm'] != 'SIM') {
    // Redirecionar para o login com um erro2 se não estiver autenticado
    header('Location: login.php?login=erro2');
    exit();
  }

  //o usuário está autenticado
  $authUser = $_SESSION['userAdm'];

  ?>

  <?php
  include('./../../componentes/navbar-adm.php');//navbar do adm que está nos componentes
  ?>

  <div class="container-fluid" style="height: 90vh">
    <div class="row h-100">
      <?php
      include('./../../componentes/menu-adm.php');//menu lateral com itens para o adm acessar
      ?>
      <div class="col-md-10  p-4 borber">
        <div class="row align-items-center mb-4">
          <div class="col fs-3 fw-semibold">
            Dashboard - Home
          </div>
        </div>
        <div class="row">
       
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total de Clientes</h5>
                <p class="card-text"><?php echo $totalClientes; ?></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total de Agendamentos</h5>
                <p class="card-text"><?php echo $totalAgendamento; ?></p>
              </div>
            </div>
          </div>
        
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Serviços Cadastrados</h5>
                <p class="card-text"><?php echo $totalServicos; ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html>