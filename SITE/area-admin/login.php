<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cherry Estética - Adm</title>
  <link rel="short icon" href="./../img/site/logo.png" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="justify-content: center; align-items: center; height: 100vh;  ">
  <div class="container col-xl-10 col-xxl-8 " style="height: 95vh; padding:8% 30px; background-color:'#ccc'">
    <div class="row align-items-center g-lg-5 py-4  ">
      <div class="col-lg-7 text-center text-lg-start">
        <img src="../img/componentes/logo.png" class="rounded mx-auto d-block" alt="..." style="width:40%">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3 text-center">Cherry Estética</h1>
        <p class="col-lg-10 fs-5 text-center w-100 display-4 fw-bold lh-1">Painel Adminstrativo</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="post"  action="valida_login.php">
          <div class="form-floating mb-3">
            <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating ">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
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
          <div class="checkbox mt-3 mb-2">
            <label>
              <input type="checkbox" value="remember-me"> Lembre de mim
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Logar</button>
          <hr class="my-4">
          <small class="text-body-secondary">Ao clicar em Cadastre-se, você concorda com os termos de uso.</small>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html>