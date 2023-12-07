<header class="p-3 border-bottom bg-dark text-white shadow" style="height: 10vh">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <img src="../../img/componentes/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      </a>
      <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ms-3 fw-bold">
        Cherry Estética
      </div>

      <div class="dropdown text-end">
        <a href="#" class="text-white d-block link-body-emphasis text-decoration-none dropdown-toggle"
          data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../../img/user/<?=$authUser['imagemUser']? $authUser['imagemUser']: 'perfil-sem-foto.jpg';?>" alt="mdo" width="40" height="40" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small">
          <a href="#" class="dropdown-item"><?=$authUser['nomeUser'];?></a>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logoff.php">Sign out</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>