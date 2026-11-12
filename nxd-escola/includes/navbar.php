<div class="main-wrapper">
  <header class="topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="btn btn-outline-danger btn-sm d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
        <i class="bi bi-list fs-5"></i>
      </button>
      <div class="fw-bold fs-5 text-white">
        <?= htmlspecialchars($titulo_pagina ?? 'Portal do Professor') ?>
      </div>
    </div>

    <div class="d-flex align-items-center gap-3">
      <a href="avisos.php" class="btn btn-dark btn-sm position-relative" title="Avisos">
        <i class="bi bi-bell text-danger"></i>
        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-dark rounded-circle"></span>
      </a>
      <a href="perfil.php" class="d-none d-md-flex align-items-center gap-2 text-decoration-none">
        <span class="badge bg-danger">Unidade <?= htmlspecialchars($usuario['codigo']) ?></span>
      </a>
    </div>
  </header>

  <!-- Menu mobile -->
  <div class="offcanvas offcanvas-start text-bg-dark border-end border-danger" tabindex="-1" id="mobileMenu" style="background-color: #13141b !important;">
    <div class="offcanvas-header border-bottom border-secondary">
      <h5 class="offcanvas-title fw-bold text-white d-flex align-items-center gap-2">
        <i class="bi bi-mortarboard-fill text-danger"></i>
        <span>NXD ESCOLA</span>
      </h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-3">
      <nav class="nav flex-column gap-1">
        <?php foreach ($menu as $item): 
          $ativo = (basename($_SERVER['PHP_SELF']) === $item['url']) ? 'active' : '';
        ?>
          <a href="<?= $item['url'] ?>" class="sidebar-link <?= $ativo ?>">
            <i class="bi <?= $item['icon'] ?>"></i>
            <span><?= $item['label'] ?></span>
          </a>
        <?php endforeach; ?>
        <hr class="border-secondary my-3">
        <a href="login.php" class="sidebar-link text-danger">
          <i class="bi bi-box-arrow-right"></i>
          <span>Sair</span>
        </a>
      </nav>
    </div>
  </div>

  <div class="content-container">
