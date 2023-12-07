<?php
 require_once("../../componentes/modal.php");
require_once '../../model/Mensagem.php';
require_once '../../dao/AgendamentoDao.php';
if (!empty($_POST)) {
    $cod_Agendamento = $agendamentoDao['codAgendamento'];
    $data_Agendamento = $agendamentoDao['dataAgendamento'];
    $hora_Agendamento = $agendamentoDao['horaAgendamento'];
    $cod_Servico = $agendamentoDao['codServico'];
    $cod_Cliente = $agendamentoDao['codCliente'];
} else {
    $cod_Agendamento = '';
    $data_Agendamento = '';
    $hora_Agendamento = '';
    $cod_Servico = '';
    $cod_Cliente = '';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cherry Estética - Agendamento</title>
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

    <?php include('./../../componentes/navbar-adm.php'); ?>

    <div class="container-fluid" style="height: 90vh">
        <div class="row h-100">
            <?php include('./../../componentes/menu-adm.php'); ?>

            <div class="col-md-10  p-4 borber">
                <div class="card">
                    <form method="post" action="process.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="card-header">
                            <strong>REGISTRAR AGENDAMENTO</strong>
                            <input type="hidden" value="<?= $cod_Agendamento ? 'ATUALIZAR' : 'SALVAR' ?>" name="acao">
                            <input type="hidden" name="codAgendamento" id="codAgendamento" placeholder="id" value="<?= $cod_Agendamento ?>">
                            <input type="hidden" name="codServico" id="codServico" placeholder="id" value="<?= $cod_Servico ?>">
                            <input type="hidden" name="codCliente" id="codCliente" placeholder="id" value="<?= $cod_Cliente ?>">
                        </div>
                        <div class="card-body row justify-content-center align-items-center">
                            <div class="form-group">
                                <label>Data</label>
                                <input name="dataAgendamento" type="date" class="form-control" value="<?= $data_Agendamento ?>">
                            </div>
                            <div class="form-group">
                                <label>Hora</label>
                                <input name="horaAgendamento" type="time" class="form-control" value="<?= $hora_Agendamento ?>">
                            </div>
                        </div>
                        <div class="text-end p-3">
                            <a class="btn btn-primary px-3" role="button" aria-disabled="true" href="index.php">Voltar</a>
                            <input type="submit" class="btn btn-success" value="SALVAR">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
  </script>
  <!-- Para usar Mascara  -->
  <script type="text/javascript" src="./../../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="./../../js/personalizar.js"></script>
  <script type="text/javascript" src="./../../js/modal.js"></script>

</html>