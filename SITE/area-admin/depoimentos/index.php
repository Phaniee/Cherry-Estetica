<?php 
  require_once '../../dao/DepoimentoDao.php'; 
  $depoimentos = DepoimentoDao::selectAll();
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

  // Agora, o usuário está autenticado, então você pode acessar as informações do usuário na sessão
  $authUser = $_SESSION['userAdm'];
  ?>
  <?php 
      include('./../../componentes/navbar-adm.php');

  //parte visual da tabela de usuário
  ?>
  <div class="container-fluid" style="height: 90vh">
    <div class="row h-100">
      <?php 
      include('./../../componentes/menu-adm.php');
      ?>
      <div class="col-md-10  p-4 borber">
        <div class="row align-items-center mb-4">
          <div class="col fs-4 fw-semibold">
            Lista de Depoimentos - Cherry Estética
          </div>
          <div class="col text-end ">
            <a class="btn btn-success px-3" role="button" aria-disabled="true" href="register.php"><i
                class="fas fa-plus" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class=" row">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-2">Titulo</th>
                <th class="col-md-4">Depoimento</th>
                <th class="col-md-2">Categoria</th>
                <th class="col-md-2">Cliente</th>
                <th class="text-center col-md-2">Alterar</th>
                <th class="text-center col-md-2">Excluir</th>
              </tr>
              <?php foreach($depoimentos as $Depoimento): ?>
             <tr> 
              <td><?=$Depoimento['codDepoimentoCliente'];?></td>
              <td><?=$Depoimento['tituloDepoimentoCliente'];?></td>
              <td><?=$Depoimento['textoDepoimentoCliente'];?></td>
              <td><?=$Depoimento['categoriaDepoimentoCliente'];?></td>
              <td><?=$Depoimento['nomeCliente'];?></td>
              <td class="text-center">
                  <form action="process.php" method="POST">
                    <input type="hidden" class="form-control" id="acao" name="acao" value="SELECTID">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$Depoimento['codDepoimentoCliente']?>">
                    <button type="submit" class="dropdown-item"><i class="fas fa-edit fa-lg text-secondary"></i>
                    </button>
                  </form>
                </td>
                <td class="text-center">
                  <a class="dropdown-item" onclick="modalRemover(<?=$Depoimento['codDepoimentoCliente']?>,'idDeletar')">
                    <i class="fas fa-trash-alt fa-lg text-danger"></i>
                  </a>
                </td>
            </tr>
            <?php endforeach; ?>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalExcluir" role="dialog">
    <div class=" modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Depoimento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  ">
          <form action="process.php" method="post">
            <input type="text" class="form-control" id="idDeletar" name="id" type="text">
            <p>Tem certeza que deseja excluir o item selcionado?
            <div class=" text-end">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
              <button type="submit" class="btn btn-warning ms-3" value="DELETE" name="acao">Sim </button>
                        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?= require './../../componentes/modal.php'?>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
  </script>
  <!-- Para usar Mascara  -->
  <script type="text/javascript" src="./../../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="./../../js/personalizar.js"></script>
  <script type="text/javascript" src="./../../js/modal.js"></script>
</body>

</html>