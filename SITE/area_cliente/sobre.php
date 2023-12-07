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
    <title>Cadastro Cliente</title>
    <style>
        body {
            background-color: #aec492;
        }

        #beleza {
            border-radius: 10%;
        }

        @media (max-width: 768px) {
            #beleza {
                width: 100%;
                border-radius: 0;
                margin-bottom: 15px;
            }
        }

        .article-container {
            background-color: #aec492;
            padding: 20px;
            border-radius: 10px;
            color: black;
            text-align: justify;
            margin-top: 20px; /* Ajuste a margem superior conforme necessário */
        }

        /* Estilo para o footer ficar no final da tela */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #aec492;
            text-align: center;
            padding: 10px;
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

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <img src="../img/componentes/beleza (1).jpg" id="beleza" class="img-fluid mb-3" alt="...">
            </div>
            <div class="col-md-6">
                <div class="article-container">
                    <h2 class="text-center mt-5" style="font-family: 'Alex Brush', cursive;font-size: 40px;color: black;font-weight: bold;">Comunidade de Bem-Estar e Beleza Autêntica</h2>
                    <p>A Cherry Estética não é apenas um espaço, mas uma comunidade de indivíduos unidos pela busca de uma beleza autêntica e sustentável. Nossos profissionais são apaixonados por guiar nossos clientes em uma jornada de descoberta e transformação, onde a naturalidade é celebrada e a confiança é cultivada.</p>

                    <p>Ao escolher a Cherry Estética, você não apenas investe em sua própria beleza, mas também se torna parte de um movimento que busca redefinir os padrões de estética, valorizando a beleza que existe em cada um de nós e no mundo que nos cerca.</p>

                    <p>Seja bem-vindo à nossa casa, onde a beleza se encontra com a natureza, e juntos, escrevemos uma história de autenticidade e bem-estar.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include '../componentes/footer.php'; ?>
</body>

</html>
