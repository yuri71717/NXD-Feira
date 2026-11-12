<?php
require_once __DIR__ . '/config/config.php';

$turmas = get_turmas();
$turma_id = isset($_GET['turma']) ? (int)$_GET['turma'] : 1;
$turma_atual = get_turma($turma_id);

$titulo_pagina = 'Plano de Aulas';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1">Plano de Aulas</h3>
    <div class="text-white small"><?= htmlspecialchars($turma_atual['nome']) ?> &middot; <?= htmlspecialchars($turma_atual['curso']) ?></div>
  </div>
  <div class="d-flex gap-2">
    <?php foreach ($turmas as $id => $t): ?>
      <a href="planos.php?turma=<?= $t['id'] ?>" class="btn <?= ($t['id'] == $turma_id) ? 'btn-danger' : 'btn-dark' ?> btn-sm fw-bold">
        <?= htmlspecialchars($t['nome']) ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<div class="row g-4">
  <div class="col-12 col-lg-7">
    <div class="card card-accent-red">
      <div class="card-header py-3">
        <span class="fw-bold fs-6"><i class="bi bi-pencil-square text-danger me-2"></i>Editar Planejamento</span>
      </div>
      <div class="card-body p-4">
        <form action="planos.php" method="POST">
          <div class="mb-3">
            <label class="form-label">Objetivos da Aula</label>
            <textarea class="form-control" rows="3" placeholder="Descreva os objetivos principais da disciplina...">Lógica de programação estruturada, algoritmos básicos e resolução de problemas utilizando repetição e vetores.</textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Conteúdo e Atividades Práticas</label>
            <textarea class="form-control" rows="5" placeholder="Tópicos da aula e práticas em laboratório...">1. Introdução à lógica de programação
2. Variáveis, tipos de dados e operadores matemáticos
3. Estruturas condicionais (se/senão)
4. Prática guiada no laboratório com exercícios em pseudocódigo.</textarea>
          </div>

          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-danger fw-bold">
              <i class="bi bi-floppy me-1"></i> Salvar Planejamento
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-5">
    <div class="card card-accent-red h-100">
      <div class="card-header py-3">
        <span class="fw-bold fs-6"><i class="bi bi-clock-history text-danger me-2"></i>Planos Cadastrados</span>
      </div>
      <div class="card-body p-3">
        <div class="p-3 mb-3 rounded bg-dark border border-secondary">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="fw-bold text-white">1º A &middot; Informática</span>
            <span class="badge bg-danger">Ativo</span>
          </div>
          <p class="small text-white mb-2">Introdução à lógica e desenvolvimento de fluxogramas em laboratório.</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-white"><i class="bi bi-calendar3 me-1"></i>Atualizado em 24/10/2026</small>
            <button class="btn btn-outline-danger btn-sm py-0 px-2">Editar</button>
          </div>
        </div>

        <div class="p-3 mb-2 rounded bg-dark border border-secondary">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="fw-bold text-white">1º B &middot; Administração</span>
            <span class="badge bg-dark border border-secondary">Ativo</span>
          </div>
          <p class="small text-white mb-2">Teoria geral da administração e análise de mercado.</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-white"><i class="bi bi-calendar3 me-1"></i>Atualizado em 22/10/2026</small>
            <button class="btn btn-outline-danger btn-sm py-0 px-2">Editar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
