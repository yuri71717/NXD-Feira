<?php
require_once __DIR__ . '/config/config.php';

$turmas = get_turmas();
$turma_id = isset($_GET['turma']) ? (int)$_GET['turma'] : 1;
$turma_atual = get_turma($turma_id);
$alunos = get_alunos_turma($turma_id);
$ocorrencias = get_ocorrencias();

$titulo_pagina = 'Registro de Ocorrências';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1">Ocorrências Disciplinares</h3>
    <div class="text-white small">Acompanhamento comportamental e pedagógico de alunos</div>
  </div>
  <button class="btn btn-danger btn-sm fw-bold" data-bs-toggle="collapse" data-bs-target="#formOcorrencia">
    <i class="bi bi-plus-lg me-1"></i> Nova Ocorrência
  </button>
</div>

<!-- Nova ocorrencia -->
<div class="collapse mb-4" id="formOcorrencia">
  <div class="card card-accent-red">
    <div class="card-header py-3">
      <span class="fw-bold fs-6"><i class="bi bi-pencil text-danger me-2"></i>Registrar Nova Ocorrência</span>
    </div>
    <div class="card-body p-4">
      <form action="ocorrencias.php" method="POST">
        <div class="row g-3">
          <div class="col-12 col-md-6">
            <label class="form-label">Turma</label>
            <select class="form-select" name="turma_id">
              <?php foreach ($turmas as $t): ?>
                <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['nome']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label">Aluno Envolvido</label>
            <select class="form-select" name="aluno_nome">
              <option value="">Selecione o aluno...</option>
              <?php foreach ($alunos as $aluno): ?>
                <option value="<?= htmlspecialchars($aluno) ?>"><?= htmlspecialchars($aluno) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-12">
            <label class="form-label">Descrição Detalhada do Fato</label>
            <textarea class="form-control" name="descricao" rows="4" placeholder="Relate o ocorrido com clareza e objetividade..."></textarea>
          </div>

          <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-danger fw-bold">
              <i class="bi bi-save me-1"></i> Salvar Ocorrência
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tabela de Ocorrências -->
<div class="card card-accent-red">
  <div class="card-header py-3">
    <span class="fw-bold fs-6"><i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>Histórico Recente</span>
  </div>
  <div class="table-responsive">
    <table class="table table-dark table-hover align-middle mb-0">
      <thead>
        <tr>
          <th>Data</th>
          <th>Aluno</th>
          <th>Turma</th>
          <th>Descrição do Ocorrido</th>
          <th class="text-end">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ocorrencias as $item): ?>
          <tr>
            <td class="text-white fw-bold"><i class="bi bi-calendar3 me-1"></i><?= htmlspecialchars($item['data']) ?></td>
            <td class="fw-bold text-white"><?= htmlspecialchars($item['aluno']) ?></td>
            <td><span class="badge bg-dark border border-secondary"><?= htmlspecialchars($item['turma']) ?></span></td>
            <td class="text-white small" style="max-width: 400px;"><?= htmlspecialchars($item['texto']) ?></td>
            <td class="text-end">
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Excluir este registro?');">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
