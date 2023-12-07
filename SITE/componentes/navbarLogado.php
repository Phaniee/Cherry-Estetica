<nav class="navbar navbar-expand-lg bg-body-tertiary" style="font-family: tahoma;">
    <!-- parte da navbar -->
    <div class="container-fluid">
        <img src="../img/componentes/logo.png" width="30" height="30" class="d-inline-block align-top" alt="imagem de um projeto">
        <a class="navbar-brand fw-semibold">Cherry Estética</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../area_cliente/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../area_cliente/catalogo.php">Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../area_cliente/depoimentos.php">Depoimentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../area_cliente/sobre.php">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../area_cliente/contato.php">Contato</a>
                </li>
            </ul>
            <div class="ms-auto">
                <div class="btn-group dropstart">
                    <button type="button" class="btn bg-body-tertiary dropdown-toggle"  style="border:none;" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../img/user/mulher.png" alt="mdo" width="40" height="40" class="rounded-circle">
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><?=$authCliente['nomeCliente'];?></a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../area_cliente/logoff.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>