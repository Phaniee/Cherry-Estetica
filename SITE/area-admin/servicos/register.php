<?php 
  require_once("../../componentes/modal.php");
  require_once '../../dao/ServicoDao.php';
  if(!empty($_POST)){
    $cod_Servico = $servicoDao['codServico'];
    $nome_Servico =  $servicoDao['nomeServico'];
    $valor_servico = $servicoDao['valorServico'];
    $duracao_servico = $servicoDao['duracaoServico'];
    $descricao_servico = $servicoDao['descricaoServico'];
    $imagem_servico = $servicoDao['imagemServico'];
    }else{
      $cod_Servico = '';
      $nome_Servico =  '';
      $valor_servico = '';
      $duracao_servico ='';
      $descricao_servico = '';
      $imagem_servico = '';
    }


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
 
  $authUser = $_SESSION['userAdm'];
  ?>
  <?php 
      include('./../../componentes/navbar-adm.php');
  ?>
  <div class="container-fluid" style="height: 90vh">
    <div class="row h-100">
      <?php 
      include('./../../componentes/menu-adm.php');
      ?>
      <div class="col-md-10  p-4 borber">
        <div class="card">
        <form method="post" action="process.php" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="card-header">
              <strong>INFORMAÇÕES DO SERVIÇO</strong>
              <input type="hidden" name="codServico" id="codServico" placeholder="id" value="<?=$cod_Servico?>">
              <input type="hidden" name="imagemServico" id="imagemServico" placeholder="nome foto" value="<?=$imagem_servico?>" >
              <input type="hidden" value="<?=$cod_Servico?'ATUALIZAR':'SALVAR'?>" name="acao" >
            </div>
            <div class="card-body row justify-content-center align-items-center">
              <div class="col-md-3   text-center">
                <div class="bg-white rounded">
                  <img id="preview" src="../../img/tratamentos/<?=$imagem_servico!="" ? $imagem_servico : 'sem-foto.jpg';?>" alt="imagem padrão" class=" w-75">
                </div>
              </div>
              <div class=" col-md-9">
                <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-md-6 mb-3 needs-validation">
                    <label for="nomeServico" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control " name="nomeServico" maxlength="100" id="nomeServico" value="<?=$nome_Servico?>"required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                  <div class="col-md-3 mb-3 needs-validation">
                    <label for="valorServico" class="col-form-label">Valor:</label>
                    <input type="money" class="form-control" name="valorServico" maxlength="50" id="valorServico" value="<?=$valor_servico?>" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                 
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-md-3 mb-3 needs-validation">
                    <label for="duracaoServico" class="col-form-label">Duração:</label>
                    <input type="time" class="form-control" name="duracaoServico" maxlength="50" id="duracaoServico" value="<?=$duracao_servico?>" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 needs-validation">
                    <label for="descricaoServico" class="col-form-label">Descrição:</label>
                    <input type="text" class="form-control" name="descricaoServico" id="descricaoServico" value="<?=$descricao_servico?>" required>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-md-3">
                    <input type="file" id="foto" name="foto" accept="image/*" class="custom-file-input">
                  </div>
                </div>
                <div class=" text-end p-3">
                  <a class=" btn btn-primary px-3" role="button" aria-disabled="true" href="index.php">Voltar</i></a>
                  <input type="submit" class=" btn btn-success" value="Salvar">
                </div>
              </div>
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
  <script type="text/javascript" src="../../js/modal.js"></script>
  <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../../js/personalizar.js"></script>

</body>

</html>
