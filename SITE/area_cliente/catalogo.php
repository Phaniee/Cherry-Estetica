<?php
require_once '../dao/ServicoDao.php';
$servicos = ServicoDao::selectAll();
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
    <title>Serviços</title>
    <style>
        .custom-card {
            height: 100%;
            /* Defina a altura desejada para todos os cards */
        }
    </style>
</head>

<body style="background-color:#aec492; min-height: 100vh;">
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
    <div class="container mt-4 flex-grow-1">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" style="display: flex; flex-direction: row; justify-content:center; padding-bottom: 25px">
            <?php foreach ($servicos as $Servico) : ?>
                <div class="col">
                    <div class="card mb-4 custom-card">
                        <!-- Conteúdo do card dinâmico -->
                        <img src="../img/tratamentos/<?= $Servico['imagemServico']; ?>" alt="" class="img-fluid card-img-top">
                        <div class="p-4">
                            <h5 class="card-title"><?= $Servico['nomeServico']; ?></h5>
                            <p class="small text-muted mb-2" style="text-align:justify"><?= $Servico['descricaoServico']; ?></p>
                            <p class="small text-muted mb-1"><span class="fw-bold">Valor:</span> <?= $Servico['valorServico']; ?></p>
                            <p class="small text-muted mb-1"><span class="fw-bold">Duração:</span> <?= $Servico['duracaoServico']; ?></p>
                        </div>
                        <div class="  text-center  justify-content-center d-flex align-items-center pb-3">
                            <a class="btn btn-outline-secondary"  href="agendamento.php?codServico=<?=$Servico['codServico']?>" role="button">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include '../componentes/footer.php'; ?>
</body>

</html>