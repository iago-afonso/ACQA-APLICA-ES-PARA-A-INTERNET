<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamentos</title>
    <link rel="stylesheet" href="<?= URL ?>css/style.css">
</head>
<body>
<?php if (isset($_SESSION['usuario_id'])): ?>
<header class="topo">
    <a href="<?= URL ?>dashboard" class="logo">Agendamentos</a>
    <nav>
        <span>Ola, <?= htmlspecialchars($_SESSION['usuario_nome']) ?></span>
        <a href="<?= URL ?>auth/sair">Sair</a>
    </nav>
</header>
<?php endif; ?>
<main>
