<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Login usuário</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
</head>
<body style = "background-color:#aec492">
   
    <div class="container vh-100 vw-100 d-flex justify-content-center d-flex align-items-center">
        <div class="col-md-6">
            <img src="../img/componentes/logo.png" class="rounded mx-auto d-block" alt="..." style="width:40%">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3 text-center" style="font-family: 'Alex Brush', cursive;font-size:80px;color: black;font-weight: bold;">Cherry Estética</h1>
            <p class="col-lg-10 fs-5 text-center w-100 display-4 fw-bold lh-1">Login Cliente</p>
        </div>
        <div class="col-md-6 shadow" style="background-color: #e0e0e0; border-radius: 10px; border-top: 15px solid #848e3d;">
                    
        <form class="m-5 sm-2 " action="valida_login_cliente.php" method="post" style="font-family:tahoma;">
            <h2>Entre na sua conta</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail:</label>
                <input type="email" class="form-control" name= "email"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@exemplo.com">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha:</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($_GET['login']) && $_GET ['login'] == "erro"){
                ?>
                <div class="text-danger">
                  Usuário ou senha Inválido(s)
                </div>

                <?php 
                }

                ?>
                <?php 
                if(isset($_GET['login']) && $_GET ['login'] == "erro2"){
                ?>
                <div class="text-danger">
                  Usuário não fez o login!
                </div>

                <?php 
                }

                ?>
            <div class="row">
                <a href="cadastro.php" class="col-md-6 sm-5 text-decoration-none">Não possui cadastro?</a>
                <button type="submit" class="col-md-5 m-1 sm-2 btn justify-content-end" style="background-color: #848e3d; color: #fff;">Entrar</button>
            </div>
        </form>          

    </div>           
    
</body>
</html>