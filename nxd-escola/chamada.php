<?php
require_once __DIR__ . '/config/config.php';

$turmas = get_turmas();
$turma_id = isset($_GET['turma']) ? (int)$_GET['turma'] : 1;
$turma_atual = get_turma($turma_id);
$alunos = get_alunos_turma($turma_id);

$titulo_pagina = 'Lançamento de Frequência';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1">Diário de Chamada</h3>
    <div class="text-white small"><?= htmlspecialchars($turma_atual['nome']) ?> &middot; Controle diário de presença</div>
  </div>
  <div class="d-flex gap-2">
    <div class="badge bg-dark border border-secondary p-2 d-flex align-items-center gap-1">
      <span class="text-white fw-bold"><i class="bi bi-check-circle-fill text-danger"></i> Presentes: <span id="totalPresentes"><?= count($alunos) ?></span></span>
    </div>
    <div class="badge bg-danger p-2 d-flex align-items-center gap-1">
      <span class="text-white fw-bold"><i class="bi bi-x-circle-fill"></i> Faltas: <span id="totalAusentes">0</span></span>
    </div>
  </div>
</div>

<!-- Filtro por turma -->
<div class="mb-4">
  <div class="d-flex flex-wrap gap-2">
    <?php foreach ($turmas as $id => $t): ?>
      <a href="chamada.php?turma=<?= $t['id'] ?>" class="btn <?= ($t['id'] == $turma_id) ? 'btn-danger' : 'btn-dark' ?> btn-sm fw-bold">
        <?= htmlspecialchars($t['nome']) ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<form action="chamada.php" method="POST">
  <div class="card card-accent-red mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
      <span class="fw-bold fs-6"><i class="bi bi-list-check text-danger me-2"></i>Lista de Alunos</span>
      <div class="d-flex align-items-center gap-2">
        <label for="data_chamada" class="small text-white mb-0">Data da Aula:</label>
        <input type="date" id="data_chamada" name="data_chamada" class="form-control form-control-sm" value="<?= date('Y-m-d') ?>" style="width: 160px;">
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-dark table-hover align-middle mb-0">
        <thead>
          <tr>
            <th style="width: 60px;">Nº</th>
            <th>Nome do Aluno</th>
            <th>Matrícula</th>
            <th class="text-end" style="width: 200px;">Status de Presença</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($alunos as $index => $aluno): 
            $slug = preg_replace('/[^a-zA-Z0-9]/', '_', $aluno);
          ?>
            <tr>
              <td class="fw-bold text-danger"><?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?></td>
              <td class="fw-bold text-white"><?= htmlspecialchars($aluno) ?></td>
              <td class="text-white">RM-<?= 48000 + $index + 1 ?></td>
              <td class="text-end">
                <input type="hidden" name="presenca[<?= htmlspecialchars($aluno) ?>]" id="status_<?= $slug ?>" value="P">
                <button type="button" class="btn btn-sm attendance-toggle attendance-present" data-student="<?= $slug ?>">
                  <i class="bi bi-check-lg text-danger me-1"></i> Presente
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="card-footer py-3 d-flex justify-content-between align-items-center bg-transparent border-secondary flex-wrap gap-2">
      <span class="small text-white">Clique no botão do aluno para alternar entre presença e falta.</span>
      <button type="submit" class="btn btn-danger fw-bold">
        <i class="bi bi-floppy me-1"></i> Salvar Frequência
      </button>
    </div>
  </div>
</form>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
