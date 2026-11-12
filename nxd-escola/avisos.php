<?php
require_once __DIR__ . '/config/config.php';

$avisos = get_avisos();

$aviso_aberto = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $aviso_aberto = $avisos[$id] ?? null;
}

$titulo_pagina = 'Mural de Avisos';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <div>
    <h3 class="fw-bold text-white mb-1">Comunicados Oficiais</h3>
    <div class="text-white small">Informes da direção, coordenação e calendário acadêmico</div>
  </div>
  <button class="btn btn-danger btn-sm fw-bold" data-bs-toggle="collapse" data-bs-target="#formAviso">
    <i class="bi bi-megaphone me-1"></i> Publicar Aviso
  </button>
</div>

<!-- Novo aviso -->
<div class="collapse mb-4" id="formAviso">
  <div class="card card-accent-red">
    <div class="card-header py-3">
      <span class="fw-bold fs-6"><i class="bi bi-pencil text-danger me-2"></i>Novo Comunicado</span>
    </div>
    <div class="card-body p-4">
      <form action="avisos.php" method="POST">
        <div class="row g-3">
          <div class="col-12 col-md-8">
            <label class="form-label">Título do Aviso</label>
            <input type="text" class="form-control" name="titulo" placeholder="Ex: Cronograma de Provas Finais">
          </div>
          <div class="col-12 col-md-4">
            <label class="form-label">Setor Responsável</label>
            <select class="form-select" name="categoria">
              <option value="Coordenação">Coordenação Pedagógica</option>
              <option value="Diretoria">Diretoria de Ensino</option>
              <option value="Secretaria">Secretaria Escolar</option>
              <option value="Infraestrutura">TI & Infraestrutura</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Mensagem Completa</label>
            <textarea class="form-control" name="texto" rows="4" placeholder="Escreva o comunicado na íntegra..."></textarea>
          </div>
          <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-danger fw-bold">
              <i class="bi bi-send me-1"></i> Publicar no Mural
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Se clicou para abrir individualmente -->
<?php if ($aviso_aberto): ?>
  <div class="card card-accent-red mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <span class="fw-bold fs-6"><?= htmlspecialchars($aviso_aberto['titulo']) ?></span>
      <span class="badge bg-danger"><?= htmlspecialchars($aviso_aberto['categoria']) ?></span>
    </div>
    <div class="card-body p-4">
      <div class="small text-white mb-3"><i class="bi bi-calendar3 me-1"></i>Publicado em <?= htmlspecialchars($aviso_aberto['data']) ?></div>
      <p class="fs-6 text-white mb-4" style="line-height: 1.8; white-space: pre-line;">
        <?= htmlspecialchars($aviso_aberto['texto']) ?>
      </p>
      <a href="avisos.php" class="btn btn-outline-danger btn-sm">&larr; Voltar ao Mural</a>
    </div>
  </div>
<?php endif; ?>

<!-- Lista de Avisos -->
<div class="row g-3">
  <?php foreach ($avisos as $av): ?>
    <div class="col-12">
      <div class="card card-accent-red p-3">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <h5 class="fw-bold text-white mb-1">
              <i class="bi bi-bell-fill text-danger me-2"></i><?= htmlspecialchars($av['titulo']) ?>
            </h5>
            <small class="text-white"><i class="bi bi-calendar3 me-1"></i><?= htmlspecialchars($av['data']) ?></small>
          </div>
          <span class="badge bg-danger"><?= htmlspecialchars($av['categoria']) ?></span>
        </div>
        <p class="text-white mb-3 small"><?= htmlspecialchars($av['texto']) ?></p>
        <div class="d-flex justify-content-end">
          <a href="avisos.php?id=<?= $av['id'] ?>" class="btn btn-outline-danger btn-sm">Ler na íntegra &rarr;</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
