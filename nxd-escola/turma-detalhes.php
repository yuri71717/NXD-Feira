<?php
require_once __DIR__ . '/config/config.php';

$turma_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$turma = get_turma($turma_id);

$titulo_pagina = 'Detalhes da Turma';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1"><?= htmlspecialchars($turma['nome']) ?></h3>
    <div class="text-white small"><?= htmlspecialchars($turma['curso']) ?> &middot; Período <?= htmlspecialchars($turma['periodo']) ?></div>
  </div>
  <a href="turmas.php" class="btn btn-outline-danger btn-sm">
    <i class="bi bi-arrow-left me-1"></i> Voltar
  </a>
</div>

<div class="row g-4 mb-4">
  <div class="col-12 col-lg-4">
    <div class="card card-accent-red h-100">
      <div class="card-header py-3">
        <span class="fw-bold"><i class="bi bi-info-circle text-danger me-2"></i>Informações da Turma</span>
      </div>
      <div class="card-body p-4">
        <ul class="list-group list-group-flush bg-transparent">
          <li class="list-group-item bg-transparent text-white border-secondary d-flex justify-content-between px-0">
            <span>Período:</span>
            <span class="fw-bold"><?= htmlspecialchars($turma['periodo']) ?></span>
          </li>
          <li class="list-group-item bg-transparent text-white border-secondary d-flex justify-content-between px-0">
            <span>Sala de Aula:</span>
            <span class="fw-bold">Sala <?= htmlspecialchars($turma['sala']) ?></span>
          </li>
          <li class="list-group-item bg-transparent text-white border-secondary d-flex justify-content-between px-0">
            <span>Matriculados:</span>
            <span class="badge bg-danger"><?= htmlspecialchars($turma['alunos']) ?> alunos</span>
          </li>
          <li class="list-group-item bg-transparent text-white border-secondary d-flex justify-content-between px-0">
            <span>Ano Letivo:</span>
            <span class="fw-bold">2026</span>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-8">
    <div class="card card-accent-red h-100">
      <div class="card-header py-3">
        <span class="fw-bold"><i class="bi bi-tools text-danger me-2"></i>Operações da Turma</span>
      </div>
      <div class="card-body p-4 d-grid gap-3">
        <div class="row g-3">
          <div class="col-12 col-sm-6">
            <a href="chamada.php?turma=<?= $turma['id'] ?>" class="btn btn-dark w-100 p-3 text-start border-secondary">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="fw-bold text-white"><i class="bi bi-check2-square text-danger me-2"></i>Diário de Frequência</div>
                  <div class="small text-white">Lançar presenças e faltas</div>
                </div>
                <i class="bi bi-arrow-right text-danger"></i>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6">
            <a href="mencoes.php?turma=<?= $turma['id'] ?>" class="btn btn-dark w-100 p-3 text-start border-secondary">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="fw-bold text-white"><i class="bi bi-award-fill text-danger me-2"></i>Menções e Notas</div>
                  <div class="small text-white">Avaliação por competência</div>
                </div>
                <i class="bi bi-arrow-right text-danger"></i>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6">
            <a href="planos.php?turma=<?= $turma['id'] ?>" class="btn btn-dark w-100 p-3 text-start border-secondary">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="fw-bold text-white"><i class="bi bi-journal-text text-danger me-2"></i>Plano de Ensino</div>
                  <div class="small text-white">Conteúdos e cronograma</div>
                </div>
                <i class="bi bi-arrow-right text-danger"></i>
              </div>
            </a>
          </div>

          <div class="col-12 col-sm-6">
            <a href="ocorrencias.php?turma=<?= $turma['id'] ?>" class="btn btn-dark w-100 p-3 text-start border-secondary">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="fw-bold text-white"><i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>Ocorrência</div>
                  <div class="small text-white">Registro disciplinar</div>
                </div>
                <i class="bi bi-arrow-right text-danger"></i>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
