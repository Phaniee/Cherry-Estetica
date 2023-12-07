<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap');

        .cover-container {
            background-image: url('../img/componentes/quadro-de-cosmeticos-naturais.jpg');
            background-size: cover;
            background-position: center center;
            min-height: 100vh;
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

    <div class="row-md-6 vh-100 d-flex justify-content-center d-flex align-items-center border"> <!-- Primeira parte cover-->
        <div id="home" class="cover-container d-flex w-100 h-100 p-3 flex-column mx-auto d-flex justify-content-center d-flex align-items-center">
            <main class="px-3">
                <p class="text-center" style="font-size:80px;color: black;font-weight: bold;font-family:'Alex Brush', cursive;">Cherry Estética</p>
                <p class="lead text-center m-1">Descubra a verdadeira essência da beleza.</p>
                <a href="#anchor" class="btn  d-flex justify-content-center d-flex align-items-center" style="border:none ;"><img src="../img/componentes/arrowDown.gif" width="100" height="100" alt="arrowDown" class="arrowDown"></a>
            </main>
        </div>
    </div>
    <div class="row-md-6 d-flex justify-content-center d-flex align-items-center" id="anchor" style="background-color: #f0f0f0;"><!-- segunda parte dos cards-->
        <div class="container" style="padding-bottom: 15%;padding-top:10%;">
            <div class="text-center mx-auto" style="max-width: 500px;">
                <h1 class="display-4" style="font-family: 'Alex Brush', cursive;font-weight: bold;">Procedimentos Naturais</h1>
                <p class="lead text-center mb-5" style="color:#567530 ;">Diferenciais da Cherry Estética</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="ps-4">
                            <h5 class="mb-3"><i class="fas fa-leaf"></i> Limpeza Facial com Ingredientes Naturais</h5>
                            <span>Limpeza profunda usando ingredientes naturais como mel, aveia e iogurte para purificar a pele,
                                remover impurezas e promover uma tez radiante</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="ps-4">
                            <h5 class="mb-3"><i class="fas fa-seedling"></i> Máscaras de Argila</h5>
                            <span>Feitas a partir de argilas minerais, estas máscaras absorvem o excesso de óleo,
                                desintoxicam a pele e proporcionam minerais essenciais para um brilho saudável.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="ps-4">
                            <h5 class="mb-3"><i class="fas fa-apple-alt"></i> Peeling Enzimático de Frutas</h5>
                            <span>Utiliza enzimas de frutas como abacaxi e papaya para esfoliar suavemente a pele, removendo células mortas e promovendo a renovação celular.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="ps-4">
                            <h5 class="mb-3"><i class="fas fa-seedling"></i> Tratamento com Algas Marinhas</h5>
                            <span>Rico em nutrientes e minerais, este tratamento nutre a pele, promove a circulação e ajuda na desintoxicação.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="ps-4">
                            <h5 class="mb-3"><i class="fas fa-spa"></i> Aromaterapia Facial</h5>
                            <span>Incorpora óleos essenciais cuidadosamente selecionados para revitalizar a pele e proporcionar uma experiência relaxante e aromática.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start">
                        <div class="ps-4">
                            <h5 class="mb-3"><i class="fas fa-bath"></i> Banho de Imersão com Óleos Naturais</h5>
                            <span>Um banho relaxante com óleos essenciais naturais para acalmar a mente, suavizar a pele e promover um estado de relaxamento profundo.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-md-6 vh-100  d-flex justify-content-center d-flex align-items-center" style="background-color:#aec492;"><!-- terceira parte-->
        <div class="col-md-6">
            <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner p-3">
                    <div class="carousel-item active">
                        <img src="../img/componentes/argilaa.jpg" class="d-block w-100" alt="mulher com argila no rosto">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/componentes/front-view-hands-holding-woman-s-head.jpg" class="d-block w-100" alt="mulher rosto">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/componentes/massage-2717431_1280.jpg" class="d-block w-100" alt="massagem com pedras vulcanicas">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6 p-3 align-itens-center">
            <article>
                <h1 class="text-center display-4" style="font-weight:bold;font-family:'Alex Brush', cursive;">Desvendando a Elegância Natural</h1>
                <p class="text-center">Descubra a beleza que nasce da simplicidade e autenticidade. Em nossa clínica de estética, valorizamos a abordagem natural.
                    Utilizamos ingredientes puros e técnicas ancestrais para realçar sua beleza de forma delicada e duradoura.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a type="button" class="btn btn-lg" href="./catalogo.php" style="background-color:#f0f0f0;font-weight:bold;">Serviços</a>
                </div>
            </article>
        </div>
    </div>
    <?php include '../componentes/footer.php'; ?>
</body>

</html>