<?php
require_once __DIR__ . '/config/config.php';

$titulo_pagina = 'Minhas Turmas';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';

$turmas = get_turmas();
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1">Turmas Atribuídas</h3>
    <div class="text-white small">Gestão de turmas e diários de classe</div>
  </div>
  <div style="min-width: 260px;">
    <div class="input-group">
      <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-search"></i></span>
      <input type="text" id="searchTurmas" class="form-control" placeholder="Filtrar turmas...">
    </div>
    <div id="turmasEncontradas" class="small text-white mt-1 text-end"></div>
  </div>
</div>

<div class="card card-accent-red">
  <div class="table-responsive">
    <table class="table table-dark table-hover align-middle mb-0">
      <thead>
        <tr>
          <th>Código / Turma</th>
          <th>Curso</th>
          <th>Período</th>
          <th>Sala</th>
          <th>Matriculados</th>
          <th class="text-end">Ações Rápidas</th>
        </tr>
      </thead>
      <tbody id="turmasContainer">
        <?php foreach ($turmas as $id => $t): ?>
          <tr class="card-turma-item">
            <td class="fw-bold text-white">
              <i class="bi bi-mortarboard-fill text-danger me-2"></i><?= htmlspecialchars($t['nome']) ?>
            </td>
            <td><?= htmlspecialchars($t['curso']) ?></td>
            <td><span class="badge bg-dark border border-secondary"><?= htmlspecialchars($t['periodo']) ?></span></td>
            <td>Sala <?= htmlspecialchars($t['sala']) ?></td>
            <td><span class="badge bg-danger"><?= htmlspecialchars($t['alunos']) ?> alunos</span></td>
            <td class="text-end">
              <a href="chamada.php?turma=<?= $t['id'] ?>" class="btn btn-outline-danger btn-sm me-1" title="Fazer Chamada">
                <i class="bi bi-check2-square"></i> Chamada
              </a>
              <a href="mencoes.php?turma=<?= $t['id'] ?>" class="btn btn-dark btn-sm me-1" title="Lançar Menções">
                <i class="bi bi-award"></i> Menções
              </a>
              <a href="turma-detalhes.php?id=<?= $t['id'] ?>" class="btn btn-danger btn-sm" title="Detalhes da Turma">
                Detalhes &rarr;
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div id="nenhumaTurma" class="alert alert-dark text-white border-danger d-none p-3 m-3">
    <i class="bi bi-exclamation-circle text-danger me-2"></i>Nenhuma turma encontrada com o termo pesquisado.
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
