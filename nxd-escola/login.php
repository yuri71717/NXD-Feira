<?php
require_once __DIR__ . '/config/config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - NXD Gestão Escolar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">
</head>
<body class="d-flex align-items-center justify-content-center py-5" style="background-color: #0c0d12; min-height: 100vh;">

<div class="container" style="max-width: 420px;">
  <div class="text-center mb-4">
    <div class="d-inline-flex align-items-center justify-content-center bg-danger text-white rounded-3 p-3 mb-3 shadow">
      <i class="bi bi-mortarboard-fill fs-2"></i>
    </div>
    <h3 class="fw-bold text-white mb-1">NXD <span class="text-danger">Escola</span></h3>
    <div class="text-white small fw-semibold">Portal do Professor</div>
  </div>

  <div class="card card-accent-red shadow-lg" style="background-color: #181924; border: 1px solid #272938; border-top: 3px solid #991b1b;">
    <div class="card-body p-4">
      <form action="index.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label text-white">E-mail institucional</label>
          <div class="input-group">
            <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="nome@escola.sp.gov.br">
          </div>
        </div>

        <div class="mb-3">
          <label for="codigo" class="form-label text-white">Código da escola</label>
          <div class="input-group">
            <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-building"></i></span>
            <input type="text" class="form-control text-uppercase" id="codigo" name="codigo" placeholder="Ex: NXD2026">
          </div>
        </div>

        <div class="mb-4">
          <label for="senha" class="form-label text-white">Senha de acesso</label>
          <div class="input-group">
            <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
          </div>
        </div>

        <button type="submit" class="btn btn-danger w-100 py-2 fw-bold">
          <i class="bi bi-box-arrow-in-right me-1"></i> Acessar Sistema
        </button>
      </form>
    </div>
  </div>

  <div class="text-center mt-4 text-white small">
    Ambiente Docente &middot; NXD Gestão Escolar
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
