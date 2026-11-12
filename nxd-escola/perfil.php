<?php
require_once __DIR__ . '/config/config.php';

$titulo_pagina = 'Meu Perfil';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h3 class="fw-bold text-white mb-1">Dados do Docente</h3>
    <div class="text-white small">Informações cadastrais e credenciais funcionais</div>
  </div>
</div>

<div class="row g-4">
  <div class="col-12 col-lg-4">
    <div class="card card-accent-red text-center p-4">
      <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center mx-auto mb-3 shadow" style="width: 80px; height: 80px; font-size: 2rem; font-weight: 800;">
        CE
      </div>
      <h5 class="fw-bold text-white mb-1"><?= htmlspecialchars($usuario['nome']) ?></h5>
      <div class="text-white small mb-3"><?= htmlspecialchars($usuario['cargo']) ?> &middot; Unidade <?= htmlspecialchars($usuario['codigo']) ?></div>
      <span class="badge bg-danger py-2 px-3">Ativo</span>

      <hr class="border-secondary my-4">

      <div class="d-grid">
        <a href="login.php" class="btn btn-outline-danger">
          <i class="bi bi-box-arrow-right me-1"></i> Sair
        </a>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-8">
    <div class="card card-accent-red mb-4">
      <div class="card-header py-3">
        <span class="fw-bold fs-6"><i class="bi bi-person-lines-fill text-danger me-2"></i>Dados Cadastrais</span>
      </div>
      <div class="card-body p-4">
        <form action="perfil.php" method="POST">
          <div class="row g-3">
            <div class="col-12 col-md-6">
              <label class="form-label">Nome Completo</label>
              <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>">
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">E-mail Institucional</label>
              <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($usuario['email']) ?>">
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Registro Funcional (RF)</label>
              <input type="text" class="form-control" value="48201-9" readonly>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Unidade / Código</label>
              <input type="text" class="form-control text-uppercase" value="<?= htmlspecialchars($usuario['codigo']) ?>" readonly>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Área Curricular</label>
              <input type="text" class="form-control" value="Informática e Desenvolvimento de Sistemas" readonly>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label">Situação do Vínculo</label>
              <input type="text" class="form-control" value="Docente Efetivo &middot; Contrato Ativo" readonly>
            </div>

            <div class="col-12 d-flex justify-content-end">
              <button type="submit" class="btn btn-danger fw-bold">
                <i class="bi bi-save me-1"></i> Salvar Alterações
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
