<?php 
  require_once("../../componentes/modal.php");
  require_once '../../dao/DepoimentoDao.php';
  if(!empty($_POST)){
    $cod_Depoimento_Cliente = $depoimentoDao['codDepoimentoCliente'];
    $titulo_Depoimento_Cliente =  $depoimentoDao['tituloDepoimentoCliente'];
    $texto_Depoimento_Cliente = $depoimentoDao['textoDepoimentoCliente'];
    $categoria_Depoimento_Cliente = $depoimentoDao['categoriaDepoimentoCliente'];
    $nome_Cliente= $depoimentoDao['nomeCliente'];
    }else{
      $cod_Depoimento_Cliente  = '';
      $titulo_Depoimento_Cliente = '';
      $texto_Depoimento_Cliente = '';
      $categoria_Depoimento_Cliente = '';
      $nome_Cliente = '';
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
              <strong>REGISTRAR DEPOIMENTO - CLIENTES</strong>
              <input type="hidden" value="<?=$cod_Depoimento_Cliente?'ATUALIZAR':'SALVAR'?>" name="acao" >
              <input type="hidden" name="codDepoimentoCliente" id="codDepoimentoCliente" placeholder="id" value="<?=$cod_Depoimento_Cliente?>">
            </div>
            <div class="card-body row justify-content-center align-items-center">
            
            <div class="form-group">
                      <label>Título</label>
                      <input name="tituloDepoimentoCliente" type="text" class="form-control" placeholder="Título" value="<?=$titulo_Depoimento_Cliente?>">
                    </div>
                    <div class="form-group">
                      <label>Categoria</label>
                      <input name="categoriaDepoimentoCliente" type="text" class="form-control" placeholder="Categoria" value="<?= $categoria_Depoimento_Cliente?>">
                    </div>
                    <div class="form-group">
                      <label>Cliente</label>
                      <input name="nomeCliente" type="text" class="form-control" placeholder="Nome Cliente" value="<?=$nome_Cliente?>">
                    </div>
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea name="textoDepoimentoCliente" class="form-control" rows="3" ><?= $texto_Depoimento_Cliente?></textarea>
                    </div>
                </div>
                <div class=" text-end p-3">
                  <a class=" btn btn-primary px-3" role="button" aria-disabled="true" href="index.php">Voltar</i></a>
                  <input type="submit" class=" btn btn-success" value="SALVAR">
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
  <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../../js/personalizar.js"></script>

</body>

</html>