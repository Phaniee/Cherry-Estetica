<?php
require_once '../dao/ServicoDao.php';
require_once '../dao/AgendamentoDao.php';
require_once '../model/Mensagem.php';


// Verifique se o parâmetro está definido
if (isset($_GET['codServico'])) {
    $codServico = $_GET['codServico'];
    $Servico = ServicoDao::selectById($codServico);
} else {
    // Redirecione ou manipule o erro de acordo com a sua lógica
    header("Location: pagina_de_erro.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <title>Agendamento</title>
    <style>
        body {
            background-color: #aec492;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
        }

        .img-container {
            position: relative;
            max-height: 400px;
            overflow: hidden;
        }

        .img-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .descricao-container {
            padding: 20px;
            text-align: justify;
        }

        h1,
        h6 {
            color: white;
        }

        .form-container {
            max-width: 600px;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    // Verificar se o usuário está autenticado
    if (isset($_SESSION['Autenticado']) && $_SESSION['Autenticado'] === "SIM") {
        // Usuário autenticado, incluir navbarLogado.php
        $authCliente = $_SESSION['usuario'];
        include '../componentes/navbarLogado.php';
    } else {
        // Usuário não autenticado, incluir navbar.php
        include '../componentes/navbar.php';
    }
    ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="img-container">
                    <img src="../img/tratamentos/<?= $Servico['imagemServico']; ?>" alt="<?= $Servico['nomeServico']; ?>" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="descricao-container">
                    <h1><?= $Servico['nomeServico']; ?></h1>
                    <h6>Duração: <?= $Servico['duracaoServico']; ?> min.</h6>
                    <h6>Valor: <?= $Servico['valorServico']; ?> </h6>
                    <p><?= $Servico['descricaoServico']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container form-container mt-4">
        <h3 class="text-white">Agendamento</h3>
        <form method="post" action="./agendamentoProcess.php">
            <!-- Adicione campos de formulário conforme necessário -->
            <div class="mb-3">
                <input type="hidden" name="codAgendamento" id="codAgendamento" placeholder="cod">
                <label for="data" class="form-label text-white">Data</label>
                <input type="date" class="form-control" id="data" name="dataAgendamento" required>
            </div>
            <div class="mb-3">
                <label for="hora" class="form-label text-white">Hora</label>
                <input type="time" class="form-control" id="hora" name="horaAgendamento" required>
            </div>
            <!-- Adicione um campo oculto para enviar o código do serviço -->
            <input type="hidden" name="codServico" value="<?= $codServico ?>">
            <!-- Adicione um campo oculto para enviar o código do cliente -->
            <input type="hidden" name="codCliente" value="<?= $authCliente['codCliente'] ?>">
            <button type="submit" class="btn btn-primary" id="acao" name="acao" value="SALVAR">Agendar</button>
        </form>
        <?php
        require_once("../componentes/modal.php");
        ?>
    </div>

    <div class="modal fade" id="modalAvisoLogin" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Você precisa estar logado para agendar um serviço. Por favor, faça login ou crie uma conta.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                // Verificar se o usuário está logado
                <?php if (!isset($_SESSION['Autenticado']) || $_SESSION['Autenticado'] !== 'SIM') : ?>
                    // Se não estiver logado, impedir o envio do formulário
                    event.preventDefault();
                    // Exibir o modal de aviso
                    $('#modalAvisoLogin').modal('show');
                <?php endif; ?>
            });
        });
    </script>
    <?php include '../componentes/footer.php'; ?>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
    </script>
    <!-- Para usar Mascara  -->
    <script type="text/javascript" src="./../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="./../js/personalizar.js"></script>
    <script type="text/javascript" src="./../js/modal.js"></script>

</html>
