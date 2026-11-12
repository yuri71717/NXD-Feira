<?php
$menu = [
    ['url' => 'index.php', 'label' => 'Início', 'icon' => 'bi-grid-fill'],
    ['url' => 'turmas.php', 'label' => 'Turmas', 'icon' => 'bi-people-fill'],
    ['url' => 'chamada.php', 'label' => 'Chamada', 'icon' => 'bi-check2-square'],
    ['url' => 'mencoes.php', 'label' => 'Menções', 'icon' => 'bi-award-fill'],
    ['url' => 'planos.php', 'label' => 'Plano de Aulas', 'icon' => 'bi-journal-bookmark-fill'],
    ['url' => 'calendario.php', 'label' => 'Calendário', 'icon' => 'bi-calendar3'],
    ['url' => 'laboratorios.php', 'label' => 'Laboratórios', 'icon' => 'bi-display-fill'],
    ['url' => 'ocorrencias.php', 'label' => 'Ocorrências', 'icon' => 'bi-exclamation-triangle-fill'],
    ['url' => 'avisos.php', 'label' => 'Mural de Avisos', 'icon' => 'bi-bell-fill'],
    ['url' => 'perfil.php', 'label' => 'Meu Perfil', 'icon' => 'bi-person-fill'],
];
?>
<aside class="sidebar">
  <div class="sidebar-header" style="padding: 18px 20px; border-bottom: 1px solid #272938;">
    <a href="index.php" class="sidebar-brand text-decoration-none d-flex align-items-center gap-2">
      <i class="bi bi-mortarboard-fill text-danger fs-4"></i>
      <span class="text-white fw-bold fs-5">NXD</span>
      <span class="badge bg-danger">ESCOLA</span>
    </a>
  </div>

  <div class="sidebar-menu" style="padding: 15px 10px; flex-grow: 1; overflow-y: auto;">
    <div class="sidebar-title" style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; color: #b91c1c; padding: 6px 12px 8px 12px;">
      Menu Principal
    </div>
    <nav class="nav flex-column gap-1">
      <?php foreach ($menu as $item): 
        $ativo = (basename($_SERVER['PHP_SELF']) === $item['url']) ? 'active' : '';
      ?>
        <a href="<?= $item['url'] ?>" class="sidebar-link <?= $ativo ?>">
          <i class="bi <?= $item['icon'] ?>"></i>
          <span><?= $item['label'] ?></span>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>

  <div class="sidebar-footer" style="padding: 15px; border-top: 1px solid #272938; background-color: #13141b;">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center gap-2 overflow-hidden">
        <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; font-size: 0.85rem; font-weight: 700; flex-shrink: 0;">
          CE
        </div>
        <div class="text-truncate text-white" style="font-size: 0.85rem; font-weight: 600;">
          Prof. Carlos
        </div>
      </div>
      <a href="login.php" class="text-danger fs-5" title="Sair do sistema">
        <i class="bi bi-box-arrow-right"></i>
      </a>
    </div>
  </div>
</aside>
<?php require_once __DIR__ . '/navbar.php'; ?>
