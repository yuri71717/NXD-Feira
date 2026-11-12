<?php
require_once __DIR__ . '/config/config.php';

$turmas = get_turmas();
$turma_id = isset($_GET['turma']) ? (int)$_GET['turma'] : 1;
$turma_atual = get_turma($turma_id);
$bimestre = isset($_GET['bimestre']) ? (int)$_GET['bimestre'] : 1;
$alunos = get_alunos_turma($turma_id);

$titulo_pagina = 'Lançamento de Menções';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1">Avaliação por Menções</h3>
    <div class="text-white small"><?= htmlspecialchars($turma_atual['nome']) ?> &middot; Fechamento bimestral</div>
  </div>
  <div class="d-flex gap-2">
    <?php for ($b = 1; $b <= 4; $b++): ?>
      <a href="mencoes.php?turma=<?= $turma_id ?>&bimestre=<?= $b ?>" class="btn <?= ($bimestre === $b) ? 'btn-danger' : 'btn-dark' ?> btn-sm fw-bold">
        <?= $b ?>º Bimestre
      </a>
    <?php endfor; ?>
  </div>
</div>

<!-- Filtro por turma -->
<div class="mb-4">
  <div class="d-flex flex-wrap gap-2">
    <?php foreach ($turmas as $id => $t): ?>
      <a href="mencoes.php?turma=<?= $t['id'] ?>&bimestre=<?= $bimestre ?>" class="btn <?= ($t['id'] == $turma_id) ? 'btn-outline-danger' : 'btn-dark' ?> btn-sm fw-bold">
        <?= htmlspecialchars($t['nome']) ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<form action="mencoes.php" method="POST">
  <div class="card card-accent-red mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <span class="fw-bold fs-6"><i class="bi bi-award-fill text-danger me-2"></i>Tabela de Conceitos &middot; <?= $bimestre ?>º Bimestre</span>
      <span class="small text-white">Escala: <b>MB</b> (Muito Bom) | <b>B</b> (Bom) | <b>R</b> (Regular) | <b>I</b> (Insuficiente)</span>
    </div>

    <div class="table-responsive">
      <table class="table table-dark table-hover align-middle mb-0 text-center">
        <thead>
          <tr>
            <th class="text-start" style="width: 50px;">Nº</th>
            <th class="text-start">Aluno</th>
            <th>Critério 1</th>
            <th>Critério 2</th>
            <th>Critério 3</th>
            <th>Critério 4</th>
            <th>Critério 5</th>
            <th>Conceito Final</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($alunos as $index => $aluno): ?>
            <tr>
              <td class="text-start fw-bold text-danger"><?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?></td>
              <td class="text-start fw-bold text-white"><?= htmlspecialchars($aluno) ?></td>
              <?php for ($c = 1; $c <= 5; $c++): ?>
                <td>
                  <select class="form-select form-select-sm text-center fw-bold" name="mencao[<?= $index ?>][c<?= $c ?>]" style="max-width: 75px; margin: 0 auto;">
                    <option value="MB" selected>MB</option>
                    <option value="B">B</option>
                    <option value="R">R</option>
                    <option value="I">I</option>
                  </select>
                </td>
              <?php endfor; ?>
              <td>
                <span class="badge bg-danger fs-6 fw-bold">MB</span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="card-footer py-3 d-flex justify-content-between align-items-center bg-transparent border-secondary">
      <span class="small text-white">Todas as menções serão gravadas no histórico escolar dos alunos.</span>
      <button type="submit" class="btn btn-danger fw-bold">
        <i class="bi bi-floppy me-1"></i> Salvar Menções
      </button>
    </div>
  </div>
</form>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
