<?php
require_once __DIR__ . '/config/config.php';

$titulo_pagina = 'Calendário Escolar';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';

$eventos = [
    7  => ['titulo' => 'Reunião pedagógica de alinhamento curricular.', 'tipo' => 'Coordenação'],
    14 => ['titulo' => 'Feira de Ciências e Tecnologia no laboratório.', 'tipo' => 'Evento Acadêmico'],
    22 => ['titulo' => 'Conselho de classe e fechamento bimestral.', 'tipo' => 'Avaliação'],
    24 => ['titulo' => 'Plantão de dúvidas e atendimento pedagógico.', 'tipo' => 'Atendimento']
];

$dia_selecionado = 24;

// Semanas do mes
$semanas = [
    ['', '', '', '', 1, 2, 3],
    [4, 5, 6, 7, 8, 9, 10],
    [11, 12, 13, 14, 15, 16, 17],
    [18, 19, 20, 21, 22, 23, 24],
    [25, 26, 27, 28, 29, 30, 31],
];
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1">Calendário Escolar</h3>
    <div class="text-white small">Outubro de 2026</div>
  </div>
  <span class="badge bg-danger py-2 px-3 fw-bold">Ano Letivo 2026</span>
</div>

<div class="row g-4 mb-4">
  <div class="col-12 col-lg-7">
    <div class="card card-accent-red">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <span class="fw-bold fs-6"><i class="bi bi-calendar3 text-danger me-2"></i>Outubro 2026</span>
        <span class="small text-white">Clique no dia para ver os detalhes</span>
      </div>
      <div class="card-body p-3">
        <div class="table-responsive">
          <table class="table table-dark table-bordered text-center align-middle mb-0 calendar-table">
            <thead>
              <tr class="border-secondary">
                <th class="text-danger py-2" style="width: 14.28%;">DOM</th>
                <th class="text-white py-2" style="width: 14.28%;">SEG</th>
                <th class="text-white py-2" style="width: 14.28%;">TER</th>
                <th class="text-white py-2" style="width: 14.28%;">QUA</th>
                <th class="text-white py-2" style="width: 14.28%;">QUI</th>
                <th class="text-white py-2" style="width: 14.28%;">SEX</th>
                <th class="text-white py-2" style="width: 14.28%;">SÁB</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($semanas as $semana): ?>
                <tr>
                  <?php foreach ($semana as $dia): 
                    if ($dia === '') {
                      echo '<td class="bg-black bg-opacity-25 border-secondary" style="height: 52px;"></td>';
                      continue;
                    }
                    $tem_evento = isset($eventos[$dia]);
                    $is_ativo = ($dia === $dia_selecionado);
                    
                    $estilo_celula = 'cursor: pointer; height: 52px; font-weight: 700; transition: all 0.15s;';
                    if ($is_ativo) {
                      $classe_td = 'bg-danger text-white border-danger calendar-day-cell active';
                    } elseif ($tem_evento) {
                      $classe_td = 'bg-dark text-white border-danger calendar-day-cell has-event';
                    } else {
                      $classe_td = 'bg-dark text-white border-secondary calendar-day-cell';
                    }
                  ?>
                    <td class="<?= $classe_td ?>" data-day="<?= $dia ?>" style="<?= $estilo_celula ?>">
                      <div class="d-flex flex-column align-items-center justify-content-center">
                        <span class="fs-6"><?= $dia ?></span>
                        <?php if ($tem_evento): ?>
                          <span class="badge bg-danger p-1 rounded-circle" style="width: 6px; height: 6px; margin-top: 2px;"></span>
                        <?php endif; ?>
                      </div>
                    </td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-5">
    <div class="card card-accent-red h-100">
      <div class="card-header py-3">
        <span class="fw-bold fs-6" id="selectedDayTitle"><i class="bi bi-info-circle text-danger me-2"></i>Dia <?= $dia_selecionado ?> de outubro</span>
      </div>
      <div class="card-body p-4 d-flex flex-column justify-content-between">
        <div id="selectedDayInfo">
          <div class="badge bg-danger mb-2"><?= $eventos[$dia_selecionado]['tipo'] ?? 'Atividade Normal' ?></div>
          <h5 class="fw-bold text-white mb-2"><?= $eventos[$dia_selecionado]['titulo'] ?? 'Aulas regulares' ?></h5>
          <p class="text-white small mb-0">Grade de horários regular em funcionamento conforme planejamento sem alterações extraordinárias.</p>
        </div>

        <div class="mt-4 pt-3 border-top border-secondary">
          <div class="small fw-bold text-danger text-uppercase mb-2">Compromissos do Mês</div>
          <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
            <?php foreach ($eventos as $dia => $evt): ?>
              <li class="d-flex align-items-center justify-content-between small text-white p-2 rounded bg-dark border border-secondary">
                <span><b>Dia <?= str_pad($dia, 2, '0', STR_PAD_LEFT) ?>:</b> <?= htmlspecialchars($evt['titulo']) ?></span>
                <span class="badge bg-danger ms-2"><?= htmlspecialchars($evt['tipo']) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
