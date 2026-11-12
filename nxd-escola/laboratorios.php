<?php
require_once __DIR__ . '/config/config.php';

$laboratorios = get_laboratorios();
$turmas = get_turmas();
$reservas = get_reservas();

$titulo_pagina = 'Reserva de Laboratórios';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1">Laboratórios de Informática</h3>
    <div class="text-white small">Consulta de infraestrutura e agendamento de aulas práticas</div>
  </div>
  <button class="btn btn-danger btn-sm fw-bold" data-bs-toggle="collapse" data-bs-target="#boxAgendamento">
    <i class="bi bi-calendar-plus me-1"></i> Nova Reserva
  </button>
</div>

<!-- Lista de laboratorios -->
<div class="row g-3 mb-4">
  <?php foreach ($laboratorios as $lab): ?>
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card card-accent-red h-100 p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span class="fw-bold text-white fs-6"><?= htmlspecialchars($lab['nome']) ?></span>
          <span class="badge bg-danger"><?= htmlspecialchars($lab['computadores']) ?> PCs</span>
        </div>
        <p class="small text-white mb-2"><?= htmlspecialchars($lab['descricao']) ?></p>
        <div class="mt-auto pt-2 border-top border-secondary d-flex justify-content-between align-items-center">
          <small class="text-white"><i class="bi bi-check-circle-fill text-success me-1"></i>Disponível</small>
          <a href="#boxAgendamento" class="btn btn-outline-danger btn-sm py-0 px-2" data-bs-toggle="collapse">Reservar</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- Form de reserva -->
<div class="collapse mb-4" id="boxAgendamento">
  <div class="card card-accent-red">
    <div class="card-header py-3">
      <span class="fw-bold fs-6"><i class="bi bi-calendar-plus text-danger me-2"></i>Agendar Horário</span>
    </div>
    <div class="card-body p-4">
      <form action="laboratorios.php" method="POST">
        <div class="row g-3">
          <div class="col-12 col-md-6">
            <label class="form-label">Laboratório Desejado</label>
            <select class="form-select" name="lab_id">
              <?php foreach ($laboratorios as $lab): ?>
                <option value="<?= $lab['id'] ?>"><?= htmlspecialchars($lab['nome']) ?> &middot; <?= $lab['computadores'] ?> PCs</option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label">Turma</label>
            <select class="form-select" name="turma_id">
              <?php foreach ($turmas as $t): ?>
                <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['nome']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-12 col-md-4">
            <label class="form-label">Data da Reserva</label>
            <input type="date" class="form-control" name="data_reserva" value="<?= date('Y-m-d') ?>">
          </div>

          <div class="col-6 col-md-4">
            <label class="form-label">Horário de Início</label>
            <input type="time" class="form-control" name="hora_inicio" value="18:20">
          </div>

          <div class="col-6 col-md-4">
            <label class="form-label">Horário de Término</label>
            <input type="time" class="form-control" name="hora_fim" value="19:10">
          </div>

          <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-danger fw-bold">
              <i class="bi bi-check-lg me-1"></i> Confirmar Agendamento
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tabela de Reservas Ativas -->
<div class="card card-accent-red">
  <div class="card-header py-3">
    <span class="fw-bold fs-6"><i class="bi bi-calendar-check text-danger me-2"></i>Reservas Confirmadas</span>
  </div>
  <div class="table-responsive">
    <table class="table table-dark table-hover align-middle mb-0">
      <thead>
        <tr>
          <th>Laboratório</th>
          <th>Turma</th>
          <th>Data</th>
          <th>Horário</th>
          <th class="text-end">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reservas as $res): ?>
          <tr>
            <td class="fw-bold text-white"><i class="bi bi-display text-danger me-2"></i><?= htmlspecialchars($res['lab_nome']) ?></td>
            <td class="text-white"><?= htmlspecialchars($res['turma_nome']) ?></td>
            <td class="text-white"><i class="bi bi-calendar3 me-1"></i><?= htmlspecialchars($res['data']) ?></td>
            <td><span class="badge bg-danger"><?= htmlspecialchars($res['inicio']) ?> às <?= htmlspecialchars($res['fim']) ?></span></td>
            <td class="text-end">
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja cancelar esta reserva?');">
                <i class="bi bi-trash"></i> Cancelar
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
