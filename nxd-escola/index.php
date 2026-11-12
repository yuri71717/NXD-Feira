<?php
require_once __DIR__ . '/config/config.php';

$titulo_pagina = 'Painel do Professor';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';

$turmas = get_turmas();
$laboratorios = get_laboratorios();
$avisos = get_avisos();
$aulas = get_aulas();
?>

<!-- Saudação -->
<div class="d-flex align-items-center justify-content-between mb-4">
  <div>
    <h3 class="fw-bold text-white mb-1">Olá, <?= htmlspecialchars($usuario['nome']) ?></h3>
    <div class="text-white small fw-semibold">Ano Letivo 2026 &middot; Unidade <?= htmlspecialchars($usuario['codigo']) ?></div>
  </div>
  <div>
    <a href="chamada.php" class="btn btn-danger btn-sm fw-bold">
      <i class="bi bi-check2-square me-1"></i> Fazer Chamada
    </a>
  </div>
</div>

<!-- Metricas -->
<div class="row g-3 mb-4">
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div>
        <div class="text-white small fw-bold text-uppercase">Turmas</div>
        <div class="stat-value"><?= count($turmas) ?></div>
      </div>
      <div class="stat-icon">
        <i class="bi bi-people-fill"></i>
      </div>
    </div>
  </div>

  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div>
        <div class="text-white small fw-bold text-uppercase">Total Alunos</div>
        <div class="stat-value">140</div>
      </div>
      <div class="stat-icon">
        <i class="bi bi-mortarboard-fill"></i>
      </div>
    </div>
  </div>

  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div>
        <div class="text-white small fw-bold text-uppercase">Laboratórios</div>
        <div class="stat-value"><?= count($laboratorios) ?></div>
      </div>
      <div class="stat-icon">
        <i class="bi bi-display-fill"></i>
      </div>
    </div>
  </div>

  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div>
        <div class="text-white small fw-bold text-uppercase">Avisos</div>
        <div class="stat-value"><?= count($avisos) ?></div>
      </div>
      <div class="stat-icon">
        <i class="bi bi-bell-fill"></i>
      </div>
    </div>
  </div>
</div>

<!-- Aulas de hoje -->
<div class="card card-accent-red mb-4">
  <div class="card-header d-flex align-items-center justify-content-between py-3">
    <span class="fs-6 fw-bold"><i class="bi bi-clock-history text-danger me-2"></i>Aulas de Hoje</span>
    <span class="badge bg-danger">3 Aulas</span>
  </div>
  <div class="table-responsive">
    <table class="table table-dark table-hover mb-0">
      <thead>
        <tr>
          <th>Horário</th>
          <th>Disciplina</th>
          <th>Turma</th>
          <th>Sala</th>
          <th class="text-end">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($aulas as $aula): ?>
          <tr>
            <td class="fw-bold text-danger"><?= htmlspecialchars($aula['hora']) ?> - <?= htmlspecialchars($aula['fim']) ?></td>
            <td class="fw-bold text-white"><?= htmlspecialchars($aula['materia']) ?></td>
            <td><?= htmlspecialchars($aula['turma']) ?></td>
            <td><span class="badge bg-dark border border-secondary">Sala <?= htmlspecialchars($aula['sala']) ?></span></td>
            <td class="text-end">
              <a href="chamada.php" class="btn btn-outline-danger btn-sm">Chamada</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Avisos e atalhos -->
<div class="row g-4">
  <div class="col-12 col-lg-7">
    <div class="card card-accent-red h-100">
      <div class="card-header d-flex justify-content-between align-items-center py-3">
        <span class="fs-6 fw-bold"><i class="bi bi-bell-fill text-danger me-2"></i>Mural da Coordenação</span>
        <a href="avisos.php" class="text-danger small fw-bold text-decoration-none">Ver todos &rarr;</a>
      </div>
      <div class="card-body p-3">
        <?php foreach (array_slice($avisos, 0, 2) as $av): ?>
          <div class="p-3 mb-2 rounded bg-dark border border-secondary">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="fw-bold text-white"><?= htmlspecialchars($av['titulo']) ?></span>
              <span class="badge bg-danger"><?= htmlspecialchars($av['categoria']) ?></span>
            </div>
            <p class="small text-white mb-1"><?= htmlspecialchars($av['texto']) ?></p>
            <small class="text-white fw-bold"><i class="bi bi-calendar3 me-1"></i><?= htmlspecialchars($av['data']) ?></small>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-5">
    <div class="card card-accent-red h-100">
      <div class="card-header py-3">
        <span class="fs-6 fw-bold"><i class="bi bi-lightning-charge-fill text-danger me-2"></i>Atalhos Rápidos</span>
      </div>
      <div class="card-body p-3 d-flex flex-column gap-2 justify-content-around">
        <a href="turmas.php" class="btn btn-dark d-flex align-items-center justify-content-between p-3 border-secondary text-decoration-none">
          <span class="fw-bold text-white"><i class="bi bi-people-fill text-danger me-2"></i>Listagem de Turmas</span>
          <i class="bi bi-chevron-right text-danger"></i>
        </a>
        <a href="mencoes.php" class="btn btn-dark d-flex align-items-center justify-content-between p-3 border-secondary text-decoration-none">
          <span class="fw-bold text-white"><i class="bi bi-award-fill text-danger me-2"></i>Lançamento de Menções</span>
          <i class="bi bi-chevron-right text-danger"></i>
        </a>
        <a href="laboratorios.php" class="btn btn-dark d-flex align-items-center justify-content-between p-3 border-secondary text-decoration-none">
          <span class="fw-bold text-white"><i class="bi bi-display-fill text-danger me-2"></i>Reserva de Laboratório</span>
          <i class="bi bi-chevron-right text-danger"></i>
        </a>
        <a href="planos.php" class="btn btn-dark d-flex align-items-center justify-content-between p-3 border-secondary text-decoration-none">
          <span class="fw-bold text-white"><i class="bi bi-journal-bookmark-fill text-danger me-2"></i>Plano de Ensino</span>
          <i class="bi bi-chevron-right text-danger"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
