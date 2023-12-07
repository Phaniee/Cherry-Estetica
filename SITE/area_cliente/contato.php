<?php
require_once '../model/Mensagem.php'; 
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
    <title>Contato</title>
    <style>
        body {
            background-color: #aec492;
        }

        .card {
            margin: 0 auto;
            opacity: 0.9;
        }

        .btn-enviar {
         background-color: #aec492;
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

    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header text-center">
                        <h1 class="display-5">Contato</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="./contatoProcess.php">
                            <div class="mb-3">
                                <input type="hidden" name="codContato" id="codContato" placeholder="id" >
                                <label for="nome" class="col-form-label">Nome Completo:</label>
                                <input type="text" class="form-control" id="nomeContato" name="nomeContato">
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="col-form-label">E-mail:</label>
                                    <input type="text" class="form-control" id="emailContato" name="emailContato">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="categoria" class="col-form-label">Categoria:</label>
                                    <select id="categoriaContato" name="categoriaContato" class="form-control">
                                        <option selected>Clique no menu de opção</option>
                                        <option>Cadastro</option>
                                        <option>Login</option>
                                        <option>Serviço</option>
                                        <option>Sugestão</option>
                                        <option>Elogio</option>
                                        <option>Reclamação</option>
                                        <option>Outros</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="comentario" class="col-form-label">Comentários</label>
                                <textarea type="text" class="form-control" id="comentarioContato" name="comentarioContato" maxlength="500"></textarea>
                            </div>
                            <div class="col text-end">
                                <button type="submit" id="acao" name="acao" value="SALVAR" class="btn btn-enviar">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        require_once("../componentes/modal.php");
    ?>

    <?php include '../componentes/footer.php'; ?>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
    </script>
    <!-- Para usar Mascara  -->
    <script type="text/javascript" src="./../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="./../js/personalizar.js"></script>
    <script type="text/javascript" src="./../js/modal.js"></script>
</body>

</html>
