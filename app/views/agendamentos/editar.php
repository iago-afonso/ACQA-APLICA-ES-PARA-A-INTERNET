<?php require_once '../app/views/templates/header.php'; ?>

<div class="card-form">
    <h1>Editar agendamento</h1>
    <form action="<?= URL ?>agendamentos/editar/<?= $agendamento['id'] ?>" method="POST">
        <label>Titulo</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($agendamento['titulo']) ?>" required>
        <label>Descricao</label>
        <textarea name="descricao" rows="3"><?= htmlspecialchars($agendamento['descricao']) ?></textarea>
        <label>Data</label>
        <input type="date" name="data" value="<?= $agendamento['data'] ?>" required>
        <label>Hora</label>
        <input type="time" name="hora" value="<?= substr($agendamento['hora'], 0, 5) ?>" required>
        <label>Status</label>
        <select name="status">
            <option value="pendente" <?= $agendamento['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
            <option value="concluido" <?= $agendamento['status'] === 'concluido' ? 'selected' : '' ?>>Concluido</option>
        </select>
        <div class="botoes">
            <button type="submit">Atualizar</button>
            <a href="<?= URL ?>dashboard" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
