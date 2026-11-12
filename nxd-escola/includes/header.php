<?php
if (!defined('APP_NAME')) {
    require_once __DIR__ . '/../config/config.php';
}
$pagina_atual = basename($_SERVER['PHP_SELF'], '.php');
$usuario = $usuario ?? [
    'nome' => 'Prof. Carlos Eduardo',
    'email' => 'carlos.eduardo@escola.gov.br',
    'codigo' => 'NXD2026',
    'cargo' => 'Professor'
];
?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($titulo_pagina ?? 'Painel') ?> - <?= APP_NAME ?> Gestão Escolar</title>
  
  <!-- Bootstrap 5 e Icones -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">

  <!-- Ajustes basicos de layout -->
  <style>
    :root, [data-bs-theme="dark"] {
      --bg-main: #0c0d12;
      --bg-sidebar: #13141b;
      --bg-card: #181924;
      --bg-card-header: #1e202d;
      --border-color: #272938;
      --color-red: #991b1b;
      --color-red-hover: #7f1d1d;
      --color-white: #ffffff;
      --bs-body-bg: #0c0d12 !important;
      --bs-body-color: #ffffff !important;
      --bs-card-bg: #181924 !important;
      --bs-card-border-color: #272938 !important;
      --bs-card-cap-bg: #1e202d !important;
      --bs-border-color: #272938 !important;
      --bs-link-color: #ffffff !important;
      --bs-danger: #991b1b !important;
      --bs-danger-rgb: 153, 27, 27 !important;
    }
    html, body {
      background-color: #0c0d12 !important;
      color: #ffffff !important;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }
    body, h1, h2, h3, h4, h5, h6, p, span, small, label, td, th, li, a {
      color: #ffffff;
    }
    .layout-wrapper {
      display: flex !important;
      flex-direction: row !important;
      min-height: 100vh !important;
      width: 100% !important;
      background-color: #0c0d12 !important;
    }
    .sidebar {
      width: 250px !important;
      min-width: 250px !important;
      max-width: 250px !important;
      background-color: #13141b !important;
      border-right: 1px solid #272938 !important;
      display: flex !important;
      flex-direction: column !important;
      position: sticky !important;
      top: 0 !important;
      height: 100vh !important;
      flex-shrink: 0 !important;
      z-index: 1000 !important;
    }
    .main-wrapper {
      flex: 1 1 0% !important;
      min-width: 0 !important;
      display: flex !important;
      flex-direction: column !important;
      background-color: #0c0d12 !important;
    }
    .topbar {
      background-color: #13141b !important;
      border-bottom: 2px solid #991b1b !important;
    }
    .card {
      background-color: #181924 !important;
      border: 1px solid #272938 !important;
      color: #ffffff !important;
      border-radius: 8px !important;
    }
    .card-header {
      background-color: #1e202d !important;
      border-bottom: 1px solid #272938 !important;
      color: #ffffff !important;
    }
    .card-accent-red {
      border-top: 3px solid #991b1b !important;
    }
    .sidebar-link {
      color: #ffffff !important;
      text-decoration: none !important;
      display: flex !important;
      align-items: center !important;
      gap: 12px !important;
      padding: 10px 14px !important;
      border-radius: 6px !important;
      font-weight: 600 !important;
    }
    .sidebar-link i {
      color: #b91c1c !important;
      font-size: 1.1rem !important;
    }
    .sidebar-link.active {
      background-color: #991b1b !important;
      color: #ffffff !important;
    }
    .sidebar-link.active i {
      color: #ffffff !important;
    }
    .sidebar-link:hover {
      background-color: rgba(153, 27, 27, 0.25) !important;
      color: #ffffff !important;
    }
    .text-danger {
      color: #b91c1c !important;
    }
    .btn-danger {
      background-color: #991b1b !important;
      border-color: #991b1b !important;
      color: #ffffff !important;
    }
    .btn-danger:hover {
      background-color: #7f1d1d !important;
      border-color: #7f1d1d !important;
      color: #ffffff !important;
    }
    .btn-outline-danger {
      border-color: #991b1b !important;
      color: #ffffff !important;
    }
    .btn-outline-danger:hover {
      background-color: #991b1b !important;
      border-color: #991b1b !important;
      color: #ffffff !important;
    }
    .badge.bg-danger {
      background-color: #991b1b !important;
      color: #ffffff !important;
    }
    .border-danger {
      border-color: #991b1b !important;
    }
    @media (max-width: 991.98px) {
      .sidebar {
        display: none !important;
      }
    }
  </style>
</head>
<body>
<div class="layout-wrapper">
