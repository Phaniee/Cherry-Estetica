<?php 
    require_once '../dao/DepoimentoDao.php'; 
    $depoimentos = DepoimentoDao::selectAll();
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
    <title>depoimento</title>
    <style>
        .custom-card {
            height: 80%; /* Defina a altura desejada para todos os cards */
        }
    </style>
</head>

<body style="background-color: #aec492;">
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

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <img src="../img/componentes/depoimentos.png" width="100%" class="d-inline-block align-center" alt="mulheres conversando">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <h1 class="text-center" style="font-family: 'Alex Brush', cursive;font-size: 30px;color: black;font-weight: bold;">Depoimentos de Clientes</h1>
                    <div class="container" style="text-align: justify;">
                        <p>Aqui, damos voz às experiências autênticas dos nossos valiosos clientes. Cada depoimento é um testemunho da transformação e confiança que a Cherry Estética proporciona. Convidamo-lo a explorar essas histórias inspiradoras, celebrando a beleza única de cada indivíduo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <?php foreach ($depoimentos as $Depoimento): ?>
                <div class="col-md-6">
                    <div class="card m-3 custom-card">
                        <div class="card-header">
                            <?= $Depoimento['tituloDepoimentoCliente']; ?>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p><?= $Depoimento['textoDepoimentoCliente']; ?></p>
                                <footer class="blockquote-footer"><?= $Depoimento['nomeCliente']; ?></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include '../componentes/footer.php'; ?>
</body>

</html>
