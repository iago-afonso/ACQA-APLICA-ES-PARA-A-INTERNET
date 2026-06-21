<?php require_once '../app/views/templates/header.php'; ?>

<div class="card-form">
    <h1>Novo agendamento</h1>
    <form action="<?= URL ?>agendamentos/criar" method="POST">
        <label>Titulo</label>
        <input type="text" name="titulo" required>
        <label>Descricao</label>
        <textarea name="descricao" rows="3"></textarea>
        <label>Data</label>
        <input type="date" name="data" required>
        <label>Hora</label>
        <input type="time" name="hora" required>
        <div class="botoes">
            <button type="submit">Salvar</button>
            <a href="<?= URL ?>dashboard" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
